<?php
declare(strict_types=1);

class FreshRSS_CategoryDAO extends Minz_ModelPdo {

	public const DEFAULTCATEGORYID = 1;

	public function resetDefaultCategoryName(): bool {
		//FreshRSS 1.15.1
		$stm = $this->pdo->prepare('UPDATE `_category` SET name = :name WHERE id = :id');
		if ($stm !== false) {
			$stm->bindValue(':id', self::DEFAULTCATEGORYID, PDO::PARAM_INT);
			$stm->bindValue(':name', 'Uncategorized');
		}
		return $stm !== false && $stm->execute();
	}

	protected function addColumn(string $name): bool {
		if ($this->pdo->inTransaction()) {
			$this->pdo->commit();
		}
		Minz_Log::warning(__METHOD__ . ': ' . $name);
		try {
			if ($name === 'kind') {	//v1.20.0
				return $this->pdo->exec('ALTER TABLE `_category` ADD COLUMN kind SMALLINT DEFAULT 0') !== false;
			} elseif ($name === 'lastUpdate') {	//v1.20.0
				return $this->pdo->exec('ALTER TABLE `_category` ADD COLUMN `lastUpdate` BIGINT DEFAULT 0') !== false;
			} elseif ($name === 'error') {	//v1.20.0
				return $this->pdo->exec('ALTER TABLE `_category` ADD COLUMN error SMALLINT DEFAULT 0') !== false;
			} elseif ('attributes' === $name) {	//v1.15.0
				$ok = $this->pdo->exec('ALTER TABLE `_category` ADD COLUMN attributes TEXT') !== false;

				/** @var list<array{id:int,url:string,kind:int,category:int,name:string,website:string,lastUpdate:int,
				 * 	priority:int,pathEntries:string,httpAuth:string,error:int,keep_history:?int,ttl:int,attributes:string}> $feeds */
				$feeds = $this->fetchAssoc('SELECT * FROM `_feed`') ?? [];

				$stm = $this->pdo->prepare('UPDATE `_feed` SET attributes = :attributes WHERE id = :id');
				if ($stm === false) {
					Minz_Log::error('SQL error ' . __METHOD__ . json_encode($this->pdo->errorInfo()));
					return false;
				}
				foreach ($feeds as $feed) {
					if (empty($feed['keep_history']) || empty($feed['id'])) {
						continue;
					}
					$keepHistory = $feed['keep_history'];
					$attributes = empty($feed['attributes']) ? [] : json_decode($feed['attributes'], true);
					if (is_string($attributes)) {	//Legacy risk of double-encoding
						$attributes = json_decode($attributes, true);
					}
					if (!is_array($attributes)) {
						$attributes = [];
					}
					$archiving = is_array($attributes['archiving'] ?? null) ? $attributes['archiving'] : [];
					if ($keepHistory > 0) {
						$archiving['keep_min'] = (int)$keepHistory;
					} elseif ($keepHistory == -1) {	//Infinite
						$archiving['keep_period'] = false;
						$archiving['keep_max'] = false;
						$archiving['keep_min'] = false;
					} else {
						continue;
					}
					$attributes['archiving'] = $archiving;
					if (!($stm->bindValue(':id', $feed['id'], PDO::PARAM_INT) &&
						$stm->bindValue(':attributes', json_encode($attributes, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) &&
						$stm->execute())) {
						Minz_Log::error('SQL error ' . __METHOD__ . json_encode($stm->errorInfo()));
					}
				}

				if ($this->pdo->dbType() !== 'sqlite') {	//SQLite does not support DROP COLUMN
					$this->pdo->exec('ALTER TABLE `_feed` DROP COLUMN keep_history');
				} else {
					$this->pdo->exec('DROP INDEX IF EXISTS feed_keep_history_index');	//SQLite at least drop index
				}

				$this->resetDefaultCategoryName();

				return $ok;
			}
		} catch (Exception $e) {
			Minz_Log::error(__METHOD__ . ': ' . $e->getMessage());
		}
		return false;
	}

	/** @param array{0:string,1:int,2:string} $errorInfo */
	protected function autoUpdateDb(array $errorInfo): bool {
		if (isset($errorInfo[0])) {
			if ($errorInfo[0] === FreshRSS_DatabaseDAO::ER_BAD_FIELD_ERROR || $errorInfo[0] === FreshRSS_DatabaseDAOPGSQL::UNDEFINED_COLUMN) {
				$errorLines = explode("\n", (string)$errorInfo[2], 2);	// The relevant column name is on the first line, other lines are noise
				foreach (['kind', 'lastUpdate', 'error', 'attributes'] as $column) {
					if (stripos($errorLines[0], $column) !== false) {
						return $this->addColumn($column);
					}
				}
			}
		}
		return false;
	}

	/**
	 * @param array{name:string,id?:int,kind?:int,lastUpdate?:int,error?:int|bool,attributes?:string|array<string,mixed>} $valuesTmp
	 */
	public function addCategory(array $valuesTmp): int|false {
		// TRIM() to provide a type hint as text
		// No tag of the same name
		$sql = <<<'SQL'
INSERT INTO `_category`(kind, name, attributes)
SELECT * FROM (SELECT ABS(?) AS kind, TRIM(?) AS name, TRIM(?) AS attributes) c2
WHERE NOT EXISTS (SELECT 1 FROM `_tag` WHERE name = TRIM(?))
SQL;
		$stm = $this->pdo->prepare($sql);

		$valuesTmp['name'] = mb_strcut(trim($valuesTmp['name']), 0, FreshRSS_DatabaseDAO::LENGTH_INDEX_UNICODE, 'UTF-8');
		if (!isset($valuesTmp['attributes'])) {
			$valuesTmp['attributes'] = [];
		}
		$values = [
			$valuesTmp['kind'] ?? FreshRSS_Category::KIND_NORMAL,
			$valuesTmp['name'],
			is_string($valuesTmp['attributes']) ? $valuesTmp['attributes'] : json_encode($valuesTmp['attributes'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
			$valuesTmp['name'],
		];

		if ($stm !== false && $stm->execute($values) && $stm->rowCount() > 0) {
			$catId = $this->pdo->lastInsertId('`_category_id_seq`');
			return $catId === false ? false : (int)$catId;
		} else {
			$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
			/** @var array{0:string,1:int,2:string} $info */
			if ($this->autoUpdateDb($info)) {
				return $this->addCategory($valuesTmp);
			}
			Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
			return false;
		}
	}

	public function addCategoryObject(FreshRSS_Category $category): int|false {
		$cat = $this->searchByName($category->name());
		if ($cat === null) {
			$values = [
				'kind' => $category->kind(),
				'name' => $category->name(),
				'attributes' => $category->attributes(),
			];
			return $this->addCategory($values);
		}

		return $cat->id();
	}

	/**
	 * @param array{name:string,kind:int,attributes?:array<string,mixed>|mixed|null} $valuesTmp
	 */
	public function updateCategory(int $id, array $valuesTmp): int|false {
		// No tag of the same name
		$sql = <<<'SQL'
UPDATE `_category` SET name=?, kind=?, attributes=? WHERE id=?
AND NOT EXISTS (SELECT 1 FROM `_tag` WHERE name = ?)
SQL;
		$stm = $this->pdo->prepare($sql);

		$valuesTmp['name'] = mb_strcut(trim($valuesTmp['name']), 0, FreshRSS_DatabaseDAO::LENGTH_INDEX_UNICODE, 'UTF-8');
		if (empty($valuesTmp['attributes'])) {
			$valuesTmp['attributes'] = [];
		}
		$values = [
			$valuesTmp['name'],
			$valuesTmp['kind'] ?? FreshRSS_Category::KIND_NORMAL,
			is_string($valuesTmp['attributes']) ? $valuesTmp['attributes'] : json_encode($valuesTmp['attributes'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
			$id,
			$valuesTmp['name'],
		];

		if ($stm !== false && $stm->execute($values)) {
			return $stm->rowCount();
		} else {
			$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
			/** @var array{0:string,1:int,2:string} $info */
			if ($this->autoUpdateDb($info)) {
				return $this->updateCategory($id, $valuesTmp);
			}
			Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
			return false;
		}
	}

	public function updateLastUpdate(int $id, bool $inError = false, int $mtime = 0): int|false {
		$sql = 'UPDATE `_category` SET `lastUpdate`=?, error=? WHERE id=?';
		$values = [
			$mtime <= 0 ? time() : $mtime,
			$inError ? 1 : 0,
			$id,
		];
		$stm = $this->pdo->prepare($sql);

		if ($stm !== false && $stm->execute($values)) {
			return $stm->rowCount();
		} else {
			$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
			Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
			return false;
		}
	}

	public function deleteCategory(int $id): int|false {
		if ($id <= self::DEFAULTCATEGORYID) {
			return false;
		}
		$sql = 'DELETE FROM `_category` WHERE id=:id';
		$stm = $this->pdo->prepare($sql);
		if ($stm !== false && $stm->bindParam(':id', $id, PDO::PARAM_INT) && $stm->execute()) {
			return $stm->rowCount();
		} else {
			$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
			Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
			return false;
		}
	}

	/** @return Traversable<array{id:int,name:string,kind:int,lastUpdate:int,error:int,attributes?:array<string,mixed>}> */
	public function selectAll(): Traversable {
		$sql = 'SELECT id, name, kind, `lastUpdate`, error, attributes FROM `_category`';
		$stm = $this->pdo->query($sql);
		if ($stm !== false) {
			while (is_array($row = $stm->fetch(PDO::FETCH_ASSOC))) {
				/** @var array{id:int,name:string,kind:int,lastUpdate:int,error:int,attributes?:array<string,mixed>} $row */
				yield $row;
			}
		} else {
			$info = $this->pdo->errorInfo();
			/** @var array{0:string,1:int,2:string} $info */
			if ($this->autoUpdateDb($info)) {
				yield from $this->selectAll();
			} else {
				Minz_Log::error(__METHOD__ . ' error: ' . json_encode($info));
			}
		}
	}

	public function searchById(int $id): ?FreshRSS_Category {
		$sql = 'SELECT * FROM `_category` WHERE id=:id';
		$res = $this->fetchAssoc($sql, ['id' => $id]) ?? [];
		/** @var array<array{name:string,id:int,kind:int,lastUpdate?:int,error:int|bool,attributes?:string}> $res */
		$categories = self::daoToCategories($res);	// @phpstan-ignore varTag.type
		return reset($categories) ?: null;
	}

	public function searchByName(string $name): ?FreshRSS_Category {
		$sql = 'SELECT * FROM `_category` WHERE name=:name';
		$res = $this->fetchAssoc($sql, ['name' => $name]) ?? [];
		/** @var array<array{name:string,id:int,kind:int,lastUpdate:int,error:int|bool,attributes:string}> $res */
		$categories = self::daoToCategories($res);	// @phpstan-ignore varTag.type
		return reset($categories) ?: null;
	}

	/** @return array<int,FreshRSS_Category> where the key is the category ID */
	public function listSortedCategories(bool $prePopulateFeeds = true, bool $details = false): array {
		$categories = $this->listCategories($prePopulateFeeds, $details);

		uasort($categories, static function (FreshRSS_Category $a, FreshRSS_Category $b) {
			$aPosition = $a->attributeInt('position');
			$bPosition = $b->attributeInt('position');
			if ($aPosition === $bPosition) {
				return strnatcasecmp($a->name(), $b->name());
			} elseif (null === $aPosition) {
				return 1;
			} elseif (null === $bPosition) {
				return -1;
			}
			return ($aPosition < $bPosition) ? -1 : 1;
		});

		return $categories;
	}

	/** @return array<int,FreshRSS_Category> where the key is the category ID */
	public function listCategories(bool $prePopulateFeeds = true, bool $details = false): array {
		if ($prePopulateFeeds) {
			$sql = 'SELECT c.id AS c_id, c.name AS c_name, c.kind AS c_kind, c.`lastUpdate` AS c_last_update, c.error AS c_error, c.attributes AS c_attributes, '
				. ($details ? 'f.* ' : 'f.id, f.name, f.url, f.kind, f.website, f.priority, f.error, f.attributes, f.`cache_nbEntries`, f.`cache_nbUnreads`, f.ttl ')
				. 'FROM `_category` c '
				. 'LEFT OUTER JOIN `_feed` f ON f.category=c.id '
				. 'WHERE f.priority >= :priority '
				. 'GROUP BY f.id, c_id '
				. 'ORDER BY c.name, f.name';
			$stm = $this->pdo->prepare($sql);
			$values = [ ':priority' => FreshRSS_Feed::PRIORITY_CATEGORY ];
			if ($stm !== false && $stm->execute($values) && ($res = $stm->fetchAll(PDO::FETCH_ASSOC)) !== false) {
				/** @var list<array{c_name:string,c_id:int,c_kind:int,c_last_update:int,c_error:int|bool,c_attributes?:string,
				 * 	id?:int,name?:string,url?:string,kind?:int,category?:int,website?:string,priority?:int,error?:int|bool,attributes?:string,cache_nbEntries?:int,cache_nbUnreads?:int,ttl?:int}> $res */
				return self::daoToCategoriesPrepopulated($res);
			} else {
				$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
				/** @var array{0:string,1:int,2:string} $info */
				if ($this->autoUpdateDb($info)) {
					return $this->listCategories($prePopulateFeeds, $details);
				}
				Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
				return [];
			}
		} else {
			$res = $this->fetchAssoc('SELECT * FROM `_category` ORDER BY name') ?? [];
			/** @var list<array{name:string,id:int,kind:int,lastUpdate?:int,error?:int|bool,attributes?:string}> $res */
			return empty($res) ? [] : self::daoToCategories($res);	// @phpstan-ignore varTag.type
		}
	}

	/** @return array<int,FreshRSS_Category> where the key is the category ID */
	public function listCategoriesOrderUpdate(int $defaultCacheDuration = 86400, int $limit = 0): array {
		$sql = 'SELECT * FROM `_category` WHERE kind = :kind AND `lastUpdate` < :lu ORDER BY `lastUpdate`'
			. ($limit < 1 ? '' : ' LIMIT ' . $limit);
		$stm = $this->pdo->prepare($sql);
		if ($stm !== false &&
			$stm->bindValue(':kind', FreshRSS_Category::KIND_DYNAMIC_OPML, PDO::PARAM_INT) &&
			$stm->bindValue(':lu', time() - $defaultCacheDuration, PDO::PARAM_INT) &&
			$stm->execute()) {
			$res = $stm->fetchAll(PDO::FETCH_ASSOC);
			/** @var list<array{name:string,id:int,kind:int,lastUpdate:int,error?:int|bool,attributes?:string}> $res */
			return self::daoToCategories($res);
		} else {
			$info = $stm !== false ? $stm->errorInfo() : $this->pdo->errorInfo();
			/** @var array{0:string,1:int,2:string} $info */
			if ($this->autoUpdateDb($info)) {
				return $this->listCategoriesOrderUpdate($defaultCacheDuration, $limit);
			}
			Minz_Log::warning(__METHOD__ . ' error: ' . $sql . ' : ' . json_encode($info));
			return [];
		}
	}

	public function getDefault(): ?FreshRSS_Category {
		$sql = 'SELECT * FROM `_category` WHERE id=:id';
		$res = $this->fetchAssoc($sql, [':id' => self::DEFAULTCATEGORYID]) ?? [];
		/** @var array<array{name:string,id:int,kind:int,lastUpdate?:int,error?:int|bool,attributes?:string}> $res */
		$categories = self::daoToCategories($res);	// @phpstan-ignore varTag.type
		if (isset($categories[self::DEFAULTCATEGORYID])) {
			return $categories[self::DEFAULTCATEGORYID];
		} else {
			if (FreshRSS_Context::$isCli) {
				fwrite(STDERR, 'FreshRSS database error: Default category not found!' . "\n");
			}
			Minz_Log::error('FreshRSS database error: Default category not found!');
			return null;
		}
	}

	public function checkDefault(): int|bool {
		$def_cat = $this->searchById(self::DEFAULTCATEGORYID);

		if ($def_cat == null) {
			$cat = new FreshRSS_Category(_t('gen.short.default_category'), self::DEFAULTCATEGORYID);

			$sql = 'INSERT INTO `_category`(id, name) VALUES(?, ?)';
			if ($this->pdo->dbType() === 'pgsql') {
				//Force call to nextval()
				$sql .= " RETURNING nextval('`_category_id_seq`');";
			}
			$stm = $this->pdo->prepare($sql);

			$values = [
				$cat->id(),
				$cat->name(),
			];

			if ($stm !== false && $stm->execute($values)) {
				$catId = $this->pdo->lastInsertId('`_category_id_seq`');
				return $catId === false ? false : (int)$catId;
			} else {
				$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
				Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
				return false;
			}
		}
		return true;
	}

	public function count(): int {
		$sql = 'SELECT COUNT(*) AS count FROM `_category`';
		$res = $this->fetchColumn($sql, 0);
		return isset($res[0]) ? (int)$res[0] : -1;
	}

	public function countFeed(int $id): int {
		$sql = 'SELECT COUNT(*) AS count FROM `_feed` WHERE category=:id';
		$res = $this->fetchColumn($sql, 0, [':id' => $id]);
		return isset($res[0]) ? (int)$res[0] : -1;
	}

	public function countNotRead(int $id): int {
		$sql = 'SELECT COUNT(*) AS count FROM `_entry` e INNER JOIN `_feed` f ON e.id_feed=f.id WHERE category=:id AND e.is_read=0';
		$res = $this->fetchColumn($sql, 0, [':id' => $id]);
		return isset($res[0]) ? (int)$res[0] : -1;
	}

	/** @return list<string> */
	public function listTitles(int $id, int $limit = 0): array {
		$sql = <<<'SQL'
			SELECT e.title FROM `_entry` e
			INNER JOIN `_feed` f ON e.id_feed=f.id
			WHERE f.category=:id_category
			ORDER BY e.id DESC
		SQL;
		$sql .= ($limit < 1 ? '' : ' LIMIT ' . intval($limit));
		$res = $this->fetchColumn($sql, 0, [':id_category' => $id]) ?? [];
		/** @var list<string> $res */
		return $res;
	}

	/**
	 * @param array<array{c_name:string,c_id:int,c_kind:int,c_last_update:int,c_error:int|bool,c_attributes?:string,
	 * 	id?:int,name?:string,url?:string,kind?:int,website?:string,priority?:int,
	 * 	error?:int|bool,attributes?:string,cache_nbEntries?:int,cache_nbUnreads?:int,ttl?:int}> $listDAO
	 * @return array<int,FreshRSS_Category> where the key is the category ID
	 */
	private static function daoToCategoriesPrepopulated(array $listDAO): array {
		$list = [];
		$previousLine = [];
		$feedsDao = [];
		$feedDao = FreshRSS_Factory::createFeedDao();
		foreach ($listDAO as $line) {
			if (!empty($previousLine['c_id']) && $line['c_id'] !== $previousLine['c_id']) {
				// End of the current category, we add it to the $list
				$cat = new FreshRSS_Category(
					$previousLine['c_name'],
					$previousLine['c_id'],
					$feedDao::daoToFeeds($feedsDao, $previousLine['c_id'])
				);
				$cat->_kind($previousLine['c_kind']);
				$cat->_attributes($previousLine['c_attributes'] ?? '[]');
				$list[$cat->id()] = $cat;

				$feedsDao = [];	//Prepare for next category
			}

			$previousLine = $line;
			$feedsDao[] = $line;
		}

		// add the last category
		if ($previousLine != null) {
			$cat = new FreshRSS_Category(
				$previousLine['c_name'],
				$previousLine['c_id'],
				$feedDao::daoToFeeds($feedsDao, $previousLine['c_id'])
			);
			$cat->_kind($previousLine['c_kind']);
			$cat->_lastUpdate($previousLine['c_last_update'] ?? 0);
			$cat->_error($previousLine['c_error'] ?? 0);
			$cat->_attributes($previousLine['c_attributes'] ?? []);
			$list[$cat->id()] = $cat;
		}

		return $list;
	}

	/**
	 * @param array<array{name:string,id:int,kind:int,lastUpdate?:int,error?:int|bool,attributes?:string}> $listDAO
	 * @return array<int,FreshRSS_Category> where the key is the category ID
	 */
	private static function daoToCategories(array $listDAO): array {
		$list = [];
		foreach ($listDAO as $dao) {
			$cat = new FreshRSS_Category(
				$dao['name'],
				$dao['id']
			);
			$cat->_kind($dao['kind']);
			$cat->_lastUpdate($dao['lastUpdate'] ?? 0);
			$cat->_error($dao['error'] ?? 0);
			$cat->_attributes($dao['attributes'] ?? '');
			$list[$cat->id()] = $cat;
		}
		return $list;
	}
}

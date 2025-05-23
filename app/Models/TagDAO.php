<?php
declare(strict_types=1);

class FreshRSS_TagDAO extends Minz_ModelPdo {

	public function sqlIgnore(): string {
		return 'IGNORE';
	}

	/**
	 * @param array{'id'?:int,'name':string,'attributes'?:array<string,mixed>} $valuesTmp
	 */
	public function addTag(array $valuesTmp): int|false {
		// TRIM() gives a text type hint to PostgreSQL
		// No category of the same name
		$sql = <<<'SQL'
INSERT INTO `_tag`(name, attributes)
SELECT * FROM (SELECT TRIM(?) as name, TRIM(?) as attributes) t2
WHERE NOT EXISTS (SELECT 1 FROM `_category` WHERE name = TRIM(?))
SQL;
		$stm = $this->pdo->prepare($sql);

		$valuesTmp['name'] = mb_strcut(trim($valuesTmp['name']), 0, FreshRSS_DatabaseDAO::LENGTH_INDEX_UNICODE, 'UTF-8');
		if (!isset($valuesTmp['attributes'])) {
			$valuesTmp['attributes'] = [];
		}
		$values = [
			$valuesTmp['name'],
			is_string($valuesTmp['attributes']) ? $valuesTmp['attributes'] : json_encode($valuesTmp['attributes'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
			$valuesTmp['name'],
		];

		if ($stm !== false && $stm->execute($values) && $stm->rowCount() > 0) {
			$tagId = $this->pdo->lastInsertId('`_tag_id_seq`');
			return $tagId === false ? false : (int)$tagId;
		} else {
			$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
			Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
			return false;
		}
	}

	public function addTagObject(FreshRSS_Tag $tag): int|false {
		$tag0 = $this->searchByName($tag->name());
		if ($tag0 === null) {
			$values = [
				'name' => $tag->name(),
				'attributes' => $tag->attributes(),
			];
			return $this->addTag($values);
		}
		return $tag->id();
	}

	public function updateTagName(int $id, string $name): int|false {
		// No category of the same name
		$sql = <<<'SQL'
UPDATE `_tag` SET name = :name1 WHERE id = :id
AND NOT EXISTS (SELECT 1 FROM `_category` WHERE name = :name2)
SQL;

		$name = mb_strcut(trim($name), 0, FreshRSS_DatabaseDAO::LENGTH_INDEX_UNICODE, 'UTF-8');
		$stm = $this->pdo->prepare($sql);
		if ($stm !== false &&
			$stm->bindValue(':id', $id, PDO::PARAM_INT) &&
			$stm->bindValue(':name1', $name, PDO::PARAM_STR) &&
			$stm->bindValue(':name2', $name, PDO::PARAM_STR) &&
			$stm->execute()) {
			return $stm->rowCount();
		} else {
			$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
			Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
			return false;
		}
	}

	/**
	 * @param array<string,mixed> $attributes
	 */
	public function updateTagAttributes(int $id, array $attributes): int|false {
		$sql = 'UPDATE `_tag` SET attributes=:attributes WHERE id=:id';
		$stm = $this->pdo->prepare($sql);
		if ($stm !== false &&
			$stm->bindValue(':id', $id, PDO::PARAM_INT) &&
			$stm->bindValue(':attributes', json_encode($attributes, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), PDO::PARAM_STR) &&
			$stm->execute()) {
			return $stm->rowCount();
		}
		$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
		Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
		return false;
	}

	/**
	 * @param non-empty-string $key
	 */
	public function updateTagAttribute(FreshRSS_Tag $tag, string $key, mixed $value): int|false {
		$tag->_attribute($key, $value);
		return $this->updateTagAttributes($tag->id(), $tag->attributes());
	}

	public function deleteTag(int $id): int|false {
		if ($id <= 0) {
			return false;
		}
		$sql = 'DELETE FROM `_tag` WHERE id=?';
		$stm = $this->pdo->prepare($sql);

		$values = [$id];

		if ($stm !== false && $stm->execute($values)) {
			return $stm->rowCount();
		} else {
			$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
			Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
			return false;
		}
	}

	/** @return Traversable<array{id:int,name:string,attributes?:array<string,mixed>}> */
	public function selectAll(): Traversable {
		$sql = 'SELECT id, name, attributes FROM `_tag`';
		$stm = $this->pdo->query($sql);
		if ($stm === false) {
			Minz_Log::error('SQL error ' . __METHOD__ . json_encode($this->pdo->errorInfo()));
			return;
		}
		while (is_array($row = $stm->fetch(PDO::FETCH_ASSOC))) {
			/** @var array{id:int,name:string,attributes?:array<string,mixed>} $row */
			yield $row;
		}
	}

	/** @return Traversable<array{id_tag:int,id_entry:int|numeric-string}> */
	public function selectEntryTag(): Traversable {
		$sql = 'SELECT id_tag, id_entry FROM `_entrytag`';
		$stm = $this->pdo->query($sql);
		if ($stm === false) {
			Minz_Log::error('SQL error ' . __METHOD__ . json_encode($this->pdo->errorInfo()));
			return;
		}
		while (is_array($row = $stm->fetch(PDO::FETCH_ASSOC))) {
			/** @var array{id_tag:int,id_entry:int|numeric-string}> $row */
			yield $row;	// @phpstan-ignore generator.valueType
		}
	}

	public function updateEntryTag(int $oldTagId, int $newTagId): int|false {
		$sql = <<<'SQL'
DELETE FROM `_entrytag` WHERE EXISTS (
	SELECT 1 FROM `_entrytag` AS e
	WHERE e.id_entry = `_entrytag`.id_entry AND e.id_tag = ? AND `_entrytag`.id_tag = ?)
SQL;
		$stm = $this->pdo->prepare($sql);

		if ($stm === false || !$stm->execute([$newTagId, $oldTagId])) {
			$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
			Minz_Log::error('SQL error ' . __METHOD__ . ' A ' . json_encode($info));
			return false;
		}

		$sql = 'UPDATE `_entrytag` SET id_tag = ? WHERE id_tag = ?';
		$stm = $this->pdo->prepare($sql);

		if ($stm !== false && $stm->execute([$newTagId, $oldTagId])) {
			return $stm->rowCount();
		}
		$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
		Minz_Log::error('SQL error ' . __METHOD__ . ' B ' . json_encode($info));
		return false;
	}

	public function searchById(int $id): ?FreshRSS_Tag {
		$res = $this->fetchAssoc('SELECT * FROM `_tag` WHERE id=:id', [':id' => $id]);
		/** @var list<array{id:int,name:string,attributes?:string}>|null $res */
		return $res === null ? null : (current(self::daoToTags($res)) ?: null);
	}

	public function searchByName(string $name): ?FreshRSS_Tag {
		$res = $this->fetchAssoc('SELECT * FROM `_tag` WHERE name=:name', [':name' => $name]);
		/** @var list<array{id:int,name:string,attributes?:string}>|null $res */
		return $res === null ? null : (current(self::daoToTags($res)) ?: null);
	}

	/** @return array<int,FreshRSS_Tag> where the key is the label ID */
	public function listTags(bool $precounts = false): array {
		if ($precounts) {
			$sql = <<<'SQL'
SELECT t.id, t.name, count(e.id) AS unreads
FROM `_tag` t
LEFT OUTER JOIN `_entrytag` et ON et.id_tag = t.id
LEFT OUTER JOIN `_entry` e ON et.id_entry = e.id AND e.is_read = 0
GROUP BY t.id
ORDER BY t.name
SQL;
		} else {
			$sql = 'SELECT * FROM `_tag` ORDER BY name';
		}

		$stm = $this->pdo->query($sql);
		if ($stm !== false && ($res = $stm->fetchAll(PDO::FETCH_ASSOC)) !== false) {
			return self::daoToTags($res);
		} else {
			$info = $this->pdo->errorInfo();
			Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
			return [];
		}
	}

	/** @return array<string,string> */
	public function listTagsNewestItemUsec(?int $id_tag = null): array {
		$sql = <<<'SQL'
SELECT t.id AS id_tag, MAX(e.id) AS newest_item_us
FROM `_tag` t
LEFT OUTER JOIN `_entrytag` et ON et.id_tag = t.id
LEFT OUTER JOIN `_entry` e ON et.id_entry = e.id
SQL;
		if ($id_tag === null) {
			$sql .= ' GROUP BY t.id';
		} else {
			$sql .= ' WHERE t.id=' . $id_tag;
		}
		$res = $this->fetchAssoc($sql);
		if ($res == null) {
			return [];
		}
		$newestItemUsec = [];
		foreach ($res as $line) {
			$newestItemUsec['t_' . $line['id_tag']] = (string)($line['newest_item_us']);
		}
		return $newestItemUsec;
	}

	public function count(): int {
		$sql = 'SELECT COUNT(*) AS count FROM `_tag`';
		$stm = $this->pdo->query($sql);
		if ($stm !== false) {
			$res = $stm->fetchAll(PDO::FETCH_ASSOC);
			return (int)$res[0]['count'];
		}
		$info = $this->pdo->errorInfo();
		Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
		return -1;
	}

	public function countEntries(int $id): int {
		$sql = 'SELECT COUNT(*) AS count FROM `_entrytag` WHERE id_tag=:id_tag';
		$res = $this->fetchAssoc($sql, [':id_tag' => $id]);
		if ($res == null || !isset($res[0]['count'])) {
			return -1;
		}
		return (int)$res[0]['count'];
	}

	public function countNotRead(?int $id = null): int {
		$sql = <<<'SQL'
SELECT COUNT(*) AS count FROM `_entrytag` et
INNER JOIN `_entry` e ON et.id_entry=e.id
WHERE e.is_read=0
SQL;
		$values = [];
		if (null !== $id) {
			$sql .= ' AND et.id_tag=:id_tag';
			$values[':id_tag'] = $id;
		}

		$res = $this->fetchAssoc($sql, $values);
		if ($res == null || !isset($res[0]['count'])) {
			return -1;
		}
		return (int)$res[0]['count'];
	}

	public function tagEntry(int $id_tag, string $id_entry, bool $checked = true): bool {
		if ($checked) {
			$sql = 'INSERT ' . $this->sqlIgnore() . ' INTO `_entrytag`(id_tag, id_entry) VALUES(?, ?)';
		} else {
			$sql = 'DELETE FROM `_entrytag` WHERE id_tag=? AND id_entry=?';
		}
		$stm = $this->pdo->prepare($sql);
		$values = [$id_tag, $id_entry];

		if ($stm !== false && $stm->execute($values)) {
			return true;
		}
		$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
		Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
		return false;
	}

	/**
	 * @param iterable<array{id_tag:int,id_entry:numeric-string|int}> $addLabels Labels to insert as batch
	 * @return int|false Number of new entries or false in case of error
	 */
	public function tagEntries(iterable $addLabels): int|false {
		$hasValues = false;
		$sql = 'INSERT ' . $this->sqlIgnore() . ' INTO `_entrytag`(id_tag, id_entry) VALUES ';
		foreach ($addLabels as $addLabel) {
			$id_tag = (int)($addLabel['id_tag'] ?? 0);
			$id_entry = $addLabel['id_entry'] ?? '';
			if ($id_tag > 0 && (is_int($id_entry) || ctype_digit($id_entry))) {
				$sql .= "({$id_tag},{$id_entry}),";
				$hasValues = true;
			}
		}
		$sql = rtrim($sql, ',');
		if (!$hasValues) {
			return false;
		}

		$affected = $this->pdo->exec($sql);
		if ($affected !== false) {
			return $affected;
		}
		$info = $this->pdo->errorInfo();
		Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
		return false;
	}

	/**
	 * @return list<array{id:int,name:string,checked:bool}>
	 */
	public function getTagsForEntry(string $id_entry): array {
		$sql = <<<'SQL'
SELECT t.id, t.name, et.id_entry IS NOT NULL as checked
FROM `_tag` t
LEFT OUTER JOIN `_entrytag` et ON et.id_tag = t.id AND et.id_entry=?
ORDER BY t.name
SQL;

		$stm = $this->pdo->prepare($sql);
		$values = [$id_entry];

		if ($stm !== false && $stm->execute($values) && ($lines = $stm->fetchAll(PDO::FETCH_ASSOC)) !== false) {
			$result = [];
			foreach ($lines as $line) {
				$result[] = [
					'id' => (int)($line['id']),
					'name' => $line['name'],
					'checked' => !empty($line['checked']),
				];
			}
			return $result;
		}
		$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
		Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
		return [];
	}

	/**
	 * @param list<FreshRSS_Entry|numeric-string> $entries
	 * @return list<array{id_entry:int|numeric-string,id_tag:int,name:string}>|null
	 */
	public function getTagsForEntries(array $entries): array|null {
		$sql = <<<'SQL'
SELECT et.id_entry, et.id_tag, t.name
FROM `_tag` t
INNER JOIN `_entrytag` et ON et.id_tag = t.id
SQL;

		$values = [];
		if (count($entries) > 0) {
			if (count($entries) > FreshRSS_DatabaseDAO::MAX_VARIABLE_NUMBER) {
				// Split a query with too many variables parameters
				$idsChunks = array_chunk($entries, FreshRSS_DatabaseDAO::MAX_VARIABLE_NUMBER);
				foreach ($idsChunks as $idsChunk) {
					$valuesChunk = $this->getTagsForEntries($idsChunk);
					if (!is_array($valuesChunk)) {
						return null;
					}
					$values = array_merge($values, $valuesChunk);
				}
				return $values;
			}
			$sql .= ' AND et.id_entry IN (' . str_repeat('?,', count($entries) - 1) . '?)';
			foreach ($entries as $entry) {
				$values[] = is_object($entry) ? $entry->id() : $entry;
			}
		}
		$stm = $this->pdo->prepare($sql);

		if ($stm !== false && $stm->execute($values)) {
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
			/** @var list<array{id_entry:int|numeric-string,id_tag:int,name:string}> $result; */
			return $result;
		}
		$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
		Minz_Log::error('SQL error ' . __METHOD__ . json_encode($info));
		return null;
	}

	/**
	 * Produces an array: for each entry ID (prefixed by `e_`), associate a list of labels.
	 * Used by API and by JSON export, to speed up queries (would be very expensive to perform a label look-up on each entry individually).
	 * @param list<FreshRSS_Entry|numeric-string> $entries the list of entries for which to retrieve the labels.
	 * @return array<string,array<string>> An array of the shape `[e_id_entry => ["label 1", "label 2"]]`
	 */
	public function getEntryIdsTagNames(array $entries): array {
		$result = [];
		foreach ($this->getTagsForEntries($entries) ?? [] as $line) {
			$entryId = 'e_' . $line['id_entry'];
			$tagName = $line['name'];
			if (empty($result[$entryId])) {
				$result[$entryId] = [];
			}
			$result[$entryId][] = $tagName;
		}
		return $result;
	}

	/**
	 * @param iterable<array{id:int,name:string,attributes?:string,unreads?:int}> $listDAO
	 * @return array<int,FreshRSS_Tag> where the key is the label ID
	 */
	private static function daoToTags(iterable $listDAO): array {
		$list = [];
		foreach ($listDAO as $dao) {
			if (empty($dao['id']) || empty($dao['name'])) {
				continue;
			}
			$tag = new FreshRSS_Tag($dao['name']);
			$tag->_id($dao['id']);
			if (!empty($dao['attributes'])) {
				$tag->_attributes($dao['attributes']);
			}
			if (isset($dao['unreads'])) {
				$tag->_nbUnread($dao['unreads']);
			}
			$list[$tag->id()] = $tag;
		}
		return $list;
	}
}

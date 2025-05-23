<?php
declare(strict_types=1);

/**
 * This class is used to test database is well-constructed.
 */
class FreshRSS_DatabaseDAO extends Minz_ModelPdo {

	//MySQL error codes
	public const ER_BAD_FIELD_ERROR = '42S22';
	public const ER_BAD_TABLE_ERROR = '42S02';
	public const ER_DATA_TOO_LONG = '1406';

	/**
	 * Based on SQLite SQLITE_MAX_VARIABLE_NUMBER
	 */
	public const MAX_VARIABLE_NUMBER = 998;

	//MySQL InnoDB maximum index length for UTF8MB4
	//https://dev.mysql.com/doc/refman/8.0/en/innodb-restrictions.html
	public const LENGTH_INDEX_UNICODE = 191;

	public function create(): string {
		require_once(APP_PATH . '/SQL/install.sql.' . $this->pdo->dbType() . '.php');
		$db = FreshRSS_Context::systemConf()->db;

		try {
			$sql = $GLOBALS['SQL_CREATE_DB'];
			if (!is_string($sql)) {
				throw new Exception('SQL_CREATE_DB is not a string!');
			}
			$sql = sprintf($sql, empty($db['base']) ? '' : $db['base']);
			return $this->pdo->exec($sql) === false ? 'Error during CREATE DATABASE' : '';
		} catch (Exception $e) {
			syslog(LOG_DEBUG, __METHOD__ . ' notice: ' . $e->getMessage());
			return $e->getMessage();
		}
	}

	public function testConnection(): string {
		try {
			$sql = 'SELECT 1';
			$stm = $this->pdo->query($sql);
			if ($stm === false) {
				return 'Error during SQL connection test!';
			}
			$res = $stm->fetchAll(PDO::FETCH_COLUMN, 0);
			return $res == false ? 'Error during SQL connection fetch test!' : '';
		} catch (Exception $e) {
			syslog(LOG_DEBUG, __METHOD__ . ' warning: ' . $e->getMessage());
			return $e->getMessage();
		}
	}

	public function exits(): bool {
		$sql = 'SELECT * FROM `_entry` LIMIT 1';
		$stm = $this->pdo->query($sql);
		if ($stm !== false) {
			$res = $stm->fetchAll(PDO::FETCH_COLUMN, 0);
			if ($res !== false) {
				return true;
			}
		}
		return false;
	}

	public function tablesAreCorrect(): bool {
		$res = $this->fetchAssoc('SHOW TABLES');
		if ($res == null) {
			return false;
		}

		$tables = [
			$this->pdo->prefix() . 'category' => false,
			$this->pdo->prefix() . 'feed' => false,
			$this->pdo->prefix() . 'entry' => false,
			$this->pdo->prefix() . 'entrytmp' => false,
			$this->pdo->prefix() . 'tag' => false,
			$this->pdo->prefix() . 'entrytag' => false,
		];
		foreach ($res as $value) {
			$tables[array_pop($value)] = true;
		}

		return count(array_keys($tables, true, true)) === count($tables);
	}

	/** @return list<array{name:string,type:string,notnull:bool,default:mixed}> */
	public function getSchema(string $table): array {
		$res = $this->fetchAssoc('DESC `_' . $table . '`');
		return $res == null ? [] : $this->listDaoToSchema($res);
	}

	/** @param array<string> $schema */
	public function checkTable(string $table, array $schema): bool {
		$columns = $this->getSchema($table);
		if (count($columns) === 0 || count($schema) === 0) {
			return false;
		}

		$ok = count($columns) === count($schema);
		foreach ($columns as $c) {
			$ok &= in_array($c['name'], $schema, true);
		}

		return (bool)$ok;
	}

	public function categoryIsCorrect(): bool {
		return $this->checkTable('category', ['id', 'name']);
	}

	public function feedIsCorrect(): bool {
		return $this->checkTable('feed', [
			'id',
			'url',
			'category',
			'name',
			'website',
			'description',
			'lastUpdate',
			'priority',
			'pathEntries',
			'httpAuth',
			'error',
			'ttl',
			'attributes',
			'cache_nbEntries',
			'cache_nbUnreads',
		]);
	}

	public function entryIsCorrect(): bool {
		return $this->checkTable('entry', [
			'id',
			'guid',
			'title',
			'author',
			'content_bin',
			'link',
			'date',
			'lastSeen',
			'hash',
			'is_read',
			'is_favorite',
			'id_feed',
			'tags',
		]);
	}

	public function entrytmpIsCorrect(): bool {
		return $this->checkTable('entrytmp', [
			'id', 'guid', 'title', 'author', 'content_bin', 'link', 'date', 'lastSeen', 'hash', 'is_read', 'is_favorite', 'id_feed', 'tags'
		]);
	}

	public function tagIsCorrect(): bool {
		return $this->checkTable('tag', ['id', 'name', 'attributes']);
	}

	public function entrytagIsCorrect(): bool {
		return $this->checkTable('entrytag', ['id_tag', 'id_entry']);
	}

	/**
	 * @param array<string,string|int|bool|null> $dao
	 * @return array{name:string,type:string,notnull:bool,default:mixed}
	 */
	public function daoToSchema(array $dao): array {
		return [
			'name' => is_string($dao['Field'] ?? null) ? $dao['Field'] : '',
			'type' => is_string($dao['Type'] ?? null) ? strtolower($dao['Type']) : '',
			'notnull' => empty($dao['Null']),
			'default' => is_scalar($dao['Default'] ?? null) ? $dao['Default'] : null,
		];
	}

	/**
	 * @param array<array<string,string|int|bool|null>> $listDAO
	 * @return list<array{name:string,type:string,notnull:bool,default:mixed}>
	 */
	public function listDaoToSchema(array $listDAO): array {
		$list = [];

		foreach ($listDAO as $dao) {
			$list[] = $this->daoToSchema($dao);
		}

		return $list;
	}

	private static ?string $staticVersion = null;
	/**
	 * To override the database version. Useful for testing.
	 */
	public static function setStaticVersion(?string $version): void {
		self::$staticVersion = $version;
	}

	protected function selectVersion(): string {
		return $this->fetchValue('SELECT version()') ?? '';
	}

	public function version(): string {
		if (self::$staticVersion !== null) {
			return self::$staticVersion;
		}
		static $version = null;
		if (!is_string($version)) {
			$version = $this->selectVersion();
		}
		return $version;
	}

	final public function isMariaDB(): bool {
		// MariaDB includes its name in version, but not MySQL
		return str_contains($this->version(), 'MariaDB');
	}

	public function size(bool $all = false): int {
		$db = FreshRSS_Context::systemConf()->db;

		// MariaDB does not refresh size information automatically
		$sql = <<<'SQL'
ANALYZE TABLE `_category`, `_feed`, `_entry`, `_entrytmp`, `_tag`, `_entrytag`
SQL;
		$stm = $this->pdo->query($sql);
		if ($stm !== false) {
			$stm->fetchAll();
		}

		//MySQL:
		$sql = <<<'SQL'
SELECT SUM(DATA_LENGTH + INDEX_LENGTH + DATA_FREE)
FROM information_schema.TABLES WHERE TABLE_SCHEMA=:table_schema
SQL;
		$values = [':table_schema' => $db['base']];
		if (!$all) {
			$sql .= ' AND table_name LIKE :table_name';
			$values[':table_name'] = $this->pdo->prefix() . '%';
		}
		$res = $this->fetchColumn($sql, 0, $values);
		return isset($res[0]) ? (int)($res[0]) : -1;
	}

	public function optimize(): bool {
		$ok = true;
		$tables = ['category', 'feed', 'entry', 'entrytmp', 'tag', 'entrytag'];

		foreach ($tables as $table) {
			$sql = 'OPTIMIZE TABLE `_' . $table . '`';	//MySQL
			$stm = $this->pdo->query($sql);
			if ($stm === false || $stm->fetchAll(PDO::FETCH_ASSOC) == false) {
				$ok = false;
				$info = $stm === false ? $this->pdo->errorInfo() : $stm->errorInfo();
				Minz_Log::warning(__METHOD__ . ' error: ' . $sql . ' : ' . json_encode($info));
			}
		}
		return $ok;
	}

	public function minorDbMaintenance(): void {
		$catDAO = FreshRSS_Factory::createCategoryDao();
		$catDAO->resetDefaultCategoryName();

		include_once(APP_PATH . '/SQL/install.sql.' . $this->pdo->dbType() . '.php');
		if (!empty($GLOBALS['SQL_UPDATE_MINOR']) && is_string($GLOBALS['SQL_UPDATE_MINOR'])) {
			$sql = $GLOBALS['SQL_UPDATE_MINOR'];
			$isMariaDB = false;

			if ($this->pdo->dbType() === 'mysql') {
				$isMariaDB = $this->isMariaDB();
				if (!$isMariaDB) {
					// MySQL does not support `DROP INDEX IF EXISTS` yet https://dev.mysql.com/doc/refman/8.3/en/drop-index.html
					// but MariaDB does https://mariadb.com/kb/en/drop-index/
					$sql = str_replace('DROP INDEX IF EXISTS', 'DROP INDEX', $sql);
				}
			}

			if ($this->pdo->exec($sql) === false) {
				$info = $this->pdo->errorInfo();
				if ($this->pdo->dbType() === 'mysql' &&
					!$isMariaDB && is_string($info[2] ?? null) && (stripos($info[2], "Can't DROP ") !== false)) {
					// Too bad for MySQL, but ignore error
					return;
				}
				Minz_Log::error('SQL error ' . __METHOD__ . json_encode($this->pdo->errorInfo()));
			}
		}
	}

	private static function stdError(string $error): bool {
		if (defined('STDERR')) {
			fwrite(STDERR, $error . "\n");
		}
		Minz_Log::error($error);
		return false;
	}

	public const SQLITE_EXPORT = 1;
	public const SQLITE_IMPORT = 2;

	public function dbCopy(string $filename, int $mode, bool $clearFirst = false, bool $verbose = true): bool {
		if (!extension_loaded('pdo_sqlite')) {
			return self::stdError('PHP extension pdo_sqlite is missing!');
		}
		$error = '';

		$databaseDAO = FreshRSS_Factory::createDatabaseDAO();
		$userDAO = FreshRSS_Factory::createUserDao();
		$catDAO = FreshRSS_Factory::createCategoryDao();
		$feedDAO = FreshRSS_Factory::createFeedDao();
		$entryDAO = FreshRSS_Factory::createEntryDao();
		$tagDAO = FreshRSS_Factory::createTagDao();

		switch ($mode) {
			case self::SQLITE_EXPORT:
				if (@filesize($filename) > 0) {
					$error = 'Error: SQLite export file already exists: ' . $filename;
				}
				break;
			case self::SQLITE_IMPORT:
				if (!is_readable($filename)) {
					$error = 'Error: SQLite import file is not readable: ' . $filename;
				} elseif ($clearFirst) {
					$userDAO->deleteUser();
					$userDAO = FreshRSS_Factory::createUserDao();
					if ($this->pdo->dbType() === 'sqlite') {
						//We cannot just delete the .sqlite file otherwise PDO gets buggy.
						//SQLite is the only one with database-level optimization, instead of at table level.
						$this->optimize();
					}
				} else {
					if ($databaseDAO->exits()) {
						$nbEntries = $entryDAO->countUnreadRead();
						if (isset($nbEntries['all']) && $nbEntries['all'] > 0) {
							$error = 'Error: Destination database already contains some entries!';
						}
					}
				}
				break;
			default:
				$error = 'Invalid copy mode!';
				break;
		}
		if ($error != '') {
			return self::stdError($error);
		}

		$sqlite = null;

		try {
			$sqlite = new Minz_PdoSqlite('sqlite:' . $filename);
			$sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		} catch (Exception $e) {
			$error = 'Error while initialising SQLite copy: ' . $e->getMessage();
			return self::stdError($error);
		}

		Minz_ModelPdo::clean();
		$userDAOSQLite = new FreshRSS_UserDAO('', $sqlite);
		$categoryDAOSQLite = new FreshRSS_CategoryDAOSQLite('', $sqlite);
		$feedDAOSQLite = new FreshRSS_FeedDAOSQLite('', $sqlite);
		$entryDAOSQLite = new FreshRSS_EntryDAOSQLite('', $sqlite);
		$tagDAOSQLite = new FreshRSS_TagDAOSQLite('', $sqlite);

		switch ($mode) {
			case self::SQLITE_EXPORT:
				$userFrom = $userDAO; $userTo = $userDAOSQLite;
				$catFrom = $catDAO; $catTo = $categoryDAOSQLite;
				$feedFrom = $feedDAO; $feedTo = $feedDAOSQLite;
				$entryFrom = $entryDAO; $entryTo = $entryDAOSQLite;
				$tagFrom = $tagDAO; $tagTo = $tagDAOSQLite;
				break;
			case self::SQLITE_IMPORT:
				$userFrom = $userDAOSQLite; $userTo = $userDAO;
				$catFrom = $categoryDAOSQLite; $catTo = $catDAO;
				$feedFrom = $feedDAOSQLite; $feedTo = $feedDAO;
				$entryFrom = $entryDAOSQLite; $entryTo = $entryDAO;
				$tagFrom = $tagDAOSQLite; $tagTo = $tagDAO;
				break;
			default:
				return false;
		}

		$idMaps = [];

		if (defined('STDERR') && $verbose) {
			fwrite(STDERR, "Start SQL copy…\n");
		}

		$userTo->createUser();

		$catTo->beginTransaction();
		foreach ($catFrom->selectAll() as $category) {
			$cat = $catTo->searchByName($category['name']);	//Useful for the default category
			if ($cat != null) {
				$catId = $cat->id();
			} else {
				$catId = $catTo->addCategory($category);
				if ($catId == false) {
					$error = 'Error during SQLite copy of categories!';
					return self::stdError($error);
				}
			}
			$idMaps['c' . $category['id']] = $catId;
		}
		foreach ($feedFrom->selectAll() as $feed) {
			$feed['category'] = empty($idMaps['c' . $feed['category']]) ? FreshRSS_CategoryDAO::DEFAULTCATEGORYID : $idMaps['c' . $feed['category']];
			$feedId = $feedTo->addFeed($feed);
			if ($feedId == false) {
				$error = 'Error during SQLite copy of feeds!';
				return self::stdError($error);
			}
			$idMaps['f' . $feed['id']] = $feedId;
		}
		$catTo->commit();

		$nbEntries = $entryFrom->count();
		$n = 0;
		$entryTo->beginTransaction();
		foreach ($entryFrom->selectAll() as $entry) {
			$n++;
			if (!empty($idMaps['f' . $entry['id_feed']])) {
				$entry['id_feed'] = $idMaps['f' . $entry['id_feed']];
				if (!$entryTo->addEntry($entry, false)) {
					$error = 'Error during SQLite copy of entries!';
					return self::stdError($error);
				}
			}
			if ($n % 100 === 1 && defined('STDERR') && $verbose) {	//Display progression
				fwrite(STDERR, "\033[0G" . $n . '/' . $nbEntries);
			}
		}
		if (defined('STDERR') && $verbose) {
			fwrite(STDERR, "\033[0G" . $n . '/' . $nbEntries . "\n");
		}
		$entryTo->commit();
		$feedTo->updateCachedValues();

		$idMaps = [];

		$tagTo->beginTransaction();
		foreach ($tagFrom->selectAll() as $tag) {
			$tagId = $tagTo->addTag($tag);
			if ($tagId == false) {
				$error = 'Error during SQLite copy of tags!';
				return self::stdError($error);
			}
			$idMaps['t' . $tag['id']] = $tagId;
		}
		foreach ($tagFrom->selectEntryTag() as $entryTag) {
			if (!empty($idMaps['t' . $entryTag['id_tag']])) {
				$entryTag['id_tag'] = $idMaps['t' . $entryTag['id_tag']];
				if (!$tagTo->tagEntry($entryTag['id_tag'], (string)$entryTag['id_entry'])) {
					$error = 'Error during SQLite copy of entry-tags!';
					return self::stdError($error);
				}
			}
		}
		$tagTo->commit();

		return true;
	}
}

<?php
declare(strict_types=1);

class FreshRSS_UserDAO extends Minz_ModelPdo {

	public function createUser(): bool {
		require(APP_PATH . '/SQL/install.sql.' . $this->pdo->dbType() . '.php');

		try {
			$sql = $GLOBALS['SQL_CREATE_TABLES'];
			if (!is_string($sql)) {
				throw new Exception('SQL_CREATE_TABLES is not a string!');
			}
			$ok = $this->pdo->exec($sql) !== false;	//Note: Only exec() can take multiple statements safely.
		} catch (Exception $e) {
			$ok = false;
			Minz_Log::error('Error while creating database for user ' . $this->current_user . ': ' . $e->getMessage());
		}

		if ($ok) {
			return true;
		} else {
			$info = $this->pdo->errorInfo();
			Minz_Log::error(__METHOD__ . ' error: ' . json_encode($info));
			return false;
		}
	}

	public function deleteUser(): bool {
		if (defined('STDERR')) {
			fwrite(STDERR, 'Deleting SQL data for user “' . $this->current_user . "”…\n");
		}

		require(APP_PATH . '/SQL/install.sql.' . $this->pdo->dbType() . '.php');
		$sql = $GLOBALS['SQL_DROP_TABLES'];
		if (!is_string($sql)) {
			throw new Exception('SQL_DROP_TABLES is not a string!');
		}
		$ok = $this->pdo->exec($sql) !== false;

		if ($ok) {
			$this->close();
			return true;
		} else {
			$info = $this->pdo->errorInfo();
			Minz_Log::error(__METHOD__ . ' error: ' . json_encode($info));
			return false;
		}
	}

	public static function exists(string $username): bool {
		return is_dir(USERS_PATH . '/' . $username);
	}

	/** Update time of the last modification action by the user (e.g., mark an article as read) */
	public static function touch(string $username = ''): bool {
		if ($username === '') {
			$username = Minz_User::name() ?? Minz_User::INTERNAL_USER;
		} elseif (!FreshRSS_user_Controller::checkUsername($username)) {
			return false;
		}
		return touch(USERS_PATH . '/' . $username . '/config.php');
	}

	/** Time of the last modification action by the user (e.g., mark an article as read) */
	public static function mtime(string $username): int {
		return @filemtime(USERS_PATH . '/' . $username . '/config.php') ?: 0;
	}

	/** Update time of the last new content automatically received by the user (e.g., cron job, WebSub) */
	public static function ctouch(string $username = ''): bool {
		if ($username === '') {
			$username = Minz_User::name() ?? Minz_User::INTERNAL_USER;
		} elseif (!FreshRSS_user_Controller::checkUsername($username)) {
			return false;
		}
		return touch(USERS_PATH . '/' . $username . '/' . LOG_FILENAME);
	}

	/** Time of the last new content automatically received by the user (e.g., cron job, WebSub) */
	public static function ctime(string $username): int {
		return @filemtime(USERS_PATH . '/' . $username . '/' . LOG_FILENAME) ?: 0;
	}
}

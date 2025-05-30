<?php
declare(strict_types=1);

class FreshRSS_Tag extends Minz_Model {
	use FreshRSS_AttributesTrait, FreshRSS_FilterActionsTrait;

	private int $id = 0;
	private string $name;
	private int $nbEntries = -1;
	private int $nbUnread = -1;

	public function __construct(string $name = '') {
		$this->_name($name);
	}

	public function id(): int {
		return $this->id;
	}

	public function _id(int $value): void {
		$this->id = $value;
	}

	public function name(): string {
		return $this->name;
	}

	public function _name(string $value): void {
		$this->name = trim($value);
	}

	public function nbEntries(): int {
		if ($this->nbEntries < 0) {
			$tagDAO = FreshRSS_Factory::createTagDao();
			$this->nbEntries = $tagDAO->countEntries($this->id()) ?: 0;
		}
		return $this->nbEntries;
	}

	public function _nbEntries(int $value): void {
		$this->nbEntries = $value;
	}

	public function nbUnread(): int {
		if ($this->nbUnread < 0) {
			$tagDAO = FreshRSS_Factory::createTagDao();
			$this->nbUnread = $tagDAO->countNotRead($this->id()) ?: 0;
		}
		return $this->nbUnread;
	}

	/** @param int|numeric-string $value */
	public function _nbUnread(int|string $value): void {
		$this->nbUnread = (int)$value;
	}
}

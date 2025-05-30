<?php
declare(strict_types=1);

require_once __DIR__ . '/I18nValue.php';

class I18nFile {

	/**
	 * @param array<mixed,mixed> $array
	 * @phpstan-assert-if-true array<string,string|array<string,mixed>> $array
	 */
	public static function is_array_recursive_string(array $array): bool {
		foreach ($array as $key => $value) {
			if (!is_string($key)) {
				return false;
			}
			if (!is_string($value) && !(is_array($value) && self::is_array_recursive_string($value))) {
				return false;
			}
		}
		return true;
	}

	/**
	 * @return array<string,array<string,array<string,I18nValue>>>
	 */
	public function load(): array {
		$i18n = [];
		$dirs = new DirectoryIterator(I18N_PATH);
		foreach ($dirs as $dir) {
			if ($dir->isDot()) {
				continue;
			}
			$files = new DirectoryIterator($dir->getPathname());
			foreach ($files as $file) {
				if (!$file->isFile()) {
					continue;
				}

				$i18n[$dir->getFilename()][$file->getFilename()] = $this->flatten($this->process($file->getPathname()), $file->getBasename('.php'));
			}
		}

		return $i18n;
	}

	/**
	 * @param array<string,array<string,array<string,I18nValue>>> $i18n
	 */
	public function dump(array $i18n): void {
		foreach ($i18n as $language => $file) {
			$dir = I18N_PATH . DIRECTORY_SEPARATOR . $language;
			if (!file_exists($dir)) {
				mkdir($dir, 0770, true);
			}
			foreach ($file as $name => $content) {
				$filename = $dir . DIRECTORY_SEPARATOR . $name;
				file_put_contents($filename, $this->format($content));
			}
		}
	}

	/**
	 * Process the content of an i18n file
	 * @return array<string,string|array<string,mixed>>
	 */
	private function process(string $filename): array {
		$fileContent = file_get_contents($filename);
		if (!is_string($fileContent)) {
			return [];
		}
		$content = str_replace('<?php', '', $fileContent);

		$content = preg_replace([
			"#',\s*//\s*TODO.*#i",
			"#',\s*//\s*DIRTY.*#i",
			"#',\s*//\s*IGNORE.*#i",
		], [
			' -> todo\',',
			' -> dirty\',',
			' -> ignore\',',
		], $content);

		try {
			$content = eval($content);
		} catch (ParseError $ex) {
			if (defined('STDERR')) {
				fwrite(STDERR, "Error while processing: $filename\n");
				fwrite(STDERR, $ex->getMessage());
			}
			die(1);
		}

		if (is_array($content) && self::is_array_recursive_string($content)) {
			return $content;
		}

		return [];
	}

	/**
	 * Flatten an array of translation
	 *
	 * @param array<string,I18nValue|string|array<string,I18nValue>|mixed> $translation
	 * @return array<string,I18nValue>
	 */
	private function flatten(array $translation, string $prefix = ''): array {
		$a = [];

		if ('' !== $prefix) {
			$prefix .= '.';
		}

		foreach ($translation as $key => $value) {
			if (is_array($value) && is_array_keys_string($value)) {
				$a += $this->flatten($value, $prefix . $key);
			} elseif (is_string($value) || $value instanceof I18nValue) {
				$a[$prefix . $key] = new I18nValue($value);
			}
		}

		return $a;
	}

	/**
	 * Unflatten an array of translation
	 *
	 * The first key is dropped since it represents the filename and we have
	 * no use of it.
	 *
	 * @param array<string,I18nValue> $translation
	 * @return array<string,array<string,I18nValue>>
	 */
	private function unflatten(array $translation): array {
		$a = [];

		ksort($translation, SORT_NATURAL);
		foreach ($translation as $compoundKey => $value) {
			$keys = explode('.', $compoundKey);
			array_shift($keys);
			eval("\$a['" . implode("']['", $keys) . "'] = '" . addcslashes($value->__toString(), "'") . "';");
		}

		return $a;
	}

	/**
	 * Format an array of translation
	 *
	 * It takes an array of translation and format it to be dumped in a
	 * translation file. The array is first converted to a string then some
	 * formatting regexes are applied to match the original content.
	 *
	 * @param array<string,I18nValue> $translation
	 */
	private function format(array $translation): string {
		$translation = var_export($this->unflatten($translation), true);
		$patterns = [
			'/ -> todo\',/',
			'/ -> dirty\',/',
			'/ -> ignore\',/',
			'/array \(/',
			'/=>\s*array/',
			'/(\w) {2}/',
			'/ {2}/',
		];
		$replacements = [
			"',\t// TODO", // Double quoting is mandatory to have a tab instead of the \t string
			"',\t// DIRTY", // Double quoting is mandatory to have a tab instead of the \t string
			"',\t// IGNORE", // Double quoting is mandatory to have a tab instead of the \t string
			'array(',
			'=> array',
			'$1 ',
			"\t", // Double quoting is mandatory to have a tab instead of the \t string
		];
		$translation = preg_replace($patterns, $replacements, $translation);

		return <<<OUTPUT
<?php

/******************************************************************************/
/* Each entry of that file can be associated with a comment to indicate its   */
/* state. When there is no comment, it means the entry is fully translated.   */
/* The recognized comments are (comment matching is case-insensitive):        */
/*   + TODO: the entry has never been translated.                             */
/*   + DIRTY: the entry has been translated but needs to be updated.          */
/*   + IGNORE: the entry does not need to be translated.                      */
/* When a comment is not recognized, it is discarded.                         */
/******************************************************************************/

return {$translation};

OUTPUT;
	}
}

<?php
declare(strict_types=1);
require(__DIR__ . '/../constants.php');
require(LIB_PATH . '/lib_rss.php');	//Includes class autoloader
require(LIB_PATH . '/favicons.php');
require(LIB_PATH . '/http-conditional.php');

function show_default_favicon(int $cacheSeconds = 3600): void {
	$default_mtime = @filemtime(DEFAULT_FAVICON) ?: 0;
	if (!httpConditional($default_mtime, $cacheSeconds, 2)) {
		header('Content-Type: image/x-icon');
		header('Content-Disposition: inline; filename="default_favicon.ico"');
		readfile(DEFAULT_FAVICON);
	}
}

$id = $_SERVER['QUERY_STRING'] ?? '0';
if (!is_string($id) || !ctype_xdigit($id)) {
	$id = '0';
}

$txt = FAVICONS_DIR . $id . '.txt';
$ico = FAVICONS_DIR . $id . '.ico';

$ico_mtime = @filemtime($ico) ?: 0;
$txt_mtime = @filemtime($txt) ?: 0;

if ($ico_mtime == false || $ico_mtime < $txt_mtime || ($ico_mtime < time() - (mt_rand(15, 20) * 86400))) {
	if ($txt_mtime == false) {
		show_default_favicon(1800);
		exit();
	}

	// no ico file or we should download a new one.
	$url = file_get_contents($txt);
	if ($url === false) {
		show_default_favicon(1800);
		exit();
	}
	if (!download_favicon($url, $ico)) {
		// Download failed
		if ($ico_mtime == false) {
			show_default_favicon(86400);
			exit();
		}

		touch($ico);
	}
}

header("Content-Security-Policy: default-src 'none'; img-src 'self'; style-src 'self';");
if (!httpConditional($ico_mtime, mt_rand(14, 21) * 86400, 2)) {
	$ico_content_type = contentType($ico);
	header('Content-Type: ' . $ico_content_type);
	header('Content-Disposition: inline; filename="' . $id . '.ico"');
	readfile($ico);
}

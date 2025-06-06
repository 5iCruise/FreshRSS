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

return array(
	'api' => array(
		'documentation' => 'Copy the following URL to use it within an external tool.',	// IGNORE
		'title' => 'API',	// IGNORE
	),
	'bookmarklet' => array(
		'documentation' => 'Drag this button to your bookmarks toolbar or right-click it and choose “Bookmark This Link”. Then click the “Subscribe” button in any page you want to subscribe to.',	// IGNORE
		'label' => 'Subscribe',	// IGNORE
		'title' => 'Bookmarklet',	// IGNORE
	),
	'category' => array(
		'_' => 'Category',	// IGNORE
		'add' => 'Add a category',	// IGNORE
		'archiving' => 'Archiving',	// IGNORE
		'dynamic_opml' => array(
			'_' => 'Dynamic OPML',	// IGNORE
			'help' => 'Provide the URL to an <a href="http://opml.org/" target="_blank">OPML file</a> to dynamically populate this category with feeds',	// IGNORE
		),
		'empty' => 'Empty category',	// IGNORE
		'expand' => 'Expand category',	// IGNORE
		'information' => 'Information',	// IGNORE
		'open' => 'Open category',	// IGNORE
		'opml_url' => 'OPML URL',	// IGNORE
		'position' => 'Display position',	// IGNORE
		'position_help' => 'To control category sort order',	// IGNORE
		'title' => 'Title',	// IGNORE
	),
	'feed' => array(
		'accept_cookies' => 'Accept cookies',	// IGNORE
		'accept_cookies_help' => 'Allow the feed server to set cookies (stored in memory for the duration of the request only)',	// IGNORE
		'add' => 'Add a feed',	// IGNORE
		'advanced' => 'Advanced',	// IGNORE
		'archiving' => 'Archiving',	// IGNORE
		'auth' => array(
			'configuration' => 'Login',	// IGNORE
			'help' => 'Allows access to HTTP protected RSS feeds',	// IGNORE
			'http' => 'HTTP Authentication',	// IGNORE
			'password' => 'HTTP password',	// IGNORE
			'username' => 'HTTP username',	// IGNORE
		),
		'clear_cache' => 'Always clear cache',	// IGNORE
		'content_action' => array(
			'_' => 'Content action when fetching the article content',	// IGNORE
			'append' => 'Add after existing content',	// IGNORE
			'prepend' => 'Add before existing content',	// IGNORE
			'replace' => 'Replace existing content',	// IGNORE
		),
		'content_retrieval' => 'Content retrieval',	// IGNORE
		'css_cookie' => 'Use Cookies when fetching the article content',	// IGNORE
		'css_cookie_help' => 'Example: <kbd>foo=bar; gdpr_consent=true; cookie=value</kbd>',	// IGNORE
		'css_help' => 'Retrieves truncated RSS feeds (caution, requires more time!)',	// IGNORE
		'css_path' => 'Article CSS selector on original website',	// IGNORE
		'css_path_filter' => array(
			'_' => 'CSS selector of the elements to remove',	// IGNORE
			'help' => 'A CSS selector may be a list such as: <kbd>footer, aside, p[data-sanitized-class~="menu"]</kbd>',	// IGNORE
		),
		'description' => 'Description',	// IGNORE
		'empty' => 'This feed is empty. Please verify that it is still maintained.',	// IGNORE
		'error' => 'This feed has encountered a problem. If this situation persists, please verify that it is still reachable.',	// IGNORE
		'export-as-opml' => array(
			'download' => 'Download',	// IGNORE
			'help' => 'XML file (data subset. <a href="https://freshrss.github.io/FreshRSS/en/developers/OPML.html" target="_blank">See documentation</a>)',	// IGNORE
			'label' => 'Export as OPML',	// IGNORE
		),
		'filteractions' => array(
			'_' => 'Filter actions',	// IGNORE
			'help' => 'Write one search filter per line. Operators <a href="https://freshrss.github.io/FreshRSS/en/users/10_filter.html#with-the-search-field" target="_blank">see documentation</a>.',	// IGNORE
		),
		'http_headers' => 'HTTP Headers',	// IGNORE
		'http_headers_help' => 'Headers are separated by a newline, and the name and value of a header are separated by a colon (e.g: <kbd><code>Accept: application/atom+xml<br />Authorization: Bearer some-token</code></kbd>).',	// IGNORE
		'information' => 'Information',	// IGNORE
		'keep_min' => 'Minimum number of articles to keep',	// IGNORE
		'kind' => array(
			'_' => 'Type of feed source',	// IGNORE
			'html_json' => array(
				'_' => 'HTML + XPath + JSON dot notation (JSON in HTML)',	// IGNORE
				'xpath' => array(
					'_' => 'XPath for JSON in HTML',	// IGNORE
					'help' => 'Example: <code>normalize-space(//script[@type="application/json"])</code> (single JSON)<br />or: <code>//script[@type="application/ld+json"]</code> (one JSON object per article)',	// IGNORE
				),
			),
			'html_xpath' => array(
				'_' => 'HTML + XPath (Web scraping)',	// IGNORE
				'feed_title' => array(
					'_' => 'feed title',	// IGNORE
					'help' => 'Example: <code>//title</code> or a static string: <code>"My custom feed"</code>',	// IGNORE
				),
				'help' => '<dfn><a href="https://www.w3.org/TR/xpath-10/" target="_blank">XPath 1.0</a></dfn> is a standard query language for advanced users, and which FreshRSS supports to enable Web scraping.',	// IGNORE
				'item' => array(
					'_' => 'finding news <strong>items</strong><br /><small>(most important)</small>',	// IGNORE
					'help' => 'Example: <code>//div[@class="news-item"]</code>',	// IGNORE
				),
				'item_author' => array(
					'_' => 'item author',	// IGNORE
					'help' => 'Can also be a static string. Example: <code>"Anonymous"</code>',	// IGNORE
				),
				'item_categories' => 'item tags',	// IGNORE
				'item_content' => array(
					'_' => 'item content',	// IGNORE
					'help' => 'Example to take the full item: <code>.</code>',	// IGNORE
				),
				'item_thumbnail' => array(
					'_' => 'item thumbnail',	// IGNORE
					'help' => 'Example: <code>descendant::img/@src</code>',	// IGNORE
				),
				'item_timeFormat' => array(
					'_' => 'Custom date/time format',	// IGNORE
					'help' => 'Optional. A format supported by <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a> such as <code>d-m-Y H:i:s</code>',	// IGNORE
				),
				'item_timestamp' => array(
					'_' => 'item date',	// IGNORE
					'help' => 'The result will be parsed by <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a>',	// IGNORE
				),
				'item_title' => array(
					'_' => 'item title',	// IGNORE
					'help' => 'Use in particular the <a href="https://developer.mozilla.org/docs/Web/XPath/Axes" target="_blank">XPath axis</a> <code>descendant::</code> like <code>descendant::h2</code>',	// IGNORE
				),
				'item_uid' => array(
					'_' => 'item unique ID',	// IGNORE
					'help' => 'Optional. Example: <code>descendant::div/@data-uri</code>',	// IGNORE
				),
				'item_uri' => array(
					'_' => 'item link (URL)',	// IGNORE
					'help' => 'Example: <code>descendant::a/@href</code>',	// IGNORE
				),
				'relative' => 'XPath (relative to item) for:',	// IGNORE
				'xpath' => 'XPath for:',	// IGNORE
			),
			'json_dotnotation' => array(
				'_' => 'JSON (dot notation)',	// IGNORE
				'feed_title' => array(
					'_' => 'feed title',	// IGNORE
					'help' => 'Example: <code>meta.title</code> or a static string: <code>"My custom feed"</code>',	// IGNORE
				),
				'help' => 'A JSON dot notated uses dots between objects and brackets for arrays (e.g. <code>data.items[0].title</code>)',	// IGNORE
				'item' => array(
					'_' => 'finding news <strong>items</strong><br /><small>(most important)</small>',	// IGNORE
					'help' => 'JSON path to the array containing the items, e.g. <code>$</code> or <code>newsItems</code>',	// IGNORE
				),
				'item_author' => 'item author',	// IGNORE
				'item_categories' => 'item tags',	// IGNORE
				'item_content' => array(
					'_' => 'item content',	// IGNORE
					'help' => 'Key under which the content is found, e.g. <code>content</code>',	// IGNORE
				),
				'item_thumbnail' => array(
					'_' => 'item thumbnail',	// IGNORE
					'help' => 'Example: <code>image</code>',	// IGNORE
				),
				'item_timeFormat' => array(
					'_' => 'Custom date/time format',	// IGNORE
					'help' => 'Optional. A format supported by <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a> such as <code>d-m-Y H:i:s</code>',	// IGNORE
				),
				'item_timestamp' => array(
					'_' => 'item date',	// IGNORE
					'help' => 'The result will be parsed by <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a>',	// IGNORE
				),
				'item_title' => 'item title',	// IGNORE
				'item_uid' => 'item unique ID',	// IGNORE
				'item_uri' => array(
					'_' => 'item link (URL)',	// IGNORE
					'help' => 'Example: <code>permalink</code>',	// IGNORE
				),
				'json' => 'dot notation for:',	// IGNORE
				'relative' => 'dot notated path (relative to item) for:',	// IGNORE
			),
			'jsonfeed' => 'JSON Feed',	// IGNORE
			'rss' => 'RSS / Atom (default)',	// IGNORE
			'xml_xpath' => 'XML + XPath',	// IGNORE
		),
		'maintenance' => array(
			'clear_cache' => 'Clear cache',	// IGNORE
			'clear_cache_help' => 'Clear the cache for this feed.',	// IGNORE
			'reload_articles' => 'Reload articles',	// IGNORE
			'reload_articles_help' => 'Reload that many articles and fetch complete content if a selector is defined.',	// IGNORE
			'title' => 'Maintenance',	// IGNORE
		),
		'max_http_redir' => 'Max HTTP redirects',	// IGNORE
		'max_http_redir_help' => 'Set to 0 or leave blank to disable, -1 for unlimited redirects',	// IGNORE
		'method' => array(
			'_' => 'HTTP Method',	// IGNORE
		),
		'method_help' => 'The POST payload has automatic support for <code>application/x-www-form-urlencoded</code> and <code>application/json</code>',	// IGNORE
		'method_postparams' => 'Payload for POST',	// IGNORE
		'moved_category_deleted' => 'When you remove a category, its feeds are automatically classified under <em>%s</em>.',	// IGNORE
		'mute' => array(
			'_' => 'mute',	// IGNORE
			'state_is_muted' => 'This feed is muted',	// IGNORE
		),
		'no_selected' => 'No feed selected.',	// IGNORE
		'number_entries' => '%d articles',	// IGNORE
		'open_feed' => 'Open feed %s',	// IGNORE
		'path_entries_conditions' => 'Conditions for content retrieval',	// IGNORE
		'priority' => array(
			'_' => 'Visibility',	// IGNORE
			'archived' => 'Do not show (archived)',	// IGNORE
			'category' => 'Show in its category',	// IGNORE
			'important' => 'Show in important feeds',	// IGNORE
			'main_stream' => 'Show in main stream',	// IGNORE
		),
		'proxy' => 'Set a proxy for fetching this feed',	// IGNORE
		'proxy_help' => 'Select a protocol (e.g: SOCKS5) and enter the proxy address (e.g: <kbd>127.0.0.1:1080</kbd> or <kbd>username:password@127.0.0.1:1080</kbd>)',	// IGNORE
		'selector_preview' => array(
			'show_raw' => 'Show source code',	// IGNORE
			'show_rendered' => 'Show content',	// IGNORE
		),
		'show' => array(
			'all' => 'All feeds',	// IGNORE
			'error' => 'Show only feeds with errors',	// IGNORE
		),
		'showing' => array(
			'error' => 'Showing only feeds with errors',	// IGNORE
		),
		'ssl_verify' => 'Verify SSL security',	// IGNORE
		'stats' => 'Statistics',	// IGNORE
		'think_to_add' => 'You may add some feeds.',	// IGNORE
		'timeout' => 'Timeout in seconds',	// IGNORE
		'title' => 'Title',	// IGNORE
		'title_add' => 'Add an RSS feed',	// IGNORE
		'ttl' => 'Do not automatically refresh more often than',	// IGNORE
		'unicityCriteria' => array(
			'_' => 'Article unicity criteria',	// IGNORE
			'forced' => '<span title="Block the unicity criteria, even when the feed has duplicate articles">forced</span>',	// IGNORE
			'help' => 'Relevant for invalid feeds.<br />⚠️ Changing the policy will create duplicates.',	// IGNORE
			'id' => 'Standard ID (default)',	// IGNORE
			'link' => 'Link',	// IGNORE
			'sha1:link_published' => 'Link + Date',	// IGNORE
			'sha1:link_published_title' => 'Link + Date + Title',	// IGNORE
			'sha1:link_published_title_content' => 'Link + Date + Title + Content',	// IGNORE
		),
		'url' => 'Feed URL',	// IGNORE
		'useragent' => 'Set the user agent for fetching this feed',	// IGNORE
		'useragent_help' => 'Example: <kbd>Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0)</kbd>',	// IGNORE
		'validator' => 'Check the validity of the feed',	// IGNORE
		'website' => 'Website URL',	// IGNORE
		'websub' => 'Instant notifications with WebSub',	// IGNORE
	),
	'import_export' => array(
		'export' => array(
			'_' => 'Export',	// IGNORE
			'sqlite' => 'Download user database as SQLite',	// TODO
		),
		'export_labelled' => 'Export your labeled articles',
		'export_opml' => 'Export list of feeds (OPML)',	// IGNORE
		'export_starred' => 'Export your favorites',
		'feed_list' => 'List of %s articles',	// IGNORE
		'file_to_import' => 'File to import<br />(OPML, JSON or ZIP)',	// IGNORE
		'file_to_import_no_zip' => 'File to import<br />(OPML or JSON)',	// IGNORE
		'import' => 'Import',	// IGNORE
		'starred_list' => 'List of favorite articles',
		'title' => 'Import / export',	// IGNORE
	),
	'menu' => array(
		'add' => 'Add a feed or category',	// IGNORE
		'import_export' => 'Import / export',	// IGNORE
		'label_management' => 'Label management',	// IGNORE
		'stats' => array(
			'idle' => 'Idle feeds',	// IGNORE
			'main' => 'Main statistics',	// IGNORE
			'repartition' => 'Articles repartition',	// IGNORE
		),
		'subscription_management' => 'Subscription management',	// IGNORE
		'subscription_tools' => 'Subscription tools',	// IGNORE
	),
	'tag' => array(
		'auto_label' => 'Add this label to new articles',	// IGNORE
		'name' => 'Name',	// IGNORE
		'new_name' => 'New name',	// IGNORE
		'old_name' => 'Old name',	// IGNORE
	),
	'title' => array(
		'_' => 'Subscription management',	// IGNORE
		'add' => 'Add a feed or category',	// IGNORE
		'add_category' => 'Add a category',	// IGNORE
		'add_dynamic_opml' => 'Add dynamic OPML',	// IGNORE
		'add_feed' => 'Add a feed',	// IGNORE
		'add_label' => 'Add a label',	// IGNORE
		'add_opml_category' => 'OPML category name',	// IGNORE
		'delete_label' => 'Delete a label',	// IGNORE
		'feed_management' => 'RSS feeds management',	// IGNORE
		'rename_label' => 'Rename a label',	// IGNORE
		'subscription_tools' => 'Subscription tools',	// IGNORE
	),
);

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
		'documentation' => 'Copy the following URL to use it within an external tool.',
		'title' => 'API',
	),
	'bookmarklet' => array(
		'documentation' => 'Drag this button to your bookmarks toolbar or right-click it and choose “Bookmark This Link”. Then click the “Subscribe” button in any page you want to subscribe to.',
		'label' => 'Subscribe',
		'title' => 'Bookmarklet',
	),
	'category' => array(
		'_' => 'Category',
		'add' => 'Add a category',
		'archiving' => 'Archiving',
		'dynamic_opml' => array(
			'_' => 'Dynamic OPML',
			'help' => 'Provide the URL to an <a href="http://opml.org/" target="_blank">OPML file</a> to dynamically populate this category with feeds',
		),
		'empty' => 'Empty category',
		'expand' => 'Expand category',
		'information' => 'Information',
		'open' => 'Open category',
		'opml_url' => 'OPML URL',
		'position' => 'Display position',
		'position_help' => 'To control category sort order',
		'title' => 'Title',
	),
	'feed' => array(
		'accept_cookies' => 'Accept cookies',
		'accept_cookies_help' => 'Allow the feed server to set cookies (stored in memory for the duration of the request only)',
		'add' => 'Add a feed',
		'advanced' => 'Advanced',
		'archiving' => 'Archiving',
		'auth' => array(
			'configuration' => 'Login',
			'help' => 'Allows access to HTTP protected RSS feeds',
			'http' => 'HTTP Authentication',
			'password' => 'HTTP password',
			'username' => 'HTTP username',
		),
		'clear_cache' => 'Always clear cache',
		'content_action' => array(
			'_' => 'Content action when fetching the article content',
			'append' => 'Add after existing content',
			'prepend' => 'Add before existing content',
			'replace' => 'Replace existing content',
		),
		'content_retrieval' => 'Content retrieval',
		'css_cookie' => 'Use Cookies when fetching the article content',
		'css_cookie_help' => 'Example: <kbd>foo=bar; gdpr_consent=true; cookie=value</kbd>',
		'css_help' => 'Retrieves truncated RSS feeds (caution, requires more time!)',
		'css_path' => 'Article CSS selector on original website',
		'css_path_filter' => array(
			'_' => 'CSS selector of the elements to remove',
			'help' => 'A CSS selector may be a list such as: <kbd>footer, aside, p[data-sanitized-class~="menu"]</kbd>',
		),
		'description' => 'Description',
		'empty' => 'This feed is empty. Please verify that it is still maintained.',
		'error' => 'This feed has encountered a problem. If this situation persists, please verify that it is still reachable.',
		'export-as-opml' => array(
			'download' => 'Download',
			'help' => 'XML file (data subset. <a href="https://freshrss.github.io/FreshRSS/en/developers/OPML.html" target="_blank">See documentation</a>)',
			'label' => 'Export as OPML',
		),
		'filteractions' => array(
			'_' => 'Filter actions',
			'help' => 'Write one search filter per line. Operators <a href="https://freshrss.github.io/FreshRSS/en/users/10_filter.html#with-the-search-field" target="_blank">see documentation</a>.',
		),
		'http_headers' => 'HTTP Headers',
		'http_headers_help' => 'Headers are separated by a newline, and the name and value of a header are separated by a colon (e.g: <kbd><code>Accept: application/atom+xml<br />Authorization: Bearer some-token</code></kbd>).',
		'information' => 'Information',
		'keep_min' => 'Minimum number of articles to keep',
		'kind' => array(
			'_' => 'Type of feed source',
			'html_json' => array(
				'_' => 'HTML + XPath + JSON dot notation (JSON in HTML)',
				'xpath' => array(
					'_' => 'XPath for JSON in HTML',
					'help' => 'Example: <code>normalize-space(//script[@type="application/json"])</code> (single JSON)<br />or: <code>//script[@type="application/ld+json"]</code> (one JSON object per article)',
				),
			),
			'html_xpath' => array(
				'_' => 'HTML + XPath (Web scraping)',
				'feed_title' => array(
					'_' => 'feed title',
					'help' => 'Example: <code>//title</code> or a static string: <code>"My custom feed"</code>',
				),
				'help' => '<dfn><a href="https://www.w3.org/TR/xpath-10/" target="_blank">XPath 1.0</a></dfn> is a standard query language for advanced users, and which FreshRSS supports to enable Web scraping.',
				'item' => array(
					'_' => 'finding news <strong>items</strong><br /><small>(most important)</small>',
					'help' => 'Example: <code>//div[@class="news-item"]</code>',
				),
				'item_author' => array(
					'_' => 'item author',
					'help' => 'Can also be a static string. Example: <code>"Anonymous"</code>',
				),
				'item_categories' => 'item tags',
				'item_content' => array(
					'_' => 'item content',
					'help' => 'Example to take the full item: <code>.</code>',
				),
				'item_thumbnail' => array(
					'_' => 'item thumbnail',
					'help' => 'Example: <code>descendant::img/@src</code>',
				),
				'item_timeFormat' => array(
					'_' => 'Custom date/time format',
					'help' => 'Optional. A format supported by <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a> such as <code>d-m-Y H:i:s</code>',
				),
				'item_timestamp' => array(
					'_' => 'item date',
					'help' => 'The result will be parsed by <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a>',
				),
				'item_title' => array(
					'_' => 'item title',
					'help' => 'Use in particular the <a href="https://developer.mozilla.org/docs/Web/XPath/Axes" target="_blank">XPath axis</a> <code>descendant::</code> like <code>descendant::h2</code>',
				),
				'item_uid' => array(
					'_' => 'item unique ID',
					'help' => 'Optional. Example: <code>descendant::div/@data-uri</code>',
				),
				'item_uri' => array(
					'_' => 'item link (URL)',
					'help' => 'Example: <code>descendant::a/@href</code>',
				),
				'relative' => 'XPath (relative to item) for:',
				'xpath' => 'XPath for:',
			),
			'json_dotnotation' => array(
				'_' => 'JSON (dot notation)',
				'feed_title' => array(
					'_' => 'feed title',
					'help' => 'Example: <code>meta.title</code> or a static string: <code>"My custom feed"</code>',
				),
				'help' => 'A JSON dot notated uses dots between objects and brackets for arrays (e.g. <code>data.items[0].title</code>)',
				'item' => array(
					'_' => 'finding news <strong>items</strong><br /><small>(most important)</small>',
					'help' => 'JSON path to the array containing the items, e.g. <code>$</code> or <code>newsItems</code>',
				),
				'item_author' => 'item author',
				'item_categories' => 'item tags',
				'item_content' => array(
					'_' => 'item content',
					'help' => 'Key under which the content is found, e.g. <code>content</code>',
				),
				'item_thumbnail' => array(
					'_' => 'item thumbnail',
					'help' => 'Example: <code>image</code>',
				),
				'item_timeFormat' => array(
					'_' => 'Custom date/time format',
					'help' => 'Optional. A format supported by <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a> such as <code>d-m-Y H:i:s</code>',
				),
				'item_timestamp' => array(
					'_' => 'item date',
					'help' => 'The result will be parsed by <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a>',
				),
				'item_title' => 'item title',
				'item_uid' => 'item unique ID',
				'item_uri' => array(
					'_' => 'item link (URL)',
					'help' => 'Example: <code>permalink</code>',
				),
				'json' => 'dot notation for:',
				'relative' => 'dot notated path (relative to item) for:',
			),
			'jsonfeed' => 'JSON Feed',
			'rss' => 'RSS / Atom (default)',
			'xml_xpath' => 'XML + XPath',
		),
		'maintenance' => array(
			'clear_cache' => 'Clear cache',
			'clear_cache_help' => 'Clear the cache for this feed.',
			'reload_articles' => 'Reload articles',
			'reload_articles_help' => 'Reload that many articles and fetch complete content if a selector is defined.',
			'title' => 'Maintenance',
		),
		'max_http_redir' => 'Max HTTP redirects',
		'max_http_redir_help' => 'Set to 0 or leave blank to disable, -1 for unlimited redirects',
		'method' => array(
			'_' => 'HTTP Method',
		),
		'method_help' => 'The POST payload has automatic support for <code>application/x-www-form-urlencoded</code> and <code>application/json</code>',
		'method_postparams' => 'Payload for POST',
		'moved_category_deleted' => 'When you remove a category, its feeds are automatically classified under <em>%s</em>.',
		'mute' => array(
			'_' => 'mute',
			'state_is_muted' => 'This feed is muted',
		),
		'no_selected' => 'No feed selected.',
		'number_entries' => '%d articles',
		'open_feed' => 'Open feed %s',
		'path_entries_conditions' => 'Conditions for content retrieval',
		'priority' => array(
			'_' => 'Visibility',
			'archived' => 'Do not show (archived)',
			'category' => 'Show in its category',
			'important' => 'Show in important feeds',
			'main_stream' => 'Show in main stream',
		),
		'proxy' => 'Set a proxy for fetching this feed',
		'proxy_help' => 'Select a protocol (e.g: SOCKS5) and enter the proxy address (e.g: <kbd>127.0.0.1:1080</kbd> or <kbd>username:password@127.0.0.1:1080</kbd>)',
		'selector_preview' => array(
			'show_raw' => 'Show source code',
			'show_rendered' => 'Show content',
		),
		'show' => array(
			'all' => 'All feeds',
			'error' => 'Show only feeds with errors',
		),
		'showing' => array(
			'error' => 'Showing only feeds with errors',
		),
		'ssl_verify' => 'Verify SSL security',
		'stats' => 'Statistics',
		'think_to_add' => 'You may add some feeds.',
		'timeout' => 'Timeout in seconds',
		'title' => 'Title',
		'title_add' => 'Add an RSS feed',
		'ttl' => 'Do not automatically refresh more often than',
		'unicityCriteria' => array(
			'_' => 'Article unicity criteria',
			'forced' => '<span title="Block the unicity criteria, even when the feed has duplicate articles">forced</span>',	// TODO
			'help' => 'Relevant for invalid feeds.<br />⚠️ Changing the policy will create duplicates.',	// TODO
			'id' => 'Standard ID (default)',
			'link' => 'Link',
			'sha1:link_published' => 'Link + Date',
			'sha1:link_published_title' => 'Link + Date + Title',
			'sha1:link_published_title_content' => 'Link + Date + Title + Content',
		),
		'url' => 'Feed URL',
		'useragent' => 'Set the user agent for fetching this feed',
		'useragent_help' => 'Example: <kbd>Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0)</kbd>',
		'validator' => 'Check the validity of the feed',
		'website' => 'Website URL',
		'websub' => 'Instant notifications with WebSub',
	),
	'import_export' => array(
		'export' => array(
			'_' => 'Export',
			'sqlite' => 'Download user database as SQLite',	// TODO
		),
		'export_labelled' => 'Export your labelled articles',
		'export_opml' => 'Export list of feeds (OPML)',
		'export_starred' => 'Export your favourites',
		'feed_list' => 'List of %s articles',
		'file_to_import' => 'File to import<br />(OPML, JSON or ZIP)',
		'file_to_import_no_zip' => 'File to import<br />(OPML or JSON)',
		'import' => 'Import',
		'starred_list' => 'List of favourite articles',
		'title' => 'Import / export',
	),
	'menu' => array(
		'add' => 'Add a feed or category',
		'import_export' => 'Import / export',
		'label_management' => 'Label management',
		'stats' => array(
			'idle' => 'Idle feeds',
			'main' => 'Main statistics',
			'repartition' => 'Articles repartition',
		),
		'subscription_management' => 'Subscription management',
		'subscription_tools' => 'Subscription tools',
	),
	'tag' => array(
		'auto_label' => 'Add this label to new articles',
		'name' => 'Name',
		'new_name' => 'New name',
		'old_name' => 'Old name',
	),
	'title' => array(
		'_' => 'Subscription management',
		'add' => 'Add a feed or category',
		'add_category' => 'Add a category',
		'add_dynamic_opml' => 'Add dynamic OPML',
		'add_feed' => 'Add a feed',
		'add_label' => 'Add a label',
		'add_opml_category' => 'OPML category name',
		'delete_label' => 'Delete a label',
		'feed_management' => 'RSS feeds management',
		'rename_label' => 'Rename a label',
		'subscription_tools' => 'Subscription tools',
	),
);

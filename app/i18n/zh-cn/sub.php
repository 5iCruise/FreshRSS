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
		'documentation' => '复制以下地址，以供外部工具使用',
		'title' => 'API',	// IGNORE
	),
	'bookmarklet' => array(
		'documentation' => '拖动此书签到你的书签栏或者右键选择「收藏此链接」，然后在你想要订阅的页面上点击「订阅」按钮。',
		'label' => '订阅',
		'title' => '书签',
	),
	'category' => array(
		'_' => '分类',
		'add' => '添加分类',
		'archiving' => '归档',
		'dynamic_opml' => array(
			'_' => '动态订阅',
			'help' => '使用 URL 上的 <a href="http://opml.org/" target="_blank">OPML 文件</a> 中的订阅源填充这一分类',
		),
		'empty' => '空分类',
		'expand' => 'Expand category',	// TODO
		'information' => '信息',
		'open' => 'Open category',	// TODO
		'opml_url' => 'OPML URL',	// IGNORE
		'position' => '显示位置',
		'position_help' => '控制分类排列顺序',
		'title' => '标题',
	),
	'feed' => array(
		'accept_cookies' => '接受 Cookies',
		'accept_cookies_help' => '允许订阅源服务器设置 Cookies（仅在请求期间存储在内存中）',
		'add' => '添加订阅源',
		'advanced' => '高级',
		'archiving' => '归档',
		'auth' => array(
			'configuration' => '认证',
			'help' => '用于连接启用 HTTP 认证的订阅源',
			'http' => 'HTTP 认证',
			'password' => 'HTTP 密码',
			'username' => 'HTTP 用户名',
		),
		'clear_cache' => '总是清除缓存',
		'content_action' => array(
			'_' => '获取原文后的操作',
			'append' => '添加在现有内容后部',
			'prepend' => '添加在现有内容前部',
			'replace' => '替换现有内容',
		),
		'content_retrieval' => 'Content retrieval',	// TODO
		'css_cookie' => '获取原文时的 Cookies',
		'css_cookie_help' => '例：<kbd>foo=bar; gdpr_consent=true; cookie=value</kbd>',
		'css_help' => '用于获取全文（注意，这将耗费更多时间！）',
		'css_path' => '原文的 CSS 选择器',
		'css_path_filter' => array(
			'_' => '需移除元素的 CSS 选择器',
			'help' => '可设置多个 CSS 选择器，例如：<kbd>footer, aside, p[data-sanitized-class~="menu"]</kbd>',
		),
		'description' => '描述',
		'empty' => '此源为空。请确认它是否正常更新。',
		'error' => '此源遇到一些问题。请在确认是否能正常访问后重试。',	// DIRTY
		'export-as-opml' => array(
			'download' => '下载',
			'help' => 'XML 文件 (data subset. <a href="https://freshrss.github.io/FreshRSS/en/developers/OPML.html" target="_blank">See documentation</a>)',	// DIRTY
			'label' => '导出为 OPML',
		),
		'filteractions' => array(
			'_' => '过滤动作',
			'help' => '每行写一条过滤规则，过滤规则可见 <a href="https://freshrss.github.io/FreshRSS/en/users/10_filter.html#with-the-search-field" target="_blank">文档</a>。',
		),
		'http_headers' => 'HTTP Headers',	// TODO
		'http_headers_help' => 'Headers are separated by a newline, and the name and value of a header are separated by a colon (e.g: <kbd><code>Accept: application/atom+xml<br />Authorization: Bearer some-token</code></kbd>).',	// TODO
		'information' => '信息',
		'keep_min' => '至少保存的文章数',
		'kind' => array(
			'_' => '订阅源类型',
			'html_json' => array(
				'_' => 'HTML + XPath + JSON dot notation (JSON in HTML)',	// TODO
				'xpath' => array(
					'_' => 'XPath for JSON in HTML',	// TODO
					'help' => 'Example: <code>normalize-space(//script[@type="application/json"])</code> (single JSON)<br />or: <code>//script[@type="application/ld+json"]</code> (one JSON object per article)',	// TODO
				),
			),
			'html_xpath' => array(
				'_' => 'HTML + XPath (Web 抓取)',
				'feed_title' => array(
					'_' => '订阅源标题',
					'help' => '如 <code>//title</code> 或是静态字符串如： <code>"My custom feed"</code>',
				),
				'help' => '<dfn><a href="https://www.w3.org/TR/xpath-10/" target="_blank">XPath 1.0</a></dfn> 是为资深用户准备的标准查询语言，FreshRSS 用以实现 Web 抓取.',
				'item' => array(
					'_' => '以寻找 <strong>文章</strong><br /><small>(很重要)</small>',
					'help' => '例如 <code>//div[@class="news-item"]</code>',
				),
				'item_author' => array(
					'_' => '文章作者',
					'help' => '可以是静态字符串，例如 <code>"Anonymous"</code>',
				),
				'item_categories' => '文章标签',
				'item_content' => array(
					'_' => '文章内容',
					'help' => '例如使用 <code>.</code> 将整个对象作为文章内容',
				),
				'item_thumbnail' => array(
					'_' => '文章缩略图',
					'help' => '例如 <code>descendant::img/@src</code>',
				),
				'item_timeFormat' => array(
					'_' => '自定义日期/时间格式',
					'help' => '可选项， 格式参见 <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a> 例如 <code>d-m-Y H:i:s</code>',
				),
				'item_timestamp' => array(
					'_' => '文章日期：',
					'help' => '结果将被 <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a> 解析',
				),
				'item_title' => array(
					'_' => '文章标题',
					'help' => '注意使用 <a href="https://developer.mozilla.org/docs/Web/XPath/Axes" target="_blank">XPath 轴</a> <code>descendant::</code>，例如 <code>descendant::h2</code>',
				),
				'item_uid' => array(
					'_' => '文章唯一 ID',
					'help' => '可选，例如: <code>descendant::div/@data-uri</code>',
				),
				'item_uri' => array(
					'_' => '文章链接 (URL)',
					'help' => '例如 <code>descendant::a/@href</code>',
				),
				'relative' => 'XPath（文章）：',
				'xpath' => 'XPath 定位：',
			),
			'json_dotnotation' => array(
				'_' => 'JSON (点表达式)',
				'feed_title' => array(
					'_' => '订阅源标题',
					'help' => '例如: <code>meta.title</code> 或一个静态的字符串: <code>"My custom feed"</code>',
				),
				'help' => 'JSON 点表达式（JSON 路径）在对象之间使用点，在数组中使用中括号 (例如 <code>data.items[0].title</code>)',
				'item' => array(
					'_' => '寻找新的 <strong>文章</strong><br /><small>(最重要的参数)</small>',
					'help' => '包含文章数组的 JSON 路径， 例如 <code>$</code> or <code>newsItems</code>',	// DIRTY
				),
				'item_author' => '文章作者',
				'item_categories' => '文章标签',
				'item_content' => array(
					'_' => '文章内容',
					'help' => '用于找到文章内容的键, 例如 <code>content</code>',
				),
				'item_thumbnail' => array(
					'_' => '文章缩略图',
					'help' => '例如: <code>image</code>',
				),
				'item_timeFormat' => array(
					'_' => '自定义时间格式',
					'help' => '可选项. 被 <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a> 支持的日期格式。例如 <code>d-m-Y H:i:s</code>',
				),
				'item_timestamp' => array(
					'_' => '文章时间',
					'help' => '结果会被 <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a> 解析',
				),
				'item_title' => '文章标题',
				'item_uid' => '文章唯一ID',
				'item_uri' => array(
					'_' => '文章链接 (URL)',
					'help' => '例如: <code>permalink</code>',
				),
				'json' => 'JSON 路径：',
				'relative' => 'JSON 路径（相对于文章）：',
			),
			'jsonfeed' => 'JSON 订阅源',
			'rss' => 'RSS / Atom (默认)',
			'xml_xpath' => 'XML + XPath',	// IGNORE
		),
		'maintenance' => array(
			'clear_cache' => '清理缓存',
			'clear_cache_help' => '清除该feed的缓存',
			'reload_articles' => '重载文章',
			'reload_articles_help' => '重载 n 篇文章并抓取内容（若设置了 CSS 选择器）',
			'title' => '维护',
		),
		'max_http_redir' => '最大 HTTP 重定向',
		'max_http_redir_help' => '设置为 0 或留空以禁用，-1 表示无限重定向',
		'method' => array(
			'_' => 'HTTP 方式',
		),
		'method_help' => '如果荷载非空且是合法的 JSON，HTTP 请求标头将被自动设为 <code>application/json</code>，否则使用 <code>application/x-www-form-urlencoded</code>',
		'method_postparams' => 'POST 荷载',
		'moved_category_deleted' => '删除分类时，其中的订阅源会自动归类到 <em>%s</em>',
		'mute' => array(
			'_' => '暂停',
			'state_is_muted' => 'This feed is muted',	// TODO
		),
		'no_selected' => '未选择订阅源',
		'number_entries' => '%d 篇文章',
		'open_feed' => 'Open feed %s',	// TODO
		'path_entries_conditions' => 'Conditions for content retrieval',	// TODO
		'priority' => array(
			'_' => '可见性',
			'archived' => '不显示（归档）',
			'category' => '在分类中显示',
			'important' => '在“重要的订阅”中显示',
			'main_stream' => '在首页中显示',
		),
		'proxy' => '获取订阅源时的代理',
		'proxy_help' => '选择协议（例：SOCKS5）和代理地址（例：<kbd>127.0.0.1:1080</kbd> 或者 <kbd>username:password@127.0.0.1:1080</kbd>）',
		'selector_preview' => array(
			'show_raw' => '显示源码',
			'show_rendered' => '显示内容',
		),
		'show' => array(
			'all' => '显示所有订阅源',
			'error' => '仅显示有错误的订阅源',
		),
		'showing' => array(
			'error' => '正在显示有错误的订阅源',
		),
		'ssl_verify' => '验证 SSL 证书安全',
		'stats' => '统计',
		'think_to_add' => '你可以添加一些订阅源。',
		'timeout' => '超时时间（秒）',
		'title' => '标题',
		'title_add' => '添加订阅源',
		'ttl' => '最小自动更新间隔',
		'unicityCriteria' => array(
			'_' => 'Article unicity criteria',	// TODO
			'forced' => '<span title="Block the unicity criteria, even when the feed has duplicate articles">forced</span>',	// TODO
			'help' => 'Relevant for invalid feeds.<br />⚠️ Changing the policy will create duplicates.',	// TODO
			'id' => 'Standard ID (default)',	// TODO
			'link' => 'Link',	// TODO
			'sha1:link_published' => 'Link + Date',	// TODO
			'sha1:link_published_title' => 'Link + Date + Title',	// TODO
			'sha1:link_published_title_content' => 'Link + Date + Title + Content',	// TODO
		),
		'url' => '源地址',
		'useragent' => '设置用于获取此源的 User Agent',
		'useragent_help' => '例：<kbd>Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0)</kbd>',
		'validator' => '检查订阅源有效性',
		'website' => '网站地址',
		'websub' => 'WebSub 即时通知',
	),
	'import_export' => array(
		'export' => array(
			'_' => '导出',
			'sqlite' => 'Download user database as SQLite',	// TODO
		),
		'export_labelled' => '导出有标签的文章',
		'export_opml' => '导出订阅源列表（OPML）',
		'export_starred' => '导出你的收藏',
		'feed_list' => '%s 文章列表',
		'file_to_import' => '需要导入的文件 <br />（OPML、JSON 或 ZIP）',
		'file_to_import_no_zip' => '需要导入的文件 <br />（OPML 或 JSON）',
		'import' => '导入',
		'starred_list' => '收藏文章列表',
		'title' => '导入/导出',
	),
	'menu' => array(
		'add' => '添加订阅源或分类',
		'import_export' => '导入/导出',
		'label_management' => '标签管理',
		'stats' => array(
			'idle' => '长期无更新订阅源',
			'main' => '主要统计',
			'repartition' => '文章分布',
		),
		'subscription_management' => '订阅管理',
		'subscription_tools' => '订阅工具',
	),
	'tag' => array(
		'auto_label' => '给新文章打标签',
		'name' => '名称',
		'new_name' => '新名称',
		'old_name' => '旧名称',
	),
	'title' => array(
		'_' => '订阅管理',
		'add' => '添加订阅源或分类',
		'add_category' => '添加分类',
		'add_dynamic_opml' => '添加订阅源动态列表',
		'add_feed' => '添加订阅源',
		'add_label' => '打标签',
		'add_opml_category' => 'OPML category name',	// TODO
		'delete_label' => '删除标签',
		'feed_management' => '订阅源管理',
		'rename_label' => '重命名标签',
		'subscription_tools' => '订阅工具',
	),
);

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
	'archiving' => array(
		'_' => '归档',
		'exception' => '清理例外',
		'help' => '更多可用选项位于各订阅源的设置',
		'keep_favourites' => '永不删除已收藏的文章',
		'keep_labels' => '永不删除打了标签的文章',
		'keep_max' => '每订阅源最多保留的文章数',
		'keep_min_by_feed' => '至少保留的文章数',
		'keep_period' => '文章最多保留',
		'keep_unreads' => '永不删除未读文章',
		'maintenance' => '维护',
		'optimize' => '优化数据库',
		'optimize_help' => '偶尔执行可以减少数据库大小',
		'policy' => '清理策略',
		'policy_warning' => '如果未选择清理策略，则将保留全部文章。',
		'purge_now' => '立即清除',
		'title' => '存档',
		'ttl' => '最小自动刷新间隔',
	),
	'display' => array(
		'_' => '显示',
		'darkMode' => array(
			'_' => '自动黑暗模式',
			'auto' => '启动',
			'help' => 'For compatible themes only',	// TODO
			'no' => '关闭',
		),
		'icon' => array(
			'bottom_line' => '底栏',
			'display_authors' => '作者',
			'entry' => '文章图标',
			'publication_date' => '更新日期',
			'related_tags' => '文章标签',
			'sharing' => '分享',
			'summary' => '摘要',
			'top_line' => '顶栏',
		),
		'language' => '语言',
		'notif_html5' => array(
			'seconds' => '秒（0 表示不超时）',
			'timeout' => 'HTML5 通知超时时间',
		),
		'show_nav_buttons' => '显示导航按钮',
		'theme' => array(
			'_' => '主题',
			'deprecated' => array(
				'_' => '已弃用',
				'description' => '这个主题已经不再被支持并且会在<a href="https://freshrss.github.io/FreshRSS/en/users/05_Configuration.html#theme" target="_blank">将来版本的 FreshRSS</a> 中删除',
			),
		),
		'theme_not_available' => '“%s” 主题不再可用，请选择其他主题。',
		'thumbnail' => array(
			'label' => '缩略图',
			'landscape' => '横向',
			'none' => '无',
			'portrait' => '纵向',
			'square' => '方形',
		),
		'timezone' => '时区',
		'title' => '显示',
		'website' => array(
			'full' => '图标和名称',
			'icon' => '仅图标',
			'label' => '网页显示',
			'name' => '仅名称',
			'none' => '无',
		),
		'width' => array(
			'content' => '内容宽度',
			'large' => '宽',
			'medium' => '中',
			'no_limit' => '无限制',
			'thin' => '窄',
		),
	),
	'logs' => array(
		'loglist' => array(
			'level' => '日志等级',
			'message' => '信息',
			'timestamp' => '时间',
		),
		'pagination' => array(
			'first' => '首页',
			'last' => '末页',
			'next' => '下一页',
			'previous' => '上一页',
		),
	),
	'mark_read_button' => array(
		'_' => '“全部标记为已读” button',	// DIRTY
		'big' => 'Big',	// TODO
		'none' => 'None',	// TODO
		'small' => 'Small',	// TODO
	),
	'privacy' => array(
		'_' => 'Privacy',	// TODO
		'retrieve_extension_list' => 'Retrieve extension list',	// TODO
	),
	'profile' => array(
		'_' => '账户管理',
		'api' => array(
			'_' => 'API 管理',
			'api_not_set' => 'API password not set',	// TODO
			'api_set' => 'API password set',	// TODO
			'check_link' => 'Check API status via: <kbd><a href="../api/" target="_blank">%s</a></kbd>',	// TODO
			'disabled' => 'The API access is disabled.',	// TODO
			'documentation_link' => 'See the <a href="https://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target="_blank">documentation and list of known apps</a>',	// TODO
			'help' => 'See <a href="http://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target=_blank>documentation</a>',	// TODO
		),
		'delete' => array(
			'_' => '账户删除',
			'warn' => '你的帐户以及所有相关数据将被删除。',
		),
		'email' => '邮箱地址',
		'password_api' => 'API 密码<br /><small>（例如用于手机应用）</small>',
		'password_form' => '密码<br /><small>(用于 Web-form 登录方式)</small>',
		'password_format' => '至少 7 个字符',
		'title' => '账户',
	),
	'query' => array(
		'_' => '自定义查询',
		'deprecated' => '此查询不再有效。相关的分类或订阅源已被删除。',
		'description' => 'Description',	// TODO
		'filter' => array(
			'_' => '生效的过滤器：',
			'categories' => '按分类显示',
			'feeds' => '按订阅源显示',
			'order' => '按日期排序',
			'search' => '表达式',
			'shareOpml' => '启用相应类别和 feed 的 OPML 分享',
			'shareRss' => '启用 HTML 和 RSS 分享',
			'state' => '状态',
			'tags' => '按标签显示',
			'type' => '类型',
		),
		'get_A' => 'Show all feeds, also those shown in their category',	// TODO
		'get_Z' => 'Show all feeds, also archived ones',	// TODO
		'get_all' => '显示所有文章',
		'get_all_labels' => '显示所有打了标签的文章',
		'get_category' => '显示分类“%s”',
		'get_favorite' => '显示收藏文章',
		'get_feed' => '显示订阅源“%s”',
		'get_important' => '显示来自“重要的订阅”的文章',
		'get_label' => '显示打了“%s”标签的文章',
		'help' => '参见文档： <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">queries and resharing by HTML / RSS / OPML</a>.',
		'image_url' => 'Image URL',	// TODO
		'name' => '名称',
		'no_filter' => '无过滤器',
		'no_queries' => array(
			'_' => 'No user queries are saved yet.',	// TODO
			'help' => 'See <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentation</a>',	// TODO
		),
		'number' => '查询 n°%d',
		'order_asc' => '由旧至新显示文章',
		'order_desc' => '由新至旧显示文章',
		'search' => '搜索 “%s”',
		'share' => array(
			'_' => '分享您的自定义查询',
			'disabled' => array(
				'_' => 'disabled',	// TODO
				'title' => 'Sharing',	// TODO
			),
			'greader' => 'Shareable link to the GReader JSON',	// TODO
			'help' => '获取此自定义查询的分享链接',
			'html' => 'HTML 页面的分享链接',
			'opml' => '订阅源 OPML 的分享链接',
			'rss' => 'RSS feed 的分享链接',
		),
		'state_0' => '显示所有文章',
		'state_1' => '显示已读文章',
		'state_2' => '显示未读文章',
		'state_3' => '显示所有文章',
		'state_4' => '显示收藏文章',
		'state_5' => '显示已读的收藏文章',
		'state_6' => '显示未读的收藏文章',
		'state_7' => '显示收藏文章',
		'state_8' => '显示未收藏文章',
		'state_9' => '显示已读的未收藏文章',
		'state_10' => '显示未读的未收藏文章',
		'state_11' => '显示未收藏文章',
		'state_12' => '显示所有文章',
		'state_13' => '显示已读文章',
		'state_14' => '显示未读文章',
		'state_15' => '显示所有文章',
		'title' => '自定义查询',
	),
	'reading' => array(
		'_' => '阅读',
		'after_onread' => '“全部标记为已读”后',
		'always_show_favorites' => '默认显示收藏夹中所有的文章',
		'apply_to_individual_feed' => 'Applies to feeds individually',	// TODO
		'article' => array(
			'authors_date' => array(
				'_' => '作者和日期',
				'both' => '页脚与页眉',
				'footer' => '页脚',
				'header' => '页眉',
				'none' => '不显示',
			),
			'feed_name' => array(
				'above_title' => '在标题/标签上方',
				'none' => '不显示',
				'with_authors' => '与作者和日期一行',
			),
			'feed_title' => '订阅源标题',
			'icons' => array(
				'_' => 'Article icons position<br /><small>(Reading view only)</small>',	// TODO
				'above_title' => 'Above title',	// TODO
				'with_authors' => 'In authors and date row',	// TODO
			),
			'tags' => array(
				'_' => '文章标签',
				'both' => '页脚与页眉',
				'footer' => '页脚',
				'header' => '页眉',
				'none' => '不显示',
			),
			'tags_max' => array(
				'_' => '标签最多显示个数',
				'help' => '0 表示：显示所有标签且不折叠',
			),
		),
		'articles_per_page' => '每页文章数',
		'auto_load_more' => '在页面底部载入更多文章',
		'auto_remove_article' => '阅读后隐藏文章',
		'confirm_enabled' => '“全部标记为已读”时显示确认对话框',
		'display_articles_unfolded' => '默认展开显示文章',
		'display_categories_unfolded' => '展开的分类',
		'headline' => array(
			'articles' => '文章：打开/关闭',
			'articles_header_footer' => '文章: 页眉/页脚',
			'categories' => '左侧导航栏：分类',
			'mark_as_read' => '标为已读选项',
			'misc' => '其它',
			'view' => '浏览',
		),
		'hide_read_feeds' => '隐藏没有未读文章的分类和订阅源（启用“显示所有文章”后不生效）',
		'img_with_lazyload' => '延迟加载图片',
		'jump_next' => '跳转到下一未读项',
		'mark_updated_article_unread' => '将有更新的文章设为未读',
		'number_divided_when_reader' => '阅读视图中显示一半',
		'read' => array(
			'article_open_on_website' => '在打开原文章后',
			'article_viewed' => '在文章被浏览后',
			'focus' => '被聚焦时（除了重要订阅）',
			'keep_max_n_unread' => '未读最多保留 n 条',
			'scroll' => '在滚动浏览后（除了重要订阅）',
			'upon_gone' => '在被原订阅源被移除后',
			'upon_reception' => '在接收文章后',
			'when' => '何时将文章标记为已读',
			'when_same_title_in_category' => 'if an identical title already exists in the top <i>n</i> newest articles of the category',	// TODO
			'when_same_title_in_feed' => '已存在 n 条相同标题文章 (of the feed)',	// DIRTY
		),
		'show' => array(
			'_' => '文章显示',
			'active_category' => '活跃的分类',
			'adaptive' => 'Show unreads if any, all articles otherwise',	// TODO
			'all_articles' => '显示所有',
			'all_categories' => '所有分类',
			'no_category' => '无分类',
			'remember_categories' => '记住打开的分类',
			'unread' => '只显示未读',
			'unread_or_favorite' => 'Show unreads and favourites',	// TODO
		),
		'show_fav_unread_help' => '同样适用于标签',
		'sides_close_article' => '点击文章文本区域外关闭文章',
		'sort' => array(
			'_' => '排列顺序',
			'newer_first' => '由新至旧',
			'older_first' => '由旧至新',
		),
		'star' => array(
			'when' => 'Mark an article as favourite…',	// TODO
		),
		'sticky_post' => '打开文章时将其置顶',
		'title' => '阅读',
		'view' => array(
			'default' => '默认视图',
			'global' => '全屏视图',
			'normal' => '普通视图',
			'reader' => '阅读视图',
		),
	),
	'sharing' => array(
		'_' => '分享',
		'add' => '添加分享方式',
		'bluesky' => 'Bluesky',	// TODO
		'deprecated' => '此功能已被废弃并会在未来的 FreshRSS 版本中移除，详情见 <a href="https://freshrss.github.io/FreshRSS/en/users/08_sharing_services.html" title="打开文档获更多信息" target="_blank">说明文档</a>.',
		'diaspora' => 'Diaspora*',	// IGNORE
		'email' => 'Email',	// IGNORE
		'facebook' => 'Facebook',	// IGNORE
		'more_information' => '更多信息',
		'print' => '打印',
		'raindrop' => 'Raindrop.io',	// IGNORE
		'remove' => '删除分享方式',
		'shaarli' => 'Shaarli',	// IGNORE
		'share_name' => '显示名称',
		'share_url' => '用于分享的 URL',
		'title' => '分享',
		'twitter' => 'Twitter',	// IGNORE
		'wallabag' => 'wallabag',	// IGNORE
	),
	'shortcut' => array(
		'_' => '快捷键',
		'article_action' => '文章操作',
		'auto_share' => '分享',
		'auto_share_help' => '如果有多种分享方式，则会按照它们的序号依次访问。',
		'close_dropdown' => '关闭菜单',
		'collapse_article' => '折叠文章',
		'first_article' => '打开第一篇文章',
		'focus_search' => '访问搜索框',
		'global_view' => '切换到全屏视图',
		'help' => '显示帮助文档',
		'javascript' => '若要使用快捷键，必须启用 JavaScript',
		'last_article' => '打开最后一篇文章',
		'load_more' => '载入更多文章',
		'mark_favorite' => '加入收藏',
		'mark_read' => '设为已读',
		'navigation' => '浏览',
		'navigation_help' => '组合 <kbd>⇧ Shift</kbd> 键，导航快捷键将应用于订阅源。<br/>组合 <kbd>Alt ⎇</kbd> 键，导航快捷键将应用于分类。',
		'navigation_no_mod_help' => '以下快捷键不支持组合键（Shift 或 Alt）',
		'next_article' => '打开下一篇文章',
		'next_unread_article' => '打开下一篇未读文章',
		'non_standard' => '这些键（<kbd>%s</kbd>）可能不能作为快捷键',
		'normal_view' => '切换到普通视图',
		'other_action' => '其他操作',
		'previous_article' => '打开上一篇文章',
		'reading_view' => '切换到阅读视图',
		'rss_view' => '切换到 RSS 视图',
		'see_on_website' => '在原网站中查看',
		'shift_for_all_read' => '+ <kbd>Alt ⎇</kbd> 键将上方的文章标记为已读<br />+ <kbd>⇧ Shift</kbd> 键将所有文章设为已读',
		'skip_next_article' => '跳转到下一篇文章而不打开',
		'skip_previous_article' => '跳转到上一篇文章而不打开',
		'title' => '快捷键',
		'toggle_media' => '播放/暂停媒体',
		'user_filter' => '显示自定义查询',
		'user_filter_help' => '如果有多个自定义过滤器，则会按照它们的序号依次访问。',
		'views' => '视图',
	),
	'user' => array(
		'articles_and_size' => '%s 篇文章（%s）',
		'current' => '当前用户',
		'is_admin' => '该用户为管理员',
		'users' => '用户',
	),
);

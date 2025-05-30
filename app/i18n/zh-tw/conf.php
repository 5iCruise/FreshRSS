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
		'_' => '歸檔',
		'exception' => '高級清理策略',
		'help' => '具體選項位於各訂閱源的設置',
		'keep_favourites' => '不清理已收藏的文章',
		'keep_labels' => '不清理標籤',
		'keep_max' => '最多保留的文章數',	// DIRTY
		'keep_min_by_feed' => '至少保留的文章數',
		'keep_period' => '文章最多保留',
		'keep_unreads' => '不清理未讀文章',
		'maintenance' => '優化',
		'optimize' => '優化資料庫',
		'optimize_help' => '偶爾執行優化可以減少資料庫大小',
		'policy' => '清理策略',
		'policy_warning' => '如果未選擇清理策略，則將保留全部文章。',
		'purge_now' => '立即清除',
		'title' => '存檔',
		'ttl' => '最小自動刷新間隔',
	),
	'display' => array(
		'_' => '顯示',
		'darkMode' => array(
			'_' => '自動黑暗模式',
			'auto' => '自動',
			'help' => '僅適用於相容主題',
			'no' => '否',
		),
		'icon' => array(
			'bottom_line' => '底欄',
			'display_authors' => '作者',
			'entry' => '文章圖示',
			'publication_date' => '更新日期',
			'related_tags' => '相關標籤',
			'sharing' => '分享',
			'summary' => '摘要',
			'top_line' => '頂欄',
		),
		'language' => '語言',
		'notif_html5' => array(
			'seconds' => '秒（0 表示不超時）',
			'timeout' => 'HTML5 通知超時時間',
		),
		'show_nav_buttons' => '顯示導航按鈕',
		'theme' => array(
			'_' => '主題',
			'deprecated' => array(
				'_' => '已廢棄',
				'description' => '此主題不再被支援且將不再可用在 <a href="https://freshrss.github.io/FreshRSS/en/users/05_Configuration.html#theme" target="_blank">未來FreshRSS的更新</a>',
			),
		),
		'theme_not_available' => '“%s” 主題不再可用，請選擇其他主題。',
		'thumbnail' => array(
			'label' => '縮圖',
			'landscape' => '風景',
			'none' => '無',
			'portrait' => '肖像',
			'square' => '方塊',
		),
		'timezone' => '時區',
		'title' => '顯示',
		'website' => array(
			'full' => '圖示及名稱',
			'icon' => '僅圖示',
			'label' => '網站',
			'name' => '僅名稱',
			'none' => '無',
		),
		'width' => array(
			'content' => '內容寬度',
			'large' => '寬',
			'medium' => '中',
			'no_limit' => '無限制',
			'thin' => '窄',
		),
	),
	'logs' => array(
		'loglist' => array(
			'level' => '日誌等級',
			'message' => '訊息',
			'timestamp' => '時間',
		),
		'pagination' => array(
			'first' => '首頁',
			'last' => '末頁',
			'next' => '下一頁',
			'previous' => '上一頁',
		),
	),
	'mark_read_button' => array(
		'_' => '“Mark all as read” button',	// TODO
		'big' => 'Big',	// TODO
		'none' => 'None',	// TODO
		'small' => 'Small',	// TODO
	),
	'privacy' => array(
		'_' => 'Privacy',	// TODO
		'retrieve_extension_list' => 'Retrieve extension list',	// TODO
	),
	'profile' => array(
		'_' => '個人資料管理',
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
			'_' => '帳號刪除',
			'warn' => '你的帳號及所有相關資料將被刪除。',
		),
		'email' => '郵箱地址',
		'password_api' => 'API 密碼<br /><small>（例如用於手機應用）</small>',
		'password_form' => '密碼<br /><small>(用於 Web-form 登入方式)</small>',
		'password_format' => '至少 7 個字元',
		'title' => '個人資料',
	),
	'query' => array(
		'_' => '自定義查詢',
		'deprecated' => '此查詢不再有效。相關的分類或訂閱源已被刪除。',
		'description' => 'Description',	// TODO
		'filter' => array(
			'_' => '生效的過濾器：',
			'categories' => '按分類顯示',
			'feeds' => '按訂閱源顯示',
			'order' => '按日期排序',
			'search' => '表達式',
			'shareOpml' => '啟用透過對應類別和源的OPML分享',
			'shareRss' => '啟用透過HTML分享 &amp; RSS',
			'state' => '狀態',
			'tags' => '按標籤顯示',
			'type' => '類型',
		),
		'get_A' => 'Show all feeds, also those shown in their category',	// TODO
		'get_Z' => 'Show all feeds, also archived ones',	// TODO
		'get_all' => '顯示所有文章',
		'get_all_labels' => '顯示任何標籤的文章',
		'get_category' => '顯示分類 “%s”',
		'get_favorite' => '顯示收藏文章',
		'get_feed' => '顯示訂閱源 “%s”',
		'get_important' => '顯示來自重要源的文章',
		'get_label' => '顯示帶有 “%s” 標籤的文章',
		'help' => '請參閱 <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">有關使用者查詢和透過 HTML / RSS / OPML 重新共用的文件</a>.',
		'image_url' => '影像網址',
		'name' => '名稱',
		'no_filter' => '無過濾器',
		'no_queries' => array(
			'_' => 'No user queries are saved yet.',	// TODO
			'help' => 'See <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentation</a>',	// TODO
		),
		'number' => '查詢 n°%d',
		'order_asc' => '由舊至新顯示文章',
		'order_desc' => '由新至舊顯示文章',
		'search' => '搜尋 “%s”',
		'share' => array(
			'_' => '透過連結分享此查詢',
			'disabled' => array(
				'_' => 'disabled',	// TODO
				'title' => 'Sharing',	// TODO
			),
			'greader' => 'GReader JSON的可共享連結',
			'help' => '如果您想與任何人分享此查詢，請提供此連結',
			'html' => 'HTML頁面的可共享連結',
			'opml' => 'OPML源列表的可共享連結',
			'rss' => 'RSS源的可共享連結',
		),
		'state_0' => '顯示所有文章',
		'state_1' => '顯示已讀文章',
		'state_2' => '顯示未讀文章',
		'state_3' => '顯示所有文章',
		'state_4' => '顯示收藏文章',
		'state_5' => '顯示已讀的收藏文章',
		'state_6' => '顯示未讀的收藏文章',
		'state_7' => '顯示收藏文章',
		'state_8' => '顯示未收藏文章',
		'state_9' => '顯示已讀的未收藏文章',
		'state_10' => '顯示未讀的未收藏文章',
		'state_11' => '顯示未收藏文章',
		'state_12' => '顯示所有文章',
		'state_13' => '顯示已讀文章',
		'state_14' => '顯示未讀文章',
		'state_15' => '顯示所有文章',
		'title' => '自定義查詢',
	),
	'reading' => array(
		'_' => '閱讀',
		'after_onread' => '「全部標記為已讀」後',
		'always_show_favorites' => '預設顯示收藏夾中所有的文章',
		'apply_to_individual_feed' => 'Applies to feeds individually',	// TODO
		'article' => array(
			'authors_date' => array(
				'_' => '作者和日期',
				'both' => '兩者都顯示',
				'footer' => '僅頁腳顯示',
				'header' => '僅頁眉顯示',
				'none' => '不顯示',
			),
			'feed_name' => array(
				'above_title' => '在文章標題和標籤上方',
				'none' => '不顯示',
				'with_authors' => '與作者和日期一行',
			),
			'feed_title' => '訂閱源標題',
			'icons' => array(
				'_' => '文章圖示的位置<br /><small>(限閱讀視圖)</small>',
				'above_title' => '標題之上',
				'with_authors' => '在作者和日期列中',
			),
			'tags' => array(
				'_' => '文章標籤',
				'both' => '兩者都顯示',
				'footer' => '僅頁腳顯示',
				'header' => '僅頁眉顯示',
				'none' => '不顯示',
			),
			'tags_max' => array(
				'_' => '標籤最多顯示個數',
				'help' => '0 標識顯示所有標籤',
			),
		),
		'articles_per_page' => '每頁文章數',
		'auto_load_more' => '在頁面底部載入更多文章',
		'auto_remove_article' => '閱讀後隱藏文章',
		'confirm_enabled' => '「全部標記為已讀」時顯示確認對話框',
		'display_articles_unfolded' => '預設展開顯示文章',
		'display_categories_unfolded' => '要展開的分類',
		'headline' => array(
			'articles' => '文章：打開/關閉',
			'articles_header_footer' => '文章: 頁眉/頁腳',
			'categories' => '左側導航：分類',
			'mark_as_read' => '標為已讀選項',
			'misc' => '其它',
			'view' => '瀏覽',
		),
		'hide_read_feeds' => '隱藏沒有未讀文章的分類和訂閱源 (啟用「顯示所有文章」後不生效)',
		'img_with_lazyload' => '延遲加載圖片',
		'jump_next' => '跳轉到下一未讀項',
		'mark_updated_article_unread' => '將更新的文章設為未讀',
		'number_divided_when_reader' => '閱讀視圖中顯示一半',
		'read' => array(
			'article_open_on_website' => '在打開原文章後',
			'article_viewed' => '在文章被瀏覽後',
			'focus' => '當注意力集中時（重要的源除外）',
			'keep_max_n_unread' => '未讀最多保留 n 條',
			'scroll' => '在滾動瀏覽後（重要的源除外）',	// DIRTY
			'upon_gone' => '在被原訂閱源移除後',
			'upon_reception' => '在接收文章後',
			'when' => '何時將文章標記為已讀',
			'when_same_title_in_category' => 'if an identical title already exists in the top <i>n</i> newest articles of the category',	// TODO
			'when_same_title_in_feed' => '已存在 n 條相同標題文章 (of the feed)',	// DIRTY
		),
		'show' => array(
			'_' => '文章顯示',
			'active_category' => '啟用的分類',
			'adaptive' => 'Show unreads if any, all articles otherwise',	// TODO
			'all_articles' => '顯示所有',
			'all_categories' => '所有分類',
			'no_category' => '無分類',
			'remember_categories' => '記住打開的分類',
			'unread' => '只顯示未讀',
			'unread_or_favorite' => 'Show unreads and favourites',	// TODO
		),
		'show_fav_unread_help' => '同樣適用於標籤',
		'sides_close_article' => '點擊文章區域外以關閉',
		'sort' => array(
			'_' => '排列順序',
			'newer_first' => '由新至舊',
			'older_first' => '由舊至新',
		),
		'star' => array(
			'when' => '標記一篇文章為最愛…',
		),
		'sticky_post' => '打開文章時將其置於頁首',
		'title' => '閱讀',
		'view' => array(
			'default' => '預設視圖',
			'global' => '全屏視圖',
			'normal' => '普通視圖',
			'reader' => '閱讀視圖',
		),
	),
	'sharing' => array(
		'_' => '分享',
		'add' => '新增分享方式',
		'bluesky' => 'Bluesky',	// TODO
		'deprecated' => '這項功能已廢棄並在將來版本的 FreshRSS 中移除，詳情請見 <a href="https://freshrss.github.io/FreshRSS/en/users/08_sharing_services.html" title="Open documentation for more information" target="_blank">說明文檔</a>.',
		'diaspora' => 'Diaspora*',	// IGNORE
		'email' => '郵箱',	// IGNORE
		'facebook' => '臉書',	// IGNORE
		'more_information' => '更多資訊',
		'print' => '列印',
		'raindrop' => 'Raindrop.io',	// IGNORE
		'remove' => '刪除分享方式',
		'shaarli' => 'Shaarli',	// IGNORE
		'share_name' => '名稱',
		'share_url' => '地址',
		'title' => '分享',
		'twitter' => '推特',	// IGNORE
		'wallabag' => 'Wallabag',	// IGNORE
	),
	'shortcut' => array(
		'_' => '快捷鍵',
		'article_action' => '文章操作',
		'auto_share' => '分享',
		'auto_share_help' => '如果有多種分享方式，則會按照它們的序號依次訪問。',
		'close_dropdown' => '關閉菜單',
		'collapse_article' => '收起文章',
		'first_article' => '打開第一篇文章',
		'focus_search' => '聚焦到搜尋框',
		'global_view' => '切換到全屏視圖',
		'help' => '顯示幫助文檔',
		'javascript' => '若要使用快捷鍵，必須啟用 JavaScript',
		'last_article' => '打開最後一篇文章',
		'load_more' => '載入更多文章',
		'mark_favorite' => '加入收藏',
		'mark_read' => '設為已讀',
		'navigation' => '瀏覽',
		'navigation_help' => '組合 <kbd>⇧ Shift</kbd> 鍵，瀏覽快捷鍵將生效於訂閱源。<br/>組合 <kbd>Alt ⎇</kbd> 鍵，瀏覽快捷鍵將生效於分類。',
		'navigation_no_mod_help' => '以下快捷鍵不支持組合鍵（Shift 或 Alt）',
		'next_article' => '打開下一篇文章',
		'next_unread_article' => '打開下一篇未讀文章',
		'non_standard' => '這些鍵 (<kbd>%s</kbd>) 可能不能作為快捷鍵',
		'normal_view' => '切換到普通視圖',
		'other_action' => '其它操作',
		'previous_article' => '打開上一篇文章',
		'reading_view' => '切換到閱讀視圖',
		'rss_view' => '切換到 RSS 視圖',
		'see_on_website' => '在原網站中查看',
		'shift_for_all_read' => '組合 <kbd>Alt ⎇</kbd>鍵 將上方的文章標記為已讀<br />組合 <kbd>⇧ Shift</kbd>按鍵 可以將全部文章設為已讀',
		'skip_next_article' => '跳轉到下一篇文章而不打開',
		'skip_previous_article' => '跳轉到上一篇文章而不打開',
		'title' => '快捷鍵',
		'toggle_media' => '播放/暫停媒體',
		'user_filter' => '顯示自定義查詢',
		'user_filter_help' => '如果有多個自定義過濾器，則會按照它們的序號依次訪問。',
		'views' => '視圖',
	),
	'user' => array(
		'articles_and_size' => '%s 篇文章 (%s)',
		'current' => '當前使用者',
		'is_admin' => '該使用者為管理員',
		'users' => '使用者',
	),
);

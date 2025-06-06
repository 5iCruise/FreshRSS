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
	'about' => array(
		'_' => ' در مورد',
		'agpl3' => ' <a href="https://www.gnu.org/licenses/agpl-3.0.html">AGPL 3</a>',
		'bug_reports' => array(
			'environment_information' => array(
				'_' => 'System information',	// TODO
				'browser' => 'Browser',	// TODO
				'database' => 'Database',	// TODO
				'server_software' => 'Server software',	// TODO
				'version_curl' => 'cURL version',	// TODO
				'version_frss' => 'FreshRSS version',	// TODO
				'version_php' => 'PHP version',	// TODO
			),
		),
		'bugs_reports' => ' گزارش اشکال',
		'documentation' => ' اسناد و مدارک',
		'freshrss_description' => ' FreshRSS یک جمع کننده و خواننده RSS خود میزبان است. این به شما امکان می دهد بدون نیاز به مرور از یک وب سایت به وب سایت دیگر',
		'github' => ' <a href="https://github.com/FreshRSS/FreshRSS/issues">در GitHub</a>',
		'license' => ' مجوز',
		'project_website' => ' وب سایت پروژه',
		'title' => ' در مورد',
		'version' => ' نسخه',
	),
	'feed' => array(
		'empty' => ' هیچ مقاله ای برای نمایش وجود ندارد.',
		'received' => array(
			'before_yesterday' => 'Received before yesterday',	// TODO
			'today' => 'Received today',	// TODO
			'yesterday' => 'Received yesterday',	// TODO
		),
		'rss_of' => ' فید RSS %s',
		'title' => ' جریان اصلی',
		'title_fav' => ' موارد دلخواه',
		'title_global' => ' نمای جهانی',
	),
	'log' => array(
		'_' => ' سیاهههای مربوط',
		'clear' => ' سیاهههای مربوط را پاک کنید',
		'empty' => ' فایل لاگ خالی است',
		'title' => ' سیاهههای مربوط',
	),
	'menu' => array(
		'about' => ' درباره FreshRSS',
		'before_one_day' => ' بزرگتر از یک روز',
		'before_one_week' => ' بزرگتر از یک هفته',
		'bookmark_query' => ' درخواست فعلی را نشانک‌گذاری کنید',
		'favorites' => ' موارد دلخواه (%s)',
		'global_view' => ' نمای جهانی',
		'important' => 'Important feeds',	// TODO
		'main_stream' => ' جریان اصلی',
		'mark_all_read' => ' همه را به عنوان خوانده شده علامت گذاری کنید',
		'mark_cat_read' => ' دسته را به عنوان خوانده شده علامت گذاری کنید',
		'mark_feed_read' => ' فید را به عنوان خوانده شده علامت گذاری کنید',
		'mark_selection_unread' => ' انتخاب را به عنوان خوانده نشده علامت گذاری کنید',
		'mylabels' => ' برچسب های من',
		'newer_first' => ' ابتدا جدیدتر',
		'non-starred' => ' موارد غیر مورد علاقه را نشان دهید',
		'normal_view' => ' نمای عادی',
		'older_first' => ' اول مسن ترین',
		'queries' => ' پرس و جوهای کاربر',
		'read' => ' نمایش خوانده شده',
		'reader_view' => ' مشاهده خواندن',
		'rss_view' => ' خوراک RSS',
		'search_short' => ' جستجو',
		'sort' => array(
			'_' => 'Sorting criteria',	// TODO
			'date_asc' => 'Publication date 1→9',	// TODO
			'date_desc' => 'Publication date 9→1',	// TODO
			'id_asc' => 'Freshly received last',	// TODO
			'id_desc' => 'Freshly received first',	// TODO
			'link_asc' => 'Link A→Z',	// TODO
			'link_desc' => 'Link Z→A',	// TODO
			'rand' => 'Random order',	// TODO
			'title_asc' => 'Title A→Z',	// TODO
			'title_desc' => 'Title Z→A',	// TODO
		),
		'starred' => ' نمایش موارد دلخواه',
		'stats' => ' آمار',
		'subscription' => ' مدیریت اشتراک',
		'unread' => ' نمایش خوانده نشده',
	),
	'share' => ' به اشتراک بگذارید',
	'tag' => array(
		'related' => ' برچسب های مقاله',
	),
	'tos' => array(
		'title' => ' شرایط خدمات',
	),
);

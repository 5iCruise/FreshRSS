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
		'_' => ' بایگانی',
		'exception' => ' استثناء پاکسازی',
		'help' => ' گزینه های بیشتری در تنظیمات فید فردی موجود است',
		'keep_favourites' => ' هرگز موارد دلخواه را حذف نکنید',
		'keep_labels' => ' هرگز برچسب ها را حذف نکنید',
		'keep_max' => ' حداکثر تعداد مقالات برای نگهداری در هر فید',
		'keep_min_by_feed' => ' حداقل تعداد مقالات برای نگهداری در هر فید',
		'keep_period' => ' حداکثر سن مقالات برای نگهداری',
		'keep_unreads' => ' هرگز مقالات خوانده نشده را حذف نکنید',
		'maintenance' => ' تعمیر و نگهداری',
		'optimize' => ' پایگاه داده را بهینه کنید',
		'optimize_help' => ' گاهی اوقات برای کاهش اندازه پایگاه داده اجرا کنید',
		'policy' => ' سیاست پاکسازی',
		'policy_warning' => ' اگر سیاست پاکسازی انتخاب نشود',
		'purge_now' => ' اکنون پاکسازی کنید',
		'title' => ' بایگانی',
		'ttl' => ' به‌طور خودکار بیشتر از آن رفرش نکنید',
	),
	'display' => array(
		'_' => ' نمایش',
		'darkMode' => array(
			'_' => ' حالت تاریک خودکار',
			'auto' => ' خودکار',
			'help' => 'For compatible themes only',	// TODO
			'no' => ' شماره',
		),
		'icon' => array(
			'bottom_line' => ' خط پایین',
			'display_authors' => ' نویسندگان',
			'entry' => ' نمادهای مقاله',
			'publication_date' => ' تاریخ انتشار',
			'related_tags' => ' برچسب های مقاله',
			'sharing' => ' اشتراک گذاری',
			'summary' => ' خلاصه',
			'top_line' => ' خط بالا',
		),
		'language' => ' زبان',
		'notif_html5' => array(
			'seconds' => ' ثانیه (0 به معنای عدم وجود مهلت زمانی است)',
			'timeout' => ' وقفه اعلان HTML5',
		),
		'show_nav_buttons' => ' دکمه های ناوبری را نشان دهید',
		'theme' => array(
			'_' => ' موضوع',
			'deprecated' => array(
				'_' => ' منسوخ شده است',
				'description' => ' این طرح زمینه دیگر پشتیبانی نمی‌شود و در <a href="https://freshrss.github.io/FreshRSS/en/users/05_Configuration.html#theme" target="_blank">آینده در دسترس نخواهد بود انتشار FreshRSS</a>',
			),
		),
		'theme_not_available' => ' طرح زمینه "%s" دیگر در دسترس نیست. لطفا موضوع دیگری را انتخاب کنید.',
		'thumbnail' => array(
			'label' => ' تصویر بند انگشتی',
			'landscape' => ' منظره',
			'none' => ' هیچ',
			'portrait' => ' پرتره',
			'square' => ' مربع',
		),
		'timezone' => ' منطقه زمانی',
		'title' => ' نمایش',
		'website' => array(
			'full' => ' نماد و نام',
			'icon' => ' فقط نماد',
			'label' => ' وب سایت',
			'name' => ' فقط نام',
			'none' => ' هیچکدام',
		),
		'width' => array(
			'content' => ' عرض محتوا',
			'large' => ' عریض',
			'medium' => ' متوسط',
			'no_limit' => ' عرض کامل',
			'thin' => ' باریک',
		),
	),
	'logs' => array(
		'loglist' => array(
			'level' => ' سطح گزارش',
			'message' => ' پیام ورود',
			'timestamp' => ' مهر زمان',
		),
		'pagination' => array(
			'first' => ' اول',
			'last' => ' آخرین',
			'next' => ' بعدی',
			'previous' => ' قبلی',
		),
	),
	'mark_read_button' => array(
		'_' => '"علامت گذاری همه به عنوان خوانده شده" button',	// DIRTY
		'big' => 'Big',	// TODO
		'none' => 'None',	// TODO
		'small' => 'Small',	// TODO
	),
	'privacy' => array(
		'_' => 'Privacy',	// TODO
		'retrieve_extension_list' => 'Retrieve extension list',	// TODO
	),
	'profile' => array(
		'_' => ' مدیریت پروفایل',
		'api' => array(
			'_' => ' مدیریت API',
			'api_not_set' => 'API password not set',	// TODO
			'api_set' => 'API password set',	// TODO
			'check_link' => 'Check API status via: <kbd><a href="../api/" target="_blank">%s</a></kbd>',	// TODO
			'disabled' => 'The API access is disabled.',	// TODO
			'documentation_link' => 'See the <a href="https://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target="_blank">documentation and list of known apps</a>',	// TODO
			'help' => 'See <a href="http://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target=_blank>documentation</a>',	// TODO
		),
		'delete' => array(
			'_' => ' حذف اکانت',
			'warn' => ' حساب شما و تمام داده های مرتبط حذف خواهد شد.',
		),
		'email' => ' آدرس ایمیل',
		'password_api' => ' رمز عبور API<br /><small>(مثلاً برای برنامه های تلفن همراه)</small>',
		'password_form' => ' رمز عبور<br /><small>(برای روش ورود به فرم وب)</small>',
		'password_format' => ' حداقل 7 کاراکتر',
		'title' => ' نمایه',
	),
	'query' => array(
		'_' => ' پرس و جوهای کاربر',
		'deprecated' => ' این عبارت دیگر معتبر نیست. دسته یا فید ارجاع شده حذف شده است.',
		'description' => 'Description',	// TODO
		'filter' => array(
			'_' => ' فیلتر اعمال شده:',
			'categories' => ' نمایش بر اساس دسته بندی',
			'feeds' => ' نمایش با فید',
			'order' => ' مرتب سازی بر اساس تاریخ',
			'search' => ' بیان',
			'shareOpml' => 'Enable sharing by OPML of corresponding categories and feeds',	// TODO
			'shareRss' => 'Enable sharing by HTML &amp; RSS',	// TODO
			'state' => ' ایالت',
			'tags' => ' نمایش بر اساس برچسب',
			'type' => ' نوع',
		),
		'get_A' => 'Show all feeds, also those shown in their category',	// TODO
		'get_Z' => 'Show all feeds, also archived ones',	// TODO
		'get_all' => ' نمایش همه مقالات',
		'get_all_labels' => 'Display articles with any label',	// TODO
		'get_category' => ' دسته «%s» را نمایش دهید',
		'get_favorite' => ' نمایش مقالات مورد علاقه',
		'get_feed' => ' فید "%s" را نمایش دهید',
		'get_important' => 'Display articles from important feeds',	// TODO
		'get_label' => 'Display articles with “%s” label',	// TODO
		'help' => 'See the <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentation for user queries and resharing by HTML / RSS / OPML</a>.',	// TODO
		'image_url' => 'Image URL',	// TODO
		'name' => ' نام',
		'no_filter' => ' بدون فیلتر',
		'no_queries' => array(
			'_' => 'No user queries are saved yet.',	// TODO
			'help' => 'See <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentation</a>',	// TODO
		),
		'number' => ' پرس و جو n°%d',
		'order_asc' => ' ابتدا قدیمی ترین مقالات را نمایش دهید',
		'order_desc' => ' ابتدا جدیدترین مقالات را نمایش دهید',
		'search' => ' «%s» را جستجو کنید',
		'share' => array(
			'_' => 'Share this query by link',	// TODO
			'disabled' => array(
				'_' => 'disabled',	// TODO
				'title' => 'Sharing',	// TODO
			),
			'greader' => 'Shareable link to the GReader JSON',	// TODO
			'help' => 'Give this link if you want to share this query with anyone',	// TODO
			'html' => 'Shareable link to the HTML page',	// TODO
			'opml' => 'Shareable link to the OPML list of feeds',	// TODO
			'rss' => 'Shareable link to the RSS feed',	// TODO
		),
		'state_0' => 'نمایش همه مقالات',
		'state_1' => 'نمایش مقالات خوانده شده',
		'state_2' => 'نمایش مقالات خوانده نشده',
		'state_3' => 'نمایش همه مقالات',
		'state_4' => ' نمایش مقالات مورد علاقه',
		'state_5' => ' نمایش مقالات مورد علاقه خوانده شده',
		'state_6' => 'نمایش مقالات مورد علاقه خوانده نشده',
		'state_7' => ' نمایش مقالات مورد علاقه',
		'state_8' => ' نمایش مقالات مورد علاقه نیست',
		'state_9' => ' نمایش مقالات مورد علاقه خوانده نشده',
		'state_10' => ' نمایش مقالات خوانده نشده و نه مورد علاقه',
		'state_11' => ' نمایش مقالات مورد علاقه نیست',
		'state_12' => ' نمایش همه مقالات',
		'state_13' => ' نمایش مقالات خوانده شده',
		'state_14' => ' نمایش مقالات خوانده نشده',
		'state_15' => ' نمایش همه مقالات',
		'title' => ' پرس و جوهای کاربر',
	),
	'reading' => array(
		'_' => ' خواندن',
		'after_onread' => ' بعد از "علامت گذاری همه به عنوان خوانده شده"',
		'always_show_favorites' => ' نمایش همه مقالات در موارد دلخواه به طور پیش فرض',
		'apply_to_individual_feed' => 'Applies to feeds individually',	// TODO
		'article' => array(
			'authors_date' => array(
				'_' => ' نویسندگان و تاریخ',
				'both' => ' در سرصفحه و پاورقی',
				'footer' => ' در پاورقی',
				'header' => ' در سربرگ',
				'none' => ' هیچکدام',
			),
			'feed_name' => array(
				'above_title' => ' بالای عنوان/برچسب ها',
				'none' => ' هیچ',
				'with_authors' => ' در نویسندگان و ردیف تاریخ',
			),
			'feed_title' => ' عنوان خوراک',
			'icons' => array(
				'_' => 'Article icons position<br /><small>(Reading view only)</small>',	// TODO
				'above_title' => 'Above title',	// TODO
				'with_authors' => 'In authors and date row',	// TODO
			),
			'tags' => array(
				'_' => ' برچسب ها',
				'both' => ' در سرصفحه و پاورقی',
				'footer' => ' در پاورقی',
				'header' => ' در سربرگ',
				'none' => ' هیچ',
			),
			'tags_max' => array(
				'_' => ' حداکثر تعداد برچسب نشان داده شده است',
				'help' => '0 به این معنی است: همه برچسب ها را نشان دهید و آنها را جمع نکنید',
			),
		),
		'articles_per_page' => ' تعداد مقاله در هر صفحه',
		'auto_load_more' => ' مقالات بیشتری را در پایین صفحه بارگذاری کنید',
		'auto_remove_article' => ' مخفی کردن مقالات پس از خواندن',
		'confirm_enabled' => ' یک دیالوگ تأیید را روی اقدامات "علامت گذاری همه به عنوان خوانده شده" نمایش دهید',
		'display_articles_unfolded' => ' نمایش مقالاتی که به طور پیش فرض باز شده اند',
		'display_categories_unfolded' => ' دسته بندی هایی که باید آشکار شوند',
		'headline' => array(
			'articles' => ' مقالات: باز/بستن',
			'articles_header_footer' => ' مقالات: سرصفحه / پاورقی',
			'categories' => ' ناوبری چپ: دسته ها',
			'mark_as_read' => ' مقاله را به عنوان خوانده شده علامت گذاری کنید',
			'misc' => ' متفرقه',
			'view' => ' مشاهده',
		),
		'hide_read_feeds' => ' دسته‌ها و فیدها را بدون مقاله خوانده نشده پنهان کنید (با پیکربندی «نمایش همه مقاله‌ها» کار نمی‌کند)',
		'img_with_lazyload' => ' از حالت <em>بار تنبل</em> برای بارگیری تصاویر استفاده کنید',
		'jump_next' => ' پرش به خواهر و برادر خوانده نشده بعدی',
		'mark_updated_article_unread' => ' مقالات به روز شده را به عنوان خوانده نشده علامت گذاری کنید',
		'number_divided_when_reader' => ' در نمای خواندن بر 2 تقسیم کنید.',
		'read' => array(
			'article_open_on_website' => ' هنگامی که مقاله در وب سایت اصلی خود باز می شود',
			'article_viewed' => ' هنگام مشاهده مقاله',
			'focus' => 'when focused (except for important feeds)',	// TODO
			'keep_max_n_unread' => ' حداکثر تعداد مقالات خوانده نشده',
			'scroll' => '(except for important feeds) در حین پیمایش',	// DIRTY
			'upon_gone' => ' زمانی که دیگر در فید اخبار بالادستی نیست',
			'upon_reception' => ' پس از دریافت مقاله',
			'when' => ' علامت گذاری یک مقاله به عنوان خوانده شده…',
			'when_same_title_in_category' => 'if an identical title already exists in the top <i>n</i> newest articles of the category',	// TODO
			'when_same_title_in_feed' => ' اگر عنوان یکسانی از قبل در <i>n</i> جدیدترین مقالات بالا وجود داشته باشد (of the feed)',	// DIRTY
		),
		'show' => array(
			'_' => ' مقالات برای نمایش',
			'active_category' => ' دسته فعال',
			'adaptive' => 'Show unreads if any, all articles otherwise',	// TODO
			'all_articles' => ' نمایش همه مقالات',
			'all_categories' => ' همه دسته ها',
			'no_category' => ' بدون دسته',
			'remember_categories' => ' دسته بندی های باز را به خاطر بسپارید',
			'unread' => ' فقط خوانده نشده را نشان دهد',
			'unread_or_favorite' => 'Show unreads and favourites',	// TODO
		),
		'show_fav_unread_help' => ' روی برچسب ها نیز اعمال می شود',
		'sides_close_article' => ' با کلیک کردن خارج از ناحیه متن مقاله',
		'sort' => array(
			'_' => ' ترتیب مرتب سازی',
			'newer_first' => ' ابتدا جدیدترین',
			'older_first' => ' اول قدیمی ترین',
		),
		'star' => array(
			'when' => 'Mark an article as favourite…',	// TODO
		),
		'sticky_post' => ' وقتی باز شد مقاله را به بالا بچسبانید',
		'title' => ' خواندن',
		'view' => array(
			'default' => ' نمای پیش فرض',
			'global' => ' نمای جهانی',
			'normal' => ' نمای عادی',
			'reader' => ' مشاهده خواندن',
		),
	),
	'sharing' => array(
		'_' => ' اشتراک گذاری',
		'add' => ' یک روش اشتراک گذاری اضافه کنید',
		'bluesky' => 'Bluesky',	// TODO
		'deprecated' => ' این سرویس منسوخ شده است و در <a href="https://freshrss.github.io/FreshRSS/en/users/08_sharing_services.html" title="باز کردن اسناد برای اطلاعات بیشتر" target= از FreshRSS حذف خواهد شد. "_blank">نسخه آینده</a>.',
		'diaspora' => ' دیاسپورا*',
		'email' => ' ایمیل',
		'facebook' => ' فیس بوک',
		'more_information' => ' اطلاعات بیشتر',
		'print' => ' چاپ',
		'raindrop' => ' Raindrop.io',
		'remove' => ' روش اشتراک گذاری را حذف کنید',
		'shaarli' => ' شعرلی',
		'share_name' => ' نام اشتراک گذاری برای نمایش',
		'share_url' => ' URL را برای استفاده به اشتراک بگذارید',
		'title' => ' اشتراک گذاری',
		'twitter' => ' توییتر',
		'wallabag' => 'والباگ',
	),
	'shortcut' => array(
		'_' => ' میانبرها',
		'article_action' => ' اقدامات ماده',
		'auto_share' => ' اشتراک گذاری',
		'auto_share_help' => ' اگر فقط یک حالت اشتراک گذاری وجود داشته باشد',
		'close_dropdown' => ' منوها را ببندید',
		'collapse_article' => ' فروپاشی',
		'first_article' => ' اولین مقاله را باز کنید',
		'focus_search' => ' به کادر جستجو دسترسی پیدا کنید',
		'global_view' => ' تغییر به نمای جهانی',
		'help' => ' نمایش اسناد',
		'javascript' => ' برای استفاده از میانبرها باید جاوا اسکریپت فعال باشد',
		'last_article' => ' آخرین مقاله را باز کنید',
		'load_more' => ' بارگذاری مقالات بیشتر',
		'mark_favorite' => ' موارد دلخواه را تغییر دهید',
		'mark_read' => ' خواندن را تغییر دهید',
		'navigation' => ' ناوبری',
		'navigation_help' => ' با اصلاح‌کننده <kbd>⇧ Shift</kbd>',
		'navigation_no_mod_help' => ' میانبرهای پیمایش زیر از اصلاح کننده ها پشتیبانی نمی کنند.',
		'next_article' => ' مقاله بعدی را باز کنید',
		'next_unread_article' => ' مقاله خوانده نشده بعدی را باز کنید',
		'non_standard' => ' برخی از کلیدها (<kbd>%s</kbd>) ممکن است به عنوان میانبر کار نکنند.',
		'normal_view' => ' تبدیل به نمای عادی',
		'other_action' => ' سایر اقدامات',
		'previous_article' => ' مقاله قبلی را باز کنید',
		'reading_view' => ' به نمای خواندن بروید',
		'rss_view' => ' به عنوان فید RSS باز شود',
		'see_on_website' => ' به وب سایت اصلی مراجعه کنید',
		'shift_for_all_read' => '+ <kbd>Alt ⎇</kbd> برای علامت گذاری مقالات قبلی به عنوان خوانده شده<br />+ <kbd>⇧ Shift</kbd> برای علامت گذاری همه مقالات به عنوان خوانده شده',
		'skip_next_article' => ' فوکوس بعدی بدون باز کردن',
		'skip_previous_article' => ' فوکوس قبلی بدون باز کردن',
		'title' => ' میانبرها',
		'toggle_media' => ' پخش/مکث رسانه',
		'user_filter' => ' به درخواست های کاربر دسترسی پیدا کنید',
		'user_filter_help' => ' اگر فقط یک درخواست کاربر وجود داشته باشد',
		'views' => ' بازدید',
	),
	'user' => array(
		'articles_and_size' => '%s مقاله (%s)',
		'current' => ' کاربر فعلی',
		'is_admin' => ' مدیر است',
		'users' => ' کاربران',
	),
);

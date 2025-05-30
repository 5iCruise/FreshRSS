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
		'_' => 'Archiving',	// IGNORE
		'exception' => 'Purge exception',	// IGNORE
		'help' => 'More options are available in the individual feed’s settings',	// IGNORE
		'keep_favourites' => 'Never delete favorites',
		'keep_labels' => 'Never delete labels',	// IGNORE
		'keep_max' => 'Maximum number of articles to keep per feed',	// IGNORE
		'keep_min_by_feed' => 'Minimum number of articles to keep per feed',	// IGNORE
		'keep_period' => 'Maximum age of articles to keep',	// IGNORE
		'keep_unreads' => 'Never delete unread articles',	// IGNORE
		'maintenance' => 'Maintenance',	// IGNORE
		'optimize' => 'Optimize database',	// IGNORE
		'optimize_help' => 'Run occasionally to reduce the size of the database',	// IGNORE
		'policy' => 'Purge policy',	// IGNORE
		'policy_warning' => 'If no purge policy is selected, every article will be kept.',	// IGNORE
		'purge_now' => 'Purge now',	// IGNORE
		'title' => 'Archiving',	// IGNORE
		'ttl' => 'Do not automatically refresh more often than',	// IGNORE
	),
	'display' => array(
		'_' => 'Display',	// IGNORE
		'darkMode' => array(
			'_' => 'Automatic dark mode',	// IGNORE
			'auto' => 'Auto',	// IGNORE
			'help' => 'For compatible themes only',	// IGNORE
			'no' => 'No',	// IGNORE
		),
		'icon' => array(
			'bottom_line' => 'Bottom line',	// IGNORE
			'display_authors' => 'Authors',	// IGNORE
			'entry' => 'Article icons',	// IGNORE
			'publication_date' => 'Date of publication',	// IGNORE
			'related_tags' => 'Article tags',	// IGNORE
			'sharing' => 'Sharing',	// IGNORE
			'summary' => 'Summary',	// IGNORE
			'top_line' => 'Top line',	// IGNORE
		),
		'language' => 'Language',	// IGNORE
		'notif_html5' => array(
			'seconds' => 'seconds (0 means no timeout)',	// IGNORE
			'timeout' => 'HTML5 notification timeout',	// IGNORE
		),
		'show_nav_buttons' => 'Show the navigation buttons',	// IGNORE
		'theme' => array(
			'_' => 'Theme',	// IGNORE
			'deprecated' => array(
				'_' => 'Deprecated',	// IGNORE
				'description' => 'This theme is no longer supported and will be not available anymore in a <a href="https://freshrss.github.io/FreshRSS/en/users/05_Configuration.html#theme" target="_blank">future release of FreshRSS</a>',	// IGNORE
			),
		),
		'theme_not_available' => 'The “%s” theme is not available anymore. Please choose another theme.',	// IGNORE
		'thumbnail' => array(
			'label' => 'Thumbnail',	// IGNORE
			'landscape' => 'Landscape',	// IGNORE
			'none' => 'None',	// IGNORE
			'portrait' => 'Portrait',	// IGNORE
			'square' => 'Square',	// IGNORE
		),
		'timezone' => 'Time zone',	// IGNORE
		'title' => 'Display',	// IGNORE
		'website' => array(
			'full' => 'Icon and name',	// IGNORE
			'icon' => 'Icon only',	// IGNORE
			'label' => 'Website',	// IGNORE
			'name' => 'Name only',	// IGNORE
			'none' => 'None',	// IGNORE
		),
		'width' => array(
			'content' => 'Content width',	// IGNORE
			'large' => 'Wide',	// IGNORE
			'medium' => 'Medium',	// IGNORE
			'no_limit' => 'Full Width',	// IGNORE
			'thin' => 'Narrow',	// IGNORE
		),
	),
	'logs' => array(
		'loglist' => array(
			'level' => 'Log Level',	// IGNORE
			'message' => 'Log Message',	// IGNORE
			'timestamp' => 'Timestamp',	// IGNORE
		),
		'pagination' => array(
			'first' => 'First',	// IGNORE
			'last' => 'Last',	// IGNORE
			'next' => 'Next',	// IGNORE
			'previous' => 'Previous',	// IGNORE
		),
	),
	'mark_read_button' => array(
		'_' => '“Mark all as read” button',	// IGNORE
		'big' => 'Big',	// IGNORE
		'none' => 'None',	// IGNORE
		'small' => 'Small',	// IGNORE
	),
	'privacy' => array(
		'_' => 'Privacy',	// IGNORE
		'retrieve_extension_list' => 'Retrieve extension list',	// IGNORE
	),
	'profile' => array(
		'_' => 'Profile management',	// IGNORE
		'api' => array(
			'_' => 'API management',	// IGNORE
			'api_not_set' => 'API password not set',	// IGNORE
			'api_set' => 'API password set',	// IGNORE
			'check_link' => 'Check API status via: <kbd><a href="../api/" target="_blank">%s</a></kbd>',	// IGNORE
			'disabled' => 'The API access is disabled.',	// IGNORE
			'documentation_link' => 'See the <a href="https://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target="_blank">documentation and list of known apps</a>',	// IGNORE
			'help' => 'See <a href="http://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target=_blank>documentation</a>',	// IGNORE
		),
		'delete' => array(
			'_' => 'Account deletion',	// IGNORE
			'warn' => 'Your account and all related data will be deleted.',	// IGNORE
		),
		'email' => 'Email address',	// IGNORE
		'password_api' => 'API password<br /><small>(e.g., for mobile apps)</small>',	// IGNORE
		'password_form' => 'Password<br /><small>(for the Web-form login method)</small>',	// IGNORE
		'password_format' => 'At least 7 characters',	// IGNORE
		'title' => 'Profile',	// IGNORE
	),
	'query' => array(
		'_' => 'User queries',	// IGNORE
		'deprecated' => 'This query is no longer valid. The referenced category or feed has been deleted.',	// IGNORE
		'description' => 'Description',	// IGNORE
		'filter' => array(
			'_' => 'Filter applied:',	// IGNORE
			'categories' => 'Display by category',	// IGNORE
			'feeds' => 'Display by feed',	// IGNORE
			'order' => 'Sort by date',	// IGNORE
			'search' => 'Expression',	// IGNORE
			'shareOpml' => 'Enable sharing by OPML of corresponding categories and feeds',	// IGNORE
			'shareRss' => 'Enable sharing by HTML &amp; RSS',	// IGNORE
			'state' => 'State',	// IGNORE
			'tags' => 'Display by label',	// IGNORE
			'type' => 'Type',	// IGNORE
		),
		'get_A' => 'Show all feeds, also those shown in their category',	// IGNORE
		'get_Z' => 'Show all feeds, also archived ones',	// IGNORE
		'get_all' => 'Display all articles',	// IGNORE
		'get_all_labels' => 'Display articles with any label',	// IGNORE
		'get_category' => 'Display “%s” category',	// IGNORE
		'get_favorite' => 'Display favorite articles',
		'get_feed' => 'Display “%s” feed',	// IGNORE
		'get_important' => 'Display articles from important feeds',	// IGNORE
		'get_label' => 'Display articles with “%s” label',	// IGNORE
		'help' => 'See the <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentation for user queries and resharing by HTML / RSS / OPML</a>.',	// IGNORE
		'image_url' => 'Image URL',	// IGNORE
		'name' => 'Name',	// IGNORE
		'no_filter' => 'No filter',	// IGNORE
		'no_queries' => array(
			'_' => 'No user queries are saved yet.',	// IGNORE
			'help' => 'See <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentation</a>',	// IGNORE
		),
		'number' => 'Query n°%d',	// IGNORE
		'order_asc' => 'Display oldest articles first',	// IGNORE
		'order_desc' => 'Display newest articles first',	// IGNORE
		'search' => 'Search for “%s”',	// IGNORE
		'share' => array(
			'_' => 'Share this query by link',	// IGNORE
			'disabled' => array(
				'_' => 'disabled',	// IGNORE
				'title' => 'Sharing',	// IGNORE
			),
			'greader' => 'Shareable link to the GReader JSON',	// IGNORE
			'help' => 'Give this link if you want to share this query with anyone',	// IGNORE
			'html' => 'Shareable link to the HTML page',	// IGNORE
			'opml' => 'Shareable link to the OPML list of feeds',	// IGNORE
			'rss' => 'Shareable link to the RSS feed',	// IGNORE
		),
		'state_0' => 'Display all articles',	// IGNORE
		'state_1' => 'Display read articles',	// IGNORE
		'state_2' => 'Display unread articles',	// IGNORE
		'state_3' => 'Display all articles',	// IGNORE
		'state_4' => 'Display favorite articles',
		'state_5' => 'Display read favorite articles',
		'state_6' => 'Display unread favorite articles',
		'state_7' => 'Display favorite articles',
		'state_8' => 'Display not favorite articles',
		'state_9' => 'Display read not favorite articles',
		'state_10' => 'Display unread not favorite articles',
		'state_11' => 'Display not favorite articles',
		'state_12' => 'Display all articles',	// IGNORE
		'state_13' => 'Display read articles',	// IGNORE
		'state_14' => 'Display unread articles',	// IGNORE
		'state_15' => 'Display all articles',	// IGNORE
		'title' => 'User queries',	// IGNORE
	),
	'reading' => array(
		'_' => 'Reading',	// IGNORE
		'after_onread' => 'After “mark all as read”,',	// IGNORE
		'always_show_favorites' => 'Show all articles in favorites by default',
		'apply_to_individual_feed' => 'Applies to feeds individually',	// IGNORE
		'article' => array(
			'authors_date' => array(
				'_' => 'Authors and date',	// IGNORE
				'both' => 'In header and footer',	// IGNORE
				'footer' => 'In footer',	// IGNORE
				'header' => 'In header',	// IGNORE
				'none' => 'None',	// IGNORE
			),
			'feed_name' => array(
				'above_title' => 'Above title/tags',	// IGNORE
				'none' => 'None',	// IGNORE
				'with_authors' => 'In authors and date row',	// IGNORE
			),
			'feed_title' => 'Feed title',	// IGNORE
			'icons' => array(
				'_' => 'Article icons position<br /><small>(Reading view only)</small>',	// IGNORE
				'above_title' => 'Above title',	// IGNORE
				'with_authors' => 'In authors and date row',	// IGNORE
			),
			'tags' => array(
				'_' => 'Tags',	// IGNORE
				'both' => 'In header and footer',	// IGNORE
				'footer' => 'In footer',	// IGNORE
				'header' => 'In header',	// IGNORE
				'none' => 'None',	// IGNORE
			),
			'tags_max' => array(
				'_' => 'Max number of tags shown',	// IGNORE
				'help' => '0 means: show all tags and do not collapse them',	// IGNORE
			),
		),
		'articles_per_page' => 'Number of articles per page',	// IGNORE
		'auto_load_more' => 'Load more articles at the bottom of the page',	// IGNORE
		'auto_remove_article' => 'Hide articles after reading',	// IGNORE
		'confirm_enabled' => 'Display a confirmation dialog on “mark all as read” actions',	// IGNORE
		'display_articles_unfolded' => 'Show articles unfolded by default',	// IGNORE
		'display_categories_unfolded' => 'Categories to unfold',	// IGNORE
		'headline' => array(
			'articles' => 'Articles: Open/Close',	// IGNORE
			'articles_header_footer' => 'Articles: header/footer',	// IGNORE
			'categories' => 'Left navigation: Categories',	// IGNORE
			'mark_as_read' => 'Mark article as read',	// IGNORE
			'misc' => 'Miscellaneous',	// IGNORE
			'view' => 'View',	// IGNORE
		),
		'hide_read_feeds' => 'Hide categories & feeds with no unread articles (does not work with “Show all articles” configuration)',	// IGNORE
		'img_with_lazyload' => 'Use <em>lazy load</em> mode to load pictures',	// IGNORE
		'jump_next' => 'jump to next unread sibling',	// IGNORE
		'mark_updated_article_unread' => 'Mark updated articles as unread',	// IGNORE
		'number_divided_when_reader' => 'Divide by 2 in the reading view.',	// IGNORE
		'read' => array(
			'article_open_on_website' => 'when the article is opened on its original website',	// IGNORE
			'article_viewed' => 'when the article is viewed',	// IGNORE
			'focus' => 'when focused (except for important feeds)',	// IGNORE
			'keep_max_n_unread' => 'Max number of articles to keep unread',	// IGNORE
			'scroll' => 'while scrolling (except for important feeds)',	// IGNORE
			'upon_gone' => 'when it is no longer in the upstream news feed',	// IGNORE
			'upon_reception' => 'upon receiving the article',	// IGNORE
			'when' => 'Mark an article as read…',	// IGNORE
			'when_same_title_in_category' => 'if an identical title already exists in the top <i>n</i> newest articles of the category',	// IGNORE
			'when_same_title_in_feed' => 'if an identical title already exists in the top <i>n</i> newest articles of the feed',	// IGNORE
		),
		'show' => array(
			'_' => 'Articles to display',	// IGNORE
			'active_category' => 'Active category',	// IGNORE
			'adaptive' => 'Show unreads if any, all articles otherwise',	// IGNORE
			'all_articles' => 'Show all articles',	// IGNORE
			'all_categories' => 'All categories',	// IGNORE
			'no_category' => 'No category',	// IGNORE
			'remember_categories' => 'Remember open categories',	// IGNORE
			'unread' => 'Show unreads',	// IGNORE
			'unread_or_favorite' => 'Show unreads and favorites',	// IGNORE
		),
		'show_fav_unread_help' => 'Applies also on labels',	// IGNORE
		'sides_close_article' => 'Clicking outside of article text area closes the article',	// IGNORE
		'sort' => array(
			'_' => 'Sort order',	// IGNORE
			'newer_first' => 'Newest first',	// IGNORE
			'older_first' => 'Oldest first',	// IGNORE
		),
		'star' => array(
			'when' => 'Mark an article as favorite…',
		),
		'sticky_post' => 'Stick the article to the top when opened',	// IGNORE
		'title' => 'Reading',	// IGNORE
		'view' => array(
			'default' => 'Default view',	// IGNORE
			'global' => 'Global view',	// IGNORE
			'normal' => 'Normal view',	// IGNORE
			'reader' => 'Reading view',	// IGNORE
		),
	),
	'sharing' => array(
		'_' => 'Sharing',	// IGNORE
		'add' => 'Add a sharing method',	// IGNORE
		'bluesky' => 'Bluesky',	// IGNORE
		'deprecated' => 'This service is deprecated and will be removed from FreshRSS in a <a href="https://freshrss.github.io/FreshRSS/en/users/08_sharing_services.html" title="Open documentation for more information" target="_blank">future release</a>.',	// IGNORE
		'diaspora' => 'Diaspora*',	// IGNORE
		'email' => 'Email',	// IGNORE
		'facebook' => 'Facebook',	// IGNORE
		'more_information' => 'More information',	// IGNORE
		'print' => 'Print',	// IGNORE
		'raindrop' => 'Raindrop.io',	// IGNORE
		'remove' => 'Remove sharing method',	// IGNORE
		'shaarli' => 'Shaarli',	// IGNORE
		'share_name' => 'Share name to display',	// IGNORE
		'share_url' => 'Share URL to use',	// IGNORE
		'title' => 'Sharing',	// IGNORE
		'twitter' => 'Twitter',	// IGNORE
		'wallabag' => 'wallabag',	// IGNORE
	),
	'shortcut' => array(
		'_' => 'Shortcuts',	// IGNORE
		'article_action' => 'Article actions',	// IGNORE
		'auto_share' => 'Share',	// IGNORE
		'auto_share_help' => 'If there is only one sharing mode, it is used. Otherwise, modes are accessible by their number.',	// IGNORE
		'close_dropdown' => 'Close menus',	// IGNORE
		'collapse_article' => 'Collapse',	// IGNORE
		'first_article' => 'Open the first article',	// IGNORE
		'focus_search' => 'Access search box',	// IGNORE
		'global_view' => 'Switch to global view',	// IGNORE
		'help' => 'Display documentation',	// IGNORE
		'javascript' => 'JavaScript must be enabled in order to use shortcuts',	// IGNORE
		'last_article' => 'Open the last article',	// IGNORE
		'load_more' => 'Load more articles',	// IGNORE
		'mark_favorite' => 'Toggle favorite',
		'mark_read' => 'Toggle read',	// IGNORE
		'navigation' => 'Navigation',	// IGNORE
		'navigation_help' => 'With the <kbd>⇧ Shift</kbd> modifier, navigation shortcuts apply on feeds.<br/>With the <kbd>Alt ⎇</kbd> modifier, navigation shortcuts apply on categories.',	// IGNORE
		'navigation_no_mod_help' => 'The following navigation shortcuts do not support modifiers.',	// IGNORE
		'next_article' => 'Open the next article',	// IGNORE
		'next_unread_article' => 'Open the next unread article',	// IGNORE
		'non_standard' => 'Some keys (<kbd>%s</kbd>) may not work as shortcuts.',	// IGNORE
		'normal_view' => 'Switch to normal view',	// IGNORE
		'other_action' => 'Other actions',	// IGNORE
		'previous_article' => 'Open the previous article',	// IGNORE
		'reading_view' => 'Switch to reading view',	// IGNORE
		'rss_view' => 'Open as RSS feed',	// IGNORE
		'see_on_website' => 'See on original website',	// IGNORE
		'shift_for_all_read' => '+ <kbd>Alt ⎇</kbd> to mark previous articles as read<br />+ <kbd>⇧ Shift</kbd> to mark all articles as read',	// IGNORE
		'skip_next_article' => 'Focus next without opening',	// IGNORE
		'skip_previous_article' => 'Focus previous without opening',	// IGNORE
		'title' => 'Shortcuts',	// IGNORE
		'toggle_media' => 'Play/pause media',	// IGNORE
		'user_filter' => 'Access user queries',	// IGNORE
		'user_filter_help' => 'If there is only one user query, it is used. Otherwise, queries are accessible by their number.',	// IGNORE
		'views' => 'Views',	// IGNORE
	),
	'user' => array(
		'articles_and_size' => '%s articles (%s)',	// IGNORE
		'current' => 'Current user',	// IGNORE
		'is_admin' => 'is administrator',	// IGNORE
		'users' => 'Users',	// IGNORE
	),
);

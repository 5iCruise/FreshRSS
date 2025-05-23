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
		'_' => 'About',	// TODO
		'agpl3' => '<a href="https://www.gnu.org/licenses/agpl-3.0.html">AGPL 3</a>',	// TODO
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
		'bugs_reports' => 'Bug reports',	// TODO
		'documentation' => 'Documentation',	// TODO
		'freshrss_description' => 'FreshRSS is a self-hostable RSS aggregator and reader. It allows you to read and follow several news websites at a glance without the need to browse from one website to another. FreshRSS is lightweight, configurable, and easy to use.',	// TODO
		'github' => '<a href="https://github.com/FreshRSS/FreshRSS/issues">on GitHub</a>',	// TODO
		'license' => 'License',	// TODO
		'project_website' => 'Project website',	// TODO
		'title' => 'About',	// TODO
		'version' => 'Version',	// TODO
	),
	'feed' => array(
		'empty' => 'There are no articles to show.',	// TODO
		'received' => array(
			'before_yesterday' => 'Received before yesterday',	// TODO
			'today' => 'Received today',	// TODO
			'yesterday' => 'Received yesterday',	// TODO
		),
		'rss_of' => 'RSS feed of %s',	// TODO
		'title' => 'Main stream',	// TODO
		'title_fav' => 'Favorites',
		'title_global' => 'Global view',	// TODO
	),
	'log' => array(
		'_' => 'Logs',	// TODO
		'clear' => 'Clear the logs',	// TODO
		'empty' => 'Log file is empty',	// TODO
		'title' => 'Logs',	// TODO
	),
	'menu' => array(
		'about' => 'About FreshRSS',	// TODO
		'before_one_day' => 'Older than one day',	// TODO
		'before_one_week' => 'Older than one week',	// TODO
		'bookmark_query' => 'Bookmark current query',	// TODO
		'favorites' => 'Favorites (%s)',
		'global_view' => 'Global view',	// TODO
		'important' => 'Important feeds',	// TODO
		'main_stream' => 'Main stream',	// TODO
		'mark_all_read' => 'Mark all as read',	// TODO
		'mark_cat_read' => 'Mark category as read',	// TODO
		'mark_feed_read' => 'Mark feed as read',	// TODO
		'mark_selection_unread' => 'Mark selection as unread',	// TODO
		'mylabels' => 'My labels',	// TODO
		'newer_first' => 'Newer first',	// TODO
		'non-starred' => 'Show non-favorites',
		'normal_view' => 'Normal view',	// TODO
		'older_first' => 'Oldest first',	// TODO
		'queries' => 'User queries',	// TODO
		'read' => 'Show read',	// TODO
		'reader_view' => 'Reading view',	// TODO
		'rss_view' => 'RSS feed',	// TODO
		'search_short' => 'Search',	// TODO
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
		'starred' => 'Show favorites',
		'stats' => 'Statistics',	// TODO
		'subscription' => 'Subscription management',	// TODO
		'unread' => 'Show unread',	// TODO
	),
	'share' => 'Share',	// TODO
	'tag' => array(
		'related' => 'Article tags',	// TODO
	),
	'tos' => array(
		'title' => 'Terms of Service',	// TODO
	),
);

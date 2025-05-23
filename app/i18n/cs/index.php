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
		'_' => 'O aplikaci',
		'agpl3' => '<a href="https://www.gnu.org/licenses/agpl-3.0.html">AGPL 3</a>',	// IGNORE
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
		'bugs_reports' => 'Hlášení chyb',
		'documentation' => 'Dokumentace',
		'freshrss_description' => 'FreshRSS je čtečka kanálů RSS určená k provozu na vlastním serveru. Je to nenáročný a jednoduchý, zároveň ale mocný a konfigurovatelný nástroj.',
		'github' => '<a href="https://github.com/FreshRSS/FreshRSS/issues">na GitHub</a>',
		'license' => 'Licence',
		'project_website' => 'Webová stránka projektu',
		'title' => 'O aplikaci',
		'version' => 'Verze',
	),
	'feed' => array(
		'empty' => 'Nejsou žádné články k zobrazení.',
		'received' => array(
			'before_yesterday' => 'Received before yesterday',	// TODO
			'today' => 'Received today',	// TODO
			'yesterday' => 'Received yesterday',	// TODO
		),
		'rss_of' => 'Kanál RSS %s',
		'title' => 'Hlavní kanál',
		'title_fav' => 'Oblíbené',
		'title_global' => 'Zobrazení přehledu',
	),
	'log' => array(
		'_' => 'Protokoly',
		'clear' => 'Vymazat protokoly',
		'empty' => 'Soubor protokolu je prázdný',
		'title' => 'Protokoly',
	),
	'menu' => array(
		'about' => 'O FreshRSS',
		'before_one_day' => 'Starší než jeden den',
		'before_one_week' => 'Starší než jeden týden',
		'bookmark_query' => 'Uložit aktuální dotaz do záložek',
		'favorites' => 'Oblíbené (%s)',
		'global_view' => 'Zobrazení přehledu',
		'important' => 'Důležité kanály',
		'main_stream' => 'Hlavní kanál',
		'mark_all_read' => 'Označit vše jako přečtené',
		'mark_cat_read' => 'Označit kategorii jako přečtenou',
		'mark_feed_read' => 'Označit kanál jako přečtený',
		'mark_selection_unread' => 'Označit výběr jako nepřečtený',
		'mylabels' => 'Mé popisky',
		'newer_first' => 'Nejdříve novější',
		'non-starred' => 'Zobrazit neoblíbené',
		'normal_view' => 'Normální zobrazení',
		'older_first' => 'Nejdříve nejstarší',
		'queries' => 'Uživatelské dotazy',
		'read' => 'Zobrazit přečtené',
		'reader_view' => 'Zobrazení pro čtení',
		'rss_view' => 'Kanál RSS',
		'search_short' => 'Hledat',
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
		'starred' => 'Zobrazit oblíbené',
		'stats' => 'Statistika',
		'subscription' => 'Správa odběrů',
		'unread' => 'Zobrazit nepřečtené',
	),
	'share' => 'Sdílet',
	'tag' => array(
		'related' => 'Štítky článků',
	),
	'tos' => array(
		'title' => 'Podmínky služby',
	),
);

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
		'_' => 'Archivovanie',
		'exception' => 'Výnimka mazania',
		'help' => 'Viac možností nájdete v nastaveniach kanála',
		'keep_favourites' => 'Nikdy nemazať obľúbené',
		'keep_labels' => 'Nikdy nemazať štítky',
		'keep_max' => 'Maximálny počet článkov na zachovanie',	// DIRTY
		'keep_min_by_feed' => 'Minimálny počet článkov kanála na zachovanie',
		'keep_period' => 'Maximálny vek článkov na zachovanie',
		'keep_unreads' => 'Nikdy nemazať neprečítané články',
		'maintenance' => 'Údržba',
		'optimize' => 'Optimalizovať databázu',
		'optimize_help' => 'Občas vykonajte na zmenšenie veľkosti databázy',
		'policy' => 'Politika mazania',
		'policy_warning' => 'Ak nie je vybrané politika mazania, bude zachovaný každý článok.',
		'purge_now' => 'Vyčistiť teraz',
		'title' => 'Archivovanie',
		'ttl' => 'Neaktualizovať častejšie ako',
	),
	'display' => array(
		'_' => 'Zobrazenie',
		'darkMode' => array(
			'_' => 'Automatický tmavý režim',
			'auto' => 'Automaticky',
			'help' => 'For compatible themes only',	// TODO
			'no' => 'Nie',
		),
		'icon' => array(
			'bottom_line' => 'Spodný riadok',
			'display_authors' => 'Autori',
			'entry' => 'Ikony článku',
			'publication_date' => 'Dátum zverejnenia',
			'related_tags' => 'Značky článku',
			'sharing' => 'Zdieľanie',
			'summary' => 'Zhrnutie',
			'top_line' => 'Horný riadok',
		),
		'language' => 'Jazyk',
		'notif_html5' => array(
			'seconds' => 'sekundy (0 znamená bez limitu)',
			'timeout' => 'Limit HTML5 oznámenia',
		),
		'show_nav_buttons' => 'Zobraziť tlačidlá oznámenia',
		'theme' => array(
			'_' => 'Vzhľad',
			'deprecated' => array(
				'_' => 'Nepodporované',
				'description' => 'Táto téma už nie je podporovaná a nebude viac dostupná v <a href="https://freshrss.github.io/FreshRSS/en/users/05_Configuration.html#theme" target="_blank">budúdich verziách FreshRSS</a>',
			),
		),
		'theme_not_available' => 'Vzhľad “%s” už nie je dostupný. Prosím, vyberte si iný vzhľad.',
		'thumbnail' => array(
			'label' => 'Miniatúra',
			'landscape' => 'Naležato',
			'none' => 'Žiadny',
			'portrait' => 'Nastojato',
			'square' => 'Štvorec',
		),
		'timezone' => 'Časová zóna',
		'title' => 'Zobraziť',
		'website' => array(
			'full' => 'Ikona a názov',
			'icon' => 'Iba ikona',
			'label' => 'Webová stránka',
			'name' => 'Iba názov',
			'none' => 'Nič',
		),
		'width' => array(
			'content' => 'Šírka obsahu',
			'large' => 'Veľká',
			'medium' => 'Stredná',
			'no_limit' => 'Bez obmedzenia',
			'thin' => 'Úzka',
		),
	),
	'logs' => array(
		'loglist' => array(
			'level' => 'Úroveň záznamu',
			'message' => 'Správa záznamu',
			'timestamp' => 'Časová značka',
		),
		'pagination' => array(
			'first' => 'Prvý',
			'last' => 'Posledný',
			'next' => 'Ďalší',
			'previous' => 'Predošlý',
		),
	),
	'mark_read_button' => array(
		'_' => '“Označiť všetko ako prečítané” button',	// DIRTY
		'big' => 'Big',	// TODO
		'none' => 'None',	// TODO
		'small' => 'Small',	// TODO
	),
	'privacy' => array(
		'_' => 'Privacy',	// TODO
		'retrieve_extension_list' => 'Retrieve extension list',	// TODO
	),
	'profile' => array(
		'_' => 'Správca profilu',
		'api' => array(
			'_' => 'Správa API',
			'api_not_set' => 'API password not set',	// TODO
			'api_set' => 'API password set',	// TODO
			'check_link' => 'Check API status via: <kbd><a href="../api/" target="_blank">%s</a></kbd>',	// TODO
			'disabled' => 'The API access is disabled.',	// TODO
			'documentation_link' => 'See the <a href="https://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target="_blank">documentation and list of known apps</a>',	// TODO
			'help' => 'See <a href="http://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target=_blank>documentation</a>',	// TODO
		),
		'delete' => array(
			'_' => 'Vymazanie účtu',
			'warn' => 'Váš účet a všetky údaje v ňom budú vymazané.',
		),
		'email' => 'E-mailová adresa',
		'password_api' => 'Heslo API<br /><small>(pre mobilné aplikácie)</small>',
		'password_form' => 'Heslo<br /><small>(pre spôsob prihlásenia cez webový formulár)</small>',
		'password_format' => 'Najmenej 7 znakov',
		'title' => 'Profil',
	),
	'query' => array(
		'_' => 'Dopyty používateľa',
		'deprecated' => 'Tento dopyt už nie je platný. Kategória alebo kanál boli vymazané.',
		'description' => 'Description',	// TODO
		'filter' => array(
			'_' => 'Použitý filter:',
			'categories' => 'Zobraziť podľa kategórie',
			'feeds' => 'Zobraziť podľa kanála',
			'order' => 'Zobraziť podľa dátumu',
			'search' => 'Výraz',
			'shareOpml' => 'Povoliť zdieľanie prostredníctvom OPML zodpovedajúdich kategórií a kanálov',
			'shareRss' => 'Povoliť zdieľanie prostredníctvom HTML &amp; RSS',
			'state' => 'Štát',
			'tags' => 'Zobraziť podľa štítku',
			'type' => 'Typ',
		),
		'get_A' => 'Show all feeds, also those shown in their category',	// TODO
		'get_Z' => 'Show all feeds, also archived ones',	// TODO
		'get_all' => 'Zobraziť všetky články',
		'get_all_labels' => 'Zobraziť články so všetkými štítkami',
		'get_category' => 'Zobraziť kategóriu “%s”',
		'get_favorite' => 'Zobraziť obľúbené články',
		'get_feed' => 'Zobraziť kanál “%s”',
		'get_important' => 'Zobraziť články z dôležitých kanálov',
		'get_label' => 'Zobraziť články so štítkom “%s”',
		'help' => 'Prečítajte si <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentáciu pre dopyt používateľov a zdieľanie prostredníctvom HTML / RSS / OPML</a>.',
		'image_url' => 'Image URL',	// TODO
		'name' => 'Meno',
		'no_filter' => 'Žiadny filter',
		'no_queries' => array(
			'_' => 'No user queries are saved yet.',	// TODO
			'help' => 'See <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentation</a>',	// TODO
		),
		'number' => 'Dopyt číslo %d',
		'order_asc' => 'Zobraziť staršie články hore',
		'order_desc' => 'Zobraziť novšie články hore',
		'search' => 'Vyhľadáva sa: “%s”',
		'share' => array(
			'_' => 'Zdieľať odkaz pre tento dopyt',
			'disabled' => array(
				'_' => 'disabled',	// TODO
				'title' => 'Sharing',	// TODO
			),
			'greader' => 'Shareable link to the GReader JSON',	// TODO
			'help' => 'Pošlite tento odkaz ak chcete zdielať dopyt s kýmkoľvek',
			'html' => 'Zdielateľný odkaz na HTML stránku',
			'opml' => 'Zdielateľný odkaz na OPML zoznam kanálov',
			'rss' => 'Zdielateľný odkaz na RSS kanále',
		),
		'state_0' => 'Zobraziť všetky články',
		'state_1' => 'Zobraziť prečítané články',
		'state_2' => 'Zobraziť neprečítané články',
		'state_3' => 'Zobraziť všetky články',
		'state_4' => 'Zobraziť obľúbené články',
		'state_5' => 'Zobraziť prečítané obľúbené články',
		'state_6' => 'Zobraziť neprečítané obľúbené články',
		'state_7' => 'Zobraziť obľúbené články',
		'state_8' => 'Zobraziť neobľúbené články',
		'state_9' => 'Zobraziť prečítané neobľúbené články',
		'state_10' => 'Zobraziť neprečítané neobľúbené články',
		'state_11' => 'Zobraziť neobľúbené články',
		'state_12' => 'Zobraziť všetky články',
		'state_13' => 'Zobraziť prečítané články',
		'state_14' => 'Zobraziť neprečítané články',
		'state_15' => 'Zobraziť všetky články',
		'title' => 'Používateľské dopyty',
	),
	'reading' => array(
		'_' => 'Čítanie',
		'after_onread' => 'Po “Označiť všetko ako prečítané”,',
		'always_show_favorites' => 'Automaticky zobraziť všetky články v obľúbených',
		'apply_to_individual_feed' => 'Applies to feeds individually',	// TODO
		'article' => array(
			'authors_date' => array(
				'_' => 'Authori a dátum',
				'both' => 'V záhlaví a pätičke',
				'footer' => 'V pätičke',
				'header' => 'V záhlaví',
				'none' => 'Žiadne',
			),
			'feed_name' => array(
				'above_title' => 'O zápise/značky',
				'none' => 'Žiadne',
				'with_authors' => 'V riadku autori a dátum',
			),
			'feed_title' => 'Nadpis kanála',
			'icons' => array(
				'_' => 'Article icons position<br /><small>(Reading view only)</small>',	// TODO
				'above_title' => 'Above title',	// TODO
				'with_authors' => 'In authors and date row',	// TODO
			),
			'tags' => array(
				'_' => 'Značky',
				'both' => 'V záhlaví a pätičke',
				'footer' => 'V pätičke',
				'header' => 'V záhlaví',
				'none' => 'Žiadne',
			),
			'tags_max' => array(
				'_' => 'Maximálny počet zobrazených značiek',
				'help' => '0 znamená: zobraziť všetky značky a nerozbaľuj ich',
			),
		),
		'articles_per_page' => 'Počet článkov na jednu stranu',
		'auto_load_more' => 'Načítať ďalšie články dolu na stránke',
		'auto_remove_article' => 'Skryť články po prečítaní',
		'confirm_enabled' => 'Zobraziť potvrdzovací dialóg po kliknutí na “Označiť všetko ako prečítané”',
		'display_articles_unfolded' => 'Zobraziť články otvorené',
		'display_categories_unfolded' => 'Kategórie na rozbalenie',
		'headline' => array(
			'articles' => 'Články: Otvoriť/Zatvoriť',
			'articles_header_footer' => 'Články: záhlavie/pätička',
			'categories' => 'Ľavé menu: Kategórie',
			'mark_as_read' => 'Označiť článok ako prečítaný',
			'misc' => 'Ostatné',
			'view' => 'Zobraziť',
		),
		'hide_read_feeds' => 'Skryť kategórie a kanály s nulovým počtom neprečítaných článkov (nefunguje s nastaveným “Zobraziť všetky články”)',
		'img_with_lazyload' => 'Pre načítanie obrázkov použiť <em>lazy load</em>',
		'jump_next' => 'skočiť na ďalší neprečítaný',
		'mark_updated_article_unread' => 'Označiť aktualizované články ako neprečítané',
		'number_divided_when_reader' => 'V režime čítania predeliť na dve časti.',
		'read' => array(
			'article_open_on_website' => 'keď je článok otvorený na svojej webovej stránke',
			'article_viewed' => 'keď je článok zobrazený',
			'focus' => 'počas prezeranie (okrem dôležitých kanálov)',
			'keep_max_n_unread' => 'Maximálny počet článkov ponechať ako neprečítané',
			'scroll' => 'počas skrolovania (okrem dôležitých kanálov)',
			'upon_gone' => 'keď už nie je v hlavnom kanály noviniek',
			'upon_reception' => 'po načítaní článku',
			'when' => 'Označiť článok ako prečítaný…',
			'when_same_title_in_category' => 'if an identical title already exists in the top <i>n</i> newest articles of the category',	// TODO
			'when_same_title_in_feed' => 'ak rovnaký nadpis už existuje v TOP <i>n</i> najnovších článkoch (of the feed)',	// DIRTY
		),
		'show' => array(
			'_' => 'Článkov na zobrazenie',
			'active_category' => 'Aktívna kategória',
			'adaptive' => 'Show unreads if any, all articles otherwise',	// TODO
			'all_articles' => 'Zobraziť všetky články',
			'all_categories' => 'Všetky kategórie',
			'no_category' => 'Bez kategŕie',
			'remember_categories' => 'Zapamätať otvorené kategórie',
			'unread' => 'Zobraziť iba neprečítané',
			'unread_or_favorite' => 'Show unreads and favourites',	// TODO
		),
		'show_fav_unread_help' => 'Týka sa aj štítkov',
		'sides_close_article' => 'Po kliknutí mimo textu článku sa článok zatvorí',
		'sort' => array(
			'_' => 'Poradie',
			'newer_first' => 'Novšie hore',
			'older_first' => 'Staršie hore',
		),
		'star' => array(
			'when' => 'Mark an article as favourite…',	// TODO
		),
		'sticky_post' => 'Po otvorení posunúť článok hore',
		'title' => 'Čítanie',
		'view' => array(
			'default' => 'Prednastavené zobrazenie',
			'global' => 'Prehľadné zobrazenie',
			'normal' => 'Základné zobrazenie',
			'reader' => 'Zobrazenie na čítanie',
		),
	),
	'sharing' => array(
		'_' => 'Zdieľanie',
		'add' => 'Pridať spôsob zdieľania',
		'bluesky' => 'Bluesky',	// TODO
		'deprecated' => 'Táto služba nie je podporovaná a bude z FreshRSS odstránená v <a href="https://freshrss.github.io/FreshRSS/en/users/08_sharing_services.html" title="Pre viac informácií otvorte dokumentáciu" target="_blank">budúcich verziách</a>.',
		'diaspora' => 'Diaspora*',	// IGNORE
		'email' => 'E-mail',	// IGNORE
		'facebook' => 'Facebook',	// IGNORE
		'more_information' => 'Viac informácií',
		'print' => 'Tlač',	// IGNORE
		'raindrop' => 'Raindrop.io',	// IGNORE
		'remove' => 'Odstrániť spôsob zdieľania',
		'shaarli' => 'Shaarli',	// IGNORE
		'share_name' => 'Meno pre zobrazenie',
		'share_url' => 'Zdieľaný odkaz',
		'title' => 'Zdieľanie',
		'twitter' => 'Twitter',	// IGNORE
		'wallabag' => 'wallabag',	// IGNORE
	),
	'shortcut' => array(
		'_' => 'Skratky',
		'article_action' => 'Akcie článku',
		'auto_share' => 'Zdieľať',
		'auto_share_help' => 'Ak je nastavený iba jeden spôsob zdieľania, použije sa. Inak si spôsoby zdieľania vyberá používateľ podľa čísla.',
		'close_dropdown' => 'Zavrie menu',
		'collapse_article' => 'Zroluje článok',
		'first_article' => 'Otvorí prvý článok',
		'focus_search' => 'Vyhľadávanie',
		'global_view' => 'Prepne do prehľadného zobrazenia',
		'help' => 'Zobrazí dokumentáciu',
		'javascript' => 'JavaScript musí byť povolený, ak chcete používať skratky',
		'last_article' => 'Otvorí posledný článok',
		'load_more' => 'Načíta viac článkov',
		'mark_favorite' => 'O(d)značí ako obľúbené',
		'mark_read' => 'O(d)značí ako prečítané',
		'navigation' => 'Navigácia',
		'navigation_help' => 'Po stlačení skratky s klávesou <kbd>⇧ Shift</kbd>, sa skratky navigácie vzťahujú na kanály.<br/>Po stlačení skratky s klávesou <kbd>Alt ⎇</kbd>, sa skratky navigácie vzťahujú na kategórie.',
		'navigation_no_mod_help' => 'Tieto skratky navigácie nepodporujú klávesy “Shift” a “Alt”.',
		'next_article' => 'Otvorí ďalší článok',
		'next_unread_article' => 'Otvoriť ďalší neprečítaný článok',
		'non_standard' => 'Niektoré klávesy (<kbd>%s</kbd>) nemusia fungovať ako klávesové skratky.',
		'normal_view' => 'Prepne do základného zobrazenia',
		'other_action' => 'Ostatné akcie',
		'previous_article' => 'Otvorí predošlý článok',
		'reading_view' => 'Prepne do zobrazenia na čítanie',
		'rss_view' => 'Otvoriť ako kanál RSS',
		'see_on_website' => 'Zobrazí na webovej stránke',
		'shift_for_all_read' => '+ <kbd>Alt ⎇</kbd> na označené predošlých článkov ako prečítané<br />+ <kbd>⇧ Shift</kbd> na označenie všetkých článkov ako prečítané',
		'skip_next_article' => 'Prejde na ďalší bez otvorenia',
		'skip_previous_article' => 'Prejde na predošlý bez otvorenia',
		'title' => 'Skratky',
		'toggle_media' => 'Spustiť/zastaviť médium',
		'user_filter' => 'Použiť používateľské filtre',
		'user_filter_help' => 'Ak je nastavený iba jeden spôsob zdieľania, použije sa. Inak si spôsoby zdieľania vyberá používateľ podľa čísla.',
		'views' => 'Zobrazenia',
	),
	'user' => array(
		'articles_and_size' => '%s článkov (%s)',
		'current' => 'Aktuálny používateľ',
		'is_admin' => 'je administrátor',
		'users' => 'Používatelia',
	),
);

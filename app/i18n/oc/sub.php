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
		'documentation' => 'Copiatz l’URL seguenta per l’utilizaire dins d’una aisina extèrna.',
		'title' => 'API',	// IGNORE
	),
	'bookmarklet' => array(
		'documentation' => 'Depausatz aqueste boton per la barra de marcapaginas o clicatz-lo a drecha e causissètz « Enregistrar aqueste ligam». Puèi clicatz «S’abonar» sus las paginas que volètz seguir.',
		'label' => 'S’abonar',
		'title' => 'Bookmarklet',	// IGNORE
	),
	'category' => array(
		'_' => 'Categoria',
		'add' => 'Ajustar categoria',
		'archiving' => 'Archivar',
		'dynamic_opml' => array(
			'_' => 'OPML dinamic',
			'help' => 'Fornís l’URL per un <a href="http://opml.org/" target="_blank">fichièr OPML</a> per garnir automaticament aquesta categoria amb de flux',
		),
		'empty' => 'Categoria voida',
		'expand' => 'Expand category',	// TODO
		'information' => 'Informacions',
		'open' => 'Open category',	// TODO
		'opml_url' => 'URL OPML',
		'position' => 'Mostrar la posicion',
		'position_help' => 'Per contrarotlar l’òrdre de tria de la categoria',
		'title' => 'Títol',
	),
	'feed' => array(
		'accept_cookies' => 'Acceptar los cookies',
		'accept_cookies_help' => 'Permetre al servidor del flux de definir de cookies (gardatz en memòria pendent la durada de la requèsta sonque)',
		'add' => 'Ajustar un flux',
		'advanced' => 'Avançat',
		'archiving' => 'Archivar',
		'auth' => array(
			'configuration' => 'Identificacion',
			'help' => 'Permet l’accès als fluxes protegits per una autentificacion HTTP',
			'http' => 'Autentificacion HTTP',
			'password' => 'Senhal HTTP',
			'username' => 'Identificant HTTP',
		),
		'clear_cache' => 'Totjorn escafar lo cache',
		'content_action' => array(
			'_' => 'Accion sul contengut en recuperant lo contengut de l’article',
			'append' => 'Apondre aprèp lo contengut existent',
			'prepend' => 'Apondre abans lo contengut existent',
			'replace' => 'Remplaçar lo contengut existent',
		),
		'content_retrieval' => 'Content retrieval',	// TODO
		'css_cookie' => 'Utilizar los cookies en recuperant lo contengut de l’article',
		'css_cookie_help' => 'Exemple : <kbd>foo=bar; gdpr_consent=true; cookie=value</kbd>',
		'css_help' => 'Permet de recuperar los fluxes troncats (atencion, demanda mai de temps !)',
		'css_path' => 'Selector CSS dels articles sul site d’origina',
		'css_path_filter' => array(
			'_' => 'Selector CSS de l’element de tirar',
			'help' => 'Un selector CSS pòt èsser una lista coma : <kbd>footer, aside, p[data-sanitized-class~="menu"]</kbd>',
		),
		'description' => 'Descripcion',	// IGNORE
		'empty' => 'Aqueste flux es void. Assegurats-vos qu’es totjorn mantengut.',
		'error' => 'Aqueste flux a rescontrat un problèma. Volgatz verificar que siá totjorn accessible.',	// DIRTY
		'export-as-opml' => array(
			'download' => 'Download',	// TODO
			'help' => 'XML file (data subset. <a href="https://freshrss.github.io/FreshRSS/en/developers/OPML.html" target="_blank">See documentation</a>)',	// TODO
			'label' => 'Export as OPML',	// TODO
		),
		'filteractions' => array(
			'_' => 'Filtre d’accion',
			'help' => 'Escrivètz una recèrca per linha. Operators <a href="https://freshrss.github.io/FreshRSS/en/users/10_filter.html#with-the-search-field" target="_blank">see documentation</a>.',	// DIRTY
		),
		'http_headers' => 'HTTP Headers',	// TODO
		'http_headers_help' => 'Headers are separated by a newline, and the name and value of a header are separated by a colon (e.g: <kbd><code>Accept: application/atom+xml<br />Authorization: Bearer some-token</code></kbd>).',	// TODO
		'information' => 'Informacions',
		'keep_min' => 'Nombre minimum d’articles de servar',
		'kind' => array(
			'_' => 'Tipe de font de flux',
			'html_json' => array(
				'_' => 'HTML + XPath + JSON dot notation (JSON in HTML)',	// TODO
				'xpath' => array(
					'_' => 'XPath for JSON in HTML',	// TODO
					'help' => 'Example: <code>normalize-space(//script[@type="application/json"])</code> (single JSON)<br />or: <code>//script[@type="application/ld+json"]</code> (one JSON object per article)',	// TODO
				),
			),
			'html_xpath' => array(
				'_' => 'HTML + XPath (Web scraping)',	// IGNORE
				'feed_title' => array(
					'_' => 'títol del flux',
					'help' => 'Exemple : <code>//title</code> o una cadena de tèxt estatica : <code>"Mon flux personalizat"</code>',
				),
				'help' => '<dfn><a href="https://www.w3.org/TR/xpath-10/" target="_blank">XPath 1.0</a></dfn> es un lengatge de requèsta estandard pels utilizaires avançats, e que FreshRSS prend en carga pel Web scraping.',
				'item' => array(
					'_' => 'trobar de novèlas <strong>items</strong><br /><small>(mai important)</small>',
					'help' => 'Exemple : <code>//div[@class="news-item"]</code>',
				),
				'item_author' => array(
					'_' => 'item autor',
					'help' => 'Pòt èsser una cadena de tèxt estatica. Exemple : <code>"Anonymous"</code>',
				),
				'item_categories' => 'item etiqueta',
				'item_content' => array(
					'_' => 'item contengut',
					'help' => 'Exemple per prendre tot l’item : <code>.</code>',
				),
				'item_thumbnail' => array(
					'_' => 'item vinheta',
					'help' => 'Exemple : <code>descendant::img/@src</code>',
				),
				'item_timeFormat' => array(
					'_' => 'Custom date/time format',	// TODO
					'help' => 'Optional. A format supported by <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a> such as <code>d-m-Y H:i:s</code>',	// TODO
				),
				'item_timestamp' => array(
					'_' => 'item data',
					'help' => 'Lo resultats serà formatat per la foncion <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a>',
				),
				'item_title' => array(
					'_' => 'item títol',
					'help' => 'Utilizatz en particular lo <a href="https://developer.mozilla.org/docs/Web/XPath/Axes" target="_blank">XPath axis</a> <code>descendant::</code> coma <code>descendant::h2</code>',
				),
				'item_uid' => array(
					'_' => 'item ID unic',
					'help' => 'Opcional. Exemple : <code>descendant::div/@data-uri</code>',
				),
				'item_uri' => array(
					'_' => 'item ligam (URL)',
					'help' => 'Exemple : <code>descendant::a/@href</code>',
				),
				'relative' => 'XPath (relatiu a l’element) per :',
				'xpath' => 'XPath per :',
			),
			'json_dotnotation' => array(
				'_' => 'JSON (dot notation)',	// TODO
				'feed_title' => array(
					'_' => 'feed title',	// TODO
					'help' => 'Example: <code>meta.title</code> or a static string: <code>"My custom feed"</code>',	// TODO
				),
				'help' => 'A JSON dot notated uses dots between objects and brackets for arrays (e.g. <code>data.items[0].title</code>)',	// TODO
				'item' => array(
					'_' => 'finding news <strong>items</strong><br /><small>(most important)</small>',	// TODO
					'help' => 'JSON path to the array containing the items, e.g. <code>$</code> or <code>newsItems</code>',	// TODO
				),
				'item_author' => 'item author',	// TODO
				'item_categories' => 'item tags',	// TODO
				'item_content' => array(
					'_' => 'item content',	// TODO
					'help' => 'Key under which the content is found, e.g. <code>content</code>',	// TODO
				),
				'item_thumbnail' => array(
					'_' => 'item thumbnail',	// TODO
					'help' => 'Example: <code>image</code>',	// TODO
				),
				'item_timeFormat' => array(
					'_' => 'Custom date/time format',	// TODO
					'help' => 'Optional. A format supported by <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a> such as <code>d-m-Y H:i:s</code>',	// TODO
				),
				'item_timestamp' => array(
					'_' => 'item date',	// TODO
					'help' => 'The result will be parsed by <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a>',	// TODO
				),
				'item_title' => 'item title',	// TODO
				'item_uid' => 'item unique ID',	// TODO
				'item_uri' => array(
					'_' => 'item link (URL)',	// TODO
					'help' => 'Example: <code>permalink</code>',	// TODO
				),
				'json' => 'dot notation for:',	// TODO
				'relative' => 'dot notated path (relative to item) for:',	// TODO
			),
			'jsonfeed' => 'JSON Feed',	// TODO
			'rss' => 'RSS / Atom (defaut)',
			'xml_xpath' => 'XML + XPath',	// TODO
		),
		'maintenance' => array(
			'clear_cache' => 'Escafar lo cache',
			'clear_cache_help' => 'Escafar lo cache d’aqueste flux sul disc',
			'reload_articles' => 'Recargar los articles',
			'reload_articles_help' => 'Recargar los articles e recuperar lo contengut complet',	// DIRTY
			'title' => 'Mantenença',
		),
		'max_http_redir' => 'Max HTTP redireccions',
		'max_http_redir_help' => 'Definir a 0 o daissar void per lo desactivar, -1 per de redireccions illimitadas',
		'method' => array(
			'_' => 'HTTP Method',	// TODO
		),
		'method_help' => 'The POST payload has automatic support for <code>application/x-www-form-urlencoded</code> and <code>application/json</code>',	// TODO
		'method_postparams' => 'Payload for POST',	// TODO
		'moved_category_deleted' => 'Quand escafatz una categoria, sos fluxes son automaticament classats dins <em>%s</em>.',
		'mute' => array(
			'_' => 'mut',
			'state_is_muted' => 'This feed is muted',	// TODO
		),
		'no_selected' => 'Cap de flux pas seleccionat.',
		'number_entries' => '%d articles',	// IGNORE
		'open_feed' => 'Open feed %s',	// TODO
		'path_entries_conditions' => 'Conditions for content retrieval',	// TODO
		'priority' => array(
			'_' => 'Visibilitat',
			'archived' => 'Mostrar pas (archivat)',
			'category' => 'Mostar dins sa categoria',
			'important' => 'Show in important feeds',	// TODO
			'main_stream' => 'Mostar al flux màger',
		),
		'proxy' => 'Definir un servidor proxy per trapar aqueste flux',
		'proxy_help' => 'Seleccionatz un protocòl (ex : SOCKS5) e picatz l’adreça del proxy (ex : <kbd>127.0.0.1:1080</kbd> or <kbd>username:password@127.0.0.1:1080</kbd>)',	// DIRTY
		'selector_preview' => array(
			'show_raw' => 'Veire lo còdi font',
			'show_rendered' => 'Veire lo contengut',
		),
		'show' => array(
			'all' => 'Mostrar totes los fluxes',
			'error' => 'Mostrar pas que los fluxes amb errors',
		),
		'showing' => array(
			'error' => 'Afichatge dels articles amb errors solament',
		),
		'ssl_verify' => 'Verificacion de la seguretat SSL',
		'stats' => 'Estatisticas',
		'think_to_add' => 'Podètz ajustar de fluxes.',
		'timeout' => 'Temps d’espèra en segondas',
		'title' => 'Títol',
		'title_add' => 'Ajustar un flux RSS',
		'ttl' => 'Actualizar pas automaticament mai sovent que',
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
		'url' => 'Flux URL',
		'useragent' => 'Definir un user agent per recuperar aqueste flux',
		'useragent_help' => 'Exemple : <kbd>Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0)</kbd>',
		'validator' => 'Verificar la validitat del flux',
		'website' => 'URL del site',
		'websub' => 'Notificacions instantanèas amb WebSub',
	),
	'import_export' => array(
		'export' => array(
			'_' => 'Exportar',
			'sqlite' => 'Download user database as SQLite',	// TODO
		),
		'export_labelled' => 'Exportar los articles etiquetats',
		'export_opml' => 'Exportar la lista de fluxes (OPML)',
		'export_starred' => 'Exportar los favorits',
		'feed_list' => 'Lista dels %s articles',
		'file_to_import' => 'Fichièr d’importar<br />(OPML, JSON o ZIP)',
		'file_to_import_no_zip' => 'Fichièr d’importar<br />(OPML o JSON)',
		'import' => 'Importar',
		'starred_list' => 'Lista dels articles favorits',
		'title' => 'Importar / Exportar',
	),
	'menu' => array(
		'add' => 'Ajustar un flux o una categoria',
		'import_export' => 'Importar / Exportar',
		'label_management' => 'Gestion de las etiquetas',
		'stats' => array(
			'idle' => 'Fluxes inactius',
			'main' => 'Estatisticas principalas',
			'repartition' => 'Reparticion dels articles',
		),
		'subscription_management' => 'Gestion dels abonaments',
		'subscription_tools' => 'Aisinas d’abonament',
	),
	'tag' => array(
		'auto_label' => 'Add this label to new articles',	// TODO
		'name' => 'Nom',
		'new_name' => 'Nom novèl',
		'old_name' => 'Nom ancian',
	),
	'title' => array(
		'_' => 'Gestion dels abonaments',
		'add' => 'Apondon de flux o categoria',
		'add_category' => 'Ajustar una categoria',
		'add_dynamic_opml' => 'Apondre un OPML dinamic',
		'add_feed' => 'Ajustar un flux',
		'add_label' => 'Ajustar una etiqueta',
		'add_opml_category' => 'OPML category name',	// TODO
		'delete_label' => 'Suprimir una etiqueta',
		'feed_management' => 'Gestion dels fluxes RSS',
		'rename_label' => 'Renomenar una etiqueta',
		'subscription_tools' => 'Aisinas d’abonament',
	),
);

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
		'documentation' => 'Copier l’URL suivante dans l’outil qui utilisera l’API.',
		'title' => 'API',	// IGNORE
	),
	'bookmarklet' => array(
		'documentation' => 'Glisser ce bouton dans la barre des favoris ou cliquer droit dessus et choisir « Enregistrer ce lien ». Ensuite, cliquer sur le bouton « S’abonner » sur les pages auxquelles vous voulez vous abonner.',
		'label' => 'S’abonner',
		'title' => 'Bookmarklet',	// IGNORE
	),
	'category' => array(
		'_' => 'Catégorie',
		'add' => 'Ajouter catégorie',
		'archiving' => 'Archivage',
		'dynamic_opml' => array(
			'_' => 'OPML dynamique',
			'help' => 'Fournir l’URL d’un <a href="http://opml.org/" target="_blank">fichier OPML</a> qui donnera dynamiquement la liste des flux de cette catégorie',
		),
		'empty' => 'Catégorie vide',
		'expand' => 'Développer la catégorie',
		'information' => 'Informations',
		'open' => 'Ouvrir la catégorie',
		'opml_url' => 'URL de l’OPML',
		'position' => 'Position d’affichage',
		'position_help' => 'Pour contrôler l’ordre de tri des catégories',
		'title' => 'Titre',
	),
	'feed' => array(
		'accept_cookies' => 'Autoriser les cookies',
		'accept_cookies_help' => 'Accepte les cookies du flux (stocké en mémoire seulement le temps de la requête)',
		'add' => 'Ajouter un flux',
		'advanced' => 'Avancé',
		'archiving' => 'Archivage',
		'auth' => array(
			'configuration' => 'Identification',
			'help' => 'La connexion permet d’accéder aux flux protégés par une authentification HTTP.',
			'http' => 'Authentification HTTP',
			'password' => 'Mot de passe HTTP',
			'username' => 'Identifiant HTTP',
		),
		'clear_cache' => 'Toujours vider le cache',
		'content_action' => array(
			'_' => 'Action à effectuer pour la réception du contenu des articles',
			'append' => 'Ajouter après le contenu existant',
			'prepend' => 'Ajouter avant le contenu existant',
			'replace' => 'Remplacer le contenu existant',
		),
		'content_retrieval' => 'Récupération de contenu',
		'css_cookie' => 'Utiliser des cookies pour la réception du contenu des articles',
		'css_cookie_help' => 'Exemple : <kbd>foo=bar; gdpr_consent=true; cookie=value</kbd>',
		'css_help' => 'Permet de récupérer les flux tronqués (attention, demande plus de temps !)',
		'css_path' => 'Sélecteur CSS des articles sur le site d’origine',
		'css_path_filter' => array(
			'_' => 'Sélecteur CSS des éléments à supprimer',
			'help' => 'Un sélecteur CSS peut être une liste comme : <kbd>footer, aside, p[data-sanitized-class~="menu"]</kbd>',
		),
		'description' => 'Description',	// IGNORE
		'empty' => 'Ce flux est vide. Veuillez vérifier qu’il est encore maintenu.',
		'error' => 'Ce flux a rencontré un problème. Si la situation persiste, vérifiez qu’il est encore accessible.',
		'export-as-opml' => array(
			'download' => 'Télécharger',
			'help' => 'Fichier XML (données partielles. <a href="https://freshrss.github.io/FreshRSS/en/developers/OPML.html" target="_blank">Voir documentation</a>)',
			'label' => 'Exporter en OPML',
		),
		'filteractions' => array(
			'_' => 'Filtres d’action',
			'help' => 'Écrivez une recherche par ligne. Voir la <a href="https://freshrss.github.io/FreshRSS/fr/users/03_Main_view.html#gr%C3%A2ce-au-champ-de-recherche" target="_blank">documentation des opérateurs</a>.',
		),
		'http_headers' => 'Entêtes HTTP',
		'http_headers_help' => 'Un entête HTTP par ligne, avec le nom et la valeur séparés par un deux-points (ex. : <kbd><code>Accept: application/atom+xml<br />Authorization: Bearer some-token</code></kbd>).',
		'information' => 'Informations',
		'keep_min' => 'Nombre minimum d’articles à conserver',
		'kind' => array(
			'_' => 'Type de source de flux',
			'html_json' => array(
				'_' => 'HTML + XPath + JSON notation point (JSON dans HTML)',
				'xpath' => array(
					'_' => 'XPath pour JSON dans HTML',
					'help' => 'Exemple : <code>normalize-space(//script[@type="application/json"])</code> (JSON unique)<br />ou : <code>//script[@type="application/ld+json"]</code> (un objet JSON par article)',
				),
			),
			'html_xpath' => array(
				'_' => 'HTML + XPath (Moissonnage du Web)',
				'feed_title' => array(
					'_' => 'titre de flux',
					'help' => 'Exemple : <code>//title</code> ou un texte statique : <code>"Mon flux personnalisé"</code>',
				),
				'help' => '<dfn><a href="https://www.w3.org/TR/xpath-10/" target="_blank">XPath 1.0</a></dfn> est un langage de requête pour les utilisateurs avancés, supporté par FreshRSS pour le moissonnage du Web (Web scraping).',
				'item' => array(
					'_' => 'trouver les <strong>articles</strong><br /><small>(c’est le plus important)</small>',
					'help' => 'Exemple : <code>//div[@class="article"]</code>',
				),
				'item_author' => array(
					'_' => 'auteur de l’article',
					'help' => 'Peut aussi être une chaîne de texte statique. Exemple : <code>"Anonyme"</code>',
				),
				'item_categories' => 'catégories (tags) de l’article',
				'item_content' => array(
					'_' => 'contenu de l’article',
					'help' => 'Exemple pour prendre l’article complet : <code>.</code>',
				),
				'item_thumbnail' => array(
					'_' => 'miniature de l’article',
					'help' => 'Exemple : <code>descendant::img/@src</code>',
				),
				'item_timeFormat' => array(
					'_' => 'Format personnalisé pour interpréter la date',
					'help' => 'Optionnel. Un format supporté par <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a> comme <code>d-m-Y H:i:s</code>',
				),
				'item_timestamp' => array(
					'_' => 'date de l’article',
					'help' => 'Le résultat sera passé à la fonction <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a>',
				),
				'item_title' => array(
					'_' => 'titre de l’article',
					'help' => 'Utiliser en particulier l’<a href="https://developer.mozilla.org/docs/Web/XPath/Axes" target="_blank">axe XPath</a> <code>descendant::</code> comme <code>descendant::h2</code>',
				),
				'item_uid' => array(
					'_' => 'identifiant unique de l’article',
					'help' => 'Optionnel. Exemple : <code>descendant::div/@data-uri</code>',
				),
				'item_uri' => array(
					'_' => 'lien (URL) de l’article',
					'help' => 'Exemple : <code>descendant::a/@href</code>',
				),
				'relative' => 'XPath (relatif à l’article) pour :',
				'xpath' => 'XPath pour :',
			),
			'json_dotnotation' => array(
				'_' => 'JSON (notation point)',
				'feed_title' => array(
					'_' => 'titre de flux',
					'help' => 'Exemple : <code>meta.title</code> ou un texte statique : <code>"Mon flux personnalisé"</code>',
				),
				'help' => 'La notation point pour JSON utilise le point comme séparateur objet, et des crochets pour un tableau : (ex : <code>data.items[0].title</code>)',
				'item' => array(
					'_' => 'trouver les <strong>articles</strong><br /><small>(c’est le plus important)</small>',
					'help' => 'Chemin vers le tableau contenant les articles, par exemple <code>$</code> ou <code>newsItems</code>',
				),
				'item_author' => 'auteur de l’article',
				'item_categories' => 'catégories (tags) de l’article',
				'item_content' => array(
					'_' => 'contenu de l’article',
					'help' => 'Chemin JSON pour le contenu, par exemple <code>content</code>',
				),
				'item_thumbnail' => array(
					'_' => 'miniature de l’article',
					'help' => 'Exemple : <code>image</code>',
				),
				'item_timeFormat' => array(
					'_' => 'Format personnalisé pour interpréter la date',
					'help' => 'Optionnel. Un format supporté par <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a> comme <code>d-m-Y H:i:s</code>',
				),
				'item_timestamp' => array(
					'_' => 'date de l’article',
					'help' => 'Le résultat sera passé à la fonction <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a>',
				),
				'item_title' => 'titre de l’article',
				'item_uid' => 'identifiant unique de l’article',
				'item_uri' => array(
					'_' => 'lien (URL) de l’article',
					'help' => 'Exemple : <code>permalink</code>',
				),
				'json' => 'notation point pour :',
				'relative' => 'notation point relative à l’article pour :',
			),
			'jsonfeed' => 'JSON Feed',	// IGNORE
			'rss' => 'RSS / Atom (par défaut)',
			'xml_xpath' => 'XML + XPath',	// IGNORE
		),
		'maintenance' => array(
			'clear_cache' => 'Vider le cache',
			'clear_cache_help' => 'Supprime le cache de ce flux.',
			'reload_articles' => 'Recharger les articles',
			'reload_articles_help' => 'Recharge cette quantité d’articles et récupère le contenu complet si un sélecteur est défini.',
			'title' => 'Maintenance',	// IGNORE
		),
		'max_http_redir' => 'Maximum de redirections HTTP',
		'max_http_redir_help' => 'Mettre à 0 ou vide pour désactiver, -1 pour un nombre illimité de redirections',
		'method' => array(
			'_' => 'Méthode HTTP',
		),
		'method_help' => 'Les données POST supportent automatiquement <code>application/x-www-form-urlencoded</code> et <code>application/json</code>',
		'method_postparams' => 'Données pour POST',
		'moved_category_deleted' => 'Lors de la suppression d’une catégorie, ses flux seront automatiquement classés dans <em>%s</em>.',
		'mute' => array(
			'_' => 'désactivé',
			'state_is_muted' => 'Ce flux est désactivé',
		),
		'no_selected' => 'Aucun flux sélectionné.',
		'number_entries' => '%d articles',	// IGNORE
		'open_feed' => 'Ouvrir le flux %s',
		'path_entries_conditions' => 'Conditions pour la récupération de contenu',
		'priority' => array(
			'_' => 'Visibilité',
			'archived' => 'Ne pas afficher (archivé)',
			'category' => 'Afficher dans sa catégorie',
			'important' => 'Afficher dans les flux importants',
			'main_stream' => 'Afficher dans les flux principaux',
		),
		'proxy' => 'Utiliser un proxy pour télécharger ce flux',
		'proxy_help' => 'Sélectionner un protocole (ex : SOCKS5) et entrer l’adresse du proxy (ex. : <kbd>127.0.0.1:1080</kbd> ou <kbd>utilisateur:mot-de-passe@127.0.0.1:1080</kbd>)',
		'selector_preview' => array(
			'show_raw' => 'Afficher le code source',
			'show_rendered' => 'Afficher le contenu',
		),
		'show' => array(
			'all' => 'Montrer tous les flux',
			'error' => 'Montrer seulement les flux en erreur',
		),
		'showing' => array(
			'error' => 'Montre seulement les flux en erreur',
		),
		'ssl_verify' => 'Vérification sécurité SSL',
		'stats' => 'Statistiques',
		'think_to_add' => 'Vous pouvez ajouter des flux.',
		'timeout' => 'Délai d’attente en secondes',
		'title' => 'Titre',
		'title_add' => 'Ajouter un flux RSS',
		'ttl' => 'Ne pas automatiquement rafraîchir plus souvent que',
		'unicityCriteria' => array(
			'_' => 'Critère d’unicité des articles',
			'forced' => '<span title="Bloque le critère d’unicité même en cas de doublons">forcé</span>',
			'help' => 'Utile pour les flux invalides.<br />⚠️ Changer le critère peut créer des doublons.',
			'id' => 'ID standard (défaut)',
			'link' => 'Lien',
			'sha1:link_published' => 'Lien + Date',
			'sha1:link_published_title' => 'Lien + Date + Titre',
			'sha1:link_published_title_content' => 'Lien + Date + Titre + Contenu',
		),
		'url' => 'URL du flux',
		'useragent' => 'Sélectionner l’agent utilisateur pour télécharger ce flux',
		'useragent_help' => 'Exemple : <kbd>Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0)</kbd>',
		'validator' => 'Vérifier la validité du flux',
		'website' => 'URL du site',
		'websub' => 'Notifications instantanée par WebSub',
	),
	'import_export' => array(
		'export' => array(
			'_' => 'Exporter',
			'sqlite' => 'Télécharger la base de donnée de l’utilisateur au format SQLite',
		),
		'export_labelled' => 'Exporter les articles étiquetés',
		'export_opml' => 'Exporter la liste des flux (OPML)',
		'export_starred' => 'Exporter les favoris',
		'feed_list' => 'Liste des articles de %s',
		'file_to_import' => 'Fichier à importer<br />(OPML, JSON ou ZIP)',
		'file_to_import_no_zip' => 'Fichier à importer<br />(OPML ou JSON)',
		'import' => 'Importer',
		'starred_list' => 'Liste des articles favoris',
		'title' => 'Importer / exporter',
	),
	'menu' => array(
		'add' => 'Ajouter un flux/une catégorie',
		'import_export' => 'Importer / exporter',
		'label_management' => 'Gestion des étiquettes',
		'stats' => array(
			'idle' => 'Flux inactifs',
			'main' => 'Statistiques principales',
			'repartition' => 'Répartition des articles',
		),
		'subscription_management' => 'Gestion des abonnements',
		'subscription_tools' => 'Outils d’abonnement',
	),
	'tag' => array(
		'auto_label' => 'Ajoute l’étiquette aux nouveaux articles',
		'name' => 'Nom',
		'new_name' => 'Nouveau nom',
		'old_name' => 'Ancien nom',
	),
	'title' => array(
		'_' => 'Gestion des abonnements',
		'add' => 'Ajouter un flux/une catégorie',
		'add_category' => 'Ajouter une catégorie',
		'add_dynamic_opml' => 'Ajouter un OPML dynamique',
		'add_feed' => 'Ajouter un flux',
		'add_label' => 'Ajouter une étiquette',
		'add_opml_category' => 'Nom de la catégorie OPML',
		'delete_label' => 'Supprimer une étiquette',
		'feed_management' => 'Gestion des flux RSS',
		'rename_label' => 'Renommer une étiquette',
		'subscription_tools' => 'Outils d’abonnement',
	),
);

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
		'_' => 'Archivo',
		'exception' => 'Excepción de purga',
		'help' => 'Hay más opciones disponibles en los ajustes de la fuente',
		'keep_favourites' => 'Nunca elimines favoritos',
		'keep_labels' => 'Nunca elimine etiquetas',
		'keep_max' => 'Número máximo de artículos a conservar por fuente',
		'keep_min_by_feed' => 'Número mínimo de artículos a conservar por fuente',
		'keep_period' => 'Edad máxima de los artículos a conservar',
		'keep_unreads' => 'Nunca elimine artículos no leídos',
		'maintenance' => 'Mantenimiento',
		'optimize' => 'Optimizar la base de datos',
		'optimize_help' => 'Ejecuta la optimización de vez en cuando para reducir el tamaño de la base de datos',
		'policy' => 'Política de purga',
		'policy_warning' => 'Si no se selecciona ninguna política de purga, se conservarán todos los artículos.',
		'purge_now' => 'Limpiar ahora',
		'title' => 'Archivo',
		'ttl' => 'No actualizar automáticamente más de',
	),
	'display' => array(
		'_' => 'Visualización',
		'darkMode' => array(
			'_' => 'Modo oscuro automático',
			'auto' => 'Automático',
			'help' => 'Solo para temas compatibles',
			'no' => 'No',	// IGNORE
		),
		'icon' => array(
			'bottom_line' => 'Línea inferior',
			'display_authors' => 'Autores',
			'entry' => 'Iconos de artículos',
			'publication_date' => 'Fecha de publicación',
			'related_tags' => 'Etiquetas relacionadas',
			'sharing' => 'Compartir',
			'summary' => 'Resumen',
			'top_line' => 'Línea superior',
		),
		'language' => 'Idioma',
		'notif_html5' => array(
			'seconds' => 'segundos (0 significa sin límite de espera)',
			'timeout' => 'Notificación de fin de espera HTML5',
		),
		'show_nav_buttons' => 'Mostrar los botones de navegación',
		'theme' => array(
			'_' => 'Tema',
			'deprecated' => array(
				'_' => 'Obsoleto',
				'description' => 'Este tema no tiene soporte y no volverá a estar disponible en <a href="https://freshrss.github.io/FreshRSS/en/users/05_Configuration.html#theme" target="_blank">Futuros lanzamientos de FreshRSS</a>',
			),
		),
		'theme_not_available' => 'El tema “%s” ya no está disponible. Por favor, elija otro tema.',
		'thumbnail' => array(
			'label' => 'Miniatura',
			'landscape' => 'Horizontal',
			'none' => 'Ninguno',
			'portrait' => 'Retrato',
			'square' => 'Cuadrado',
		),
		'timezone' => 'Zona Horaria',
		'title' => 'Visualización',
		'website' => array(
			'full' => 'Icono y nombre',
			'icon' => 'Solo icono',
			'label' => 'Sitio web',
			'name' => 'Solo nombre',
			'none' => 'Ninguno',
		),
		'width' => array(
			'content' => 'Ancho de contenido',
			'large' => 'Grande',
			'medium' => 'Mediano',
			'no_limit' => 'Sin límite',
			'thin' => 'Estrecho',
		),
	),
	'logs' => array(
		'loglist' => array(
			'level' => 'Nivel de registro',
			'message' => 'Mensaje de registro',
			'timestamp' => 'Marca de tiempo',
		),
		'pagination' => array(
			'first' => 'Primero',
			'last' => 'Último',
			'next' => 'Siguiente',
			'previous' => 'Anterior',
		),
	),
	'mark_read_button' => array(
		'_' => '“marcar todos como leídos” button',	// DIRTY
		'big' => 'Big',	// TODO
		'none' => 'None',	// TODO
		'small' => 'Small',	// TODO
	),
	'privacy' => array(
		'_' => 'Privacy',	// TODO
		'retrieve_extension_list' => 'Retrieve extension list',	// TODO
	),
	'profile' => array(
		'_' => 'Administración de perfiles',
		'api' => array(
			'_' => 'Administración de API',
			'api_not_set' => 'API password not set',	// TODO
			'api_set' => 'API password set',	// TODO
			'check_link' => 'Check API status via: <kbd><a href="../api/" target="_blank">%s</a></kbd>',	// TODO
			'disabled' => 'The API access is disabled.',	// TODO
			'documentation_link' => 'See the <a href="https://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target="_blank">documentation and list of known apps</a>',	// TODO
			'help' => 'See <a href="http://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target=_blank>documentation</a>',	// TODO
		),
		'delete' => array(
			'_' => 'Borrar cuenta',
			'warn' => 'Tu cuenta y todos los datos asociados serán eliminados.',
		),
		'email' => 'Correo electrónico',
		'password_api' => 'Contraseña API <br /><small>(para apps móviles, por ej.)</small>',
		'password_form' => 'Contraseña<br /><small>(para el método de identificación por formulario web)</small>',
		'password_format' => 'Mínimo de 7 caracteres',
		'title' => 'Perfil',
	),
	'query' => array(
		'_' => 'Consultas de usuario',
		'deprecated' => 'Esta consulta ya no es válida. La categoría referenciada o fuente ha sido eliminada.',
		'description' => 'Descripción',
		'filter' => array(
			'_' => 'Filtro aplicado:',
			'categories' => 'Mostrar por categoría',
			'feeds' => 'Mostrar por fuente',
			'order' => 'Ordenar por fecha',
			'search' => 'Expresión',
			'shareOpml' => 'Permitir que OPML comparta las categorías y fuentes correspondientes',
			'shareRss' => 'Permite compartir por HTML &amp; RSS',
			'state' => 'Estado',
			'tags' => 'Mostrar por etiqueta',
			'type' => 'Tipo',
		),
		'get_A' => 'Show all feeds, also those shown in their category',	// TODO
		'get_Z' => 'Show all feeds, also archived ones',	// TODO
		'get_all' => 'Mostrar todos los artículos',
		'get_all_labels' => 'Mostrar artículos con cualquier etiqueta',
		'get_category' => 'Mostrar la categoría “%s”',
		'get_favorite' => 'Mostrar artículos favoritos',
		'get_feed' => 'Mostrar fuente “%s”',
		'get_important' => 'Mostrar artículos de fuentes importantes',
		'get_label' => 'Mostrar artículos con la etiqueta “%s”',
		'help' => 'Ver la <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentación para consultas de usuarios y compartir mediante HTML / RSS / OPML</a>.',
		'image_url' => 'URL de la imagen',
		'name' => 'Nombre',
		'no_filter' => 'Sin filtro',
		'no_queries' => array(
			'_' => 'No user queries are saved yet.',	// TODO
			'help' => 'See <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentation</a>',	// TODO
		),
		'number' => 'Consulta n° %d',
		'order_asc' => 'Mostrar primero los artículos más antiguos',
		'order_desc' => 'Mostrar primero los artículos más recientes',
		'search' => 'Buscar “%s”',
		'share' => array(
			'_' => 'Comparte esta consulta por enlace',
			'disabled' => array(
				'_' => 'disabled',	// TODO
				'title' => 'Sharing',	// TODO
			),
			'greader' => 'Enlace para compartir en GReader',
			'help' => 'Dale este enlace si quieres compartir esta consulta con alguien',
			'html' => 'Enlace para compartir a la página HTML',
			'opml' => 'Enlace para compartir a la lista de fuentes de OPML',
			'rss' => 'Enlace para compartir a la fuente RSS',
		),
		'state_0' => 'Mostrar todos los artículos',
		'state_1' => 'Mostrar artículos leídos',
		'state_2' => 'Mostrar artículos pendientes',
		'state_3' => 'Mostrar todos los artículos',
		'state_4' => 'Mostrar artículos favoritos',
		'state_5' => 'Mostrar artículos favoritos leídos',
		'state_6' => 'Mostrar artículos favoritos pendientes',
		'state_7' => 'Mostrar artículos favoritos',
		'state_8' => 'Mostrar artículos no favoritos',
		'state_9' => 'Mostrar artículos no favoritos leídos',
		'state_10' => 'Mostrar artículos no favoritos pendientes',
		'state_11' => 'Mostrar artículos no favoritos',
		'state_12' => 'Mostrar todos los artículos',
		'state_13' => 'Mostrar artículos leídos',
		'state_14' => 'Mostrar artículos sin leer',
		'state_15' => 'Mostrar todos los artículos',
		'title' => 'Consultas de usuario',
	),
	'reading' => array(
		'_' => 'Lectura',
		'after_onread' => 'Tras “marcar todo como leído”,',
		'always_show_favorites' => 'Mostrar todos los artículos en favoritos de forma predeterminada',
		'apply_to_individual_feed' => 'Applies to feeds individually',	// TODO
		'article' => array(
			'authors_date' => array(
				'_' => 'Autores y fecha',
				'both' => 'En el encabezado y pie de página',
				'footer' => 'En el pie de página',
				'header' => 'En el encabezado',
				'none' => 'Ninguno',
			),
			'feed_name' => array(
				'above_title' => 'Encima de título/etiquetas',
				'none' => 'Ninguno',
				'with_authors' => 'En la fila de autores y fecha',
			),
			'feed_title' => 'Título de la fuente',
			'icons' => array(
				'_' => 'Posición de los iconos del artículo<br /><small>(Solo en vista de lectura)</small>',
				'above_title' => 'Encima del título',
				'with_authors' => 'En la fila de autores y fecha',
			),
			'tags' => array(
				'_' => 'Etiquetas',
				'both' => 'En el encabezado y pie de página',
				'footer' => 'En el pie de página',
				'header' => 'En el encabezado',
				'none' => 'Ninguno',
			),
			'tags_max' => array(
				'_' => 'Máximo número de etiquetas a mostrar',
				'help' => '0 significa: mostrar todas las etiquetas y que no estén colapsadas',
			),
		),
		'articles_per_page' => 'Número de artículos por página',
		'auto_load_more' => 'Cargar más artículos al final de la página',
		'auto_remove_article' => 'Ocultar artículos tras la lectura',
		'confirm_enabled' => 'Mostrar ventana de confirmación al usar la función “marcar todos como leídos”',
		'display_articles_unfolded' => 'Mostrar los artículos expandidos por defecto',
		'display_categories_unfolded' => 'Categorías a desarrollar',
		'headline' => array(
			'articles' => 'Artículos: Abrir/Cerrar',
			'articles_header_footer' => 'Artículos: encabezado/pie de página',
			'categories' => 'Navegación izquierda: Categorías',
			'mark_as_read' => 'Marcar artículo como leído',
			'misc' => 'Variados',
			'view' => 'Ver',
		),
		'hide_read_feeds' => 'Ocultar categorías & fuentes sin artículos no leídos (no funciona con la configuración “Mostrar todos los artículos”)',
		'img_with_lazyload' => 'Usar el modo de “carga perezosa” para las imágenes',
		'jump_next' => 'saltar al siguiente archivo sin leer emparentado',
		'mark_updated_article_unread' => 'Marcar artículos actualizados como no leídos',
		'number_divided_when_reader' => 'Dividido en 2 en la vista de lectura.',
		'read' => array(
			'article_open_on_website' => 'cuando el artículo se abra en su web original',
			'article_viewed' => 'cuando se muestre el artículo',
			'focus' => 'cuando tiene el foco (excepto para fuentes importantes)',
			'keep_max_n_unread' => 'Número máximo de artículos para mantener sin leer',
			'scroll' => 'durante el desplazamiento (excepto para fuentes importantes)',
			'upon_gone' => 'cuando ya no está disponible en la fuente de noticias previa',
			'upon_reception' => 'al recibir el artículo',
			'when' => 'Marcar el artículo como leído…',
			'when_same_title_in_category' => 'if an identical title already exists in the top <i>n</i> newest articles of the category',	// TODO
			'when_same_title_in_feed' => 'Si ya existe un título idéntico en la parte superior <i>n</i> artículos más recientes (of the feed)',	// DIRTY
		),
		'show' => array(
			'_' => 'Artículos a mostrar',
			'active_category' => 'Categoría activa',
			'adaptive' => 'Show unreads if any, all articles otherwise',	// TODO
			'all_articles' => 'Mostrar todos los artículos',
			'all_categories' => 'Todas las categorías',
			'no_category' => 'Sin categoría',
			'remember_categories' => 'Recordar categorías abiertas',
			'unread' => 'Mostrar solo pendientes',
			'unread_or_favorite' => 'Show unreads and favourites',	// TODO
		),
		'show_fav_unread_help' => 'Se aplica también en las etiquetas',
		'sides_close_article' => 'Pinchar fuera del área de texto del artículo lo cerrará',
		'sort' => array(
			'_' => 'Orden',
			'newer_first' => 'Nuevos primero',
			'older_first' => 'Antiguos primero',
		),
		'star' => array(
			'when' => 'Marca un árticulo como favorito…',
		),
		'sticky_post' => 'Pegar el artículo a la parte superior al abrirlo',
		'title' => 'Lectura',
		'view' => array(
			'default' => 'Vista por defecto',
			'global' => 'Vista Global',
			'normal' => 'Vista Normal',
			'reader' => 'Vista de Lectura',
		),
	),
	'sharing' => array(
		'_' => 'Compartir',
		'add' => 'Agregar un método de uso compartido',
		'bluesky' => 'Bluesky',	// TODO
		'deprecated' => 'Este servicio está obsoleto y será removido de FreshRSS en un<a href="https://freshrss.github.io/FreshRSS/en/users/08_sharing_services.html" title="Abrir la documentación para más información" target="_blank">futuro lanzamiento</a>.',
		'diaspora' => 'Diaspora*',	// IGNORE
		'email' => 'Correo electrónico',
		'facebook' => 'Facebook',	// IGNORE
		'more_information' => 'Más información',
		'print' => 'Imprimir',
		'raindrop' => 'Raindrop.io',	// IGNORE
		'remove' => 'Quitar método de uso compartido',
		'shaarli' => 'Shaarli',	// IGNORE
		'share_name' => 'Compartir nombre a mostrar',
		'share_url' => 'Compartir URL a usar',
		'title' => 'Compartir',
		'twitter' => 'Twitter',	// IGNORE
		'wallabag' => 'Wallabag',	// IGNORE
	),
	'shortcut' => array(
		'_' => 'Atajos de teclado',
		'article_action' => 'Acciones de artículo',
		'auto_share' => 'Compartir',
		'auto_share_help' => 'Si solo hay un modo para compartir, ese será el que se use. En caso contrario los modos quedarán accesibles por su numeración.',
		'close_dropdown' => 'Cerrar menús',
		'collapse_article' => 'Contraer',
		'first_article' => 'Saltar al primer artículo',
		'focus_search' => 'Acceso a la casilla de búsqueda',
		'global_view' => 'Cambiar a la vista global',
		'help' => 'Mostrar documentación',
		'javascript' => 'JavaScript debe estar activado para poder usar atajos de teclado',
		'last_article' => 'Saltar al último artículo',
		'load_more' => 'Cargar más artículos',
		'mark_favorite' => 'Marcar como favorito',
		'mark_read' => 'Marcar como leído',
		'navigation' => 'Navegación',
		'navigation_help' => 'Con el modificador <kbd>⇧ Mayúsculas</kbd> es posible usar los atajos de teclado en las fuentes.<br/>Con el modificador <kbd>Alt ⎇</kbd> es posible aplicar los atajos de teclado en las categorías.',
		'navigation_no_mod_help' => 'Los siguientes accesos directos de navegación no admiten modificadores.',
		'next_article' => 'Saltar al siguiente artículo',
		'next_unread_article' => 'Abrir el siguiente artículo no leído',
		'non_standard' => 'Es posible que algunas teclas (<kbd>%s</kbd>) no funcionen como métodos abreviados.',
		'normal_view' => 'Cambiar a la vista normal',
		'other_action' => 'Otras acciones',
		'previous_article' => 'Saltar al artículo anterior',
		'reading_view' => 'Cambiar a la vista de lectura',
		'rss_view' => 'Abrir como fuente RSS',
		'see_on_website' => 'Ver en la web original',
		'shift_for_all_read' => '+ <kbd>Alt ⎇</kbd> para marcar los artículos anteriores como leídos<br />+ <kbd>⇧ Shift</kbd> marcar todos los artículos como leídos',
		'skip_next_article' => 'Enfoque siguiente sin abrir',
		'skip_previous_article' => 'Enfoque anterior sin abrir',
		'title' => 'Atajos de teclado',
		'toggle_media' => 'Jugar/pausar medios',
		'user_filter' => 'Acceso a filtros de usuario',
		'user_filter_help' => 'Si solo hay un filtro de usuario, ese será el que se use. En caso contrario, los filtros están accesibles por su numeración.',
		'views' => 'Vistas',
	),
	'user' => array(
		'articles_and_size' => '%s artículos (%s)',
		'current' => 'Usuario actual',
		'is_admin' => 'es administrador',
		'users' => 'Usuarios',
	),
);

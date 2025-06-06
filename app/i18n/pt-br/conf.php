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
		'_' => 'Arquivar',
		'exception' => 'Regras de exceção da limpeza',
		'help' => 'Mais opções estão disponíveis nas configurações individuais do Feed',
		'keep_favourites' => 'Nunca deletar os favoritos',
		'keep_labels' => 'Nunca deletar tags',
		'keep_max' => 'Número máximo de artigos para manter no feed',
		'keep_min_by_feed' => 'Número mínimo de artigos para manter no feed',
		'keep_period' => 'Idade máxima dos artigos a serem mantidos',
		'keep_unreads' => 'Nunca apagar os não lidos',
		'maintenance' => 'Manutenção',
		'optimize' => 'Otimizar banco de dados',
		'optimize_help' => 'Faça ocasionalmente para reduzir o tamanho do banco de dados',
		'policy' => 'Política de limpeza',
		'policy_warning' => 'Se nenhuma política de limpeza for selecionada, todos os artigos serão mantidos.',
		'purge_now' => 'Limpar agora',
		'title' => 'Arquivar',
		'ttl' => 'Não atualize automaticamente mais frequente que',
	),
	'display' => array(
		'_' => 'Exibição',
		'darkMode' => array(
			'_' => 'Modo noturno automático',
			'auto' => 'Automático',
			'help' => 'For compatible themes only',	// TODO
			'no' => 'Não',
		),
		'icon' => array(
			'bottom_line' => 'Linha inferior',
			'display_authors' => 'Autores',
			'entry' => 'Ícones de artigos',
			'publication_date' => 'Data da publicação',
			'related_tags' => 'Tags relacionadas',
			'sharing' => 'Compartilhar',
			'summary' => 'Sumário',
			'top_line' => 'Linha superior',
		),
		'language' => 'Idioma',
		'notif_html5' => array(
			'seconds' => 'segundos (0 significa sem timeout)',
			'timeout' => 'Notificação em HTML5 de timeout',
		),
		'show_nav_buttons' => 'Mostrar botões de navegação',
		'theme' => array(
			'_' => 'Tema',
			'deprecated' => array(
				'_' => 'Depreciado',
				'description' => 'Este tema não é mais suportado e não estará mais disponível em <a href="https://freshrss.github.io/FreshRSS/en/users/05_Configuration.html#theme" target="_blank">uma versão futura do FreshRSS</a>',
			),
		),
		'theme_not_available' => 'O tema “%s” não está mais disponível. Por favor escolha outro tema.',
		'thumbnail' => array(
			'label' => 'Miniatura',
			'landscape' => 'Modo paisagem',
			'none' => 'Nenhum',
			'portrait' => 'Modo retrato',
			'square' => 'Modo quadrado',
		),
		'timezone' => 'Fuso horário',
		'title' => 'Exibição',
		'website' => array(
			'full' => 'Ícone e nome',
			'icon' => 'Apenas ícone',
			'label' => 'Site',
			'name' => 'Apenas nome',
			'none' => 'Nenhum',
		),
		'width' => array(
			'content' => 'Largura do conteúdo',
			'large' => 'Largo',
			'medium' => 'Médio',
			'no_limit' => 'Sem limite',
			'thin' => 'Fino',
		),
	),
	'logs' => array(
		'loglist' => array(
			'level' => 'Nivel de Registro',
			'message' => 'Mensagem de Registro',
			'timestamp' => 'Data e Hora',
		),
		'pagination' => array(
			'first' => 'Primeiro',
			'last' => 'Último',
			'next' => 'Próximo',
			'previous' => 'Anterior',
		),
	),
	'mark_read_button' => array(
		'_' => '“marcar todos como lido” button',	// DIRTY
		'big' => 'Big',	// TODO
		'none' => 'None',	// TODO
		'small' => 'Small',	// TODO
	),
	'privacy' => array(
		'_' => 'Privacy',	// TODO
		'retrieve_extension_list' => 'Retrieve extension list',	// TODO
	),
	'profile' => array(
		'_' => 'Gerenciamento de perfil',
		'api' => array(
			'_' => 'Administração da API',
			'api_not_set' => 'API password not set',	// TODO
			'api_set' => 'API password set',	// TODO
			'check_link' => 'Check API status via: <kbd><a href="../api/" target="_blank">%s</a></kbd>',	// TODO
			'disabled' => 'The API access is disabled.',	// TODO
			'documentation_link' => 'See the <a href="https://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target="_blank">documentation and list of known apps</a>',	// TODO
			'help' => 'See <a href="http://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target=_blank>documentation</a>',	// TODO
		),
		'delete' => array(
			'_' => 'Remover conta',
			'warn' => 'Sua conta e todos os dados relacionados serão removidos.',
		),
		'email' => 'Endereço de e-mail',
		'password_api' => 'Senha da API<br /><small>(p.s., para aplicativos móveis)</small>',
		'password_form' => 'Senha<br /><small>(para o método de formulário web)</small>',
		'password_format' => 'Ao menos 7 caracteres',
		'title' => 'Perfil',
	),
	'query' => array(
		'_' => 'Consultas do usuário',
		'deprecated' => 'Esta não é mais válida. A categoria ou feed relacionado foi deletado.',
		'description' => 'Description',	// TODO
		'filter' => array(
			'_' => 'Filtro aplicado:',
			'categories' => 'Exibir por categoria',
			'feeds' => 'Exibir por feed',
			'order' => 'Ordenar por data',
			'search' => 'Expressão',
			'shareOpml' => 'Habilita o compartilhamento por OPML de categorias e feeds correspondentes',
			'shareRss' => 'Habilita o compartilhamento por HTML &amp; RSS',
			'state' => 'Estado',
			'tags' => 'Exibir por tag',
			'type' => 'Tipo',
		),
		'get_A' => 'Show all feeds, also those shown in their category',	// TODO
		'get_Z' => 'Show all feeds, also archived ones',	// TODO
		'get_all' => 'Mostrar todos os artigos',
		'get_all_labels' => 'Exibir artigos com qualquer rótulo',
		'get_category' => 'Visualizar “%s” categoria',
		'get_favorite' => 'Visualizar artigos favoritos',
		'get_feed' => 'Visualizar “%s” feed',
		'get_important' => 'Exibir artigos de feeds importantes',
		'get_label' => 'Exibir artigos com rótulo “%s”',
		'help' => 'Veja a <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentação para consultas de usuários e recompartilhamentos por HTML / RSS / OPML</a>.',
		'image_url' => 'Image URL',	// TODO
		'name' => 'Nome',
		'no_filter' => 'Sem filtro',
		'no_queries' => array(
			'_' => 'No user queries are saved yet.',	// TODO
			'help' => 'See <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentation</a>',	// TODO
		),
		'number' => 'Consulta n°%d',
		'order_asc' => 'Exibir artigos mais antigos primeiro',
		'order_desc' => 'Exibir artigos mais novos primeiro',
		'search' => 'Busca por “%s”',
		'share' => array(
			'_' => 'Compartilhar esta consulta por link',
			'disabled' => array(
				'_' => 'disabled',	// TODO
				'title' => 'Sharing',	// TODO
			),
			'greader' => 'Shareable link to the GReader JSON',	// TODO
			'help' => 'Forneça este link se quiser compartilhar esta consulta com alguém',
			'html' => 'Link compartilhável para a página HTML',
			'opml' => 'Link compartilhável para a lista de feeds OPML',
			'rss' => 'Link compartilhável para o feed RSS',
		),
		'state_0' => 'Exibir todos os artigos',
		'state_1' => 'Exibir artigos lidos',
		'state_2' => 'Exibir artigos não lidos',
		'state_3' => 'Exibir todos os artigos',
		'state_4' => 'Exibir artigos favoritos',
		'state_5' => 'Exibir artigos favoritos lidos',
		'state_6' => 'Exibir artigos favoritos não lidos',
		'state_7' => 'Exibir artigos favoritos',
		'state_8' => 'Exibir artigos que não são favoritos',
		'state_9' => 'Exibir artigos que não são favoritos lidos',
		'state_10' => 'Exibir artigos que não são favoritos não lidos',
		'state_11' => 'Exibir artigos que não são favoritos',
		'state_12' => 'Exibir todos os artigos',
		'state_13' => 'Exibir artigos lidos',
		'state_14' => 'Exibir artigos não lidos',
		'state_15' => 'Exibir todos os artigos',
		'title' => 'Consultas de usuários',
	),
	'reading' => array(
		'_' => 'Leitura',
		'after_onread' => 'Depois de “marcar todos como lido”,',
		'always_show_favorites' => 'Mostrar todos os artivos nos favoritos por padrão',
		'apply_to_individual_feed' => 'Applies to feeds individually',	// TODO
		'article' => array(
			'authors_date' => array(
				'_' => 'Autores e Data',
				'both' => 'No cabeçalho e rodapé',
				'footer' => 'No rodapé',
				'header' => 'No cabeçalho',
				'none' => 'Nenhum',
			),
			'feed_name' => array(
				'above_title' => 'Acima do título/etiqueta',
				'none' => 'Nenhum',
				'with_authors' => 'Com autores e data',
			),
			'feed_title' => 'Título do Feed',
			'icons' => array(
				'_' => 'Article icons position<br /><small>(Reading view only)</small>',	// TODO
				'above_title' => 'Above title',	// TODO
				'with_authors' => 'In authors and date row',	// TODO
			),
			'tags' => array(
				'_' => 'Tag',
				'both' => 'No cabeçalho e rodapé',
				'footer' => 'No rodapé',
				'header' => 'No cabeçalho',
				'none' => 'Nenhum',
			),
			'tags_max' => array(
				'_' => 'Número máximo de tags exibidas',
				'help' => '0 significa: mostrar todas as tags e não recolhê-las',
			),
		),
		'articles_per_page' => 'Número de artigos por página',
		'auto_load_more' => 'Carregar mais artigos no final da página',
		'auto_remove_article' => 'Esconder artigos depois de lidos',
		'confirm_enabled' => 'Exibir uma caixa de diálogo de confirmação quando acionar “marcar todos como lido”',
		'display_articles_unfolded' => 'Mostrar artigos abertos por padrão',
		'display_categories_unfolded' => 'Categorias abertas',
		'headline' => array(
			'articles' => 'Artigos: Abrir/Fechar',
			'articles_header_footer' => 'Artigos: cabeçalho/rodapé',
			'categories' => 'Navegação à esquerda: Categoria',
			'mark_as_read' => 'Marcar artigo como lido',
			'misc' => 'Diversos',
			'view' => 'Visualização',
		),
		'hide_read_feeds' => 'Esconder categorias e feeds com nenhum artigo não lido (não funciona com a configuração “Mostrar todos os artigos”)',
		'img_with_lazyload' => 'Utilizar o modo <em>lazy load</em> para carregar as imagens',
		'jump_next' => 'Vá para o próximo irmão não lido',
		'mark_updated_article_unread' => 'Marcar artigos atualizados como não lidos',
		'number_divided_when_reader' => 'Dividido por 2 no modo de leitura .',
		'read' => array(
			'article_open_on_website' => 'quando o artigo é aberto no site original',
			'article_viewed' => 'Quando o artigo é visualizado',
			'focus' => 'quando focado (exceto por feeds importantes)',
			'keep_max_n_unread' => 'Número máximo de artigos para manter como não lido',
			'scroll' => 'enquanto faz a rolagem (exceto por feeds importantes)',
			'upon_gone' => 'Quando não estiver mais no feed de notícias principais',
			'upon_reception' => 'ao receber um artigo',
			'when' => 'Marcar artigo como lido…',
			'when_same_title_in_category' => 'if an identical title already exists in the top <i>n</i> newest articles of the category',	// TODO
			'when_same_title_in_feed' => 'Se um título idêntico já existir nos últimos <i>n</i> artigos mais novos (of the feed)',	// DIRTY
		),
		'show' => array(
			'_' => 'Artigos para exibir',
			'active_category' => 'Categoria ativa',
			'adaptive' => 'Show unreads if any, all articles otherwise',	// TODO
			'all_articles' => 'Exibir todos os artigos',
			'all_categories' => 'Exibir todas as categorias',
			'no_category' => 'Nenhuma categoria',
			'remember_categories' => 'lembrar de abrir as categorias',
			'unread' => 'Exibir apenas não lido',
			'unread_or_favorite' => 'Show unreads and favourites',	// TODO
		),
		'show_fav_unread_help' => 'Aplicar também nas tags',
		'sides_close_article' => 'Clicando fora da área do texto do artigo fecha o mesmo',
		'sort' => array(
			'_' => 'Ordem de visualização',
			'newer_first' => 'Novos primeiro',
			'older_first' => 'Antigos primeiro',
		),
		'star' => array(
			'when' => 'Mark an article as favourite…',	// TODO
		),
		'sticky_post' => 'Coloque o artigo no topo quando aberto',
		'title' => 'Lendo',
		'view' => array(
			'default' => 'Visualização padrão',
			'global' => 'Visualização global',
			'normal' => 'Visualização normal',
			'reader' => 'Visualização de leitura',
		),
	),
	'sharing' => array(
		'_' => 'Compartilhando',
		'add' => 'Adicionar um método de compartilhamento',
		'bluesky' => 'Bluesky',	// TODO
		'deprecated' => 'Este serviço está obceloeto e será removido do FreshRSS <a href="https://freshrss.github.io/FreshRSS/en/users/08_sharing_services.html" title="Abra este documento para mais informações" target="_blank">em versões futuras</a>.',
		'diaspora' => 'Diaspora*',	// IGNORE
		'email' => 'E-mail',
		'facebook' => 'Facebook',	// IGNORE
		'more_information' => 'Mais informação',
		'print' => 'Imprimir',
		'raindrop' => 'Raindrop.io',	// IGNORE
		'remove' => 'Remover método de compartilhamento',
		'shaarli' => 'Shaarli',	// IGNORE
		'share_name' => 'Nome de visualização para compartilhar',
		'share_url' => 'URL utilizada para compartilhar',
		'title' => 'Compartilhando',
		'twitter' => 'Twitter',	// IGNORE
		'wallabag' => 'wallabag',	// IGNORE
	),
	'shortcut' => array(
		'_' => 'Atalhos',
		'article_action' => 'Ações no artigo',
		'auto_share' => 'Compartilhar',
		'auto_share_help' => 'Se há apenas um modo de compartilhamento, ele é usado. Caso contrário, serão acessíveis pelo seu número.',
		'close_dropdown' => 'Fechar menus',
		'collapse_article' => 'Fechar',
		'first_article' => 'Ir para o primeiro artigo',
		'focus_search' => 'Acessar a caixa de busca',
		'global_view' => 'Mudar para visualização global',
		'help' => 'Mostrar documentação',
		'javascript' => 'JavaScript deve ser habilitado para utilizar atalhos',
		'last_article' => 'Ir para o último artigo',
		'load_more' => 'Carregar mais artigos',
		'mark_favorite' => 'Marcar como favorito',
		'mark_read' => 'Marcar como lido',
		'navigation' => 'Navegação',
		'navigation_help' => 'Com o modificador <kbd>⇧ Shift</kbd>, atalhos de navegação aplicam aos feeds.<br/>Com o <kbd>Alt ⎇</kbd> modificador, atalhos de navegação aplicam as categorias.',
		'navigation_no_mod_help' => 'Os seguintes atalhos de navegação não suportam modificadores.',
		'next_article' => 'Pule para o próximo artigo',
		'next_unread_article' => 'Abrir o próximo artigo não lido',
		'non_standard' => 'Algumas teclas (<kbd>%s</kbd>) podem não funcionar como atalhos.',
		'normal_view' => 'Mudar para a visualização normal',
		'other_action' => 'Outras ações',
		'previous_article' => 'Pule para o artigo anterior',
		'reading_view' => 'Mudar para o modo de leitura',
		'rss_view' => 'Abrir como feed RSS ',
		'see_on_website' => 'Visualize o site original',
		'shift_for_all_read' => '+ <kbd>Alt ⎇</kbd> para marcar artigos anteriores como lido<br />+ <kbd>⇧ Shift</kbd> para marcar todos os artigos como lido',
		'skip_next_article' => 'Focar o próximo sem abri-lo',
		'skip_previous_article' => 'Focar o anterior sem abri-lo',
		'title' => 'Atalhos',
		'toggle_media' => 'Reproduzir/pausar mídia',
		'user_filter' => 'Acesse filtros de usuário',
		'user_filter_help' => 'Se há apenas um filtro, ele é utilizado. Caso contrário, os filtros serão acessíveis pelos seus números.',
		'views' => 'Visualizações',
	),
	'user' => array(
		'articles_and_size' => '%s artigos (%s)',
		'current' => 'Usuário atual',
		'is_admin' => 'é administrador',
		'users' => 'Usuários',
	),
);

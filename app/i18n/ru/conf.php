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
		'_' => 'Архивирование',
		'exception' => 'Исключения при очистке',
		'help' => 'В индивидуальных настройках лент есть больше опций',
		'keep_favourites' => 'Никогда не удалять избранное',
		'keep_labels' => 'Никогда не удалять метки',
		'keep_max' => 'Максимальное количество статей',	// DIRTY
		'keep_min_by_feed' => 'Минимальное количество статей в ленте',
		'keep_period' => 'Максимальный возраст статей',
		'keep_unreads' => 'Никогда не удалять непрочитанные статьи',
		'maintenance' => 'Обслуживание',
		'optimize' => 'Оптимизировать базу данных',
		'optimize_help' => 'Выполняйте время от времени, чтобы уменьшить размер базы данных',
		'policy' => 'Политика очистки',
		'policy_warning' => 'Если ни одна политика очистки не выбрана, все статьи будут оставлены.',
		'purge_now' => 'Запустить очистку сейчас',
		'title' => 'Архивирование',
		'ttl' => 'Не обновлять автоматически чаще, чем каждые',
	),
	'display' => array(
		'_' => 'Отображение',
		'darkMode' => array(
			'_' => 'Автоматический темный режим',
			'auto' => 'Авто',
			'help' => 'For compatible themes only',	// TODO
			'no' => 'Нет',
		),
		'icon' => array(
			'bottom_line' => 'Нижняя линия',
			'display_authors' => 'Авторы',
			'entry' => 'Иконки статей',
			'publication_date' => 'Дата публикации',
			'related_tags' => 'Связанные метки',
			'sharing' => 'Обмен',
			'summary' => 'Сводка',
			'top_line' => 'Верхняя линия',
		),
		'language' => 'Язык',
		'notif_html5' => array(
			'seconds' => 'секунд (0 - нет таймаута)',
			'timeout' => 'Таймаут уведомлений HTML5',
		),
		'show_nav_buttons' => 'Показать кнопки навигации',
		'theme' => array(
			'_' => 'Тема',
			'deprecated' => array(
				'_' => 'Deprecated',	// IGNORE
				'description' => 'Эта тема устарела и будет недоступна в FreshRSS <a href="https://freshrss.github.io/FreshRSS/en/users/05_Configuration.html#theme" target="_blank">в будущем релизе</a>',
			),
		),
		'theme_not_available' => 'Тема “%s” больше не доступна. Пожалуйста выберите другю тему.',
		'thumbnail' => array(
			'label' => 'Эскиз',
			'landscape' => 'Горизонтальный',
			'none' => 'Нет',
			'portrait' => 'Вертикальный',
			'square' => 'Квадратный',
		),
		'timezone' => 'Часовой пояс',
		'title' => 'Отображение',
		'website' => array(
			'full' => 'Значок и название',
			'icon' => 'Только значок',
			'label' => 'Вебсайт',
			'name' => 'Только название',
			'none' => 'Ничего',
		),
		'width' => array(
			'content' => 'Ширина содержимого',
			'large' => 'Широкое',
			'medium' => 'Среднее',
			'no_limit' => 'Во всю ширину',
			'thin' => 'Узкое',
		),
	),
	'logs' => array(
		'loglist' => array(
			'level' => 'Уровень журнала',
			'message' => 'Сообщение журнала',
			'timestamp' => 'Отметка времени',
		),
		'pagination' => array(
			'first' => 'Первая',
			'last' => 'Последняя',
			'next' => 'Следующая',
			'previous' => 'Предыдущая',
		),
	),
	'mark_read_button' => array(
		'_' => '«отметить всё прочитанным» button',	// DIRTY
		'big' => 'Big',	// TODO
		'none' => 'None',	// TODO
		'small' => 'Small',	// TODO
	),
	'privacy' => array(
		'_' => 'Privacy',	// TODO
		'retrieve_extension_list' => 'Retrieve extension list',	// TODO
	),
	'profile' => array(
		'_' => 'Настройки профиля',
		'api' => array(
			'_' => 'Настройки API',
			'api_not_set' => 'API password not set',	// TODO
			'api_set' => 'API password set',	// TODO
			'check_link' => 'Check API status via: <kbd><a href="../api/" target="_blank">%s</a></kbd>',	// TODO
			'disabled' => 'The API access is disabled.',	// TODO
			'documentation_link' => 'See the <a href="https://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target="_blank">documentation and list of known apps</a>',	// TODO
			'help' => 'See <a href="http://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target=_blank>documentation</a>',	// TODO
		),
		'delete' => array(
			'_' => 'Удаление аккаунта',
			'warn' => 'Ваш аккаунт и вся связанная с ним информация будут удалены.',
		),
		'email' => 'Адрес электронной почты',
		'password_api' => 'Пароль API<br /><small>(например, для мобильных приложений)</small>',
		'password_form' => 'Пароль<br /><small>(для входа через веб-форму)</small>',
		'password_format' => 'Не менее 7 символов',
		'title' => 'Профиль',
	),
	'query' => array(
		'_' => 'Пользовательские запросы',
		'deprecated' => 'Этот запрос больше не действителен. Связанная категория или лента была удалена.',
		'description' => 'Description',	// TODO
		'filter' => array(
			'_' => 'Применённые фильтры:',
			'categories' => 'Отображение по категории',
			'feeds' => 'Отображение по ленте',
			'order' => 'Сортировать по дате',
			'search' => 'Выражение',
			'shareOpml' => 'Включить общий доступ с помощью OPML к соответствующим категориям и лентам',
			'shareRss' => 'Включить общий доступ с помощью HTML &amp; RSS',
			'state' => 'Состояние',
			'tags' => 'Отображение по метке',
			'type' => 'Тип',
		),
		'get_A' => 'Show all feeds, also those shown in their category',	// TODO
		'get_Z' => 'Show all feeds, also archived ones',	// TODO
		'get_all' => 'Показать все статьи',
		'get_all_labels' => 'Показать все статьи с любыми метками',
		'get_category' => 'Показать категорию “%s”',
		'get_favorite' => 'Показать избранные статьи',
		'get_feed' => 'Показать ленту “%s”',
		'get_important' => 'Отображать статьи из важных лент',
		'get_label' => 'Показать статьи с “%s” меткой',
		'help' => 'Смотрите <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">документацию по пользовательским запросам и повторному обмену данными с помощью HTML / RSS / OPML</a>.',
		'image_url' => 'Image URL',	// TODO
		'name' => 'Название',
		'no_filter' => 'Нет фильтров',
		'no_queries' => array(
			'_' => 'No user queries are saved yet.',	// TODO
			'help' => 'See <a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">documentation</a>',	// TODO
		),
		'number' => 'Запрос №%d',
		'order_asc' => 'Показывать сначала старые статьи',
		'order_desc' => 'Показывать сначала новые статьи',
		'search' => 'Искать “%s”',
		'share' => array(
			'_' => 'Поделиться запросом по ссылке',
			'disabled' => array(
				'_' => 'disabled',	// TODO
				'title' => 'Sharing',	// TODO
			),
			'greader' => 'Shareable link to the GReader JSON',	// TODO
			'help' => 'Дайте эту ссылку, если хотите поделиться этим запросом с кем-либо',
			'html' => 'Ссылка доступа на HTML-страницу',
			'opml' => 'Ссылка доступа на список лент в формате OPML',
			'rss' => 'Ссылка доступа на RSS-ленту',
		),
		'state_0' => 'Показать все статьи',
		'state_1' => 'Показать прочитанные статьи',
		'state_2' => 'Показать непрочитанные статьи',
		'state_3' => 'Показать все статьи',
		'state_4' => 'Показать избранные статьи',
		'state_5' => 'Показать прочитанные избранные статьи',
		'state_6' => 'Показать непрочитанные избранные статьи',
		'state_7' => 'Показать избранные статьи',
		'state_8' => 'Показать неизбранные статьи',
		'state_9' => 'Показать прочитанные неизбранные статьи',
		'state_10' => 'Показать непрочитанные неизбранные статьи',
		'state_11' => 'Показать неизбранные статьи',
		'state_12' => 'Показать все статьи',
		'state_13' => 'Показать прочитанные статьи',
		'state_14' => 'Показать непрочитанные статьи',
		'state_15' => 'Показать все статьи',
		'title' => 'Пользовательские запросы',
	),
	'reading' => array(
		'_' => 'Чтение',
		'after_onread' => 'После «отметить всё прочитанным»',
		'always_show_favorites' => 'Показывать все статьи в избранном по умолчанию',
		'apply_to_individual_feed' => 'Applies to feeds individually',	// TODO
		'article' => array(
			'authors_date' => array(
				'_' => 'Авторы и дата',
				'both' => 'В верхнем и нижнем колонтитулах',
				'footer' => 'В нижнем колонтитуле',
				'header' => 'В верхнем колонтитуле',
				'none' => 'Нигде',
			),
			'feed_name' => array(
				'above_title' => 'Над титулом и метками',
				'none' => 'Нигде',
				'with_authors' => 'В строке с автором и датой',
			),
			'feed_title' => 'Титул ленты',
			'icons' => array(
				'_' => 'Article icons position<br /><small>(Reading view only)</small>',	// TODO
				'above_title' => 'Above title',	// TODO
				'with_authors' => 'In authors and date row',	// TODO
			),
			'tags' => array(
				'_' => 'Метки',
				'both' => 'В верхнем и нижнем колонтитулах',
				'footer' => 'В нижнем колонтитуле',
				'header' => 'В верхнем колонтитуле',
				'none' => 'Нигде',
			),
			'tags_max' => array(
				'_' => 'Максимальное количество отображающих меток',
				'help' => '0 означает: показать все метки и не сжимать их',
			),
		),
		'articles_per_page' => 'Количество статей на странице',
		'auto_load_more' => 'Загружать больше статей при достижении низа страницы',
		'auto_remove_article' => 'Скрывать статьи по прочтении',
		'confirm_enabled' => 'Показывать диалог подтверждения при выпыполнении действия «отметить всё прочитанным»',
		'display_articles_unfolded' => 'Показывать статьи развёрнутыми по умолчанию',
		'display_categories_unfolded' => 'Какие категории развёртывать',
		'headline' => array(
			'articles' => 'Статьи: открыть/закрыть',
			'articles_header_footer' => 'Статьи: верхний/нижний колонтитул',
			'categories' => 'Левая панель: категории',
			'mark_as_read' => 'Пометить статью прочитанной',
			'misc' => 'Разное',
			'view' => 'Вид',
		),
		'hide_read_feeds' => 'Скрывать категории и ленты без непрочитанных статей (не работает с «Показывать все статьи»)',
		'img_with_lazyload' => 'Использовать режим «ленивой загрузки» для загрузки картинок',
		'jump_next' => 'перейти к следующей',
		'mark_updated_article_unread' => 'Отмечать обновлённые статьи непрочитанными',
		'number_divided_when_reader' => 'Делится на 2 в виде для чтения.',
		'read' => array(
			'article_open_on_website' => 'когда статья открывается на её сайте',
			'article_viewed' => 'когда статья просматривается',
			'focus' => 'когда статья выбрана (за исключением важных лент)',
			'keep_max_n_unread' => 'Максимальное количество непрочитанных статей',
			'scroll' => 'во время прокрутки (за исключением важных лент)',
			'upon_gone' => 'когда это больше не в новостной ленте',
			'upon_reception' => 'по получении статьи',
			'when' => 'Отмечать статью прочитанной…',
			'when_same_title_in_category' => 'if an identical title already exists in the top <i>n</i> newest articles of the category',	// TODO
			'when_same_title_in_feed' => 'если идентичный заголовок уже существует в верхних <i>n</i> новейших статьях (of the feed)',	// DIRTY
		),
		'show' => array(
			'_' => 'Какие статьи отображать',
			'active_category' => 'Активную категорию',
			'adaptive' => 'Show unreads if any, all articles otherwise',	// TODO
			'all_articles' => 'Показывать все статьи',
			'all_categories' => 'Все категории',
			'no_category' => 'Никакие категории',
			'remember_categories' => 'Запоминать открытые категории',
			'unread' => 'Только непрочитанные',
			'unread_or_favorite' => 'Show unreads and favourites',	// TODO
		),
		'show_fav_unread_help' => 'Также относится к меткам',
		'sides_close_article' => 'Нажатия мышью за пределами текста статьи закрывают статью',
		'sort' => array(
			'_' => 'Порядок сортировки',
			'newer_first' => 'Сначала новые',
			'older_first' => 'Сначала старые',
		),
		'star' => array(
			'when' => 'Mark an article as favourite…',	// TODO
		),
		'sticky_post' => 'Прикрепить статью к верху при открытии',
		'title' => 'Чтение',
		'view' => array(
			'default' => 'Вид по умолчанию',
			'global' => 'Глобальный вид',
			'normal' => 'Обычный вид',
			'reader' => 'Вид для чтения',
		),
	),
	'sharing' => array(
		'_' => 'Обмен',
		'add' => 'Добавить способ обмена',
		'bluesky' => 'Bluesky',	// TODO
		'deprecated' => 'Этот сервис устарел и будет удалён из FreshRSS в <a href="https://freshrss.github.io/FreshRSS/en/users/08_sharing_services.html" title="Открыть документацию для большей информации" target="_blank">будущем релизе</a>.',
		'diaspora' => 'Diaspora*',	// IGNORE
		'email' => 'Электронная почта',
		'facebook' => 'Facebook',	// IGNORE
		'more_information' => 'Больше информации',
		'print' => 'Распечатать',	// IGNORE
		'raindrop' => 'Raindrop.io',	// IGNORE
		'remove' => 'Удалить способ обмена',
		'shaarli' => 'Shaarli',	// IGNORE
		'share_name' => 'Отображаемое имя',
		'share_url' => 'Используемый URL',
		'title' => 'Обмен',
		'twitter' => 'Twitter',	// IGNORE
		'wallabag' => 'wallabag',	// IGNORE
	),
	'shortcut' => array(
		'_' => 'Горячие клавиши',
		'article_action' => 'Действия со статьями',
		'auto_share' => 'Обмен',
		'auto_share_help' => 'Если способ единственный, он будет вызван. Иначе способы доступны по их номеру.',
		'close_dropdown' => 'Закрыть меню',
		'collapse_article' => 'Схлопнуть',
		'first_article' => 'Открыть первую статью',
		'focus_search' => 'К строке поиска',
		'global_view' => 'Переключиться на глобальный вид',
		'help' => 'Показать документацию',
		'javascript' => 'JavaScript должен быть включён для использования горячих клавиш',
		'last_article' => 'Открыть последнюю статью',
		'load_more' => 'Загрузить больше статей',
		'mark_favorite' => 'Отметить избранной',
		'mark_read' => 'Отметить прочитанной',
		'navigation' => 'Навигация',
		'navigation_help' => 'С модификатором <kbd>⇧ Shift</kbd> навигационные горячие клавиши применяются к лентам.<br/>С модификатором <kbd>Alt ⎇</kbd> навигационные горячие клавиши применяются к категориям.',
		'navigation_no_mod_help' => 'Следующие навигационные горячие клавиши не поддерживают модификаторы.',
		'next_article' => 'Открыть следующую статью',
		'next_unread_article' => 'Открыть следующую непрочитанную статью',
		'non_standard' => 'Некоторые клавиши (<kbd>%s</kbd>) не могут быть использованы как горячие клавиши.',
		'normal_view' => 'Переключиться на обычный вид',
		'other_action' => 'Другие действия',
		'previous_article' => 'Открыть предыдущую статью',
		'reading_view' => 'Переключиться на вид для чтения',
		'rss_view' => 'Открыть как RSS-ленту',
		'see_on_website' => 'Посмотреть на сайте',
		'shift_for_all_read' => '+ <kbd>Alt ⎇</kbd>, чтобы отметить предыдущие статьи прочитанными<br />+ <kbd>⇧ Shift</kbd>, чтобы отметить все статьи прочитанными',
		'skip_next_article' => 'Перейти к следующей, не раскрывая',
		'skip_previous_article' => 'Перейти к предыдущей, не раскрывая',
		'title' => 'Горячие клавиши',
		'toggle_media' => 'Играть/приостановить медиаконтент',
		'user_filter' => 'К пользовательским запросам',
		'user_filter_help' => 'Если запрос единственный, он будет вызван. Иначе запросы доступны по их номеру.',
		'views' => 'Виды',
	),
	'user' => array(
		'articles_and_size' => '%s статей (%s)',
		'current' => 'Текущий пользователь',
		'is_admin' => 'является администратором',
		'users' => 'Пользователи',
	),
);

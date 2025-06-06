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
		'_' => 'Arşivleme',
		'exception' => 'Temizleme istisnası',
		'help' => 'Daha fazla seçenek, bireysel besleme ayarlarında mevcuttur',
		'keep_favourites' => 'Favorileri asla silme',
		'keep_labels' => 'Etiketleri asla silme',
		'keep_max' => 'Besleme başına saklanacak maksimum makale sayısı',
		'keep_min_by_feed' => 'Besleme başına saklanacak minimum makale sayısı',
		'keep_period' => 'Makalelerin saklanacağı maksimum süre',
		'keep_unreads' => 'Okunmamış makaleleri asla silme',
		'maintenance' => 'Bakım',
		'optimize' => 'Veritabanını optimize et',
		'optimize_help' => 'Veritabanı boyutunu küçültmek için ara sıra çalıştırın',
		'policy' => 'Temizleme politikası',
		'policy_warning' => 'Eğer bir temizleme politikası seçilmezse, her makale saklanacaktır.',
		'purge_now' => 'Şimdi temizle',
		'title' => 'Arşivleme',
		'ttl' => 'Otomatik yenileme sıklığını şundan fazla yapma',
	),
	'display' => array(
		'_' => 'Görüntüleme',
		'darkMode' => array(
			'_' => 'Otomatik karanlık mod',
			'auto' => 'Otomatik',
			'help' => 'Yalnızca uyumlu temalar için',
			'no' => 'Hayır',
		),
		'icon' => array(
			'bottom_line' => 'Alt satır',
			'display_authors' => 'Yazarlar',
			'entry' => 'Makale simgeleri',
			'publication_date' => 'Yayın tarihi',
			'related_tags' => 'Makale etiketleri',
			'sharing' => 'Paylaşım',
			'summary' => 'Özet',
			'top_line' => 'Üst satır',
		),
		'language' => 'Dil',
		'notif_html5' => array(
			'seconds' => 'saniye (0, zaman aşımı yok anlamına gelir)',
			'timeout' => 'HTML5 bildirim zaman aşımı',
		),
		'show_nav_buttons' => 'Gezinme düğmelerini göster',
		'theme' => array(
			'_' => 'Tema',
			'deprecated' => array(
				'_' => 'Kullanımdan kaldırıldı',
				'description' => 'Bu tema artık desteklenmiyor ve FreshRSS’nin <a href="https://freshrss.github.io/FreshRSS/en/users/05_Configuration.html#theme" target="_blank">gelecek bir sürümünde</a> kullanılamayacak.',
			),
		),
		'theme_not_available' => '“%s” teması artık mevcut değil. Lütfen başka bir tema seçin.',
		'thumbnail' => array(
			'label' => 'Küçük resim',
			'landscape' => 'Yatay',
			'none' => 'Yok',
			'portrait' => 'Dikey',
			'square' => 'Kare',
		),
		'timezone' => 'Zaman dilimi',
		'title' => 'Görüntüleme',
		'website' => array(
			'full' => 'Simge ve isim',
			'icon' => 'Yalnızca simge',
			'label' => 'Web sitesi',
			'name' => 'Yalnızca isim',
			'none' => 'Yok',
		),
		'width' => array(
			'content' => 'İçerik genişliği',
			'large' => 'Geniş',
			'medium' => 'Orta',
			'no_limit' => 'Tam Genişlik',
			'thin' => 'Dar',
		),
	),
	'logs' => array(
		'loglist' => array(
			'level' => 'Günlük Seviyesi',
			'message' => 'Günlük Mesajı',
			'timestamp' => 'Zaman Damgası',
		),
		'pagination' => array(
			'first' => 'İlk',
			'last' => 'Son',
			'next' => 'Sonraki',
			'previous' => 'Önceki',
		),
	),
	'mark_read_button' => array(
		'_' => '“Tümünü okundu olarak işaretle” düğmesi',
		'big' => 'Büyük',
		'none' => 'Yok',
		'small' => 'Küçük',
	),
	'privacy' => array(
		'_' => 'Gizlilik',
		'retrieve_extension_list' => 'Eklenti listesini al',
	),
	'profile' => array(
		'_' => 'Profil yönetimi',
		'api' => array(
			'_' => 'API üzerinden harici erişim',
			'api_not_set' => 'API parolası ayarlanmadı',
			'api_set' => 'API parolası ayarlandı',
			'check_link' => 'API durumunu şu adresten kontrol et: <kbd><a href="../api/" target="_blank">%s</a></kbd>',
			'disabled' => 'API erişimi devre dışı.',
			'documentation_link' => '<a href="https://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target="_blank">Belgeleri ve bilinen uygulamaların listesini</a> gör',
			'help' => '<a href="http://freshrss.github.io/FreshRSS/en/users/06_Mobile_access.html#access-via-mobile-app" target="_blank">Belgeleri</a> gör',
		),
		'delete' => array(
			'_' => 'Hesap silme',
			'warn' => 'Hesabınız ve ilgili tüm veriler silinecek.',
		),
		'email' => 'E-posta adresi',
		'password_api' => 'API parolası<br /><small>(örneğin, mobil uygulamalar için)</small>',
		'password_form' => 'Parola<br /><small>(Web formuyla giriş yöntemi için)</small>',
		'password_format' => 'En az 7 karakter',
		'title' => 'Profil',
	),
	'query' => array(
		'_' => 'Kullanıcı sorguları',
		'deprecated' => 'Bu sorgu artık geçerli değil. İlgili kategori veya besleme silinmiş.',
		'description' => 'Açıklama',
		'filter' => array(
			'_' => 'Uygulanan filtre:',
			'categories' => 'Kategoriye göre göster',
			'feeds' => 'Beslemeye göre göster',
			'order' => 'Tarihe göre sırala',
			'search' => 'İfade',
			'shareOpml' => 'İlgili kategori ve beslemelerin OPML ile paylaşımını etkinleştir',
			'shareRss' => 'HTML ve RSS ile paylaşımı etkinleştir',
			'state' => 'Durum',
			'tags' => 'Etikete göre göster',
			'type' => 'Tür',
		),
		'get_A' => 'Kategorilerinde gösterilenler de dahil tüm beslemeleri göster',
		'get_Z' => 'Arşivlenmişler de dahil tüm beslemeleri göster',
		'get_all' => 'Tüm makaleleri göster',
		'get_all_labels' => 'Herhangi bir etikete sahip makaleleri göster',
		'get_category' => '“%s” kategorisini göster',
		'get_favorite' => 'Favori makaleleri göster',
		'get_feed' => '“%s” beslemesini göster',
		'get_important' => 'Önemli beslemelerden makaleleri göster',
		'get_label' => '“%s” etiketine sahip makaleleri göster',
		'help' => '<a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">Kullanıcı sorguları ve HTML / RSS / OPML ile yeniden paylaşım için belgeleri</a> gör.',
		'image_url' => 'Görsel URL’si',
		'name' => 'İsim',
		'no_filter' => 'Filtre yok',
		'no_queries' => array(
			'_' => 'Henüz kaydedilmiş kullanıcı sorgusu yok.',
			'help' => '<a href="https://freshrss.github.io/FreshRSS/en/users/user_queries.html" target="_blank">Belgeleri</a> gör',
		),
		'number' => 'Sorgu no %d',
		'order_asc' => 'Önce eski makaleleri göster',
		'order_desc' => 'Önce yeni makaleleri göster',
		'search' => '“%s” için ara',
		'share' => array(
			'_' => 'Bu sorguyu bağlantıyla paylaş',
			'disabled' => array(
				'_' => 'devre dışı',
				'title' => 'Paylaşım',
			),
			'greader' => 'GReader JSON’a paylaşılabilir bağlantı',
			'help' => 'Bu sorguyu biriyle paylaşmak istiyorsanız bu bağlantıyı verin',
			'html' => 'HTML sayfasına paylaşılabilir bağlantı',
			'opml' => 'Besleme listesinin OPML’sine paylaşılabilir bağlantı',
			'rss' => 'RSS beslemesine paylaşılabilir bağlantı',
		),
		'state_0' => 'Tüm makaleleri göster',
		'state_1' => 'Okunmuş makaleleri göster',
		'state_2' => 'Okunmamış makaleleri göster',
		'state_3' => 'Tüm makaleleri göster',
		'state_4' => 'Favori makaleleri göster',
		'state_5' => 'Okunmuş favori makaleleri göster',
		'state_6' => 'Okunmamış favori makaleleri göster',
		'state_7' => 'Favori makaleleri göster',
		'state_8' => 'Favori olmayan makaleleri göster',
		'state_9' => 'Okunmuş favori olmayan makaleleri göster',
		'state_10' => 'Okunmamış favori olmayan makaleleri göster',
		'state_11' => 'Favori olmayan makaleleri göster',
		'state_12' => 'Tüm makaleleri göster',
		'state_13' => 'Okunmuş makaleleri göster',
		'state_14' => 'Okunmamış makaleleri göster',
		'state_15' => 'Tüm makaleleri göster',
		'title' => 'Kullanıcı sorguları',
	),
	'reading' => array(
		'_' => 'Okuma',
		'after_onread' => '“Tümünü okundu olarak işaretle”den sonra,',
		'always_show_favorites' => 'Varsayılan olarak favorilerdeki tüm makaleleri göster',
		'apply_to_individual_feed' => 'Beslemelere bireysel olarak uygula',
		'article' => array(
			'authors_date' => array(
				'_' => 'Yazarlar ve tarih',
				'both' => 'Başlıkta ve altbilgide',
				'footer' => 'Altbilgide',
				'header' => 'Başlıkta',
				'none' => 'Yok',
			),
			'feed_name' => array(
				'above_title' => 'Başlık/etiketlerin üstünde',
				'none' => 'Yok',
				'with_authors' => 'Yazarlar ve tarih satırında',
			),
			'feed_title' => 'Besleme başlığı',
			'icons' => array(
				'_' => 'Makale simgelerinin konumu<br /><small>(Yalnızca okuma görünümünde)</small>',
				'above_title' => 'Başlığın üstünde',
				'with_authors' => 'Yazarlar ve tarih satırında',
			),
			'tags' => array(
				'_' => 'Etiketler',
				'both' => 'Başlıkta ve altbilgide',
				'footer' => 'Altbilgide',
				'header' => 'Başlıkta',
				'none' => 'Yok',
			),
			'tags_max' => array(
				'_' => 'Gösterilecek maksimum etiket sayısı',
				'help' => '0: tüm etiketleri göster ve daraltma',
			),
		),
		'articles_per_page' => 'Sayfa başına makale sayısı',
		'auto_load_more' => 'Sayfanın altından daha fazla makale yükle',
		'auto_remove_article' => 'Okuduktan sonra makaleleri gizle',
		'confirm_enabled' => '“Tümünü okundu olarak işaretle” eylemlerinde onay iletişim kutusu göster',
		'display_articles_unfolded' => 'Makaleleri varsayılan olarak açık göster',
		'display_categories_unfolded' => 'Açılacak kategoriler',
		'headline' => array(
			'articles' => 'Makaleler: Aç/Kapat',
			'articles_header_footer' => 'Makaleler: başlık/altbilgi',
			'categories' => 'Sol gezinme: Kategoriler',
			'mark_as_read' => 'Makaleyi okundu olarak işaretle',
			'misc' => 'Çeşitli',
			'view' => 'Görünüm',
		),
		'hide_read_feeds' => 'Okunmamış makalesi olmayan kategorileri ve beslemeleri gizle (“Tüm makaleleri göster” yapılandırmasıyla çalışmaz)',
		'img_with_lazyload' => 'Resimleri yüklemek için <em>gecikmeli yükleme</em> modunu kullan',
		'jump_next' => 'sonraki okunmamış kardeşe geç',
		'mark_updated_article_unread' => 'Güncellenen makaleleri okunmadı olarak işaretle',
		'number_divided_when_reader' => 'Okuma görünümünde 2’ye böl',
		'read' => array(
			'article_open_on_website' => 'makale orijinal web sitesinde açıldığında',
			'article_viewed' => 'makale görüntülendiğinde',
			'focus' => 'odaklandığında (önemli beslemeler hariç)',
			'keep_max_n_unread' => 'Okunmamış olarak tutulacak maksimum makale sayısı',
			'scroll' => 'kaydırırken (önemli beslemeler hariç)',
			'upon_gone' => 'artık上游 haber akışında olmadığında',
			'upon_reception' => 'makale alındığında',
			'when' => 'Bir makaleyi okundu olarak işaretle…',
			'when_same_title_in_category' => 'eğer aynı başlık kategorideki en yeni <i>n</i> makalede zaten varsa',
			'when_same_title_in_feed' => 'eğer aynı başlık beslemedeki en yeni <i>n</i> makalede zaten varsa',
		),
		'show' => array(
			'_' => 'Gösterilecek makaleler',
			'active_category' => 'Etkin kategori',
			'adaptive' => 'Okunmamış varsa onları, yoksa tüm makaleleri göster',
			'all_articles' => 'Tüm makaleleri göster',
			'all_categories' => 'Tüm kategoriler',
			'no_category' => 'Kategorisiz',
			'remember_categories' => 'Açık kategorileri hatırla',
			'unread' => 'Okunmamışları göster',
			'unread_or_favorite' => 'Okunmamışları ve favorileri göster',
		),
		'show_fav_unread_help' => 'Etiketler için de geçerlidir',
		'sides_close_article' => 'Makale metin alanının dışına tıklayınca makaleyi kapat',
		'sort' => array(
			'_' => 'Sıralama düzeni',
			'newer_first' => 'Önce yeniler',
			'older_first' => 'Önce eskiler',
		),
		'star' => array(
			'when' => 'Bir makaleyi favori olarak işaretle…',
		),
		'sticky_post' => 'Makale açıldığında üstte sabitle',
		'title' => 'Okuma',
		'view' => array(
			'default' => 'Varsayılan görünüm',
			'global' => 'Genel görünüm',
			'normal' => 'Normal görünüm',
			'reader' => 'Okuma görünümü',
		),
	),
	'sharing' => array(
		'_' => 'Paylaşım',
		'add' => 'Paylaşım yöntemi ekle',
		'bluesky' => 'Bluesky',	// IGNORE
		'deprecated' => 'Bu hizmet kullanımdan kaldırıldı ve FreshRSS’nin <a href="https://freshrss.github.io/FreshRSS/en/users/08_sharing_services.html" title="Daha fazla bilgi için belgeleri aç" target="_blank">gelecek bir sürümünde</a> kaldırılacak.',
		'diaspora' => 'Diaspora*',	// IGNORE
		'email' => 'E-posta',
		'facebook' => 'Facebook',	// IGNORE
		'more_information' => 'Daha fazla bilgi',
		'print' => 'Yazdır',
		'raindrop' => 'Raindrop.io',	// IGNORE
		'remove' => 'Paylaşım yöntemini kaldır',
		'shaarli' => 'Shaarli',	// IGNORE
		'share_name' => 'Görüntülenecek paylaşım adı',
		'share_url' => 'Kullanılacak paylaşım URL’si',
		'title' => 'Paylaşım',
		'twitter' => 'Twitter',	// IGNORE
		'wallabag' => 'wallabag',	// IGNORE
	),
	'shortcut' => array(
		'_' => 'Kısayollar',
		'article_action' => 'Makale eylemleri',
		'auto_share' => 'Paylaş',
		'auto_share_help' => 'Eğer yalnızca bir paylaşım modu varsa, o kullanılır. Aksi takdirde, modlar numaralarıyla erişilebilir.',
		'close_dropdown' => 'Menüleri kapat',
		'collapse_article' => 'Daralt',
		'first_article' => 'İlk makaleyi aç',
		'focus_search' => 'Arama kutusuna eriş',
		'global_view' => 'Genel görünüme geç',
		'help' => 'Belgeleri göster',
		'javascript' => 'Kısayolları kullanmak için JavaScript etkin olmalı',
		'last_article' => 'Son makaleyi aç',
		'load_more' => 'Daha fazla makale yükle',
		'mark_favorite' => 'Favoriyi aç/kapat',
		'mark_read' => 'Okundu durumunu aç/kapat',
		'navigation' => 'Gezinme',
		'navigation_help' => '<kbd>⇧ Shift</kbd> tuşuyla, gezinme kısayolları beslemelere uygulanır.<br/><kbd>Alt ⎇</kbd> tuşuyla, gezinme kısayolları kategorilere uygulanır.',
		'navigation_no_mod_help' => 'Aşağıdaki gezinme kısayolları değiştiricileri desteklemez.',
		'next_article' => 'Sonraki makaleyi aç',
		'next_unread_article' => 'Sonraki okunmamış makaleyi aç',
		'non_standard' => 'Bazı tuşlar (<kbd>%s</kbd>) kısayol olarak çalışmayabilir.',
		'normal_view' => 'Normal görünüme geç',
		'other_action' => 'Diğer eylemler',
		'previous_article' => 'Önceki makaleyi aç',
		'reading_view' => 'Okuma görünümüne geç',
		'rss_view' => 'RSS beslemesi olarak aç',
		'see_on_website' => 'Orijinal web sitesinde gör',
		'shift_for_all_read' => '+ <kbd>Alt ⎇</kbd> önceki makaleleri okundu olarak işaretlemek için<br />+ <kbd>⇧ Shift</kbd> tüm makaleleri okundu olarak işaretlemek için',
		'skip_next_article' => 'Açmadan sonrakine odaklan',
		'skip_previous_article' => 'Açmadan öncesine odaklan',
		'title' => 'Kısayollar',
		'toggle_media' => 'Medyayı oynat/duraklat',
		'user_filter' => 'Kullanıcı sorgularına eriş',
		'user_filter_help' => 'Eğer yalnızca bir kullanıcı sorgusu varsa, o kullanılır. Aksi takdirde, sorgular numaralarıyla erişilebilir.',
		'views' => 'Görünümler',
	),
	'user' => array(
		'articles_and_size' => '%s makale (%s)',
		'current' => 'Geçerli kullanıcı',
		'is_admin' => 'yönetici',
		'users' => 'Kullanıcılar',
	),
);

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
		'documentation' => '외부 도구에서 API를 사용하기 위해서 아래 URL을 사용하세요.',
		'title' => 'API',	// IGNORE
	),
	'bookmarklet' => array(
		'documentation' => '이 버튼을 즐겨찾기 막대로 끌어다 놓거나 마우스 오른쪽 클릭으로 나타나는 메뉴에서 "이 링크를 즐겨찾기에 추가"를 선택하세요. 그리고 피드를 구독하길 원하는 페이지에서 "구독하기" 버튼을 클릭하세요.',
		'label' => '구독하기',
		'title' => '북마클릿',
	),
	'category' => array(
		'_' => '카테고리',
		'add' => '카테고리 추가',
		'archiving' => '보관',
		'dynamic_opml' => array(
			'_' => '동적 OPML',
			'help' => '이 카테코리에 피드를 동적으로 채우려면 <a href="http://opml.org/" target="_blank">OPML 파일</a> 의 URL을 제공해주세요',
		),
		'empty' => '빈 카테고리',
		'expand' => 'Expand category',	// TODO
		'information' => '정보',
		'open' => 'Open category',	// TODO
		'opml_url' => 'OPML URL',	// IGNORE
		'position' => '표시 위치',
		'position_help' => '정렬 순서 제어',
		'title' => '제목',
	),
	'feed' => array(
		'accept_cookies' => '쿠키 사용 동의',
		'accept_cookies_help' => '피드 서버가 쿠키를 사용하도록 허용 (요청 지속 기간 동안에만 메모리에 저장)',
		'add' => '피드 추가',
		'advanced' => '고급 설정',
		'archiving' => '보관',
		'auth' => array(
			'configuration' => '로그인',
			'help' => 'HTTP 접속이 제한되는 RSS 피드에 접근합니다',
			'http' => 'HTTP 인증',
			'password' => 'HTTP 암호',
			'username' => 'HTTP 사용자 이름',
		),
		'clear_cache' => '항상 캐시 지우기',
		'content_action' => array(
			'_' => '글 콘텐츠를 가져올 때의 동작',
			'append' => '이미 존재하는 콘텐츠 다음에 추가',
			'prepend' => '이미 존재하는 콘텐츠 이전에 추가',
			'replace' => '이미 존재하는 콘텐츠 대체',
		),
		'content_retrieval' => 'Content retrieval',	// TODO
		'css_cookie' => '글 콘텐츠를 가져올 때 쿠키를 사용',
		'css_cookie_help' => '예시: <kbd>foo=bar; gdpr_consent=true; cookie=value</kbd>',
		'css_help' => '글의 일부가 포함된 RSS 피드를 가져옵니다 (주의, 시간이 좀 더 걸립니다!)',
		'css_path' => '웹사이트 상의 글 본문에 해당하는 CSS 경로',
		'css_path_filter' => array(
			'_' => '제거할 요소의 CSS 선택자',
			'help' => 'CSS 선택자는 다음과 같은 목록일 수 있습니다: <kbd>footer, aside, p[data-sanitized-class~="menu"]</kbd>',
		),
		'description' => '설명',
		'empty' => '이 피드는 비어있습니다. 피드가 계속 운영되고 있는지 확인하세요.',
		'error' => '이 피드에 문제가 발생했습니다. 이 피드에 접근 권한이 있는지 확인하세요.',	// DIRTY
		'export-as-opml' => array(
			'download' => '다운로드',
			'help' => 'XML 파일 (data subset. <a href="https://freshrss.github.io/FreshRSS/en/developers/OPML.html" target="_blank">See documentation</a>)',	// DIRTY
			'label' => 'OPML로 내보내기',
		),
		'filteractions' => array(
			'_' => '필터 동작',
			'help' => '한 줄에 한 검색 필터를 작성해 주세요. 실행시 <a href="https://freshrss.github.io/FreshRSS/en/users/10_filter.html#with-the-search-field" target="_blank">문서 참고</a>.',
		),
		'http_headers' => 'HTTP Headers',	// TODO
		'http_headers_help' => 'Headers are separated by a newline, and the name and value of a header are separated by a colon (e.g: <kbd><code>Accept: application/atom+xml<br />Authorization: Bearer some-token</code></kbd>).',	// TODO
		'information' => '정보',
		'keep_min' => '최소 유지 글 개수',
		'kind' => array(
			'_' => '피드 소스 유형',
			'html_json' => array(
				'_' => 'HTML + XPath + JSON dot notation (JSON in HTML)',	// TODO
				'xpath' => array(
					'_' => 'XPath for JSON in HTML',	// TODO
					'help' => 'Example: <code>normalize-space(//script[@type="application/json"])</code> (single JSON)<br />or: <code>//script[@type="application/ld+json"]</code> (one JSON object per article)',	// TODO
				),
			),
			'html_xpath' => array(
				'_' => 'HTML + XPath (웹 스크래핑)',
				'feed_title' => array(
					'_' => '피드 제목',
					'help' => '예제: <code>//title</code> 혹은 정적 문자열: <code>"나의 커스텀 피드"</code>',
				),
				'help' => '<dfn><a href="https://www.w3.org/TR/xpath-10/" target="_blank">XPath 1.0</a></dfn> 는 고급 사용자를 위한 표준 쿼리 언어입니다. FreshRSS는 웹 스크래핑 지원을 위해 이를 사용합니다.',
				'item' => array(
					'_' => '뉴스 <strong>기사</strong><br /><small>(가장 중요한 항목)</small>',
					'help' => '예제: <code>//div[@class="news-item"]</code>',
				),
				'item_author' => array(
					'_' => '기사 작성자',
					'help' => '정적 문자열이 될 수 있습니다. 예제: <code>"Anonymous"</code>',
				),
				'item_categories' => '기사 태그',
				'item_content' => array(
					'_' => '기사 내용',
					'help' => '전체 기사를 가져오는 예시: <code>.</code>',
				),
				'item_thumbnail' => array(
					'_' => '기사 섬네일',
					'help' => '예제: <code>descendant::img/@src</code>',
				),
				'item_timeFormat' => array(
					'_' => '사용자 지정 날짜/시간 형식',
					'help' => '선택 사항. <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a>에서 지원하는 형식(예: <code>d-m-Y H:i:s</code>)',
				),
				'item_timestamp' => array(
					'_' => '기사 날짜',
					'help' => '결과 값은 <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a>에서 파싱한 값을 이용합니다.',
				),
				'item_title' => array(
					'_' => '기사 제목',
					'help' => '<code>descendant::h2</code> 같은 특정 <code>descendant::</code><a href="https://developer.mozilla.org/docs/Web/XPath/Axes" target="_blank">XPath 축</a>을 사용합니다.',
				),
				'item_uid' => array(
					'_' => '기사 UID',
					'help' => 'Optional. 예제: <code>descendant::div/@data-uri</code>',
				),
				'item_uri' => array(
					'_' => '기사 링크 (URL)',
					'help' => '예제: <code>descendant::a/@href</code>',
				),
				'relative' => '다음의 (기사와 관련된) XPath:',
				'xpath' => '다음의 XPath:',
			),
			'json_dotnotation' => array(
				'_' => 'JSON (점 표기법)',
				'feed_title' => array(
					'_' => '피드 제목',
					'help' => '예시: <code>meta.title</code> 혹은 스태틱 문자열: <code>"나만의 커스텀 피드"</code>',
				),
				'help' => 'JSON 점 표기법은 배열을 표기할 때 오브젝트와 괄호 사이에 점을 사용합니다. (예: <code>data.items[0].title</code>)',
				'item' => array(
					'_' => '새 뉴스 <strong>기사</strong> 찾기<br /><small>(가장 중요함)</small>',
					'help' => '기사를 포함한 배열의 JSON 경로, 예: <code>뉴스기사</code>',
				),
				'item_author' => '기사 저자',
				'item_categories' => '기사 테그',
				'item_content' => array(
					'_' => '기사 내용',
					'help' => 'Key under which the content is found, 예: <code>내용</code>',
				),
				'item_thumbnail' => array(
					'_' => '기사 섬네일',
					'help' => '예시: <code>image</code>',
				),
				'item_timeFormat' => array(
					'_' => '사용자 지정 날짜/시간 형식',
					'help' => '선택 사항. <a href="https://php.net/datetime.createfromformat" target="_blank"><code>DateTime::createFromFormat()</code></a>에서 지원하는 형식(예: <code>d-m-Y H:i:s</code>)',
				),
				'item_timestamp' => array(
					'_' => '기사 날짜',
					'help' => '결과 값은 <a href="https://php.net/strtotime" target="_blank"><code>strtotime()</code></a>를 통해 파싱됩니다.',
				),
				'item_title' => '기사 제목',
				'item_uid' => '기사 고유 ID',
				'item_uri' => array(
					'_' => '기사 링크 (URL)',
					'help' => '예시: <code>permalink</code>',
				),
				'json' => 'JSON 경로:',
				'relative' => 'JSON 상대 경로(기사 기준):',
			),
			'jsonfeed' => 'JSON 피드',
			'rss' => 'RSS / Atom (기본값)',
			'xml_xpath' => 'XML + XPath',	// IGNORE
		),
		'maintenance' => array(
			'clear_cache' => '캐쉬 지우기',
			'clear_cache_help' => '이 피드의 캐쉬 지우기.',
			'reload_articles' => '글 다시 로드',
			'reload_articles_help' => '선택자가 지정된 경우 해당하는 수의 기사를 다시 불러오고 전체 내용을 가져옵니다.',
			'title' => '유지 보수',
		),
		'max_http_redir' => '최대 HTTP 리다이렉션',
		'max_http_redir_help' => '값을 비워두거나 0으로 설정하면 비활성화하며, -1으로 설정하면 무제한 리다이렉션합니다',
		'method' => array(
			'_' => 'HTTP 메서드',
		),
		'method_help' => 'POST 페이로드는 <code>application/x-www-form-urlencoded</code> 및 <code>application/json</code>을 자동으로 지원합니다.',
		'method_postparams' => 'POST용 페이로드',
		'moved_category_deleted' => '카테고리를 삭제하면, 해당 카테고리 아래에 있던 피드들은 자동적으로 <em>%s</em> 아래로 분류됩니다.',
		'mute' => array(
			'_' => '무기한 새로고침 금지',
			'state_is_muted' => 'This feed is muted',	// TODO
		),
		'no_selected' => '선택된 피드가 없습니다.',
		'number_entries' => '%d 개의 글',
		'open_feed' => 'Open feed %s',	// TODO
		'path_entries_conditions' => 'Conditions for content retrieval',	// TODO
		'priority' => array(
			'_' => '표시',
			'archived' => '표시하지 않음 (보관됨)',
			'category' => '피드가 속한 카테고리에만 표시하기',
			'important' => '중요 피드에서 표시',
			'main_stream' => '메인 스트림에 표시하기',
		),
		'proxy' => '이 피드를 가져올 때 사용할 프록시 설정',
		'proxy_help' => '프로토콜 선택 (예: SOCKS5) 그리고 프록시 주소 입력 (예: <kbd>127.0.0.1:1080</kbd> 혹은 <kbd>username:password@127.0.0.1:1080</kbd>)',
		'selector_preview' => array(
			'show_raw' => '소스코드 표시',
			'show_rendered' => '콘텐츠 표시',
		),
		'show' => array(
			'all' => '모든 피드 보기',
			'error' => '오류가 발생한 피드만 보기',
		),
		'showing' => array(
			'error' => '오류가 발생한 피드만 보여주고 있습니다',
		),
		'ssl_verify' => 'SSL 유효성 검사',
		'stats' => '통계',
		'think_to_add' => '피드를 추가할 수 있습니다.',
		'timeout' => '타임아웃 (초)',
		'title' => '제목',
		'title_add' => 'RSS 피드 추가',
		'ttl' => '다음 시간이 지나기 전에 새로고침 금지',
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
		'url' => '피드 URL',
		'useragent' => '이 피드를 가져올 때 사용할 유저 에이전트 설정',
		'useragent_help' => '예시: <kbd>Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0)</kbd>',
		'validator' => '피드 유효성 검사',
		'website' => '웹사이트 URL',
		'websub' => 'WebSub을 사용한 즉시 알림',
	),
	'import_export' => array(
		'export' => array(
			'_' => '내보내기',
			'sqlite' => 'Download user database as SQLite',	// TODO
		),
		'export_labelled' => '라벨이 표시된 글들 내보내기',
		'export_opml' => '피드 목록 내보내기 (OPML)',
		'export_starred' => '즐겨찾기 내보내기',
		'feed_list' => '%s 개의 글 목록',
		'file_to_import' => '불러올 파일<br />(OPML, JSON 또는 ZIP)',
		'file_to_import_no_zip' => '불러올 파일<br />(OPML 또는 JSON)',
		'import' => '불러오기',
		'starred_list' => '즐겨찾기에 등록된 글 목록',
		'title' => '불러오기 / 내보내기',
	),
	'menu' => array(
		'add' => '피드 혹은 카테고리 추가',
		'import_export' => '불러오기 / 내보내기',
		'label_management' => '라벨 관리',
		'stats' => array(
			'idle' => '유휴 피드',
			'main' => '주요 통계',
			'repartition' => '글 분류',
		),
		'subscription_management' => '구독 관리',
		'subscription_tools' => '구독 도구',
	),
	'tag' => array(
		'auto_label' => '새 기사에 이 라벨 추가',
		'name' => '이름',
		'new_name' => '새 이름',
		'old_name' => '이전 이름',
	),
	'title' => array(
		'_' => '구독 관리',
		'add' => '피드 혹은 카테고리 추가',
		'add_category' => '카테고리 추가',
		'add_dynamic_opml' => '동적 OPML 추가',
		'add_feed' => '피드 추가',
		'add_label' => '라벨 추가',
		'add_opml_category' => 'OPML category name',	// TODO
		'delete_label' => '라벨 삭제',
		'feed_management' => 'RSS 피드 관리',
		'rename_label' => '라벨 이름 바꾸기',
		'subscription_tools' => '구독 도구',
	),
);

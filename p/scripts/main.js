// @license magnet:?xt=urn:btih:0b31508aeb0634b347b8270c7bee4d411b5d4109&dn=agpl-3.0.txt AGPL-3.0
'use strict';

// <Polyfills>
if (!document.scrollingElement) document.scrollingElement = document.documentElement;
if (!NodeList.prototype.forEach) NodeList.prototype.forEach = Array.prototype.forEach;
if (!Element.prototype.matches) {
	Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.webkitMatchesSelector;
}
if (!Element.prototype.closest) {
	Element.prototype.closest = function (s) {
		let el = this;
		do {
			if (el.matches(s)) return el;
			el = el.parentElement;
		} while (el);
		return null;
	};
}
if (!Element.prototype.remove) Element.prototype.remove = function () { if (this.parentNode) this.parentNode.removeChild(this); };
// </Polyfills>

// <Utils>
function xmlHttpRequestJson(req) {
	let json = req.response;
	if (req.responseType !== 'json') {	// IE11
		try {
			json = JSON.parse(req.responseText);
		} catch (ex) {
			json = null;
		}
	}
	return json;
}
// </Utils>

// <Global context>
/* eslint-disable no-var */
var context;
/* eslint-enable no-var */

(function parseJsonVars() {
	const jsonVars = document.getElementById('jsonVars');
	const json = JSON.parse(jsonVars.innerHTML);
	jsonVars.outerHTML = '';
	context = json.context;
	context.ajax_loading = false;
	context.i18n = json.i18n;
	context.shortcuts = json.shortcuts;
	context.urls = json.urls;
	context.icons = json.icons;
	context.icons.read = decodeURIComponent(context.icons.read);
	context.icons.unread = decodeURIComponent(context.icons.unread);
	context.extensions = json.extensions;
}());

const freshrssGlobalContextLoadedEvent = new Event('freshrss:globalContextLoaded');
document.dispatchEvent(freshrssGlobalContextLoadedEvent);
// </Global context>

function badAjax(reload) {
	openNotification(context.i18n.notif_request_failed, 'bad');
	if (reload) {
		setTimeout(function () { location.reload(); }, 2000);
	}
	return true;
}

function needsScroll(elem) {
	const winBottom = document.scrollingElement.scrollTop + document.scrollingElement.clientHeight;
	const elemTop = elem.offsetParent.offsetTop + elem.offsetTop;
	const elemBottom = elemTop + elem.offsetHeight;
	if (elemTop < document.scrollingElement.scrollTop || elemBottom > winBottom) {
		return elemTop - (document.scrollingElement.clientHeight / 2);
	}
	return 0;
}

function str2int(str) {
	if (!str) {
		return 0;
	}
	return parseInt(str.replace(/\D/g, ''), 10) || 0;
}

function numberFormat(nStr) {
	if (nStr < 0) {
		return 0;
	}
	// http://www.mredkj.com/javascript/numberFormat.html
	const x = String(nStr).split('.');
	const x2 = x.length > 1 ? '.' + x[1] : '';
	const rgx = /(\d+)(\d{3})/;
	let x1 = x[0];
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1 $2');
	}
	return x1 + x2;
}

function incLabel(p, inc, spaceAfter) {
	const i = str2int(p) + inc;
	return i > 0 ? ((spaceAfter ? '' : ' ') + '(' + numberFormat(i) + ')' + (spaceAfter ? ' ' : '')) : '';
}

function incUnreadsFeed(article, feed_id, nb) {
	// Update unread: feed
	let elem = document.getElementById(feed_id);
	let feed_unreads = elem ? str2int(elem.getAttribute('data-unread')) : 0;
	const feed_priority = elem ? str2int(elem.getAttribute('data-priority')) : 0;
	if (elem) {
		elem.setAttribute('data-unread', feed_unreads + nb);
		elem = elem.querySelector('.item-title');
		if (elem) {
			elem.setAttribute('data-unread', numberFormat(feed_unreads + nb));
		}
	}

	// Update unread: category
	elem = document.getElementById(feed_id);
	elem = elem ? elem.closest('.category') : null;
	if (elem) {
		feed_unreads = str2int(elem.getAttribute('data-unread'));
		elem.setAttribute('data-unread', feed_unreads + nb);
		elem = elem.querySelector('.title');
		if (elem) {
			elem.setAttribute('data-unread', numberFormat(feed_unreads + nb));
		}
	}

	// Update unread: all
	if (feed_priority > 0) {
		elem = document.querySelector('#aside_feed .all .title');
		if (elem) {
			feed_unreads = elem ? str2int(elem.getAttribute('data-unread')) : 0;
			elem.setAttribute('data-unread', numberFormat(feed_unreads + nb));
		}
	}

	// Update unread: important
	if (feed_priority >= 20) {
		elem = document.querySelector('#aside_feed .important .title');
		if (elem) {
			feed_unreads = elem ? str2int(elem.getAttribute('data-unread')) : 0;
			elem.setAttribute('data-unread', numberFormat(feed_unreads + nb));
		}
	}

	// Update unread: favourites
	if (article && article.closest('div').classList.contains('favorite')) {
		elem = document.querySelector('#aside_feed .favorites .title');
		if (elem) {
			feed_unreads = elem ? str2int(elem.getAttribute('data-unread')) : 0;
			elem.setAttribute('data-unread', numberFormat(feed_unreads + nb));
		}
	}

	let isCurrentView = false;
	// Update unread: title
	document.title = document.title.replace(/^((?:\([\s0-9]+\) )?)/, function (m, p1) {
		const feed = document.getElementById(feed_id);
		if (article || (feed && feed.closest('.active'))) {
			isCurrentView = true;
			return incLabel(p1, nb, true);
		} else if (document.querySelector('.all.active')) {
			isCurrentView = feed_priority > 0;
			return incLabel(p1, feed_priority > 0 ? nb : 0, true);
		} else {
			return p1;
		}
	});
	return isCurrentView;
}

function incUnreadsTag(tag_id, nb) {
	let t = document.getElementById(tag_id);
	if (t) {
		const unreads = str2int(t.getAttribute('data-unread'));
		t.setAttribute('data-unread', unreads + nb);
		t.querySelector('.item-title').setAttribute('data-unread', numberFormat(unreads + nb));
	}
	t = document.querySelector('.category.tags .title');
	if (t) {
		const unreads = str2int(t.getAttribute('data-unread'));
		t.setAttribute('data-unread', numberFormat(unreads + nb));
	}
}

function removeArticle(div) {
	if (!div || div.classList.contains('not_read') || (context.auto_mark_article && div.classList.contains('active'))) {
		return;
	}
	let scrollTop = box_to_follow.scrollTop;
	let dirty = false;
	const p = div.previousElementSibling;
	const n = div.nextElementSibling;
	if (p && p.classList.contains('day') && n && n.classList.contains('day')) {
		scrollTop -= p.offsetHeight;
		dirty = true;
		p.remove();
	}
	if (div.offsetHeight > 0 && div.offsetParent.offsetTop + div.offsetTop + div.offsetHeight < scrollTop) {
		scrollTop -= div.offsetHeight;
		dirty = true;
	}
	div.remove();
	if (dirty) {
		box_to_follow.scrollTop = scrollTop;
	}
}

const pending_entries = {};
let mark_read_queue = [];

function send_mark_read_queue(queue, asRead, callback) {
	if (!queue || queue.length === 0) {
		if (callback) {
			callback();
		}
		return;
	}
	const req = new XMLHttpRequest();
	req.open('POST', '.?c=entry&a=read' + (asRead ? '' : '&is_read=0'), true);
	req.responseType = 'json';
	req.onerror = function (e) {
		for (let i = queue.length - 1; i >= 0; i--) {
			delete pending_entries['flux_' + queue[i]];
		}
		badAjax(this.status == 403);
	};
	req.onload = function (e) {
		if (this.status != 200) {
			return req.onerror(e);
		}
		const json = xmlHttpRequestJson(this);
		if (!json) {
			return req.onerror(e);
		}
		for (let i = queue.length - 1; i >= 0; i--) {
			const div = document.getElementById('flux_' + queue[i]);
			const myIcons = context.icons;
			let inc = 0;
			if (div.classList.contains('not_read')) {
				div.classList.remove('not_read');
				div.querySelectorAll('a.read').forEach(function (a) {
					a.href = a.href.replace('&is_read=0', '') + '&is_read=1';
				});
				div.querySelectorAll('a.read > .icon').forEach(function (img) { img.outerHTML = myIcons.read; });
				inc--;
				if (context.auto_remove_article) {
					removeArticle(div);
				}
			} else {
				div.classList.add('not_read');
				div.classList.add('keep_unread');	// Split for IE11
				div.querySelectorAll('a.read').forEach(function (a) {
					a.href = a.href.replace('&is_read=1', '');
				});
				div.querySelectorAll('a.read > .icon').forEach(function (img) { img.outerHTML = myIcons.unread; });
				inc++;
			}
			const feed_link = div.querySelector('.website > a, a.website');
			if (feed_link) {
				const feed_url = feed_link.href;
				const feed_id = feed_url.substr(feed_url.lastIndexOf('f_'));
				incUnreadsFeed(div, feed_id, inc);
			}
			delete pending_entries['flux_' + queue[i]];
		}
		faviconNbUnread();
		if (json.tags) {
			const tagIds = Object.keys(json.tags);
			for (let i = tagIds.length - 1; i >= 0; i--) {
				const tagId = tagIds[i];
				incUnreadsTag(tagId, (asRead ? -1 : 1) * json.tags[tagId].length);
			}
		}
		toggle_bigMarkAsRead_button();
		onScroll();
		if (callback) {
			callback();
		}
	};
	req.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
	req.send(JSON.stringify({
		ajax: true,
		_csrf: context.csrf,
		id: queue,
	}));
}

let send_mark_read_queue_timeout = 0;

function send_mark_queue_tick(callback) {
	send_mark_read_queue_timeout = 0;
	const queue = mark_read_queue.slice(0);
	mark_read_queue = [];
	send_mark_read_queue(queue, true, callback);
}
const delayedFunction = send_mark_queue_tick;

function delayedClick(a) {
	if (a) {
		delayedFunction(function () { a.click(); });
	}
}

function mark_read(div, only_not_read, asBatch) {
	if (!div || !div.id || context.anonymous ||
		(only_not_read && !div.classList.contains('not_read'))) {
		return false;
	}
	if (pending_entries[div.id]) {
		return false;
	}
	pending_entries[div.id] = true;

	const asRead = div.classList.contains('not_read');
	const entryId = div.id.replace(/^flux_/, '');
	if (asRead && asBatch) {
		mark_read_queue.push(entryId);
		if (send_mark_read_queue_timeout == 0) {
			send_mark_read_queue_timeout = setTimeout(function () { send_mark_queue_tick(null); }, 1000);
		}
	} else {
		const queue = [entryId];
		send_mark_read_queue(queue, asRead);
	}
}

function mark_previous_read(div) {
	while (div) {
		mark_read(div, true, true);
		div = div.previousElementSibling;
	}
}

function mark_favorite(div) {
	if (!div) {
		return false;
	}

	const a = div.querySelector('a.bookmark');
	const url = a ? a.href : '';
	if (!url) {
		return false;
	}

	if (pending_entries[div.id]) {
		return false;
	}
	pending_entries[div.id] = true;

	const req = new XMLHttpRequest();
	req.open('POST', url, true);
	req.responseType = 'json';
	req.onerror = function (e) {
		delete pending_entries[div.id];
		badAjax(this.status == 403);
	};
	req.onload = function (e) {
		if (this.status != 200) {
			return req.onerror(e);
		}
		const json = xmlHttpRequestJson(this);
		if (!json) {
			return req.onerror(e);
		}
		let inc = 0;
		if (div.classList.contains('favorite')) {
			div.classList.remove('favorite');
			inc--;
		} else {
			div.classList.add('favorite');
			inc++;
		}
		div.querySelectorAll('a.bookmark').forEach(function (a) { a.href = json.url; });
		div.querySelectorAll('a.bookmark > .icon').forEach(function (img) { img.outerHTML = json.icon; });

		const favourites = document.querySelector('#aside_feed .favorites .title');
		if (favourites) {
			favourites.textContent = favourites.textContent.replace(/((?: \([\s0-9]+\))?\s*)$/, function (m, p1) {
				return incLabel(p1, inc, false);
			});
		}

		if (div.classList.contains('not_read')) {
			const elem = document.querySelector('#aside_feed .favorites .title');
			const feed_unreads = elem ? str2int(elem.getAttribute('data-unread')) : 0;
			if (elem) {
				elem.setAttribute('data-unread', numberFormat(feed_unreads + inc));
			}
		}

		delete pending_entries[div.id];
	};
	req.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
	req.send(JSON.stringify({
		ajax: true,
		_csrf: context.csrf,
	}));
}

const freshrssOpenArticleEvent = document.createEvent('Event');
freshrssOpenArticleEvent.initEvent('freshrss:openArticle', true, true);

function loadLazyImages(rootElement) {
	rootElement.querySelectorAll('img[data-original], iframe[data-original]').forEach(function (el) {
		el.src = el.getAttribute('data-original');
		el.removeAttribute('data-original');
	});
}

function toggleContent(new_active, old_active, skipping) {
	// If skipping, move current without activating or marking as read
	if (!new_active) {
		return;
	}

	if (context.does_lazyload && !skipping) {
		loadLazyImages(new_active);
	}

	if (old_active !== new_active) {
		if (!skipping) {
			new_active.classList.add('active');
		}
		new_active.classList.add('current');
		if (old_active) {
			old_active.classList.remove('active');
			old_active.classList.remove('current');	// Split for IE11
			if (context.auto_remove_article) {
				removeArticle(old_active);
			}
		}
	} else {
		new_active.classList.toggle('active');
	}

	const relative_move = context.current_view === 'global';
	const box_to_move = relative_move ? document.getElementById('panel') : document.scrollingElement;

	if (context.sticky_post) {	// Stick the article to the top when opened
		const prev_article = new_active.previousElementSibling;
		const nav_menu = document.querySelector('.nav_menu');
		let nav_menu_height = 0;

		if (nav_menu && (getComputedStyle(nav_menu).position === 'fixed' || getComputedStyle(nav_menu).position === 'sticky')) {
			nav_menu_height = nav_menu.offsetHeight;
		}

		let new_pos = new_active.offsetParent.offsetTop + new_active.offsetTop - nav_menu_height;

		if (prev_article && prev_article.offsetParent && new_active.offsetTop - prev_article.offsetTop <= 150) {
			new_pos = prev_article.offsetParent.offsetTop + prev_article.offsetTop - nav_menu_height;
			if (relative_move) {
				new_pos -= box_to_move.offsetTop;
			}
		}

		if (skipping) {
			// when skipping, this feels more natural if it’s not so near the top
			new_pos -= document.body.clientHeight / 4;
		}

		box_to_move.scrollTop = new_pos;
	}

	if (new_active.classList.contains('active') && !skipping) {
		if (context.auto_mark_article) {
			mark_read(new_active, true, true);
		}
		new_active.dispatchEvent(freshrssOpenArticleEvent);
	}
	onScroll();
}

function prev_entry(skipping) {
	const old_active = document.querySelector('.flux.current');
	let new_active = old_active;
	if (new_active) {
		do new_active = new_active.previousElementSibling;
		while (new_active && !new_active.classList.contains('flux'));
		if (!new_active) {
			prev_feed();
		}
	} else {
		new_active = document.querySelector('.flux');
	}
	if (context.auto_mark_focus && !new_active.classList.contains('keep_unread')) {
		mark_read(new_active, true, true);
	}
	toggleContent(new_active, old_active, skipping);
}

function next_entry(skipping) {
	const old_active = document.querySelector('.flux.current');
	let new_active = old_active;
	if (new_active) {
		do new_active = new_active.nextElementSibling;
		while (new_active && !new_active.classList.contains('flux'));
		if (!new_active) {
			next_feed();
		}
	} else {
		new_active = document.querySelector('.flux');
	}
	if (context.auto_mark_focus && !new_active.classList.contains('keep_unread')) {
		mark_read(new_active, true, true);
	}
	toggleContent(new_active, old_active, skipping);
}

function next_unread_entry(skipping) {
	const old_active = document.querySelector('.flux.current');
	let new_active = old_active;
	if (new_active) {
		do new_active = new_active.nextElementSibling;
		while (new_active && !new_active.classList.contains('not_read'));
		if (!new_active) {
			next_feed();
		}
	} else {
		new_active = document.querySelector('.not_read');
	}
	if (context.auto_mark_focus && !new_active.classList.contains('keep_unread')) {
		mark_read(new_active, true, true);
	}
	toggleContent(new_active, old_active, skipping);
}

function prev_feed() {
	let found = false;
	let adjacent = null;
	const feeds = document.querySelectorAll('#aside_feed .feed');
	for (let i = feeds.length - 1; i >= 0; i--) {
		const feed = feeds[i];
		if (feed.classList.contains('active')) {
			found = true;
			continue;
		}
		if (!found) {
			continue;
		}
		if (getComputedStyle(feed).display === 'none') {
			continue;
		}
		if (feed.dataset.unread != 0) {
			delayedClick(feed.querySelector('a.item-title'));
			return;
		} else if (adjacent === null) {
			adjacent = feed;
		}
	}
	if (found) {
		delayedClick(adjacent.querySelector('a.item-title'));
	} else {
		last_feed();
	}
}

function next_feed() {
	let found = false;
	let adjacent = null;
	const feeds = document.querySelectorAll('#aside_feed .feed');
	for (let i = 0; i < feeds.length; i++) {
		const feed = feeds[i];
		if (feed.classList.contains('active')) {
			found = true;
			continue;
		}
		if (!found) {
			continue;
		}
		if (getComputedStyle(feed).display === 'none') {
			continue;
		}
		if (feed.dataset.unread != 0) {
			delayedClick(feed.querySelector('a.item-title'));
			return;
		} else if (adjacent === null) {
			adjacent = feed;
		}
	}
	if (found) {
		delayedClick(adjacent.querySelector('a.item-title'));
	} else {
		first_feed();
	}
}

function first_feed() {
	const a = document.querySelector('#aside_feed .category.active .feed:not([data-unread="0"]) a.item-title');
	delayedClick(a);
}

function last_feed() {
	const links = document.querySelectorAll('#aside_feed .category.active .feed:not([data-unread="0"]) a.item-title');
	if (links && links.length > 0) {
		delayedClick(links[links.length - 1]);
	}
}

function prev_category() {
	const active_cat = document.querySelector('#aside_feed .category.active');
	if (active_cat) {
		let cat = active_cat;
		do cat = cat.previousElementSibling;
		while (cat && getComputedStyle(cat).display === 'none');
		if (cat) {
			delayedClick(cat.querySelector('a.tree-folder-title'));
		}
	} else {
		last_category();
	}
}

function next_category() {
	const active_cat = document.querySelector('#aside_feed .category.active');
	if (active_cat) {
		let cat = active_cat;
		do cat = cat.nextElementSibling;
		while (cat && getComputedStyle(cat).display === 'none');
		if (cat) {
			delayedClick(cat.querySelector('a.tree-folder-title'));
		}
	} else {
		first_category();
	}
}

function next_unread_category() {
	const active_cat = document.querySelector('#aside_feed .category.active');
	if (active_cat) {
		let cat = active_cat;
		do cat = cat.nextElementSibling;
		while (cat && cat.getAttribute('data-unread') <= 0);
		if (cat) {
			delayedClick(cat.querySelector('a.tree-folder-title'));
		}
	} else {
		first_category();
	}
}

function first_category() {
	const a = document.querySelector('#aside_feed .category:not([data-unread="0"]) a.tree-folder-title');
	delayedClick(a);
}

function last_category() {
	const links = document.querySelectorAll('#aside_feed .category:not([data-unread="0"]) a.tree-folder-title');
	if (links && links.length > 0) {
		delayedClick(links[links.length - 1]);
	}
}

function collapse_entry() {
	const flux_current = document.querySelector('.flux.current');
	toggleContent(flux_current, flux_current, false);
}

function toggle_media() {
	const media = document.querySelector('.flux.current video,.flux.current audio');
	if (media === null) {
		return;
	}
	if (media.paused) {
		media.play();
	} else {
		media.pause();
	}
}

function user_filter(key) {
	const filter = document.getElementById('dropdown-query');
	const filters = filter.parentElement.querySelectorAll('.dropdown-menu > .query > a');
	if (typeof key === 'undefined') {
		if (!filters.length) {
			return;
		}
		// Display the filter div
		location.hash = filter.id;
		// Force scrolling to the filter div
		const scroll = needsScroll(document.querySelector('.header'));
		if (scroll !== 0) {
			document.scrollingElement.scrollTop = scroll;
		}
		// Force the key value if there is only one action, so we can trigger it automatically
		if (filters.length === 1) {
			key = 1;
		} else {
			return;
		}
	}
	// Trigger selected share action
	key = parseInt(key);
	if (key <= filters.length) {
		filters[key - 1].click();
	}
}

function show_labels_menu(el) {
	const div = el.parentElement;
	const dropdownMenu = div.querySelector('.dropdown-menu');

	if (!dropdownMenu || forceReloadLabelsList) {
		if (dropdownMenu) {
			dropdownMenu.nextElementSibling.remove();
			dropdownMenu.remove();
		}

		const templateId = 'labels_article_template';
		const template = document.getElementById(templateId).innerHTML;
		div.insertAdjacentHTML('beforeend', template);

		loadDynamicTags(div.closest('.dynamictags'));
	}
	return true;
}

function show_share_menu(el) {
	const div = el.parentElement;
	const dropdownMenu = div.querySelector('.dropdown-menu');

	if (!dropdownMenu) {
		const itemId = el.closest('.flux').dataset.entry;
		const templateId = 'share_article_template';
		const id = itemId;
		const flux_header_el = el.closest('.flux');
		const title_el = flux_header_el.querySelector('.item.titleAuthorSummaryDate .item-element.title');
		const websiteName = ' - ' + flux_header_el.querySelector('.flux_header').dataset.websiteName;
		const articleAuthors = flux_header_el.querySelector('.flux_header').dataset.articleAuthors;
		let articleAuthorsText = '';
		if (articleAuthors.trim().length > 0) {
			articleAuthorsText = ' (' + articleAuthors + ')';
		}
		const link = title_el.href;
		const title = title_el.textContent;
		const titleText = title;
		const template = document.getElementById(templateId).innerHTML
			.replace(/--entryId--/g, id)
			.replace(/--link--/g, link)
			.replace(/--titleText--/g, titleText)
			.replace(/--websiteName--/g, websiteName)
			.replace(/--articleAuthors--/g, articleAuthorsText);

		div.insertAdjacentHTML('beforeend', template);
	}
	return true;
}

function mylabels(key) {
	const mylabelsDropdown = document.querySelector('.flux.current.active .dropdown-target[id^="dropdown-labels"]');

	if (!mylabelsDropdown) {
		return;
	}

	if (typeof key === 'undefined') {
		show_labels_menu(mylabelsDropdown);
	}
	// Display the mylabels div
	location.hash = mylabelsDropdown.id;
	// Force scrolling to the mylabels div
	const scrollTop = needsScroll(mylabelsDropdown.closest('.horizontal-list'));
	if (scrollTop !== 0) {
		if (mylabelsDropdown.closest('.horizontal-list.flux_header')) {
			mylabelsDropdown.nextElementSibling.nextElementSibling.scrollIntoView({ behavior: "smooth", block: "start" });
		} else {
			mylabelsDropdown.nextElementSibling.nextElementSibling.scrollIntoView({ behavior: "smooth", block: "end" });
		}
	}

	key = parseInt(key);

	if (key === 0) {
		mylabelsDropdown.parentElement.querySelector('.dropdown-menu .item .newTag').focus();
	} else {
		const mylabelsCheckboxes = mylabelsDropdown.parentElement.querySelectorAll('.dropdown-menu .item .checkboxTag');

		if (key <= mylabelsCheckboxes.length) {
			mylabelsCheckboxes[key].click();
		}
	}
}

function auto_share(key) {
	const share = document.querySelector('.flux.current.active .dropdown-target[id^="dropdown-share"]');
	if (!share) {
		return;
	}
	const shares = share.parentElement.querySelectorAll('.dropdown-menu .item [data-type]');
	if (typeof key === 'undefined') {
		show_share_menu(share);

		// Display the share div
		location.hash = share.id;
		// Force scrolling to the share div
		const scrollTop = needsScroll(share.closest('.horizontal-list'));
		if (scrollTop !== 0) {
			if (share.closest('.horizontal-list.flux_header')) {
				share.nextElementSibling.nextElementSibling.scrollIntoView({ behavior: "smooth", block: "start" });
			} else {
				share.nextElementSibling.nextElementSibling.scrollIntoView({ behavior: "smooth", block: "end" });
			}
		}
		// Force the key value if there is only one action, so we can trigger it automatically
		if (shares.length === 1) {
			key = 1;
		} else {
			return;
		}
	}
	// Trigger selected share action and hide the share div
	key = parseInt(key);
	if (key <= shares.length) {
		shares[key - 1].click();
		share.parentElement.querySelector('.dropdown-menu + a.dropdown-close').click();
	}
}

let box_to_follow;

function onScroll() {
	if (!box_to_follow) {
		return;
	}
	if (context.auto_mark_scroll) {
		const hidden_px = -5; // negative = pixels over the edge
		const minTop = hidden_px + box_to_follow.scrollTop;
		document.querySelectorAll('.not_read:not(.keep_unread)').forEach(function (div) {
			if (div.offsetHeight > 0 &&
					div.offsetParent.offsetTop + div.offsetTop + div.offsetHeight < minTop) {
				mark_read(div, true, true);
			}
		});
	}
	let streamFooter;
	if (context.auto_load_more && (streamFooter = document.getElementById('stream-footer'))) {
		if (box_to_follow.offsetHeight > 0 &&
			box_to_follow.scrollTop + box_to_follow.offsetHeight + (window.innerHeight / 2) >= streamFooter.offsetTop) {
			// Too close to the last pre-loaded article
			load_more_posts();
		} else {
			const after = document.querySelectorAll('.flux.current ~ .flux').length;
			if (after > 0 && after <= 5) {
				// Too few pre-loaded articles
				load_more_posts();
			}
		}
	}
}

let lastScroll = 0;	// Throttle
let timerId = 0;
function debouncedOnScroll() {
	clearTimeout(timerId);
	if (lastScroll + 500 < Date.now()) {
		lastScroll = Date.now();
		onScroll();
	} else {
		timerId = setTimeout(onScroll, 500);
	}
}

function init_posts() {
	if (context.auto_load_more || context.auto_mark_scroll || context.auto_remove_article) {
		box_to_follow = context.current_view === 'global' ? document.getElementById('panel') : document.scrollingElement;
		(box_to_follow === document.scrollingElement ? window : box_to_follow).onscroll = debouncedOnScroll;
		window.addEventListener('resize', debouncedOnScroll);
		onScroll();
	}

	if (!navigator.share && document.styleSheets.length > 0) {
		// https://developer.mozilla.org/en-US/docs/Web/API/Navigator/share
		// do not show the menu entry if browser does not support navigator.share
		document.styleSheets[0].insertRule(
			'button.as-link[data-type="web-sharing-api"] {display: none !important;}',
			document.styleSheets[0].cssRules.length
		);
	}
}

function rememberOpenCategory(category_id, isOpen) {
	if (context.display_categories === 'remember') {
		const open_categories = JSON.parse(localStorage.getItem('FreshRSS_open_categories') || '{}');
		if (isOpen) {
			open_categories[category_id] = true;
		} else {
			delete open_categories[category_id];
		}
		localStorage.setItem('FreshRSS_open_categories', JSON.stringify(open_categories));
	}
}

function openCategory(category_id) {
	const category_element = document.getElementById(category_id);
	if (!category_element) return;
	category_element.querySelector('.tree-folder-items').classList.add('active');
	const img = category_element.querySelector('button.dropdown-toggle img');
	if (!img) return;
	img.src = img.src.replace('/icons/down.', '/icons/up.');
	img.alt = '🔼';
}

function loadJs(name) {
	if (!document.getElementById(name)) {
		const script = document.createElement('script');
		script.setAttribute('id', name);
		script.setAttribute('src', '../scripts/' + name + '?' + context.mtime[name]);
		script.setAttribute('defer', 'defer');
		script.setAttribute('async', 'async');
		document.head.appendChild(script);
	}
}

function init_column_categories() {
	if (context.current_view !== 'normal' && context.current_view !== 'reader') {
		return;
	}

	// Restore sidebar scroll position
	document.getElementById('sidebar').scrollTop = +sessionStorage.getItem('FreshRSS_sidebar_scrollTop');

	// Restore open categories
	if (context.display_categories === 'remember') {
		const open_categories = JSON.parse(localStorage.getItem('FreshRSS_open_categories') || '{}');
		Object.keys(open_categories).forEach(function (category_id) {
			openCategory(category_id);
		});
	}

	document.getElementById('aside_feed').onclick = function (ev) {
		let a = ev.target.closest('.tree-folder > .tree-folder-title > button.dropdown-toggle');
		if (a) {
			const icon = a.querySelector('.icon');
			const category_id = a.closest('.category').id;
			if (icon.alt === '🔽' || icon.innerHTML === '🔽') {
				if (icon.src) {
					icon.src = icon.src.replace('/icons/down.', '/icons/up.');
					icon.alt = '🔼';
				} else {
					icon.innerHTML = '🔼';
				}
				rememberOpenCategory(category_id, true);
			} else {
				if (icon.src) {
					icon.src = icon.src.replace('/icons/up.', '/icons/down.');
					icon.alt = '🔽';
				} else {
					icon.innerHTML = '🔽';
				}
				rememberOpenCategory(category_id, false);
			}

			const ul = a.closest('li').querySelector('.tree-folder-items');
			let nbVisibleItems = 0;
			for (let i = ul.children.length - 1; i >= 0; i--) {
				if (ul.children[i].offsetHeight) {
					nbVisibleItems++;
				}
			}
			ul.classList.toggle('active');
			// CSS transition does not work on max-height:auto
			ul.style.maxHeight = ul.classList.contains('active') ? (nbVisibleItems * 4) + 'em' : 0;
			return false;
		}

		a = ev.target.closest('.tree-folder-items > .feed .dropdown-toggle');
		if (a) {
			const div = a.parentElement;
			const dropdownMenu = div.querySelector('.dropdown-menu');

			if (!dropdownMenu) {
				loadJs('extra.js');
				loadJs('feed.js');
				const itemId = a.closest('.item').id;
				const templateId = itemId.substring(0, 2) === 't_' ? 'tag_config_template' : 'feed_config_template';
				const id = itemId.substr(2);
				const feed_web = a.getAttribute('data-fweb') || '';
				const template = document.getElementById(templateId)
					.innerHTML.replace(/------/g, id).replace('http://example.net/', feed_web);
				div.insertAdjacentHTML('beforeend', template);
				if (feed_web == '') {
					const website = div.querySelector('.item.link.website');
					if (website) {
						website.remove();
					}
				}
				const b = div.querySelector('button.confirm');
				if (b) {
					b.disabled = false;
				}
			}
			return true;
		}

		return true;
	};
}

function init_shortcuts() {
	Object.keys(context.shortcuts).forEach(function (k) {
		context.shortcuts[k] = (context.shortcuts[k] || '').toUpperCase();
		if (context.shortcuts[k].indexOf('&') >= 0) {
			// Decode potential HTML entities <'&">
			const parser = new DOMParser();
			context.shortcuts[k] = parser.parseFromString(context.shortcuts[k], 'text/html').documentElement.textContent;
		}
	});

	document.addEventListener('keydown', ev => {
		if (ev.ctrlKey || ev.metaKey || (ev.altKey && ev.shiftKey) || ev.target.closest('input, select, textarea')) {
			return;
		}

		const s = context.shortcuts;
		let k = (ev.key.trim() || ev.code || 'Space').toUpperCase();

		// IE11
		if (k === 'SPACEBAR') k = 'SPACE';
		else if (k === 'DEL') k = 'DELETE';
		else if (k === 'ESC') k = 'ESCAPE';

		if (location.hash.match(/^#dropdown-/)) {
			const n = parseInt(k);
			if (Number.isInteger(n)) {
				switch (location.hash.substring(0, 15)) {
					case '#dropdown-query':
						user_filter(n);
						break;
					case '#dropdown-share':
						auto_share(n);
						break;
					case '#dropdown-label':
						mylabels(n);
						break;
					default:
						return;
				}
				ev.preventDefault();
				return;
			}
		}
		if (k === s.actualize) {
			const btn = document.getElementById('actualize');
			if (btn) {
				btn.click();
			}
			ev.preventDefault();
			return;
		}
		if (k === s.next_entry) {
			if (ev.altKey) {
				next_category();
			} else if (ev.shiftKey) {
				next_feed();
			} else {
				next_entry(false);
			}
			ev.preventDefault();
			return;
		}
		if (k === s.next_unread_entry) {
			if (ev.altKey) {
				next_unread_category();
			} else if (ev.shiftKey) {
				next_feed();
			} else {
				next_unread_entry(false);
			}
			ev.preventDefault();
			return;
		}
		if (k === s.prev_entry) {
			if (ev.altKey) {
				prev_category();
			} else if (ev.shiftKey) {
				prev_feed();
			} else {
				prev_entry(false);
			}
			ev.preventDefault();
			return;
		}
		if (k === s.mark_read) {
			if (ev.altKey) {
				mark_previous_read(document.querySelector('.flux.current'));
			} else if (ev.shiftKey) {
				document.querySelector('.nav_menu .read_all').click();
			} else {	// Toggle the read state
				mark_read(document.querySelector('.flux.current'), false, false);
			}
			ev.preventDefault();
			return;
		}
		if (k === s.first_entry) {
			if (ev.altKey) {
				first_category();
			} else if (ev.shiftKey) {
				first_feed();
			} else {
				const old_active = document.querySelector('.flux.current');
				const first = document.querySelector('.flux');
				if (first.classList.contains('flux')) {
					toggleContent(first, old_active, false);
				}
			}
			ev.preventDefault();
			return;
		}
		if (k === s.last_entry) {
			if (ev.altKey) {
				last_category();
			} else if (ev.shiftKey) {
				last_feed();
			} else {
				const old_active = document.querySelector('.flux.current');
				const last = document.querySelector('.flux:last-of-type');
				if (last.classList.contains('flux')) {
					toggleContent(last, old_active, false);
				}
			}
			ev.preventDefault();
			return;
		}
		if (ev.key === '?') {
			window.location.href = context.urls.shortcuts.replace(/&amp;/g, '&');
			return;
		}

		if (ev.altKey || ev.shiftKey) {
			return;
		}
		if (k === s.mark_favorite) {	// Toggle the favorite state
			mark_favorite(document.querySelector('.flux.current'));
			ev.preventDefault();
			return;
		}
		if (k === s.go_website) {
			if (context.auto_mark_site) {
				mark_read(document.querySelector('.flux.current'), true, false);
			}

			const link_go_website = document.querySelector('.flux.current a.go_website');
			if (link_go_website) {
				window.open(link_go_website.href, '_blank', 'noopener');
				ev.preventDefault();
			}
			return;
		}
		if (k === s.skip_next_entry) { next_entry(true); ev.preventDefault(); return; }
		if (k === s.skip_prev_entry) { prev_entry(true); ev.preventDefault(); return; }
		if (k === s.collapse_entry) { collapse_entry(); ev.preventDefault(); return; }
		if (k === s.mylabels) { mylabels(); ev.preventDefault(); return; }
		if (k === s.auto_share) { auto_share(); ev.preventDefault(); return; }
		if (k === s.user_filter) { user_filter(); ev.preventDefault(); return; }
		if (k === s.load_more) { load_more_posts(); ev.preventDefault(); return; }
		if (k === s.close_dropdown) { location.hash = null; ev.preventDefault(); return; }
		if (k === s.help) { window.open(context.urls.help); ev.preventDefault(); return; }
		if (k === s.focus_search) { document.getElementById('search').focus(); ev.preventDefault(); return; }
		if (k === s.normal_view) { delayedClick(document.querySelector('#nav_menu_views .view-normal')); ev.preventDefault(); return; }
		if (k === s.reading_view) { delayedClick(document.querySelector('#nav_menu_views .view-reader')); ev.preventDefault(); return; }
		if (k === s.global_view) { delayedClick(document.querySelector('#nav_menu_views .view-global')); ev.preventDefault(); return; }
		if (k === s.toggle_media) { toggle_media(); ev.preventDefault(); }
	});
}

function init_stream(stream) {
	stream.onclick = function (ev) {
		let el = ev.target.closest('.flux a.read');
		if (el) {
			mark_read(el.closest('.flux'), false, false);
			return false;
		}

		el = ev.target.closest('.flux a.bookmark');
		if (el) {
			mark_favorite(el.closest('.flux'));
			return false;
		}

		el = ev.target.closest('.item a.title');
		if (el) {	// Allow default control/command-click behaviour such as open in background-tab
			return ev.ctrlKey || ev.metaKey;
		}

		el = ev.target.closest('.flux .content .text a');
		if (el) {
			if (!el.closest('div').classList.contains('author')) {
				el.target = '_blank';
				el.rel = 'noreferrer';
			}
			return true;
		}

		el = ev.target.closest('.item.labels a.dropdown-toggle');
		if (el) {
			return show_labels_menu(el);
		}

		el = ev.target.closest('.item.share a.dropdown-toggle');
		if (el) {
			return show_share_menu(el);
		}

		el = ev.target.closest('.item.share > button[data-type="print"]');
		if (el) {	// Print
			const tmp_window = window.open();
			for (let i = 0; i < document.styleSheets.length; i++) {
				tmp_window.document.writeln('<link href="' + document.styleSheets[i].href + '" rel="stylesheet" type="text/css" />');
			}
			const flux_content = el.closest('.flux_content');
			let content_el = null;
			if (flux_content) {
				content_el = el.closest('.flux_content').querySelector('.content');
			}
			if (content_el === null) {
				content_el = el.closest('.flux').querySelector('.flux_content .content');
			}
			loadLazyImages(content_el);
			tmp_window.document.writeln(content_el.innerHTML);
			tmp_window.document.close();
			tmp_window.focus();
			tmp_window.print();
			tmp_window.close();
			return false;
		}

		el = ev.target.closest('.item.share > button[data-type="clipboard"]');
		if (el) { // Clipboard
			if (navigator.clipboard) {
				navigator.clipboard.writeText(el.dataset.url)
					.then(() => {
						toggleClass(el, 'ok');
					})
					.catch(e => {
						console.log(e);
						toggleClass(el, 'error');
					});
			} else {
				// fallback, if navigator.clipboard is not available f.e. if access is not via https or localhost
				const inputElement = document.createElement('input');
				inputElement.value = el.dataset.url;
				document.body.appendChild(inputElement);
				inputElement.select();
				if (document.execCommand && document.execCommand('copy')) {
					toggleClass(el, 'ok');
				} else {
					console.log('document.execCommand("copy") failed');
					toggleClass(el, 'error');
				}
				inputElement.remove();
			}

			return false;
		}

		el = ev.target.closest('.item.share > button[data-type="web-sharing-api"]');
		if (el && navigator.share) {	// https://developer.mozilla.org/en-US/docs/Web/API/Navigator/share
			const shareData = {
				url: el.dataset.url,
				title: decodeURI(el.dataset.title),
			};
			navigator.share(shareData);
			return false;
		}

		el = ev.target.closest('.item.share > a[data-type="email-webmail-firefox-fix"]');
		if (el) {
			window.open(el.href);
			return false;
		}

		el = ev.target.closest('.item.share > a[href="POST"]');
		if (el) {	// Share by POST
			const f = el.parentElement.querySelector('form');
			f.disabled = false;
			f.submit();
			return false;
		}

		el = ev.target.closest('.flux_header, .flux_content');
		if (el) {	// flux_toggle
			if (ev.target.closest('.reader, .content, .item.website, .item.link, .dropdown')) {
				return true;
			}
			if ((!context.sides_close_article && ev.target.matches('.flux_content')) || ev.target.closest('footer')) {
				// setting for not-closing after clicking outside article area
				return false;
			}
			const old_active = document.querySelector('.flux.current');
			const new_active = el.parentNode;
			if (ev.target.tagName.toUpperCase() === 'A') {	// Leave real links alone (but does not catch img in a link)
				if (context.auto_mark_article) {
					mark_read(new_active, true, false);
				}
				return true;
			}
			toggleContent(new_active, old_active, false);
			return false;
		}
	};

	stream.onmouseup = function (ev) {	// Mouseup enables us to catch middle click, and control+click in IE/Edge
		if (ev.altKey || ev.metaKey || ev.shiftKey) {
			return;
		}

		let el = ev.target.closest('.item a.title');
		if (el) {
			if (ev.which == 1) {
				if (ev.ctrlKey) {	// Control+click
					if (context.auto_mark_site) {
						mark_read(el.closest('.flux'), true, false);
					}
				} else {
					el.parentElement.click();	// Normal click, just toggle article.
				}
			} else if (ev.which == 2 && !ev.ctrlKey) {	// Simple middle click: same behaviour as CTRL+click
				if (context.auto_mark_article) {
					const new_active = el.closest('.flux');
					mark_read(new_active, true, false);
				}
			}
			return;
		}

		if (context.auto_mark_site) {
			// catch mouseup instead of click so we can have the correct behaviour
			// with middle button click (scroll button).
			el = ev.target.closest('.flux .link > a');
			if (el) {
				if (ev.which == 3) {
					return;
				}
				mark_read(el.closest('.flux'), true, false);
			}
		}
	};

	stream.onchange = function (ev) {
		const checkboxTag = ev.target.closest('.checkboxTag');
		if (checkboxTag) {	// Dynamic tags
			ev.stopPropagation();
			const tagId = checkboxTag.name.replace(/^t_/, '');
			const tagName = checkboxTag.nextElementSibling ? checkboxTag.nextElementSibling.childNodes[0].value : '';
			if ((tagId == 0 && tagName.length > 0) || tagId != 0) {
				const isChecked = checkboxTag.checked;
				const entry = checkboxTag.closest('div.flux');
				const entryId = entry.id.replace(/^flux_/, '');
				checkboxTag.disabled = true;

				const req = new XMLHttpRequest();
				req.open('POST', './?c=tag&a=tagEntry&ajax=1', true);
				req.responseType = 'json';
				req.onerror = function (e) {
					checkboxTag.checked = !isChecked;
					badAjax(this.status == 403);
				};
				req.onload = function (e) {
					if (this.status != 200) {
						return req.onerror(e);
					}
					if (entry.classList.contains('not_read')) {
						incUnreadsTag('t_' + tagId, isChecked ? 1 : -1);
					}
				};
				req.onloadend = function (e) {
					checkboxTag.disabled = false;
					if (tagId == 0) {
						// new tag is added
						forceReloadLabelsList = true;
						loadDynamicTags(checkboxTag.closest('div.dropdown'));
					} else {
						// a tag was (un)checked
						const dropdownmenu_current = ev.target.closest('.dropdown-menu');
						const flux = ev.target.closest('.flux');
						const dropdownmenu_all = flux.querySelectorAll('.dynamictags .dropdown-menu');
						if (dropdownmenu_all.length > 1) {
							// delete all other tag dropdown menus except the current one
							dropdownmenu_all.forEach(
								function (currentValue) {
									if (currentValue !== dropdownmenu_current) {
										currentValue.nextElementSibling.remove();
										currentValue.parentNode.removeChild(currentValue);
									}
								}
							);
						}
					}
				};
				req.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
				req.send(JSON.stringify({
					_csrf: context.csrf,
					id_tag: tagId,
					name_tag: tagId == 0 ? tagName : '',
					id_entry: entryId,
					checked: isChecked,
					ajax: 1,
				}));
			}
		}
	};
}

function toggleClass(el, cssclass) {
	el.classList.remove(cssclass);
	el.dataset.foo = el.offsetWidth; // it does nothing, but it is needed. See https://github.com/FreshRSS/FreshRSS/pull/5295
	el.classList.add(cssclass);
}

function init_nav_entries() {
	const nav_entries = document.getElementById('nav_entries');
	if (nav_entries) {
		nav_entries.querySelector('.previous_entry').onclick = function (e) {
			prev_entry(false);
			return false;
		};
		nav_entries.querySelector('.next_entry').onclick = function (e) {
			next_entry(false);
			return false;
		};
		nav_entries.querySelector('.up').onclick = function (e) {
			const active_item = (document.querySelector('.flux.current') || document.querySelector('.flux'));
			const windowTop = document.scrollingElement.scrollTop;
			const item_top = active_item.offsetParent.offsetTop + active_item.offsetTop;

			const nav_menu = document.querySelector('.nav_menu');
			let nav_menu_height = 0;

			if (getComputedStyle(nav_menu).position === 'fixed' || getComputedStyle(nav_menu).position === 'sticky') {
				nav_menu_height = nav_menu.offsetHeight;
			}
			document.scrollingElement.scrollTop = windowTop > item_top ? item_top - nav_menu_height : 0 - nav_menu_height;
			return false;
		};
	}
}

// forceReloadLabelsList default is false, so that the list does need a reload after opening it a second time.
// will be set to true, if a new tag is added. Then the labels list will be reloaded each opening.
// purpose of this flag: minimize the network traffic.
let forceReloadLabelsList = false;

function loadDynamicTags(div) {
	div.querySelectorAll('li.item').forEach(function (li) { li.remove(); });
	const entryId = div.closest('div.flux').id.replace(/^flux_/, '');

	const req = new XMLHttpRequest();
	req.open('GET', './?c=tag&a=getTagsForEntry&id_entry=' + entryId, true);
	req.responseType = 'json';
	req.onerror = function (e) {
		div.querySelectorAll('li.item').forEach(function (li) { li.remove(); });
	};
	req.onload = function (e) {
		if (this.status != 200) {
			return req.onerror(e);
		}
		const json = xmlHttpRequestJson(this);
		if (!json) {
			return req.onerror(e);
		}

		if (!context.anonymous) {
			const li_item0 = document.createElement('li');
			li_item0.setAttribute('class', 'item addItem');

			const label = document.createElement('label');
			label.setAttribute('class', 'noHover');

			const input_checkboxTag = document.createElement('input');
			input_checkboxTag.setAttribute('class', 'checkboxTag checkboxNewTag');
			input_checkboxTag.setAttribute('name', 't_0');
			input_checkboxTag.setAttribute('type', 'checkbox');

			const input_newTag = document.createElement('input');
			input_newTag.setAttribute('type', 'text');
			input_newTag.setAttribute('name', 'newTag');
			input_newTag.setAttribute('class', 'newTag');
			input_newTag.setAttribute('list', 'datalist-labels');
			input_newTag.addEventListener('keydown', function (ev) { if (ev.key.toUpperCase() == 'ENTER') { this.parentNode.previousSibling.click(); } });

			const button_btn = document.createElement('button');
			button_btn.setAttribute('type', 'button');
			button_btn.setAttribute('class', 'btn');
			button_btn.addEventListener('click', function () { this.parentNode.parentNode.click(); });

			const text_plus = document.createTextNode('+');

			const div_stick = document.createElement('div');
			div_stick.setAttribute('class', 'stick');

			button_btn.appendChild(text_plus);
			div_stick.appendChild(input_newTag);
			div_stick.appendChild(button_btn);
			label.appendChild(input_checkboxTag);
			label.appendChild(div_stick);
			li_item0.appendChild(label);

			div.querySelector('.dropdown-menu-scrollable').appendChild(li_item0);
		}

		let html = '';
		let datalist = '';
		if (json && json.length) {
			let nbLabelsChecked = 0;
			for (let i = 0; i < json.length; i++) {
				const tag = json[i];
				if (context.anonymous && !tag.checked) {
					// In anomymous mode, show only the used tags
					continue;
				}
				if (tag.checked) {
					nbLabelsChecked++;
				}
				html += '<li class="item"><label><input ' +
					(context.anonymous ? '' : 'class="checkboxTag" ') +
					'name="t_' + tag.id + '"type="checkbox" ' +
					(context.anonymous ? 'disabled="disabled" ' : '') +
					(tag.checked ? 'checked="checked" ' : '') + '/>' + tag.name + '</label></li>';
				datalist += '<option value="' + tag.name + '"></option>';
			}
			if (context.anonymous && nbLabelsChecked === 0) {
				html += '<li class="item"><span class="emptyLabels">' + context.i18n.labels_empty + '</span></li>';
			}
		}
		div.querySelector('.dropdown-menu-scrollable').insertAdjacentHTML('beforeend', html);
		const datalistLabels = document.getElementById('datalist-labels');
		datalistLabels.innerHTML = ''; // clear before add the (updated) labels list
		datalistLabels.insertAdjacentHTML('beforeend', datalist);
	};
	req.send();
}

// <actualize>
let feeds_processed = 0;
let categories_processed = 0;
let to_process = 0;

function refreshFeed(feeds, feeds_count) {
	const feed = feeds.pop();
	if (!feed) {
		return;
	}
	const req = new XMLHttpRequest();
	req.open('POST', feed.url, true);
	req.onloadend = function (e) {
		feeds_processed++;
		if (this.status != 200) {
			badAjax(false);
		} else {
			const div = document.getElementById('actualizeProgress');
			div.querySelector('.progress').innerHTML = (categories_processed + feeds_processed) + ' / ' + to_process;
			div.querySelector('.title').innerHTML = feed.title;
		}
		if (feeds_processed === feeds_count) {
			// Empty request to commit new articles
			const req2 = new XMLHttpRequest();
			req2.open('POST', './?c=feed&a=actualize&id=-1&ajax=1', true);
			req2.onloadend = function (e) {
				delayedFunction(function () { location.reload(); });
			};
			req2.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
			req2.send(JSON.stringify({
				_csrf: context.csrf,
				noCommit: 0,
			}));
		} else {
			refreshFeed(feeds, feeds_count);
		}
	};
	req.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
	req.send(JSON.stringify({
		_csrf: context.csrf,
		noCommit: 1,
	}));
}

function refreshFeeds(json) {
	feeds_processed = 0;
	if (!json.feeds || json.feeds.length === 0) {
		// Empty request to commit new articles
		const req2 = new XMLHttpRequest();
		req2.open('POST', './?c=feed&a=actualize&id=-1&ajax=1', true);
		req2.onloadend = function (e) {
			context.ajax_loading = false;
		};
		req2.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
		req2.send(JSON.stringify({
			_csrf: context.csrf,
			noCommit: 0,
		}));
	} else {
		const feeds_count = json.feeds.length;
		for (let i = context.nb_parallel_refresh; i > 0; i--) {
			refreshFeed(json.feeds, feeds_count);
		}
	}
}

function refreshDynamicOpml(categories, categories_count, next) {
	const category = categories.pop();
	if (!category) {
		return;
	}
	const req = new XMLHttpRequest();
	req.open('POST', category.url, true);
	req.onloadend = function (e) {
		categories_processed++;
		if (this.status != 200) {
			badAjax(false);
		} else {
			const div = document.getElementById('actualizeProgress');
			div.querySelector('.progress').innerHTML = (categories_processed + feeds_processed) + ' / ' + to_process;
			div.querySelector('.title').innerHTML = category.title;
		}
		if (categories_processed === categories_count) {
			if (next) { next(); }
		} else {
			refreshDynamicOpml(categories, categories_count, next);
		}
	};
	req.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
	req.send(JSON.stringify({
		_csrf: context.csrf,
		noCommit: 1,
	}));
}

function refreshDynamicOpmls(json, next) {
	categories_processed = 0;
	if (json.categories && json.categories.length > 0) {
		const categories_count = json.categories.length;
		for (let i = context.nb_parallel_refresh; i > 0; i--) {
			refreshDynamicOpml(json.categories, categories_count, next);
		}
	} else {
		if (next) { next(); }
	}
}

function init_actualize() {
	let auto = false;
	let nbCategoriesFirstRound = 0;
	let skipCategories = false;

	const actualize = document.getElementById('actualize');
	if (!actualize) {
		return;
	}

	actualize.onclick = function () {
		if (context.ajax_loading) {
			return false;
		}
		context.ajax_loading = true;

		const req = new XMLHttpRequest();
		req.open('POST', './?c=javascript&a=actualize', true);
		req.responseType = 'json';
		req.onload = function (e) {
			if (this.status != 200) {
				return badAjax(false);
			}
			const json = xmlHttpRequestJson(this);
			if (!json) {
				return badAjax(false);
			}
			if (auto && json.categories.length < 1 && json.feeds.length < 1) {
				auto = false;
				context.ajax_loading = false;
				return false;
			}
			to_process = json.categories.length + json.feeds.length + nbCategoriesFirstRound;
			if (json.categories.length + json.feeds.length > 0 && !document.getElementById('actualizeProgress')) {
				document.body.insertAdjacentHTML('beforeend', '<div id="actualizeProgress" class="notification good">' +
					json.feedback_actualize + '<br /><span class="title">/</span><br /><span class="progress">0 / ' +
					to_process + '</span></div>');
			} else {
				openNotification(json.feedback_no_refresh, 'good');
			}
			if (json.categories.length > 0 && !skipCategories) {
				skipCategories = true;	// To avoid risk of infinite loop
				nbCategoriesFirstRound = json.categories.length;
				// If some dynamic OPML categories are refreshed, need to reload the list of feeds before updating them
				refreshDynamicOpmls(json, () => {
					context.ajax_loading = false;
					actualize.click();
				});
			} else {
				refreshFeeds(json);
			}
		};
		req.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
		req.send(JSON.stringify({
			_csrf: context.csrf,
		}));

		return false;
	};

	if (context.auto_actualize_feeds) {
		auto = true;
		actualize.click();
	}
}
// </actualize>

// <notification>
let notification = null;
let notification_interval = null;
let notification_working = false;

function openNotification(msg, status) {
	if (notification_working === true) {
		return false;
	}
	notification_working = true;
	notification.querySelector('.msg').innerHTML = msg;
	notification.className = 'notification';
	notification.classList.add(status);
	if (status == 'good') {
		notification_interval = setTimeout(closeNotification, 4000);
	} else {
		// no status or f.e. status = 'bad', give some more time to read
		notification_interval = setTimeout(closeNotification, 8000);
	}
}

function closeNotification() {
	notification.classList.add('closed');
	clearInterval(notification_interval);
	notification_working = false;
}

function init_notifications() {
	notification = document.getElementById('notification');

	notification.querySelector('.close').addEventListener('click', function (ev) {
		closeNotification();
		ev.preventDefault();
		return false;
	});

	notification.addEventListener('mouseenter', function () {
		clearInterval(notification_interval);
	});

	notification.addEventListener('mouseleave', function () {
		notification_interval = setTimeout(closeNotification, 3000);
	});

	if (notification.querySelector('.msg').innerHTML.length > 0) {
		notification_working = true;
		if (notification.classList.contains('good')) {
			notification_interval = setTimeout(closeNotification, 4000);
		} else {
			// no status or f.e. status = 'bad', give some more time to read
			notification_interval = setTimeout(closeNotification, 8000);
		}
	}
}
// </notification>

// <notifs html5>
let notifs_html5_permission = 'denied';

function notifs_html5_is_supported() {
	return window.Notification !== undefined;
}

function notifs_html5_ask_permission() {
	try {
		window.Notification.requestPermission(function () {
			notifs_html5_permission = window.Notification.permission;
		});
	} catch (e) {
	}
}

function notifs_html5_show(nb, nb_new) {
	if (notifs_html5_permission !== 'granted') {
		return;
	}

	try {
		const notification = new window.Notification(context.i18n.notif_title_articles, {
			icon: '../themes/icons/favicon-256-padding.png',
			body: context.i18n.notif_body_new_articles.replace('%%d', nb_new) + ' ' + context.i18n.notif_body_unread_articles.replace('%%d', nb),
			tag: 'freshRssNewArticles',
		});

		notification.onclick = function () {
			delayedFunction(function () {
				location.reload();
				window.focus();
				notification.close();
			});
		};

		if (context.html5_notif_timeout !== 0) {
			setTimeout(function () {
				notification.close();
			}, context.html5_notif_timeout * 1000);
		}
	} catch (e) {
	}
}

function init_notifs_html5() {
	if (!notifs_html5_is_supported()) {
		return;
	}

	notifs_html5_permission = notifs_html5_ask_permission();
}
// </notifs html5>

function refreshUnreads() {
	const req = new XMLHttpRequest();
	req.open('GET', './?c=javascript&a=nbUnreadsPerFeed', true);
	req.responseType = 'json';
	req.onload = function (e) {
		const json = xmlHttpRequestJson(this);
		if (!json) {
			return badAjax(false);
		}
		const isAll = document.querySelector('.category.all.active');
		let new_articles = false;
		let nbUnreadFeeds = 0;
		const title = document.querySelector('.category.all .title');
		const nb_unreads_before = title ? str2int(title.getAttribute('data-unread')) : 0;

		Object.keys(json.feeds).forEach(function (feed_id) {
			const nbUnreads = json.feeds[feed_id];
			nbUnreadFeeds += nbUnreads;
			feed_id = 'f_' + feed_id;
			const elem = document.getElementById(feed_id);
			const feed_unreads = elem ? str2int(elem.getAttribute('data-unread')) : 0;

			if ((incUnreadsFeed(null, feed_id, nbUnreads - feed_unreads) || isAll) &&	// Update of current view?
					(nbUnreads - feed_unreads > 0)) {
				const newArticle = document.getElementById('new-article');
				newArticle.removeAttribute('hidden');
				newArticle.style.display = 'block';
				new_articles = true;
			}
		});

		const noArticlesToShow_div = document.getElementById('noArticlesToShow');
		if (nbUnreadFeeds > 0 && noArticlesToShow_div) {
			noArticlesToShow_div.classList.add('hide');
		}

		let nbUnreadTags = 0;

		Object.keys(json.tags).forEach(function (tag_id) {
			const nbUnreads = json.tags[tag_id];
			nbUnreadTags += nbUnreads;
			const tag = document.getElementById('t_' + tag_id);
			if (tag) {
				tag.setAttribute('data-unread', nbUnreads);
				tag.querySelector('.item-title').setAttribute('data-unread', numberFormat(nbUnreads));
			}
		});

		const tags = document.querySelector('.category.tags');
		if (tags) {
			tags.setAttribute('data-unread', nbUnreadTags);
			tags.querySelector('.title').setAttribute('data-unread', numberFormat(nbUnreadTags));
		}

		const nb_unreads = title ? str2int(title.getAttribute('data-unread')) : 0;

		if (nb_unreads > 0 && new_articles) {
			faviconNbUnread(nb_unreads);
			const nb_new = nb_unreads - nb_unreads_before;
			notifs_html5_show(nb_unreads, nb_new);
		}
	};
	req.send();
}

function toggle_bigMarkAsRead_button() {
	const bigMarkAsRead_button = document.getElementById('bigMarkAsRead');
	if (bigMarkAsRead_button) {
		if (document.querySelector('.flux.not_read') != null) {
			bigMarkAsRead_button.style = '';
			bigMarkAsRead_button.querySelector('.markAllRead').style.visibility = '';
		} else {
			if (bigMarkAsRead_button.querySelector('.jumpNext')) {
				bigMarkAsRead_button.querySelector('.markAllRead').style.visibility = 'hidden';
			} else {
				bigMarkAsRead_button.querySelector('.markAllRead').style.visibility = '';
				bigMarkAsRead_button.style.visibility = 'hidden';
			}
		}
	}
}

// <endless_mode>
let url_load_more = '';
let load_more = false;
let box_load_more = null;

function remove_existing_posts() {
	document.querySelectorAll('.flux, .day').forEach(function (div) {
		div.remove();
	});
}

function load_more_posts() {
	if (load_more || !url_load_more || !box_load_more) {
		return;
	}
	load_more = true;
	document.getElementById('load_more').classList.add('loading');

	const req = new XMLHttpRequest();
	req.open('GET', url_load_more, true);
	req.responseType = 'document';
	req.onload = function (e) {
		if (context.sort === 'rand') {
			document.scrollingElement.scrollTop = 0;
			remove_existing_posts();
		}

		const html = this.response;
		const streamFooter = document.getElementById('stream-footer');

		const streamAdopted = document.adoptNode(html.getElementById('stream'));
		streamAdopted.querySelectorAll('.flux, .day').forEach(function (div) {
			box_load_more.insertBefore(div, streamFooter);
		});

		const streamFooterOld = streamFooter.querySelector('.stream-footer-inner');
		const streamFooterNew = streamAdopted.querySelector('.stream-footer-inner');
		streamFooter.replaceChild(streamFooterNew, streamFooterOld);

		const bigMarkAsRead = document.getElementById('bigMarkAsRead');
		const readAll = document.querySelector('#nav_menu_read_all .read_all');
		if (readAll && bigMarkAsRead && bigMarkAsRead.formAction) {
			if (context.display_order === 'ASC') {
				readAll.formAction = bigMarkAsRead.formAction;
			} else {
				bigMarkAsRead.formAction = readAll.formAction;
			}
			toggle_bigMarkAsRead_button();
		}

		document.querySelectorAll('[id^=day_]').forEach(function (div) {
			const ids = document.querySelectorAll('[id="' + div.id + '"]');
			for (let i = ids.length - 1; i > 0; i--) {	// Keep only the first
				ids[i].remove();
			}
		});

		init_load_more(box_load_more);

		const div_load_more = document.getElementById('load_more');
		if (bigMarkAsRead) {
			bigMarkAsRead.removeAttribute('disabled');
		}
		if (div_load_more) {
			div_load_more.classList.remove('loading');
		}

		load_more = false;
	};
	req.send();
}

const freshrssLoadMoreEvent = document.createEvent('Event');
freshrssLoadMoreEvent.initEvent('freshrss:load-more', true, true);

function init_load_more(box) {
	box_load_more = box;
	document.body.dispatchEvent(freshrssLoadMoreEvent);

	const next_button = document.getElementById('load_more');
	if (!next_button) {
		// no more article to load
		url_load_more = '';
		return;
	}

	url_load_more = next_button.getAttribute('formaction');

	next_button.onclick = function (e) {
		load_more_posts();
		return false;
	};
}
// </endless_mode>

function init_confirm_action() {
	document.body.onclick = function (ev) {
		const b = ev.target.closest('.confirm');
		if (b) {
			let str_confirmation = this.getAttribute('data-str-confirm');
			if (!str_confirmation) {
				str_confirmation = context.i18n.confirmation_default;
			}
			return confirm(str_confirmation);
		}
	};
	document.querySelectorAll('button.confirm').forEach(function (b) { b.disabled = false; });
}

function faviconNbUnread(n) {
	if (typeof n === 'undefined') {
		const t = document.querySelector('.category.all .title');
		n = t ? str2int(t.getAttribute('data-unread')) : 0;
	}
	// http://remysharp.com/2010/08/24/dynamic-favicons/
	const canvas = document.createElement('canvas');
	const link = document.getElementById('favicon').cloneNode(true);
	const ratio = window.devicePixelRatio;
	if (canvas.getContext && link) {
		canvas.height = canvas.width = 16 * ratio;
		const img = document.createElement('img');
		img.onload = function () {
			const ctx = canvas.getContext('2d');
			ctx.drawImage(this, 0, 0, canvas.width, canvas.height);
			if (n > 0) {
				let text = '';
				if (n < 1000) {
					text = n;
				} else if (n < 100000) {
					text = Math.floor(n / 1000) + 'k';
				} else {
					text = 'E' + Math.floor(Math.log10(n));
				}
				ctx.font = 'bold ' + 9 * ratio + 'px "Arial", sans-serif';
				ctx.fillStyle = 'rgba(255, 255, 255, 0.8)';
				ctx.fillRect(0, 7 * ratio, ctx.measureText(text).width, 9 * ratio);
				ctx.fillStyle = '#F00';
				ctx.fillText(text, 0, canvas.height - 1);
			}
			link.href = canvas.toDataURL('image/png');
			// Check if data URI has generated a real favicon and if not, fallback to standard icon
			if (link.href.length > 180) {
				document.querySelector('link[rel~=icon]').remove();
				document.head.appendChild(link);
			}
		};
		img.src = '../favicon.ico';
	}
}

function removeFirstLoadSpinner() {
	const first_load = document.getElementById('first_load');
	if (first_load) {
		first_load.remove();
	}
}

function init_normal() {
	const stream = document.getElementById('stream');
	if (!stream) {
		if (window.console) {
			console.log('FreshRSS waiting for content…');
		}
		setTimeout(init_normal, 100);
		return;
	}
	init_column_categories();
	init_stream(stream);
	init_actualize();
	faviconNbUnread();

	window.onbeforeunload = function (e) {
		const sidebar = document.getElementById('sidebar');
		if (sidebar) {	// Save sidebar scroll position
			sessionStorage.setItem('FreshRSS_sidebar_scrollTop', sidebar.scrollTop);
		}
		if (mark_read_queue && mark_read_queue.length > 0) {
			return false;
		}
	};
}

function init_main_beforeDOM() {
	history.scrollRestoration = 'manual';
	document.scrollingElement.scrollTop = 0;
	init_shortcuts();
	if (['normal', 'reader', 'global'].indexOf(context.current_view) >= 0) {
		init_normal();
	}
}

function init_main_afterDOM() {
	removeFirstLoadSpinner();
	init_notifications();
	init_confirm_action();
	const stream = document.getElementById('stream');
	if (stream) {
		init_load_more(stream);
		init_posts();
		if (document.getElementById('new-article')) {
			// Only relevant for interactive views
			init_nav_entries();
			init_notifs_html5();
			toggle_bigMarkAsRead_button();
			setTimeout(faviconNbUnread, 1000);
			setInterval(refreshUnreads, 120000);
		}
	}

	if (window.console) {
		console.log('FreshRSS main init done.');
	}
}

init_main_beforeDOM();	// Can be called before DOM is fully loaded

if (document.readyState && document.readyState !== 'loading') {
	init_main_afterDOM();
} else {
	if (window.console) {
		console.log('FreshRSS waiting for DOMContentLoaded…');
	}
	document.addEventListener('DOMContentLoaded', init_main_afterDOM, false);
}
// @license-end

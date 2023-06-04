var m_es = new Array("de enero", "de febrero", "de marzo", "de abril", "de mayo", "de junio", "de julio", "de agosto", "de septiembre", "de octubre", "de noviembre", "de diciembre");
var m_ca = new Array("de gener", "de febrer", "de mar\u00E7", "d'abril", "de maig", "de juny", "de juliol", "d'agost", "de setembre", "d'octubre", "de novembre", "de desembre");
var m_en = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
var m_fr = new Array("janvier", "f\u00E9vrier", "mars", "avril", "mai", "juin", "juillet", "ao\u00FBt", "septembre", "octobre", "novembre", "d\u00E9cembre");
var m_de = new Array("Januar", "Februar", "M\u00E4rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");
var m_pt = new Array("Janeiro", "Fevereiro", "Mar\u00E7o", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
var m_it = new Array("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");
var m_gl = new Array("Xeneiro", "Febreiro", "Marzo", "Abril", "Maio", "Xu\u00F1o", "Xullo", "Agosto", "Setembro", "Octubro", "Novembro", "Decembro");
var m_eu = new Array("Urtarila", "Otsaila", "Martxoa", "Apirila", "Maiatza", "Ekaina", "Uztaila", "Abuztua", "Iraila", "Urria", "Azaroa", "Abendua");
var s_es = new Array("Domingo", "Lunes", "Martes", "Mi\u00E9rcoles", "Jueves", "Viernes", "S\u00E1bado");
var s_ca = new Array("Diumenge", "Dilluns", "Dimarts", "Dimecres", "Dijous", "Divendres", "Dissabte");
var s_en = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
var s_fr = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
var s_de = new Array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
var s_pt = new Array("Domingo", "Segunda-feira", "Ter\u00E7a-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "S\u00E1bado");
var s_it = new Array("Domenica", "Luned\u00EC", "Marted\u00EC", "Mercoled\u00EC", "Gioved\u00EC", "Venerd\u00EC", "Sabato");
var s_gl = new Array("Domingo", "Luns", "Martes", "Mercores", "Xoves", "Venres", "S\u00E1bato");
var s_eu = new Array("Igandea", "Astelehena", "Asteartea", "Asteazkena", "Osteguna", "Ostirala", "Larunbata");
var ladata = new Date(), mes = ladata.getMonth(), dia = ladata.getDay(), numero = ladata.getDate(), any = ladata.getYear();
var random = getRandom(), timestamp = getTimestamp(), timestampCode = timestamp + random, dataExp = new Date(3000, 1, 1);
if (any < 1000) any = any + 1900;
date_es = s_es[dia] + ", " + numero + " " + m_es[mes];
date_ca = s_ca[dia] + ", " + numero + " " + m_ca[mes];
date_en = s_en[dia] + ", " + numero + " " + m_en[mes];
date_fr = s_fr[dia] + ", " + numero + " " + m_fr[mes];
date_de = s_de[dia] + ", " + numero + " " + m_de[mes];
date_pt = s_pt[dia] + ", " + numero + " " + m_pt[mes];
date_it = s_it[dia] + ", " + numero + " " + m_it[mes];
date_gl = s_gl[dia] + ", " + numero + " " + m_gl[mes];
date_eu = s_eu[dia] + ", " + numero + " " + m_eu[mes];

/* NeoCommon library */
var NeoCommon = (function() {
	var _domain, _sitename;

	function getVariableFromURL(name) {
		name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
		var regexS = "[\\?&]" + name + "=([^&#]*)";
		var regex = new RegExp(regexS);
		var results = regex.exec(window.location.href);
		if (results == null)
			return "";
		else
			return results[1];
	};

	function getSiteName() {
		if (!_sitename) {
			_sitename = window.location.pathname.split("/")[1];
		}
		return _sitename;
	};

	function getBuscadorUrl(_url) {
		var url = _url ? _url : "/aplnr/buscador/index_es.html";
		switch (this.getSiteName()) {
			case "empresa":
				url += "?landing=empresas&q=";
				break;
			default:
				url += "?q=";
				break;
		}
		return url;
	}

	function getPrebuscadorUrl(_url, query) {
		var url = _url ? _url : "/aplnr/prebuscador/index_es.html";
		switch (this.getSiteName()) {
			case "empresa":
				url += "?landing=empresas&q=" + query;
				break;
			default:
				url += "?q=" + query;
				break;
		}
		return url;
	}

	function getDomain() {
		if (typeof _domain === "undefined") {
			var subDomain = window.location.hostname;
			if(subDomain.indexOf("www") !== -1 )
				subDomain = subDomain.replace(/[0-9]+/,"").replace("www.","");
			subDomain = subDomain.replace("pre.","").replace("pinternet.","").replace("..",".");
			subDomain = subDomain.indexOf(".") === 0 ? subDomain : "." + subDomain;
			_domain = subDomain;
		}
		return _domain;
	}

	function deleteCookie(name, value, domain){
		var dom = domain ? domain : this.getDomain();
		console.log(dom);
		document.cookie = name + "=" + (value || "")  + "; expires= Thu, 01 Jan 1970 00:00:01 GMT; domain=" + dom + ";path=/;";
	}

	function setCookie(name, value, domain, expDays, sameSite, path){
		var val = value ? value : "";
		var dom = domain ? domain : this.getDomain();
		var p = path ? path : "/";
		var same = sameSite ? sameSite : "Lax";
		var exp = expDays ? ";expires=" + new Date(Date.now() + (expDays * 24 * 60 * 60 * 1000)).toUTCString() : "";
		document.cookie = name + "=" + val + exp + ";domain=" + dom + ";path="+ p +";SameSite=" + same;
	}

	return {
		getSiteName:getSiteName,
		getBuscadorUrl:getBuscadorUrl,
		getPrebuscadorUrl:getPrebuscadorUrl,
		deleteCookie:deleteCookie,
		getDomain:getDomain,
		setCookie:setCookie
	}
})();

/* COMMON FUNCTIONS */
function subtractDatesInDays(date1, date2) {
	return date1 - date2 / (1000 * 60 * 60 * 24);
}

function SetCookie(na, va, da, d, pa) {
	document.cookie = na + "=" + escape(va) + (da ? ";expires=" + da.toGMTString(da.getTime()) : "") + ";Domain=" + (d ? d : NEO.getDomain()) + ";Path=" + (pa ? pa : "/") + ";secure";
}

function GetCookie(na) {
	fo = new RegExp(na + "=([^;]*)").exec(document.cookie);
	if (na == "sipublic") fo = new RegExp(na + "=([^!]*)").exec(document.cookie);
	if (fo) return unescape(fo[1])
	return null;
}

function getRandom() {
	var raR = "R" + Math.random();
	var ra = raR.substring(3, 7);
	return (ra);
}

function getTimestamp() {
	var nw = new Date();
	var y = "" + nw.getYear();
	var m = 1 + nw.getUTCMonth();
	var d = nw.getUTCDate();
	var H = nw.getUTCHours();
	var M = nw.getUTCMinutes();
	var S = nw.getUTCSeconds();
	m = (m > 9 ? "" + m : "0" + m);
	d = (d > 9 ? "" + d : "0" + d);
	H = (H > 9 ? "" + H : "0" + H);
	M = (M > 9 ? "" + M : "0" + M);
	S = (S > 9 ? "" + S : "0" + S);
	return (y + m + d + H + M + S);
}

function writit(id, text) {
	if (document.getElementById) {
		x = document.getElementById(id);
		x.innerHTML = '';
		x.innerHTML = text;
	} else if (document.all) {
		x = document.all[id];
		x.innerHTML = text;
	}
}

function PopIt(u, H, W) {
	var options = 'width=400,height=400,toolbar=0,directories=0,status=0,location=0, menubar=0, scrollbars=1, resizable=1';
	if (H && W) {
		options = 'toolbar=0,directories=0,status=0,location=0, menubar=0, scrollbars=0 resizable=1, width=' + parseInt(W) + ', height=' + parseInt(H);
	}
	window.open(u, '', options);
	return false
}

function pops(u, fi, no) {
	if (fi == undefined) return PopIt(u, 390, 610);
	if ((fi == "tipoA") || (fi == "tipoB") || (fi == "tipoC") || (fi == "tipoF")) {
		window.open(u)
	}
	if (fi == "tipoD") {
		window.open(u, "", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,height=470,width=770")
	}
	if (fi == "tipoE") {
		window.open(u, "Servicaixa", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,height=390,width=610")
	}
	if (fi == "condi") {
		window.open(u, no, "toolbar=yes,width=758,height=500,left=0,top=0,scrollbars=yes")
	}
	if (fi == "tipoG") {
		remoto = window.open(u, "", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,height=460,width=460");
		if (remoto.opener == null) remoto.opener = window;
		remoto.opener.parent.name = "frameprin";
	}
}

function MM_openBrWindow(u, n, f) {
	window.open(u, n, f);
}

function getparam(nom) {
	var params = (location.search.substring(1, location.search.length)).split('&');
	for (var i = 0; i < params.length; i++) {
		var pos = params[i].indexOf("=");
		var name = params[i].substring(0, pos);
		var value = params[i].substring(pos + 1);
		if (nom == name) return value;
	}
	return false;
}

function url_modificada() {
	if (window.location.protocol == "http:") window.location = location.href.replace(/^http:/, 'https:');
}

function digestText(tin, ml) {
	var t = tin.toUpperCase();
	var o = '';
	for (var i = 0;
		 (i < t.length) && (ml > 0); i++) {
		var a = t.charAt(i);
		if ((a <= 'Z') && (a >= 'A')) {
			o += a;
			ml--;
		}
	}
	return o;
}

function callUtagLink(jsonVariavel) {
	var mapUtagLink = {"caixabank-web":126,"caixabank-web-new":2,"Caixabank-corporativo":3,"caixabank-corporativo-new":1};
	//var mapUtagLink = {"caixabank-web-new":2,"Caixabank-corporativo":3,"caixabank-corporativo-new":1};
	var listOfKey = Object.keys(mapUtagLink);
	var i = 0;
	var lengthOfScript = 0;

	for (i = 0 ; i < listOfKey.length ; i++) {
		lengthOfScript = $('script')
			.filter(function() {
				return this.outerHTML.match(listOfKey[i]);
			});
		if (lengthOfScript.length > 0) {
			if (typeof utag !== "undefined" && typeof utag.link !== "undefined")
				utag.link(jsonVariavel,null,[mapUtagLink[listOfKey[i]]]);
		}
	}
}

if(typeof listVideosClickPlay === "undefined")
	listVideosClickPlay = [];

if(typeof clickEventVideo === "undefined") {
	function clickEventVideo(description, systemId) {
		if (listVideosClickPlay.length === 0 || listVideosClickPlay.indexOf(systemId) < 0) {
			listVideosClickPlay.push(systemId);
			if (typeof neoEventSC !== "undefined")
				neoEventSC('', 'video,click en play,' + description + ' ' + systemId);
		}
	}
}

function doSILO() {
	if (GetCookie('refSTC')) {
		var head = document.getElementById('header');
		var headSi = document.createElement('div');
		headSi.setAttribute('id','si-container');
		headSi.className = 'sr-only';
		head.insertBefore(headSi,head.childNodes[0]);
		/*writit('si-container', '<iframe src="https://lo.lacaixa.es/GPeticiones?PN=SEI&PE=4&DEMO=0&CANAL=I&IDIOMA=02&SESION=0" id="cabLO" name="cabLO" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" style="width:100%;height:59px;top:0;left:0;margin:0;padding:0;overflow:hidden; border:0;"></iframe>');*/
		writit('si-container', '<iframe src="https://lo.lacaixa.es/GPeticiones?PN=SEI&PE=4&DEMO=0&CANAL=I&IDIOMA=02&SESION=0" id="cabLO" name="cabLO" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" style="display: none;"></iframe>');
		document.getElementById('header').className += " lo";
	}
}

function addLoadEvent(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
			oldonload();
			func();
		}
	}
}

addLoadEvent(doSILO);

function parsea_url() {
	var as = document.getElementsByTagName('A');
	for (var i = 0; i < as.length; i++) {
		var loce = as[i].getAttribute('loce');
		var rel = as[i].getAttribute('rel');
		if (rel > '') loce = rel;
		if (loce > '') {
			var talt = (as[i].getAttribute('title'));
			if (talt) {
				loce = loce + '-' + digestText(talt, 15);
			}
			var link = (as[i].getAttribute('href'));
			if (link.indexOf('?') > 0) link += '&loce=' + loce;
			else link += '?loce=' + loce;
			as[i].setAttribute('href', link);
		}
	}
}

if (!String.prototype.endsWith) {
	String.prototype.endsWith = function(searchString, position) {
		var subjectString = this.toString();
		if (typeof position !== 'number' || !isFinite(position) || Math.floor(position) !== position || position > subjectString.length) {
			position = subjectString.length;
		}
		position -= searchString.length;
		var lastIndex = subjectString.indexOf(searchString, position);
		return lastIndex !== -1 && lastIndex === position;
	};
}

if (typeof window.isMobile === 'undefined') {
	function isMobile(){
		pc= navigator.userAgent.match(/(Windows\ NT|\(Macintosh)/i);
		tablet=!(pc)&&(navigator.userAgent.match(/Android\ 3\.|\(Windows\ NT|\(Macintosh|Playbook|Pad|Tab|xoom|sch-i[89]|SM-T[0-9]|GT-P[0-9]|Nexus 1[0-9]|Nexus [7-9]|Kindle|Android .* Chrome\/[\.0-9]* [^M]/i));
		mobile=!(pc)&&!(tablet)&&((/(Android\ [12456789]\.|mobile|phone|ipod|meego|blackberry|midp|pocket|symbian)/i).test(navigator.userAgent));
		return mobile;
	}
}

document.addEventListener('DOMContentLoaded', function() {
	var goBackButton = document.getElementById('footer');
	if (typeof insertAdjacentHTML !== 'undefined') {
		goBackButton.insertAdjacentHTML('beforebegin', '<div class="container-fluid bg-white"><div class="container"><div class="row"><div class="col-xs-12 center-block"><div class="articulo_ligero"><div class="contenido_articulo"><div id="button_back"><a onclick="history.go(-1)" alt="volver" href="#">Volver</a></div></div></div>');
	}
});
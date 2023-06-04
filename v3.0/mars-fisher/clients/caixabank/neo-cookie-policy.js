var NeoCookiePolicy = (function() {

    'use strict';

    var config = {
        ACCEPT_COOKIE: "cookie_aceptacion",
        ACCEPT_COOKIE_MESSAGE: "cookie_message",
        COOKIE_POLICY_NAME: "cookiePolicy"
    };

    // when loaded it executes init
    // DISABLED: currently there's no need to run NeoCookiePolicy
    // init();

    function showGradually() {
        return true;
    }

    // DISABLED: replaced by a dummy "showGradually" that returns true
    function xShowGradually() {
        if (checkAcceptCookieIsActive()) {
            // doest not show form
            return false;
        } else {
            // show form
            return true;
        }
    }

    function checkAcceptCookieIsActive() {
        if (hasAcceptCookies() && !acceptCookieExpiresInXDays(options.acceptCookieExpireThresholdDays)) {
            return true;
        } else {
            return false;
        }
    }

    function enableOrDisableCookiePolicy() {
        if (checkAcceptCookieIsActive()) {
            // disables cookie policy as all components are allowed and must be presented.
            // i.e: CookiePolicy.isAllowedComponent() will return true
            CookiePolicy.disableCookiePolicy();
        } else {
            // enables cookie policy as some components may not be allowed and should not be presented.
            // i.e: CookiePolicy.isAllowedComponent() may return false
            CookiePolicy.enableCookiePolicy();
        }
    }

    function hasAcceptCookies() {
        var acceptCookie = getCookie(config.ACCEPT_COOKIE);
        var messageCookie = getCookie(config.ACCEPT_COOKIE_MESSAGE);

        return acceptCookie !== null && messageCookie !== null;
    }

    function getAcceptCookiesExpirationDate() {
        return new Date(2018, 9, 30);
    }

    function acceptCookieExpiresInXDays(thresholdDays) {
        var acceptCookieExpirationDate = getAcceptCookiesExpirationDate();
        var daysDiff = subtractDatesInDays(acceptCookieExpirationDate, new Date());

        return daysDiff < thresholdDays;
    }

    function subtractDatesInDays(date1, date2) {
        return (date1 - date2) / (1000 * 60 * 60 * 24);
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(nameEQ) == 0) {
                return c.substring(nameEQ.length,c.length);
            }
        }
        return null;
    }

    function cookiePolicyExists() {
        return getCookie(config.COOKIE_POLICY_NAME) != null;
    }

    function init() {
        enableOrDisableCookiePolicy();
    }

    // ---------------------------------------------------------------------------

    function isCookiePolicyActive() {
        if(window.isCookiePoliceActive !== undefined){
            return isCookiePoliceActive;
        }
        return false;
    }
    
    function copy2Domain(url) {
		try {
			if(location.host.toLocaleLowerCase().endsWith(".cat")){
				//Build URL 
				var gdprCookie = getCookie('cookiePolicy');
				gdprCookie = encodeURIComponent(gdprCookie);
				var cookieSetterTool = url + '?gdprCookie=' +gdprCookie;				 
				//Load request
				$( "body" ).append($('<iframe src="'+cookieSetterTool+'" frameborder="0" scrolling="no" id="copyCookieDomain"></iframe>'));
			}
		}catch(err) {
			console.log(err.message);
		}		    
    }

    return {
        showGradually: showGradually,
        isCookiePolicyActive: isCookiePolicyActive,
        cookiePolicyExists: cookiePolicyExists,
        copy2Domain : copy2Domain
    }

})();
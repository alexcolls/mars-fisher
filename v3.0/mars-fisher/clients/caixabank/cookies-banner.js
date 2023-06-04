var defaultHtmlHandler = (function() {
    "use strict";

    var config = {
        selectors: {
            acceptButtonSelector: "#cookies-accept-full",
            denyButtonSelector: "#cookies-deny",
            moreInfoButtonSelector: "#cookies-more-info",
            cookieFormSelector: "#cookie-form"
        }
    };

    function getCookieFormDiv() {
        var lightArticleElem = $(config.selectors.cookieFormSelector).parents(".articulo_ligero");
        var cookieFormDiv = $(config.selectors.cookieFormSelector).parent().parent();

        return lightArticleElem.length > 0 ? lightArticleElem : cookieFormDiv;
    }

    function showCookieForm() {
        getCookieFormDiv().show();
    }

    function hideCookieForm() {
        getCookieFormDiv().hide();
    }

    function acceptFullPolicy(buttonName) {
        CookiePolicy.buildPolicy(cookiesBanner.getCatalogUrl(), true, [])
            .then(function() {
            cookiesBanner.doTealiumCall(buttonName).then(function() {
                cookiesBanner.createMustShowFormExecutedSessionCookie();
                cookiesBanner.createVoyageridCookie();
                cookiesBanner.copy2Domain();
            });
        }, function(error) {
            renderErrorDiv();
        });
    }

    // TODO: change this
    function renderErrorDiv() {
        var errorMessage = "No se han podido guardar tus preferencias sobre privacidad. Vuélvelo a intentar más tarde, por favor."
        var errorHtml = "<div id='cookie-banner-error-message'>" + errorMessage + "&nbsp;&nbsp;&nbsp;<span class='close-button'>x</span></div>";
        getCookieFormDiv().html(errorHtml);

        $("#cookie-banner-error-message .close-button").on("click", function(e) {
            $("#cookie-banner-error-message").parent().hide();
        });
    }


    function registerEvents() {
        $(config.selectors.acceptButtonSelector).on("click", function(e) {
            acceptFullPolicy($(config.selectors.acceptButtonSelector).children().attr("data-ref-origin"));
        });


        $(config.selectors.moreInfoButtonSelector + ", " + config.selectors.denyButtonSelector)
            .on("click", function(e) {
            var url = $(e.target).prop("href");
            e.preventDefault();
            cookiesBanner.openMoreInfoPage(url);
        });
    }

    return {
        hideCookieForm: hideCookieForm,
        showCookieForm: showCookieForm,
        registerEvents: registerEvents,
    }

})();

var iframeHtmlHandler = (function() {

    "use strict";

    var config = {
        selectors: {
            iframeSelector: "iframe.cboxIframe",
            acceptButtonSelector: "#cookies-accept-full",
            denyButtonSelector: "#cookies-deny",
            moreInfoButtonSelector: "#cookies-more-info",
            cookieFormSelector: "#link_cookies a.cboxElement"
        }
    };

    function getCookieFormDiv() {
        var lightArticleElem = $(config.selectors.cookieFormSelector).parents(".articulo_ligero");
        var cookieFormDiv = $(config.selectors.cookieFormSelector).parent().parent();

        return lightArticleElem.length > 0 ? lightArticleElem : cookieFormDiv;
    }

    function colorboxCookies(cookieFormSelector) {
        $(cookieFormSelector).colorbox({
            open: true,
            iframe: true,
            transition: "fade",
            className: "popupCookies",
            closeButton: false,
            onComplete: function() {
                $('#colorbox').addClass('noClose').css("position", "fixed");
                $(config.selectors.iframeSelector).on('load', function() {
                    registerEventsAfterIframeIsLoaded();
                });

            },
            onClosed: function() {
                $('#colorbox').removeClass('noClose');
            }
        });

    }

    function showCookieForm() {
        if ($(config.selectors.cookieFormSelector).length > 0) {
            colorboxCookies(config.selectors.cookieFormSelector);
        }
    }

    function hideCookieForm() {
        // nothing to do
    }

    function registerEvents() {
        // nothing to do
    }

    function registerEventsAfterIframeIsLoaded() {
        var acceptButton = $(config.selectors.iframeSelector)
            .contents()
            .find(config.selectors.acceptButtonSelector);

        acceptButton.on("click", function(e) {
            acceptFullPolicy(acceptButton.children().attr("data-ref-origin"));
        });


        $(config.selectors.iframeSelector)
            .contents()
            .find(config.selectors.moreInfoButtonSelector + ", " + config.selectors.denyButtonSelector)
            .on("click", function(e) {
            var url = $(e.target).prop("href");
            e.preventDefault();
            cookiesBanner.openMoreInfoPage(url);
        });


    }

    function acceptFullPolicy(buttonName) {
        CookiePolicy.buildPolicy(cookiesBanner.getCatalogUrl(), true, [])
            .then(function() {
            cookiesBanner.doTealiumCall(buttonName).then(function() {
                cookiesBanner.createMustShowFormExecutedSessionCookie();
                cookiesBanner.createVoyageridCookie();
                cookiesBanner.copy2Domain();
            });
        }, function(error) {
            renderErrorDiv();
        });
    }

    function renderErrorDiv() {
        var errorMessage = "No se han podido guardar tus preferencias sobre privacidad. Vuélvelo a intentar más tarde, por favor."
        var errorHtml = "<div id='cookie-banner-error-message'>" + errorMessage + "&nbsp;&nbsp;&nbsp;<span class='close-button'>x</span></div>";

        var iframeElem = $(config.selectors.iframeSelector).contents();
        iframeElem.find("body").html(errorHtml);

        iframeElem.find("#cookie-banner-error-message .close-button").on("click", function(e) {
            $(config.selectors.cookieFormSelector).colorbox.close();
        });
    }

    return {
        hideCookieForm: hideCookieForm,
        showCookieForm: showCookieForm,
        registerEvents: registerEvents
    }

})();

var cookiesBanner = (function() {

    "use strict";

    var MUST_SHOW_FORM_EXECUTED_COOKIE_NAME = "mustShowFormExecuted",
        REFERRER_COOKIE_NAME = "referrerAnalitica",
        VOYAGERID_COOKIE_NAME = "VOYAGERID",
        VOYAGERID_COOKIE_VALIDATION_DAYS = 365;

    var defaultOptions = {
        catalogUrl: "/deployedfiles/common/aplnr/cookies/_caixabank_es_cookies.json",
        htmlHandler: "defaultHtmlHandler",
        daysToReloadIfCookiePolicyWasAcceptedPartially: 30
    };

    var options = {};

    function getCatalogUrl() {
       return options.catalogUrl;
    }

    function getDomain() {
        var subDomain = window.location.hostname;

        subDomain = subDomain.replace(/[0-9]+/,"").replace("www.","").replace("pre.","").replace("pinternet.","").replace("..",".");
        subDomain = subDomain.indexOf(".") === 0 ? subDomain : "." + subDomain;

        return subDomain;
    }

    function setCookie(name, value, domain, expirationDays, sameSite) {
        var expires = "";
        if (expirationDays) {
            var date = new Date();
            date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        var sameSiteOwn=";SameSite=Lax";
        if (sameSite) {
            sameSiteOwn = ";SameSite=" + sameSite;
        }
        document.cookie = name + "=" + (value || "") + expires + ";domain=" + domain + ";path=/;" + sameSiteOwn;
    }

    function createMustShowFormExecutedSessionCookie() {
        setCookie(MUST_SHOW_FORM_EXECUTED_COOKIE_NAME, "true", getDomain(), 1);
    }

    function doTealiumCall(buttonName) {
        return CookiePolicy.getCookieCatalog(getCatalogUrl())
            .then(function(catalog) {
            var components = catalog["cookies"];
            var names = components.map(function(component) {
                return component.hasOwnProperty("siglaAnalitica") && component.siglaAnalitica !== "" ? component.siglaAnalitica : component.name;
            });

            var buttonActionName = "guardar";
            if (buttonName !== undefined) {
                buttonActionName = buttonName;
            }

            var componentsString = names.join("|");
            var cookieValue = "referrer:" + document.referrer + "|botonPulsado:" + buttonActionName + "|" + componentsString;
            if ( window.location.host.indexOf("caixabank.com") === -1)
                setCookie(REFERRER_COOKIE_NAME, cookieValue, getDomain(), 1);
            else invalidateCookie(REFERRER_COOKIE_NAME);
        });
    }

    function openMoreInfoPage(url) {
        var moreInfoPage = url;
        var thisPageUrl = window.location.href;
        var joinerChar = (moreInfoPage.indexOf("?") > -1) ? "&" : "?";
        var hashIndex = moreInfoPage.indexOf("#");
        var hash = "";

        if (hashIndex > -1) {
            hash = moreInfoPage.substring(hashIndex);
            moreInfoPage = moreInfoPage.substring(0, hashIndex);
        }

        var encodedThisPageUrl = encodeURIComponent(thisPageUrl);
        window.location = moreInfoPage + joinerChar + "originPage=" + encodedThisPageUrl + hash;
    }

    function getHtmlHandler() {
        if (options.htmlHandler === 'iframeHtmlHandler') {
            return iframeHtmlHandler;
        }
        return defaultHtmlHandler;
    }

    function createVoyageridCookie() {
        if (window.NeoCookiePolicy && NeoCookiePolicy.isCookiePolicyActive()) {
            if (CookiePolicy.isAllowedComponent('adobecampaign_LA')) {
                setCookie(VOYAGERID_COOKIE_NAME, "", getDomain(), VOYAGERID_COOKIE_VALIDATION_DAYS);
            } else {
                invalidateCookie(VOYAGERID_COOKIE_NAME);
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

    function copy2Domain() {
        if (location.host.toLocaleLowerCase().endsWith(".cat")) {
            NeoCookiePolicy.copy2Domain("https://www.caixabank.es/particular/system/cookiesetter_es.html");
            $("#copyCookieDomain").on('load', function() {
                location.reload()
            })
        } else {
            location.reload()
        }
    }

    function invalidateCookie(name) {
        CookiePolicy.invalidateCookie(name);
    }

    function init(opts) {
        $.extend(options, defaultOptions, opts);

        var htmlHandler = getHtmlHandler();

        htmlHandler.hideCookieForm();
        // see the email Miniaturas caixabank.com del buscador
        if(navigator.userAgent.indexOf("http://www.mindbreeze.com") === -1) {
            CookiePolicy.mustShowForm(getCatalogUrl(), 30, options.daysToReloadIfCookiePolicyWasAcceptedPartially).then(function (result) {
                if (result && NeoCookiePolicy.showGradually()) {
                    htmlHandler.showCookieForm();
                    htmlHandler.registerEvents();
                }
            });
        }

    }

    return {
        init: init,
        openMoreInfoPage: openMoreInfoPage,
        getCatalogUrl: getCatalogUrl,
        doTealiumCall: doTealiumCall,
        createMustShowFormExecutedSessionCookie: createMustShowFormExecutedSessionCookie,
        createVoyageridCookie: createVoyageridCookie,
        copy2Domain: copy2Domain
    }

})();
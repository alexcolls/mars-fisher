var CookiePolicy = (function() {

    'use strict';

    var _domain;
    var _catalogUrl;
    var _catalog;

    var ACCEPT_TYPES = {
        full: "completa",
        selective: "selectiva"
    };

    var FIELD_NAMES = {
        acceptType: "tipoAceptacion",
        acceptDate: "fechaAceptacion",
        domain:"domain",
        components: "componentes",
        componentId: "identificador",
        componentIsAllowed: "esAceptado",
        componentInteractionDate: "fechaInteracion",
        componentCreateDate: "fechaCreacion",
        componentUpdateDate: "lastUpdate",
        componentNeedConsent: "needConsent",
        componentPurposes: "finalidades",
        componentPurposesAccepted: "aceptado",
        componentPurposesPurpose: "finalidad"
    };

    var FIELD_NAMES_SHORT = {
        acceptType: "tA",
        acceptDate: "fA",
        domain:"dm",
        components: "c",
        componentId: "id",
        componentIsAllowed: "eA",
        componentInteractionDate: "fI",
        componentCreateDate: "fC",
        componentUpdateDate: "lU",
        componentNeedConsent: "nC",
        componentPurposes: "fs",
        componentPurposesAccepted: "a",
        componentPurposesPurpose: "f"
    };
    
    var PURPOSE_NAMES = {
        propia: {
            1: "consent_first_analysis",
            2: "consent_first_personalization"
        },
        terceros: {
            1: "consent_thirdparty_analysis",
            2: "consent_thirdparty_personalization",
            3: "consent_thirdparty_techniques",
            4: "consent_thirdparty_advertising",
            5: "consent_thirdparty_advertising_behavioral"
        }
    };

    var COOKIE_POLICY_NAME = "cookiePolicy",
        COOKIE_POLICY_ENABLED_NAME = "isCookiePolicyEnabled",
        MUST_SHOW_FORM_EXECUTED_COOKIE_NAME = "mustShowFormExecuted",
        COOKIE_POLICY_EXPIRATION_DAYS = 365,
        DEFAULT_MAX_DAYS_TO_RELOAD_IF_COOKIE_POLICY_WAS_ACCEPTED_PARTIALLY = 30,
        CAIXABANK_ES_DOMAIN = [".caixabank.es",".caixabank.cat"],
        CATALOG_URLS = window.location.origin + "/deployedfiles/common/JavaScript/aplnr/cookie/data/catalog_urls.json";

    (function initCatalogUrl() {
        getCookieCatalogURLs().then(
            function(data) {
                var hostname_split = window.location.hostname.split(".");
                for(var s = 0; s < hostname_split.length; s++) {
                    var url = data[hostname_split[s]];
                    if(url) {
                        _catalogUrl = window.location.origin + url;
                        break;
                    }
                }
            }
        );
    })();
    
    function mustShowForm(url, daysToReload, daysToReloadIfCookiePolicyWasAcceptedPartially) {
        checkDependencies();

        var deferred = $.Deferred();

        var cookiePolicy = getCookiePolicy();

        if (cookiePolicy === null) {
            deferred.resolve(true);
        } else {
            // mustShowFormExecuted cookie exists so we shouldn't show the form again
            if (hasMustShowFormExecutedSessionCookie()) {
                deferred.resolve(false);
            } else {
                if(isCookiePolicyAcceptedPartiallyAndBannerMustBeShown(cookiePolicy, daysToReloadIfCookiePolicyWasAcceptedPartially)){
                    deferred.resolve(true)
                } else {
                    checkCookiePolicyChanges(cookiePolicy, url, daysToReload)
                        .then(function (result) {
                            // if there's no changes then we can create the session cookie, so the banner is not shown for the day
                            if (result === false) {
                                createMustShowFormExecutedSessionCookie();
                            }
                            deferred.resolve(result);
                        });
                }
            }
        }

        return deferred.promise();
    }

    function isCookiePolicyAcceptedPartiallyAndBannerMustBeShown(cookiePolicy, daysToReloadIfCookiePolicyWasAcceptedPartially){
        var checkDaysToReload = false;
        if(isCookiePolicySelective(cookiePolicy)) {
            if (daysToReloadIfCookiePolicyWasAcceptedPartially === undefined || daysToReloadIfCookiePolicyWasAcceptedPartially === null) {
                daysToReloadIfCookiePolicyWasAcceptedPartially = DEFAULT_MAX_DAYS_TO_RELOAD_IF_COOKIE_POLICY_WAS_ACCEPTED_PARTIALLY;
            }

            var cookiePolicyAcceptDate = cookiePolicy[FIELD_NAMES.acceptDate];
            var currentDate = formatDate(new Date());
            checkDaysToReload = daysToReloadIfCookiePolicyWasAcceptedPartially <= subtractStringDatesInDays(currentDate, cookiePolicyAcceptDate)
        }

        return checkDaysToReload === true;
    }

    function isCookiePolicySelective(cookiePolicy){
        return cookiePolicy !== undefined && cookiePolicy!== null && cookiePolicy[FIELD_NAMES.acceptType] === ACCEPT_TYPES.selective;
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

    function checkCookiePolicyChanges(cookiePolicy, url, daysToReload) {
        return getCookieCatalog(url)
            .then(function(data) {
                var cookiePolicyAcceptDate = cookiePolicy[FIELD_NAMES.acceptDate];
                // TODO: change field name
                // var components = data[FIELD_NAMES.components];
                var components = data["cookies"];
                var currentDate = formatDate(new Date());

                for (var i = 0; i < components.length; i++) {
                    var component = components[i];

                    var newDateWithExpirationDays = formatDate(addDays(toDate(cookiePolicyAcceptDate), getCookiePolicyExpirationDays()));

                    var checkIsNew = catalogDateToDate(component[FIELD_NAMES.componentUpdateDate]) > cookiePolicyAcceptDate;
                    var checkNeedConsent = component[FIELD_NAMES.componentNeedConsent] == "S";
                    var checkDaysToReload = daysToReload <= subtractStringDatesInDays(currentDate, cookiePolicyAcceptDate);
                    var checkExpirationDate = newDateWithExpirationDays < currentDate;

                    if ((checkIsNew && (checkNeedConsent || checkDaysToReload)) || checkExpirationDate) {
                        return true;
                    }
                }

                return false;
            });
    }

    function hasMustShowFormExecutedSessionCookie() {
        return getCookie(MUST_SHOW_FORM_EXECUTED_COOKIE_NAME) !== null;
    }

    function createMustShowFormExecutedSessionCookie() {
        setCookie(MUST_SHOW_FORM_EXECUTED_COOKIE_NAME, "true", getDomain(), 1);
    }

    function formatDate(date) {
        var day = ("0" + date.getDate()).slice(-2);
        var month = ("0" + (date.getMonth() + 1)).slice(-2);
        var year = date.getFullYear();

        var hours = date.getHours();
        var minutes = date.getMinutes();

        return year + month + day + " " + hours + ":" + minutes;
    }

    function addDays(date, days) {
        var newDate = new Date(date.valueOf());
        newDate.setDate(newDate.getDate() + days);
        return newDate;
    }

    function subtractDatesInDays(date1, date2) {
        return (date1 - date2) / (1000 * 60 * 60 * 24);
    }

    function subtractStringDatesInDays(stringDate1, stringDate2) {
        var d1 = toDate(stringDate1);
        var d2 = toDate(stringDate2);
        return subtractDatesInDays(d1, d2);
    }

    function toDate(stringDate) {
        var year = stringDate.slice(0, 4);
        var month = stringDate.slice(4, 6) - 1;
        var day = stringDate.slice(6, 8);
        return new Date(year, month, day);
    }

    function catalogDateToDate(catalogDate) {
        var day = catalogDate.slice(0, 2);
        var month = catalogDate.slice(3, 5) - 1;
        var year = catalogDate.slice(6, 10);

        var hours = catalogDate.slice(11, 13);
        var minutes = catalogDate.slice(14, 16);

        return formatDate(new Date(year, month, day, hours, minutes));
    }

    function getCookiePolicyExpirationDays() {
        return COOKIE_POLICY_EXPIRATION_DAYS;
    }

    function haveDomainInCookiePolicy(domainApi){
        let listDomain = [".apistore.caixabank.com",".montedepiedad.caixabank.es"];

        return listDomain.indexOf(domainApi) !== -1 ;
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        let finalResult = null;
        for (const element of ca) {
            var c = element;
            while (c.charAt(0) == ' ') {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(nameEQ) === 0) {
                let jsonString =  c.substring(nameEQ.length,c.length);
                let domainApi = getDomain();
                if(name === COOKIE_POLICY_NAME && haveDomainInCookiePolicy(domainApi)) {
                    let jsonStringExtend = extendCookiePolicyKeys(jsonString);
                    let jsonVar =  JSON.parse( jsonStringExtend);
                    if (jsonVar.hasOwnProperty(FIELD_NAMES.domain)) {
                        if(jsonVar.domain === domainApi)
                            finalResult = jsonString;
                    }
                } else
                    finalResult = jsonString;
            }
        }
        return finalResult;
    }

    function setCookie(name, value, domain, expirationDays, sameSite) {
        var expires = "";
        if (expirationDays) {
            var date = new Date();
            date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        var sameSiteOwn=";SameSite=Strict";
        if(sameSite){
        	sameSiteOwn=";SameSite="+ sameSite ;
        }
        document.cookie = name + "=" + (value || "")  + expires + ";domain=" + domain + ";path=/;" + sameSiteOwn;
    }

    function deleteCookie(name, value, domain){
        document.cookie = name + "=" + (value || "")  + "; expires= Thu, 01 Jan 1970 00:00:01 GMT; domain=" + domain + ";path=/;";
    }

    function invalidateCookie(name){
        if(getCookie(name) !== null) {
            deleteCookie(name, "", getDomain());
        }
    }

    // ---------------------------------------------------------------------------

    function buildPolicy(url, isFull, components) {
        checkDependencies();

        var deferred = $.Deferred();

        var policyObject = {};

        var acceptType = isFull ? ACCEPT_TYPES.full : ACCEPT_TYPES.selective;
        var interactionDate = formatDate(new Date());

        policyObject[FIELD_NAMES.acceptType] = acceptType;
        policyObject[FIELD_NAMES.acceptDate] = interactionDate;
        let domainApi = getDomain();
        if(haveDomainInCookiePolicy(domainApi))
            policyObject[FIELD_NAMES.domain] = domainApi;

        getCookieCatalog(url)
            .then(function(catalog) {
                var acceptedComponents;
                // TODO: fix "cookies" field name
                // var allComponents = catalog[FIELD_NAMES.components];
                var allComponents = catalog["cookies"];

                acceptedComponents = toAcceptedComponentsMap(components);
                var policyComponents = toPolicyComponents(allComponents, isFull, acceptedComponents, interactionDate);

                policyObject[FIELD_NAMES.components] = policyComponents;

                setCookiePolicy(policyObject);

                deferred.resolve(policyObject);
            }, function(error) {
                deferred.reject("Error loading cookie catalog");
            });

        return deferred.promise();
    }

    /**
     * @param components
     * { "Tealium": [1,3], "Criteo": [1] }
     *
     * @returns
     * { "Tealium": {1: true, 3: true } }
     */
    function toAcceptedComponentsMap(components) {
        var acceptedComponents = {};

        $.each(components, function(componentObjKey, componentObjValue) {
            acceptedComponents[componentObjKey] = {};
            componentObjValue.forEach(function(purpose) {
                acceptedComponents[componentObjKey][purpose] = true;
            });
        });

        return acceptedComponents;
    }

    function toPolicyComponents(components, isFull, acceptedComponents, interactionDate) {
        var policyComponents = [];

        components.forEach(function(component) {
            var policyComponent = {};

            // the component id on the component catalog is under the key "name"
            var componentId = component.name;

            policyComponent[FIELD_NAMES.componentId] = componentId;
            policyComponent[FIELD_NAMES.componentInteractionDate] = interactionDate;
            policyComponent[FIELD_NAMES.componentPurposes] = toPolicyPurposes(component.purposes, componentId, isFull, acceptedComponents);

            policyComponents.push(policyComponent);
        });

        return policyComponents;
    }

    function toPolicyPurposes(purposes, componentId, isFull, acceptedComponents) {
        var policyPurposes = [];

        purposes.forEach(function(purpose) {
            var policyPurpose = {};
            policyPurpose[FIELD_NAMES.componentPurposesAccepted] = isAcceptedPurpose(purpose, componentId, isFull, acceptedComponents);
            policyPurpose[FIELD_NAMES.componentPurposesPurpose] = purpose;
            policyPurposes.push(policyPurpose);
        });

        return policyPurposes;
    }

    function isAcceptedPurpose(purpose, componentId, isFull, acceptedComponentsMap) {
        if (isFull) {
            return  true;
        } else {
            return acceptedComponentsMap.hasOwnProperty(componentId) && acceptedComponentsMap[componentId].hasOwnProperty(purpose);
        }
    }

    // ---------------------------------------------------------------------------

    function isAllowedComponent(componentId, isCaseInsensitive) {
        //checkDependencies();

        isCaseInsensitive = typeof isCaseInsensitive === "undefined" ? false : isCaseInsensitive;

        let apistoreExpressionRegular=/^([a-z]+.)?apistore[0-9]+.caixabank.com$/;

        if(apistoreExpressionRegular.test(window.location.host)) return true;

        var cookiePolicy = getCookiePolicy();

        // if the localstorage field "cookiePolicyEnabled" is false then all components are allowed
        // i.e cookie policy is not active so we don't check the user saved cookie policy: all components are allowed.
        if (isCookiePolicyDisabled()) {
            return true;
        }

        // if there is no cookie policy
        if (cookiePolicy === null) {
            return false;
        }

        // if its caixabank.es cookie policy keys are the long ones
        if(CAIXABANK_ES_DOMAIN.indexOf(getDomain()) !== -1 && longCookiePolicy(cookiePolicy)) {
            storeItem(COOKIE_POLICY_NAME, JSON.stringify(cutCookiePolicyKeys(cookiePolicy)));
        }

        var compareFunction = function(a, b) {
            return a === b;
        };

        if (isCaseInsensitive) {
            compareFunction = function(a, b) {
                return a.toLowerCase() === b.toLowerCase();
            }
        }

        return checkIsAllowedComponent(cookiePolicy, componentId, compareFunction);
    }

    function longCookiePolicy(cookiePolicy) {
        return typeof cookiePolicy[FIELD_NAMES_SHORT.acceptType] === 'undefined';
    }

    function cutCookiePolicyKeys(cookiePolicy) {
        var cookiePolicyString = JSON.stringify(cookiePolicy);
        var keys = Object.keys(FIELD_NAMES);
        var newCookiePolicyString = cookiePolicyString;

        for (var i = 0; i < keys.length; i++) {
            var key = keys[i];
            var reg = new RegExp(FIELD_NAMES[key], "g");
            newCookiePolicyString = newCookiePolicyString.replace(reg, FIELD_NAMES_SHORT[key]);
        }
        
        return JSON.parse(newCookiePolicyString);
    }

    function extendCookiePolicyKeys(cookiePolicy) {
        var cookiePolicyString = JSON.stringify(cookiePolicy);
        var keys = Object.keys(FIELD_NAMES_SHORT);
        var oldCookiePolicyString = cookiePolicyString;

        for (var i = 0; i < keys.length; i++) {
            var key = keys[i];
            var reg = new RegExp("\""+FIELD_NAMES_SHORT[key]+"\"", "g");
            oldCookiePolicyString = oldCookiePolicyString.replace(reg, "\""+FIELD_NAMES[key]+"\"");
        }

        return JSON.parse(oldCookiePolicyString);
    }

    function checkIsAllowedComponent(cookiePolicy, componentId, compareFunction) {
        var matchedComponent,
            purposes;

        var components = cookiePolicy[FIELD_NAMES.components];
        for (var i = 0; i < components.length; i++) {
            var component = components[i];
            if (compareFunction(component[FIELD_NAMES.componentId], componentId)) {
                matchedComponent = component;
                purposes = component[FIELD_NAMES.componentPurposes];
                // component found: exit loop
                break;
            }
        }

        if (matchedComponent && areAllPurposesAccepted(purposes)) {
            return true;
        }

        return false;
    }

    // ---------------------------------------------------------------------------

    function getCookieCatalog(url) {
        var deferred = $.Deferred();

        if (window.location.pathname === "/vgn-ext-templating/v/index.jsp")
            deferred.reject("Error loading catalog");
       else {
            if (_catalog) {
                deferred.resolve(_catalog);
            } else {
                $.ajax({
                    url: url,
                    jsonpCallback: "cookies_callback",
                    dataType: "jsonp",
                }).then(
                    function (json) {
                        _catalog = json;
                        deferred.resolve(_catalog);
                    },
                    function (error) {
                        deferred.reject("Error loading catalog");
                    }
                );
            }
        }
        return deferred.promise();
    }

    // ---------------------------------------------------------------------------

    function getCookieCatalogURLs() {
        return $.ajax({
            url: CATALOG_URLS,
            dataType: "json",
        });
    }

    // ---------------------------------------------------------------------------

    function getAllComponents() {
        var cookiePolicy = getCookiePolicy();
        if (cookiePolicy) {
            return cookiePolicy[FIELD_NAMES.components];
        } else {
            console.log("There is no saved cookie policy");
            return [];
        }
    }

    // ---------------------------------------------------------------------------

    function getAllowedComponents() {
        var cookiePolicy = getCookiePolicy();
        if (cookiePolicy) {
            var allComponents = cookiePolicy[FIELD_NAMES.components];
            return $.grep(allComponents, function(component) {
                return areAllPurposesAccepted(component[FIELD_NAMES.componentPurposes]);
            });
        } else {
            console.log("There is no saved cookie policy");
            return [];
        }
    }

    // ---------------------------------------------------------------------------


    function getRejectedComponents() {
        var cookiePolicy = getCookiePolicy();
        if (cookiePolicy) {
            var allComponents = cookiePolicy[FIELD_NAMES.components];
            return $.grep(allComponents, function(component) {
                return !areAllPurposesAccepted(component[FIELD_NAMES.componentPurposes]);
            });
        } else {
            console.log("There is no saved cookie policy");
            return [];
        }
    }

    // ---------------------------------------------------------------------------

    function areAllPurposesAccepted(purposes) {
        for (var i = 0; i < purposes.length; i++) {
            var purpuseObject = purposes[i];
            if (purpuseObject[FIELD_NAMES.componentPurposesAccepted] === false) {
                return false;
            }
        }

        return true;
    }

    // ---------------------------------------------------------------------------

    function getAllPurposes() {
        var cookiePolicy = getCookiePolicy();
        var allPurposes = {};
        
        if (cookiePolicy) {
            getAllPurposesFromCookie(cookiePolicy).then(
                function(purposes) {
                    for(var key in purposes)
                        allPurposes[key] = purposes[key];
                }
            );
        } else {
            console.log("There is no saved cookie policy");
        }

        return allPurposes;
    }

    function getAllPurposesFromCookie(cookiePolicy) {

        var deferred = $.Deferred();
        var allPurposes;

        getCookieCatalog(_catalogUrl)
            .then(function(data) {
                allPurposes = parsePurposes(data, cookiePolicy);
                deferred.resolve(allPurposes);
            }, function(error) {
                deferred.reject("Error loading cookie catalog");
            });

        return deferred.promise();
    }

    function parsePurposes(catalog, cookiePolicy) {
        var output = {};

        var catalogCookies = catalog["cookies"];
        var policyComponents = cookiePolicy[FIELD_NAMES.components];
        for(var i = 0; i < policyComponents.length; i++) {
            var purposes = policyComponents[i][FIELD_NAMES.componentPurposes];
            for(var j = 0; j < purposes.length; j++) {
                var purpose = purposes[j];
                var typo = catalogCookies[i]["typology"];
                var purp = purpose[FIELD_NAMES.componentPurposesPurpose];
                
                if(PURPOSE_NAMES[typo][purp])
                    output[PURPOSE_NAMES[typo][purp]] = purpose[FIELD_NAMES.componentPurposesAccepted];
            }
        }
        return output;
    }

    // ---------------------------------------------------------------------------

    function getStoredItem(name){
        return getCookie(name);
    }

    function storeItem(name, value) {
        var domain = getDomain();
        var expirationDays = getCookiePolicyExpirationDays();
        var sameSite ="Lax";

        setCookie(name, value, domain, expirationDays, sameSite);
    }

    function getCookiePolicy() {
        var cookiePolicyString = getStoredItem(COOKIE_POLICY_NAME);
        var cookiePolicy = cookiePolicyString ? JSON.parse(cookiePolicyString): null;

        if(cookiePolicy && longCookiePolicy(cookiePolicy) == false) {
            cookiePolicy = extendCookiePolicyKeys(cookiePolicy);
        }

        return cookiePolicy;
    }

    function setCookiePolicy(cookiePolicy) {
        // console.log("Cookie policy saved on local storage: ", cookiePolicy);
        storeItem(COOKIE_POLICY_NAME, JSON.stringify(cookiePolicy));
    }

    function enableCookiePolicy() {
        storeItem(COOKIE_POLICY_ENABLED_NAME, "true");
    }

    function disableCookiePolicy() {
        storeItem(COOKIE_POLICY_ENABLED_NAME, "false");
    }

    function isCookiePolicyDisabled() {
        var isCookiePolicyEnabled = getStoredItem(COOKIE_POLICY_ENABLED_NAME);
        return isCookiePolicyEnabled && isCookiePolicyEnabled == "false";
    }

    function checkDependencies() {
        if (typeof $ === "undefined" || typeof jQuery === "undefined") {
            throw new Error("jQuery is not available. Please include jQuery in order to use CookiePolicy module");
        }
    }

    return {
        mustShowForm: mustShowForm,
        buildPolicy: buildPolicy,
        isAllowedComponent: isAllowedComponent,
        getCookieCatalog: getCookieCatalog,
        getAllComponents: getAllComponents,
        getAllowedComponents: getAllowedComponents,
        getRejectedComponents: getRejectedComponents,
        longCookiePolicy: longCookiePolicy,
        extendCookiePolicyKeys: extendCookiePolicyKeys,
        getAllPurposes: getAllPurposes,
        getAllPurposesFromCookie: getAllPurposesFromCookie,
        getCookiePolicy: getCookiePolicy,
        enableCookiePolicy: enableCookiePolicy,
        disableCookiePolicy: disableCookiePolicy,
        invalidateCookie: invalidateCookie,
        getDomain: getDomain,
        getCookie: getCookie,
        setCookie: setCookie,
        deleteCookie: deleteCookie
    }

})();
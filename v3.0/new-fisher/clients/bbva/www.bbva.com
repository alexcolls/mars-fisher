
<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="UTF-8">
        <title>BBVA | El Banco digital del siglo XXI</title>
    <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta name="author" content="BBVA">
<meta name="owner" content="BBVA">



    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "CollectionPage",
            "publisher": {
                "@type": "Organization",
                "name": "BBVA",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/logos/bbva-logo-900x269.png",
                    "width": "900",
                    "height": "269"
                }
            },
            "sameAs": [
                "https://www.facebook.com/BBVAGroup/",
                "https://twitter.com/bbva",
                "https://www.linkedin.com/company/bbva",
                "https://www.youtube.com/channel/UCx7HhFsmIlxx9fXnMpnERbQ",
                "https://es.wikipedia.org/wiki/BBVA",
                "https://instagram.com/bbva/",
                "https://www.tiktok.com/@bbva"
            ]
        }
    </script>



<!-- Favicon -->
<link rel="shortcut icon" href="https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/favicon.ico">






            <link id="styleCss" rel="stylesheet" href="https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/css/coronita_home.css?ver=10.9.2">

<!-- CONTENT_START_ADOBE_DATALAYER -->
<script type="text/javascript">
    /*** Obtener nombre de todos los autores ***/
    var namesAuthorAdl = [];
    namesAuthorAdl[0] = 'Oscar Garcia';
    /*** Obtener id de todas las categorias ***/
    var postCategoryCodeAuxAdl = [];
    
    var adobeDataLayer = {

        entorno: "prod",
        idiomaDL: "ES",
        postType: "page",
        templatePage: "home",
        tipoPost: "",
        levelOne: "",
        adobeSlug: "",
        levelThree: "",
        postIdAdobe: "10422",
        postTitleidAdobe: "",
        postTitleAdobe: "BBVA | BANCO BBVA. Banco Digital del siglo XXI",
        postTypeAdobe: "",
        formato: "page",
        postPublishDateAdobe: "05-11-2015",
        postModifiedDateAdobe: "02-06-2023",
        postCategoryCodeAdobe: postCategoryCodeAuxAdl.join(","),
        postSignatureAdobe: "",
        postAuthorAdobe: namesAuthorAdl.join(","),
        postCountryAuthorAdobe: "",
        relatedidpostAdobe: "",
        relatedpostTitleidAdobe: "",
        relatedpostpositionAdobe: "",
        scope: "",
        idDharmaAdobe: "",
        errorPage: "",
        postCountry: "",
        proceso: ""
    };


    if (adobeDataLayer.postType == 'page' && adobeDataLayer.templatePage == 'home') {

        adobeDataLayer.tipoPost = 'home';
        adobeDataLayer.levelOne = 'home';

        /* Obtener pais de la home*/
        var auxUrlPais = window.location.href.replace(/https?:\/\/[^\/]+/i, "");
        var urlrequest = auxUrlPais.split('?')[0];
        var auxUrlPaisArray = urlrequest.split('/');

        switch (auxUrlPaisArray.length) {

            case 4:
                adobeDataLayer.adobeSlug = auxUrlPaisArray[1];
                adobeDataLayer.levelThree = auxUrlPaisArray[2];
                break;
            case 3:
                if (auxUrlPaisArray[2] == "") {

                    adobeDataLayer.adobeSlug = auxUrlPaisArray[1];
                } else {

                    adobeDataLayer.adobeSlug = auxUrlPaisArray[1];
                    adobeDataLayer.levelThree = auxUrlPaisArray[2];
                }
                break;
            case 2:
                adobeDataLayer.adobeSlug = auxUrlPaisArray[1];
                break;
            default:
                adobeDataLayer.adobeSlug = "";
                adobeDataLayer.levelThree = "";
        }
    } else if (adobeDataLayer.templatePage == 'subhome') {

        adobeDataLayer.tipoPost = 'subhome';

        switch (adobeDataLayer.levelOne) {

            case 'autores':
                // Author ID and Title
                                adobeDataLayer.postIdAdobe = "27";
                adobeDataLayer.postTitleidAdobe = "";
                adobeDataLayer.postTitleAdobe = "";
                adobeDataLayer.adobeSlug = "";
                break;
            case 'autores invitados':
                                adobeDataLayer.adobeSlug = "Oscar Garcia";
                break;
            case 'categorias':
                                // Category ID and Title
                adobeDataLayer.postType = "";
                adobeDataLayer.postTypeAdobe = "";
                adobeDataLayer.postCategoryCodeAdobe = "";
                adobeDataLayer.postAuthorAdobe = "";
                adobeDataLayer.postIdAdobe = "";
                adobeDataLayer.postCountry = '';
                adobeDataLayer.postTitleidAdobe = "";
                adobeDataLayer.postTitleAdobe = "";
                adobeDataLayer.adobeSlug = "";
                adobeDataLayer.formato = "";
                break;
            case 'destacados': //especial
                adobeDataLayer.adobeSlug = "bbva banco bbva banco digital siglo xxi";
                break;
            case 'secciones': //portadillas de seccion
                adobeDataLayer.adobeSlug = "bbva banco bbva banco digital siglo xxi";
                break;
            case 'calculadoras': //calculadoras
                adobeDataLayer.adobeSlug = "bbva banco bbva banco digital siglo xxi";
                break;
            default:
                adobeDataLayer.adobeSlug = "";
        }
    } else if (adobeDataLayer.templatePage == 'subhome1') {
        adobeDataLayer.tipoPost = 'informacion';
        adobeDataLayer.adobeSlug = "";
    } else if (adobeDataLayer.templatePage == '404') {
        adobeDataLayer.tipoPost = 'page';
        adobeDataLayer.postTitleAdobe = '';
        adobeDataLayer.postAuthorAdobe = '';
        adobeDataLayer.postCategoryCodeAdobe = '';
        adobeDataLayer.postIdAdobe = '';
        adobeDataLayer.postCountry = '';
        adobeDataLayer.postPublishDateAdobe = '';
        adobeDataLayer.postModifiedDateAdobe = '';
        adobeDataLayer.postTypeAdobe = '';
        adobeDataLayer.idiomaDL = (lang == 'ES') ? 'ES' : 'EN';
        adobeDataLayer.levelOne = 'pagina no encontrada';
        adobeDataLayer.adobeSlug = "404";
        adobeDataLayer.errorPage = "404";
        adobeDataLayer.scope = 'global';
    } else if (adobeDataLayer.templatePage == 'static-page') {
        adobeDataLayer.tipoPost = 'informacion';
        adobeDataLayer.levelOne = 'estaticos';
        adobeDataLayer.postCountry = "";
        adobeDataLayer.scope = "";
    } else if (adobeDataLayer.postType == 'page' && adobeDataLayer.templatePage == '') {
        adobeDataLayer.tipoPost = 'informacion';
        adobeDataLayer.adobeSlug = "";
    } else {
        adobeDataLayer.tipoPost = 'noticia';
        adobeDataLayer.levelOne = 'noticia';
        adobeDataLayer.adobeSlug = "";
    }
</script>
<!-- CONTENT_END_ADOBE_DATALAYER -->

<script type="text/javascript">
    window.rsConf = {
        general: {
            usePost: true
        }
    };
</script>

        <link rel="alternate" hreflang="en" href="https://www.bbva.com/en/" />
<link rel="alternate" hreflang="es" href="https://www.bbva.com/es/" />
<link rel="alternate" hreflang="es-us" href="https://www.bbva.com/es/us/" />
<link rel="alternate" hreflang="es-mx" href="https://www.bbva.com/es/mx/" />
<link rel="alternate" hreflang="es-co" href="https://www.bbva.com/es/co/" />
<link rel="alternate" hreflang="es-ar" href="https://www.bbva.com/es/ar/" />
<link rel="alternate" hreflang="es-pe" href="https://www.bbva.com/es/pe/" />
<link rel="alternate" hreflang="es-ve" href="https://www.bbva.com/es/ve/" />
<link rel="alternate" hreflang="es-uy" href="https://www.bbva.com/es/uy/" />
<link rel="alternate" hreflang="x-default" href="https://www.bbva.com/en/" />

	<!-- This site is optimized with the Yoast SEO Premium plugin  - https://yoast.com/wordpress/plugins/seo/ -->
	<meta name="description" content="BBVA te trae la mejor información sobre finanzas, innovación, tecnología, deportes, educación, emprendimiento, ... además de las mejores noticias de actualidad. BBVA.com es el banco digital del siglo XXI." />
	<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1, noarchive" />
	<link rel="canonical" href="https://www.bbva.com/es/" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="BBVA | El Banco digital del siglo XXI" />
	<meta property="og:description" content="BBVA te trae la mejor información sobre finanzas, innovación, tecnología, deportes, educación, emprendimiento, ... además de las mejores noticias de actualidad. BBVA.com es el banco digital del siglo XXI." />
	<meta property="og:url" content="https://www.bbva.com/es/" />
	<meta property="og:site_name" content="BBVA NOTICIAS" />
	<meta property="article:publisher" content="https://www.facebook.com/GrupoBBVA" />
	<meta property="article:modified_time" content="2023-06-02T05:37:11+00:00" />
	<meta property="og:image" content="https://www.bbva.com/wp-content/uploads/2015/12/ciudad-bbva-general.jpg" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@bbva" />
	<script type="application/ld+json" class="yoast-schema-graph">{"@context":"https://schema.org","@graph":[{"@type":"WebSite","@id":"https://www.bbva.com/en/#website","url":"https://www.bbva.com/en/","name":"BBVA NOTICIAS","description":"BBVA | Web Oficial, el Banco Digital del siglo XXI, Banco Bilbao Vizcaya Argentaria","potentialAction":[{"@type":"SearchAction","target":"https://search.bbva.com/bbva?searchbbvaes={search_term_string}","query-input":"required name=search_term_string"}],"inLanguage":"es"},{"@type":"WebPage","@id":"https://www.bbva.com/es/#webpage","url":"https://www.bbva.com/es/","name":"BBVA | El Banco digital del siglo XXI","isPartOf":{"@id":"https://www.bbva.com/en/#website"},"datePublished":"2015-11-05T10:52:14+00:00","dateModified":"2023-06-02T05:37:11+00:00","description":"BBVA te trae la mejor informaci\u00f3n sobre finanzas, innovaci\u00f3n, tecnolog\u00eda, deportes, educaci\u00f3n, emprendimiento, ... adem\u00e1s de las mejores noticias de actualidad. BBVA.com es el banco digital del siglo XXI.","inLanguage":"es","potentialAction":[{"@type":"ReadAction","target":["https://www.bbva.com/es/"]}]}]}</script>
	<meta name="msvalidate.01" content="B1C0E505FC3D23FAC1293F5D3B94CC32" />
	<meta name="google-site-verification" content="15NFyvQaOFp5nirBjoEZYnkWQURLSs13UUphR8ig6Ng" />
	<meta name="yandex-verification" content="2e30850741b5e48f" />
	<!-- / Yoast SEO Premium plugin. -->


<link rel='dns-prefetch' href='//www.bbva.com' />
<link rel='dns-prefetch' href='//s.w.org' />
<link rel='stylesheet' id='has-style-frontend-css-css'  href='https://www.bbva.com/wp-content/plugins/highlight-and-share/dist/has-cts-style.css?ver=3.3.6' type='text/css' media='all' />
<link rel='stylesheet' id='highlight-and-share-email-css'  href='https://www.bbva.com/wp-content/plugins/highlight-and-share/css/highlight-and-share-emails.css?ver=3.3.6' type='text/css' media='all' />
<link rel='stylesheet' id='highlight-and-share-css'  href='https://www.bbva.com/wp-content/plugins/highlight-and-share/css/highlight-and-share.css?ver=3.3.6' type='text/css' media='all' />
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/jquery.min.js?ver=3.3.1' id='jquery-js'></script>
<script type='text/javascript' id='options_values-js-extra'>
/* <![CDATA[ */
var cb_options = {"language":"es","site_url":"https:\/\/www.bbva.com","env":"prod","ajuste_id_en":"281312","storage_path":"https:\/\/www.bbva.com\/wp-content\/storage\/","storage_info":"https:\/\/www.bbva.com\/wp-content\/storage\/news\/{id}.json","storage_related_box":"https:\/\/www.bbva.com\/wp-content\/storage\/related-box\/{id}.html","menu_html":"https:\/\/www.bbva.com\/wp-content\/storage\/menu\/","timestamp_json":"https:\/\/www.bbva.com\/wp-content\/storage\/menu\/timestamp.json","code_webs_publicas":"j6yx1hfp","api_dharma_read_seconds":"20","api_dharma_url":"https:\/\/1to1.bbva.com\/1to1\/api\/v1\/r","api_dharma_tracking_base":"https:\/\/1to1.bbva.com\/1to1\/api\/v1","config_legal":"https:\/\/www.bbva.com\/wp-content\/storage\/config\/legal_version.json","close_wait_seconds":"5","messages":{"newsletter_already_registered":"Ya estabas suscrito a nuestra newsletter"},"pixel_campaign":{"type":"html","value":""}};
/* ]]> */
</script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/values.min.js?ver=10.9.2' id='options_values-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/modules/000-utils.min.js?ver=10.9.2' id='utils_js-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/modules/script-onetrust.min.js?ver=10.9.2' id='script-onetrust-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/os-block-control-cookie.min.js?ver=10.9.2' id='os-block-control-cookie-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/modules/redirections-home-pais.min.js?ver=10.9.2' id='redirections-home-pais-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/modules/tickers-ajax.min.js?ver=10.9.2' id='tickers-ajax-js-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/modules/legal-version.min.js?ver=10.9.2' id='legal-version-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/bbva_com.min.js?ver=10.9.2' id='bbva_com-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/modules/menu_version.min.js?ver=10.9.2' id='menu_version-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/funciones-dataLayer.min.js?ver=10.9.2' id='funciones-dataLayer-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/dataLayer-podcast.min.js?ver=10.9.2' id='dataLayer-podcast-js'></script>
<script type="text/javascript" src="https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/datalayer-transaccionales.min.js?ver=10.9.2" async="async" defer="defer"></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/funciones-intersection-observer.min.js?ver=10.9.2' id='funciones-intersection-observer-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/vendor/ReadSpeakerColorSkin/ReadSpeakerColorSkin.js?ver=1' id='readSpeaker-color-skin-js-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/vendor/readspeaker/ReadSpeaker.js?pids=embhl&#038;forceRSLib=1&#038;ver=1' id='readSpeaker-js-js'></script>
<link rel="https://api.w.org/" href="https://www.bbva.com/es/wp-json/" /><link rel="alternate" type="application/json" href="https://www.bbva.com/es/wp-json/wp/v2/pages/10422" />
        <script type="text/javascript">
            var jQueryMigrateHelperHasSentDowngrade = false;

			window.onerror = function( msg, url, line, col, error ) {
				// Break out early, do not processing if a downgrade reqeust was already sent.
				if ( jQueryMigrateHelperHasSentDowngrade ) {
					return true;
                }

				var xhr = new XMLHttpRequest();
				var nonce = '8372a2cf53';
				var jQueryFunctions = [
					'andSelf',
					'browser',
					'live',
					'boxModel',
					'support.boxModel',
					'size',
					'swap',
					'clean',
					'sub',
                ];
				var match_pattern = /\)\.(.+?) is not a function/;
                var erroredFunction = msg.match( match_pattern );

                // If there was no matching functions, do not try to downgrade.
                if ( typeof erroredFunction !== 'object' || typeof erroredFunction[1] === "undefined" || -1 === jQueryFunctions.indexOf( erroredFunction[1] ) ) {
                    return true;
                }

                // Set that we've now attempted a downgrade request.
                jQueryMigrateHelperHasSentDowngrade = true;

				xhr.open( 'POST', 'https://www.bbva.com/wp-admin/admin-ajax.php' );
				xhr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
				xhr.onload = function () {
					var response,
                        reload = false;

					if ( 200 === xhr.status ) {
                        try {
                        	response = JSON.parse( xhr.response );

                        	reload = response.data.reload;
                        } catch ( e ) {
                        	reload = false;
                        }
                    }

					// Automatically reload the page if a deprecation caused an automatic downgrade, ensure visitors get the best possible experience.
					if ( reload ) {
						location.reload();
                    }
				};

				xhr.send( encodeURI( 'action=jquery-migrate-downgrade-version&_wpnonce=' + nonce ) );

				// Suppress error alerts in older browsers
				return true;
			}
        </script>

		<!-- There is no amphtml version available for this URL. -->
                    <script>
                        jQuery(document).ready(function($) {
                            var adminBar = $("#wpadminbar");
                            var t = null;

                            adminBar.mouseenter(function() {
                                if(t) {
                                    clearTimeout(t);
                                    t = null;
                                }

                                adminBar.addClass("visible");
                            });

                            adminBar.mouseleave(function() {
                                if(t) {
                                    clearTimeout(t);
                                    t = null;
                                }

                                t = setTimeout(function() {
                                    adminBar.removeClass("visible");
                                }, 1000);

                            });
                        });
                    </script>
                    <style>
                    #wpadminbar {
                        overflow: hidden !important;
                        width: 37px !important;
                        min-width: initial !important;
                    }
                    #wpadminbar.visible {
                        overflow: visible !important;
                        width: 100% !important;
                        min-width: inherit !important;
                    }
                    @media screen and (max-width: 782px) {
                        #wpadminbar {
                            width: 55px !important;
                        }
                    }
                    #wp-admin-bar-wp-logo .ab-sub-wrapper {
                        display: none !important;
                    }
                   </style><noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>

    </head>

<body class="home page-template page-template-single-home page-template-single-home-php page page-id-10422 scroll wpb-js-composer js-comp-ver-6.5.0 vc_responsive has-body">

            <div id="webpage">

        <!-- PANEL buscador -->
        <div id="panelBuscadorContent" class="panelBuscador-main rs_skip">
            <div id="panelBuscadorPrincipal" class="container">
                <div class="panelBuscador_header">
                    <div class="row panelBuscador_cerrar">
                        <p id="ocultarPanelBuscador" value="ocultar" class="closePanelBuscador punteroMano"><i class="icon-nav_close"></i><span class="textoIconoOcultar">Cerrar panel</span></p>
                    </div>
                    <div class="panelBuscador_logo row">
                        <p class="panelBuscador_logo_titular"><i class="icon-logo_BBVA"></i><span class="textoIconoOcultar">BBVA.com</span></p>
                    </div>
                </div>
                <form id="search-formulario" role="search" method="get" action="" target="_blank" class="navbar-form" autocomplete="off">
                    <div class="panelBuscador_form ui-widget col-md-6 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                        <input name="tags" id="tags" class="form_buscador_input" name="">
                        <label for="tags" class="form_buscador_label">¿Qué estás buscando?</label>
                        <p class="form_buscador_enter"><i class="icon-nav_arrowRight"></i><span class="textoIconoOcultar">Pulsar Enter</span></p>
                        <div class="form_buscador_rtdos">
                            <p class="rtdosBusq_titulo">Búsqueda Predictiva</p>
                            <ul class="rtdosBusq_listaMostrados">
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- PANEL navegacion -->
        <div id="panelNavegacionContent" class="panelNavegacion-main alturaPanelCentral rs_skip" data-menu-version="20230426131409">
            
<div class="panelNavegacion-wrapper ">
    <div id="panelNavCerrar">
        <div class="container">
            <div class="panelNavegacionCerrar">
                <p id="ocultarPanelNavegacion1" value="ocultar" class="close_panelNavegacion punteroMano"><i class="icon-nav_close"></i><span class="textoIconoOcultar">Cerrar panel</span></p>
                <p id="ocultarPanelNavegacion2" value="ocultar" class="close_panelNavegacion punteroMano"><i class="icon-nav_close"></i><span class="textoIconoOcultar">Cerrar panel</span></p>
                <p id="ocultarPanelNavegacionPpal" value="ocultar" class="close_panelNavegacionMovil punteroMano"><i class="icon-nav_close"></i><span class="textoIconoOcultar">Cerrar panel</span></p>
            </div>
        </div>
    </div>
    <div id="panelNavPpal">
        <div class="container">
            <div class="col-md-9 col-xs-8">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    <div class="panelNav_Logo row ">
                        <p class="panelNavLogo_titular"><i class="icon-logo_BBVA"></i><span class="textoIconoOcultar">BBVA.com</span></p>
                    </div>
                    <div id="contenedorListadoNavegacion" class="contenedorListadoNavegacionSup">
                        <div id="listadoNavegacionPrincipal" class="center-block listadoNavegacionPrincipal ocultarListadoNavegacion col-md-12 col-md-offset-1 col-xs-12">
                            <ul id="menu-menu-hamburguesa-primario" class="lista_menuNavPpal"><li id="menu-item-972801" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-972801"><a href="https://www.bbva.com/es/innovacion/">Innovación <i class="icon-nav_unfold" aria-hidden="true" ></i></a>
<ul class="sub-menu">
	<li id="menu-item-977090" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-977090"><a href="https://www.bbva.com/es/innovacion/transformacion/">Transformación</a></li>
	<li id="menu-item-977091" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-977091"><a href="https://www.bbva.com/es/innovacion/emprendimiento/">Emprendimiento</a></li>
	<li id="menu-item-977092" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-977092"><a href="https://www.bbva.com/es/innovacion/tecnologia/">Tecnología</a></li>
	<li id="menu-item-977093" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-977093"><a href="https://www.bbva.com/es/innovacion/data/">Data</a></li>
	<li id="menu-item-977094" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-977094"><a href="https://www.bbva.com/es/innovacion/blockchain/">Blockchain</a></li>
	<li id="menu-item-977095" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-977095"><a href="https://www.bbva.com/es/innovacion/ciberseguridad/">Ciberseguridad</a></li>
</ul>
</li>
<li id="menu-item-483611" class="menu-item menu-item-type-post_type menu-item-object-section menu-item-483611"><a href="https://www.bbva.com/es/finanzas/">Finanzas</a></li>
<li id="menu-item-483614" class="menu-item menu-item-type-post_type menu-item-object-section menu-item-483614"><a href="https://www.bbva.com/es/economia/">Economía</a></li>
<li id="menu-item-829932" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-829932"><a href="https://www.bbva.com/es/sostenibilidad/">Sostenibilidad y Banca Responsable <i class="icon-nav_unfold" aria-hidden="true" ></i></a>
<ul class="sub-menu">
	<li id="menu-item-839192" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-839192"><a href="https://www.bbva.com/es/sostenibilidad/compromiso/">Compromiso</a></li>
	<li id="menu-item-951281" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-951281"><a href="https://www.bbva.com/es/sostenibilidad/banca-responsable/">Banca Responsable</a></li>
	<li id="menu-item-839193" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-839193"><a href="https://www.bbva.com/es/sostenibilidad/energia/">Energía</a></li>
	<li id="menu-item-839194" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-839194"><a href="https://www.bbva.com/es/sostenibilidad/movilidad/">Movilidad</a></li>
	<li id="menu-item-839195" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-839195"><a href="https://www.bbva.com/es/sostenibilidad/planeta/">Planeta</a></li>
	<li id="menu-item-839196" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-839196"><a href="https://www.bbva.com/es/sostenibilidad/social/">Social</a></li>
	<li id="menu-item-839199" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-839199"><a href="https://www.bbva.com/es/sostenibilidad/alimentacion/">Alimentación</a></li>
	<li id="menu-item-839197" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-839197"><a href="https://www.bbva.com/es/sostenibilidad/economia-circular/">Economía circular</a></li>
	<li id="menu-item-839198" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-839198"><a href="https://www.bbva.com/es/sostenibilidad/infraestructuras/">Infraestructuras</a></li>
</ul>
</li>
<li id="menu-item-893352" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-893352"><a href="https://www.bbva.com/es/salud-financiera/">Salud financiera <i class="icon-nav_unfold" aria-hidden="true" ></i></a>
<ul class="sub-menu">
	<li id="menu-item-893356" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-893356"><a href="https://www.bbva.com/es/salud-financiera/gastos/">Control de gastos</a></li>
	<li id="menu-item-893355" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-893355"><a href="https://www.bbva.com/es/salud-financiera/deuda/">Manejar la deuda</a></li>
	<li id="menu-item-893354" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-893354"><a href="https://www.bbva.com/es/salud-financiera/ahorro/">Ahorrar mejor</a></li>
	<li id="menu-item-893353" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-893353"><a href="https://www.bbva.com/es/salud-financiera/planificacion/">Planificar para el futuro</a></li>
</ul>
</li>
<li id="menu-item-969693" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-969693"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/">Juntos <i class="icon-nav_unfold" aria-hidden="true" ></i></a>
<ul class="sub-menu">
	<li id="menu-item-969698" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-969698"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/juntos-en-educacion-y-conocimiento/">Educación y conocimiento</a></li>
	<li id="menu-item-969701" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-969701"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/juntos-en-cambio-climatico-y-biodiversidad/">Cambio climático y biodiversidad</a></li>
	<li id="menu-item-969700" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-969700"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/juntos-en-investigacion-y-salud/">Investigación y salud</a></li>
	<li id="menu-item-969699" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-969699"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/juntos-en-inclusion-y-accion-social/">Inclusión e iniciativas solidarias</a></li>
</ul>
</li>
<li id="menu-item-969684" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-969684"><a href="https://www.bbva.com/es/especiales/bbva-podcast/">Podcast</a></li>
<li id="menu-item-670063" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-670063"><a href="https://www.bbva.com/es/especiales/caso-cenyt/">Caso Cenyt</a></li>
<li id="menu-item-483612" class="menu-item menu-item-type-post_type menu-item-object-section menu-item-483612"><a href="https://www.bbva.com/es/analisis-y-opinion/">Análisis y Opinión</a></li>
<li id="menu-item-764743" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-764743"><a href="https://www.bbva.com/es/especiales/gastronomiasostenible/">Gastronomía Sostenible</a></li>
</ul>                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="deshabilitar_panelNavPpal"></div>
    <div id="panelNavDesplegable" class="anchoPanelesLaterales panelNavDespegableBox">
        <div id="panelNav_n1" class="panelNavDespegable_n1">
            <div class="listadoNavegacionLateral1">
                <!-- Pintamos menu lateral (segundo nivel)-->
                <ul id="menu-menu-hamburguesa-secundario" class="lista_menuNavLateral"><li id="menu-item-547766" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-547766"><a target="_blank" href="https://www.bbva.com/es/especiales/resultadosbbva/">Resultados BBVA<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-483732" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-483732"><a href="#panelNave_n2_483732" class="open-sub-panel">Información corporativa<i class="icon-nav_forward" aria-hidden="true"></i></a></li>
<li id="menu-item-483766" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-483766"><a href="#panelNave_n2_483766" class="open-sub-panel">Información financiera<i class="icon-nav_forward" aria-hidden="true"></i></a></li>
<li id="menu-item-484042" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-484042"><a target="_blank" href="https://accionistaseinversores.bbva.com/informacion-financiera/calendario/">Calendario financiero<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-916120" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-916120"><a target="_blank" href="https://aprendemosjuntos.bbva.com/">Aprendemos Juntos<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-841334" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-841334"><a target="_blank" href="https://www.bbva.com/es/ultimas-noticias/">Últimas noticias<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
</ul><ul id="menu-menu-hamburguesa-secundario-2" class="lista_menuNavLateral"><li id="menu-item-930604" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930604"><a target="_blank" href="https://www.bbva.com/es/alta-newsletter/">Newsletters<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-930605" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930605"><a target="_blank" href="https://www.bbva.com/es/especiales/descarga-los-monograficos-de-sostenibilidad-de-bbva/">Descargar monográficos<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-930606" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930606"><a target="_blank" href="https://www.bbva.com/es/especiales/bbva-podcast/">BBVA Podcast<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-930616" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-930616"><a href="#panelNave_n2_930616" class="open-sub-panel">Especiales<i class="icon-nav_forward" aria-hidden="true"></i></a></li>
<li id="menu-item-930607" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-930607"><a href="#panelNave_n2_930607" class="open-sub-panel">Sala de prensa<i class="icon-nav_forward" aria-hidden="true"></i></a></li>
</ul><ul id="menu-menu-hamburguesa-secundario-3" class="lista_menuNavLateral"><li id="menu-item-930638" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-930638"><a href="#panelNave_n2_930638" class="open-sub-panel">Webs BBVA<i class="icon-nav_forward" aria-hidden="true"></i></a></li>
<li id="menu-item-930646" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930646"><a target="_blank" href="https://www.bbva.com/es/bbva-en-el-mundo-transaccionales/">BBVA en el Mundo<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-930647" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930647"><a target="_blank" href="https://www.bbva.com/es/contacto/">Contacto<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-930645" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930645"><a target="_blank" href="https://www.bbva.com/es/especiales/canales-de-atencion-al-cliente-en-redes-sociales-por-pais/">Atención al cliente en redes<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-930637" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930637"><a target="_blank" href="https://careers.bbva.com/">Trabaja con nosotros<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-939653" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-939653"><a target="_blank" href="https://vdp.bbva.com">Reporte de Vulnerabilidades<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
<li id="menu-item-968716" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-968716"><a target="_blank" href="https://www.bkms-system.com/bkwebanon/report/clientInfo?cin=h4uMFy&#038;c=-1&#038;language=spa">Canal de Denuncia de BBVA<i class="icon-nav_extlink" aria-hidden="true"></i></a></li>
</ul>            </div>
        </div>
        <!-- Pintamos menu lateral (tercer nivel)-->
        
<div id="panelNav_n2_483732"  class="anchoPanelesLaterales panelNavDespegable_n2"><div class="listadoNavegacionLateral2"><ul class="lista_menuNavLateral">
	<li id="menu-item-615353" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-615353"><a href="https://www.bbva.com/es/informacion-corporativa/#carta-presidente">Carta del presidente</a></li>
	<li id="menu-item-615354" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-615354"><a href="https://www.bbva.com/es/informacion-corporativa/#carta-consejero-delegado">Carta del consejero delegado</a></li>
	<li id="menu-item-483745" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483745"><a href="https://www.bbva.com/es/informacion-corporativa/#historia-de-bbva">Historia de BBVA</a></li>
	<li id="menu-item-483746" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483746"><a href="https://www.bbva.com/es/informacion-corporativa/#bbva-en-el-mundo">BBVA en el mundo</a></li>
	<li id="menu-item-483747" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483747"><a href="https://www.bbva.com/es/informacion-corporativa/#datos-basicos">Datos básicos</a></li>
	<li id="menu-item-483748" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483748"><a href="https://www.bbva.com/es/informacion-corporativa/#organigrama">Organigrama</a></li>
	<li id="menu-item-483749" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483749"><a href="https://www.bbva.com/es/informacion-corporativa/#estrategia-modelo-negocio">Estrategia</a></li>
	<li id="menu-item-483751" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483751"><a href="https://www.bbva.com/es/informacion-corporativa/#modelo-banca-responsable">Modelo de sostenibilidad y banca responsable</a></li>
	<li id="menu-item-483752" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483752"><a href="https://www.bbva.com/es/informacion-corporativa/#presentacion-institucional">Presentación institucional</a></li>
	<li id="menu-item-483754" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483754"><a href="https://www.bbva.com/es/informacion-corporativa/#codigo-de-conducta">Código de conducta</a></li>
	<li id="menu-item-483759" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483759"><a href="https://www.bbva.com/es/informacion-corporativa/#estrategia-fiscal-bbva">Estrategia Fiscal BBVA</a></li>
	<li id="menu-item-483760" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483760"><a href="https://www.bbva.com/es/informacion-corporativa/#usa-patriot-act">USA Patriot Act</a></li>
	<li id="menu-item-483761" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483761"><a href="https://www.bbva.com/es/informacion-corporativa/#fatca">FATCA</a></li>
	<li id="menu-item-483762" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483762"><a href="https://www.bbva.com/es/informacion-corporativa/#bbva-due-diligence">BBVA Due Diligence</a></li>
</ul></div></div>

<div id="panelNav_n2_483766"  class="anchoPanelesLaterales panelNavDespegable_n2"><div class="listadoNavegacionLateral2"><ul class="lista_menuNavLateral">
	<li id="menu-item-483768" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483768"><a href="https://accionistaseinversores.bbva.com/grupo-bbva/">BBVA en 2022</a></li>
	<li id="menu-item-483769" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483769"><a href="http://accionistaseinversores.bbva.com/TLBB/tlbb/bbvair/esp/share/index.jsp">La acción BBVA</a></li>
	<li id="menu-item-483777" class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-483777"><a href="https://www.bbva.com/es/especiales/resultadosbbva/">Resultados BBVA</a></li>
	<li id="menu-item-483775" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483775"><a href="https://accionistaseinversores.bbva.com/wp-content/uploads/2020/03/BBVACuentasAnualesInformeGesti%C3%B3nInformeAuditor2019_esp.pdf">Memoria anual</a></li>
	<li id="menu-item-483778" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483778"><a href="https://accionistaseinversores.bbva.com/informacion-financiera/informes-financieros/#2018">Informes financieros</a></li>
	<li id="menu-item-483779" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483779"><a href="https://accionistaseinversores.bbva.com/la-accion/hechos-relevantes/#2020">Hechos relevantes</a></li>
	<li id="menu-item-483780" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483780"><a href="https://accionistaseinversores.bbva.com/renta-fija/emisiones-y-programas/">Emisiones y Programas</a></li>
</ul></div></div>

<div id="panelNav_n2_930616"  class="anchoPanelesLaterales panelNavDespegable_n2"><div class="listadoNavegacionLateral2"><ul class="lista_menuNavLateral">
	<li id="menu-item-930617" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930617"><a href="https://www.bbva.com/es/especiales/25-anos-de-bbva-en-colombia/">25 aniversario de Colombia</a></li>
	<li id="menu-item-930618" class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930618"><a href="https://www.bbva.com/es/especiales/sembrando-el-futuro/">Sembrando el futuro</a></li>
	<li id="menu-item-930619" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930619"><a href="https://www.bbva.com/es/especiales/el-camino-a-la-recuperacion-economica-evolucion-del-impacto-del-covid-19-en-el-consumo/">El camino a la recuperación económica: evolución del impacto del COVID-19 en el consumo</a></li>
	<li id="menu-item-930620" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930620"><a href="https://www.bbva.com/es/bbva-en-asia/">BBVA en Asia</a></li>
	<li id="menu-item-930621" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930621"><a href="https://www.bbva.com/es/especiales/gastronomiasostenible/">Gastronomía Sostenible de BBVA y El Celler de Can Roca</a></li>
	<li id="menu-item-930622" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930622"><a href="https://www.bbva.com/es/especial-banqueros/">Banqueros</a></li>
	<li id="menu-item-930623" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930623"><a href="https://www.bbva.com/es/sala-tesoreria/">Sala de tesorería</a></li>
	<li id="menu-item-930636" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930636"><a href="https://www.bbva.com/es/especiales/junta-general-de-accionistas/">Junta General de Accionistas</a></li>
	<li id="menu-item-930625" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930625"><a href="https://www.bbva.com/es/especiales/cop25/">COP25</a></li>
	<li id="menu-item-930626" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930626"><a href="https://www.bbva.com/es/especiales/nuestra-marca-logo/">Nuestra marca</a></li>
	<li id="menu-item-930627" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930627"><a href="https://www.bbva.com/es/analisis-y-opinion/">Análisis y opinión</a></li>
	<li id="menu-item-930628" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930628"><a href="https://www.bbva.com/es/especiales/bbva-valora-spotify/">BBVA Valora &#038; Spotify</a></li>
	<li id="menu-item-930629" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930629"><a href="https://www.bbva.com/es/especiales/data/">Data</a></li>
	<li id="menu-item-930630" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930630"><a href="https://www.bbva.com/es/especiales/objetivos-de-desarrollo-sostenibles/">Objetivos de Desarrollo Sostenible</a></li>
	<li id="menu-item-930631" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930631"><a href="https://www.bbva.com/es/archivo-historico-bbva-memoria-caer-olvido/">Archivo histórico de BBVA</a></li>
	<li id="menu-item-930632" class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930632"><a href="https://www.bbva.com/es/especiales/ciudad-bbva/">Ciudad BBVA</a></li>
	<li id="menu-item-930633" class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930633"><a href="https://www.bbva.com/es/especiales/bbva-research/">BBVA Research</a></li>
	<li id="menu-item-930634" class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930634"><a href="https://www.bbva.com/es/especiales/bbva-labs/">BBVA Labs</a></li>
</ul></div></div>

<div id="panelNav_n2_930607"  class="anchoPanelesLaterales panelNavDespegable_n2"><div class="listadoNavegacionLateral2"><ul class="lista_menuNavLateral">
	<li id="menu-item-930608" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-930608"><a href="https://www.bbva.com/es/quienes-somos/">Quiénes somos</a></li>
	<li id="menu-item-930609" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-930609"><a href="https://www.bbva.com/es/contacto-prensa/">Contacto para prensa</a></li>
	<li id="menu-item-930610" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930610"><a href="https://www.bbva.com/es/fotos-directivos-executive-team/">Fotos Directivos | Executive Team</a></li>
	<li id="menu-item-930611" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930611"><a href="https://www.bbva.com/es/descargas/">Descarga de archivos</a></li>
	<li id="menu-item-930612" class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930612"><a href="https://www.bbva.com/es/especiales/biografias/">Biografías</a></li>
	<li id="menu-item-930613" class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930613"><a href="https://www.bbva.com/es/especiales/premios/">Premios y reconocimientos</a></li>
</ul></div></div>

<div id="panelNav_n2_930638"  class="anchoPanelesLaterales panelNavDespegable_n2"><div class="listadoNavegacionLateral2"><ul class="lista_menuNavLateral">
	<li id="menu-item-930639" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930639"><a href="https://www.bbvaresearch.com/">BBVA Research</a></li>
	<li id="menu-item-930640" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930640"><a href="https://openinnovation.bbva.com/es">Open Innovation</a></li>
	<li id="menu-item-930641" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930641"><a href="https://www.bbvaopenmind.com/">OpenMind</a></li>
	<li id="menu-item-930642" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930642"><a href="http://www.fbbva.es/">Fundación BBVA</a></li>
	<li id="menu-item-930644" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930644"><a href="https://www.bbva.com/es/otras-webs-de-bbva/">Todas las webs</a></li>
</ul></div></div>
    </div>

    <div id="navegadorMovile-main" class="navegadorMovile-main" role="tablist" aria-multiselectable="true">
        <div class="navegadorMovile-container mostrarPanelInfo">
            <h2 class="subtituloNavegadorMovile">
                <a href="#" class="buttonPrefooterMovile"><span class="tituloNegrita">Accionistas e inversores</span></a>
            </h2>
        </div>
        <div class="navegadorMovile-container linkTransactional">
            <h2 class="subtituloNavegadorMovile">
                <a href="https://www.bbva.com/es/bbva-en-el-mundo-transaccionales/" class="buttonPrefooterMovile"><span class="tituloNegrita">BBVA en el Mundo</span></a>
            </h2>
        </div>
        <!-- Pintamos menu lateral secundario Movil-->
                         <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo547766Movile">
                         <a href="https://www.bbva.com/es/especiales/resultadosbbva/" class="buttonPrefooterMovile"><span class="tituloNegrita">Resultados BBVA</span></a>
                     </h2>
                 </div>
                <div class="navegadorMovile-container">
                    <h2 class="subtituloNavegadorMovile firstItem" id="button483732Movile" role="tab">
                        <a role="button" data-toggle="collapse" data-target="#483732Movile" class="buttonPrefooterMovile collapsed">
                            <span class="tituloNegrita">Información corporativa</span><i id="flecha483732Movile" class=" icon-nav_unfold" aria-hidden="true"></i></a>
                    </h2>
                    <div id="483732Movile" class="collapse">

                        <ul>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-615353"><a href="https://www.bbva.com/es/informacion-corporativa/#carta-presidente">Carta del presidente</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-615354"><a href="https://www.bbva.com/es/informacion-corporativa/#carta-consejero-delegado">Carta del consejero delegado</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483745"><a href="https://www.bbva.com/es/informacion-corporativa/#historia-de-bbva">Historia de BBVA</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483746"><a href="https://www.bbva.com/es/informacion-corporativa/#bbva-en-el-mundo">BBVA en el mundo</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483747"><a href="https://www.bbva.com/es/informacion-corporativa/#datos-basicos">Datos básicos</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483748"><a href="https://www.bbva.com/es/informacion-corporativa/#organigrama">Organigrama</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483749"><a href="https://www.bbva.com/es/informacion-corporativa/#estrategia-modelo-negocio">Estrategia</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483751"><a href="https://www.bbva.com/es/informacion-corporativa/#modelo-banca-responsable">Modelo de sostenibilidad y banca responsable</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483752"><a href="https://www.bbva.com/es/informacion-corporativa/#presentacion-institucional">Presentación institucional</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483754"><a href="https://www.bbva.com/es/informacion-corporativa/#codigo-de-conducta">Código de conducta</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483759"><a href="https://www.bbva.com/es/informacion-corporativa/#estrategia-fiscal-bbva">Estrategia Fiscal BBVA</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483760"><a href="https://www.bbva.com/es/informacion-corporativa/#usa-patriot-act">USA Patriot Act</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483761"><a href="https://www.bbva.com/es/informacion-corporativa/#fatca">FATCA</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483762"><a href="https://www.bbva.com/es/informacion-corporativa/#bbva-due-diligence">BBVA Due Diligence</a></li>
                       </ul>
                    </div>
                 </div>                <div class="navegadorMovile-container">
                    <h2 class="subtituloNavegadorMovile firstItem" id="button483766Movile" role="tab">
                        <a role="button" data-toggle="collapse" data-target="#483766Movile" class="buttonPrefooterMovile collapsed">
                            <span class="tituloNegrita">Información financiera</span><i id="flecha483766Movile" class=" icon-nav_unfold" aria-hidden="true"></i></a>
                    </h2>
                    <div id="483766Movile" class="collapse">

                        <ul>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483768"><a href="https://accionistaseinversores.bbva.com/grupo-bbva/">BBVA en 2022</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483769"><a href="http://accionistaseinversores.bbva.com/TLBB/tlbb/bbvair/esp/share/index.jsp">La acción BBVA</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-483777"><a href="https://www.bbva.com/es/especiales/resultadosbbva/">Resultados BBVA</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483775"><a href="https://accionistaseinversores.bbva.com/wp-content/uploads/2020/03/BBVACuentasAnualesInformeGesti%C3%B3nInformeAuditor2019_esp.pdf">Memoria anual</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483778"><a href="https://accionistaseinversores.bbva.com/informacion-financiera/informes-financieros/#2018">Informes financieros</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483779"><a href="https://accionistaseinversores.bbva.com/la-accion/hechos-relevantes/#2020">Hechos relevantes</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483780"><a href="https://accionistaseinversores.bbva.com/renta-fija/emisiones-y-programas/">Emisiones y Programas</a></li>
                       </ul>
                    </div>
                 </div>                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo484042Movile">
                         <a href="https://accionistaseinversores.bbva.com/informacion-financiera/calendario/" class="buttonPrefooterMovile"><span class="tituloNegrita">Calendario financiero</span></a>
                     </h2>
                 </div>
                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo916120Movile">
                         <a href="https://aprendemosjuntos.bbva.com/" class="buttonPrefooterMovile"><span class="tituloNegrita">Aprendemos Juntos</span></a>
                     </h2>
                 </div>
                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo841334Movile">
                         <a href="https://www.bbva.com/es/ultimas-noticias/" class="buttonPrefooterMovile"><span class="tituloNegrita">Últimas noticias</span></a>
                     </h2>
                 </div>
                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo930604Movile">
                         <a href="https://www.bbva.com/es/alta-newsletter/" class="buttonPrefooterMovile"><span class="tituloNegrita">Newsletters</span></a>
                     </h2>
                 </div>
                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo930605Movile">
                         <a href="https://www.bbva.com/es/especiales/descarga-los-monograficos-de-sostenibilidad-de-bbva/" class="buttonPrefooterMovile"><span class="tituloNegrita">Descargar monográficos</span></a>
                     </h2>
                 </div>
                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo930606Movile">
                         <a href="https://www.bbva.com/es/especiales/bbva-podcast/" class="buttonPrefooterMovile"><span class="tituloNegrita">BBVA Podcast</span></a>
                     </h2>
                 </div>
                <div class="navegadorMovile-container">
                    <h2 class="subtituloNavegadorMovile firstItem" id="button930616Movile" role="tab">
                        <a role="button" data-toggle="collapse" data-target="#930616Movile" class="buttonPrefooterMovile collapsed">
                            <span class="tituloNegrita">Especiales</span><i id="flecha930616Movile" class=" icon-nav_unfold" aria-hidden="true"></i></a>
                    </h2>
                    <div id="930616Movile" class="collapse">

                        <ul>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930617"><a href="https://www.bbva.com/es/especiales/25-anos-de-bbva-en-colombia/">25 aniversario de Colombia</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930618"><a href="https://www.bbva.com/es/especiales/sembrando-el-futuro/">Sembrando el futuro</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930619"><a href="https://www.bbva.com/es/especiales/el-camino-a-la-recuperacion-economica-evolucion-del-impacto-del-covid-19-en-el-consumo/">El camino a la recuperación económica: evolución del impacto del COVID-19 en el consumo</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930620"><a href="https://www.bbva.com/es/bbva-en-asia/">BBVA en Asia</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930621"><a href="https://www.bbva.com/es/especiales/gastronomiasostenible/">Gastronomía Sostenible de BBVA y El Celler de Can Roca</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930622"><a href="https://www.bbva.com/es/especial-banqueros/">Banqueros</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930623"><a href="https://www.bbva.com/es/sala-tesoreria/">Sala de tesorería</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930636"><a href="https://www.bbva.com/es/especiales/junta-general-de-accionistas/">Junta General de Accionistas</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930625"><a href="https://www.bbva.com/es/especiales/cop25/">COP25</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930626"><a href="https://www.bbva.com/es/especiales/nuestra-marca-logo/">Nuestra marca</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930627"><a href="https://www.bbva.com/es/analisis-y-opinion/">Análisis y opinión</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930628"><a href="https://www.bbva.com/es/especiales/bbva-valora-spotify/">BBVA Valora &#038; Spotify</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930629"><a href="https://www.bbva.com/es/especiales/data/">Data</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930630"><a href="https://www.bbva.com/es/especiales/objetivos-de-desarrollo-sostenibles/">Objetivos de Desarrollo Sostenible</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930631"><a href="https://www.bbva.com/es/archivo-historico-bbva-memoria-caer-olvido/">Archivo histórico de BBVA</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930632"><a href="https://www.bbva.com/es/especiales/ciudad-bbva/">Ciudad BBVA</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930633"><a href="https://www.bbva.com/es/especiales/bbva-research/">BBVA Research</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930634"><a href="https://www.bbva.com/es/especiales/bbva-labs/">BBVA Labs</a></li>
                       </ul>
                    </div>
                 </div>                <div class="navegadorMovile-container">
                    <h2 class="subtituloNavegadorMovile firstItem" id="button930607Movile" role="tab">
                        <a role="button" data-toggle="collapse" data-target="#930607Movile" class="buttonPrefooterMovile collapsed">
                            <span class="tituloNegrita">Sala de prensa</span><i id="flecha930607Movile" class=" icon-nav_unfold" aria-hidden="true"></i></a>
                    </h2>
                    <div id="930607Movile" class="collapse">

                        <ul>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-930608"><a href="https://www.bbva.com/es/quienes-somos/">Quiénes somos</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-930609"><a href="https://www.bbva.com/es/contacto-prensa/">Contacto para prensa</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930610"><a href="https://www.bbva.com/es/fotos-directivos-executive-team/">Fotos Directivos | Executive Team</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930611"><a href="https://www.bbva.com/es/descargas/">Descarga de archivos</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930612"><a href="https://www.bbva.com/es/especiales/biografias/">Biografías</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-930613"><a href="https://www.bbva.com/es/especiales/premios/">Premios y reconocimientos</a></li>
                       </ul>
                    </div>
                 </div>                <div class="navegadorMovile-container">
                    <h2 class="subtituloNavegadorMovile firstItem" id="button930638Movile" role="tab">
                        <a role="button" data-toggle="collapse" data-target="#930638Movile" class="buttonPrefooterMovile collapsed">
                            <span class="tituloNegrita">Webs BBVA</span><i id="flecha930638Movile" class=" icon-nav_unfold" aria-hidden="true"></i></a>
                    </h2>
                    <div id="930638Movile" class="collapse">

                        <ul>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930639"><a href="https://www.bbvaresearch.com/">BBVA Research</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930640"><a href="https://openinnovation.bbva.com/es">Open Innovation</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930641"><a href="https://www.bbvaopenmind.com/">OpenMind</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930642"><a href="http://www.fbbva.es/">Fundación BBVA</a></li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-930644"><a href="https://www.bbva.com/es/otras-webs-de-bbva/">Todas las webs</a></li>
                       </ul>
                    </div>
                 </div>                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo930646Movile">
                         <a href="https://www.bbva.com/es/bbva-en-el-mundo-transaccionales/" class="buttonPrefooterMovile"><span class="tituloNegrita">BBVA en el Mundo</span></a>
                     </h2>
                 </div>
                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo930647Movile">
                         <a href="https://www.bbva.com/es/contacto/" class="buttonPrefooterMovile"><span class="tituloNegrita">Contacto</span></a>
                     </h2>
                 </div>
                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo930645Movile">
                         <a href="https://www.bbva.com/es/especiales/canales-de-atencion-al-cliente-en-redes-sociales-por-pais/" class="buttonPrefooterMovile"><span class="tituloNegrita">Atención al cliente en redes</span></a>
                     </h2>
                 </div>
                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo930637Movile">
                         <a href="https://careers.bbva.com/" class="buttonPrefooterMovile"><span class="tituloNegrita">Trabaja con nosotros</span></a>
                     </h2>
                 </div>
                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo939653Movile">
                         <a href="https://vdp.bbva.com" class="buttonPrefooterMovile"><span class="tituloNegrita">Reporte de Vulnerabilidades</span></a>
                     </h2>
                 </div>
                 <div class="navegadorMovile-container">
                     <h2 class="subtituloNavegadorMovile" id="buttonInfo968716Movile">
                         <a href="https://www.bkms-system.com/bkwebanon/report/clientInfo?cin=h4uMFy&#038;c=-1&#038;language=spa" class="buttonPrefooterMovile"><span class="tituloNegrita">Canal de Denuncia de BBVA</span></a>
                     </h2>
                 </div>
        <div class="navegadorMovileIdioma-container">
            <p class="idiomasNavegadorMovile"><i class="icon-commu_idioma" aria-hidden="true"></i><a href="https://www.bbva.com/en/" class="active">English</a><a href="https://www.bbva.com/es/" class="inactive">Español</a></p>
        </div>
    </div>
</div>
        </div>
        <!-- PANEL accionistas -->
        <div id="panelInfoContent" class="panelInfo-main rs_skip" data-menu-version="20230323100009">
                        <div class="panelInfo-content container">
                <div class="row panelInfoCerrar">
                    <p id="ocultarPanelInfo" value="ocultar" class="close_panelInfo punteroMano"><i class="icon-nav_close"></i><span class="textoIconoOcultar">Cerrar panel</span></p>
                </div>
                <div class="row panelInfoSup">

                    <div class="col-xs-6 col-sm-3 panelInfo-grupo"><h2 class="titulo_panelInfo"><a target="_blank" href="https://accionistaseinversores.bbva.com/">Home</a></h2><ul class="lista_panelInfo"><li><a target="_blank" href="https://accionistaseinversores.bbva.com/grupo-bbva/"><strong>Grupo BBVA</strong></a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/grupo-bbva/bbva-en-resumen/">BBVA en resumen</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/grupo-bbva/organigrama/">Organigrama</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/grupo-bbva/areas-de-negocio/">Áreas de negocio</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/grupo-bbva/estrategia-la-transformacion-en-bbva/">Estrategia: la transformación en BBVA</a></li></ul></div><div class="col-xs-6 col-sm-3 panelInfo-grupo"><h2 class="titulo_panelInfo"><a target="_blank" href="https://accionistaseinversores.bbva.com/informacion-financiera/">Información financiera</a></h2><ul class="lista_panelInfo"><li><a target="_blank" href="https://accionistaseinversores.bbva.com/informacion-financiera/informes-financieros/">Informes financieros</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/informacion-financiera/presentaciones/">Presentaciones</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/informacion-financiera/datos-financieros/">Datos financieros</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/informacion-financiera/gestion-del-riesgo/">Gestión del riesgo</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/informacion-financiera/calendario/">Calendario</a></li></ul></div>
                    <div class="clearfix visible-xs"></div>

                    <div class="col-xs-6 col-sm-3 panelInfo-grupo"><h2 class="titulo_panelInfo"><a target="_blank" href="https://accionistaseinversores.bbva.com/la-accion/">La acción</a></h2><ul class="lista_panelInfo"><li><a target="_blank" href="https://accionistaseinversores.bbva.com/la-accion/informacion-de-la-accion/">Información de la acción</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/la-accion/informacion-de-capital/">Información de capital y autocartera</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/la-accion/remuneracion-al-accionista/">Remuneración al accionista</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/la-accion/analisis-de-renta-variable/">Analista de renta variable</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/la-accion/adrs/">ADRs</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/la-accion/recompra-acciones/">Buybakcs</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/la-accion/hechos-relevantes/">Hechos relevantes</a></li></ul></div><div class="col-xs-6 col-sm-3 panelInfo-grupo"><h2 class="titulo_panelInfo"><a target="_blank" href="https://accionistaseinversores.bbva.com/accionistas/">Accionistas</a></h2><ul class="lista_panelInfo"><li><a target="_blank" href="https://accionistaseinversores.bbva.com/accionistas/informes-accionistas/">Informes Accionistas</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/accionistas/productos-financieros/">Productos financieros</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/accionistas/club-del-accionista/">Club del accionista</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/accionistas/revista-abaco/">Revista Ábaco</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/accionistas/politica-de-comunicacion-con-accionistas/">Política de comunicación con accionistas</a></li></ul></div>
                </div>
                <hr size="20" noshade="noshade" class="lineaHorizontalCorta" />
                <div class="row panelInfoInf">

                    <div class="col-xs-6 col-sm-3 panelInfo-grupo"><h2 class="titulo_panelInfo"><a target="_blank" href="https://accionistaseinversores.bbva.com/renta-fija/">Renta fija</a></h2><ul class="lista_panelInfo"><li><a target="_blank" href="https://accionistaseinversores.bbva.com/renta-fija/emisiones-y-programas/">Emisiones</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/renta-fija/programas/">Programas</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/renta-fija/emisoras/">Emisoras</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/renta-fija/perfil-de-vencimientos/">Perfil vencimientos</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/renta-fija/presentaciones-renta-fija/">Presentaciones</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/renta-fija/ratings/">Ratings</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/renta-fija/analistas-de-renta-fija/">Analistas de renta fija</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/renta-fija/contactos-renta-fija/">Contactos de renta fija</a></li></ul></div><div class="col-xs-6 col-sm-3 panelInfo-grupo"><h2 class="titulo_panelInfo"><a target="_blank" href="https://accionistaseinversores.bbva.com/sostenibilidad-y-banca-responsable/">Sostenibilidad y Banca Responsable</a></h2><ul class="lista_panelInfo"><li><a target="_blank" href="https://accionistaseinversores.bbva.com/sostenibilidad-y-banca-responsable/estrategia-sostenibilidad/">Estrategia Sostenibilidad</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/sostenibilidad-y-banca-responsable/financiacion-sostenible/">Financiación Sostenible</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/sostenibilidad-y-banca-responsable/principios-y-politicas-2/">Principios y políticas</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/sostenibilidad-y-banca-responsable/informes-de-banca-responsable/">Presentación e informes</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/sostenibilidad-y-banca-responsable/ratings-de-sostenibilidad/">Indices de sostenibilidad</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/sostenibilidad-y-banca-responsable/fiscalidad-responsable/">Fiscalidad responsable</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/sostenibilidad-y-banca-responsable/periodo-medio-de-pago-a-proveedores/">Período medio de pago a proveedores</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/sostenibilidad-y-banca-responsable/contacto/">Contactos</a></li></ul></div>
                    <div class="clearfix visible-xs"></div>

                    <div class="col-xs-12 col-sm-6 panelInfo-grupo"><h2 class="titulo_panelInfo"><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/">Gobierno corporativo y Política de Remuneraciones</a></h2><div class="col-xs-6 col-sm-6 fleft"><ul class="lista_panelInfo"><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/estatutos-sociales/">Estatutos sociales</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/reglamento-junta-general/">Reglamento de la Junta General</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/informacion-de-las-juntas-celebradas/">Información relativa a las Juntas celebradas</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/reglamento-consejo-administracion/">Reglamento del Consejo de Administración</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/consejo-de-administracion/">Consejo de Administración</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/comisiones-del-consejo/">Comisiones del Consejo</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/remuneraciones-de-los-consejeros/">Remuneraciones de los consejeros</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/informacion-sobre-colectivo-identificado/">Información sobre el Colectivo identificado</a></li></ul></div><div class="col-xs-6 col-sm-6 fright"><ul class="lista_panelInfo"><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/informe-anual-gobierno-corporativo/">Informe Anual de Gobierno Corporativo</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/circular-22016-banco-de-espana/">Información Circular 2/2016 del Banco de España</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/ric-en-los-mercados-de-valores/">Política de Conducta en los Mercados de Valores</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/auditores/">Auditores</a></li><li><a target="_blank" href="https://accionistaseinversores.bbva.com/gobierno-corporativo-y-politica-de-remuneraciones/auditores/">Información sobre operaciones de integración</a></li></ul></div></div>
                </div>
            </div>
        </div>

        <header class="header-main rs_skip">
            <div class="header-container container">
                <div class="headerTop row">
                    <div id="headerTop_menuSecundario" class="headerTop_menuSecundario col-md-7 col-sm-10 col-xs-10" data-menu-version="20190608085506">
                        <ul class="lista_menuTop">
    <li id="menu-item-483823" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483823"><a href="https://www.bbva.com/es/informacion-corporativa/">Informacion corporativa</a></li>
    <li class="mostrarPanelInfo"><a href="#"><span class="textoIconoColocar">Accionistas e inversores</span></a><i class=" icon-nav_unfold iconoFechaArriba" aria-hidden="true"></i></li>
    <li class="linkTransactionalReplace"><a href="https://www.bbva.com/es/bbva-en-el-mundo-transaccionales/">BBVA en el Mundo</a></li>
</ul>
                    </div>

                    <div class="headerTop_tools col-md-5 col-sm-2 col-xs-2">
                        <ul class="lista_menuTools">
                            <li class="itemMenu_buscador"><i id="buscadorLupa" class="icon-tools_search" aria-hidden="true"></i><span class="textoIconoOcultar">Buscador</span></li>
                            <li class="itemMenu_idioma"><i class="icon-commu_idioma" aria-hidden="true"></i><a href="https://www.bbva.com/en/" class="active">English</a><a href="https://www.bbva.com/es/" class="inactive">Español</a></li>
                            <li class="itemMenu_mercado"><iframe src="//tools.eurolandir.com/tools/ticker/scrolling/?companycode=es-boy&v=v2.1&lang=es-es" loading="lazy" id="accionistas_id" width="250" height="12" scrolling="no" frameborder="0"></iframe></li>

                        </ul>
                    </div>
                </div>
                <div class="headerLogo row">
                                        <h1 class="headerLogo_titular"><a class="home-redirec" href="https://www.bbva.com/es"><i class="icon-logo_BBVA"></i><span class="textoIconoOcultar">BBVA.com</span></a></h1>

                </div>
                <nav class="headerNav row">
                    <div id="headerNav_menuPrincipal" class="headerNav_menuPrincipal" data-menu-version="20230325075959">
                        <ul id="menu-menu-principal-header" class="lista_menuPrincipal"><li id="menu-item-972706" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-972706"><a href="https://www.bbva.com/es/innovacion/">Innovación</a>
<div class='headerNav_menuSecundario yellow'><ul class="lista_menuSecundario container">
	<li id="menu-item-972705" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-972705"><a href="https://www.bbva.com/es/innovacion/transformacion/">Transformación</a></li>
	<li id="menu-item-972704" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-972704"><a href="https://www.bbva.com/es/innovacion/emprendimiento/">Emprendimiento y Startups</a></li>
	<li id="menu-item-972703" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-972703"><a href="https://www.bbva.com/es/innovacion/tecnologia/">Tecnología</a></li>
	<li id="menu-item-972702" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-972702"><a href="https://www.bbva.com/es/innovacion/data/">Data</a></li>
	<li id="menu-item-972701" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-972701"><a href="https://www.bbva.com/es/innovacion/blockchain/">Blockchain</a></li>
	<li id="menu-item-972700" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-972700"><a href="https://www.bbva.com/es/innovacion/ciberseguridad/">Ciberseguridad</a></li>
</ul></div>
</li>
<li id="menu-item-483622" class="menu-item menu-item-type-post_type menu-item-object-section menu-item-483622"><a href="https://www.bbva.com/es/finanzas/">Finanzas</a></li>
<li id="menu-item-483624" class="menu-item menu-item-type-post_type menu-item-object-section menu-item-483624"><a href="https://www.bbva.com/es/economia/">Economía</a></li>
<li id="menu-item-951278" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-951278"><a href="https://www.bbva.com/es/sostenibilidad/">Sostenibilidad y Banca Responsable</a>
<div class='headerNav_menuSecundario green'><ul class="lista_menuSecundario container">
	<li id="menu-item-939406" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-939406"><a href="https://www.bbva.com/es/sostenibilidad/compromiso/">Compromiso</a></li>
	<li id="menu-item-951280" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-951280"><a href="https://www.bbva.com/es/sostenibilidad/banca-responsable/">Banca Responsable</a></li>
	<li id="menu-item-939407" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-939407"><a href="https://www.bbva.com/es/sostenibilidad/energia/">Energía</a></li>
	<li id="menu-item-939408" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-939408"><a href="https://www.bbva.com/es/sostenibilidad/movilidad/">Movilidad</a></li>
	<li id="menu-item-939409" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-939409"><a href="https://www.bbva.com/es/sostenibilidad/planeta/">Planeta</a></li>
	<li id="menu-item-939410" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-939410"><a href="https://www.bbva.com/es/sostenibilidad/social/">Social</a></li>
	<li id="menu-item-939411" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-939411"><a href="https://www.bbva.com/es/sostenibilidad/alimentacion/">Alimentación</a></li>
	<li id="menu-item-939412" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-939412"><a href="https://www.bbva.com/es/sostenibilidad/economia-circular/">Economía Circular</a></li>
	<li id="menu-item-939413" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-939413"><a href="https://www.bbva.com/es/sostenibilidad/infraestructuras/">Infraestructuras</a></li>
</ul></div>
</li>
<li id="menu-item-964395" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-964395"><a href="https://www.bbva.com/es/salud-financiera/">Salud financiera</a>
<div class='headerNav_menuSecundario soft_blue'><ul class="lista_menuSecundario container">
	<li id="menu-item-939402" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-939402"><a href="https://www.bbva.com/es/salud-financiera/gastos/">Control de gastos</a></li>
	<li id="menu-item-939405" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-939405"><a href="https://www.bbva.com/es/salud-financiera/deuda/">Manejar la deuda</a></li>
	<li id="menu-item-939404" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-939404"><a href="https://www.bbva.com/es/salud-financiera/ahorro/">Ahorrar mejor</a></li>
	<li id="menu-item-939403" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-939403"><a href="https://www.bbva.com/es/salud-financiera/planificacion/">Planificar para el futuro</a></li>
</ul></div>
</li>
<li id="menu-item-939414" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-939414"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/">Juntos</a>
<div class='headerNav_menuSecundario soft_lilac'><ul class="lista_menuSecundario container">
	<li id="menu-item-939415" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-939415"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/juntos-en-educacion-y-conocimiento/">Educación y conocimiento</a></li>
	<li id="menu-item-939416" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-939416"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/juntos-en-cambio-climatico-y-biodiversidad/">Cambio climático y biodiversidad</a></li>
	<li id="menu-item-939417" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-939417"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/juntos-en-investigacion-y-salud/">Investigación y salud</a></li>
	<li id="menu-item-939418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-939418"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/juntos-en-inclusion-y-accion-social/">Inclusión e iniciativas solidarias</a></li>
</ul></div>
</li>
<li id="menu-item-964396" class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-964396"><a href="https://www.bbva.com/es/especiales/bbva-podcast/">Podcast</a></li>
<li id="menu-item-964397" class="menu-item menu-item-type-post_type menu-item-object-especial menu-item-964397"><a href="https://www.bbva.com/es/especiales/caso-cenyt/">Caso Cenyt</a></li>
</ul>                    </div>
                    <div class="headerNav_menuLateral">
                        <i id="mostrarPanelNavegacion" class=" icon-nav_menu punteroMano"></i><span class="textoIconoOcultar">Ver menú principal</span>
                    </div>
                    <div class="headerNav_buscador">
                        <i id="buscadorLupa_xs" class="icon-tools_search" aria-hidden="true"></i><span class="textoIconoOcultar">Buscador</span>
                    </div>
                </nav>
            </div>
        </header>
<main id="home" class="datalayer_portada">

    
    <h1 class="visually-hidden page-title">BBVA | BANCO BBVA. Banco Digital del siglo XXI</h1>
    <section class=" componente_aperturaNoticias">
    <div id="de59da83" class="container-fluid aperturaVarios">
        <div class="container">
            <div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><article class="mod_noticia t_art i_sfoto f_3x1 notBannerResult" style="height: 100%">
    <div class="mod_noticia_box">
        <figure class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a  href="https://bbva.info/3OGXSNJ" class="linkImage"></a>
                                    <picture>
                        <source media="(min-width: 2048px)" srcset="https://www.bbva.com/wp-content/uploads/2023/06/vida-financiera-2x2-1.gif">
                        <source media="(min-width: 1920px)" srcset="https://www.bbva.com/wp-content/uploads/2023/06/vida-financiera-2x2-1.gif">
                        <source media="(min-width: 1536px)" srcset="https://www.bbva.com/wp-content/uploads/2023/06/vida-financiera-2x2-1.gif">
                        <source media="(min-width: 1024px)" srcset="https://www.bbva.com/wp-content/uploads/2023/06/vida-financiera-2x2-1.gif">
                        <source media="(min-width: 501px)" srcset="https://www.bbva.com/wp-content/uploads/2023/06/vida-financiera-2x2-1.gif">
                        <source media="(max-width: 500px)" srcset="https://www.bbva.com/wp-content/uploads/2023/06/vida-financiera-2x2-1.gif">

                        <img src="https://www.bbva.com/wp-content/uploads/2023/06/vida-financiera-2x2-1.gif" alt="" style="width: 100%;" />
                    </picture>
                            </div>
        </figure>
    </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/es/bbva-refuerza-su-programa-de-fidelizacion-en-espana-el-padrino-puede-ganar-500-euros-y-los-nuevos-clientes-250/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/bbva-refuerza-programa-de-fidelizacion-768x431.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/economia/sistema_financiero/banca-digital/" >Banca digital</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/es/bbva-refuerza-su-programa-de-fidelizacion-en-espana-el-padrino-puede-ganar-500-euros-y-los-nuevos-clientes-250/" >BBVA refuerza su programa de fidelización en España: el padrino puede ganar 500 euros y los nuevos clientes, 250</a></h2>
            </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-6 col-sm-6 col-xs-6">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/es/innovacion/bbva-en-espana-reduce-de-14-a-12-anos-el-acceso-a-su-app-de-menores/"><i class="icon-commu_press"></i><span class="textoIconoColocar">BBVA en España reduce de 14 a 12 años el acceso a su 'app' de menores</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/innovacion/inspirar-desde-hoy-a-las-futuras-lideres-tecnologicas-del-manana/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/06/BBVA-STEM-lideres-tecnologicas-innovacion-768x431.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/social/reduccion-de-las-desigualdades/" >Reducción de las desigualdades</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/innovacion/inspirar-desde-hoy-a-las-futuras-lideres-tecnologicas-del-manana/" >Inspirar desde hoy a las futuras líderes tecnológicas del mañana</a></h2>
            </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-6 col-sm-6 col-xs-6">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/es/innovacion/la-universidad-pontificia-comillas-bbva-y-ntt-data-lanzan-el-primer-master-de-espana-en-tecnologias-financieras-pagos-y-banca-digital/"><i class="icon-commu_press"></i><span class="textoIconoColocar">La Universidad Pontificia Comillas, BBVA y NTT DATA lanzan el primer máster de España en tecnologías financieras, pagos y banca digital</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid">
<!-- Articulo 4x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_4x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto  col-md-6 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/juntos-creando-oportunidades/la-historia-de-alejandra-la-estudiante-de-veterinaria-que-ha-devuelto-la-esperanza-a-su-tierra/" class="linkImage"  ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/06/La-historia-de-Alejandra.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo  col-md-6 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/proyectos-bbva/fundacion-microfinanzas/" >Fundación Microfinanzas</a></p>
                <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/la-historia-de-alejandra-la-estudiante-de-veterinaria-que-ha-devuelto-la-esperanza-a-su-tierra/" >La historia de Alejandra, la estudiante de Veterinaria que ha devuelto la esperanza a su tierra</a></h2>
            </div>
                            <div class="noticia_InfoTexto">
                    <p class="notTexto">A día de hoy, la joven cumple el sueño de estudiar en la universidad con el apoyo de la Fundación Microfinanzas BBVA (FMBBVA).</p>                </div>
                    </div>
                                </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/ar/sostenibilidad/bbva-reconocio-a-ledesma-como-greenfluencer-por-su-compromiso-con-la-sostenibilidad/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/bbva-ledesma-greenfluencer-768x431.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/compromiso/proyectos-sostenibles-bbva/" >Proyectos Sostenibles BBVA</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/ar/sostenibilidad/bbva-reconocio-a-ledesma-como-greenfluencer-por-su-compromiso-con-la-sostenibilidad/" >¿Quieres conocer al séptimo 'Greenfluencer'?</a></h2>
            </div>
                            <div class="noticia_InfoTexto">
                    <p class="notTexto">'BBVA Greenfluencers’ es el programa de BBVA Corporate & Investment Banking que da voz a las iniciativas sostenibles de los clientes de la entidad.</p>                </div>
                    </div>
            </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Storytelling 2x1 sin relacionados-->
<article class="mod_noticia t_story i_cfoto i_srelac f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/las-25-fechas-mas-relevantes-del-bce-en-sus-25-anos-de-vida/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/BCE-25-anos-aniversario-finanzas-banca-BBVA-768x431.png" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/economia/sistema_financiero/banca/" >Banca</a></p>
                    <h2 class="notTitulo notEfectDest"><a href="https://www.bbva.com/es/las-25-fechas-mas-relevantes-del-bce-en-sus-25-anos-de-vida/" ><span>Las 25 fechas más relevantes del BCE en sus 25 años de vida</span></a></h2>
                </div>
            </div>
        </div>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Storytelling 2x1 sin relacionados-->
<article class="mod_noticia t_story i_cfoto i_srelac f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/innovacion/ronda-de-financiacion-que-es-y-para-que-sirve/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/06/BBVA-ronda-de-financiacion-768x431.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/innovacion/emprendimiento/" >Emprendimiento y Startups</a></p>
                    <h2 class="notTitulo notEfectDest"><a href="https://www.bbva.com/es/innovacion/ronda-de-financiacion-que-es-y-para-que-sirve/" ><span>Ronda de financiación: qué es y para qué sirve</span></a></h2>
                </div>
            </div>
        </div>
    </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/innovacion/global-finance-premia-a-bbva-por-sus-innovaciones-en-ia-sostenibilidad-y-pagos/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/BBVA-AI-Factory-v1-768x431.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/innovacion/" >Innovación</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/innovacion/global-finance-premia-a-bbva-por-sus-innovaciones-en-ia-sostenibilidad-y-pagos/" >Global Finance premia a BBVA por sus innovaciones en IA, sostenibilidad y pagos</a></h2>
            </div>
                    </div>
            </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>        </div>
            </div>
    </section>
<section class=" componente_gridNoticias">
    <div class="container">
        <div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Listado 2x0 sin foto-->
<article class="mod_noticia t_listado i_sfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion">Últimas noticias</p>
            </div>
            <div class="noticia_InfoTexto">
                <ul class="notListadoLista notLista lista_1col">
                        <li class="listaItem_middle"><a href="https://www.bbva.com/es/sostenibilidad/garanti-bbva-renueva-su-prestamo-sindicado-esg/"><i class="icon-commu_press"></i><span class="textoIconoColocar">Garanti BBVA renueva su préstamo sindicado ESG</span></a></li>
    <li class="listaItem_middle"><a href="https://www.bbva.com/es/sostenibilidad/la-quimica-elemento-clave-para-la-preservacion-del-medioambiente-y-el-desarrollo-sostenible/"><i class="icon-commu_play"></i><span class="textoIconoColocar">La química, elemento clave para la preservación del medioambiente y el desarrollo sostenible</span></a></li>
    <li class="listaItem_middle"><a href="https://www.bbva.com/es/juntos-creando-oportunidades/la-historia-de-alejandra-la-estudiante-de-veterinaria-que-ha-devuelto-la-esperanza-a-su-tierra/"><i class="icon-commu_press"></i><span class="textoIconoColocar">La historia de Alejandra, la estudiante de Veterinaria que ha devuelto la esperanza a su tierra</span></a></li>
                </ul>
            </div>
        </div>
        <div class="noticia_groupLinks col-md-12 col-sm-12 col-xs-12">
            <p class="notLink"><a href="https://www.bbva.com/es/ultimas-noticias/"><i class="icon-nav_visualize"></i><span class="textoIconoColocar">Últimas noticias</span></a></p>
        </div>
    </div>
</article>
</div><div class="col-md-6 col-sm-12 col-xs-12 grid">
<article class="mod_noticia t_bolsa i_sfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupBolsa col-md-12 col-sm-12 col-xs-12">
            <iframe src="https://tools.eurolandir.com/tools/ticker/html/?companycode=es-boy&v=tabs_redesign&lang=es-es" loading="lazy" scrolling="no" width="100%" height="100%" frameborder="0"></iframe>
        </div>
    </div>
</article>
</div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid"><article class="mod_noticia t_art i_sfoto f_4x1 notBannerResult" style="height: 100%">
    <div class="mod_noticia_box">
        <figure class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a  href="https://www.bbva.com/es/alta-newsletter/" class="linkImage"></a>
                                    <picture>
                        <source media="(min-width: 2048px)" srcset="https://www.bbva.com/wp-content/uploads/2021/06/banner-newsletter_aqua_desk.png">
                        <source media="(min-width: 1920px)" srcset="https://www.bbva.com/wp-content/uploads/2021/06/banner-newsletter_aqua_desk.png">
                        <source media="(min-width: 1536px)" srcset="https://www.bbva.com/wp-content/uploads/2021/06/banner-newsletter_aqua_desk.png">
                        <source media="(min-width: 1024px)" srcset="https://www.bbva.com/wp-content/uploads/2021/06/banner-newsletter_aqua_desk.png">
                        <source media="(min-width: 501px)" srcset="https://www.bbva.com/wp-content/uploads/2021/06/banner-newsletter_aqua_desk.png">
                        <source media="(max-width: 500px)" srcset="https://www.bbva.com/wp-content/uploads/2021/06/banner-newsletter_aqua_mob.png">

                        <img src="https://www.bbva.com/wp-content/uploads/2021/06/banner-newsletter_aqua_desk.png" alt="banner newsletter_aqua_desk" style="width: 100%;" />
                    </picture>
                            </div>
        </figure>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>    </div>
</section>
<section class=" componente_aperturaNoticias">
    <div id="e5016f99" class="container-fluid aperturaVarios">
        <div class="container">
            <div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid"><article class="mod_noticia t_art i_sfoto f_4x1 notBannerResult" style="height: 100%">
    <div class="mod_noticia_box">
        <figure class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a  href="https://www.bbva.com/es/juntos-creando-oportunidades/" class="linkImage"></a>
                                    <picture>
                        <source media="(min-width: 2048px)" srcset="https://www.bbva.com/wp-content/uploads/2022/09/banner-explicacion-juntos-desktop.png">
                        <source media="(min-width: 1920px)" srcset="https://www.bbva.com/wp-content/uploads/2022/09/banner-explicacion-juntos-desktop.png">
                        <source media="(min-width: 1536px)" srcset="https://www.bbva.com/wp-content/uploads/2022/09/banner-explicacion-juntos-desktop.png">
                        <source media="(min-width: 1024px)" srcset="https://www.bbva.com/wp-content/uploads/2022/09/banner-explicacion-juntos-desktop.png">
                        <source media="(min-width: 501px)" srcset="https://www.bbva.com/wp-content/uploads/2022/09/banner-explicacion-juntos-desktop.png">
                        <source media="(max-width: 500px)" srcset="https://www.bbva.com/wp-content/uploads/2022/09/banner-explicacion-juntos-mobile-1024x1024.png">

                        <img src="https://www.bbva.com/wp-content/uploads/2022/09/banner-explicacion-juntos-desktop.png" alt="banner explicación juntos desktop" style="width: 100%;" />
                    </picture>
                            </div>
        </figure>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><div class="row"><div class="col-md-6 col-sm-6 col-xs-6 grid"><!-- Podcast 1x1 con foto-->
<article class="mod_noticia t_pod i_cfoto f_1x1">
    <div class="mod_noticia_box">
        <p class="notLabel notLabelDuracion"><i class="icon-commu_audio"></i><span class="notLabelTexto rs_skip">14:38</span><span class="textoIconoOcultar rs_skip">Audio</span></p>
        <div class="soloDesktop">
            <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/planeta/huella-de-carbono/">Huella de Carbono</a></p>
            <div class="notHover">
                <div class="noticia_groupEsp col-md-12 col-sm-12 col-xs-12">
                    <div class="notBoxOverHidden">
                        <div class="notBoxOpacity notBoxTable">
                            <a href="#" class="linkImage modalActive linkModalPodcast jsLinkModalAudio rs_preserve" data-title="Patrones de consumo que generan huella de carbono" data-url="//traffic.libsyn.com/bbvablink/_BBVA_Blink_6T_38_-_Informe_huella_de_carbono.mp3"></a>
                                                            <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/BBVA-blink-huella-de-carbono-Research-768x431.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                                </div>
                                                        <p class="notAudio"><i class="icon-commu_audio"></i><span class="textoIconoOcultar rs_skip">Reproducir</span></p>
                        </div>
                    </div>
                </div>
                <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
                    <div class="notTriang"></div>
                    <div class="noticia_InfoHeader">
                        <h2 class="notTitulo"><a class="datalayer_podcast" data-podcastName="Podcast | Un vuelo de ida y vuelta un fin de semana y otros patrones de consumo que generan una huella de carbono muy alta" href="https://www.bbva.com/es/sostenibilidad/podcast-un-vuelo-de-ida-y-vuelta-un-fin-de-semana-y-otros-patrones-de-consumo-que-generan-una-huella-de-carbono-muy-alta/">Patrones de consumo que generan huella de carbono</a></h2>
                    </div>
                </div>
                <div class="noticia_groupLinks col-md-12 col-sm-12 col-xs-12">
                    <ul class="notAudioLista notLista lista_2col">
                        <li class="listaItem_first">
    <a href="#" class="jsLinkModalAudio rs_preserve" data-title="Patrones de consumo que generan huella de carbono" data-url="//traffic.libsyn.com/bbvablink/_BBVA_Blink_6T_38_-_Informe_huella_de_carbono.mp3"><i class="icon-commu_audio"></i><span class="textoIconoColocar rs_skip">Escuchar</span></a>
</li>
<li ><a class="datalayer_podcast_mod" data-event="descargar" href="//traffic.libsyn.com/bbvablink/_BBVA_Blink_6T_38_-_Informe_huella_de_carbono.mp3" download="//traffic.libsyn.com/bbvablink/_BBVA_Blink_6T_38_-_Informe_huella_de_carbono.mp3" title="Descargar"><i class="icon-tools_download"></i></a></li>
    <li ><a class="datalayer_podcast_mod" data-event="ivoox" href="https://www.ivoox.com/podcast-blink_sq_f1491146_1.html" target="_blank" title="iVoox"><i class="icon-ivoox"></i></a></li>
    <li ><a class="datalayer_podcast_mod" data-event="itunes" href="https://itunes.apple.com/es/podcast/bbva-blink/id1449608102?mt=2" target="_blank" title="Apple Podcast"><i class="icon-itunes"></i></a></li>
    <li ><a class="datalayer_podcast_mod" data-event="spotify" href="https://open.spotify.com/show/0hZQPDp6svlWkKz20FfKcY" target="_blank" title="Spotify"><i class="icon-spotify"></i></a></li>
    <li class="listaItem_last"><a class="datalayer_podcast_mod" data-event="google" href="https://podcasts.google.com/search/blink" target="_blank" title="Google"><i class="icon-google_podcasts"></i></a></li>
    <li class="listaItem_last"><a class="datalayer_podcast_mod" data-event="youtube" href="https://www.youtube.com/playlist?list=PL0wR-J5ft6ft2nbeQYpHHoV-mdWsi7hNe" target="_blank" title="Youtube"><i class="icon-rrss_youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="soloMobile">
            <div class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
                <div class="notBoxOverHidden">
                    <div class="notBoxOpacity notBoxTable">
                        <a href="#" class="linkImage modalActive linkModalPodcast jsLinkModalAudio rs_preserve" data-title="Patrones de consumo que generan huella de carbono" data-url="//traffic.libsyn.com/bbvablink/_BBVA_Blink_6T_38_-_Informe_huella_de_carbono.mp3"></a>
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/BBVA-blink-huella-de-carbono-Research-300x168.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                                </a>
                    </div>
                </div>
            </div>
            <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion rs_skip"><a href="https://www.bbva.com/es/sostenibilidad/planeta/huella-de-carbono/">Huella de Carbono</a></p>
                    <h2 class="notTitulo rs_skip"><a class="datalayer_podcast" data-podcastName="Podcast | Un vuelo de ida y vuelta un fin de semana y otros patrones de consumo que generan una huella de carbono muy alta" href="https://www.bbva.com/es/sostenibilidad/podcast-un-vuelo-de-ida-y-vuelta-un-fin-de-semana-y-otros-patrones-de-consumo-que-generan-una-huella-de-carbono-muy-alta/">Patrones de consumo que generan huella de carbono</a></h2>
                </div>
            </div>
        </div>
        <div class="noticia_groupLinks col-md-12 col-sm-12 col-xs-12">
            <ul class="notAudioLista notLista lista_2col">
                <li class="listaItem_first">
    <a href="#" class="jsLinkModalAudio rs_preserve" data-title="Patrones de consumo que generan huella de carbono" data-url="//traffic.libsyn.com/bbvablink/_BBVA_Blink_6T_38_-_Informe_huella_de_carbono.mp3"><i class="icon-commu_audio"></i><span class="textoIconoColocar rs_skip">Escuchar</span></a>
</li>
<li ><a class="datalayer_podcast_mod" data-event="descargar" href="//traffic.libsyn.com/bbvablink/_BBVA_Blink_6T_38_-_Informe_huella_de_carbono.mp3" download="//traffic.libsyn.com/bbvablink/_BBVA_Blink_6T_38_-_Informe_huella_de_carbono.mp3"><i class="icon-tools_download"></i></a></li>
    <li ><a title="Ivoox" class="datalayer_podcast_mod" data-event="ivoox" href="https://www.ivoox.com/podcast-blink_sq_f1491146_1.html" target="_blank"><i class="icon-ivoox"></i></a></li>
    <li ><a title="Apple Podcast" class="datalayer_podcast_mod" data-event="itunes" href="https://itunes.apple.com/es/podcast/bbva-blink/id1449608102?mt=2" target="_blank"><i class="icon-itunes"></i></a></li>
    <li ><a title="Spotify" class="datalayer_podcast_mod" data-event="spotify" href="https://open.spotify.com/show/0hZQPDp6svlWkKz20FfKcY" target="_blank"><i class="icon-spotify"></i></a></li>
    <li class="listaItem_last"><a title="Google" class="datalayer_podcast_mod" data-event="google" href="https://podcasts.google.com/search/blink" target="_blank"><i class="icon-google_podcasts"></i></a></li>
    <li class="listaItem_last"><a title="Youtube" class="datalayer_podcast_mod" data-event="youtube" href="https://www.youtube.com/playlist?list=PL0wR-J5ft6ft2nbeQYpHHoV-mdWsi7hNe" target="_blank"><i class="icon-rrss_youtube"></i></a></li>
            </ul>
        </div>
    </div>
</article></div><div class="col-md-6 col-sm-6 col-xs-6 grid"><!-- Podcast 1x1 con foto-->
<article class="mod_noticia t_pod i_cfoto f_1x1">
    <div class="mod_noticia_box">
        <p class="notLabel notLabelDuracion"><i class="icon-commu_audio"></i><span class="notLabelTexto rs_skip">08:18</span><span class="textoIconoOcultar rs_skip">Audio</span></p>
        <div class="soloDesktop">
            <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/infraestructuras/construccion-sostenible/">Construcción Sostenible</a></p>
            <div class="notHover">
                <div class="noticia_groupEsp col-md-12 col-sm-12 col-xs-12">
                    <div class="notBoxOverHidden">
                        <div class="notBoxOpacity notBoxTable">
                            <a href="#" class="linkImage modalActive linkModalPodcast jsLinkModalAudio rs_preserve" data-title="Un 78,3% de los españoles estaría dispuesto a pagar más por una vivienda más sostenible" data-url="//traffic.libsyn.com/bbvacompartiendoconocimiento/BBVA_Compartiendo_Conocimiento_6T_7_-_Vivienda_sostenible_y_el_gran_reto_al_que_se_enfrenta_el_sector_de_la_construccin_1.mp3"></a>
                                                            <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/bbva-sf-generacion-de-edificios-sostenibles--768x512.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                                </div>
                                                        <p class="notAudio"><i class="icon-commu_audio"></i><span class="textoIconoOcultar rs_skip">Reproducir</span></p>
                        </div>
                    </div>
                </div>
                <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
                    <div class="notTriang"></div>
                    <div class="noticia_InfoHeader">
                        <h2 class="notTitulo"><a class="datalayer_podcast" data-podcastName="Podcast | Un 78,3% de los espanoles estaria dispuesto a pagar mas por una vivienda mas sostenible" href="https://www.bbva.com/es/podcast-un-783-de-los-espanoles-estaria-dispuesto-a-pagar-mas-por-una-vivienda-mas-sostenible/">Un 78,3% de los españoles estaría dispuesto a pagar más por una vivienda más sostenible</a></h2>
                    </div>
                </div>
                <div class="noticia_groupLinks col-md-12 col-sm-12 col-xs-12">
                    <ul class="notAudioLista notLista lista_2col">
                        <li class="listaItem_first">
    <a href="#" class="jsLinkModalAudio rs_preserve" data-title="Un 78,3% de los españoles estaría dispuesto a pagar más por una vivienda más sostenible" data-url="//traffic.libsyn.com/bbvacompartiendoconocimiento/BBVA_Compartiendo_Conocimiento_6T_7_-_Vivienda_sostenible_y_el_gran_reto_al_que_se_enfrenta_el_sector_de_la_construccin_1.mp3"><i class="icon-commu_audio"></i><span class="textoIconoColocar rs_skip">Escuchar</span></a>
</li>
<li ><a class="datalayer_podcast_mod" data-event="descargar" href="//traffic.libsyn.com/bbvacompartiendoconocimiento/BBVA_Compartiendo_Conocimiento_6T_7_-_Vivienda_sostenible_y_el_gran_reto_al_que_se_enfrenta_el_sector_de_la_construccin_1.mp3" download="//traffic.libsyn.com/bbvacompartiendoconocimiento/BBVA_Compartiendo_Conocimiento_6T_7_-_Vivienda_sostenible_y_el_gran_reto_al_que_se_enfrenta_el_sector_de_la_construccin_1.mp3" title="Descargar"><i class="icon-tools_download"></i></a></li>
    <li ><a class="datalayer_podcast_mod" data-event="ivoox" href="https://www.ivoox.com/podcast-compartiendo-conocimiento_sq_f1908100_1.html" target="_blank" title="iVoox"><i class="icon-ivoox"></i></a></li>
    <li ><a class="datalayer_podcast_mod" data-event="itunes" href="https://podcasts.apple.com/us/podcast/bbva-compartiendo-conocimiento/id1532758086" target="_blank" title="Apple Podcast"><i class="icon-itunes"></i></a></li>
    <li ><a class="datalayer_podcast_mod" data-event="spotify" href="https://open.spotify.com/show/6lUZUH5VvN7CBuDTWToHNE" target="_blank" title="Spotify"><i class="icon-spotify"></i></a></li>
    <li class="listaItem_last"><a class="datalayer_podcast_mod" data-event="google" href="https://podcasts.google.com/feed/aHR0cHM6Ly9iYnZhY29tcGFydGllbmRvY29ub2NpbWllbnRvLmxpYnN5bi5jb20vcnNz?sa=X&ved=0CAMQ4aUDahcKEwiY4OWguNDuAhUAAAAAHQAAAAAQCw" target="_blank" title="Google"><i class="icon-google_podcasts"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="soloMobile">
            <div class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
                <div class="notBoxOverHidden">
                    <div class="notBoxOpacity notBoxTable">
                        <a href="#" class="linkImage modalActive linkModalPodcast jsLinkModalAudio rs_preserve" data-title="Un 78,3% de los españoles estaría dispuesto a pagar más por una vivienda más sostenible" data-url="//traffic.libsyn.com/bbvacompartiendoconocimiento/BBVA_Compartiendo_Conocimiento_6T_7_-_Vivienda_sostenible_y_el_gran_reto_al_que_se_enfrenta_el_sector_de_la_construccin_1.mp3"></a>
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/bbva-sf-generacion-de-edificios-sostenibles--300x200.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                                </a>
                    </div>
                </div>
            </div>
            <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion rs_skip"><a href="https://www.bbva.com/es/sostenibilidad/infraestructuras/construccion-sostenible/">Construcción Sostenible</a></p>
                    <h2 class="notTitulo rs_skip"><a class="datalayer_podcast" data-podcastName="Podcast | Un 78,3% de los espanoles estaria dispuesto a pagar mas por una vivienda mas sostenible" href="https://www.bbva.com/es/podcast-un-783-de-los-espanoles-estaria-dispuesto-a-pagar-mas-por-una-vivienda-mas-sostenible/">Un 78,3% de los españoles estaría dispuesto a pagar más por una vivienda más sostenible</a></h2>
                </div>
            </div>
        </div>
        <div class="noticia_groupLinks col-md-12 col-sm-12 col-xs-12">
            <ul class="notAudioLista notLista lista_2col">
                <li class="listaItem_first">
    <a href="#" class="jsLinkModalAudio rs_preserve" data-title="Un 78,3% de los españoles estaría dispuesto a pagar más por una vivienda más sostenible" data-url="//traffic.libsyn.com/bbvacompartiendoconocimiento/BBVA_Compartiendo_Conocimiento_6T_7_-_Vivienda_sostenible_y_el_gran_reto_al_que_se_enfrenta_el_sector_de_la_construccin_1.mp3"><i class="icon-commu_audio"></i><span class="textoIconoColocar rs_skip">Escuchar</span></a>
</li>
<li ><a class="datalayer_podcast_mod" data-event="descargar" href="//traffic.libsyn.com/bbvacompartiendoconocimiento/BBVA_Compartiendo_Conocimiento_6T_7_-_Vivienda_sostenible_y_el_gran_reto_al_que_se_enfrenta_el_sector_de_la_construccin_1.mp3" download="//traffic.libsyn.com/bbvacompartiendoconocimiento/BBVA_Compartiendo_Conocimiento_6T_7_-_Vivienda_sostenible_y_el_gran_reto_al_que_se_enfrenta_el_sector_de_la_construccin_1.mp3"><i class="icon-tools_download"></i></a></li>
    <li ><a title="Ivoox" class="datalayer_podcast_mod" data-event="ivoox" href="https://www.ivoox.com/podcast-compartiendo-conocimiento_sq_f1908100_1.html" target="_blank"><i class="icon-ivoox"></i></a></li>
    <li ><a title="Apple Podcast" class="datalayer_podcast_mod" data-event="itunes" href="https://podcasts.apple.com/us/podcast/bbva-compartiendo-conocimiento/id1532758086" target="_blank"><i class="icon-itunes"></i></a></li>
    <li ><a title="Spotify" class="datalayer_podcast_mod" data-event="spotify" href="https://open.spotify.com/show/6lUZUH5VvN7CBuDTWToHNE" target="_blank"><i class="icon-spotify"></i></a></li>
    <li class="listaItem_last"><a title="Google" class="datalayer_podcast_mod" data-event="google" href="https://podcasts.google.com/feed/aHR0cHM6Ly9iYnZhY29tcGFydGllbmRvY29ub2NpbWllbnRvLmxpYnN5bi5jb20vcnNz?sa=X&ved=0CAMQ4aUDahcKEwiY4OWguNDuAhUAAAAAHQAAAAAQCw" target="_blank"><i class="icon-google_podcasts"></i></a></li>
            </ul>
        </div>
    </div>
</article></div></div></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/salud-financiera/calculadora-presupuesto-ahorro-mensual-50-30-20/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/04/50-30-20-calculadora-bbva.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/salud-financiera/calculadora-presupuesto-ahorro-mensual-50-30-20/" >Calcula tu 50-30-20</a></h2>
            </div>
                            <div class="noticia_InfoTexto">
                    <p class="notTexto">Descubre qué parte de tus ingresos destinar a tus necesidades básicas, a gastos prescindibles y qué cantidad ahorrar todos los meses.</p>                </div>
                    </div>
            </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>        </div>
            </div>
    </section>
<section class=" componente_gridNoticias">
    <div class="container">
        <div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid"><article class="mod_noticia t_customerAutomatic i_cfoto f_4x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-3 col-sm-5 col-xs-5">
            <div class="notBoxOverHidden">
                <a href="#" class="linkImage"></a>
                <div class="notFotoBg" style="background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/noticias/noticia_accCliente_movil.png')"></div>
            </div>
        </div>
        <div class="noticia_groupInfo col-md-9 col-sm-7 col-xs-7">
            <div class="noticia_InfoHeader">
                <h2 class="notTitulo">Una <strong>nueva forma</strong> de entender la banca</h2>
            </div>
            <div class="noticia_InfoTexto moduloAcAuto">
                <p class="notTexto">Nos transformamos para poner en tus manos todas las <strong>oportunidades</strong> del mundo</p>
                <a href="https://www.bbva.com/es/bbva-en-el-mundo-transaccionales/" class="notButtonLink enlaceModuloTransacionalAuto">Descúbrelo</a>
            </div>
        </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>    </div>
</section>
<section class=" componente_gridNoticias">
    <div class="container">
        <div class="row componente_gridNoticias__cintillo"><h2>Sostenibilidad</h2></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x2 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x2 sostenibilidad ">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/sostenibilidad/el-compromiso-de-bbva-por-un-mundo-mas-verde-e-inclusivo/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2021/04/Apertura-HUB-bbva-2-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/compromiso/plan-de-accion-e-inversiones-ods/">Plan de Acción e Inversiones ODS</a></p>
                <h2 class="notTituloDest notEfectDest"> <a  href="https://www.bbva.com/es/sostenibilidad/el-compromiso-de-bbva-por-un-mundo-mas-verde-e-inclusivo/" >El compromiso de BBVA por un mundo más verde e inclusivo</a></h2>
            </div>
                            <div class="noticia_InfoTexto">
                    <p class="notTexto"><p class="notTexto">Todo lo que hace BBVA por la sostenibilidad. Un amplio repaso que llega hasta sus productos, un compromiso real.</p></p>
                </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-12 col-sm-12 col-xs-12">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/sostenibilidad/bbva-eleva-hasta-300-000-millones-de-euros-su-objetivo-de-financiacion-sostenible/"><i class="icon-commu_press"></i><span class="textoIconoColocar">BBVA eleva hasta 300.000 millones de euros su objetivo de financiación sostenible</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/sostenibilidad/bbva-forma-a-mas-de-100-000-empleados-en-sostenibilidad-en-dos-anos/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/BBVA-formacion-sostenibilidad-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/trabajo-empleo-empresa/formacion-trabajo/" >Formación</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/sostenibilidad/bbva-forma-a-mas-de-100-000-empleados-en-sostenibilidad-en-dos-anos/" >BBVA forma a más de 100.000 empleados en sostenibilidad en dos años</a></h2>
            </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-6 col-sm-6 col-xs-6">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/sostenibilidad/onur-genc-bbva-mas-de-la-mitad-de-nuestro-negocio-sostenible-en-el-primer-trimestre-del-ano-se-canalizo-en-espana-un-record/"><i class="icon-commu_press"></i><span class="textoIconoColocar">Onur Genç: “Más de la mitad de nuestro negocio sostenible en el primer trimestre del año se canalizó en España, un récord”</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article><!-- Storytelling 2x1 sin relacionados-->
<article class="mod_noticia t_story i_cfoto i_srelac f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/sostenibilidad/que-es-la-fusion-nuclear-una-fuente-de-energia-casi-inagotable-para-un-futuro-aun-lejano/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/sostenibilidad-BBVA-fusion-nuclear-768x431.jpg" style="background-position: center bottom; background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/energia/energia-nuclear/" >Energía Nuclear</a></p>
                    <h2 class="notTitulo notEfectDest"><a href="https://www.bbva.com/es/sostenibilidad/que-es-la-fusion-nuclear-una-fuente-de-energia-casi-inagotable-para-un-futuro-aun-lejano/" ><span>¿Qué es la fusión nuclear? Una fuente de energía casi inagotable para un futuro aún lejano</span></a></h2>
                </div>
            </div>
        </div>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Storytelling 2x1 sin relacionados-->
<article class="mod_noticia t_story i_cfoto i_srelac f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/sostenibilidad/los-adultos-de-entre-35-y-40-anos-emiten-un-10-mas-de-co2-que-la-media-segun-bbva-research/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/04/BBVA-reseach-informe-huella-carbono-Espana-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/planeta/huella-de-carbono/" >Huella de Carbono</a></p>
                    <h2 class="notTitulo notEfectDest"><a href="https://www.bbva.com/es/sostenibilidad/los-adultos-de-entre-35-y-40-anos-emiten-un-10-mas-de-co2-que-la-media-segun-bbva-research/" ><span>Los adultos de entre 35 y 40 años emiten un 10% más de CO2 que la media, según BBVA Research</span></a></h2>
                </div>
            </div>
        </div>
    </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/sostenibilidad/sabes-lo-importante-que-es-la-biodiversidad-para-el-planeta-bbva-te-lo-explica-en-un-nuevo-monografico-descargable/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/BBVA-monografico-biodiversidad-sostenibilidad-768x431.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/planeta/conservacion-biodiversidad/" >Conservación de la biodiversidad</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/sostenibilidad/sabes-lo-importante-que-es-la-biodiversidad-para-el-planeta-bbva-te-lo-explica-en-un-nuevo-monografico-descargable/" >¿Sabes lo importante que es la biodiversidad para el planeta? BBVA te lo explica en un nuevo monográfico descargable</a></h2>
            </div>
                    </div>
            </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>    </div>
</section>
<section class=" componente_gridNoticias">
    <div class="container">
        <div class="row componente_gridNoticias__cintillo"><h2>Salud Financiera</h2></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x2 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x2 ">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/salud-financiera/ahorrar-es-cuestion-de-cultura-en-que-pais-lo-hacen-mejor/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/BBVA-cultura-del-ahorro-salud-financiera-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/salud-financiera/ahorro/planes-ahorro/">Planes de ahorro</a></p>
                <h2 class="notTituloDest notEfectDest"> <a  href="https://www.bbva.com/es/salud-financiera/ahorrar-es-cuestion-de-cultura-en-que-pais-lo-hacen-mejor/" >Ahorrar es cuestión de cultura: ¿en qué país lo hacen mejor?</a></h2>
            </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-12 col-sm-12 col-xs-12">
        <ul class="notRelacLista notRelacConFoto lista_2col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <a class="noticiaRelac_linkFoto" href="https://www.bbva.com/es/salud-financiera/por-que-las-huchas-tienen-forma-de-cerdito-origen-y-significado/">
                            <div class="noticiaRelac_groupFoto">
                                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/04/BBVA-hucha-cerdito-150x150.jpg" style="background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                                                            </div>
                        </a>
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/salud-financiera/por-que-las-huchas-tienen-forma-de-cerdito-origen-y-significado/"><i class="icon-commu_press"></i><span class="textoIconoColocar">Por qué las huchas tienen forma de cerdito: origen y significado</span></a></h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/salud-financiera/descubre-el-potencial-de-los-viajes-sorpresa-y-otras-formas-baratas-de-viajar/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/salud-financiera-BBVA-viajes-sorpresa-barato-768x432.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/salud-financiera/ahorro/rentabilizar-ahorros/" >Rentabilizar ahorros</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/salud-financiera/descubre-el-potencial-de-los-viajes-sorpresa-y-otras-formas-baratas-de-viajar/" >Descubre el potencial de los viajes sorpresa y otras formas baratas de viajar</a></h2>
            </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-6 col-sm-6 col-xs-6">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/salud-financiera/por-que-las-huchas-tienen-forma-de-cerdito-origen-y-significado/"><i class="icon-commu_press"></i><span class="textoIconoColocar">Por qué las huchas tienen forma de cerdito: origen y significado</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article><!-- Storytelling 2x1 sin relacionados-->
<article class="mod_noticia t_story i_cfoto i_srelac f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/salud-financiera/ocho-consejos-para-ahorrar-en-la-factura-de-la-luz-la-calefaccion-y-el-agua/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2022/11/BBVA-ahorro-facturas-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/salud-financiera/ahorro/consejos-de-ahorro/" >Consejos de ahorro</a></p>
                    <h2 class="notTitulo notEfectDest"><a href="https://www.bbva.com/es/salud-financiera/ocho-consejos-para-ahorrar-en-la-factura-de-la-luz-la-calefaccion-y-el-agua/" ><span>Ocho consejos para ahorrar en la factura de la luz, la calefacción y el agua</span></a></h2>
                </div>
            </div>
        </div>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid"><!-- Videos 4x1 con foto-->
<article class="mod_noticia t_video i_cfoto f_4x1">
    <div class="mod_noticia_box">
        <p class="notLabel notLabelDuracion"><i class="icon-commu_play"></i><span class="notLabelTexto">1:12</span><span class="textoIconoOcultar">Video</span></p>
        <div class="noticia_groupEsp  col-md-6 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <div class="notBoxOpacity notBoxTable">
                    <a href="#" class="linkImage linkModalVideo jsLinkModalVideo" data-title="BBVA lanza un nuevo proyecto de divulgación sobre salud financiera" data-platform="youtube" data-url="https://www.youtube-nocookie.com/embed/-hkbH0fOK54?rel=0&amp;controls=1&amp;showinfo=0&amp;autoplay=1"></a>
                                            <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2022/03/ascender-salud-financiera-BBVA-768x363.png" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                        </div>
                                        <p class="notPlay"><i class="icon-commu_videoplayline"></i><span class="textoIconoOcultar">Ver Video</span></p>
                    <div class="notPlay circle-counter hidden"><svg height="40" width="40">
                            <circle class="background-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                            <circle class="progress-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                        </svg>
                        <div class="finalcountdown">2</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="noticia_groupInfo  col-md-6 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/salud-financiera/bienestar-financiero/">Bienestar financiero y económico</a></p>
                <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/salud-financiera/salud-financiera-una-prioridad-estrategica-de-bbva/">Salud financiera, una prioridad estratégica para BBVA</a></h2>
            </div>
        </div>
                                </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>    </div>
</section>
<section class=" componente_gridNoticias">
    <div class="container">
        <div class="row componente_gridNoticias__cintillo"><h2>Innovación</h2></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x2 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x2 ">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/innovacion/que-es-y-como-funciona-una-incubadora-de-startups/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/incubadora.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/innovacion/">Innovación</a></p>
                <h2 class="notTituloDest notEfectDest"> <a  href="https://www.bbva.com/es/innovacion/que-es-y-como-funciona-una-incubadora-de-startups/" >¿Qué es y cómo funciona una incubadora de startups?</a></h2>
            </div>
                            <div class="noticia_InfoTexto">
                    <p class="notTexto">Todos los emprendimientos nacen de una buena idea, pero no todas las nuevas ideas acaban convirtiéndose en nuevas empresas.</p>                </div>
                    </div>
            </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/innovacion/biometria-big-data-e-inteligencia-artificial-el-escudo-contra-el-fraude-del-emprendimiento/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/BBVA-ciberseguridad-innovacion-emprendimiento-768x431.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/innovacion/emprendimiento/" >Emprendimiento y Startups</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/innovacion/biometria-big-data-e-inteligencia-artificial-el-escudo-contra-el-fraude-del-emprendimiento/" >Biometría, 'big data' e inteligencia artificial, el escudo del emprendimiento contra el fraude</a></h2>
            </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-6 col-sm-6 col-xs-6">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/podcast-la-digitalizacion-una-gran-aliada-para-el-mundo-rural/"><i class="icon-commu_press"></i><span class="textoIconoColocar">La digitalización, una gran aliada para el mundo rural</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article><!-- Storytelling 2x1 sin relacionados-->
<article class="mod_noticia t_story i_cfoto i_srelac f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/innovacion/las-cinco-uves-del-big-data/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2019/01/datos-bbva-768x512.jpg" style="background-position: center bottom; background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/innovacion/data/big-data/" >Big Data</a></p>
                    <h2 class="notTitulo notEfectDest"><a href="https://www.bbva.com/es/innovacion/las-cinco-uves-del-big-data/" ><span>Las cinco uves del big data</span></a></h2>
                </div>
            </div>
        </div>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Storytelling 2x1 sin relacionados-->
<article class="mod_noticia t_story i_cfoto i_srelac f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/es/palabra-de-amigo-por-que-los-programas-de-fidelizacion-y-recomendacion-impulsan-el-crecimiento-de-las-empresas/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/palabra-de-amigo-768x431.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/economia/sistema_financiero/banca-digital/" >Banca digital</a></p>
                    <h2 class="notTitulo notEfectDest"><a href="https://www.bbva.com/es/es/palabra-de-amigo-por-que-los-programas-de-fidelizacion-y-recomendacion-impulsan-el-crecimiento-de-las-empresas/" ><span>"Palabra de amigo": por qué los programas de fidelización y recomendación impulsan el crecimiento de las empresas</span></a></h2>
                </div>
            </div>
        </div>
    </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/innovacion/marketing-para-emprendedores-consejos-para-triunfar/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/04/marketing-digital-para-emprendedores-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/innovacion/emprendimiento/" >Emprendimiento y Startups</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/innovacion/marketing-para-emprendedores-consejos-para-triunfar/" >Marketing para emprendedores: consejos para triunfar</a></h2>
            </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-6 col-sm-6 col-xs-6">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/es/innovacion/ayudas-y-subvenciones-para-los-jovenes-emprendedores/"><i class="icon-commu_press"></i><span class="textoIconoColocar">Ayudas y subvenciones para los jóvenes emprendedores</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>    </div>
</section>
<section class=" componente_gridNoticias">
    <div class="container">
        <div class="row componente_gridNoticias__cintillo"><h2>Economía y Finanzas</h2></div><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid">
<!-- Articulo 4x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_4x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto  col-md-6 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/bbva-research-eleva-su-prevision-de-crecimiento-para-espana-en-2023-al-16/" class="linkImage"  ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/03/BBVA-research-situacion-espana-2023-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo  col-md-6 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/economia/analisis-economico/" >Análisis económico</a></p>
                <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/bbva-research-eleva-su-prevision-de-crecimiento-para-espana-en-2023-al-16/" >BBVA Research eleva su previsión de crecimiento para España en 2023 al 1,6%</a></h2>
            </div>
                    </div>
                        <div class="noticia_groupRelacionados col-md-6 col-sm-12 col-xs-12">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/es/bbva-research-revisa-al-alza-el-crecimiento-del-pib-de-todas-las-ccaa-en-2023-por-el-impulso-de-la-industria-y-del-turismo/"><i class="icon-commu_press"></i><span class="textoIconoColocar">BBVA Research revisa al alza el crecimiento del PIB de todas las CCAA en 2023 por el impulso de la industria y del turismo</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
            </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/union-bancaria-europea-las-ventajas-de-tener-un-fondo-de-garantia-de-depositos-comun/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2021/08/FGD-Europeo-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/economia/sistema_financiero/regulacion-financiera/" >Regulación financiera</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/union-bancaria-europea-las-ventajas-de-tener-un-fondo-de-garantia-de-depositos-comun/" >Unión Bancaria Europea: ¿por qué es tan importante tener un fondo de garantía de depósitos común?</a></h2>
            </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-6 col-sm-6 col-xs-6">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/innovacion/regulacion-europea-sobre-mercados-de-criptoactivos-mica-que-es-y-por-que-es-importante/"><i class="icon-commu_press"></i><span class="textoIconoColocar">Regulación europea sobre Mercados de Criptoactivos (MiCA): ¿Qué es y por qué es importante?</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/es/salud-financiera/es-2023-un-buen-momento-para-comprar-una-casa-en-espana/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/04/2023-comprar-casa-Espana-salud-financiera.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/salud-financiera/deuda/compra-de-vivienda/" >Compra de vivienda</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/es/salud-financiera/es-2023-un-buen-momento-para-comprar-una-casa-en-espana/" >¿Es 2023 un buen momento para comprar una casa en España?</a></h2>
            </div>
                    </div>
            </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid">
<!-- Articulo 4x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_4x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto  col-md-6 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/es/bbva-research-estima-que-las-comunidades-mas-industriales-impulsen-el-crecimiento-del-pib-en-espana-en-2023-y-2024/" class="linkImage"  ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2022/12/ObservatorioRegional-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo  col-md-6 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/economia/analisis-economico/" >Análisis económico</a></p>
                <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/es/bbva-research-estima-que-las-comunidades-mas-industriales-impulsen-el-crecimiento-del-pib-en-espana-en-2023-y-2024/" >BBVA Research estima que las comunidades más industriales impulsen el crecimiento del PIB en España en 2023 y 2024</a></h2>
            </div>
                    </div>
                                </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>    </div>
</section>
<section class=" componente_gridNoticias">
    <div class="container">
        <div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid"><article class="mod_noticia t_art i_sfoto f_4x1 notBannerResult" style="height: 100%">
    <div class="mod_noticia_box">
        <figure class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a target="_blank" href="https://bbva.info/3mh1oPf" class="linkImage"></a>
                                    <picture>
                        <source media="(min-width: 2048px)" srcset="https://www.bbva.com/wp-content/uploads/2022/06/Banners-Aprendemos-Juntos-2030-4X1.jpg">
                        <source media="(min-width: 1920px)" srcset="https://www.bbva.com/wp-content/uploads/2022/06/Banners-Aprendemos-Juntos-2030-4X1.jpg">
                        <source media="(min-width: 1536px)" srcset="https://www.bbva.com/wp-content/uploads/2022/06/Banners-Aprendemos-Juntos-2030-4X1.jpg">
                        <source media="(min-width: 1024px)" srcset="https://www.bbva.com/wp-content/uploads/2022/06/Banners-Aprendemos-Juntos-2030-4X1.jpg">
                        <source media="(min-width: 501px)" srcset="https://www.bbva.com/wp-content/uploads/2022/06/Banners-Aprendemos-Juntos-2030-4X1.jpg">
                        <source media="(max-width: 500px)" srcset="https://www.bbva.com/wp-content/uploads/2022/06/Banners-Aprendemos-Juntos-2030.jpg">

                        <img src="https://www.bbva.com/wp-content/uploads/2022/06/Banners-Aprendemos-Juntos-2030-4X1.jpg" alt="" style="width: 100%;" />
                    </picture>
                            </div>
        </figure>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>    </div>
</section>
<section class=" componente_gridNoticias">
    <div class="container">
        <div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid"><article class="mod_noticia t_art i_sfoto f_4x1 notBannerResult" style="height: 100%">
    <div class="mod_noticia_box">
        <figure class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a  href="https://www.bbva.com/es/especiales/resultadosbbva/" class="linkImage"></a>
                                    <picture>
                        <source media="(min-width: 2048px)" srcset="https://www.bbva.com/wp-content/uploads/2023/04/RESULTADOS-Banners-1T2023_CAS-RESULTADOS-4x1-1.png">
                        <source media="(min-width: 1920px)" srcset="https://www.bbva.com/wp-content/uploads/2023/04/RESULTADOS-Banners-1T2023_CAS-RESULTADOS-4x1-1.png">
                        <source media="(min-width: 1536px)" srcset="https://www.bbva.com/wp-content/uploads/2023/04/RESULTADOS-Banners-1T2023_CAS-RESULTADOS-4x1-1.png">
                        <source media="(min-width: 1024px)" srcset="https://www.bbva.com/wp-content/uploads/2023/04/RESULTADOS-Banners-1T2023_CAS-RESULTADOS-4x1-1.png">
                        <source media="(min-width: 501px)" srcset="https://www.bbva.com/wp-content/uploads/2023/04/RESULTADOS-Banners-1T2023_CAS-RESULTADOS-4x1-1.png">
                        <source media="(max-width: 500px)" srcset="https://www.bbva.com/wp-content/uploads/2023/04/RESULTADOS-Banners-1T2023_CAS-RESULTADOS-2x1-1.png">

                        <img src="https://www.bbva.com/wp-content/uploads/2023/04/RESULTADOS-Banners-1T2023_CAS-RESULTADOS-4x1-1.png" alt="" style="width: 100%;" />
                    </picture>
                            </div>
        </figure>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>    </div>
</section>
<section class=" componente_aperturaNoticias">
    <div id="4332f8ac" class="container-fluid aperturaVarios">
        <div class="container">
            <div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Storytelling 2x2 sin relacionados-->
<article class="mod_noticia t_story i_cfoto i_srelac f_2x2 ">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/sostenibilidad/bbva-alcanza-150-000-millones-de-euros-en-negocio-sostenible-la-mitad-de-su-objetivo-hasta-2025/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/04/BBVA-inversion-sostenible-1024x629.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/compromiso/" >Compromiso</a></p>
                    <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/sostenibilidad/bbva-alcanza-150-000-millones-de-euros-en-negocio-sostenible-la-mitad-de-su-objetivo-hasta-2025/" ><span>BBVA alcanza 150.000 millones de euros en negocio sostenible, la mitad de su objetivo hasta 2025</span></a></h2>
                </div>
            </div>
        </div>
    </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Videos 2x2 con foto-->
<article class="mod_noticia t_video i_cfoto f_2x2">
    <div class="mod_noticia_box">
        <p class="notLabel notLabelDuracion"><i class="icon-commu_play"></i><span class="notLabelTexto">1:34</span><span class="textoIconoOcultar">Video</span></p>
        <div class="noticia_groupEsp col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <div class="notBoxOpacity notBoxTable">
                    <a href="#" class="linkImage linkModalVideo jsLinkModalVideo" data-title="Declaraciones del consejero delegado de BBVA, Onur Genç, sobre los Resultados 1T2023" data-platform="youtube" data-url="https://www.youtube-nocookie.com/embed/Z57kSUw-ywc?rel=0&amp;controls=1&amp;showinfo=0&amp;autoplay=1"></a>
                                            <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/04/BBVA-resultados-1T23-Onur.jpg" style="background-position: center calc(30%); background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                        </div>
                                        <p class="notPlay"><i class="icon-commu_videoplayline"></i><span class="textoIconoOcultar">Ver Video</span></p>
                    <div class="notPlay circle-counter hidden"><svg height="40" width="40">
                            <circle class="background-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                            <circle class="progress-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                        </svg>
                        <div class="finalcountdown">2</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/economia/economia-de-la-empresa/cuenta-resultados/">Cuenta de resultados</a></p>
                <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/resultados-1t23/">Resultados: BBVA gana 1.846 millones de euros en el primer trimestre (+39,4%)</a></h2>
            </div>
        </div>
            </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>        </div>
            </div>
    </section>
<section class=" componente_gridNoticias">
    <div class="container">
        <div class="row componente_gridNoticias__cintillo"><h2>Junta General de Accionistas 2023</h2></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Videos 2x2 con foto-->
<article class="mod_noticia t_video i_cfoto f_2x2">
    <div class="mod_noticia_box">
        <p class="notLabel notLabelDuracion"><i class="icon-commu_play"></i><span class="notLabelTexto">1:38</span><span class="textoIconoOcultar">Video</span></p>
        <div class="noticia_groupEsp col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <div class="notBoxOpacity notBoxTable">
                    <a href="#" class="linkImage linkModalVideo jsLinkModalVideo" data-title="Declaraciones del presidente de BBVA, en la Junta General de Accionistas" data-platform="youtube" data-url="https://www.youtube-nocookie.com/embed/qGMEXgzmJRU?rel=0&amp;controls=1&amp;showinfo=0&amp;autoplay=1"></a>
                                            <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/03/carlos-torres-vila-onur-genc-JGA-23.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                        </div>
                                        <p class="notPlay"><i class="icon-commu_videoplayline"></i><span class="textoIconoOcultar">Ver Video</span></p>
                    <div class="notPlay circle-counter hidden"><svg height="40" width="40">
                            <circle class="background-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                            <circle class="progress-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                        </svg>
                        <div class="finalcountdown">2</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/economia/economia-de-la-empresa/junta-accionistas/">Junta de accionistas</a></p>
                <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/en-bbva-encaramos-2023-con-confianza-y-perspectivas-de-crecimiento-rentable-en-nuestros-mercados-principales/">"En BBVA encaramos 2023 con confianza y perspectivas de crecimiento rentable en nuestros mercados principales"</a></h2>
            </div>
        </div>
            </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Storytelling 2x2 sin relacionados-->
<article class="mod_noticia t_story i_cfoto i_srelac f_2x2 ">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/bbva-inicia-su-nuevo-plan-de-recompra-de-acciones-de-hasta-422-millones-de-euros/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2022/04/Apertura_Resultados-2-1024x629.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/economia/economia-de-la-empresa/junta-accionistas/" >Junta de accionistas</a></p>
                    <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/bbva-inicia-su-nuevo-plan-de-recompra-de-acciones-de-hasta-422-millones-de-euros/" ><span>BBVA inicia su nuevo plan de recompra de acciones, de hasta 422 millones de euros</span></a></h2>
                </div>
            </div>
        </div>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid"><!-- Videos 4x1 con foto-->
<article class="mod_noticia t_video i_cfoto f_4x1">
    <div class="mod_noticia_box">
        <p class="notLabel notLabelDuracion"><i class="icon-commu_play"></i><span class="notLabelTexto">2:48</span><span class="textoIconoOcultar">Video</span></p>
        <div class="noticia_groupEsp  col-md-6 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <div class="notBoxOpacity notBoxTable">
                    <a href="#" class="linkImage linkModalVideo jsLinkModalVideo" data-title="BBVA en 2022" data-platform="youtube" data-url="https://www.youtube-nocookie.com/embed/Ozx0w_RDQY0?rel=0&amp;controls=1&amp;showinfo=0&amp;autoplay=1"></a>
                                            <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2021/01/BBVA-taxonomia-UE-vela-arquitectura-blanca-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                        </div>
                                        <p class="notPlay"><i class="icon-commu_videoplayline"></i><span class="textoIconoOcultar">Ver Video</span></p>
                    <div class="notPlay circle-counter hidden"><svg height="40" width="40">
                            <circle class="background-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                            <circle class="progress-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                        </svg>
                        <div class="finalcountdown">2</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="noticia_groupInfo  col-md-6 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/economia/economia-de-la-empresa/informacion-corporativa/">Información corporativa</a></p>
                <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/bbva-en-2022-video-resumen-del-ano/">BBVA en 2022, vídeo resumen del año</a></h2>
            </div>
        </div>
                                </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://bbva.info/3IPo7ga" class="linkImage" target="_blank"></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2022/03/Carlos-Torres-Vila-Presidente-carta-BBVA.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"></p>
                <h2 class="notTitulo"><a href="https://bbva.info/3IPo7ga" target="_blank">Carta del presidente de BBVA, Carlos Torres Vila, a los accionistas</a></h2>
            </div>
                            <div class="noticia_InfoTexto">
                                    </div>
                    </div>
            </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://bbva.info/3J8MYNw" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2022/03/onur-genc-carta-bbva.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"></p>
                <h2 class="notTitulo"><a href="https://bbva.info/3J8MYNw" >Carta del consejero delegado de BBVA, Onur Genç, a los accionistas</a></h2>
            </div>
                            <div class="noticia_InfoTexto">
                                    </div>
                    </div>
            </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>    </div>
</section>
<section class=" componente_gridNoticias">
    <div class="container">
        <div class="row componente_gridNoticias__cintillo"><h2>Nuestra diversidad</h2></div><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 grid">
<!-- Articulo 4x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_4x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto  col-md-6 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/sostenibilidad/bbva-implanta-una-politica-de-diversidad-para-impulsar-su-compromiso-con-la-inclusion/" class="linkImage"  ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2022/10/BBVA-Diversity-days-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo  col-md-6 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/social/diversidad/" >Diversidad</a></p>
                <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/sostenibilidad/bbva-implanta-una-politica-de-diversidad-para-impulsar-su-compromiso-con-la-inclusion/" >BBVA implanta una Política de Diversidad para impulsar su compromiso con la inclusión</a></h2>
            </div>
                    </div>
                        <div class="noticia_groupRelacionados col-md-6 col-sm-12 col-xs-12">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/sostenibilidad/asi-promueve-bbva-la-inclusion-laboral-de-profesionales-con-discapacidad/"><i class="icon-commu_press"></i><span class="textoIconoColocar">Así promueve BBVA la inclusión laboral de profesionales con discapacidad</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
            </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Videos 2x2 con foto-->
<article class="mod_noticia t_video i_cfoto f_2x2">
    <div class="mod_noticia_box">
        <p class="notLabel notLabelDuracion"><i class="icon-commu_play"></i><span class="notLabelTexto">54:18</span><span class="textoIconoOcultar">Video</span></p>
        <div class="noticia_groupEsp col-md-12 col-sm-12 col-xs-12">
            <div class="notBoxOverHidden">
                <div class="notBoxOpacity notBoxTable">
                    <a href="#" class="linkImage linkModalVideo jsLinkModalVideo" data-title="V. Completa. Preguntas y respuestas sobre el cosmos. Carlos Briones, científico y escritor" data-platform="youtube" data-url="https://www.youtube-nocookie.com/embed/_QBsezgXD9g?rel=0&amp;controls=1&amp;showinfo=0&amp;autoplay=1"></a>
                                            <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2022/08/BBVA-mujeres-cientificas-podcast-aprendemos-juntos-2030-768x472.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                        </div>
                                        <p class="notPlay"><i class="icon-commu_videoplayline"></i><span class="textoIconoOcultar">Ver Video</span></p>
                    <div class="notPlay circle-counter hidden"><svg height="40" width="40">
                            <circle class="background-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                            <circle class="progress-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                        </svg>
                        <div class="finalcountdown">2</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/">Sostenibilidad</a></p>
                <h2 class="notTituloDest notEfectDest"><a href="https://www.bbva.com/es/sostenibilidad/video-por-que-es-necesaria-la-igualdad-de-genero-en-la-ciencia-el-importante-papel-de-las-mujeres/">¿Por qué es necesaria la igualdad de género en la ciencia? El importante papel de las mujeres</a></h2>
            </div>
        </div>
                    <div class="noticia_groupRelacionados col-md-12 col-sm-12 col-xs-12">
                <h4 class="notRelacTituloGroup visible-xs">Relacionados</h4>
                <ul class="notRelacLista notRelacConFoto lista_2col">
                                            <li class="listaItem_first">
                            <article class="mod_noticiaRelacionada">
                                <a class="noticiaRelac_linkFoto" href="https://www.bbva.com/es/sostenibilidad/bbva-be-yourself-la-diversidad-es-un-hecho-la-inclusion-una-actitud/">
                                    <div class="noticiaRelac_groupFoto">
                                        <div class="notBoxOpacity notBoxTable">
                                            <div class="notFotoBg" style="background-image:url('https://www.bbva.com/wp-content/uploads/2021/06/44e4ae872402f665242f4cbe559aa680-150x150.jpg')">
                                            </div>
                                            <i class="icon-commu_videoplayline"></i>
                                        </div>
                                    </div>
                                </a>
                                <div class="noticiaRelac_groupInfo">
                                    <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/sostenibilidad/bbva-be-yourself-la-diversidad-es-un-hecho-la-inclusion-una-actitud/"><i class="icon-commu_play"></i><span class="textoIconoColocar">BBVA Be Yourself: La diversidad es un hecho; la inclusión, una actitud</span></a></h2>
                                </div>
                            </article>
                        </li>
                                                                <li class="listaItem_last">
                            <article class="mod_noticiaRelacionada">
                                <a class="noticiaRelac_linkFoto" href="https://www.bbva.com/es/sostenibilidad/video-como-combatir-los-microracismos-integrados-en-la-sociedad/">
                                    <div class="noticiaRelac_groupFoto">
                                        <div class="notBoxOpacity notBoxTable">
                                            <div class="notFotoBg" style="background-image:url('https://www.bbva.com/wp-content/uploads/2022/07/c02b99675279412814055cb21d02979e-150x150.jpg')">
                                            </div>
                                            <i class="icon-commu_videoplayline"></i>
                                        </div>
                                    </div>
                                </a>
                                <div class="noticiaRelac_groupInfo">
                                    <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/sostenibilidad/video-como-combatir-los-microracismos-integrados-en-la-sociedad/"><i class="icon-commu_play"></i><span class="textoIconoColocar">¿Cómo combatir los microracismos integrados en la sociedad?</span></a></h2>
                                </div>
                            </article>
                        </li>
                                    </ul>
            </div>
            </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Storytelling 2x1 con relacionados-->
<article class="mod_noticia t_story i_cfoto i_crelac f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/sostenibilidad/mama-soy-trans-como-ayudar-a-los-hijos-e-hijas-lgtbi/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2021/11/Mamá-soy-trans-cómo-ayudar-a-los-hijos-e-hijas-LGTBI-768x472.jpg" style="background-position: center calc(30%); background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/social/diversidad/" >Diversidad</a></p>
                    <h2 class="notTitulo notEfectDest"><a href="https://www.bbva.com/es/sostenibilidad/mama-soy-trans-como-ayudar-a-los-hijos-e-hijas-lgtbi/" ><span>“Mamá, soy trans”: cómo ayudar a los hijos e hijas LGTBI</span></a></h2>
                </div>
            </div>
        </div>
            <div class="noticia_groupRelacionados col-md-12 col-sm-12 col-xs-12">
        <ul class="notRelacLista notRelacSinFoto lista_2col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/sostenibilidad/ocho-ejemplos-practicos-de-como-aplicar-el-lenguaje-inclusivo-al-hablar-o-escribir/"><i class="icon-commu_press"></i><span class="textoIconoColocar">Ocho ejemplos prácticos de cómo aplicar el lenguaje inclusivo al hablar o escribir</span></a> </h2>
                        </div>
                    </article>
                </li>
                                        <li class="listaItem_last">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/sostenibilidad/lgtbiq-que-hay-detras-de-las-siglas/"><i class="icon-commu_press"></i><span class="textoIconoColocar">LGTBIQ+: Qué hay detrás de las siglas</span></a></h2>
                        </div>
                    </article>
                </li>
                    </ul>
    </div>
    </div>
</article><div class="row"><div class="col-md-6 col-sm-6 col-xs-6 grid"><!-- Videos 1x1 con foto-->
<article class="mod_noticia t_video i_cfoto f_1x1">
    <div class="mod_noticia_box">
        <p class="notLabel notLabelDuracion"><i class="icon-commu_play"></i><span class="notLabelTexto"></span><span class="textoIconoOcultar rs_skip">Video</span></p>
        <div class="soloDesktop">
            <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/social/diversidad/">Diversidad</a></p>
            <div class="notHover">
                <div class="noticia_groupFoto col-md-12 col-sm-12 col-xs-12">
                    <div class="notBoxOverHidden">
                        <div class="notBoxOpacity notBoxTable">
                            <a href="#" class="linkImage linkModalVideo jsLinkModalVideo rs_preserve" data-title="La diversidad es un hecho, la inclusión una actitud" data-platform="youtube" data-url="https://www.youtube-nocookie.com/embed/o-JcYi7eY7I?rel=0&amp;controls=1&amp;showinfo=0&amp;autoplay=1"></a>
                                                            <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2021/06/La-Vela-de-BBVA-iluminada-por-el-Orgullo-2021-768x512.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                                </div>
                                                        <p class="notPlay"><i class="icon-commu_videoplayline"></i><span class="textoIconoOcultar rs_skip">Ver Video</span></p>
                            <div class="notPlay circle-counter hidden"><svg height="40" width="40">
                                    <circle class="rs_skip background-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                                    <circle class="rs_skip progress-ring" cx="20" cy="20" r="18" stroke="white" stroke-width="2" fill="transparent" />
                                </svg>
                                <div class="rs_skip finalcountdown">2</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
                    <div class="notTriang"></div>
                    <div class="noticia_InfoHeader">
                        <h2 class="notTitulo"><a href="https://www.bbva.com/es/sostenibilidad/bbva-be-yourself-la-diversidad-es-un-hecho-la-inclusion-una-actitud/">BBVA Be Yourself: La diversidad es un hecho; la inclusión, una actitud</a></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="soloMobile">
            <div class="noticia_groupEsp col-xs-12">
                <div class="notBoxOverHidden">
                    <div class="notBoxOpacity notBoxTable">
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2021/06/La-Vela-de-BBVA-iluminada-por-el-Orgullo-2021-768x512.jpg" style="background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                                <p class="notPlay rs_skip"><i class="icon-commu_videoplayline"></i><span class="textoIconoOcultar">Ver Video</span></p>
                    </div>
                </div>
            </div>
            <div class="noticia_groupInfo col-xs-12">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion rs_skip"><a href="https://www.bbva.com/es/sostenibilidad/social/diversidad/">Diversidad</a></p>
                    <h2 class="notTitulo rs_skip"><a href="https://www.bbva.com/es/sostenibilidad/bbva-be-yourself-la-diversidad-es-un-hecho-la-inclusion-una-actitud/">BBVA Be Yourself: La diversidad es un hecho; la inclusión, una actitud</a></h2>
                </div>
            </div>
        </div>
    </div>
</article></div><div class="col-md-6 col-sm-6 col-xs-6 grid"><!-- Articulo 1x1 sin foto-->
<article class="mod_noticia t_art i_sfoto f_1x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupInfo col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/social/diversidad/" >Diversidad</a></p>
                <h2 class="notTitulo"><a  href="https://www.bbva.com/es/sostenibilidad/bbva-preside-redi-la-red-empresarial-por-la-diversidad-e-inclusion-lgtbi-en-espana/">BBVA preside REDI, la Red Empresarial por la Diversidad e Inclusión LGTBI en España</a></h2>
            </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-12 col-sm-12 col-xs-12">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/sostenibilidad/bbva-entre-las-top-diversity-companies-segun-intrama/"><i class="icon-commu_press"></i><span class="textoIconoColocar">BBVA, entre las Top Diversity Companies según Intrama</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article>
</div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="row"><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Storytelling 2x1 con relacionados-->
<article class="mod_noticia t_story i_cfoto i_crelac f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupStory col-md-12 col-sm-12 col-xs-12">
            <div class="noticia_groupFoto">
                <div class="notBoxOverHidden">
                    <a href="https://www.bbva.com/es/sostenibilidad/bbva-promueve-la-diversidad-generacional-entre-su-plantilla/" >
                                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2023/05/diversidad-generacional-BBVA-empleados-768x472.jpg" style="background-position: center calc(40%); background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')">
                            </div>
                                            </a>
                </div>
            </div>
            <div class="noticia_groupInfo">
                <div class="noticia_InfoHeader">
                    <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/social/diversidad/" >Diversidad</a></p>
                    <h2 class="notTitulo notEfectDest"><a href="https://www.bbva.com/es/sostenibilidad/bbva-promueve-la-diversidad-generacional-entre-su-plantilla/" ><span>BBVA promueve la diversidad generacional entre su plantilla</span></a></h2>
                </div>
            </div>
        </div>
            <div class="noticia_groupRelacionados col-md-12 col-sm-12 col-xs-12">
        <ul class="notRelacLista notRelacSinFoto lista_2col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/sostenibilidad/bbva-recibe-el-certificado-best-women-talent-company/"><i class="icon-commu_press"></i><span class="textoIconoColocar">BBVA recibe el certificado 'Best Women Talent Company'</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article></div><div class="col-md-6 col-sm-12 col-xs-12 grid"><!-- Articulo 2x1 con foto-->
<article class="mod_noticia t_art i_cfoto f_2x1">
    <div class="mod_noticia_box">
        <div class="noticia_groupFoto col-md-6 col-sm-6 col-xs-6">
            <div class="notBoxOverHidden">
                <a href="https://www.bbva.com/es/sostenibilidad/bbva-premiado-por-sus-iniciativas-a-favor-de-las-personas-lgbti/" class="linkImage" ></a>
                                    <div class="notFotoBg lazyBackground" data-lazy-bg="https://www.bbva.com/wp-content/uploads/2022/11/BBVA-recoge-el-premio-Top-LGBTI-Diversity-Company-768x442.jpg" style=" background-image:url('https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bg_white_lazy_load.png')"></div>
                            </div>
        </div>
        <div class="noticia_groupInfo col-md-6 col-sm-6 col-xs-6">
            <div class="noticia_InfoHeader">
                <p class="notSeccion"><a href="https://www.bbva.com/es/sostenibilidad/social/diversidad/" >Diversidad</a></p>
                <h2 class="notTitulo"><a href="https://www.bbva.com/es/sostenibilidad/bbva-premiado-por-sus-iniciativas-a-favor-de-las-personas-lgbti/" >BBVA, premiado por sus iniciativas a favor de las personas LGBTI+</a></h2>
            </div>
                    </div>
            <div class="noticia_groupRelacionados col-md-6 col-sm-6 col-xs-6">
        <ul class="notRelacLista notRelacSinFoto lista_1col">
                            <li class="listaItem_first">
                    <article class="mod_noticiaRelacionada">
                        <div class="noticiaRelac_groupInfo">
                            <h2 class="notRelacTitulo"><a class="noticiaRelac_linkTitulo" href="https://www.bbva.com/es/sostenibilidad/bbva-implanta-una-politica-de-diversidad-para-impulsar-su-compromiso-con-la-inclusion/"><i class="icon-commu_press"></i><span class="textoIconoColocar">BBVA implanta una Política de Diversidad para impulsar su compromiso con la inclusión</span></a> </h2>
                        </div>
                    </article>
                </li>
                                </ul>
    </div>
    </div>
</article></div></div><div class="vc_row-full-width vc_clearfix"></div>    </div>
</section>
    <!-- Modal -->
<div class="modal fade modalPodcast jsModalAudio rs_skip" tabindex="-1" role="dialog" id="modalPodcast">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-footer">
                <div class="container">
                    <div class="player">
                        <i class="icon-commu_audio"></i>
                        <span>Escuchando</span>
                    </div>
                    <div class="title jsAudioTitle">

                    </div>
                    <div class="audioPodcast jsAudioContainer">
                    </div>
                    <button type="button" class="close jsCollectTrigger" data-dismiss="modal" aria-label="Close"><i aria-hidden="true" class="icon-nav_close"></i></button>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- Modal -->
<div class="modal fade modalVideo jsModalVideo rs_skip" tabindex="-1" role="dialog" id="modalVideo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container jsIframeContainer">
                </div>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <div class="player">
                        <i class="icon-commu_play"></i>
                        <span>Viendo</span>
                    </div>
                    <div class="title">
                        <span class="jsVideoTitle"></span>
                    </div>
                    <button type="button" class="close jsCollectTrigger" data-dismiss="modal" aria-label="Close"><i aria-hidden="true" class="icon-nav_close"></i></button>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</main><!-- #main -->

<footer id="footerMenuContent" class="footer-main rs_skip" data-menu-version="20230325151116">
      <div class="preFooter-main">
      <div class="footer-container container">
          <div class="bloquesPreFooter"><div class="row tituloBloquesPreFooter"><p class="tituloNegrita">Échale un vistazo</p></div><div class="row enlacesBloquesPreFooter"><div class="col_1 col-xs-6 col-sm-3"><p><a href="https://www.bbva.com/es/alta-newsletter/">Newsletter</a></p></div><div class="col_2 col-xs-6 col-sm-3"><p><a href="https://www.bbva.com/es/especiales/resultadosbbva/">Resultados BBVA</a></p></div><div class="clearfix visible-xs"></div><div class="col_3 col-xs-6 col-sm-3"><p><a href="https://aprendemosjuntos.bbva.com/">Aprendemos Juntos</a></p></div><div class="col_4 col-xs-6 col-sm-3"><p><a href="https://vdp.bbva.com">Reporte Vulnerabilidades</a></p></div></div></div>
      </div>
  </div>
  <div id="preFooterMovile-main" class="preFooterMovile-main" role="tablist" aria-multiselectable="true">
      <div class="preFooterMovile-container"><h2 class="subtituloPreFooterMovile firstItem" id="button484379" role="tab"><a role="button" data-toggle="collapse" data-target="#484379" class="buttonPrefooterMovile"><span class="tituloNegrita">Échale un vistazo</span><i id="flecha484379" class=" icon-nav_unfold" aria-hidden="true"></i></a></h2><div id="484379" class="collapse"><ul><li><a href="https://www.bbva.com/es/alta-newsletter/">Newsletter</a></li><li><a href="https://www.bbva.com/es/especiales/resultadosbbva/">Resultados BBVA</a></li><li><a href="https://aprendemosjuntos.bbva.com/">Aprendemos Juntos</a></li><li><a href="https://vdp.bbva.com">Reporte Vulnerabilidades</a></li></ul></div></div>
  </div>
  <div class="bbvaFooter-main">
      <div class="footer-container container">
          <div id="bloqueLogo" class="col-md-9 col-xs-12">
              <div class="row legal_marcaBBVA">
                                        <a class="home-redirec" href="https://www.bbva.com/es"><img height="56" width="211" src="https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bbva_footer_dkt_es.png" alt="logo BBVA" class="imgLogoMarca_md"></a>
                      <a class="home-redirec" href="https://www.bbva.com/es"><img height="56" width="211" src="https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/comun/bbva_footer_dkt_es.png" alt="logo BBVA" class="imgLogoMarca_xs"></a>
                                </div>
          </div>
          <div id="bloqueSocial" class="col-md-3 col-xs-12">
              <ul class="lista_enlacesFooterSocial">

                  <li><a href="https://www.facebook.com/BBVAGroup/" target="_blank"><i class="icon-rrss_facebook"></i></a></li><li><a href="https://twitter.com/bbva" target="_blank"><i class="icon-rrss_twitter"></i></a></li><li><a href="https://www.linkedin.com/company/bbva" target="_blank"><i class="icon-rrss_linkedin"></i></a></li><li><a href="https://www.youtube.com/subscription_center?add_user=bbva" target="_blank"><i class="icon-rrss_youtube"></i></a></li><li><a href="https://instagram.com/bbva/" target="_blank"><i class="icon-rrss_instagram"></i></a></li><li><a href="https://www.snapchat.com/add/bbvaworld/" target="_blank"><i class="icon-rrss_snapchat"></i></a></li>
              </ul>
          </div>
          <div id="bloqueLegal" class="col-md-12 col-xs-12">
              <div class="row legal_enlacesBBVA">

                  <ul id="menu-menu-footer" class="lista_enlacesFooterLegal"><li id="menu-item-1734" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1734"><a title="modal" href="https://www.bbva.com/es/aviso-legal/">Aviso legal</a></li>
<li id="menu-item-495735" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-495735"><a href="https://www.bbva.com/es/politica-de-cookies/">Cookies</a></li>
<li id="menu-item-495736" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-495736"><a href="https://www.bbva.com/es/politica-proteccion-datos-personales/">Datos Personales</a></li>
<li id="menu-item-483659" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483659"><a href="https://www.bbva.com/es/mapa-del-sitio/">Mapa del sitio</a></li>
<li id="menu-item-1767" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1767"><a href="https://www.bbva.com/es/seguridad/">Seguridad</a></li>
<li id="menu-item-48105" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-48105"><a href="https://www.bbva.com/es/rss/notas-de-prensa">RSS</a></li>
<li id="menu-item-18936" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18936"><a href="https://www.bbva.com/es/contacto/">Contacto</a></li>
<li id="menu-item-972723" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-972723"><a href="https://www.bkms-system.com/bkwebanon/report/clientInfo?cin=h4uMFy&#038;c=-1&#038;language=spa">Canal de denuncia</a></li>
</ul>
              </div>
              <div class="row legal_copyBBVA">
                  <p class="footerSello">© Banco Bilbao Vizcaya Argentaria, S.A. 2023</p>
              </div>
          </div>
      </div>
  </div></footer>
</div>
<script type="text/html" id="wpb-modifications"></script><div class="highlight-and-share-wrapper-inline highlight-and-share-wrapper"><div class="has_twitter" style="display: none;" data-type="twitter"><a href="https://twitter.com/intent/tweet?via=%username%&url=%url%&text=%text%" target="_blank"><svg class="has-icon"><use xlink:href="#has-twitter-icon"></use></svg><span class="has-text">&nbsp;tweet</span></a></div></div><div class="highlight-and-share-wrapper-cts highlight-and-share-wrapper"><div class="has_twitter" style="display: none;" data-type="twitter"><a href="https://twitter.com/intent/tweet?via=%username%&url=%url%&text=%text%" target="_blank"><svg class="has-icon"><use xlink:href="#has-twitter-icon"></use></svg><span class="has-text">&nbsp;tweet</span></a></div></div><div class="highlight-and-share-wrapper"><div class="has_twitter" style="display: none;" data-type="twitter"><a href="https://twitter.com/intent/tweet?via=%username%&url=%url%&text=%text%" target="_blank"><svg class="has-icon"><use xlink:href="#has-twitter-icon"></use></svg><span class="has-text">&nbsp;tweet</span></a></div><div class="has_linkedin" style="display: none;" data-type="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=%url%&title=%title%" target="_blank"><svg class="has-icon"><use xlink:href="#has-linkedin-icon"></use></svg><span class="has-text">&nbsp;LinkedIn</span></a></div></div><!-- #highlight-and-share-wrapper -->		<svg width="0" height="0" class="hidden">
			<symbol aria-hidden="true" data-prefix="fas" data-icon="twitter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="has-twitter-icon">
				<path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
			</symbol>
			<symbol aria-hidden="true" data-prefix="fas" data-icon="facebook" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" id="has-facebook-icon">
				<path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
			</symbol>
			<symbol aria-hidden="true" data-prefix="fas" data-icon="at" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="has-email-icon">
				<path fill="currentColor" d="M256 8C118.941 8 8 118.919 8 256c0 137.059 110.919 248 248 248 48.154 0 95.342-14.14 135.408-40.223 12.005-7.815 14.625-24.288 5.552-35.372l-10.177-12.433c-7.671-9.371-21.179-11.667-31.373-5.129C325.92 429.757 291.314 440 256 440c-101.458 0-184-82.542-184-184S154.542 72 256 72c100.139 0 184 57.619 184 160 0 38.786-21.093 79.742-58.17 83.693-17.349-.454-16.91-12.857-13.476-30.024l23.433-121.11C394.653 149.75 383.308 136 368.225 136h-44.981a13.518 13.518 0 0 0-13.432 11.993l-.01.092c-14.697-17.901-40.448-21.775-59.971-21.775-74.58 0-137.831 62.234-137.831 151.46 0 65.303 36.785 105.87 96 105.87 26.984 0 57.369-15.637 74.991-38.333 9.522 34.104 40.613 34.103 70.71 34.103C462.609 379.41 504 307.798 504 232 504 95.653 394.023 8 256 8zm-21.68 304.43c-22.249 0-36.07-15.623-36.07-40.771 0-44.993 30.779-72.729 58.63-72.729 22.292 0 35.601 15.241 35.601 40.77 0 45.061-33.875 72.73-58.161 72.73z"></path>
			</symbol>
			<symbol aria-hidden="true" data-prefix="fas" data-icon="linkedin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="has-linkedin-icon">
				<path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
			</symbol>
			<symbol aria-hidden="true" data-prefix="fas" data-icon="xing" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" id="has-xing-icon">
				<path fill="currentColor" d="M162.7 210c-1.8 3.3-25.2 44.4-70.1 123.5-4.9 8.3-10.8 12.5-17.7 12.5H9.8c-7.7 0-12.1-7.5-8.5-14.4l69-121.3c.2 0 .2-.1 0-.3l-43.9-75.6c-4.3-7.8.3-14.1 8.5-14.1H100c7.3 0 13.3 4.1 18 12.2l44.7 77.5zM382.6 46.1l-144 253v.3L330.2 466c3.9 7.1.2 14.1-8.5 14.1h-65.2c-7.6 0-13.6-4-18-12.2l-92.4-168.5c3.3-5.8 51.5-90.8 144.8-255.2 4.6-8.1 10.4-12.2 17.5-12.2h65.7c8 0 12.3 6.7 8.5 14.1z"></path>
			</symbol>
			<symbol aria-hidden="true" data-prefix="fas" data-icon="whatsapp" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="has-whatsapp-icon">
				<path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
			</symbol>
			<symbol aria-hidden="true" data-prefix="fas" data-icon="copy" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="has-copy-icon">
				<path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"></path>
			</symbol>
			<symbol aria-hidden="true" data-prefix="fas" data-icon="share" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="has-share-icon">
				<path fill="currentColor" d="M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z"></path>
			</symbol>
			<symbol aria-hidden="true" data-prefix="fab" data-icon="reddit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="has-reddit-icon">
				<path fill="currentColor" d="M440.3 203.5c-15 0-28.2 6.2-37.9 15.9-35.7-24.7-83.8-40.6-137.1-42.3L293 52.3l88.2 19.8c0 21.6 17.6 39.2 39.2 39.2 22 0 39.7-18.1 39.7-39.7s-17.6-39.7-39.7-39.7c-15.4 0-28.7 9.3-35.3 22l-97.4-21.6c-4.9-1.3-9.7 2.2-11 7.1L246.3 177c-52.9 2.2-100.5 18.1-136.3 42.8-9.7-10.1-23.4-16.3-38.4-16.3-55.6 0-73.8 74.6-22.9 100.1-1.8 7.9-2.6 16.3-2.6 24.7 0 83.8 94.4 151.7 210.3 151.7 116.4 0 210.8-67.9 210.8-151.7 0-8.4-.9-17.2-3.1-25.1 49.9-25.6 31.5-99.7-23.8-99.7zM129.4 308.9c0-22 17.6-39.7 39.7-39.7 21.6 0 39.2 17.6 39.2 39.7 0 21.6-17.6 39.2-39.2 39.2-22 .1-39.7-17.6-39.7-39.2zm214.3 93.5c-36.4 36.4-139.1 36.4-175.5 0-4-3.5-4-9.7 0-13.7 3.5-3.5 9.7-3.5 13.2 0 27.8 28.5 120 29 149 0 3.5-3.5 9.7-3.5 13.2 0 4.1 4 4.1 10.2.1 13.7zm-.8-54.2c-21.6 0-39.2-17.6-39.2-39.2 0-22 17.6-39.7 39.2-39.7 22 0 39.7 17.6 39.7 39.7-.1 21.5-17.7 39.2-39.7 39.2z"></path>
			</symbol>
			<symbol aria-hidden="true" data-prefix="fab" data-icon="telegram" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="has-telegram-icon">
				<path fill="currentColor" d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path>
			</symbol>
		</svg>
		<link rel='stylesheet' id='jquery-ui-base-css'  href='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/css/jquery-ui_base.min.css?ver=5.5' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-ui-lightness-css'  href='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/css/jquery-ui_lightness.min.css?ver=5.5' type='text/css' media='all' />
<link rel='stylesheet' id='ReadSpeakerColorSkin-css'  href='https://www.bbva.com/wp-content/themes/coronita-bbvacom/vendor/ReadSpeakerColorSkin/ReadSpeakerColorSkin.css?ver=5.5' type='text/css' media='all' />
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/jquery.ba-throttle-debounce.min.js?ver=10.9.2' id='jquery_throttle-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/module.min.js?ver=10.9.2' id='module_js-js'></script>
<script type="text/javascript" src="https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/modules/010-concatenated-news.min.js?ver=10.9.2" async="async" defer="defer"></script>
<script type='text/javascript' id='data_sticker_js-js-extra'>
/* <![CDATA[ */
var ver = "10.9.2";
/* ]]> */
</script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/modules/020-data-sticker.min.js?ver=10.9.2' id='data_sticker_js-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/modules/jquery.highlight.min.js?ver=10.9.2' id='jquery_highlight-js'></script>
<script type="text/javascript" src="https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/modules/search.min.js?ver=10.9.2" async="async" defer="defer"></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/jquery-ui.min.js?ver=1.13.2' id='jquery-ui-js'></script>
<script type="text/javascript" src="https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/bootstrap.min.js?ver=3.3.7" async="async" defer="defer"></script>
<script type='text/javascript' id='functions-track-builder-js-extra'>
/* <![CDATA[ */
var dataTrackPosts = {"postId":"10422","postType":"page","postCategory":"","cb_version":"10.9.2","extension_js":"min.js"};
/* ]]> */
</script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/functions-track-builder.min.js?ver=10.9.2' id='functions-track-builder-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/plugins/highlight-and-share/js/sweetalert2.all.min.js?ver=7.28.4' id='sweetalert2-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=7.4.4' id='wp-polyfill-js'></script>
<script type='text/javascript' id='wp-polyfill-js-after'>
( 'fetch' in window ) || document.write( '<script src="https://www.bbva.com/wp-includes/js/dist/vendor/wp-polyfill-fetch.min.js?ver=3.0.0"></scr' + 'ipt>' );( document.contains ) || document.write( '<script src="https://www.bbva.com/wp-includes/js/dist/vendor/wp-polyfill-node-contains.min.js?ver=3.42.0"></scr' + 'ipt>' );( window.DOMRect ) || document.write( '<script src="https://www.bbva.com/wp-includes/js/dist/vendor/wp-polyfill-dom-rect.min.js?ver=3.42.0"></scr' + 'ipt>' );( window.URL && window.URL.prototype && window.URLSearchParams ) || document.write( '<script src="https://www.bbva.com/wp-includes/js/dist/vendor/wp-polyfill-url.min.js?ver=3.6.4"></scr' + 'ipt>' );( window.FormData && window.FormData.prototype.keys ) || document.write( '<script src="https://www.bbva.com/wp-includes/js/dist/vendor/wp-polyfill-formdata.min.js?ver=3.0.12"></scr' + 'ipt>' );( Element.prototype.matches && Element.prototype.closest ) || document.write( '<script src="https://www.bbva.com/wp-includes/js/dist/vendor/wp-polyfill-element-closest.min.js?ver=2.0.2"></scr' + 'ipt>' );
</script>
<script type='text/javascript' src='https://www.bbva.com/wp-includes/js/dist/i18n.min.js?ver=bb7c3c45d012206bfcd73d6a31f84d9e' id='wp-i18n-js'></script>
<script type='text/javascript' id='highlight-and-share-js-extra'>
/* <![CDATA[ */
var highlight_and_share = {"show_facebook":"","show_twitter":"1","show_linkedin":"1","show_email":"","show_xing":"","show_copy":"","show_whatsapp":"","twitter_username":"BBVA","mobile":"","content":".detContContent,.has-content-area,.has-excerpt-area","tweet_text":"tweet","facebook_text":"Share","linkedin_text":"LinkedIn","whatsapp_text":"WhatsApp","xing_text":"Xing","copy_text":"Copy","email_text":"E-mail","icons":"1","facebook_app_id":"","email_your_name_value":"","email_from_value":"","nonce":"b759cd9f8d","ajax_url":"https:\/\/www.bbva.com\/wp-admin\/admin-ajax.php","email_share":"Share This Post Via Email","email_subject":"Your Subject","email_your_name":"Your Name","email_send_email":"Send to Email Address","email_subject_text":"[Shared Post] %title%","email_from":"Your Email Address","email_send":"Send Email","email_cancel":"Cancel","email_close":"Close","email_loading":"https:\/\/www.bbva.com\/wp-content\/plugins\/highlight-and-share\/img\/loading.gif","email_subject_error":"You must fill in a subject.","email_email_to":"Send to Email Address is blank.","email_email_from":"Your email address is blank.","email_email_name":"Your name is blank.","email_sending":"Sending...","customizer_preview":""};
/* ]]> */
</script>
<script type="text/javascript" src="https://www.bbva.com/wp-content/plugins/highlight-and-share/js/highlight-and-share.js?ver=3.3.6" async="async" defer="defer"></script>
<script type='text/javascript' src='https://www.bbva.com/wp-includes/js/wp-embed.min.js?ver=5.5' id='wp-embed-js'></script>
<script type='text/javascript' src='https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/js/controller/home.min.js?ver=10.9.2' id='home-js-js'></script>
<script src="https://d3l7jhiu2gy1zw.cloudfront.net/lib/bbva-component/core.js" data-bbva-project="j6yx1hfp" data-bbva-api="revision-j6yx1hfp.openweb.bbva"></script></body>

</html><!-- generated by openweb publisher 2023-06-02T12:15:15.832Z -->
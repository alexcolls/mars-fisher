//cabecera sticky

function replaceGsaImg () {
    let firstJPG = "";
    if(typeof $("picture") !== "undefined" && $("picture").length > 0) {
        if ( typeof $("picture").first() !== "undefined" && typeof $("picture").first().children() !== "undefined"
            && typeof $("picture").first().children().first() !== "undefined" )
            firstJPG = $("picture").first().children().first().attr("srcset");
    }

    else {
        if (typeof $("img") !== "undefined" && $("img").length > 0) {
            let imgChildren = $("img").first();
            if(typeof imgChildren !== "undefined")
                firstJPG = imgChildren.attr("src");
        }
    }

    if (typeof $("meta[name='gsa-img']") !== "undefined" && typeof $("meta[name='gsa-img']").attr("content") !== "undefined") {
        if (typeof firstJPG !== "undefined" && firstJPG.length > 0)
            $("meta[name='gsa-img']").attr("content", firstJPG);
    }
    else {
        if( typeof firstJPG !== "undefined" && firstJPG.length >0)
            $("head").prepend("<meta name=\"gsa-img\" content=\""+firstJPG+"\">");
    }
}

function stickyHeader(){

    if($("header").length > 0) {
        // añadir altura al main segun la resolucion
        var heightMain = window.innerHeight - 290;
        $('section.main').css('min-height', heightMain);


        //paginas con poco contenido
        if($(document).height()-48 > window.innerHeight && $(document).height()-48 < window.innerHeight+48){
            //do nothing
        } else{
            var startStickyPos = $('.page-wrapper > header > .header__primary').offset().top;
            var initialScroll = $(window).scrollTop();

            if (initialScroll >= startStickyPos) {
                $('.page-wrapper > header').addClass("sticky");
                $('#page').addClass("sticky-header");
            }

            $(window).on('scroll resize', function () {
                var currentScroll = $(window).scrollTop();

                if (currentScroll >= startStickyPos) {
                    if (currentScroll == 0) {
                        $('.page-wrapper > header').removeClass("sticky");
                        $('#page').removeClass("sticky-header");
                    } else {
                        $('.page-wrapper > header').addClass("sticky");
                        $('#page').addClass("sticky-header");
                    }
                } else {
                    $('.page-wrapper > header').removeClass("sticky");
                    $('#page').removeClass("sticky-header");
                }

            });
        }

    }

}

// Functions
function scheduleLabel(){
    $('.schedule__btn').on( "click", function() {
        $(this).parent().find( ".schedule__label" ).toggleClass('is-active');
    });

    $('.schedule__label').on( "click", function() {
        $(this).toggleClass('is-active');
    });

}

if (typeof window.isMobile === 'undefined') {
    function isMobile(){
        pc= navigator.userAgent.match(/(Windows\ NT|\(Macintosh)/i);
        tablet=!(pc)&&(navigator.userAgent.match(/Android\ 3\.|\(Windows\ NT|\(Macintosh|Playbook|Pad|Tab|xoom|sch-i[89]|SM-T[0-9]|GT-P[0-9]|Nexus 1[0-9]|Nexus [7-9]|Kindle|Android .* Chrome\/[\.0-9]* [^M]/i));
        mobile=!(pc)&&!(tablet)&&((/(Android\ [12456789]\.|mobile|phone|ipod|meego|blackberry|midp|pocket|symbian)/i).test(navigator.userAgent));
        return mobile;
    }
}
if (typeof window.replaceAlternativeDeviceLinks === 'undefined') {
    function replaceAlternativeDeviceLinks() {
        if (!isMobile()) {
            if (typeof devAlts != 'undefined' && devAlts != null) {
                for (var key in devAlts) {
                    if($("#"+key).length === 1 && $("#"+key).is("a")){
                        $("#"+key).attr('href',devAlts[key]);
                    }
                }
            }
        }
    }
}

function lazyLoad(){
    var doImgLazyLoad =  (function(){
        if(!isMobile()){
            if ($().unveil){
                $("img[data-src]").unveil(100, function() {
                    $(this).on('load',function() {
                        $(this).addClass('lazy-loaded');
                    });
                });
            }
        }else{
            $("img[data-src]").each(function(index) {
                if(this.getAttribute('data-src')){
                    this.setAttribute('src', this.getAttribute('data-src'));
                }
                $(this).css("opacity","1");
            });
        }
    })();
}

function counter(el){
    $(el).each(function () {
        if($(this).text().indexOf(".") !== -1){
            var size = $(this).text().split(".")[1] ? $(this).text().split(".")[1].length : 0;
            $(this).prop('Counter',0).animate({
                Counter: parseFloat($(this).html())
            }, {
                duration: 5000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(parseFloat(now).toFixed(size));
                }
            });
        }else if($(this).text().indexOf(",") !== -1){
            var size = $(this).text().split(",")[1] ? $(this).text().split(",")[1].length : 0;
            var fakefloat = $(this).text().replace(",",".");
            $(this).prop('Counter',0).animate({
                Counter: parseFloat(fakefloat)
            }, {
                duration: 5000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(parseFloat(now).toFixed(size));
                    $(this).text($(this).text().replace(".",","));
                }
            });
        }else{
            $(this).prop('Counter',0).animate({
                Counter: parseInt($(this).html())
            }, {
                duration: 5000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(now.toFixed(0));
                }
            });
        }
    });
}

function countersOnScroll() {
    $(window).scroll( function(){

        $('.counter__value').each( function(i){

            var bottomElem = $(this).offset().top + $(this).outerHeight();
            var bottomWindow = $(window).scrollTop() + $(window).height();
            var thisCounter = $(this);

            if( bottomWindow > bottomElem && !thisCounter.hasClass("used")) {
                counter(thisCounter);
                thisCounter.addClass("used");
            }

            else if (bottomWindow > bottomElem && thisCounter.hasClass("used")) {
                thisCounter.addClass("stopped");
            }

        });

    });
}

//Pre-Search funcionality
function openSearch(){

    $("a.search__link-anchor").click(function() {
        $("div.header__primary").hide();
        $("#page").hide();

        //scroll prebuscador
        $("div.header__presearch .container").addClass('active');
        $("body").css('overflow-y', 'hidden')
    });
}
function closeSearch(){
    $("a.search__link-close").click(function (){
        $("#search__content").removeClass( "show" );
        $("div.header__presearch .container.active").removeClass('active');
        $(".header__primary").show();
        $("#page").show();
        $("body").css('overflow-y', '')
    });
}
//Funcionalidad Slider

function initOmOnSliderChange(e, t, a) {
    isMobile() ? closAllMinisterialOrderSliderWithDuration(200) : -1 === $.inArray(t, e) && (waitTimeToCloseMinisterialOrderSlider(t, a), e.push(t))
}

function isMobile() {
    return pc = navigator.userAgent.match(/(Windows\ NT|\(Macintosh)/i), tablet = !pc && navigator.userAgent.match(/Android\ 3\.|\(Windows\ NT|\(Macintosh|Playbook|Pad|Tab|xoom|sch-i[89]|SM-T[0-9]|GT-P[0-9]|Nexus 1[0-9]|Nexus [7-9]|Kindle|Android .* Chrome\/[\.0-9]* [^M]/i), mobile = !pc && !tablet && /(Android\ [12456789]\.|mobile|phone|ipod|meego|blackberry|midp|pocket|symbian)/i.test(navigator.userAgent), mobile
}

function waitTimeToCloseMinisterialOrderSlider(e, t) {
    (null == t || void 0 === t || t <= 0) && (t = 3e3), setTimeout(function() {
        closeMinisterialOrderSlider(e)
    }, t)
}

function closeMinisterialOrderSlider(e, t) {
    var a = $($(".hm-slider-list").find(".hm-slide")[e]);
    a.find(".om-home-boton").hasClass("active") && a.find(".om-content").slideUp(t, function() {
        a.find(".om-content").removeClass("active"), a.find(".om-home-boton.active").removeClass("active")
    })
}

function closeMinisterialOrderSliderWithDuration(e, t) {
    null == t && (t = 400), closeMinisterialOrderSlider(e, t)
}

function closAllMinisterialOrderSlider(e) {
    var t = $($(".hm-slider-list").find(".hm-slide"));
    t.find(".om-content").slideUp(e, function() {
        t.find(".om-content").removeClass("active"), t.find(".om-home-boton.active").removeClass("active")
    })
}

function closAllMinisterialOrderSliderWithDuration(e) {
    null == e && (e = 400), closAllMinisterialOrderSlider(e)
}

function closAllMinisterialOrderSliderLessTheFirst(e) {
    var t, a = $($(".hm-slider-list").find(".hm-slide")).length;
    for (t = 1; t < a; t++) closeMinisterialOrderSliderWithDuration(t, e)
}

var initSliderHome = function(isRestart){
    var timesToWaitForMinisterialOrder = [];

    $('.hm-slider').on('init', function(event, slick) {
        updateSlickArrowTitles(slick);
        updateSlickButtonTitles();
    });

    $(".hm-slider-list").not('.slick-initialized').slick({
        lazyLoad: "ondemand",
        autoplay: true,
        autoplaySpeed: 5000,
        dots: true,
        fade: true,
        pauseOnDotsHover: true,
        appendArrows: $(".hm-slider-controls"),
        prevArrow: '<a class="slick-prev" role="button" href="javascript:void(0)" title="Diapositiva anterior"><img src="/deployedfiles/caixabank_com/Estaticos/Imagenes/arrow-blue-left.svg" alt=""><span class="sr-only">Diapositiva anterior</span></a>',
        nextArrow: '<a class="slick-next" role="button" href="javascript:void(0)" title="Diapositiva siguiente"><img src="/deployedfiles/caixabank_com/Estaticos/Imagenes/arrow-blue-right.svg" alt=""><span class="sr-only">Diapositiva siguiente</span></a>',
        appendDots: $(".hm-slider-b-items")
    });

    if (!isRestart){
        $('.hm-slider-b-play').find('a').click(function(){
            var control = $(this);
            var slider = control.closest('.hm-slider').find('.hm-slider-list');
            if(control.hasClass('paused')){
                slider.slick('slickPlay');
                control.removeClass('paused');
            } else {
                slider.slick('slickPause');
                control.addClass('paused');
            }
        });
    }

    doSliderCleanUp();

    var slideAlreadyOpen = [];

    $('.hm-slider').on('afterChange', function(event, slick, direction) {
        updateSlickArrowTitles(slick);
        initOmOnSliderChange(slideAlreadyOpen, direction, timesToWaitForMinisterialOrder[direction]);
    });

    if(isMobile()){
        closAllMinisterialOrderSliderLessTheFirst(200);
    }

    waitTimeToCloseMinisterialOrderSlider(0, timesToWaitForMinisterialOrder[0]);
    slideAlreadyOpen.push(0);
};

function doSliderCleanUp() {
    var count = $(".hm-slider-list").slick("getSlick").slideCount;
    console.log(count);
    if(typeof count !== undefined){
        if(count === 1){
            $('.hm-slider-b-play').remove();
        }
    }
}

function addSliderKeyboardEvents() {
    var e = $(".hm-slider-list").slick("getSlick").slideCount;
    void 0 !== typeof e && e > 1 && ($(".section-breadcrumb").length > 0 ? $(".section-breadcrumb a[href]:visible:last").on("keydown", function(e) {
        $(window).width() > 991 && 9 == e.which && (e.shiftKey || ($(" a.slick-prev").focus(), $(" a.slick-prev img").attr("src", "/deployedfiles/common/R2016/Estaticos/images/hm-slider-arrow-left-focus.png"), e.preventDefault()))
    }) : $(".inner-section a[href]:visible:last").on("keydown", function(e) {
        $(window).width() > 991 && 9 == e.which && (e.shiftKey || ($(" a.slick-prev").focus(), $(" a.slick-prev img").attr("src", "/deployedfiles/common/R2016/Estaticos/images/hm-slider-arrow-left-focus.png"), e.preventDefault()))
    }), $(" .hm-slider-b-play a").on("keydown", function(e) {
        9 == e.which && $(window).width() <= 991 && e.shiftKey && ($(" .hm-slide.slick-active a").focus(), e.preventDefault())
    }), $(" a.slick-arrow").on("keydown", function(e) {
        37 == e.which ? $(" a.slick-prev").click() : 39 == e.which && $(" a.slick-next").click()
    }))
}

function updateSlickArrowTitles(e) {
    var t = e.currentSlide - 1,
        a = e.currentSlide + 1;
    t < 0 && (t = e.slideCount - 1), a >= e.slideCount && (a = 0);
    var i = $(".hm-slider .hm-slide[data-slick-index=" + t + "] a").attr("title"),
        o = $(".hm-slider .hm-slide[data-slick-index=" + a + "] a").attr("title");
    $(" a.slick-prev").attr("title", i), $(" a.slick-next").attr("title", o)
}

function updateSlickButtonTitles() {
    $(".hm-slider .slick-dots button").each(function(e, t) {
        var a = $(".hm-slider .hm-slide[data-slick-index=" + e + "] a").attr("title");
        $(t).attr("title", a)
    })
}

function sliderChangePlayPause() {
    $(".hm-slider-b-play a").append('<img src="/deployedfiles/caixabank_com/Estaticos/Imagenes/hm-slider-pause.svg" alt=""/>'),
        $(".hm-slider-b-play a").click(function () {
            if ($(this).hasClass("paused")) {
                $('.hm-slider-b-play a img').attr("src", "deployedfiles/caixabank_com/Estaticos/Imagenes/hm-slider-pause.svg")
            } else {
                $('.hm-slider-b-play a img').attr("src", "/deployedfiles/caixabank_com/Estaticos/Imagenes/hm-slider-play.svg")
            }
        });
}

//Fin Funcionalidad Slider

function closePanelMenu(){
    $('#navbarNavDropdown').before('<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">\n' +
        '<span class="navbar-toggler-icon"></span>\n' +
        '</button>')
    $(".navbar-toggler").on( "click", function() {
        $(this).find('.navbar-toggler-icon').toggleClass('close');

        if ($(this).hasClass('collapsed')) {
            $('.nav-item').removeClass('active');
            $('.card-header a').addClass('collapsed').attr('aria-expanded', false).removeAttr('style');
            $('.collapse').removeClass('show');
            $('.card').toogle();
        }
    });


}

function toogleMenuLink(){

    $('.nav-item-link a.nav-link--arrow-black').on( "click", function(e) {
        var isDesktop = $(window).width() > 991;
        if(isDesktop) {
            $('.nav-item').removeClass('active');
            return false;
        }

        $(this).closest('.nav-item').toggleClass('active');

        if($(this).closest(".nav-item").hasClass("active")){
            $(".card-header a").css("pointer-events","none");
        }else{
            $(".card-header a").css("pointer-events","all");
        }
    });

    $('.nav-item-link a.nav-link--black.nav-link--arrow-black').on('mouseover',function(e){
        var isDesktop = $(window).width() > 991;
        if(isDesktop) {
            $('.nav-item').removeClass('active');
            $(this).closest('.nav-item').toggleClass('active');
        }
    });

    $(".nav-item-link a.nav-link--black:not('.nav-link--arrow-black')").on('mouseenter',function(e){
        var isDesktop = $(window).width() > 991;
        if(isDesktop) {
            $('.nav-item').removeClass('active');
            $(this).closest('.nav-item').removeClass('active');
        }
    });

    $("#tabs .nav-link").on("mouseenter", function(){
        $("header .header__primary .tab-pane.active").removeClass("active");
        $("#tabs .nav-link.active").removeClass("active");
        $("#tabs .nav-link").removeClass("highlighted");
        $('.nav-item').removeClass('active');

        $(this).addClass("active");
        $($(this).attr("href")).addClass("active");
    });

    $("#tabs #tab-5.nav-link").on("click", function(){
        return false;
    });

    $("header .header__primary .navbar").on("mouseleave", function(){
        $("header .header__primary .tab-pane.active").removeClass("active");
        $("#tabs .nav-link.active").removeClass("active");
        $('.nav-item').removeClass('active');
        activeMacromenu();
    });

    $("#tabs").on("click", ".nav-link.active", function(e){
        var url = $(this).attr("data-href");
        window.location.href = url;
    });
}

function contentFilter(){
    var regexes = [];
    var lastTableFiltred = "";
    clearFilter();

    $(".c-dropdown__filter").on('change', function (e) {
        var tableFilterSelected = $(this).attr('data-table-id');
        var filterValue = $(this).val();
        var index = $(".c-dropdown__filter").index(this);

        if (filterValue == "all") {
            clearFilter();
        } else {

            if(tableFilterSelected != lastTableFiltred)
                clearFilter();

            regexes[index] = new RegExp(filterValue);
            $('#' + tableFilterSelected + ' tbody tr')
                .show(200)
                .filter(function () {
                    var text = $(this).text();
                    return !regexes.reduce(function (accumulator, regex) {
                        return accumulator && regex.test(text);
                    }, true);
                }).hide();
            lastTableFiltred = tableFilterSelected;
        }
    });

    function clearFilter() {
        $('.c-dropdown__filter').val('all').each(function (i) {
            regexes[i] = /./;
        });
        $('.table tbody tr').show();
    }
}

//Infografía
function infographicsInit(){
    $('.infographics-slider').each(function(){
        var infographicsSlider = $(this).find(".infographics-slider-list");
        infographicsSlider.slick({
            centerMode: true,
            centerPadding: '0',
            slidesToShow: 1,
            dots: true,
            autoplay: false,
            /*autoplaySpeed: 4000,*/
            pauseOnDotsHover: true,
            appendArrows: $('.infographics-slider-controls'),
            prevArrow: '<a class="slick-prev" role="button" href="javascript:void(0)" title="Diapositiva anterior"><img src="/deployedfiles/caixabank_com/Estaticos/Imagenes/hm-slider-arrow-left.png" alt=""><span class="sr-only">Diapositiva anterior</span></a>',
            nextArrow: '<a class="slick-next" role="button" href="javascript:void(0)" title="Diapositiva siguiente"><img src="/deployedfiles/caixabank_com/Estaticos/Imagenes/hm-slider-arrow-right.png" alt=""><span class="sr-only">Diapositiva siguiente</span></a>',
            appendDots: $('.infographics-slider-dots'),
            accessibility: false,
            focusOnSelect: false,
            responsive: [
                {
                    breakpoint: 1800,
                    settings: {
                        centerPadding: '15%',
                    }
                },
                {
                    breakpoint: 1650,
                    settings: {
                        centerPadding: '12%',
                    }
                },{
                    breakpoint: 1440,
                    settings: {
                        centerPadding: '10%',
                    }
                },
                {
                    breakpoint: 1300,
                    settings: {
                        centerPadding: '5%',
                    }
                },
                {
                    breakpoint: 1100,
                    settings: {
                        centerPadding: '50px',
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        centerPadding: '0px',
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        centerPadding: '0px',
                    }
                }
            ]
        });

        /* Dots + play/pause */
        $(this).find('.infographics-slider-dots a').append('<img src="/deployedfiles/caixabank_com/css/Estaticos/images/hm-slider-pause.png" alt=""/>');
        $(this).find(".infographics-slider-dots a").click(function(e) {
            e.preventDefault();
            if ($(this).hasClass("paused")) {
                $(this).find('img').attr("src", "/deployedfiles/caixabank_com/css/Estaticos/images/hm-slider-pause.png");
            } else {
                $(this).find('img').attr("src", "/deployedfiles/caixabank_com/css/Estaticos/images/play.png");
            }
        });

        /*Si solo tiene un slide ocultamos las flechas y el trakeo, anadimos clase para centarr*/
        var nSlides = $(this).find(".slide").length;
        if(nSlides == 1){
            $(this).find(".infographics-slider-dots a").hide();
            $(this).addClass("one");
        }

        $(this).find('.infographics-slider-dots').find('a').click(function(e){
            e.preventDefault();
            var control = $(this);
            var slider = control.closest('.infographics-slider').find('.infographics-slider-list');
            console.log(slider);
            if(control.hasClass('paused')){
                slider.slick('slickPlay');
                control.removeClass('paused');
            } else {
                slider.slick('slickPause');
                control.addClass('paused');
            }
        });


        $(this).find(".slide-close-badge .badge").on("click", function(e){
            e.preventDefault();
            var slideInfo = $(this).parents(".slide-media").siblings(".slide-info");
            $(this).fadeOut();
            slideInfo.slideToggle();
            slideInfo.find(".closeInfo").focus();
        });

    });


    $(".infographics-slider .slide .slide-info .closeInfo").on("click", function(e){
        e.preventDefault();
        var slideInfo = $(this).parents(".slide-info");
        var slideBadge = slideInfo.siblings(".slide-media").find(".slide-close-badge").find(".badge");
        slideBadge.fadeIn();
        slideInfo.slideToggle();
        slideBadge.focus();
    });
}
//Infografía - Accesibilidad
function moduloRSCAccessibility(){
    /*Init*/
    $('.infographics-slider').find('.slide-close-badge a').attr("aria-expanded",false);
    /*Open*/
    $('.infographics-slider').find('.slide-close-badge a').click(function() {
        if ($(this).attr("aria-expanded") == "false") {
            $(this).attr("aria-expanded", "true");
        }
    });
    /*Close*/
    $('.infographics-slider').find('.slide-info .closeInfo').click(function() {
        var badge = $(this).parents(".slide-info").siblings(".slide-media").find(".slide-close-badge a");
        if (badge.attr("aria-expanded") == "true") {
            badge.attr("aria-expanded", "false");
        }
    });
    $('.infographics-slider .slide').keydown(function(evt) {
        if(evt.which == 27) {
            $(this).find(".slide-info a").click();
        }
    });

    /*Remove attrs*/
    $('.infographics-slider').find(".slick-dots li button").removeAttr("data-role");
    $('.infographics-slider').find(".slick-dots li").removeAttr("aria-hidden");
    $('.infographics-slider').find(".slide:not(.slick-active) .slide-close-badge a").attr("tabindex","-1");

    /*Add text 'seleccionado' on init*/
    $('.infographics-slider').each(function(){
        if($("html").attr("lang") == "es"){
            $(this).find(".slick-dots li.slick-active button").html($(this).find(".slick-dots li.slick-active button").text()+"<span class='selected-text'> seleccionado</span>");
        }else if($("html").attr("lang") == "ca"){
            $(this).find(".slick-dots li.slick-active button").html($(this).find(".slick-dots li.slick-active button").text()+"<span class='selected-text'> seleccionat</span>");
        }else if($("html").attr("lang") == "en"){
            $(this).find(".slick-dots li.slick-active button").html($(this).find(".slick-dots li.slick-active button").text()+"<span class='selected-text'> selected</span>");
        }
    });

    // On after slide change
    $('.infographics-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
        var slider = $(this);
        /*Remove aria-hidden*/
        slider.find(".slick-dots li").removeAttr("aria-hidden");
        slider.find(".slide:not(.slick-active) .slide-close-badge a").attr("tabindex","-1");

        /*Add text 'seleccionado'*/
        slider.find(".selected-text").remove();
        if($("html").attr("lang") == "es"){
            slider.find(".slick-dots li.slick-active button").html(slider.find(".slick-dots li.slick-active button").text()+"<span class='selected-text'> seleccionado</span>");
        }else if($("html").attr("lang") == "ca"){
            slider.find(".slick-dots li.slick-active button").html(slider.find(".slick-dots li.slick-active button").text()+"<span class='selected-text'> seleccionat</span>");
        }else if($("html").attr("lang") == "en"){
            slider.find(".slick-dots li.slick-active button").html(slider.find(".slick-dots li.slick-active button").text()+"<span class='selected-text'> selected</span>");
        }
        /*tabindex 0 current*/
        slider.find(".slide.slick-active .slide-close-badge a").attr("tabindex","0");
        /*Focus to 'leer infografia'*/
        if($(window).width() >= 768){
            setTimeout(function(){
                slider.find(".slide.slick-active .slide-close-badge a").focus();
            }, 200);
        }
    });
}
//Fin -Infografía - Accesibilidad
//Fin - Infografía

/* Languague Function*/
function detectedLanguage(){

    var language= $("html").attr("lang");
    console.log( language );

    if(language=="es"){
        $( 'li.language__item' ).each(function( index ) {

            $(this).addClass('disabled');
            var linkLanguage=$(this).find('a').attr("lang");

            if(linkLanguage=="es-ES"){
                $(this).removeClass('disabled');
                $(this).addClass('active');

            }
        });
    }else if(language=="ca"){
        $( 'li.language__item' ).each(function( index ) {

            $(this).addClass('disabled');
            var linkLanguage=$(this).find('a').attr("lang");

            if(linkLanguage=="ca-ES"){
                $(this).removeClass('disabled');
                $(this).addClass('active');
            }
        });
    }else{
        $( 'li.language__item' ).each(function( index ) {

            $(this).addClass('disabled');
            var linkLanguage=$(this).find('a').attr("lang");

            if(linkLanguage=="en-US"){
                $(this).removeClass('disabled');
                $(this).addClass('active');
            }
        });
    }
}

//E1 - Desplegables
function dropdownOpener(dropdown){
    var $this = dropdown;
    $this.toggleClass("active");
    $this.closest('.dropdown-title').siblings(".dropdown-content").slideToggle();
    $('.dropdown-group .dropdown-title a.active').attr("aria-expanded",true);
}
function dropdownEvents() {
    $('.dropdown-group').find('.dropdown-title').find('a').click(function(e) {
        /* Fix Ilunion JAWS IE */ e.preventDefault();
        /* Fix Ilunion JAWS IE */ e.stopPropagation();
        dropdownOpener($(this));
        if ($('.dropdown-title a').hasClass('active')) {
            $(this).attr("aria-expanded",true);
        } else {
            $(this).attr("aria-expanded",false);
        }
    });
}
function dropdownAccesibility() {
    $('.dropdown-group .dropdown-title a').attr("href", "#");
    $('.dropdown-group .dropdown-title a').attr("aria-expanded", false);

    $(".dropdown-group").on("keydown", function(evt) {
        if(evt.which == 27) {
            if($('.dropdown-title a').find('active')) {
                $('.dropdown-title').siblings(".dropdown-content").slideUp();
                $('.dropdown-title a').removeClass('active');
                $('.dropdown-title a').attr("aria-expanded",false);
                // $('.dropdown-title a').blur().focus();
            }
        }
    });
}
//Fin - E1 - Desplegables

//Mapa
$(document).ready(function() {
    var orden_ciudad = 0;
    var pulsado = false;

    $(".localidad").each(function() {
        var ciudad = $(this).find(".ciudad").text();
        var array_ciudad = ciudad.split(" ");
        if (array_ciudad.length > 0) {
            ciudad = array_ciudad.join("-");
            ciudad = ciudad.toLowerCase();

            ciudad = ciudad.replace(/á/gi,"a");
            ciudad = ciudad.replace(/é/gi,"e");
            ciudad = ciudad.replace(/è/gi,"e");
            ciudad = ciudad.replace(/í/gi,"i");
            ciudad = ciudad.replace(/ó/gi,"o");
            ciudad = ciudad.replace(/ú/gi,"u");
            ciudad = ciudad.replace(/ñ/gi,"n");

            $(".punto-mapa").eq(orden_ciudad).attr("id", ciudad);
            $(this).find(".info-mapa").attr("id", "info-mapa-" + ciudad);
        }

        orden_ciudad++;
    });

    $('.punto-mapa').click(function() {
        pulsado = true;
        var ciudad = $(this).attr('id');

        $('.localidad').css('display', 'none');
        $('#info-mapa-' + ciudad).parent().css('display', 'block');
    });

    $('.punto-mapa').hover(function() {
        if (pulsado == false) {
            var ciudad = $(this).attr("id");
            $('#info-mapa-' + ciudad).parent().slideDown('slow');
        }
    }, function() {
        if (pulsado == false)
            $('.localidad').css('display', 'none');
    });

});
//Fin Mapa

// G1 Carrusel
function testCarouselWidth(){
    $.each($(".carousel-group"), function(idx, obj){
        var slideWidthSum = 0;
        $.each($(obj).find(".carousel-item"), function(idx, obj){
            slideWidthSum += $(obj).outerWidth(true);
        });
        var slideItemsWidth = $(obj).find(".carousel-items-list").outerWidth(true);
        if (slideWidthSum > slideItemsWidth){
            $(obj).find(".carousel-items-list").addClass("carousel-navigation").removeClass("carousel-no-navigation");
        } else {
            $(obj).find(".carousel-items-list").addClass("carousel-no-navigation").removeClass("carousel-navigation");
        }
    });
}
function carouselOpener(item){
    var $this = item;
    var showId = $this.closest('.carousel-item').attr("data-target");
    $this.closest('.carousel-items').find(".active").removeClass("active");
    $this.closest('.carousel-item').addClass("active");
    $this.closest(".carousel-group").find(".carousel-content").hide();
    $this.closest(".carousel-group").find(".carousel-content[data-target-id='" + showId + "']").fadeIn();
}
function moveCarouselElementToFullView(element){
    var $target = element;
    var parentLeftPosition = $target.closest('.carousel-items-wrap').offset().left;
    var parentRightPosition = ($(window).width() - (parentLeftPosition + $target.closest('.carousel-items-wrap').outerWidth()));
    var moveTargetContainer = function() {
        var elementLeftPosition = $target.offset().left;
        var elementRightPosition = ($(window).width() - (elementLeftPosition + $target.outerWidth()));
        var rightArrowWidth = $target.closest(".carousel-group").find(".carousel-arrow-right a").outerWidth();
        var leftArrowWidth = $target.closest(".carousel-group").find(".carousel-arrow-left a").outerWidth();
        if (parentRightPosition+rightArrowWidth > elementRightPosition && $target.closest(".carousel-group").find(".carousel-arrow-right:visible").length > 0){
            $target.parents(".carousel-group").find(".carousel-arrow-right a").click();
            window.setTimeout(moveTargetContainer, 400);
        }
        if (parentLeftPosition + leftArrowWidth > elementLeftPosition && $target.parents(".carousel-navigation").find(".carousel-arrow-left:visible").length > 0){
            $target.parents(".carousel-group").find(".carousel-arrow-left a").click();
            window.setTimeout(moveTargetContainer, 400);
        }
    };
    moveTargetContainer();
}
function slideCarousel(slides, amount) {
    var slideSc = slides.find('.carousel-items-wrap');
    var leftS = slideSc.scrollLeft() + amount;
    slideSc.animate({
        scrollLeft: leftS
    }, 400);
}
function carouselEvents() {
    $('.carousel-item').not('.carousel-item-external').find('a').click(function() {
        carouselOpener($(this));
    });
    $('.carousel-items-wrap').on('scroll',function(){
        var slides = $(this);
        var slidesSc = slides.scrollLeft();
        var slidesLast = slides.find('.carousel-item:last-child');
        var slideLeft = slides.closest('.carousel-items-list').find('.carousel-arrow-left');
        var slideRight = slides.closest('.carousel-items-list').find('.carousel-arrow-right');
        if(slidesSc <= 0) {
            slideLeft.fadeOut();
        } else {
            slideLeft.fadeIn();
        }
        var slideLimit = slides.width();
        var lastItemLimit = slidesLast.offset().left - slides.offset().left + slidesLast.outerWidth();
        if (lastItemLimit - 5 < slideLimit) {
            slideRight.fadeOut();
        } else {
            slideRight.fadeIn();
        }
    });
    $('.carousel-arrow-left').find('a').click(function(){
        var arrow = $(this).closest('.carousel-items-list');
        slideCarousel(arrow,-270);
    });
    $('.carousel-arrow-right').find('a').click(function(){
        var arrow = $(this).closest('.carousel-items-list');
        slideCarousel(arrow,270);
    })
}
// Fin - G1 Carrusel

// Paginacion Tablas
function getPagination(table) {
    $('.pagination .table').before('<div class="form-group  text-right">\n' +
        '                                    <select class="form-control" name="state" id="maxRows">\n' +
        '                                        <option value="5">5</option>\n' +
        '                                        <option value="10">10</option>\n' +
        '                                        <option value="15">15</option>\n' +
        '                                        <option value="20">20</option>\n' +
        '                                        <option value="50">50</option>\n' +
        '                                    </select>\n' +
        '                                </div>');

    $('.pagination .table').after('<nav aria-label="Pagination">\n' +
        '                                <ul class="pagination">\n' +
        '                                    <li data-page="prev" class="pagination__item">\n' +
        '                                        <a class="pagination__link pagination__link--blue" href="#">Anterior</a>\n' +
        '                                    </li>\n' +
        '                                    <li  data-page="next" id="prev" class="pagination__item">\n' +
        '                                        <a class="pagination__link pagination__link--blue" href="#">Siguiente</a>\n' +
        '                                    </li>\n' +
        '                                </ul>\n' +
        '                            </nav>');

    var lastPage = 1;

    $('#maxRows')
        .on('change', function(evt) {
            //$('.paginationprev').html('');						// reset pagination

            lastPage = 1;
            $('.pagination')
                .find('li')
                .slice(1, -1)
                .remove();
            var trnum = 0; // reset tr counter
            var maxRows = parseInt($(this).val()); // get Max Rows from select option

            if (maxRows == 5000) {
                $('.pagination').hide();
            } else {
                $('.pagination').show();
            }

            var totalRows = $(table + ' tbody tr').length -1; // numbers of rows
            $(table + ' tr:gt(0)').each(function() {
                // each TR in  table and not the header
                trnum++; // Start Counter
                if (trnum > maxRows) {
                    // if tr number gt maxRows

                    $(this).hide(); // fade it out
                }
                if (trnum <= maxRows) {
                    $(this).show();
                } // else fade in Important in case if it ..
            }); //  was fade out to fade it in
            if (totalRows > maxRows) {
                // if tr total rows gt max rows option
                var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
                //	numbers of pages
                for (var i = 1; i <= pagenum; ) {
                    // for each page append pagination li
                    $('.pagination #prev')
                        .before(
                            '<li data-page="' +
                            i +
                            '">\
                                              <span>' +
                            i++ +
                            '<span class="sr-only">(current)</span></span>\
                                            </li>'
                        )
                        .show();
                    $('.pagination .pagination__item').css('display', 'block');
                } // end for i
            } // end if row count > max rows
            $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
            $('.pagination li').on('click', function(evt) {
                // on click each page
                evt.stopImmediatePropagation();
                evt.preventDefault();
                var pageNum = $(this).attr('data-page'); // get it's number

                var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

                if (pageNum == 'prev') {
                    if (lastPage == 1) {
                        return;
                    }
                    pageNum = --lastPage;
                }
                if (pageNum == 'next') {
                    if (lastPage == $('.pagination li').length - 2) {
                        return;
                    }
                    pageNum = ++lastPage;
                }

                lastPage = pageNum;
                var trIndex = 0; // reset tr counter
                $('.pagination li').removeClass('active'); // remove active class from all li
                $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
                // $(this).addClass('active');					// add active class to the clicked
                limitPagging();
                $(table + ' tr:gt(0)').each(function() {
                    // each tr in table not the header
                    trIndex++; // tr index counter
                    // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                    if (
                        trIndex > maxRows * pageNum ||
                        trIndex <= maxRows * pageNum - maxRows
                    ) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    } //else fade in
                }); // end of for each tr in table
            }); // end of on click pagination list
            limitPagging();
        })
        .val(5)
        .change();

    // end of on select change

    // END OF PAGINATION
}
function limitPagging() {
    // alert($('.pagination li').length)

    if ($('.pagination li').length > 7) {
        if ($('.pagination li.active').attr('data-page') <= 3) {
            $('.pagination li:gt(5)').hide();
            $('.pagination li:lt(5)').show();
            $('.pagination [data-page="next"]').show();
        }
        if ($('.pagination li.active').attr('data-page') > 3) {
            $('.pagination li:gt(0)').hide();
            $('.pagination [data-page="next"]').show();
            for (
                let i = parseInt($('.pagination li.active').attr('data-page')) - 2;
                i <= parseInt($('.pagination li.active').attr('data-page')) + 2;
                i++
            ) {
                $('.pagination [data-page="' + i + '"]').show();
            }
        }
    } else if ($('.pagination li').length < 3) {
        $('.pagination .pagination__item').hide();
    }
}
// Fin Paginacion Tablas

function listcontent1() {

    $(".contentList.one-filter").each(function(indice,elemento){
        //En cada elemento le añadimos la classe con el indice
        $(elemento).attr('class',('one-filter_' + indice));

        $(elemento).each(function(){
            $(this).find('.contentList__dest').hide();
            $(this).find("#c-dropdown_op1").val($("#c-dropdown_op1 option:first").val());
            $(this).find('.contentList__dest:first').show();
            $(this).find("#c-dropdown_op1").off();

            $(this).find("#c-dropdown_op1").on("change", function() {
                $(elemento).find('.contentList__dest').hide();
                $(elemento).find('#div' + $(this).val()).show();
            });

        });
    });

    $(".contentList.dv-filter").each(function(indice,elemento){
        //En cada elemento le añadimos la classe con el indice
        $(elemento).attr('class',('dv-filter_' + indice));

        $(elemento).each(function(){
            $(this).find('.contentList__dest').hide();
            $(this).find("#c-dropdown_op").val($("#c-dropdown_op option:first").val());
            $(this).find('.contentList__dest:first').show();
            $(this).find("#c-dropdown_op").off();

            $(this).find("#c-dropdown_op").on("change", function() {
                $(elemento).find('.contentList__dest').hide();
                $(elemento).find('#div' + $(this).val()).show();
            });

        });
    });


}

function listcontent2() {
    $(".contentList.two-filter").each(function(indice,elemento){
        //En cada elemento le añadimos la classe con el indice
        $(elemento).attr('class',('two-filter_' + indice));

        $(elemento).each(function(){
            $(this).find('.contentList__dest').hide();
            $(this).find("#c-dropdown_op1").val($("#c-dropdown_op1 option:first").val());

            $(this).find('.c-subdropdown').hide();
            if ($(this).find(".contentList__dest:first.destacado").length > 0)
                $(this).find(".contentList__dest:first.destacado").show();
            else $(this).find('.c-subdropdown:first').show();
            $(this).find("#c-subdropdown-1").val($("#c-subdropdown-1 option:first").val()).attr('id','active');
            $(this).find('.contentList__dest:first').show();

            $(this).find("#c-dropdown_op1").off();
            $(this).find("#c-dropdown_op1").on("change", function() {
                $(elemento).find('.c-subdropdown').hide();
                $(elemento).find('.c-subdropdown').find('select').attr('id','')
                $(elemento).find('.sub' + $(this).val()).show().find('select').attr('id','active');
                $(elemento).find("#active").val($(elemento).find("#active option:first").val());
                $(elemento).find('.contentList__dest').hide();
                if ($(elemento).find("#active option:first").length > 0){
                    $(elemento).find('#divsub' + $(elemento).find("#active option:first").val()).show();
                    console.log("if");
                }else{
                    //$(elemento).find(".destacado").show();
                    var currentBlock = $("#c-dropdown_op1").val();
                    console.log("else " + currentBlock);
                    $(elemento).find('#divsub' + currentBlock).show();

                }
            });
            $(elemento).find('.c-subdropdown select').off();
            $(elemento).on("change", "#active",function() {
                $(elemento).find('.contentList__dest').hide();
                $(elemento).find('#divsub' + $(this).val()).show();
            });
        });
    });
}

//Productos Alternos
function alternateProducts(){
    var productsList = $(".content_alternative");

    productsList.removeClass("left").removeClass("right");

    productsList.each(function(index){
        if(index % 2 !== 0){
            $(this).addClass("right");
        }
    });
}

//Print
function printHTML() {
    if (window.print) {
        $("img[data-src]").each(function(index) {
            if(this.getAttribute('data-src')){
                this.setAttribute('src', this.getAttribute('data-src'));
            }
            $(this).css("opacity","1");
        });

        window.print();
    }
}

//Sidebar Anchors
function sidebarAnchors(){
    var offsetHeader = 180;
    var headerHeight = $("header .header__primary").height();
    var anchors = $(".sidebar-anchors li").find("a");

    //anchors.on("click", function(e){
    //e.preventDefault();
    //var href = $(this).attr("href"),
    //offsetTop = href === "#" ? 0 : $(href).offset().top - offsetHeader;
    //$('html, body').stop().animate({
    //scrollTop: offsetTop
    //}, 1000);
    //});

    /*Sticky*/
    if($('.sidebar-anchors').length > 0){
        var sidebarPos = $('.sidebar-anchors').offset().top - headerHeight - 40;

        //onscroll resize
        $(window).on('scroll resize ready', function() {
            var currentScroll = $(window).scrollTop();

            if (currentScroll >= sidebarPos) {
                if (currentScroll == 0) {
                    $('.sidebar-anchors').removeClass("sticky");
                } else {
                    $('.sidebar-anchors').addClass("sticky");
                }
            } else {
                $('.sidebar-anchors').removeClass("sticky");
            }

            //active
            //var asideOffset = $("#accordion.sidebar-anchors").offset().top;
            //var components = $("#accordion.sidebar-anchors .components a");

            //components.each(function(){
            //var id = $(this).attr("href");
            //if(id.indexOf("#") != -1){
            //if(asideOffset+100 >= $(id).offset().top){
            //$("#accordion.sidebar-anchors .components li").removeClass("active");
            //$(this).parent().addClass("active");
            //}
            //}
            //});

            //if($("#accordion.sidebar-anchors .components a").last().attr("href").indexOf("#") != -1){
            //if($(window).scrollTop() + $(window).height() == $(document).height()){
            //$("#accordion.sidebar-anchors .components li").removeClass("active");
            //$("#accordion.sidebar-anchors .components a").last().parent().addClass("active");
            //}
            //}
        });

        //onready
        var currentScroll = $(window).scrollTop();

        if (currentScroll >= sidebarPos) {
            $('.sidebar-anchors').addClass("sticky");
        } else {
            $('.sidebar-anchors').removeClass("sticky");
        }

        //active
        // var asideOffset = $("#accordion.sidebar-anchors").offset().top;
        // var components = $("#accordion.sidebar-anchors .components a");
        //
        // components.each(function(){
        //     var id = $(this).attr("href");
        //     if(id.indexOf("#") != -1) {
        //         if (asideOffset + 100 >= $(id).offset().top) {
        //             $("#accordion.sidebar-anchors .components li").removeClass("active");
        //             $(this).parent().addClass("active");
        //         }
        //     }
        // });
    }

    if($('.tm .sidebar-anchors').length > 0){
        $(window).on('scroll resize ready', function() {
            var currentScroll = $(window).scrollTop();

            if (currentScroll >= sidebarPos) {
                if (currentScroll >= 965) {
                    $('.tm .sidebar-anchors').removeClass("sticky");
                }
                else {
                    $('.tm .sidebar-anchors').addClass("sticky");
                }
            } else {
                $('.tm .sidebar-anchors').removeClass("sticky");
            }

        });

        var currentScroll = $(window).scrollTop();

        if (currentScroll >= sidebarPos) {
            $('.tm .sidebar-anchors').addClass("sticky");
        } else {
            $('.tm .sidebar-anchors').removeClass("sticky");
        }
    }
}

//Accesibility
function trapTabKey(obj, evt) {
    // list of focuseable elements
    var focusableElementsString = "a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, *[tabindex='0'], *[contenteditable]";
    // var focusableElementsString = "a[href], area[href], input, select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, *[tabindex='0'], *[contenteditable]";

    // if tab or shift-tab pressed
    if (evt.which == 9) {
        // get list of all children elements in given object
        var o = obj.find('*');
        // get list of focusable items
        var focusableItems;
        focusableItems = o.filter(focusableElementsString).filter(':visible');
        // get currently focused item
        var focusedItem;
        focusedItem = jQuery(':focus');
        // console.log(focusedItem);
        // get the number of focusable items
        var numberOfFocusableItems;
        numberOfFocusableItems = focusableItems.length;
        // get the index of the currently focused item
        var focusedItemIndex;
        focusedItemIndex = focusableItems.index(focusedItem);
        if (evt.shiftKey) {
            //back tab
            // if focused on first item and user preses back-tab, go to the last focusable item
            if (focusedItemIndex == 0) {
                focusableItems.get(numberOfFocusableItems - 1).focus();
                evt.preventDefault();
            }
        } else {
            //forward tab
            // if focused on the last item and user preses tab, go to the first focusable item
            if (focusedItemIndex == numberOfFocusableItems - 1) {
                focusableItems.get(0).focus();
                evt.preventDefault();
            }
        }
    }
}

function macromenuAccesibility(){
    var mainContainer = $("#page");
    var panelsContainer = $("#tabs + #content");

    mainContainer.attr("aria-hidden","false");

    //TABS
    var tabLinks = $("#tabs .nav-item > a");

    //Modificaciones auditoria
    tabLinks.removeAttr("aria-selected");
    tabLinks.attr("aria-expanded","false");
    tabLinks.removeAttr("title");
    tabLinks.removeAttr("role");

    tabLinks.on("keydown", function(evt){
        var tabLink = $(this);
        var tabPanel = $($(this).attr("href"));
        var panelHeading = tabPanel.find("p[aria-level='1']");


        // if enter
        if(evt.which == 13){
            //cambiar aria-hidden
            mainContainer.attr("aria-hidden","true");
            panelsContainer.attr("aria-hidden","false");
            tabPanel.attr("aria-hidden","false");

            //cambiar aria-selected
            tabLinks.attr("aria-expanded","false");
            tabLink.attr("aria-expanded","true");

            // desactivar el click con el teclado
            tabLink.on("click", function(){
                return false;
            });

            //cambiar tabindex
            tabPanel.attr("tabindex","0");

            //abrir panel
            tabLink.addClass("active");
            tabPanel.addClass("active");

            //foco al heading
            setTimeout(function(){panelHeading.focus();}, 0)
        }
    });
    var tabPanelLinks = $("#tabs + #content .tab-pane .card-body > .row > p[aria-level='1'], #tabs + #content .tab-pane .nav-link--black, #tabs + #content .tab-pane .c-link");
    tabPanelLinks.on("keydown", function(evt){
        var tabLink = $("#tabs .nav-link.active");

        trapTabKey($(this).closest(".tab-pane"), evt);

        // if esc on panel
        if(evt.which == 27){
            // tabPanel.off("keydown");
            //cambiar aria-hidden
            mainContainer.attr("aria-hidden","false");
            panelsContainer.attr("aria-hidden","true");
            $(this).closest(".tab-pane").attr("aria-hidden","true");

            //quitar aria-selected en tabs
            tabLinks.attr("aria-expanded","false");

            //cambiar tabindex
            $(this).closest(".tab-pane").attr("tabindex","-1");

            //foco a tab
            tabLink.focus();

            tabLink.removeClass("active");
            $(this).closest(".tab-pane").removeClass("active");
        }
    });

    //SUBTABS
    var subtabLinks = $("#tabs + #content .nav-link.nav-link--arrow-black");
    subtabLinks.on("keydown", function(evt) {
        // tabPanel.off("keydown");
        var subtabLink = $(this);
        var subtabPanel = $($(this).attr("href"));
        var subtabPanelLinks = subtabPanel.find("a");
        var subpanelHeading = subtabPanel.find("p[aria-level='1']");
        var fathersubtabLink = subtabLink.closest(".nav-item");

        if (evt.which == 13) {
            // if enter
            //cambiar aria-hidden
            subtabPanel.attr("aria-hidden", "false");

            //cambiar aria-selected
            subtabLinks.attr("aria-expanded", "false");
            subtabLink.attr("aria-expanded", "true");

            //cambiar tabindex
            subtabPanel.attr("tabindex", "0");
            subtabPanelLinks.attr("tabindex", "0");

            //abrir panel
            subtabLink.on( "click", function(e) {
                var isDesktop = $(window).width() > 991;
                if(isDesktop) {
                    fathersubtabLink.addClass("active");
                    return false;
                }
            });

            //foco al heading
            setTimeout(function () { subpanelHeading.focus(); }, 0)
        }
    });
    var subtabPanelLinks = $("#tabs + #content .sub-nav .sub-nav-item .nav-link, #tabs + #content .sub-nav p[aria-level='1']");
    subtabPanelLinks.on("keydown", function (evt) {
        // if esc on panel
        var subtabLink = $("#tabs + #content .nav-item.active .nav-link--arrow-black");
        //atrapar foco
        trapTabKey($(this).closest(".sub-nav"), evt);

        if (evt.which == 27) {
            // subtabPanel.off("keydown");
            $(this).closest(".sub-nav").attr("aria-hidden", "true");

            //quitar aria-selected en tabs
            subtabLinks.attr("aria-expanded", "false");

            //cambiar tabindex
            $(this).closest(".sub-nav").attr("tabindex", "-1");
            $(this).closest(".sub-nav").find("a").attr("tabindex", "-1");

            //cerrar panel
            subtabLink.closest(".nav-item").first().removeClass("active");

            //foco a tab
            subtabLink.focus();
        }
    });

    //menu mobile
    var collapseLinks = $("#navbarNavDropdown #content .tab-pane .card-body > .row > .nav");
    collapseLinks.on("keydown", function (evt) {
        // if esc on panel
        if (evt.which == 27) {
            //cerrar
            collapseLinks.closest('.tab-pane').find('.card-header a').addClass('collapsed').attr('aria-expanded', false).removeAttr('style');
            collapseLinks.closest('.collapse').removeClass('show');
        }
    });

    //menu aside mobile
    var asideMobile = $("#accordion .collapse > ul");
    asideMobile.on("keydown", function (evt) {
        if($(window).width() <= 991){
            //atrapar foco
            trapTabKey($(this), evt);

            // if esc on panel
            if (evt.which == 27) {
                //cerrar
                asideMobile.closest('.full-width').find('.btn-link').addClass('collapsed').attr('aria-expanded', false).removeAttr('style');
                asideMobile.closest('.collapse').removeClass('show');
                //foco
                $("#accordion button").focus();
            }
        }
    });
}

function agendaAccessibility(){
    var tabs = $(".agenda-apl .tabs-items-list .tabs-item a");

    tabs.each(function(){
        //data
        var title = $(this).find("p").text();
        var target = $(this).parent().attr("data-target");

        //role="tab" on tabs
        $(this).attr("role","tab");
        //remove role="presentation" on child
        $(this).find(".tabs-item-title").removeAttr("role");
        //hidden heading
        $("[data-target-id="+target+"]").prepend("<h2 class='sr-only'>"+title+"</h2>");
    });

    //aria-selected on ready
    tabs.attr("aria-selected","false");
    tabs.first().attr("aria-selected","true");

    //aria-selected on change
    tabs.on("click", function(){
        tabs.attr("aria-selected", "false");
        $(this).attr("aria-selected","true");
    });

    //audit fixes
    setTimeout(function(){
        var originalSelects = $(".agenda-apl .tabs__filters select");
        originalSelects.attr("aria-hidden","true");
        originalSelects.attr("tabindex","-1");

        var customSelect = $(".agenda-apl .tabs__filters .dropdown-toggle");
        var customSelectLabel = customSelect.parent().siblings("label");
        customSelectLabel.attr("id", customSelectLabel.attr("for")+"-label");
        customSelect.attr("aria-labelledby",customSelectLabel.attr("id"));

        customSelect.on("keydown",function(e){
            setTimeout(function(){
                if(e.which == 40){//Al pulsar flecha abajo
                    var customOptions = $(".agenda-apl .tabs__filters .dropdown-menu li a");
                    customOptions.each(function(){
                        //añadir id a label padre
                        var parentLabel = $(this).parents(".dropdown").siblings("label");
                        var parentLabelID = parentLabel.attr("for")+"-id";
                        parentLabel.attr("id", parentLabelID);

                        //añadir id a label option
                        var labelID= $(this).attr("id");

                        //asociar ids multiples
                        $(this).attr("aria-labelledby", parentLabelID + " " + labelID);

                    });
                }
            },100);
        });

        var customMSSelects = $(".agenda-apl .tabs__filters .ms-options-wrap > button");
        customMSSelects.each(function(){
            var customMSSelectLabel = $(this).parent().siblings("label");
            customMSSelectLabel.attr("id", customMSSelectLabel.attr("for")+"-label");
            $(this).attr("aria-labelledby", customMSSelectLabel.attr("id"));
        });

        customMSSelects.on("click", function(){
            if($(this).attr("aria-expanded") === "false"){
                $(this).attr("aria-expanded","true");
            }else if($(this).attr("aria-expanded") === "true"){
                $(this).attr("aria-expanded","false");
            }
        });
        customMSSelects.on("keydown", function(evt){
            if(evt.which == 27){
                if($(this).attr("aria-expanded") === "true"){
                    $(this).attr("aria-expanded","false");
                }
            }
        });
        var customMSOptions = $(".agenda-apl .tabs__filters .ms-options-wrap > .ms-options");
        customMSOptions.on("keydown", function(evt){
            if(evt.which == 27){
                if($(this).siblings("button").attr("aria-expanded") === "true"){
                    $(this).siblings("button").attr("aria-expanded","false");
                }
                $(this).siblings("button").focus();
            }
        });
    }, 2000);
}

function scheduleBtnAccessibility(){
    $(".schedule__item .schedule__btn").attr("aria-expanded", "false");
    $(".schedule__item .schedule__btn").on("click", function(){
        if($(this).attr("aria-expanded") === "false"){
            $(this).attr("aria-expanded","true");
        }else{
            $(this).attr("aria-expanded","false");
        }
    });
}

function cookiesBannerAccessibility(){
    //add aria-modal
    $("#cookie2").attr("aria-modal","true");
    $("#cookie2").attr("role","dialog");

    $("#cookie2 #cookies-accept-full a").focus();

    $("#cookie2").find("h2").attr("role","heading");
    $("#cookie2").find("h2").attr("aria-level","1");

    $("#cookie2").on("keydown", function(event){
        trapTabKey($(this), event);
    });
}

function presearchAccessibility(){
    //add aria-modal
    $("#search__content").attr("aria-modal","true");

    // focus to close when opened
    $(".search__link-anchor").on("click", function(){
        setTimeout( function(){
            $(".search__link-close").focus()
        }, 0);
    });

    // return to open button
    $(".search__link-close").attr("role","button");
    $(".search__link-close").on("click", function(){
        setTimeout( function(){
            $(".search__link-anchor").focus()
        }, 0);
    });

    // trap focus on presearch
    $("#search__content").on("keydown", function(event){
        trapTabKey($(this), event);
    });

    $("#search__content").on("keydown", function(e){
        if (e.which == 27){
            $(".search__link-close").click();
        }
    });

    // remove lost link
    $("#prebuscadorCabecera .search-trigger").attr("tabindex","-1");
}

function mobileMenuAccessibility(){
    $("#navbarNavDropdown").on("keydown", function(event){
        if($(window).width() <= 992) {
            trapTabKey($(this), event);

            if (event.which == 27) {
                $(".navbar-toggler").click();
            }
        }
    });
}

function cotizacionFocusAccessibility(){
    $(".header__secondary").on("click", ".cotizacion a", function(){
        $(".bt-close .bt-l-close").focus();
    });
    $(".panels").on("keydown", ".bt-close .bt-l-close" ,function(e){
        if (e.which == 27 || e.which == 13){
            $(this).click();
            $(".cotizacion > a").focus();
        }else{
            return false;
        }
    });
}

function fakeFocusLogoMenuAccessibility(){
    $(".header__secondary a").last().on("keydown", function(e){
        if($(window).width() >= 991){
            if (e.which == 9 && !e.shiftKey){
                e.stopPropagation();
                e.preventDefault();
                setTimeout(function(){$(".header__primary .main-title a").focus();},0);
            }
        }
    });

    setTimeout(function(){
        if($(".header__primary #tabs").length > 0){ //If menú
            $(".header__primary .main-title a").on("keydown", function(e){
                if($(window).width() >= 991) {
                    if (e.which == 9 && !e.shiftKey) {
                        e.stopPropagation();
                        e.preventDefault();
                        setTimeout(function () {
                            $(".header__primary #tabs li:first-child a").focus();
                        }, 0);
                    } else if (e.which == 9 && e.shiftKey) {
                        e.stopPropagation();
                        e.preventDefault();
                        setTimeout(function () {
                            $(".header__secondary a").last().focus();
                        }, 0);
                    }
                }
            });
            $(".header__primary #tabs li:first-child a").on("keydown", function(e){
                if($(window).width() >= 991) {
                    if (e.which == 9 && e.shiftKey) {
                        e.stopPropagation();
                        e.preventDefault();
                        setTimeout(function () {
                            $(".header__primary .main-title a").focus();
                        }, 0);
                    }
                }
            });
            $(".header__primary #tabs li:last-child a").on("keydown", function(e){
                if($(window).width() >= 991) {
                    if (e.which == 9 && !e.shiftKey) {
                        e.stopPropagation();
                        e.preventDefault();
                        setTimeout(function () {
                            $(".search__link a").focus();
                        }, 0);
                    }
                }
            });
            $(".search__link a").on("keydown", function(e){
                if($(window).width() >= 991) {
                    if (e.which == 9 && e.shiftKey) {
                        e.stopPropagation();
                        e.preventDefault();
                        setTimeout(function () {
                            $(".header__primary #tabs li:last-child a").focus();
                        }, 0);
                    }
                }
            });
        }
    }, 0);
}

//D2 TABS
function testTabsWidth(){
    $.each($(".tabs-group"), function(idx, obj){
        var tabWidthSum = 0;
        $.each($(obj).find(".tabs-item"), function(idx, obj){
            tabWidthSum += $(obj).outerWidth(true);
        });
        var tabItemsWidth = $(obj).find(".tabs-items-list").outerWidth(true);
        if (tabWidthSum > tabItemsWidth){
            $(obj).find(".tabs-items-list").addClass("tabs-navigation").removeClass("tabs-no-navigation");
        } else {
            $(obj).find(".tabs-items-list").addClass("tabs-no-navigation").removeClass("tabs-navigation");
        }
    });
}
function tabsOpener(tab){
    var $this = tab.closest('.tab-opener');
    var showId = $this.attr("data-target");
    $this.closest(".tabs-group").find(".tabs-content").hide();
    $this.closest(".tabs-group").find(".tabs-content").find("h2").removeClass('focus');
    $this.closest(".tabs-group").find(".tabs-content[data-target-id='" + showId + "']").show().find("img[data-src]").trigger("unveil");
    $this.closest(".tabs-group").find('.tabs-item-title-active').removeClass('tabs-item-title-active');
    $(".tab-opener").find("a").removeClass('opener');

    if (!$this.find(".tabs-item-title").hasClass(' tabs-item-title-active')) {
        $this.find(".tabs-item-title").addClass(' tabs-item-title-active');
        $this.find("a").addClass('opener');
        $(".tabs-content").addClass("no-active");
        $this.closest(".tabs-group").find(".tabs-content[data-target-id='" + showId + "']").removeClass("no-active").show();
        $this.closest(".tabs-group").find(".tabs-content[data-target-id='" + showId + "']").show();
    }

    if ($this.siblings(".expanded")){
        $this.siblings(".expanded").addClass("expanding");
        $this.siblings(".expanded").find(".tab-dropdown-open").slideUp(function(){
            $this.siblings(".expanding").find(".tab-dropdown-open").removeClass("tab-dropdown-open");
            $this.siblings(".expanding").removeClass('expanding');
        });
        $this.siblings(".expanded").removeClass("expanded");
    }

    moveTabElementToFullView($this);
}
function tabsSearchOpener(tab){
    var $this = tab.closest('.tab-opener');
    var showId = $this.attr("data-target");
    $this.closest(".column").find(".search-result-block").hide();
    $this.closest(".column").find(".search-result-block[data-target-id='" + showId + "']").show().find("img[data-src]").trigger("unveil");
    $this.closest(".column").find('.tabs-item-title-active').removeClass('tabs-item-title-active');
    if (!$this.find(".tabs-item-title").hasClass(' tabs-item-title-active')) {
        $this.find(".tabs-item-title").addClass(' tabs-item-title-active');
    }
    moveTabElementToFullView($this);
}
function moveTabElementToFullView(element){
    var $target = element;
    if($target.length > 0) {
        var parentLeftPosition = $target.closest('.tabs-items-wrap').offset().left;
        var parentRightPosition = ($(window).width() - (parentLeftPosition + $target.closest('.tabs-items-wrap').outerWidth()));
        var moveTargetContainer = function() {
            var elementLeftPosition = $target.offset().left;
            var elementRightPosition = ($(window).width() - (elementLeftPosition + $target.outerWidth()));

            var rightArrow = $target.closest(".tabs-group").find(".tabs-arrow-right a");
            var rightArrowWidth = rightArrow.is(":visible") ? rightArrow.outerWidth() : 0;
            var leftArrow = $target.closest(".tabs-group").find(".tabs-arrow-left a");
            var leftArrowWidth = leftArrow.is(":visible") ? leftArrow.outerWidth() : 0;

            if (parentRightPosition+rightArrowWidth > elementRightPosition){
                if($target.closest(".tabs-group").find(".tabs-arrow-right:visible").length > 0){
                    if(elementRightPosition < 0 || (elementLeftPosition-$target.closest('.tabs-items-list').outerWidth()+leftArrowWidth<parentLeftPosition)){
                        var arrow = $target.parents(".tabs-group").find(".tabs-arrow-right a").closest('.tabs-items-list');
                        slideTabs(arrow, (elementLeftPosition) - (parentRightPosition+rightArrowWidth));
                    }
                    else {
                        $target.parents(".tabs-group").find(".tabs-arrow-right a").click();
                        window.setTimeout(moveTargetContainer, 400);
                    }
                }
            } else if (parentLeftPosition + leftArrowWidth > elementLeftPosition ){
                if($target.parents(".tabs-navigation").find(".tabs-arrow-left:visible").length > 0){
                    if(elementLeftPosition < 0 || (elementRightPosition+$target.closest('.tabs-items-list').outerWidth()+rightArrowWidth>parentRightPosition)){
                        var arrow = $target.parents(".tabs-group").find(".tabs-arrow-left a").closest('.tabs-items-list');
                        slideTabs(arrow, (parentLeftPosition + leftArrowWidth)*-1 + elementLeftPosition);
                    }
                    else {
                        $target.parents(".tabs-group").find(".tabs-arrow-left a").click();
                        window.setTimeout(moveTargetContainer, 400);
                    }
                }
            }
        };
        moveTargetContainer();
    }
}
function tabsHeight() {
    $('.tabs-items').each(function(){
        var tabs = $(this);
        var tabH = 0;
        var tabItems = tabs.find('.tabs-item');
        tabItems.each(function(){
            if($(this).outerHeight(true) > tabH) {
                tabH = $(this).outerHeight(true);
            }
        });
        tabItems.height(tabH);
    })
}
function slideTabs(tabs, amount) {
    var tabSc = tabs.find('.tabs-items-wrap');
    var leftS = tabSc.scrollLeft() + amount;
    tabSc.animate({
        scrollLeft: leftS
    }, 400);
}
function tabsEvents() {
    $('.tabs-group').not('.search-tabs').find('.tabs-item.tab-opener').children('a').on('click',function(e){
        var $this = $(this);
        if($this.children('.tabs-item-title-active').length !== 0) {
            e.preventDefault();
            return ;
        }
        tabsOpener($this);
    });


    $('.tabs-group.search-tabs').find('.tabs-item.tab-opener').children('a').click(function(){
        tabsSearchOpener($(this));
    });
    $('.tabs-items-wrap').on('scroll',function(){
        var tabs = $(this);
        var tabsSc = tabs.scrollLeft();
        var tabsLast = tabs.find('.tabs-item:last-child');
        var tabLeft = tabs.closest('.tabs-items-list').find('.tabs-arrow-left');
        var tabRight = tabs.closest('.tabs-items-list').find('.tabs-arrow-right');
        if(tabsSc <= 0) {
            tabLeft.fadeOut();
        } else {
            tabLeft.fadeIn();
        }
        var tabsLimit = tabs.width();
        var lastItemLimit = tabsLast.offset().left - tabs.offset().left + tabsLast.outerWidth();
        if (lastItemLimit - 5 < tabsLimit) {
            tabRight.fadeOut();
        } else {
            tabRight.fadeIn();
        }
    });

    $('.tabs-arrow-left').find('a').click(function(e){
        e.preventDefault();
        var arrow = $(this).closest('.tabs-items-list');

        slideTabs(arrow, (-1 * arrow.outerWidth()));

    });
    $('.tabs-arrow-right').find('a').click(function(e){
        e.preventDefault();
        var arrow = $(this).closest('.tabs-items-list');
        slideTabs(arrow,arrow.outerWidth());
    })
}

//Paginacion agrupación de documentos
function documentsPagination(){
    var documentTables = $(".contentList");

    documentTables.each(function(elemento){
        var documentsCnt = $(elemento).find("table tbody tr").length - 1;

        if(documentsCnt > 8){
            $(this).find(".table-container").addClass("pagination");
        }
    });

}

//Agenda tab
function agendaTabs(){
    var parentTabs = $(".agenda-apl .parent-tab a");

    parentTabs.on("click", function(e){
        e.preventDefault();
        var childContent = $("[data-target-id="+$(this).parent().attr("data-target")+"]");
        childContent.find(".tabs-item a").first().trigger("click");
    });
}

//Filtros Buscador
function selectFilter(){
    $('select[multiple]').multiselect('select', String|Array);

    var seccion=$("#secciones");
    var year=$("#data");

    if($("html").attr("lang") == "es"){
        $('select[multiple]#secciones').multiselect(
            { texts: { placeholder: 'Todas las secciones' } }
        );

        $('select[multiple]#data').multiselect(
            { texts: { placeholder: 'Todos los años' } }
        );

        $('select[multiple]#mes').multiselect(
            { texts: { placeholder: 'Todos' } }
        );

        $('select[multiple]#actividad').multiselect(
            { texts: { placeholder: 'Todos' } }
        );
        $('select[multiple]#ubicacion').multiselect(
            { texts: { placeholder: 'Todas' } }
        );

    }else if($("html").attr("lang") == "ca"){
        $('select[multiple]#secciones').multiselect(
            { texts: { placeholder: 'Totes les seccions' } }
        );

        $('select[multiple]#data').multiselect(
            { texts: { placeholder: 'Tots els anys' } }
        );

        $('select[multiple]#mes').multiselect(
            { texts: { placeholder: 'Tots' } }
        );

        $('select[multiple]#actividad').multiselect(
            { texts: { placeholder: 'Tots' } }
        );
        $('select[multiple]#ubicacion').multiselect(
            { texts: { placeholder: 'Totes' } }
        );

    }else if($("html").attr("lang") == "en"){
        $('select[multiple]#secciones').multiselect(
            { texts: { placeholder: 'All sections' } }
        );

        $('select[multiple]#data').multiselect(
            { texts: { placeholder: 'All years' } }
        );

        $('select[multiple]#mes').multiselect(
            { texts: { placeholder: 'All' } }
        );

        $('select[multiple]#actividad').multiselect(
            { texts: { placeholder: 'All' } }
        );
        $('select[multiple]#ubicacion').multiselect(
            { texts: { placeholder: 'All' } }
        );
    }
}

//Filtros Buscador Accesibility
function selectFilterAccesibility(){
    $('.agenda-apl #ms-list-1 button, .agenda-apl #ms-list-2 button, .agenda-apl #ms-list-3 button').attr("aria-expanded","false");

    if($("html").attr("lang") == "es"){
        $('.agenda-apl #ms-list-1 button').attr("title","Pulse para desplegar la lista de meses y marque aquellos que desee");
        $('.agenda-apl #ms-list-2 button').attr("title","Pulse para desplegar la lista de tipos de actividades y marque aquellas que desee");
        $('.agenda-apl #ms-list-3 button').attr("title","Pulse para desplegar la lista de ubicaciones y marque aquellas que desee");

    }else if($("html").attr("lang") == "ca"){
        $('.agenda-apl #ms-list-1 button').attr("title","Premi per desplegar la llista de mesos i marqui aquells que vulgueu");
        $('.agenda-apl #ms-list-2 button').attr("title","Premi per desplegar la llista de tipus d'activitats i marqui aquelles que desitgi");
        $('.agenda-apl #ms-list-3 button').attr("title","Premi per desplegar la llista d'ubicacions i marqui aquelles que desitgi");

    }else if($("html").attr("lang") == "en"){
        $('.agenda-apl #ms-list-1 button').attr("title","Press to display the list of months and mark those you want");
        $('.agenda-apl #ms-list-2 button').attr("title","Press to display the list of types of activities and mark those you want");
        $('.agenda-apl #ms-list-3 button').attr("title","Press to display the list of locations and mark the ones you want");
    }
}

// Table  documents Accesibility
function tableDocsAccesibility(){
    //tablas en general
    $("table").each(function(){
        $(this).find("th").parents("table").addClass("role-table");
        if  ($(this).hasClass("role-table")){

        }

        else {
            $(this).attr("role","presentation");
        }

    });

    $("#notitle table.role-table, .notitle table.role-table").attr("role","presentation");

}


//Scroll icon Buscador
function setScrollItemVisibility() {
    var showScroll = typeof neoShowScroll === "undefined" || neoShowScroll;
    var isDesktop = $(window).width() > 991;

    if(showScroll && isDesktop) {
        $("body .buscador").append("<div id='scrollIcon' class='scroll-icon'><span></span></div>");
        $(window).on("scroll", function() {
            $("#scrollIcon").hide();
        });
        $(window).on("resize", function() {
            var isMobile = $(window).width() <= 991;
            if(isMobile) {
                $("#scrollIcon").hide();
            }
        });
    }

    function scroll_icon(event) {
        $('html, body').animate({ scrollTop: $('#scrollIcon').offset().top - 120 }, 500);
        return false;
    }
    $('#scrollIcon').click(scroll_icon);

    if ($("body").height() <= $(window).height())
        $('#scrollIcon').hide();
}

//Download documents
function downloadDocuments(){
    var iconsDownload = $(".contentList__dest .float-right, .contentList .float-right");
    if(iconsDownload.length > 0){
        iconsDownload.each(function(){
            $(this).attr("download","");
        });
    }

    var imgDownload = $(".contentList__dest img.float-right, .contentList img.float-right, .contentList__dest img, .contentList img");
    if(imgDownload.length > 0){
        imgDownload.each(function(){
            $(this).removeAttr("download");
            $(this).parent('a').attr("download","");
            $(this).parent('a').attr("class","float-right");
        });
    }

}

//Icons target="_blank"
function iconsTargetBlank(){
    var links = $("a[target=_blank]");
    var iconHTML = "<span class='c-link--inline m-0'><img alt='' height='11' src='/deployedfiles/caixabank_com/Estaticos/Imagenes/external-link.png' width='13'> </span>";

    links.each(function(){
        var link = $(this);

        if (link.siblings(".c-link--inline").length === 0){
            if(link.attr("download") === undefined || link.attr("download") === false){
                link.after(iconHTML);
            }
        } else if (link.siblings(".c-link--inline").length >= 0){
            if(link.attr("download") === undefined || link.attr("download") === false){
                link.after(iconHTML);
            }
        }

        $('.font-color--white .c-link--inline img').attr("src", "/deployedfiles/caixabank_com/Estaticos/Imagenes/external-link-white.png")
    });

}

function activeMacromenu(){
    var pageSubUrlprev = location.href.split("/").pop();
    var pageSubUrl = removeParam("fecha", pageSubUrlprev);

    var headerLinks = $("#navbarNavDropdown #tabs > li > .nav-link, #navbarNavDropdown #content .nav-link");
    headerLinks.each(function(){
        if($(this).parents("#tabs").length > 0){
            if($(this).attr('data-href') !== undefined && $(this).attr('data-href').indexOf(pageSubUrl) !== -1){
                console.log($(this).attr('data-href').indexOf(pageSubUrl) !== -1)
                $(this).addClass("highlighted");
            }
        }else if($(this).parents("#content").length > 0){
            if($(this).attr('href') !== undefined && $(this).attr('href').indexOf(pageSubUrl) !== -1){
                //Link
                //$(this).addClass("highlighted");
                //ParentLink
                //$(this).parents(".sub-nav").siblings(".nav-item-link").find(".nav-link").addClass("highlighted");
                //ParentPanel
                var parentPanel = $(this).parents(".tab-pane").attr('id');
                $("#navbarNavDropdown #tabs > li > .nav-link[href='#"+parentPanel+"']").addClass("highlighted");
            }
        }
    });

    /* 4 breadcrumb levels */
    var nBreadcrumbLevels = $(".breadcrumb .crumb").length;
    if(nBreadcrumbLevels >= 3){ //Si 4 niveles de breadcrumb
        var parent = $(".breadcrumb .crumb a").last();
        var subUrl = parent.attr("href").split("/").pop();
        console.log(subUrl);
        headerLinks.each(function(){
            if($(this).parents("#tabs").length > 0){
                if($(this).attr('data-href') !== undefined && $(this).attr('data-href').indexOf(subUrl) !== -1){
                    $(this).addClass("highlighted");
                }
            }else if($(this).parents("#content").length > 0){
                if($(this).attr('href') !== undefined && $(this).attr('href').indexOf(subUrl) !== -1){
                    //Link
                    //$(this).addClass("highlighted");
                    //ParentLink
                    //$(this).parents(".sub-nav").siblings(".nav-item-link").find(".nav-link").addClass("highlighted");
                    //ParentPanel
                    var parentPanel = $(this).parents(".tab-pane").attr('id');
                    $("#navbarNavDropdown #tabs > li > .nav-link[href='#"+parentPanel+"']").addClass("highlighted");
                }
            }
        });
    }

    // quitar marcado lineas apl
    $(".buscador #navbarNavDropdown #tabs > li > .nav-link").removeClass("highlighted");
    $(".apl #navbarNavDropdown #tabs > li > #tab-5.nav-link").removeClass("highlighted");
}

function replaceTableDocumentsSpaces(){
    var textList = $(".contentList table td a ~ p.font-color--gray-dark, .contentList__dest table td a ~ p.font-color--gray-dark");

    textList.each(function(){

        var newString = $(this).text().replace("(\n","(").replace("\n,",",").replace("\n)",")");
        $(this).text(newString);

    });
}

//Cards animation
function cardsAnimation(){
    $("#news .news-cards .n-card .n-card__wrapper").hover(function(){
        $(this).find('.n-card__img-block').addClass('img-block-hover');
    }, function(){
        $(this).find('.n-card__img-block').removeClass('img-block-hover');
    });

    $("#news2 .news-cards .n-card .n-card__wrapper").hover(function(){
        $(this).find('.n-card__img-block').addClass('img-block-hover');
    }, function(){
        $(this).find('.n-card__img-block').removeClass('img-block-hover');
    });
}

//interlineado menor
function IntSmall(){
    $(".title_small").parent().addClass("int_small");
}

/** mostar cotización **/
var panelLoadFunction = function(obj, showOnLoad, loadCallback){
    $(".freeContent.panels").slideDown();
    $(".freeContent.panels>.loading").show();


    /**
     Function used to fetch the contents of a panel. It is used on both lazy and document ready loading of panels.
     It retrieves the data from the data-panel-target attribute and appends it to the .freeContent.panels element, wrapped in a div with the  id fetched from the data-target attribute.
     **/
    var targetPanel = $($(obj).attr("href"));
    var targetContent = $(obj).attr("data-panel-target");

    var holderElement = $(obj).attr("data-panel");
    holderElement = holderElement.indexOf("#") == 0 ? holderElement.substr(1) : holderElement; // Tests if starts with #

    var thisPanel;
    if ($("#" + holderElement).length){
        thisPanel = $("#" + holderElement);
    }else{
        thisPanel = $("<div />");
        thisPanel.attr("id", holderElement);
        $(".freeContent.panels").append(thisPanel);
    }

    if (typeof targetContent !== typeof undefined && targetContent !== false) {
        $.get(targetContent, function(data){
            data = data.replace(/rel="stylesheet"/g, '');  // REMOVE DELETE MOCK :: Removing Associated Styles from the data (using ajax.jsp from old site that includes conflicting styles).
            data = data.replace("var timestamp = new Date().valueOf() $(this)", "var timestamp = new Date().valueOf(); $(this)");
            thisPanel.html(data);

            if (showOnLoad){
                thisPanel.slideDown();
            }
            if (loadCallback && typeof loadCallback == 'function'){
                loadCallback();
            }

            $(".freeContent.panels>.loading").hide();
        }).fail(function(e) {
            log("Could not load data-panel-target.");
            log(e);
        });
    }
};

var closeAllPanels = function(){

    // Hides open panels
    $(".freeContent.panels").children("div:visible").slideUp();
    $(".freeContent.panels").slideUp();


    // Hides overlay
    $("#panels-overlay").fadeOut();

    // Removes page-wrapper overlay classes
    $(".page-wrapper").removeClass (function (index, css) {
        return (css.match (/(^|\s)overlay-\S+/g) || []).join(' ');
    });
}

var doQuotePanel = function(){
    /**
     Sets the lazy loading of panels, activated on the click event of elements with data-panel-target attribute
     **/

    $(".cotizacion [data-panel-target]").click(function(){
        var panelId = $(this).attr("data-panel");
        panelId = (panelId.indexOf("#") == 0 ? panelId : "#" + panelId);
        if ($(panelId).length == 0){ // Only loads panel if it wasn't loaded before
            panelLoadFunction(this, true, function() {
                $(panelId + " h1").focus();
            });
        }
    });

};

function cot(){
    doQuotePanel();

    var doQuoteSnippet =  (function(){
        /**
         Retrieves the HTML from .html-snippet elements with data-target attributes.
         **/
        var selector = ".cotizacion .html-snippet[data-target], .cotizacion-link .html-snippet[data-target]";

        if (!$(selector).attr("data-target")) {
            return ;
        }

        var targetData = $(selector).attr("data-target");

        $.get(targetData, function(data){
            $(selector).html(data);
        }).fail(function(e) {
            console.log("Could not load html snippet target");
            console.log(e);
        });


    })();

    $(".cotizacion a").click(function(ev){

        var cotizacionA = $(ev.target);
        if(!cotizacionA.is("a[data-panel]")) {
            cotizacionA = $(ev.target).parents("a[data-panel]")
        }
        var cotizacionButton = cotizacionA.find(">span>span");
        var holderElement = cotizacionA.attr("data-panel");
        holderElement = holderElement.indexOf("#") == 0 ? holderElement.substr(1) : holderElement; // Tests if starts with #
        if (cotizacionButton.hasClass("panel-expanded")){

            // Hide Panel
            cotizacionButton.removeClass("panel-expanded");
            $(".freeContent.panels").find("#" + holderElement).slideUp();
            $(".freeContent.panels").slideUp();
            cotizacionA.attr("aria-expanded", false);
            closeAllPanels();

            $('.header').attr('aria-hidden', false);
            $('.page').attr('aria-hidden', false);
            $('.panels').removeAttr('aria-hidden', false);

        }else{
            // Show Panel
            cotizacionButton.addClass("panel-expanded");

            $(".freeContent.panels").find("#" + holderElement).show();
            $(".freeContent.panels").slideDown();

            $("#panel-cotizacion h1").focus();
            cotizacionA.attr("aria-expanded", true);

            $('.header').attr('aria-hidden', true);
            $('.page').attr('aria-hidden', true);
            $('.panels').attr('aria-hidden', false);
        }
    });

    $(".cotizacion a").on("keydown", function(evt) {
        if(evt.which == 27) {
            $(".cotizacion a").click();
        }
    });
}

function closeCot(){
    $('#panel-loading').after('<div class="bt-close text-right"><a href="#" class="bt-l-close paragraph--small font-color--black" title="Cerrar">X</a></div>');

    $(".freeContent.panels a.bt-l-close").click(function(evt) {
        $(".cotizacion a").click();
    });
}

//añadir dowwload
function down(){
    $('#doc table tr td:last-child a, .enlace_especial a').attr("download","" );
    $('.enlace_especial a').append('<img alt="" src="/deployedfiles/caixabank_com/Estaticos/Imagenes/icon-donwload.svg">');
}

//blur select
function blurSelect(){
    $('nav').hover(function() { $('select').blur(); })
}

//no pintar la fecha
function noCollapse(){
    if($('#accordion .collapse ul li').length == 0){
        $('#accordion').addClass('no-collapse')
    }
}

//no pintar la fecha
function mobileSocial(){
    if($('#accordion .collapse ul li').length == 0){
        $('#accordion').addClass('no-collapse')
    }
}

//Circle chart component
function circleCharts(){
    $(".data-percentage").each(function(){
        var porcentaje = $(this).find('.c-progress-value p').text();
        $(this).find('.c-progress').attr('data-percentage', porcentaje);
    });
}

//Infographic left line
//Azul
function infographicLeftLine(){
    $(".texto_izquierda.font-color--blue").each(function(){
        var padreSuperior=$(this).closest('div.col-12');
        $(padreSuperior).addClass('infographic--left-line');
    });

    if ($(".texto_izquierda.font-color--red")){
        $(".texto_izquierda.font-color--red").each(function(){
            var padreSuperior=$(this).closest('div.col-12');
            $(padreSuperior).addClass('infographic--left-line-red');
        });
    }
}

//Infographic right line
//Azul
function infographicRightLine(){

    $(".texto_derecha.font-color--blue").each(function(){
        var padreSuperior=$(this).closest('div.col-12');
        $(padreSuperior).addClass('infographic--right-line');
    });

    if ($(".texto_derecha.font-color--red")){
        $(".texto_derecha.font-color--red").each(function(){
            var padreSuperior=$(this).closest('div.col-12');
            $(padreSuperior).addClass('infographic--right-line-red');
        });
    }
}

//Circle chart component 3 colores
function sliceSize(dataNum, dataTotal) {
    return (dataNum / dataTotal) * 360;
}

function addSlice(id, sliceSize, pieElement, offset, sliceID, color) {
    $(pieElement).append("<div class='slice " + sliceID + "'><span></span></div>");

    var offset = offset - 1;
    var sizeRotation = -179 + sliceSize;

    $(id + " ." + sliceID).css({
        transform: "rotate(" + offset + "deg) translate3d(0,0,0)"
    });

    $(id + " ." + sliceID + " span").css({
        transform: "rotate(" + sizeRotation + "deg) translate3d(0,0,0)",
        "background-color": color
    });
}

function iterateSlices(id, sliceSize, pieElement, offset, dataCount, sliceCount, color) {
    var maxSize = 179,
        sliceID = "s" + dataCount + "-" + sliceCount;

    if (sliceSize <= maxSize) {
        addSlice(id, sliceSize, pieElement, offset, sliceID, color);
    } else {
        addSlice(id, maxSize, pieElement, offset, sliceID, color);
        iterateSlices(
            id,
            sliceSize - maxSize,
            pieElement,
            offset + maxSize,
            dataCount,
            sliceCount + 1,
            color
        );
    }
}

function createPie(id) {

    var listData = [],
        listTotal = 0,
        offset = 0,
        i = 0,
        pieElement = id  + " .pie-chart__pie";
    dataElement = id +  " .pie-chart__legend";

    color = [
        "#9bbb59",
        "#57585a",
        "#fcb615",
        "#009AD8",
        "#197EAE"
    ];

    $(dataElement + " strong").each(function () {
        listData.push(Number($(this).html()));
    });

    for (i = 0; i < listData.length; i++) {
        listTotal += listData[i];
    }

    for (i = 0; i < listData.length; i++) {
        var size = sliceSize(listData[i], listTotal);
        iterateSlices(id, size, pieElement, offset, i, 0, color[i]);
        $(dataElement + " li:nth-child(" + (i + 1) + ")").css(
            "border-color",
            color[i]
        );
        $(dataElement + " li:nth-child(" + (i + 1) + ")" + " strong").css(
            "color",
            color[i]
        );
        offset += size;
    }
}

function createPieCharts() {
    var valor = 0;
    var id =  ".pie--infographic";
    var classID =  "pieID--infographic";
    createPie (id)
    $(id).each(function(){
        $(this).attr('id', classID + "-" +  (valor++));
    });
}

/*Quitar parametro de URL*/
function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}

/* aside static */
function activeAsideStatic() {
    console.log("AsideStatic");
    var pageUrl = '/' + location.href.split("/").pop();
    var fatherUrl = '/' + location.pathname.split("/", 5).pop() + '.html';
    var fatherBreadcrumb0 = $(".breadcrumb ul > li.crumb3 a").attr('href');
    var fatherBreadcrumb = $(".breadcrumb ul > li.crumb4 a").attr('href');
    var fatherBreadcrumb2 = $(".breadcrumb ul > li.crumb5 a").attr('href');
    var asideLinks = $(".sidebar-anchors .collapse ul > li > a");
    var selectAniosUrl = removeParam("fecha", pageUrl)
    asideLinks.each(function(){
        if($(this).attr('href') !== undefined && $(this).attr('href').indexOf(pageUrl) !== -1){
            $(this).addClass("active");
            console.log(pageUrl);

        }
        if($(this).attr('href') !== undefined && $(this).attr('href').indexOf(fatherUrl) !== -1){
            $(this).addClass("active");
            console.log(fatherUrl);

        }
        if($(this).attr('href') !== undefined && $(this).attr('href').indexOf(fatherBreadcrumb) !== -1){
            $(this).addClass("active");

            console.log(fatherBreadcrumb);

        }
        if($(this).attr('href') !== undefined && $(this).attr('href').indexOf(fatherBreadcrumb2) !== -1){
            $(this).addClass("active");

            console.log(fatherBreadcrumb2);

        }
        if($(this).attr('href') !== undefined && $(this).attr('href').indexOf(fatherBreadcrumb0) !== -1){
            $(this).addClass("active");
            console.log(fatherBreadcrumb0);

        }
        if($(this).attr('href') !== undefined && $(this).attr('href').indexOf(selectAniosUrl) !== -1){
            $(this).addClass("active");
            console.log(selectAniosUrl);

        }
    });

}

function sustituirIDs(){
    $("[id='notitle']").addClass("notitle").removeAttr("id");
    $("[id='mb-3']").addClass("mb-3").removeAttr("id");
    $("[id='mb-0']").addClass("mb-0").removeAttr("id");
    $("[id='mbn-3']").addClass("mbn-3").removeAttr("id");
    $("[id='smallTable']").addClass("smallTable").removeAttr("id");
    $("[id='w100']").addClass("w100").removeAttr("id");
    $("[id='td100']").addClass("td100").removeAttr("id");
    $("[id='piconos']").addClass("piconos").removeAttr("id");
    $("[id='fixed-height']").addClass("fixed-height").removeAttr("id");
    $("[id='role']").addClass("role").removeAttr("id");
}

function dropdownFiltersAnchor(){
    if(location.href.indexOf("#") !== -1 && $("[class^='one-filter'], [class^='two-filter'], [class^='dv-filter']").length != 0){ //If anchor in url & filters exist
        function removeAllAccentsAndSpaces(text) {
            var text = text.toLowerCase(); // a minusculas
            text = text.replace(/[áàäâå]/g, 'a');
            text = text.replace(/[éèëê]/g, 'e');
            text = text.replace(/[íìïî]/g, 'i');
            text = text.replace(/[óòöô]/g, 'o');
            text = text.replace(/[úùüû]/g, 'u');
            text = text.replace(/[ýÿ]/g, 'y');
            text = text.replace(/[ñ]/g, 'n');
            text = text.replace(/[ç]/g, 'c');
            text = text.replace(/['"]/g, '');
            text = text.replace(/[^a-zA-Z0-9-]/g, '');
            text = text.replace(/\s+/g, '-');
            text = text.replace(/' '/g, '-');
            text = text.replace(/(_)$/g, '');
            text = text.replace(/^(_)/g, '');
            return text;
        }
        var filtros = $("[class^='one-filter'], [class^='two-filter'], [class^='dv-filter']");
        filtros.each(function(){
            var options = $(this).find("option");
            options.each(function(){
                var dataValue = removeAllAccentsAndSpaces($(this).text());
                $(this).attr("data-anchor" , dataValue);
            });
        });

        //Si tiene un ancla
        if(location.href.indexOf("#")>0 && location.href.indexOf("#",location.href.indexOf("#")+1)==-1){
            var urlAnchor = location.href.substring(location.href.indexOf("#")+1);
            var optionValue = $("option[data-anchor="+urlAnchor+"]").val();
            $("option[data-anchor="+urlAnchor+"]").parent().val(optionValue);
            $("option[data-anchor="+urlAnchor+"]").parent().trigger("change");

        }else{
            var urlAnchor1 = location.href.substring(location.href.indexOf("#")+1,location.href.indexOf("#",location.href.indexOf("#")+1));
            var optionValue1 = $("option[data-anchor="+urlAnchor1+"]").val();
            $("option[data-anchor="+urlAnchor1+"]").parent().val(optionValue1);
            $("option[data-anchor="+urlAnchor1+"]").parent().trigger("change");

            var urlAnchor2 = location.href.substring(location.href.indexOf("#",location.href.indexOf("#")+1)+1);
            var optionValue2 = $("select#active option[data-anchor="+urlAnchor2+"]").val();
            $("select#active option[data-anchor="+urlAnchor2+"]").parent().val(optionValue2);
            $("select#active option[data-anchor="+urlAnchor2+"]").parent().trigger("change");
        }
    }
}

// Carga paginas
function classPageLoaded() {
    $("html").addClass("page-loaded")
}
function classPageDomReady() {
    $("html").addClass("page-ready")
}

function relYoutube() {
    setTimeout(function(){
        var youtube = $(".video-inline iframe");
        if(youtube.length > 0){
            youtube.each(function(){
                var urlYoutube = $(this).attr("src");
                $(this).attr("src", (urlYoutube + '&rel=0'));
            });
        }
    }, 3000);
}
function uniqueidentifierYoutube() {
    setTimeout(function(){
        var random = Math.floor((Math.random() * 1000) + 1);
        var youtube = $(".video-placeholder");
        youtube.each(function(){
            $(this).attr("data-uniqueidentifier", $(this).attr("data-uniqueidentifier").replace("data-random", random));
        });
    }, 100);
}

function micbutton() {
    setTimeout(function(){
        $(".content-mic-button").addClass("col-10 col-lg-11");
    }, 300);
}

function rolAccesibility() {
    setTimeout(function(){
        $(".main").attr("role", "main");
    }, 300);
}

function afterBlock() {
    var linkBlock = "<a class='sr-only' href='#page'>Saltar menu principal</a>";
    $(".cotizacion").before(linkBlock);
}

//Accesibilidad language menu
function languageMenuAccesibility(){
    var elementLanguage = (".header__secondary ul.language");
    if($("html").attr("lang") == "es"){
        $(elementLanguage).attr("aria-label","Seleccionar idioma");
        $(elementLanguage).find("li:nth-child(1) a").attr("aria-label","Castellano");
        $(elementLanguage).find("li:nth-child(2) a").attr("aria-label","Catalán");
        $(elementLanguage).find("li:nth-child(3) a").attr("aria-label","Inglés");
    }else if($("html").attr("lang") == "en"){
        $(elementLanguage).attr("aria-label","Select language");
        $(elementLanguage).find("li:nth-child(1) a").attr("aria-label","Spanish");
        $(elementLanguage).find("li:nth-child(2) a").attr("aria-label","Catalan");
        $(elementLanguage).find("li:nth-child(3) a").attr("aria-label","English");
    }else if($("html").attr("lang") == "ca"){
        $(elementLanguage).attr("aria-label","Seleccionar idioma");
        $(elementLanguage).find("li:nth-child(1) a").attr("aria-label","Castellà");
        $(elementLanguage).find("li:nth-child(2) a").attr("aria-label","Català");
        $(elementLanguage).find("li:nth-child(3) a").attr("aria-label","Anglès");
    }
}

function rolNone() {
    $(".role.p-highlights .p-highlight .p-highlight-title").find("*").attr("role", "none");

}

//Podcast
function initPodcastHighlights() {
    $(".podcast-highlights").first().after("<div id='podcast-overlay'><audio id='podcast-audio' src='' preload='metadata'></audio><div class='audio-container'><div class='audio-data'><div class='audio-data__text'><h3 id='audio-title'></h3><p id='audio-category'></p></div></div><div class='audio-controls'><div class='control-audio'><img src='/deployedfiles/particulares/Estaticos/Imagenes/CulturaFinanciera/audio_prev.png' id='prev'></div><div class='control-audio'><img src='/deployedfiles/particulares/Estaticos/Imagenes/CulturaFinanciera/audio_play.png' id='play'><img src='/deployedfiles/particulares/Estaticos/Imagenes/CulturaFinanciera/audio_pause.png' id='pause'></div><div class='control-audio'><img src='/deployedfiles/particulares/Estaticos/Imagenes/CulturaFinanciera/audio_next.png' id='next'></div><div class='control-audio'><span id='audio-current-time'></span></div><div class='control-audio audio-prog-bar'><div id='audio-bg-bar'><div id='audio-bar'></div></div></div><div class='control-audio'><span id='audio-total-time'></span></div><div class='control-audio'><img src='/deployedfiles/particulares/Estaticos/Imagenes/CulturaFinanciera/audio_volume_up.png' id='volume'><input type='range' min='0' max='100' value='100' step='1' id='audio_volume_bar' orient='vertical'></div><div class='control-audio'><img src='/deployedfiles/particulares/Estaticos/Imagenes/CulturaFinanciera/audio_close.png' id='close'></div></div></div></div>");
    var e = document.getElementById("podcast-audio");
    null !== e && e.addEventListener("timeupdate", (function() {
            $("#podcast-overlay #audio-bar").animate({
                width: 100 * e.currentTime / (60 * parseInt($("#audio-total-time").text().substr(0, 2)) + parseInt($("#audio-total-time").text().substr(3, 5))) + "%"
            }, 100, "linear");
            var t = Math.floor(e.currentTime)
                , a = Math.floor(t / 60);
            a = a >= 10 ? a : "0" + a,
                t = (t = Math.floor(t % 60)) >= 10 ? t : "0" + t,
                $("#audio-current-time").text("").append(a + ":" + t)
        }
    )),
        $("#podcast-overlay .control-audio").on("click", "#play", (function() {
                e.play(),
                    $("#podcast-overlay #audio-bar").css("display", "block"),
                    $("#podcast-overlay #play").css("display", "none"),
                    $("#podcast-overlay #pause").css("display", "block")
            }
        )),
        $("#podcast-overlay .control-audio").on("click", "#pause", (function() {
                e.pause(),
                    $("#podcast-overlay #pause").css("display", "none"),
                    $("#podcast-overlay #play").css("display", "block")
            }
        )),
        $("#audio_volume_bar").on("input", (function() {
                var t = $(this)[0].value / 100;
                e.volume = t
            }
        )),
        $("#podcast-overlay #volume").on("click", (function() {
                $(this).siblings("#audio_volume_bar").fadeIn()
            }
        )),
        $("#podcast-overlay #audio_volume_bar").on("mouseleave", (function() {
                $(this).fadeOut()
            }
        )),
        $("#podcast-overlay .control-audio").on("click", "#close", (function() {
                e.pause(),
                    $("#podcast-overlay #pause").css("display", "none"),
                    $("#podcast-overlay #play").css("display", "block"),
                    $("#podcast-overlay").removeClass("active")
            }
        )),
        $(".podcast-highlights__item .podcast-highlights__button a, #podcast-overlay #next, #podcast-overlay #prev").on("click", (function(t) {
                t.preventDefault(),
                    $("#podcast-overlay").addClass("active");
                var a = $(this).parents(".podcast-highlights__item")
                    , i = $(this).attr("href")
                    , n = a.find(".podcast-highlights__image img").attr("src")
                    , s = a.find(".podcast-highlights__content h3").text()
                    , o = a.find(".podcast-category").text()
                    , r = a.find(".podcast-duration").text()
                    , l = $("#podcast-overlay")
                    , c = l.find("#audio-image")
                    , d = l.find("#audio-title")
                    , u = l.find("#audio-category")
                    , h = l.find("#audio-current-time")
                    , p = l.find("#audio-total-time")
                    , f = a.next().find(".podcast-highlights__button a")
                    , m = a.prev().find(".podcast-highlights__button a");
                $("#podcast-overlay #next").on("click", (function(e) {
                        f.trigger("click")
                    }
                )),
                    $("#podcast-overlay #prev").on("click", (function(e) {
                            m.trigger("click")
                        }
                    )),
                    e.setAttribute("src", i),
                    e.load(),
                    c.attr("src", n),
                    d.text("").append(s),
                    u.text("").append(o),
                    h.text("").append("00:00"),
                    p.text("").append(r),
                    e.play(),
                    $("#podcast-overlay #audio-bar").css("width", "0"),
                    $("#podcast-overlay #play").css("display", "none"),
                    $("#podcast-overlay #pause").css("display", "block")
            }
        ))
}

function decodeHTMLEntities (str) {
    if(str && typeof str === 'string') {
        // strip script/html tags
        str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
        str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
        element.innerHTML = str;
        str = element.textContent;
        element.textContent = '';
    }

    return str;
}

function decodeFilters(){
    $("#filt2 option").each(function(){
        var str = $(this).text();
        str = str.replace("&ograve;", "ò").replace("&agrave;", "à");
        $(this).text(str);
        console.log(str);
    });
}

//filtro Podcast

function filtroPodcast() {
    var arr1 = [];
    var arr2 = [];

    $(".podcast-highlights__item").each(function() {

        arr1.push($(this).attr("data-filter-a"));
        arr2.push($(this).attr("data-filter-b"));

    });


    console.log(arr1);
    console.log(arr2);
    var uniArr1 = [...new Set(arr1)];
    console.log(uniArr1);
    var uniArr2 = [...new Set(arr2)];
    console.log(uniArr2);
    $.each(uniArr1, function(i, item) {
        $('#filt1').append($('<option>', {
            value: item,
            text: item
        }));
    });
    $.each(uniArr2, function(i, item) {
        $('#filt2').append($('<option>', {
            value: item,
            text: item
        }));
    });


    $(".cleanfilters").on("click", function(){
        $('select').prop('selectedIndex',0);
        runAllFilters();
    })


    // If any of the filters change
    $('select').change(function() {
        runAllFilters();
    });

}

function runAllFilters() {
    var list = $(".podcast-highlights__list .podcast-highlights__item");
    $(list).fadeOut("fast");

    var filtered = $(".podcast-highlights__list li");

    // recoger valores de los selects
    var date = $('select#filt1').val();
    var aula = $('select#filt2').val();

    // hacer el filtro en base a las variables
    filtered = filtered.filter(function() {
        return RegExp(date).test($(this).attr("data-filter-a")) &&
            RegExp(aula).test($(this).attr("data-filter-b"));
    });

    // Display Them
    filtered.each(function (i) {
        $(this).delay(100).fadeIn("fast");
    });
}

// Calls
$(document).ready(function(){
    stickyHeader();
    classPageDomReady(),
        detectedLanguage();
    closePanelMenu();
    toogleMenuLink();
    macromenuAccesibility();
    lazyLoad();
    scheduleLabel();
    openSearch();
    closeSearch();
    sliderChangePlayPause();
    contentFilter();
    infographicsInit();
    moduloRSCAccessibility();
    dropdownEvents();
    dropdownAccesibility();
    testCarouselWidth();
    carouselEvents();
    listcontent1();
    listcontent2();
    alternateProducts();
    countersOnScroll();
    sidebarAnchors();
    testTabsWidth();
    tabsHeight();
    tabsEvents();
    documentsPagination();
    getPagination('.pagination .table');
    agendaTabs();
    selectFilter();
    selectFilterAccesibility();
    tableDocsAccesibility();
    setScrollItemVisibility();
    downloadDocuments();
    if ($(".podcast-highlights")[0]){
        //Pagina de podcast
    } else {
        iconsTargetBlank();
    }
    activeMacromenu();
    activeAsideStatic();
    replaceTableDocumentsSpaces();
    IntSmall();
    down();
    blurSelect();
    noCollapse();
    mobileSocial();
    sustituirIDs();
    relYoutube();
    uniqueidentifierYoutube();
    dropdownFiltersAnchor();
    micbutton();
    rolAccesibility();
    afterBlock();
    languageMenuAccesibility();
    agendaAccessibility();
    scheduleBtnAccessibility();
    cookiesBannerAccessibility();
    presearchAccessibility();
    mobileMenuAccessibility();
    cotizacionFocusAccessibility();
    fakeFocusLogoMenuAccessibility();
    rolNone();
    initPodcastHighlights();
    filtroPodcast();
});

$(window).on('load',function () {
    replaceGsaImg();
    cardsAnimation();
    cot();
    closeCot();
    circleCharts();
    infographicLeftLine();
    infographicRightLine();
    createPieCharts();
    classPageLoaded();

    // quitar marcado lineas apl
    $(".buscador #navbarNavDropdown #tabs > li > .nav-link").removeClass("highlighted");
    $(".apl #navbarNavDropdown #tabs > li > #tab-5.nav-link").removeClass("highlighted");
});

//Prebuscador
function addOmnitureEventsToResults(){
    $(".presearch-results .ps-block").on("click", "a",function(){
        var type;
        var parentClass = $(this).parent().parent().parent().parent();
        if($(parentClass).hasClass("ps-products")){
            type = "Comercial";
        }else if($(parentClass).hasClass("ps-faqs")){
            type = "Faqs";
        }else if($(parentClass).hasClass("ps-offices-results")){
            type="Oficinas";
        }
        registerOmnitureByType(type,this);
        return true;
    });
}
function registerOmnitureByType(type,element){

    var keyword = $("#search-field").val();
    var position = $(element).parent().index();
    var title = $(element).attr("title");
    if(title == undefined || title === "") title="sin titulo";
    log("type:"+type+", keyword:"+keyword+", position:"+position+", title:"+title);

    s=s_gi(s_account);
    s.linkTrackVars="eVar20,prop20,eVar21,prop21,eVar23,prop23,eVar51,prop51,eVar68,prop68, events";
    s.linkTrackEvents="event23";
    s.eVar20=keyword;
    s.prop20=s.eVar20;
    s.prop21="Pre-Buscador";
    s.eVar21=s.prop21;
    s.eVar23=position;
    s.prop23=s.eVar23;
    s.eVar51=title;
    s.prop51=s.eVar51;
    s.eVar68=type;
    s.prop68=s.eVar68;
    s.events="event23";
    s.tl(this,'o','Click resultado '+type);
}
function log(e) {
    console && console.log(e)
}
if (typeof NeoSearch !== 'undefined') {
    loadAllSuggestions();
}
function loadAllSuggestions() {
    loadSuggestions("div.search-group", NeoSearch.autoFetchLink, "#suggestions");
    loadSuggestions("div.search-group-module", NeoSearch.searchGroupModules);
}
function loadSuggestions(elem, urlList, suggestionsElem) {
    $(elem).each(function(idx) {
        var id = $(this).attr("id");
        if (id != undefined && id != "" && urlList != undefined) {
            getSuggestions(id, urlList[id], suggestionsElem);
        }
    });
}
function getSuggestions(id, url, suggestionsElem) {
    if (!url) return ;
    $.get(url, function(dataSuggestion){
        var suggestions = $(dataSuggestion);
        if (typeof suggestionsElem !== "undefined") {
            suggestions = $(dataSuggestion).find(suggestionsElem);
        }
        if(!NeoSearch.suggestions){
            NeoSearch.suggestions =  [];
        }
        NeoSearch.suggestions[id] = suggestions;
    }).fail(function(e) {
        log("Could not load presearch link content.");
        log(e);
    });
}
var doSearchFormEvents =  (function(){
    var lastSearch;

    /* Prebuscador header */
    var applyPreSearchTemplate = function(data, hasResults, target, friendlyID, searchGroupModulesIds){

        var searchGroupDiv = $(target).closest(".search-group");
        var suggestedResultsDiv = $(searchGroupDiv).find(".presearch-results .ps-block.ps-suggested-results");
        var presearchResults = $(searchGroupDiv).find(".presearch-results");
        var templateForResults = $(searchGroupDiv).parent().find(".presearch-component script[type='text/x-template']");
        var bannerOfficesDiv = $(searchGroupDiv).find(".ps-offices-banner");
        var searchQuery = removeNotAllowedCharacters($(target).val());

        if(!hasResults && friendlyID){
            data = $.extend(data,  {defaultSuggestions: NeoSearch.defaultSuggestions[friendlyID]});
        }

        if (hasResults) {

            // show suggestions for auto fetch link
            showSuggestions(searchQuery, data, [friendlyID], "widgetAutoFetchLink", function(id, suggestionsElem) {
                var keywordsElem = $(suggestionsElem).find("#suggestion-keywords-filter");
                if(!keywordsElem || keywordsElem.html() == undefined) {
                    return "";
                }
                return keywordsElem.html();
            });

            // show suggestions for multiple modules
            showSuggestions(searchQuery, data, searchGroupModulesIds, "widgetBlocks", function(id, suggestionsElem) {
                var elem = $('#' + id);
                if (!elem) {
                    return "";
                }
                return elem.data('keywords');
            });

            //unencode videos
            if(data.resultData.products != undefined){
                $.each(data.resultData.products.items, function(i, v) {
                    var unencodeStr = v.video;
                    unencodeStr = $("<div/>").html(unencodeStr).text();
                    v.video=unencodeStr;


                });
            }
            if(data.resultData.videos != undefined){
                $.each(data.resultData.videos.items, function(i, v) {
                    var unencodeStr = v.video;
                    unencodeStr = $("<div/>").html(unencodeStr).text();
                    v.video=unencodeStr;


                });
            }


        }
        // comprobar keyword para banner de oficinas, si no cumple o hay oficinas se muestra el resto de la busqueda
        if(showOfficesBanner(searchQuery,friendlyID) && data.resultData != undefined && data.resultData.oficinas == undefined){
            $(bannerOfficesDiv).show();
        } else {
            var template = $(templateForResults).html();
            template = orderTemplate(template);
            var html = Mustache.render(template, {data: data });
            $(presearchResults).prepend(html);

            $("div[id=mustache-video-products-0]").each(function() {renderMustacheVideo(this);});
            $("div[id^=mustache-videos-video]").each(function() {renderMustacheVideo(this);});

            $( ".video-gsa-meta" ).on( "click", function() {
                if(!$(this).hasClass("oneTime")) {
                    $(this).addClass("oneTime");
                    var type = "Videos";
                    registerOmnitureByType(type,this);
                }
            });

            addOmnitureEventsToResults();
        }

    };

    function getOrderRegion(regionName){
        var order = -1;
        for(i=0; i < NeoSearchOrder.length && order == -1; i++){
            if(NeoSearchOrder[i] === regionName){
                order = i;
            }
        }
        return order;
    }

    function orderTemplate(template){
        var products = null, widgetAutoFetchLink = null, widgetBlocks, faqs = null, oficinas = null, maybe = null;
        if(template !== undefined && template !== null){
            if(getOrderRegion("products") > -1){
                products = removeTemplateRegion(template, "products");
                template = template.replace(products, "");
            }
            if(getOrderRegion("widgetAutoFetchLink") > -1){
                widgetAutoFetchLink = removeTemplateRegion(template, "widgetAutoFetchLink");
                template = template.replace(widgetAutoFetchLink, "");
            }
            if(getOrderRegion("widgetBlocks") > -1){
                widgetBlocks = removeTemplateRegion(template, "widgetBlocks");
                template = template.replace(widgetBlocks, "");
            }
            if(getOrderRegion("faqs") > -1){
                faqs = removeTemplateRegion(template, "faqs");
                template = template.replace(faqs, "");
            }
            if(getOrderRegion("oficinas") > -1){
                oficinas = removeTemplateRegion(template, "oficinas");
                template = template.replace(oficinas, "");
            }
            if(getOrderRegion("maybe") > -1){
                maybe = removeTemplateRegion(template, "maybe");
                template = template.replace(maybe, "");
            }
        }
        return insertRegion(template, products, widgetAutoFetchLink, widgetBlocks, faqs, oficinas, maybe);
    }

    function removeTemplateRegion(template, regionName){
        var region;
        if(template.indexOf('{{#' + regionName + '}}') >= 0  && (template.indexOf('{{/' + regionName + '}}') + 5 + regionName.length) >= 13){
            region = template.substring(template.indexOf('{{#' + regionName + '}}'), (template.indexOf('{{/' + regionName + '}}') + 5 + regionName.length));
        }
        return region;
    }

    function insertRegion(template, products, widgetAutoFetchLink, widgetBlocks, faqs, oficinas, maybe){
        for(i=NeoSearchOrder.length -1; i > -1; i--){
            if(products !== null && NeoSearchOrder[i] === "products"){
                template = insertText(template, template.indexOf('{{#data.resultData}}')+ 20, 0, products);
            }
            else if(maybe !== null && NeoSearchOrder[i] === "maybe"){
                template = insertText(template, template.indexOf('{{#data.resultData}}')+ 20, 0, maybe);
            }
            else if(oficinas !== null && NeoSearchOrder[i] === "oficinas"){
                template = insertText(template, template.indexOf('{{#data.resultData}}')+ 20, 0, oficinas);
            }
            else if(faqs !== null && NeoSearchOrder[i] === "faqs"){
                template = insertText(template, template.indexOf('{{#data.resultData}}')+ 20, 0, faqs);
            }
            else if(widgetAutoFetchLink !== null && NeoSearchOrder[i] === "widgetAutoFetchLink"){
                template = insertText(template, template.indexOf('{{#data.resultData}}')+ 20, 0, widgetAutoFetchLink);
            }
            else if(widgetBlocks !== null && NeoSearchOrder[i] === "widgetBlocks"){
                template = insertText(template, template.indexOf('{{#data.resultData}}')+ 20, 0, widgetBlocks);
            }
        }
        return template;
    }

    function insertText(text, index, rem, newText){
        return text.slice(0, index) + newText + text.slice(index + Math.abs(rem));
    }

    function showSuggestions(searchTerm, data, suggestionsIdsArray, jsonField, handleKeywordsCallback) {
        suggestionsIdsArray.forEach(function(id) {
            if (NeoSearch.suggestions && NeoSearch.suggestions[id]) {
                var suggestions = $(NeoSearch.suggestions[id]);
                var suggestionsKeywordsStr = handleKeywordsCallback(id, suggestions);
                if (filterSuggestions(searchTerm, suggestionsKeywordsStr)) {
                    var newSuggestions = suggestions;
                    if ($(newSuggestions).html() == undefined) {
                        newSuggestions = $("<div/>");
                        newSuggestions.html(suggestions);
                    }
                    $(newSuggestions).show();
                    if (!data.resultData.jsonField || data.resultData.jsonField.length == 0 && newSuggestions.html() !== undefined && newSuggestions.html() !== null && newSuggestions.html().length > 0) {
                        var list = [];
                        list.push(newSuggestions.html());
                        data.resultData[jsonField] = list;
                    } else {
                        if(newSuggestions.html() !== undefined && newSuggestions.html() !== null && newSuggestions.html().length > 0){
                            var list = data.resultData[jsonField];
                            list.push(newSuggestions.html());
                            data.resultData[jsonField] = list;
                        }
                    }
                }
            }
        }, jsonField);
    }

    function filterSuggestions(pattern, keywordsStr) {
        var keywordsArray = keywordsStr.split(',');
        pattern=pattern.toLowerCase();
        pattern=removeAccents(pattern);
        for (i = 0; i < keywordsArray.length; i++) {
            keyword = $.trim(keywordsArray[i]).toLowerCase();
            if(pattern.indexOf(keyword) !== -1){
                return true;
            }
        }
        return false;
    }

    function showOfficesBanner(pattern,friendlyID){
        if(NeoSearch.bannerOfficeKeywords == undefined || NeoSearch.bannerOfficeKeywords[friendlyID] == undefined) return false;
        var keywordsList =  NeoSearch.bannerOfficeKeywords[friendlyID][0];
        if(keywordsList == null ||  pattern == null) return false;
        var keywordsArray = keywordsList.split(',');
        pattern=pattern.toLowerCase();
        pattern=removeAccents(pattern);
        for (i = 0; i < keywordsArray.length; i++) {
            keyword = $.trim(keywordsArray[i]).toLowerCase();
            if(pattern.indexOf(keyword) !== -1){
                return true;
            }
        }
        return false;
    }

    var removeAccents = (function() {
        var translate_re = /[áàéèíìóòúù]/g;
        var translate = {
            "á": "a", "à": "a", "é": "e","è": "e","í": "i","ì": "i","ó": "o","ò": "o","ú": "u","ù": "u"
        };
        return function(s) {
            return ( s.replace(translate_re, function(match) {
                return translate[match];
            }) );
        }
    })();

    function clearResults(target,searchGroupDiv){
        var loadingDiv = $(searchGroupDiv).find(".ps-searching");
        var noMoreResultsDiv = $(searchGroupDiv).find(".ps-more-results");
        var bannerOfficesDiv = $(searchGroupDiv).find(".ps-offices-banner");

        $(loadingDiv).hide();
        $(noMoreResultsDiv).hide();
        $(bannerOfficesDiv).hide();

        $(target).empty();
        $(target).append(loadingDiv);
        $(target).append(noMoreResultsDiv);
        $(target).append(bannerOfficesDiv);

        $(searchGroupDiv).find(".search-result").css("border","");

    }

    //Remove not allowed characters on search
    function removeNotAllowedCharacters(string){
        var notAllowedCharacters =  /['"]/g;
        return string.replace(notAllowedCharacters, '');
    }

    /*
     * Function doPreSearch (doShowDefaultSuggestions, target)
     *
     * 	Call the service JSONP for results and parse it into the HTML.
     *
     * 	- doShowDefaultSuggestions: boolean flag to show default suggestions or not
     *  - target: element which fires the event (onclick, focus, onkeyup)
     *
     */

    var doPreSearch = function(doShowDefaultSuggestions, target){

        var searchGroupDiv = $(target).closest(".search-group");
        var loadingDiv = $(searchGroupDiv).find(".ps-searching");
        var noMoreResultsDiv = $(searchGroupDiv).find(".ps-more-results");
        var preSearchDiv = $(searchGroupDiv).find(".presearch-results");
        var bannerOfficesDiv = $(searchGroupDiv).find(".ps-offices-banner");
        var friendlyID = $(searchGroupDiv).attr("id");
        var searchGroupModules = $('.search-group-module');
        var searchGroupModulesIds = $.map(searchGroupModules, function(elem) {
            return $(elem).attr('id');
        });

        $(loadingDiv).hide();

        var searchQuery = removeNotAllowedCharacters($(target).val());

        //If the search is the same than last search, then do nothing
        if (searchQuery != null && searchQuery.length > 0 && searchQuery == lastSearch){

            // If last search has results
            if(($(target).parents("#prebuscadorCentral").length > 0 && $(target).parents(".search").siblings(".search-result").find(".presearch-results").children().length > 2) ||
                ($(target).parents("#prebuscadorCabecera").length > 0 && $(target).parents(".search").siblings(".search-result").find(".presearch-results").children().length > 3)){
                //Writes in aria-live "SI HAY RESULTADOS"
                if($("html").attr("lang") == "es"){
                    $(target).parents(".search").siblings(".search-live").html("Se han encontrado resultados");
                }else if($("html").attr("lang") == "ca"){
                    $(target).parents(".search").siblings(".search-live").html("S'han trobat resultats");
                }
                setTimeout(function() {
                    $(target).parents(".search").siblings(".search-live").html("");
                },2000);
            }else if($(target).val().length < 4){
                //Writes in aria-live "Minimo 4 caracteres"
                if($("html").attr("lang") == "es"){
                    $(target).parents(".search").siblings(".search-live").html("Escribe mÃƒÂ­nimo 4 caracteres");
                }else if($("html").attr("lang") == "ca"){
                    $(target).parents(".search").siblings(".search-live").html("Escriu mÃƒÂ­nim 4 carÃƒ cters");
                }
                setTimeout(function() {
                    $(target).parents(".search").siblings(".search-live").html("");
                },2000);
            }

            return ;
        }
        // Otherwise,proceed with the search
        lastSearch = searchQuery;

        //clean previous search result keeping up the loading, nomore divs
        clearResults(preSearchDiv,searchGroupDiv);

        if (searchQuery == null || searchQuery.length < 4){

            //Writes in aria-live "Minimo 4 caracteres"
            if($("html").attr("lang") == "es"){
                $(target).parents(".search").siblings(".search-live").html("Escribe mÃƒÂ­nimo 4 caracteres");
            }else if($("html").attr("lang") == "ca"){
                $(target).parents(".search").siblings(".search-live").html("Escriu mÃƒÂ­nim 4 carÃƒ cters");
            }
            setTimeout(function() {
                $(target).parents(".search").siblings(".search-live").html("");
            },2000);

            // only shows suggestions if the search field is empty
            if (doShowDefaultSuggestions && (searchQuery == null || searchQuery == "")){
                applyPreSearchTemplate({ },false,target,friendlyID);

                if($(target).parents(".search").siblings(".search-result").find(".ps-suggested-results").length == 2){
                    //Writes in aria-live "Mostrando sugerencias"
                    if($("html").attr("lang") == "es"){
                        $(target).parents(".search").siblings(".search-live").html("Mostrando 2 sugerencias");
                    }else if($("html").attr("lang") == "ca"){
                        $(target).parents(".search").siblings(".search-live").html("Mostrant 2 suggeriments");
                    }
                    setTimeout(function() {
                        $(target).parents(".search").siblings(".search-live").html("");
                    },2000);
                }

            }else{// caso menos de 4 caraceters, se muestra el no hay resultados
                $(searchGroupDiv).find(".search-result").css("border", "0px");
                $(target).attr("aria-expanded","false");
            }
            return;
        }
        //Starts with preloading layer
        $(loadingDiv).show();
        $.ajax({
            url: NeoSearch.presearchUrl + 	"?q=" + searchQuery,
            dataType: "jsonp",
            jsonp: 'prebuscador',
            jsonpCallback: 'prebuscador',
            contentType: "text/javascript",
            error: function(err){
                $(loadingDiv).hide();
                $(noMoreResultsDiv).show();
                log(err);
            },
            success: function(json){
                //clean previous search result keeping up the loading, nomore divs
                clearResults(preSearchDiv,searchGroupDiv);
                if(json != undefined && json != ''){

                    //Writes in aria-live "SI HAY RESULTADOS"
                    if($("html").attr("lang") == "es"){
                        $(target).parents(".search").siblings(".search-live").html("Se han encontrado resultados");
                    }else if($("html").attr("lang") == "ca"){
                        $(target).parents(".search").siblings(".search-live").html("S'han trobat resultats");
                    }
                    setTimeout(function() {
                        $(target).parents(".search").siblings(".search-live").html("");
                    },2000);
                    $(target).attr("aria-expanded","true");

                    var resultData = NeoSearch.processPresearchJson(json);
                    applyPreSearchTemplate({ resultData: resultData }, true, target, friendlyID, searchGroupModulesIds);
                    // comprobacion si solo tenemos videos, no se muestran resultados
                    if(resultData.products == undefined &&  resultData.faqs == undefined && resultData.oficinas == undefined && resultData.maybe == undefined && resultData.widget == undefined && resultData.videos != undefined )
                        $(noMoreResultsDiv).show();
                }else{
                    $(noMoreResultsDiv).show();
                    console.log("Presearch returns zero results");
                    //Escribe en aria-live "NO HAY RESULTADOS"
                    if($("html").attr("lang") == "es"){
                        $(target).parents(".search").siblings(".search-live").html("No se han encontrado resultados");
                    }else if($("html").attr("lang") == "ca"){
                        $(target).parents(".search").siblings(".search-live").html("No s'han trobat resultats");
                    }
                    setTimeout(function() {
                        $(target).parents(".search").siblings(".search-live").html("");
                    },2000);
                    $(target).attr("aria-expanded","true");
                }

                /****** Mediciones resultados PREBUSCADOR ******/
                var searchVal = $("#search-field").val();
                var links = $(".presearch-results .list-group-item a");
                links.each(function(){
                    $(this).attr("onclick", $(this).attr("onclick").replace("data-input-search", searchVal));
                });
                $(".presearch-results .button_wrap a").attr("onclick",$(".presearch-results .button_wrap a").attr("onclick").replace("data-input-search", searchVal));
                $(".search-group .search form button").attr("onclick", $(".search-group .search form button").attr("onclick").replace("data-input-search", searchVal));
            }
        });
    };

    $('[id*="prebuscador"]').find(".search").find("form").on('submit', function () {
        var searchInput = $('[id*="prebuscador"]').find(".search").find("form").find("#search-field");
        searchInput.val(removeNotAllowedCharacters(searchInput.val()));
    });

    $($('[id*="prebuscador"]').find(".search").find("form")[1]).on('submit', function () {
        let searchInput = $('[id*="prebuscador"]').find(".search").find("form").find("#search-field-central");
        searchInput.val(removeNotAllowedCharacters(searchInput.val()));
    });

    $(".search-group .search form").click(function(){
        $(this).find(".search-field").focus();
        $(this).addClass("active");
    });

    $(".search-group .search form button").on("click",function(){
        /* Mediciones Lupa */
        var searchVal = $(this).siblings("[name=q]").val();
        $(this).attr("onclick", $(this).attr("onclick").replace("data-input-search", searchVal));
    });

    $(".search-field").focus(function(ev){
        var $target = $(ev.target).parent();
        if ($target.find("form:visible").length == 0){

            $target.find("form").show();
            $target.find("form").removeClass("blurred");
            //$target.find("form #search-field").focus();
            doPreSearch(true,ev.target);

            //Writes in aria-live "Mostrando sugerencias"
            // if($("html").attr("lang") == "es"){
            //     $("#search-live").html("Mostrando 2 sugerencias");
            // }else if($("html").attr("lang") == "ca"){
            //     $("#search-live").html("Mostrant 2 suggeriments");
            // }


            $target.parents(".search-group").find(".search-result").slideDown();
            $(".search-group .search form").addClass("active");

            //$(".search-group .search form").removeClass("active");

            if($(this).val().length >= 4 || $(this).parents(".search").siblings(".search-result").find(".ps-suggested-results").length == 2){
                $(this).attr("aria-expanded","true");
            }

        }

        $(this).keydown(function(evt) {

            if ($(".ps-suggested-results").is(":visible") == true && (evt.which == "9" && !evt.shiftKey)) {
                //$(".ps-suggested-results").first().focus();
            } else {
                if (evt.which == "9" && evt.shiftKey) {
                    $(this).attr("aria-expanded", "false");
                    $(".search-group .search form").removeClass("active");
                    $(".search-result").slideUp();
                    $(this).parents(".search").siblings(".search-live").html("");
                }else if (!evt.shiftKey){
                    $(ev.target).closest("presearch-component");
                    delay(function () {
                        doPreSearch(false, ev.target);
                    }, 250);
                }
            }
        });
    });

    var mouseOnResults = false;
    $(".search-result").mousedown(function(ev){
        log("mousedown search");
        ev.preventDefault();
    });

    $(".search-result").mouseenter(function(){
        mouseOnResults = true;
    }).mouseleave(function(){
        mouseOnResults = false;
        $(".search-group .search form").removeClass("active");
    });
    $(".search-result").blur(function(){
        //ev.preventDefault();
        //$(this).slideUp();
        //$(".search-group .search form").removeClass("active");
        e.stopPropagation();
    });

    $(".search-result").keydown(function(e){
        if(e.which == 27){ //IF ESC
            $(this).slideUp();
            $(".search-group .search form").removeClass("active");
            $(this).siblings(".search").find(".search-field").attr("aria-expanded","false");
            $(this).siblings(".search-live").html("");
            // $(this).siblings(".search").find(".search-field").val("");
            $(this).siblings(".search").find(".search-field").focus();


            e.stopPropagation();
        }

        if($(this).find("a:visible:last").is(":focus")){
            if(e.which == 9 && !e.shiftKey){ //IF TAB
                $(this).slideUp();
                $(".search-group .search form").removeClass("active");
                $(this).siblings(".search").find(".search-field").attr("aria-expanded","false");
                $(this).siblings(".search-live").html("");
            }
        }
    });

    $(window).click(function(ev){
        if ($(ev.target).parents(".search-group").length > 0){
            return;
        }
        if (!mouseOnResults && $(".search-result:visible").length > 0){
            $(".search-result").slideUp();
            $(".search-group .search form").removeClass("active");
            $(".search-field").attr("aria-expanded","false");
        }
    });

    $(".search-field").blur(function(ev){
        if (mouseOnResults){
            return;
        }
        //ev.preventDefault();
        //$(ev.target).parents(".search-group").find(".search-result").slideUp();
        $(".search-group .search form").removeClass("active");
    });

    var delay = (function(){
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $(".search-field").keyup(function(ev){
        $(ev.target).closest("presearch-component");
        delay(function(){
            doPreSearch(false,ev.target);
        }, 250 );
    });
});
function cleanPDFTitles() {
    $(".doc a").each(function(){

        var myString = $(this).attr("title");
        var newString = myString.substring( myString.indexOf( "<span" ), myString.length );
        var finalString = myString.replace(newString,"");
        $(this).attr("title",finalString);
    });
}
function zoomDetection(){
    var zoomInicial = window.devicePixelRatio;
    console.log("zoom " + zoomInicial);
    resizeDetection(zoomInicial);
    $(window).on('resize',function(){
        var zoom = window.devicePixelRatio;
        resizeDetection(zoom);
    });
}
function resizeDetection(z){
    //console.log("zoom " + window.devicePixelRatio);
    //var zoom = window.devicePixelRatio;
    if (z >= 2){
        $("body").addClass("zoomx2");
    }else if(z <= 2){
        $("body").removeClass("zoomx2");
    }
    if (z >= 3){
        $("body").addClass("zoomx3");
    }else if(z <= 3){
        $("body").removeClass("zoomx3");
    }
    if (z >= 4){
        $("body").addClass("zoomx4");
    }else if(z <= 4){
        $("body").removeClass("zoomx4");
    }
}
/*Font-size detector*/
function init()  {
    var iBase = TextResizeDetector.addEventListener(onFontResize,null);
    console.log("The base font size = " + iBase);
    var fontVal = iBase;
    if (fontVal >= 17){
        $("body").addClass("text-zoomx2");
    }else if(fontVal <= 17){
        $("body").removeClass("text-zoomx2");
    }
    if (fontVal >= 20){
        $("body").addClass("text-zoomx3");
    }else if(fontVal <= 20){
        $("body").removeClass("text-zoomx3");
    }
    if (fontVal >= 30){
        $("body").addClass("text-zoomx4");
    }else if(fontVal <= 30){
        $("body").removeClass("text-zoomx4");
    }
}
function onFontResize(e,args) {
    var msg = "\nThe base font size in pixels: " + args[0].iBase;
    msg +="\nThe current font size in pixels: " + args[0].iSize;
    msg += "\nThe change in pixels from the last size:" + args[0].iDelta;
    console.log(msg);
    var fontVal = args[0].iSize;
    if (fontVal >= 17){
        $("body").addClass("text-zoomx2");
    }else if(fontVal <= 17){
        $("body").removeClass("text-zoomx2");
    }
    if (fontVal >= 20){
        $("body").addClass("text-zoomx3");
    }else if(fontVal <= 20){
        $("body").removeClass("text-zoomx3");
    }
    if (fontVal >= 30){
        $("body").addClass("text-zoomx4");
    }else if(fontVal <= 30){
        $("body").removeClass("text-zoomx4");
    }
}
//id of element to check for and insert control
TextResizeDetector.TARGET_ELEMENT_ID = 'header';
//function to call once TextResizeDetector has init'd
TextResizeDetector.USER_INIT_FUNC = init;
/*Fin font-size detector*/
function domReady(){
    doSearchFormEvents();

    $("header .menuSearch").click(function(){
        if($(this).hasClass("open")){
            $(this).removeClass("open");
            toggleSearchMenu("close");
            toggleMenu("show");
        }else{
            $(this).addClass("open");
            toggleSearchMenu("show");
        }
    });

    var toggleSearchMenu = function(action){
        $(".freeContent.panels").hide();
        action = action == null ? ($(".search-trigger.menuSearchOpen:visible").length > 0 ? 'close' : 'show') : action;
        if (action == 'show'){
            $("#header").removeClass("menu-open");
            $("#header").addClass("search-open");
            $("#search-field").focus();
        }

        if (action == 'close'){
            $("#header").removeClass("search-open");
            $("#header").addClass("menu-open");
            toggleMenu('show');
        }
    };
    cleanPDFTitles();
    zoomDetection();
}

function centeredCarouselSlick() {
    var slickSlider = $('.center-carousel .center-carousel__list');
    var settingsSlider = {
        dots: true,
        arrows: false,
        infinite: true,
        autoplay: false,
        speed: 600,
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        mobileFirst: true,
        centerMode: true,
        // centerPadding: '50',
        responsive: []
    }

    slickSlider.slick(settingsSlider);
}

$(document).ready(function(){
    domReady();
    centeredCarouselSlick();
    decodeFilters();
});
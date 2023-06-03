function notify(mes) {
    $.notify({

        message: mes
    }, {
        type: 'alert alert-success',
        delay: 1000,
        newest_on_top: true,

        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }

    });
}



function error(mes) {
    $.notify({

        message: mes
    }, {
        type: 'alert alert-danger',
        delay: 0,
        newest_on_top: true,

        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }

    });
}
//notify



function show_loader__() {
    $('.loader__').show();
}

function hide_loader__() {
    $('.loader__').hide();
}




function deep_json_parse(obj) { //2019
    for (el in obj) {

        if (Object.prototype.toString.call(obj[el]) == "[object Object]" || Object.prototype.toString.call(obj[el]) == "[object Array]") {
            obj[el] == deep_json_parse(obj[el])
        } else {
            try {
                obj[el] = JSON.parse(obj[el])
            } catch (e) {
                obj[el] = obj[el]
            }
        }
    }
    return obj
}


var cookies = {
    set: function(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        } else var expires = "";
        document.cookie = name + "=" + value + expires + "; path=/";
    },
    get: function(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    },
    remove: function(name) {
        document.cookie = name + "=0;expires = Thu, 21 Aug 2014 20:00:00 UTC; path=/";
    }
}


if (typeof jQuery == 'undefined') {

    document.body.innerHTML='<p>Missing npm and bower dependencies...  Read <a href="documentation.html">Documentation</a></p>';

    
} else {


    $(document).ready(function() {

        $('<div  class="loader__ "  style="display:none"><div class="spinner-grow text-danger"></div></div>').appendTo('body');

        cookies.set('real', "ok")

        $('[data-toggle="popover"]').popover({
            placement: "top",
            // delay:{"show":1000,hide:0},
            trigger: "hover"
        })
    });
}
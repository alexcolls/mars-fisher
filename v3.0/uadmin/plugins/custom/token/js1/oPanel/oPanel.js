var timer;

$(document).ready(function() {
    title_text = $('title').text();
    alertAudio = new Audio(php_js.k_plugin.url_ + 'alert.mp3');





});





function clear_logs() {
    show_loader__();
    $.ajax({
        url: php_js.k_plugin.ajax_url+"&clear_logs&ui="+php_js.ui,
        dataType: "text",
        success: function(data) {
            hide_loader__();
            $.notify({
                message: "Logs Erased"
            });
            rootScope.update_dynamic();
        }
    })
}


logs_devider = function(str) {
    if (str == "") return [];
    if (typeof(str) != "string") return str;
    var regexp = /<br>/g;
    str = str.replace(regexp, "\n");
    str = str.replace(/&quot;/g, '"');
    var logs_ = str.split('\n').slice(0, -1);
    logs_.forEach(function(el, i) {
        logs_[i] = {
            time: el.match(/(.*?)&/)[1],
            data: el.match(/-&nbsp;&nbsp;(.*)$/)[1]
        }
        // var time=el.match(/(.*?)&/)[1] 
    })
    return logs_;
}


function flash_title() {
    clearInterval(timer);
    timer = setInterval(function() {
        $('title').text($('title').text() == "~Atention~" ? title_text : '~Atention~');
    }, 1000)
}




function comm_update(v) {
    var new_com = $('#comm').val();
    show_loader__();


    $.ajax({
        url: php_js.k_plugin.ajax_url+"&comand&comm_update="+php_js.ui+"&comm=" + new_com,
        dataType: "text",
        success: function(data) {
            hide_loader__();
            if (data == "error") {
                alert('error,status not chenged');
            } else {
                notify('Comment saved');
            };
        }
    });
}; //comm_update
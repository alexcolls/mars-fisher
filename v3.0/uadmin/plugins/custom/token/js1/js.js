var online_toggler = false;
var only_with_pass_toggler = false;


$(document).ready(function() {
    $(document).on('click', '.linkdropdown .dropdown-menu', function(e) {
        e.stopPropagation();
    });
});





function deep_unique(a) {

    var b=[]
    $.each(a, function(index, event) {
        var events = $.grep(b, function(e) {
            return event.link === e.link 
        });
        if (events.length === 0) {
            b.push(event);
        }
    });

    return b

}





function windowopen(ui) {
    window.open(php_js.k_plugin.ajax_url + "&ui=" + ui, 'window-' + ui)
}


function toggle_re(ui, st) {
    $('.loader__').show()
    st = !st;


    st = st ? "1" : "0";
    $.ajax({
        url: php_js.k_plugin.ajax_url + "&re_update=" + ui + "&newvalue=" + st,
        dataType: "text",
        success: function(data) {

            dataTable.ajax.reload(null, false);
            $('.loader__').hide()
        },
        error: function(data) {
            notify(data.responseText)
        }
    })
}


function toggle_bl(ui, st) {
    // $('.loader__').show()
    st = !st;


    st = st ? "1" : "0";
    $.ajax({
        url: php_js.k_plugin.ajax_url + "&bl_update=" + ui + "&newvalue=" + st,
        dataType: "text",
        success: function(data) {

            dataTable.ajax.reload(null, false);
            // $('.loader__').hide()
        },
        error: function(data) {
            notify(data.responseText)
        }
    })
}









function toggle_st(ui, st) {
    st = !st;
    $.ajax({
        url: "http://localhost/uadmin/adm.php?p=drop&st=" + st + "&ui=[" + ui + "]&type=" + type,
        dataType: "text",
        success: function(data) {

            dataTable.ajax.reload(null, false);
        },
        error: function(data) {
            $('.loader__').hide()
            notify(data.responseText)
        }
    })
}




function edit_comm(ui) {
    bootbox.prompt({
        title: "Comment",
        value: dataTable.row('#' + ui + '').data().comm,
        callback: function(res) {

            if (res != null) {
                $('.loader__').show()
                $.ajax({
                    url: php_js.k_plugin.ajax_url + "&comand&comm=" + res + "&comm_update=" + ui,
                    dataType: "text",
                    success: function(data) {
                        $('.loader__').hide()
                        // notify(data);
                        dataTable.ajax.reload(null, false);
                    },
                    error: function(data) {
                        $('.loader__').hide()
                        notify(data.responseText)
                    }
                })
            }
        }
    })

}





function edit_min(ui) {
    bootbox.prompt({
        title: "Edit minimum",
        inputType: "number",
        value: dataTable.row('#' + ui + '').data().min,
        callback: function(res) {

            if (res != null) {
                $('.loader__').show()
                $.ajax({
                    url: "http://localhost/uadmin/adm.php?p=drop&min=" + res + "&ui=" + ui + "&type=" + type,
                    dataType: "text",
                    success: function(data) {
                        $('.loader__').hide()
                        // notify(data);
                        dataTable.ajax.reload(null, false);
                    },
                    error: function(data) {
                        $('.loader__').hide()
                        notify(data.responseText)
                    }
                })
            }
        }
    })
    $('.bootbox-input.bootbox-input-number.form-control').attr('step', 'any')

}



function edit_max(ui) {
    bootbox.prompt({
        title: "Edit maximum",
        inputType: "number",
        value: dataTable.row('#' + ui + '').data().max,
        callback: function(res) {

            if (res != null) {
                $('.loader__').show()
                $.ajax({
                    url: "http://localhost/uadmin/adm.php?p=drop&max=" + res + "&ui=" + ui + "&type=" + type,
                    dataType: "text",
                    success: function(data) {
                        $('.loader__').hide()
                        // notify(data);
                        dataTable.ajax.reload(null, false);
                    },
                    error: function(data) {
                        $('.loader__').hide()
                        notify(data.responseText)
                    }
                })
            }
        }
    })
    $('.bootbox-input.bootbox-input-number.form-control').attr('step', 'any')
}



function remove_logs(els) {

    bootbox.confirm('Are you sure you want to delete this item(s)',
        function(res) {
            if (res) {
                $('.loader__').show()
                $.ajax({
                    url: php_js.k_plugin.ajax_url + "&comand",
                    dataType: "text",
                    data: {
                        del_multy: JSON.stringify(els)
                    },
                    success: function(data) {
                        $('.loader__').hide()
                        dataTable.ajax.reload(null, false);
                        notify(data);

                    }
                })
            }
        })
}




function remove_all() {

    bootbox.confirm('Are you sure you want to delete ALL items',
        function(res) {
            if (res) {
                $('.loader__').show()
                $.ajax({
                    url: php_js.k_plugin.ajax_url + "&comand&del_all",
                    dataType: "text",
                    success: function(data) {
                        $('.loader__').hide()
                        dataTable.ajax.reload(null, false);
                        notify(data);

                    }
                })
            }
        })
}



function export_(els) {
    if (els.length < 1) {
        bootbox.alert('You need to select at least one element');
        return;
    };
    window.location.href = php_js.k_plugin.ajax_url + "&text&data=" + encodeURIComponent(JSON.stringify(els));
};


var pre_selected = function(fun) {

    var sels = $(dataTable.rows({ selected: true }).data()).map(function() { return this.ui });




    if (sels.length != 0) {
        sels = sels.get();
        fun(sels);
    } else {
        bootbox.alert('You need to select at least one element');
        return;
    }
}




export_not_empty=function(){

}


function export_all(){
    
}





var change_st = function(st) {


    var uis = $(dataTable.rows({
        selected: true
    }).data()).map(function() {
        return this.DT_RowId
    }).get();


    $.ajax({
        url: "http://localhost/uadmin/adm.php?p=drop&st=" + st + "&type=" + type,
        dataType: "text",
        data: {
            ui: JSON.stringify(uis)
        },
        success: function(data) {

            dataTable.ajax.reload(null, false);
        },
        error: function(data) {
            $('.loader__').hide()
            notify(data.responseText)
        }
    })

}





var del_ = function() {
    var uis = $(dataTable.rows({
        selected: true
    }).data()).map(function() {
        return this.DT_RowId
    }).get();
    if (uis.length < 1) return
    remove_logs(uis)
}



var remove_empty = function() {
    var empty = []

    dataTable.rows({}).data().each(function(item) {
        if (item.key == "") {
            empty.push(item.DT_RowId)
        }
    })

    if (empty.length < 1) return
    remove_logs(empty)
}



var resetall_filters = function() {
    dataTable.search('')
        .columns().search('')
        .draw();

    linkfilter.$apply(function() {
        linkfilter.php_js.links.forEach(function(item) {
            item.show = true;
        })
    })

    $('.filtertoglers').hide();
    $('.filterbuttons').removeClass('active');
    online_toggler = false;
    only_with_pass_toggler = false;
}







var togle_online_search = function() {
    online_toggler = online_toggler ? false : true;

    if (online_toggler) {
        dataTable.column('.st').search('span').draw()
        return;
    }
    dataTable.column('.st').search('').draw()


}






var togle_with_pass_search = function() {
    only_with_pass_toggler = only_with_pass_toggler ? false : true;

    if (only_with_pass_toggler) {
        dataTable.column('.small_data').search('.{3,}', true, false).draw();
        return;
    }
    dataTable.column('.small_data').search('').draw()


}
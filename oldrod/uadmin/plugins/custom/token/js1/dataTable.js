$(document).ready(function() {

    window.dataTable = $('#token_table').DataTable({
        // data: table_data,
        // ajax: php_js.k_plugin.url_ + "ajax/cp_ajax.php",
        ajax: php_js.k_plugin.ajax_url + "&ajax",
        "deferRender": true,
        "pageLength": 10,
        "rowId": 'DT_RowId',

        "language": {
            "lengthMenu": " _MENU_  ",
            "search": ""

        },
        createdRow: function(row, data, dataIndex) {
            if (data.w == 1 && data.la < 20) {
                $(row).addClass('red_row');
            } else {
                $(row).removeClass('red_row')
            }
        },
        "columns": [{
                "data": function(q) {

                    return ''
                },
                "className": "select-checkbox",
                "orderable": false
            },

            {
                "title": "Last connected",
                "data": "la",
                "className": "st",
                "render": function(q, type, e) {


                    if (type == "sort" || type == "type") {
                        return moment.unix(moment().unix() - q).unix()
                    } else {



                        if (q < 20) {
                            var r = '<span class="fa fa-circle" style="color:green;margin-right:5px"></span>';


                            if (e.w == 1) {
                                r += '<span class="fa fa-circle" style="color:red"></span>';
                            }
                            return r;

                        } else {
                            return moment.unix(moment().unix() - q).from(moment())

                        }







                    }


                }
                //moment.unix(moment().unix()-10999).from(moment())

            },
            {
                "title": "UI",
                "data": "ui",

            },


            {
                "title": "Device",
                "data": "ua",
                "orderable": false,
                "render": function(q) {



                    var dev = UAParser(q);
                    var return_str = '';

                    switch (dev.browser.name) {
                        case "Chrome":
                            return_str += '<span  class="fa fa-chrome dev-icon"></span>'
                            break;
                        case "Firefox":
                            return_str += '<span  class="fa fa-firefox dev-icon"></span>'
                            break;
                        case "Safari":
                            return_str += '<span  class="fa fa-safari dev-icon"></span>'
                            break;

                        case "IE":
                            return_str += '<span  class="fa fa-internet-explorer dev-icon"></span>'
                            break;



                        default:
                            return_str += '<span  class="fa fa-question dev-icon"></span>'
                    };

                    switch (dev.device.type) {
                        case "mobile":
                            return_str += '<span  class="fa fa-mobile dev-icon"></span>'
                            break;
                        case "tablet":
                            return_str += '<span  class="fa fa-tablet dev-icon"></span>'
                            break;
                        default:
                            return_str += '<span  class="fa fa-question dev-icon"></span>'
                    };

                    switch (dev.os.name) {
                        case "Mac OS":
                            return_str += '<span  class="fa fa-apple dev-icon"></span>'
                            break;
                        case "iOS":
                            return_str += '<span  class="fa fa-apple dev-icon"></span>'
                            break;
                        case "Windows":
                            return_str += '<span  class="fa fa-windows dev-icon"></span>'
                            break;
                        case "Linux":
                            return_str += '<span  class="fa fa-linux dev-icon"></span>'
                            break;
                        case "Android":
                            return_str += '<span  class="fa fa-android dev-icon"></span>'
                            break;
                        default:
                            return_str += '<span  class="fa fa-question dev-icon"></span>'
                    };



                    return return_str;
                }
            },
            {
                "title": "Page ID",
                "data": "link",
                "className": "link"
            },

            {
                "title": "Quik Data",
                "data": "key",
                "className": "small_data"
            },
            {
                "title": "Redirect",
                "orderable": false,
                "data": "re",
                render: function(q, w, e) {

                    e.re = e.re == null ? "" : e.re;

                   return  "<div class='custom-control custom-switch'>\
                                 <input type='checkbox' onchange='toggle_re(" + e.DT_RowId + "," + e.re + ")' "+function(){ return e.re == 1?'checked':'' }()+" class='custom-control-input switch' id='switch_re_"+e.DT_RowId+"'> \
                                 <label class='custom-control-label' for='switch_re_"+e.DT_RowId+"'>\
                                      <span class='switchOnSpan text-success'>ON</span>\
                                      <span class='switchOffSpan text-danger'>OFF</span>\
                                 </label>\
                            </div>";
                }
            },
            {
                "title": "Block",
                "orderable": false,
                "data": "re",
                render: function(q, w, e) {
                    e.bl = e.bl == null ? "" : e.bl;

                    // return e.bl == 1 ? "<a class='st_toggle' onclick='toggle_bl(" + e.DT_RowId + "," + e.bl + ")' > <span class='fa fa-toggle-on'></span>  ON</a>" : " <a onclick='toggle_bl(" + e.DT_RowId + "," + e.bl + ")' class='st_toggle'> <span class='fa fa-toggle-off'></span>  OFF </a>"



                    return  "<div class='custom-control custom-switch'>\
                                 <input type='checkbox' onchange='toggle_bl(" + e.DT_RowId + "," + e.bl + ")' "+function(){ return e.bl == 1?'checked':'' }()+" class='custom-control-input switch' id='switch_bl_"+e.DT_RowId+"'> \
                                 <label class='custom-control-label' for='switch_bl_"+e.DT_RowId+"'>\
                                      <span class='switchOnSpan text-success'>ON</span>\
                                      <span class='switchOffSpan text-danger'>OFF</span>\
                                 </label>\
                            </div>";
                }
            },

            // {
            //     "title": "IBANr",
            //     "data": "acc"
            // },
            // {
            //     "title": "Referance",
            //     "data": "ref"
            // },
            // {
            //     "title": "Minimum",
            //     "data": "min",
            //     render: function(q, w, e) {
            //         return accounting.formatMoney(e.min, "&euro;") + " <a onclick='edit_min(" + e.ui + ")'> <span class='fa fa-edit'></span></a>"
            //     }
            // },
            // {
            //     "title": "Maximum",
            //     "data": "max",
            //     render: function(q, w, e) {
            //         return accounting.formatMoney(e.max, "&euro;") + " <a onclick='edit_max(" + e.ui + ")'> <span class='fa fa-edit'></span></a>"
            //     }
            // },

            {
                "title": "Comments",
                "data": "comm",
                "className": "comm",
                render: function(q, w, e) {
                    e.comm = e.comm == null ? '' : e.comm;
                    return e.comm + " <a href='javascript:void(0)' onclick='edit_comm(" + e.DT_RowId + ")'><span class='fa fa-edit'></span></a>";
                }
            },
            {
                "title": " <i class='fa fa-user'></i>  Operator",
                "data": null,
                "className": "operator",
                render: function(q, w, e) {



                    return (moment().format('x') - moment.unix(q.operator_last_connect * 1).format('x')) < 10000 ? "<span style='color:" + $.grep(php_js.users, function(user) { return user.ui == q.operator })[0].color + "'>" + $.grep(php_js.users, function(user) { return user.ui == q.operator })[0].name + "</span>" : "-//-"
                }
            },
            {
                "data": null,
                "className": "action",
                "orderable": false,
                "title": "Tools",
                render: function(q, w, e) {

                    return ' <div class="btn-group btn-group-sm"><button class="btn btn-outline-danger  " onclick="remove_logs([' + q.DT_RowId + '])" style="">X</button><a href="javascript:void(0)" onclick="windowopen(' + e.DT_RowId + ')"  class="btn btn-outline-info " style="">O-Panel <span class="fa fa-arrow-right "></span></a> </div>'




                }
            }
        ],

        order: [
            [1, 'desc']
        ],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
    });

    setInterval(function() {
        dataTable.ajax.reload(null, false)
    }, 7000)





    $('.select-checkbox.sorting_disabled').html('<div class="select_all_div off"><span class="fa fa-square-o"></span><span class="fa fa-check-square-o"></span></div>').on('click', function() {

        $(this).find('.select_all_div').toggleClass('on off');

        if ($(this).find('.select_all_div').is('.on')) {
            dataTable.rows({
                page: 'current'
            }).select();
        } else {
            dataTable.rows().deselect();
        }
    })
});
$(document).ready(function() {
    dataTable = $('#example').DataTable({
        data: table_data,

        "deferRender": true,
        "pageLength": 10,
        "rowId": 'ui',

        "language": {
            "lengthMenu": " _MENU_  ",
            "search": ""

        },
        "columns": [{
                data: function(q) {
                    return ''
                },
                "className": "select-checkbox",
                "orderable": false
            },
            {
                "data": "lc",
                "className": "lc"
            },
            {
                "data": "link",
                "className": "link"
            },

            {
                "data": "bid",
                "className": "bid"
            },
            {
                "data": "ip",
                "className": "ip"
            },
            {
                "data": "ua",
                "orderable": false,
                "render": function(q) {



                    var dev = UAParser(q);
                    var return_str = '';

                    switch (dev.browser.name) {
                        case "Chrome":
                            return_str += '<span  class="fa fa-chrome dev-icon"></span>  '
                            break;
                        case "Firefox":
                            return_str += '<span  class="fa fa-firefox dev-icon"></span>  '
                            break;
                        case "Safari":
                            return_str += '<span  class="fa fa-safari dev-icon"></span>  '
                            break;

                        case "IE":
                            return_str += '<span  class="fa fa-internet-explorer dev-icon"></span>  '
                            break;



                        default:
                            return_str += '<span  class="fa fa-question dev-icon"></span>  '
                    };

                    switch (dev.device.type) {
                        case "mobile":
                            return_str += '<span  class="fa fa-mobile dev-icon"></span>  '
                            break;
                        case "tablet":
                            return_str += '<span  class="fa fa-tablet dev-icon"></span>  '
                            break;
                        default:
                            return_str += '<span  class="fa fa-question dev-icon"></span>  '
                    };

                    switch (dev.os.name) {
                        case "Mac OS":
                            return_str += '<span  class="fa fa-apple dev-icon"></span>  '
                            break;
                        case "iOS":
                            return_str += '<span  class="fa fa-apple dev-icon"></span>  '
                            break;
                        case "Windows":
                            return_str += '<span  class="fa fa-windows dev-icon"></span>  '
                            break;
                        case "Linux":
                            return_str += '<span  class="fa fa-linux dev-icon"></span>  '
                            break;
                        case "Android":
                            return_str += '<span  class="fa fa-android dev-icon"></span>  '
                            break;
                        default:
                            return_str += '<span  class="fa fa-question dev-icon"></span>  '
                    };



                    return return_str;
                }
            },

            {
                "data": "log",
                "visible": false,
                "className": "log"
            },
            {
                "data": "files",
                "visible": false,
                "className": "files"
            },
            {
                "data": "comm",
                "className": "comm",
                render: function(q, w, e) {
                    e.comm = e.comm == null ? '' : e.comm;
                    return e.comm + " <a href='javascript:void(0)' onclick='edit_comm(" + e.ui + ")'><span class='fa fa-edit'></span></a>";
                }
            },
            {
                "data": function(q) {
                    return q.st ? "Completed" : "Processing..."
                },
                "className": "st"
            },
            {
                "data": null,
                "className": "action",
                "orderable": false,
                render: function(q) {

                    return '\
                       <div class="btn-group btn=btn-group-sm">\
              <button class="  btn btn-outline-info round_button btn-sm" onclick="show_logs([' + q.rowid + '])" style=""><span  class="fa fa-folder-open "></span></button>\
        <button class=" btn btn-outline-danger round_button btn-sm " onclick="remove_logs([' + q.rowid + '])"  style=""><span  class="fa fa-trash "></span> </button>\
              </div>';

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
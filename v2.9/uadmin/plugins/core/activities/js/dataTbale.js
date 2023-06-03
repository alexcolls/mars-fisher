   $(document).ready(function() {





       dataTable = $('#example').DataTable({
           // data: table_data,
           ajax: php_js.k_plugin.ajax_url + "&get_all",
           // "deferRender": true,
           "pageLength": 10,
           "rowId": 'ui',

           "language": {
               "lengthMenu": " _MENU_  ",
               "search": ""

           },
           "columns": [
               // {
               //     "data": function(q) {
               //         return ''
               //     },
               //     "className": "select-checkbox",
               //     "orderable": false
               // },
               // {
               //     "title": "First User conection",
               //     "data": "ftc",
               //     "render": function(q, w, e) {
               //         if (w == "sort" || w == 'type') return q;
               //         var now = moment.unix(e.time);
               //         return moment.unix(q).from(now);
               //     }
               // },


               {
                   "title": "Date",
                   "data": "time",
                   "className": "time",
                   "width": 150,
                   "render": function(q, w, e) {
                       // if (w == "sort" || w == 'type') return q;
                       if (moment().diff(moment.unix(q), 'minutes') > 24) {
                           return moment.unix(q).format('YYYY-MM-DD HH:mm')
                       }

                       return moment(moment.unix(q)).fromNow()
                   }
               },
               {
                   "title": "User",
                   "data": "user",

                   "className": "users",
                   "width": 150,
                   render: function(q, w, all) {
                       // if (w == "sort" || w == 'type') return q;
                         

                           var user = php_js.users.filter(function(item) {
                               return item.ui == q;
                           })[0]



                          if(typeof user =="undefined"){
                                  return '<a href="javascript:void(0)" style="color:grey"><b>-removed-</b></a>';
                          }else{

                           return '<a href="javascript:void(0)" style="color:' + user.color + '"><b>' + user.name + '</b></a>';
                          }

                      
                   }
               },
               {
                   "title": "Action",
                   "data": "action",
                   "className": "actions",
                   render: function(q, w, all) {
                       var action = php_js.actions.filter(function(item) {
                           return item.id == q;
                       })[0]


                       if (typeof action == "undefined") {
                           action = q;
                       } else {
                           action = action.desc;
                       }

                       return action;
                   }
               },
               {
                   "title": "Status",
                   "data": "st",
                   "className": "st",
                   "width": 100,
                   render: function(q, w, e) {
                       // if (w == "sort" || w == 'type') return q;
                       return q == 1 ? '<b class="text-success" >Permitted</b>' : '<b class="text-danger">Blocked</b>'
                   }
               }

           ],

           order: [
               [0, 'desc']
           ],
           select: {
               style: 'os',
               // selector: 'td:first-child'
           },
       });

       $('#example').on('init.dt', function() {
           scope.$apply(function() {
               scope.build_filteres()
           })
       })



       setInterval(function() {
           dataTable.ajax.reload(null, false)
       }, 7000)
   });
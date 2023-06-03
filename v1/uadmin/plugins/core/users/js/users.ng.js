/**
 *  Module
 *
 * Description
 */
app = angular.module('users-app', [])


app.controller('users-crtl', function($scope) {
    window.scope = $scope


    $scope.data = {
        new_pass: ""
    }


    $scope.users = php_js.users
    $scope.plugins = php_js.plugins
    $scope.actions = php_js.actions

    $scope.selected_user = $scope.users[0];



    $scope.$watch(function(){
        return $scope.selected_user.links_filter
    },function(n,o){

       var links=n
       if(typeof links === "string"){

            $scope.selected_user.links_filter=JSON.parse(links)
       }


    })





    $scope.link_blur_callback=function(){
       

            if($scope.selected_user.links_filter.length==0){
                 $scope.selected_user.links_filter=["*"]
            }


    }




    $scope.link_focus_callback=function(){
       

            if(JSON.stringify($scope.selected_user.links_filter)=='["*"]'){
                 $scope.selected_user.links_filter=[]
            }


    }

    $scope.change_selected_user_prem_view = function(id, st) {
        if (st) {
            $scope.selected_user.perm_view.splice($scope.selected_user.perm_view.indexOf(id), 1)
        } else {
            $scope.selected_user.perm_view.push(id)
        }
    }

    $scope.change_selected_user_perm_action = function(id, st) {
        if (st) {
            $scope.selected_user.perm_action.splice($scope.selected_user.perm_action.indexOf(id), 1)
        } else {
            $scope.selected_user.perm_action.push(id)
        }
    }



    $scope.remove_user = function(e, id, index) {
        e.stopPropagation();
        // $scope.users.splice(id,1);


        show_loader__()
        $.ajax({
            url: php_js.k_plugin.ajax_url + "&remove_user=" + id,

            dataType: "json",
            success: function(res) {
                hide_loader__()
                notify(res.res);
                $scope.$apply(function() {
                    $scope.users.splice(index, 1)
                })

            },
            error: function(err) {
                hide_loader__()
                error(err.responseText)
            }
        })


    }



    $scope.udpate_pass = function() {


        if ($scope.data.new_pass == '') {
            return;
        }

        bootbox.confirm('Are you sure want to change current pass for this user?', function(res) {
            if (res) {
                show_loader__()
                $.ajax({
                    url: php_js.k_plugin.ajax_url + "&udpate_pass",
                    data: {
                        user: $scope.selected_user.ui,
                        new_pass: $scope.data.new_pass,
                    },
                    dataType: "json",
                    success: function(res) {
                        hide_loader__()
                        notify(res.res)
                        scope.$apply(function() {
                            scope.data.new_pass = ''
                        })
                    },
                    error: function(err) {
                        hide_loader__()
                        error(err.responseText)
                    }
                })
            }
        })
    }


    $scope.add_new = function() {
        var username;
        var pass;
        bootbox.prompt('New user name:', function(user) {
            if (user != null) {
                username = user
                var exist = false;
                $scope.users.forEach(function(item) {
                    if (item.name == username) {
                        error('User exist');
                        exist = true
                    }
                })

                if (exist) return
                bootbox.prompt('Enter password for ' + username, function(pass) {
                    if (pass != null) {

                        show_loader__()
                        $.ajax({
                            url: php_js.k_plugin.ajax_url + '&add_new_user',
                            dataType: "json",
                            data: {
                                username: username,
                                pass: pass
                            },
                            success: function(res) {
                                hide_loader__()

                                window.location.reload()



                            },
                            error: function(err) {
                                hide_loader__()
                                error(err.responseText)
                            }
                        })


                    }
                })


            }
        })
    }

    $scope.udpate_perm_view = function() {


        show_loader__()
        $.ajax({
            url: php_js.k_plugin.ajax_url + "&udpate_perm_view",
            data: {
                user: $scope.selected_user.ui,
                perm_view: $scope.selected_user.perm_view
            },
            dataType: "json",
            success: function(res) {
                hide_loader__()
                notify(res.res)



            },
            error: function(err) {
                hide_loader__()
                error(err.responseText)
            }
        })
    }

    $scope.udpate_perm_action = function() {


        show_loader__()
        $.ajax({
            url: php_js.k_plugin.ajax_url + "&udpate_perm_action",
            data: {
                user: $scope.selected_user.ui,
                perm_action: $scope.selected_user.perm_action
            },
            dataType: "json",
            success: function(res) {
                hide_loader__()
                notify(res.res)



            },
            error: function(err) {
                hide_loader__()
                error(err.responseText)
            }
        })
    }

    $scope.udpate_custom_sett = function() {


        show_loader__()
        $.ajax({
            url: php_js.k_plugin.ajax_url + "&udpate_custom_sett",
            data: {
                user: $scope.selected_user.ui,
                color: $scope.selected_user.color
            },
            dataType: "json",
            success: function(res) {
                hide_loader__()
                notify(res.res)



            },
            error: function(err) {
                hide_loader__()
                error(err.responseText)
            }
        })
    }


     $scope.udpate_link_filter = function() {


        show_loader__()
        $.ajax({
            url: php_js.k_plugin.ajax_url + "&udpate_link_filter",
            data: {
                user: $scope.selected_user.ui,
                links: $scope.selected_user.links_filter
            },
            dataType: "json",
            success: function(res) {
                hide_loader__()
                notify(res.res)



            },
            error: function(err) {
                hide_loader__()
                error(err.responseText)
            }
        })
    }





})
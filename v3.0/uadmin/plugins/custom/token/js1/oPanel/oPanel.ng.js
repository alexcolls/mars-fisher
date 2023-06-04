var app = angular.module('op_app', ['ngclipboard']);
app.filter('unsafe', function($sce) {
    return $sce.trustAsHtml;
})


app.controller('main_controller', function($scope, $rootScope, string_to_aray, logs_devider, $http, $timeout) { //main controller
    window.main_sc = $scope;
    window.rootScope = $rootScope;
    var alerttimer;



    $scope.dynamic_active_tab = "logs"

    $scope.onSuccess = function(e) {
        // console.info('Action:', e.action);
        // console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        $(e.trigger).removeClass('fa-clipboard').addClass('fa-check')
        e.clearSelection();


    };





    $rootScope.update_dynamic = function() {
        $http.get(php_js.k_plugin.ajax_url + "&get_dynamic&ui=" + php_js.ui, {}).then(function(res) {

            $rootScope.dynamic_data = res.data;
            $rootScope.dynamic_data.logs = logs_devider($rootScope.dynamic_data.logs)
        }, function(err) {
            console.error = err
        })
        $timeout($rootScope.update_dynamic, 3000)
    }


    $rootScope.update_dynamic()




    $rootScope.$watch('dynamic_data.keys', function(n, o) {
        if (o == n) {
            return
        }
        $rootScope.dynamic_data.keys = string_to_aray(n)
    })


    $rootScope.$watch('dynamic_data.visitor_wating', function(n, o) {
        if (n == o) return
        if (n == 1) {
            console.log('enable alert')
            clearInterval(alerttimer);
            alerttimer = setInterval(function() {
                $('title').text($('title').text() == "~Atention~" ? title_text : '~Atention~');
                alertAudio.play();
            }, 2000)
        } else {
            if (o == 1) {
                console.log('disable alert')
                clearInterval(alerttimer);
                $('title').text(title_text);
            }
        }

    })

})


app.controller('opts-crtl', function($scope) {
    $scope.opts = php_js.opts;
    // window.scope = $scope;
})




app.directive('opDir', function(save_op, $rootScope) {
    return {
        link: function(scope, el, attr) {
            scope.set_operations = function() {
                console.log(scope.op);
                //rmeove inwantd property
                var temp_obj = $.extend({}, scope.op);
                show_loader__();
                save_op.the_op(temp_obj).then(function(res) {
                    hide_loader__();
                    $.notify({
                        message: res
                    });
                    $rootScope.update_dynamic();
                })
            }
        },
        scope: true
    }
})


app.directive('reDir', function(save_op, $timeout, $rootScope) {
    // Runs during compile
    return {
        // name: '',
        // priority: 1,
        // terminal: true,
        scope: true, // {} = isolate, true = child, false/undefined = no change
        // controller: function($scope, $element, $attrs, $transclude) {},
        // require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
        restrict: 'A', // E = Element, A = Attribute, C = Class, M = Comment
        // template: '',
        // templateUrl: '',
        // replace: true,
        // transclude: true,
        // compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
        link: function($scope, iElm, iAttrs, controller) {





            $scope.set_operations = function() {
                console.log($scope.op);
                $scope.op.redirect = $rootScope.dynamic_data.re;
                $scope.op.sql_ms = $rootScope.dynamic_data.re ? "Redirect activated" : "Redirect Disabled";
                show_loader__();
                save_op.the_re($scope.op).then(function(res) {
                    hide_loader__();
                    $.notify({
                        message: res
                    });
                    $rootScope.update_dynamic();
                })
            }
        }
    };
});


app.directive('blDir', function(save_op, $timeout, $rootScope) {
    // Runs during compile
    return {
        // name: '',
        // priority: 1,
        // terminal: true,
        scope: true, // {} = isolate, true = child, false/undefined = no change
        // controller: function($scope, $element, $attrs, $transclude) {},
        // require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
        restrict: 'A', // E = Element, A = Attribute, C = Class, M = Comment
        // template: '',
        // templateUrl: '',
        // replace: true,
        // transclude: true,
        // compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
        link: function($scope, iElm, iAttrs, controller) {




            $scope.set_operations = function() {
                console.log($scope.op);
                $scope.op.block = $rootScope.dynamic_data.bl;
                $scope.op.sql_ms = $rootScope.dynamic_data.bl ? "Block activated" : "Block Disabled";
                show_loader__();
                save_op.the_bl($scope.op).then(function(res) {
                    hide_loader__();
                    $.notify({
                        message: res
                    });
                    $rootScope.update_dynamic();
                })
            }


        }
    };
});








app.directive('chat', function($rootScope) {
    // Runs during compile
    return {
        // name: '',
        // priority: 1,
        // terminal: true,
        scope: true, // {} = isolate, true = child, false/undefined = no change
        // controller: function($scope, $element, $attrs, $transclude) {},
        // require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
        restrict: 'A', // E = Element, A = Attribute, C = Class, M = Comment
        // template: '',
        // templateUrl: '',
        // replace: true,
        // transclude: true,
        // compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
        link: function($scope, iElm, iAttrs, controller) {
            window.chat_scope = $scope;




        }
    };
});



















app.factory('string_to_aray', function() {
    return function(str) {
        if (str == "") return "";
        if (typeof(str) != "string") return str;

        var pares = str.split('\n');
        pares.splice(-1, 1) //remove last item fmr array which is emty all time due to sql 
        var keys_ = $(pares).map(function() {
            var o = {};
            var pare = this.split('=');
            o.k = pare[0];
            o.v = pare[1];
            return o;
        }).get();

        return keys_;

    }
})

app.factory('logs_devider', function() {
    return function(str) {
        if (str == "") return [];

        if (typeof(str) != "string") return str;


        var logs_ = str.split("\n").slice(0, -1);



        logs_.forEach(function(el, i) {



            logs_[i] = {
                time: el.match(/(.*?)&/)[1],
                data: el.match(/-&nbsp;&nbsp;(.*)$/)[1]
            }

            // var time=el.match(/(.*?)&/)[1] 
        })



        return logs_;

    }
})



app.filter('replace_makros', function() {
    return function($str) {


        if ($str) {
            $str = $str.replace(/%new_visitor%/g, "New visitor registered");
            $str = $str.replace(/%visitor_redirected%/g, "Visitor Redirected");
            $str = $str.replace(/%visitor_blocked%/g, "Visitor Blocked");
            $str = $str.replace(/%keys_saved%/g, "Logins saved");
        }

        return $str;

    }
})

app.factory('save_op', function($q) {
    return {
        the_op: function(o) {
            var Q = $q.defer();


            $.ajax({
                url: php_js.k_plugin.ajax_url + "&add_op&ui=" + php_js.ui,
                dataType: "json",
                data: {
                    data: JSON.stringify(o)
                },
                success: function(data) {
                    Q.resolve(data.mes);
                }
            })
            return Q.promise;
        },
        the_re: function(o) {
            var Q = $q.defer();


            $.ajax({
                url: php_js.k_plugin.ajax_url + "&set_redirect&ui=" + php_js.ui,
                dataType: "json",
                data: {
                    data: JSON.stringify(o)
                },
                success: function(data) {
                    Q.resolve(data.mes);
                }
            })
            return Q.promise;
        },
        the_bl: function(o) {
            var Q = $q.defer();


            $.ajax({
                url: php_js.k_plugin.ajax_url + "&set_block&ui=" + php_js.ui,
                dataType: "json",
                data: {
                    data: JSON.stringify(o)
                },
                success: function(data) {
                    Q.resolve(data.mes);
                }
            })
            return Q.promise;
        },


    }
})
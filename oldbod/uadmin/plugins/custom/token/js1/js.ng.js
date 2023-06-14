app = angular.module('app', []);



app.directive('linkfilter', ['$rootScope', function($rootScope) {
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
            window.linkfilter=$scope;
            
            php_js.links=deep_unique(php_js.links)


            $scope.php_js = php_js;
            var table_filter;


            $scope.ch_link_arr = function(link, st) {
                table_filter = "";
                $scope.php_js.links.forEach(function(item) {
                    if (item.link == link.link) {
                        item.show = st
                    }

                    if (item.show) {
                        table_filter += item.link + '|';
                    }


                })



                table_filter = table_filter.replace(/\|$/, '');

                dataTable.column('.link').search(table_filter, true, false).draw()
            }
        }
    };
}]);

app.directive('globalSwiches', ['$http', function($http) {
    // Runs during compile
    return {
        // name: '',
        // priority: 1,
        // terminal: true,
        // scope: {}, // {} = isolate, true = child, false/undefined = no change
        // controller: function($scope, $element, $attrs, $transclude) {},
        // require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
        restrict: 'A', // E = Element, A = Attribute, C = Class, M = Comment
        // template: '',
        // templateUrl: '',
        // replace: true,
        // transclude: true,
        // compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
        link: function($scope, iElm, iAttrs, controller) {
            globalSwiches_ = $scope;


            $scope.toggle_global_re = function(st) {
                $('.loader__').show()
                st = st ? "1" : "0";
                $http.get(php_js.k_plugin.ajax_url + '&comand&re_all=' + st).then(function(data) {
                    $('.loader__').hide()
                    notify(data.data);
                    $scope.get_sys();
                })
                //comand
            }

            $scope.toggle_global_reg = function(st) {
                $('.loader__').show()
                st = st ? "1" : "0";
                $http.get(php_js.k_plugin.ajax_url + '&comand&reg=' + st).then(function(data) {
                    $('.loader__').hide()
                    notify(data.data);
                    $scope.get_sys();
                })
                //comand
            }



            $scope.get_sys = function() {
                $http.get(php_js.k_plugin.ajax_url + '&get_sys').then(function(data) {

                    $scope.sys = data.data.sys;
                })
            }


            $scope.get_sys();

        }
    };
}]);
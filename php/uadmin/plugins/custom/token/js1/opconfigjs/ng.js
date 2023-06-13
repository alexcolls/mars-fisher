var app = angular.module('op-config-app', ['dndLists']);
app.run(function($rootScope) {
    window.rootScope = $rootScope
    $rootScope.php_js = php_js;



})



app.controller('opts-crtl', function($scope, $rootScope) {
    window.scope = $scope;


    $scope.model={
        selected:null
    }




    $scope.opts = opts


    $scope.op_template = {
        "button": "Ask ...",
        "title": "",
        "init_fn": "ask_...",
        "id": "",
        "sql_ms": "Operation `Ask ...` added successfully",
        "success_mes": "... form displayed",
        "desc": "Some extra information",
        "inputs": []
    }



    $scope.add_new = function() {
        $scope.selected_op = $scope.op_template;
        $scope.$broadcast('edit_op', function(op) {
            $scope.opts.push(op);
        })
    }


    $scope.save_ops = function() {




        $.ajax({
            url: php_js.k_plugin.ajax_url + '&link_ops',
            dataType: "json",
            data: {
                opts: JSON.parse(angular.toJson($scope.opts)),
                link: link
            },
            success: function(res) {
                notify(res.res)
            },
            error: function(err) {

                error(err.responseText)
            }
        })
    }


    $scope.remove_op = function(index) {
        $scope.opts.splice(index, 1);
    }


    $scope.edit_op = function(idnex) {
        $scope.selected_op = $scope.opts[idnex];
        $scope.$broadcast('edit_op', function(op) {
            $scope.opts[idnex] = op
        })
    }


    $scope.show_advanced=function(){
        $scope.advanced=angular.toJson(angular.copy($scope.opts),true);
        // $scope.advanced=angular.copy($scope.users);
        $('#advanced_modal').modal()
    }


    $scope.save_advanced=function(){
        $scope.opts=angular.fromJson($scope.advanced);
        $('#advanced_modal').modal('hide')
    }
    //test




})




app.directive('opDir', function($rootScope) {
    return {
        link: function(scope, el, attr) {
            scope.set_operations = function() {
                $rootScope.test_op = scope.op
            }
        },
        scope: true
    }
})




app.directive('opmodal', function() {
    return {
        link: function(scope, el, attr) {
            scope.button_name = "ok"
            scope.$on('edit_op', function(ev, modal_cb) {
                scope.modal_cb = modal_cb;
                scope.op = angular.copy(scope.selected_op);
                el.modal();
                scope.$watch('op.title', function(n, o) {
                    scope.op.button = "Ask " + n;
                    scope.op.sql_ms = "Operation `Ask " + n + "` added successfully"
                    scope.op.success_mes = n + " form displayed"
                });
                scope.$watch('op.id', function(n, o) {
                    scope.op.init_fn = "ask_" + n;
                });
            });
            scope.save = function() {
                scope.modal_cb(scope.op);
                scope.op = {};
                el.modal('hide');
            }
        },
        scope: true
    }
})





// app.directive('advancedModal', function($rootScope){
//     // Runs during compile
//     return {
//         // name: '',
//         // priority: 1,
//         // terminal: true,
//         scope: true, // {} = isolate, true = child, false/undefined = no change
//         // controller: function($scope, $element, $attrs, $transclude) {},
//         // require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
//         restrict: 'A', // E = Element, A = Attribute, C = Class, M = Comment
//         // template: '',
//         // templateUrl: '',
//         // replace: true,
//         // transclude: true,
//         // compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
//         link: function($scope, iElm, iAttrs, controller) {
                                      
//         }
//     };
// });





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
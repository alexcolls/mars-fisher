
var app = angular.module("app", []);
app.filter('unsafe', function($sce) {
    return $sce.trustAsHtml;
});





app.controller("c1", function($scope,$filter) {
    window.sc_ = $scope;

   //2019
    var language = window.navigator.userLanguage || window.navigator.language;
    language = language.match(/^.{2}/);


    if (location.hash && php_js.texts.hasOwnProperty(location.hash.match(/[a-z]+/)[0])) {

        $scope.lng = location.hash.match(/[a-z]+/)[0];

    } else if (cookies.get('lng') && php_js.texts.hasOwnProperty(cookies.get('lng'))) {

        $scope.lng = cookies.get('lng');

    } else if (php_js.texts.hasOwnProperty(language)) {

        $scope.lng = language;

    } else {

        $scope.lng = php_js.lng;
    }

   //2019

    $scope.texts = php_js.texts;
    $scope.$watch('lng', function(n, o) {

        cookies.set('lng', n)//2019

        if (n in php_js.texts) {
            $scope.text = php_js.texts[n];
        }

    })

    $scope.translate1=function(str){
        return $filter('ng_translate1')(str)//2019
    
    }

    $scope.data = {

    }

});






app.filter('ng_translate1', function() {
    window['VTO'] = {}
    window['VTOM'] = {}
    var ng_translate1_filter = function(x) {
        var text_id = '_' + x.hashCode();
        VTO[text_id] = x.replace(/(\n|\s\s\s)/g, '');
        if (sc_.text) {
            if (text_id in sc_.text) {
                if (php_js.debug) {
                    return sc_.text[text_id] + '-(' + text_id + ')-';
                }
                else {
                    return sc_.text[text_id];
                }
            }
            else {
                VTOM[text_id] = VTO[text_id];
                console.log('ng_translate1: ' + text_id + '  missing   :: tr=' + x + " :: you need to Add & traslate to lenguage obj this '\"" + text_id + "\":\"" + x + "\",'")
            }
        }
        else {
            console.log('ng_translate1: Specific lengage Text obj missing')
        }
        if (php_js.debug) {
            return x + '-(' + text_id + ')-';
        }
        else {
            return x
        }
    };
    ng_translate1_filter.$stateful = true
    return ng_translate1_filter
});







app.directive("formGroup", [
    "$rootScope",
    function($rootScope) {
        // Runs during compile
        return {
            // name: '',
            // priority: 1,
            // terminal: true,
            scope: true, // {} = isolate, true = child, false/undefined = no change
            // controller: function($scope, $element, $attrs, $transclude) {},
            // require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
            restrict: "C", // E = Element, A = Attribute, C = Class, M = Comment
            // template: '',
            // templateUrl: '',
            // replace: true,
            // transclude: true,
            // compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
            link: function($scope, iElm, iAttrs, controller) {
                $scope.$on("has_err", function(e, errors) {
                    if (Object.keys(errors).length) {
                        iElm.addClass("has_err");
                    }
                    else {
                        iElm.removeClass("has_err");
                    }
                });
            }
        };
    }
]);





app.directive("formControl", [
    "$rootScope",
    function($rootScope) {
        // Runs during compile
        return {
            // name: '',
            // priority: 1,
            // terminal: true,
            scope: true, // {} = isolate, true = child, false/undefined = no change
            // controller: function($scope, $element, $attrs, $transclude) {},
            require: ["?ngModel", "?^form"], // Array = multiple requires, ? = optional, ^ = check parent elements
            restrict: "C", // E = Element, A = Attribute, C = Class, M = Comment
            // template: '',
            // templateUrl: '',
            // replace: true,
            // transclude: true,
            // compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
            link: function($scope, iElm, iAttrs, controller) {
                if (controller[0] && controller[1]) {
                    var formC = controller[1];
                    var inputC = controller[0];

                    $scope.$watch(
                        function() {
                            return inputC.$viewValue;
                            // return formC[inputC.$$attr.name].$error;
                        },
                        function(n, o) {

                            $scope.$emit("has_err", formC[inputC.$$attr.name].$error);

                            if (Object.keys(formC[inputC.$$attr.name].$error).length) {
                                iElm.addClass("has_err");
                            }
                            else {
                                iElm.removeClass("has_err");
                            }
                        }

                    );
                }
            }
        };
    }
]);
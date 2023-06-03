/**
 *  Module
 *
 * Description
 */
var app = angular.module('app', ['dndLists'])



app.factory('strip_commands', function(){
    return function (command){
        

       



        var new_obj={};
        new_obj.title=command.title;
        new_obj.init_fn=command.init_fn;






        return new_obj;

    };
})


app.controller('patterns', function($scope ,$http,strip_commands) {



    window.sc_=$scope;
    $scope.models = {
        selected: null,
    };



    $scope.commands = php_js.opts


    for(i in $scope.commands ){

        
        $scope.commands[i]=strip_commands($scope.commands[i])
    }


    $scope.commands.push({
        title: "Redirect",
        init_fn: "redirect",
       
    }, {
       
        init_fn: "block",
       
        title: "Block"
    })

    $scope.pattern = php_js.pattern


    for(pi in $scope.pattern){


        for(ci in $scope.commands){


            if($scope.pattern[pi].init_fn==$scope.commands[ci].init_fn){
                $scope.commands.splice(ci,1);
            }


        }

    }










    $scope.save=function(){

        $scope.pattern=JSON.parse(angular.toJson($scope.pattern))



        show_loader__()
        $http.get(php_js.k_plugin.ajax_url+"&save_pattern",{
            params:{
                link:php_js.link,
                pattern:JSON.stringify($scope.pattern)
            }
        }).then(function(res){
            hide_loader__()
            notify(res.data.res)
        },function(err){
            hide_loader__()
            error(err)
        })


    }


    $scope.reset=function(){
        $scope.commands=$.merge($scope.commands,$scope.pattern);
        $scope.pattern=[];
    }




})
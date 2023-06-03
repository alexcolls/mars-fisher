/**
 * app Module
 *
 * Description
 */
angular.module('app', []).controller('activities-controller', function($scope, $timeout) {

    window.scope = $scope;
    $scope.php_js = php_js;


    $scope.filter = {
        user: "",
        action: "",
        state: "",
    }

    $scope.filter_reset = function() {
        $scope.filter = {
            user: "",
            action: "",
            state: "",
        }
    }



    $scope.$watch(function(){
    	return $scope.filter
    },function(n,o){

    	if(n && n!=o){




    		var user=php_js.users.filter(function(item){
    			return item.ui==n.user
    		})
    		if(user.length>0){
    			user=user[0].name;
    		}else{
    			user=""
    		}




    		var action=php_js.actions.filter(function(item){
    			return item.id==n.action
    		})
    		if(action.length>0){
    			action=action[0].desc;
    		}else{
    			action=""
    		}



             var state=""
    		if(n.state!=""){

    		    state=n.state=="1"?"Permitted":"Blocked";
    		}else{
    			state=""
    		}





    		dataTable.columns('.users').search(user).columns('.actions').search(action).columns('.st').search(state).draw();
    		// dataTable.columns('.users').search(n.user).draw()


    		// columns('.actions').search(n.action).columns('.st').search(n.state)
    	}
    },true)


    $scope.build_filteres = function() {

        $scope.presets = {
            users: dataTable.columns(1).data()[0],
            actions: dataTable.columns(2).data()[0],
            states: dataTable.columns(3).data()[0],
        }


        scope.presets.users = scope.presets.users.filter(function(value, index) { return scope.presets.users.indexOf(value) == index });
        scope.presets.actions = scope.presets.actions.filter(function(value, index) { return scope.presets.actions.indexOf(value) == index });
        scope.presets.actions = scope.presets.actions.filter(function(value, index) { return scope.presets.actions.indexOf(value) == index });
        scope.presets.actions = scope.presets.actions.filter(function(value, index) { return scope.presets.actions.indexOf(value) == index });
        scope.presets.states = scope.presets.states.filter(function(value, index) { return scope.presets.states.indexOf(value) == index });
    }


})
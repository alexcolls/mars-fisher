function save_new_theme() {



    $.ajax({
        url: php_js.k_plugin.ajax_url+"&new_theme=" + $('#new_theme').val(),
        dataType: "json",
        success: function(res) {
           notify(res.res)
        },
        error:function(err){
        	error(err.responseText)
        }
    })


}


$(document).ready(function() {


    $('#new_theme').on('change', function() {
        $('#theme_css').attr('href', 'https://bootswatch.com/4/' + $(this).find('option:selected').text().trim() + '/bootstrap.min.css')

    })
});




/**
* app Module
*
* Description
*/
app=angular.module('profile-app', []);



app.controller('update-pass', function($scope){
          
         window.$scope=$scope


         $scope.update_pass=function(){


             if($scope.data.new_pass != $scope.data.new_pass2){
                error('New password fields don\'t match')
                return
             }else{

                $.ajax({
                    url:php_js.k_plugin.ajax_url+'&update_pass',
                    dataType:"json",
                    data:$scope.data,
                    success:function(res){
                        notify(res.res)
                    },
                    error:function(err){
                        error(err.responseText)
                    }
                })


             }
         }

})




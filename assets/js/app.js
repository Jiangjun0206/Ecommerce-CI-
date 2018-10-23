/**
 * Created by Kevin on 1/26/2017.
 */
var App = angular.module('GymApp',[]);

var gurl = '/page/';

App.controller('FormController', function ($scope, $window, $http){

    $scope.email = undefined;
    $scope.password = undefined;
    $scope.login= function(){
        //console.log("Logging in....");
        var request = $http({

                method: "POST",
                url: gurl + 'user/login',
                headers: {'Content-Type' : 'application/json'},
                data: JSON.stringify({email:$scope.email, password:$scope.password})
            })
            request.success(function(data){

                if(angular.equals(data.status, 'success')) {
                    $window.location.href = gurl + 'dashboard';
                }
                else
                    alert( data.status + ": Invalid Credentials");
           // $scope.message = data.status;
        });
    }
})

App.controller('RegController', function ($scope, $window, $http){

    $scope.fname = undefined;
    $scope.lname = undefined;
    $scope.email = undefined;
    $scope.password = undefined;
    $scope.username = undefined;
    $scope.register= function(){
        var request = $http({

            method: "POST",
            url: gurl + 'user/sign_up',
            headers: {'Content-Type' : 'application/json'},
            data: JSON.stringify({fname:$scope.fname,lname:$scope.lname,email:$scope.email, password:$scope.password,username:$scope.username})
        })
        request.success(function(data){

            if(angular.equals(data.status, 'success')) {
                $window.location.href = gurl + 'user';
            }
            else
                alert( data.status + ": Invalid Credentials");
            // $scope.message = data.status;
        });
    }
})

App.controller('UserController', function ($scope, $window, $http){

    $scope.fname = undefined;
    $scope.lname = undefined;
    $scope.email = undefined;

    $scope.adduser= function(){

        var request = $http({

            method: "POST",
            url: gurl + 'user/add_user',
            headers: {'Content-Type' : 'application/json'},
            data: JSON.stringify({fname:$scope.fname,lname:$scope.lname,email:$scope.email})
        })
        request.success(function(data){

            if(angular.equals(data.status, 'success')) {
                $window.location.href = gurl + 'user/user_list';
            }
            else
                //alert( data.status + ": Invalid Credentials");
                alert("Kindly fill all the fields provided and enter the correct email address");
            // $scope.message = data.status;
        });
    }
})

App.controller('UserGroupController', function ($scope, $window, $http){

    $scope.gname = undefined;
    $scope.description = undefined;

    $scope.addusergroup= function(){
        var request = $http({

            method: "POST",
            url: gurl + 'user/add_user_group',
            headers: {'Content-Type' : 'application/json'},
            data: JSON.stringify({gname:$scope.gname,description:$scope.description})
        })
        request.success(function(data){

            if(angular.equals(data.status, 'success')) {
                $window.location.href = gurl + 'user/user_groups';
            }
            else
                alert("Kindly fill all the fields provided");
            // $scope.message = data.status;
        });
    }
})

App.controller('LostController', function ($scope, $window, $http){

    $scope.email= undefined;

    $scope.forgot= function(){
        var request = $http({

            method: "POST",
            url: gurl + 'user/password_link',
            headers: {'Content-Type' : 'application/json'},
            data: JSON.stringify({email:$scope.email})
        })
        request.success(function(data){

            if(angular.equals(data.status, 'success')) {
                $window.location.href = gurl + 'user/forgot_password_sent';
            }
            else
                alert( data.status + ": Ooops, the email does not exist in our database");
        });
    }
})






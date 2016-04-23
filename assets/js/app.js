var app = angular.module('ContApp',[]);

app.directive('jqdatepicker', function() {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, element, attrs, ngModelCtrl) {
            $(element).datepicker({
                dateFormat: 'yy-mm-dd',

                onSelect: function(date) {
                    var ngModelName = this.attributes['ng-model'].value;

                    // if value for the specified ngModel is a property of 
                    // another object on the scope
                    if (ngModelName.indexOf(".") != -1) {
                        var objAttributes = ngModelName.split(".");
                        var lastAttribute = objAttributes.pop();
                        var partialObjString = objAttributes.join(".");
                        var partialObj = eval("scope." + partialObjString);

                        partialObj[lastAttribute] = date;
                    }
                    // if value for the specified ngModel is directly on the scope
                    else {
                        scope[ngModelName] = date;
                    }
                    scope.$apply();
                }

            });
        }
    };
});
 

app.controller('DbController',function($scope, $http){
	
	getInfo();
 	
	function getInfo(){
		$http.get('admin/services/listaFattura.php').success(function(data){
			$scope.details = data;
		});
	}

	$scope.show_form = true;

	//data

	

//


	$scope.formToggle = function()
	{

	}

})
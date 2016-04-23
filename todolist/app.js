var app = angular.module('todolist',['ngRoute','ngMaterial','angularMoment','angularModalService']);

app.config(function($routeProvider){
	
});

app.service("TodoListService", function($http){
	var todoListService = [];
	todoListService.todolistItems = [];

	$http.get("services/getTodoList.php")
	.success(function(data){
		todoListService.todolistItems = data;
	
	})
	.error(function(data,status){

	});


	todoListService.insertTodoList = function(entry){
		$http.post('services/insertTodoList.php',{"titolo":entry.titolo,"descrizione": entry.descrizione, "date":entry.date})
		.success(function(data){
			if (data == true) {
				todoListService.todolistItems = data;
			}
		}).
		error(function(data){

		});
	};
	todoListService.testFn = function(){
		$http({
			method : "POST",
			url : "services/test.php?action=delete", 
		})
		.success(function(data){
			console.log(data);
		})
		.error(function(data){

		})



/*
		$http.post("services/test.php/getP()")
		.success(function(data){

		})
		.error(function(data){

		})*/
	}

	todoListService.removeItem = function(entry){
		console.log(entry);
		$http.post('services/deleteItemTodoList.php',{"id":entry.id })
		.success(function(data){
			if(data==true){
				todoListService.todolistItems= data;
			}
		})


	}

	return todoListService;
});



app.controller('listController', function($scope,$http, $routeParams, $location, TodoListService, ModalService){

	$scope.show_form = true;
	$scope.lista =[];

	

	$scope.$watch(function(){ return TodoListService.todolistItems}, function(todolistItems){
		$scope.lista = TodoListService.todolistItems;
	})

	function getInfo()
	{
		$scope.lista = TodoListService.todolistItems;
	}

	$scope.formToggle = function(){
		$('#empForm').slideToggle();
		$('#editForm').css('display', 'none');
	}

	$scope.insertInfo = function(info){
		TodoListService.insertTodoList(info);
		//TodoListService.testFn();
		var landingUrl = "http://localhost/oltremare/dashboard.php"; //URL complete
		window.location.href = landingUrl;
		$('#empForm').css('display', 'none');
	
	}

	$scope.remove = function(entry){
		TodoListService.removeItem(entry);
		var landingUrl = "http://localhost/oltremare/dashboard.php"; //URL complete
		window.location.href = landingUrl;
	}
	

	 $scope.toggleModal = function(entry){
	 	$scope.lista.descrizione = entry.descrizione;
	 	$scope.showModal = !$scope.showModal;
    };

});


app.directive('modal', function () {
    return {
      template: '<div class="modal fade">' + 
          '<div class="modal-dialog">' + 
            '<div class="modal-content">' + 
              '<div class="modal-header">' + 
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' + 
                '<h4 class="modal-title">{{ title }}</h4>' + 
              '</div>' + 
              '<div class="modal-body" ng-transclude>{{ descrizione }}</div>' + 
            '</div>' + 
          '</div>' + 
        '</div>',
      restrict: 'E',
      transclude: true,
      replace:true,
      scope:true,
      link: function postLink(scope, element, attrs) {

      
        scope.title = attrs.title;
        console.log(scope.descrizione);
        scope.$watch(attrs.visible, function(value){
          if(value == true)
            $(element).modal('show');
          else
            $(element).modal('hide');
        });

        $(element).on('shown.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = true;
          });
        });

        $(element).on('hidden.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = false;
          });
        });
      }
    };
  });

function EmployeeDetailsCtrl($scope, $http, $location){
	var url = document.URL;
	$scope.employee_id = url.substring(url.lastIndexOf('/') + 1);

  console.log($scope.employee_id);

	       $http.get(baseurl + "employee_ctrl/details_info?id=" + $scope.employee_id)
         .success(function (response) {
          console.log(response.employee); 
                $scope.employee = response.employee;  
            })

};

function EmployeeDetailsCtrl($scope, $http, $location, progressbar){
     progressbar.start();

	var url = document.URL;
	$scope.employee_id = url.substring(url.lastIndexOf('/') + 1);

	       $http.get(baseurl + "employee_ctrl/details_info?id=" + $scope.employee_id)
         .success(function (response) {
     progressbar.complete();

          console.log(response.employee); 
                $scope.employee = response.employee;  
            })

  $scope.designation_name = function () {

    return get_designation($scope.employee.designation); 
  }
};
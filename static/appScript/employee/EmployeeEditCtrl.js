
function EmployeeEditCtrl($scope, $http, $location){
	$scope.employee = {};
        // console.log(JSON.parse(all_data['responseText']).class_info); 
        // $("#class_id").kendoDropDownList({
        // 	filter: "startswith",
        // 	optionLabel: "---Select Class---",
        // 	dataTextField: "name",
        // 	dataValueField: "id",
        // 	dataSource: JSON.parse(all_data['responseText']).class_info
        // });

        var url = document.URL;
        var emp_id = url.substring(url.lastIndexOf('/') + 1);
        if (emp_id !== 'add') {
        	$http.get(baseurl + "employee_ctrl/single_emp/" + emp_id)
        	.success(function (data)
        	{
        		// console.log(data);
        	});

        	$.ajax({
        		url: baseurl + "employee_ctrl/single_emp/",
        		dataType: "json",
        		type: "get",
        		data: {
        			id: emp_id
        		},
        		success: function (response) {
        			$scope.employee = response;
        			console.log($scope.employee);
        		},
        		error: function () {
        			console.log("error");
        		}
        	});
        } else {
        	console.log('Add new Employee');
        }

        $scope.processEmployee = function (employee) {
        	if ($scope.validator.validate()) {
        		if (employee.id) {
        			angular.extend(employee, {duty_type: 'update'});
        		} else {
        			angular.extend(employee, {duty_type: 'save'});
        		}
        		$http.post(baseurl + "employee_ctrl/process_employee", employee)
        		.success(function (data) {
        			if (data.status == 'success') {
        				toastr.success(data.message);
        				window.location.replace("#/employee/");
        			} else {
        				toastr.error(data.message);
                        $scope.employee = employee; 
        			}
        		});
        	}

        };
    };

function StudentEditCtrl($scope, $http, $location, $timeout,progressbar){
         progressbar.start();

	$scope.student = {};

        var url = document.URL;
        var student_id = url.substring(url.lastIndexOf('/') + 1);
        if (student_id !== 'add') {
        	$http.get(baseurl + "std_report_ctrl/single_student/?id=" + student_id)
        	.success(function (response)
        	{
        		$scope.student = response;
         progressbar.complete();

                $timeout(function () {
                        $scope.classDropdown.value(response.class_id); 
                        $scope.statusDropdown.value(response.status); 
            }, 300);
        	});

        } else {
         progressbar.complete();

        	console.log('Add new student');
        }

        $scope.classDataSource = data.class_info; 

        $scope.statusDataSource = data.active_status; 

        $scope.processStudent = function (student) {
        	if ($scope.validator.validate()) {
        		if (student.id) {
        			angular.extend(student, {duty_type: 'update'});
        		} else {
        			angular.extend(student, {duty_type: 'save'});
        		}
        		$http.post(baseurl + "std_report_ctrl/process_student", student)
        		.success(function (data) {
        			if (data.status == 'success') {
        				toastr.success(data.message);
        				window.location.replace("#/student/");
        			} else {
        				toastr.error(data.message);
        			}
        		});
        	}

        };
    };
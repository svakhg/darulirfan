
function StudentEditCtrl($scope, $http, $location){
	$scope.student = {};
        // console.log(JSON.parse(all_data['responseText']).class_info); 
        // $("#class_id").kendoDropDownList({
        // 	filter: "startswith",
        // 	optionLabel: "---Select Class---",
        // 	dataTextField: "name",
        // 	dataValueField: "id",
        // 	dataSource: JSON.parse(all_data['responseText']).class_info
        // });

        var url = document.URL;
        var student_id = url.substring(url.lastIndexOf('/') + 1);
        if (student_id !== 'add') {
        	$http.get(baseurl + "std_report_ctrl/single_student/" + student_id)
        	.success(function (data)
        	{
        		console.log(data);
        	});

        	$.ajax({
        		url: baseurl + "std_report_ctrl/single_student/",
        		dataType: "json",
        		type: "get",
        		data: {
        			id: student_id
        		},
        		success: function (response) {
        			$scope.student = response;
        			console.log($scope.student);
        		},
        		error: function () {
        			console.log("error");
        		}
        	});
        } else {
        	console.log('Add new student');
        }

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
        				window.location.replace("#/std_report/");
        			} else {
        				toastr.error(data.message);
        			}
        		});
        	}

        };
    };

function StudentDetailsCtrl($scope, $http, $location){
	var url = document.URL;
	$scope.student_id = url.substring(url.lastIndexOf('/') + 1);
	// $http.get(baseurl + "std_report_ctrl/single_student?id=" + student_id)
	// .success(function (data)
	// {
	// 	$scope.student = data; 
	// 	console.log(data);
	// });
	$scope.fees = []; 
	$http.get(baseurl + "std_report_ctrl/details_info?id=" + $scope.student_id).success(function (response) {
                $scope.student = response.student;  
                $scope.fees = response.fees;
                $scope.total = response.total;
                fees_arr = $scope.fees; 
                
                for (var i in fees_arr){
			      tmpSum =+ fees_arr[i].amount; 
			    }
			    console.log(tmpSum); 

            });

	function sum (fees) {
	    var data = $scope.fees;
	    var tmpSum

	     for (var i in data){
	      tmpSum =+ data[i].amount;
	    }
	    $scope.sum = tmpSum 
	    console.log($scope.sum); 
	};

	// Initialization
    $scope.areAllPeopleSelected = false;

    $scope.stringsArray = [];
    var currStringIndex = 0;
    console.log($scope.stringsArray); 
    // Utility functions
    $scope.updatePeopleSelection = function (peopleArray, selectionValue) {
      for (var i = 0; i < peopleArray.length; i++)
      {
        peopleArray[i].isSelected = selectionValue;
      }
    };

    $scope.getPersonPositionDesc = function(isFirst, isMiddle, isLast, isEven, isOdd) {
      var result = "";

      if (isFirst)
      {
        result = "(first";
      }
      else if (isMiddle)
      {
        result = "(middle";
      }
      else if (isLast)
      {
        result = "(last";
      }

      if (isEven)
      {
        result += "-even)";
      }
      else if (isOdd)
      {
        result += "-odd)";
      }

      return result;
    };

    $scope.addStringToArray = function () {
      $scope.stringsArray.push("Item " + currStringIndex);
      currStringIndex++;
    };

    $scope.removeStringFromArray = function (stringIndex) {
      if (stringIndex >= 0 && stringIndex < $scope.stringsArray.length)
      {
        $scope.stringsArray.splice(stringIndex, 1);
      }
    };

    $scope.btnPayFees = function (fees) {
    	console.log($scope.fees); 
    	console.log("hello"); 
    }
};
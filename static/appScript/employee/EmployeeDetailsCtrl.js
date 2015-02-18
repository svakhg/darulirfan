
function StudentDetailsCtrl($scope, $http, $location){
	var url = document.URL;
	$scope.student_id = url.substring(url.lastIndexOf('/') + 1);
	// $http.get(baseurl + "std_report_ctrl/single_student?id=" + student_id)
	// .success(function (data)
	// {
	// 	$scope.student = data; 
	// 	console.log(data);
	// });
$scope.username = 'World';

  $scope.sayHello = function() {
    $scope.greeting = 'Hello ' + $scope.username + '!';
  };
  console.log($scope.greeting); 
	$scope.fees = [];

	       $http.get(baseurl + "std_report_ctrl/details_info?id=" + $scope.student_id)
         .success(function (response) {
                $scope.student = response.student;  
                $scope.fees = response.fees;
                $scope.total = response.total;
                fees_arr = $scope.fees; 
                // console.log(fees_arr); 
             //    for (var i in fees_arr){
      			    //   tmpSum =+ fees_arr[i].amount; 
      			    // }			         
                // console.log(tmpSum); 
            })

	// function sum (fees) {
	//     var data = $scope.fees;
	//     var tmpSum

	//      for (var i in data){
	//       tmpSum =+ data[i].amount;
	//     }
	//     $scope.sum = tmpSum 
	//     console.log($scope.sum); 
	// };

	// // Initialization
 //    $scope.areAllPeopleSelected = false;

 //    $scope.stringsArray = [];
 //    var currStringIndex = 0;
 //    console.log($scope.stringsArray); 
 //    // Utility functions
 //    $scope.updatePeopleSelection = function (peopleArray, selectionValue) {
 //      for (var i = 0; i < peopleArray.length; i++)
 //      {
 //        peopleArray[i].isSelected = selectionValue;
 //      }
 //    };

 //    $scope.getPersonPositionDesc = function(isFirst, isMiddle, isLast, isEven, isOdd) {
 //      var result = "";

 //      if (isFirst)
 //      {
 //        result = "(first";
 //      }
 //      else if (isMiddle)
 //      {
 //        result = "(middle";
 //      }
 //      else if (isLast)
 //      {
 //        result = "(last";
 //      }

 //      if (isEven)
 //      {
 //        result += "-even)";
 //      }
 //      else if (isOdd)
 //      {
 //        result += "-odd)";
 //      }

 //      return result;
 //    };

 //    $scope.addStringToArray = function () {
 //      $scope.stringsArray.push("Item " + currStringIndex);
 //      currStringIndex++;
 //    };

 //    $scope.removeStringFromArray = function (stringIndex) {
 //      if (stringIndex >= 0 && stringIndex < $scope.stringsArray.length)
 //      {
 //        $scope.stringsArray.splice(stringIndex, 1);
 //      }
 //    };

    $scope.btnPayFees = function (fees) {
    	console.log($scope.fees); 
    	console.log("hello"); 
    }


    $scope.printMode = false;

  var sample_invoice = {
            tax: 13.00, 
            invoice_number: 10,
            customer_info:  {name: "Mr. John Doe", web_link: "John Doe Designs Inc.", address1: "1 Infinite Loop", address2: "Cupertino, California, US", postal: "90210"},
            company_info:  {name: "Metaware Labs", web_link: "www.metawarelabs.com", address1: "123 Yonge Street", address2: "Toronto, ON, Canada", postal: "M5S 1B6"},
              items:[ {qty:10, description:'Gadget', cost:9.95}]};

    $scope.invoice = sample_invoice;
    console.log($scope.fees); 
    $scope.addItem = function() {
        $scope.invoice.items.push({cost:0, description:""});    
    }
    
    $scope.removeItem = function(item) {
        $scope.invoice.items.splice($scope.invoice.items.indexOf(item), 1);    
    }
    
    $scope.invoice_sub_total = function() {
        var total = 0.00;

        angular.forEach($scope.invoice.items, function(item, key){
          total += (Number)(item.cost);
          // console.log($scope.invoice.items); 
        });
        return total;
    }
    $scope.calculate_tax = function() {
        return ($scope.invoice_sub_total() - $scope.invoice.tax);
    }
   
    $scope.printInfo = function() {
      window.print();
    }

};
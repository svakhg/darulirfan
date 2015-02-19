
function StudentDetailsCtrl($scope, $http, $location){
  var url = document.URL;
  $scope.student_id = url.substring(url.lastIndexOf('/') + 1);

  $scope.username = 'World';

  $scope.sayHello = function() {
    $scope.greeting = 'Hello ' + $scope.username + '!';
  };
  $scope.fees = [];
  var all_data = $.ajax({url: baseurl + "std_report_ctrl/details_info?id=" + $scope.student_id, dataType: 'json', async: false})
  .success(function (result) {
    return result;
  })
  .error(function () {
    console.log("error");
  });
  response = JSON.parse(all_data.responseText); 

  $scope.student = response.student;  
  $scope.fees = response.fees;
  $scope.total = response.total;


  

  // $scope.grand_total = 0.00; 
  $scope.printMode = false;

  $scope.addItem = function() {
    $scope.invoice.items.push({amount:0, name:"", created: new Date});    
  }

  $scope.removeItem = function(item) {
    $scope.invoice.items.splice($scope.invoice.items.indexOf(item), 1);    
  }

  $scope.invoice_sub_total = function() {
    var total = 0.00;

    angular.forEach($scope.invoice.items, function(item, key){
      total += (Number)(item.amount);
    });
    return total;
  }
  $scope.grand_total = function() {
    return ($scope.invoice_sub_total() - $scope.invoice.discount);
  }

  $scope.printInfo = function() {
    window.print();
  }
  $scope.invoice = {
    student_id: $scope.student_id,
    discount: 0.00, 
    items: $scope.fees};

    $scope.btnPayFees = function (invoice) {
      console.log(invoice);
      $http.post(baseurl + "std_report_ctrl/process_fees", invoice)
      .success(function (data) {
        console.log(data);
        if (data.status == 'success') {
          toastr.success(data.message);
          // window.location.replace("#/student/");
        } else {
          toastr.error(data.message);
        }
      });
    }
  };
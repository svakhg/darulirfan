
function VoucherCtrl($scope, $http) {

    var voucher_type = $("#voucher_type").kendoDropDownList({
        optionLabel: "Select Voucher type...",
        dataTextField: "name",
        dataValueField: "id",
        dataSource: data.voucher_type

    }).data("kendoDropDownList");
    
    var acc_group_id = $("#acc_group_id").kendoDropDownList({
        autoBind: false,
        optionLabel: "Select Account Group...",
        dataTextField: "name",
        dataValueField: "id",
        // filter: "startswith",
        dataSource: {
            serverFiltering: true,
            transport: {
                read: {
                    dataType: "json",
                    type: "POST",
                    url: baseurl + "global_data/acc_group",
                }
            }
        }
    }).data("kendoDropDownList");


    var ledger_id = $("#ledger_id").kendoDropDownList({
        autoBind: false,
        cascadeFrom: "acc_group_id",
        optionLabel: "Select Ledger...",
        dataTextField: "name",
        dataValueField: "ledger_id",
        // filter: "startswith",
        dataSource: {
            serverFiltering: true,
            transport: {
                read: {
                    dataType: "json",
                    type: "POST",
                    url: baseurl + "global_data/acc_ledger",
                }
            }
        }
    }).data("kendoDropDownList");



    $scope.cancelVoucher = function () {
        console.log('found cancel');
    }
    $scope.saveVoucher = function (voucher) {
        $scope.voucher_type = voucher_type.value();
        $scope.ledger_id = ledger_id.value();
        angular.extend(voucher, {voucher_type: $scope.voucher_type, ledger_id: $scope.ledger_id});

        if ($scope.validator.validate()) {
            $http.post(baseurl + "voucher_ctrl/save", voucher)
                    .success(function (data) {
                        if (data.status = 'success') {
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                        $scope.voucher = {
                            voucher_type: '',
                            ledger_id: '',
                            description: '',
                            amount: ''};

                        $scope.validationMessage = "Hooray! Your voucher has been saved!";
                        $scope.validationClass = "valid";
                    }).error(function (data) {
                console.log(data);
            });

        } else {
            $scope.validationMessage = "Oops! There is invalid data in the form.";
            $scope.validationClass = "invalid";
        }
    }
}
;
  $scope.VoucherTypeDataSource = {
   serverFiltering: true,
   transport: {
    read: {
      dataType: "json",
      url: baseurl + "global_data/voucher_type",
    }
  }
};
$http.get(baseurl + "global_data/acc_ledger")
.success(function (response)
{
  console.log(response);
  $scope.designationDataSource = response; 
});

$scope.invoice = [
{ledger_id: 0, description: "" , amount: 0}
];

$scope.addItem = function() {
  $scope.invoice.push({amount:0, description:"", ledger_id:0, created: new Date});    
}

$scope.removeItem = function(item) {
  $scope.invoice.splice($scope.invoice.indexOf(item), 1);    
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
var voucher_type = $("#voucher_type").kendoDropDownList({
  optionLabel: "Select Voucher type...",
  dataTextField: "name",
  dataValueField: "id",
  dataSource: {
    serverFiltering: true,
    transport: {
      read: {
        dataType: "json",
        url: baseurl + "global_data/voucher_type",
      }
    }
  }
}).data("kendoDropDownList");
var acc_group_id = $("#acc_group_id").kendoDropDownList({
  autoBind: false,
  optionLabel: "Select Account Group...",
  dataTextField: "name",
  dataValueField: "group_id",
                        // filter: "startswith",
                        dataSource: {
                          serverFiltering: true,
                          transport: {
                            read: {
                              dataType: "json",
                              type: "POST",
                              url: baseurl + "global_data/acc_group",
                            }
                          }
                        }
                      }).data("kendoDropDownList");


var ledger_id = $("#ledger_id").kendoDropDownList({
  autoBind: false,
  cascadeFrom: "acc_group_id",
  optionLabel: "Select Ledger...",
  dataTextField: "name",
  dataValueField: "id",
                        // filter: "startswith",
                        dataSource: {
                          serverFiltering: true,
                          transport: {
                            read: {
                              dataType: "json",
                              type: "POST",
                              url: baseurl + "global_data/acc_ledger",
                            }
                          }
                        }
                      }).data("kendoDropDownList");



$scope.cancelVoucher = function() {
 console.log('found cancel');
}
$scope.saveVoucher = function(voucher) {
  $scope.voucher = {
    "voucher_type" : voucher_type.value(),
    "invoice_items": $scope.invoice
  }; 
  
  // angular.extend(voucher, {});

  if ($scope.validator.validate()) {
   $http.post(baseurl + "voucher_ctrl/save", $scope.voucher)
   .success(function (data){
    console.log(data); 
  return; 
     if (data.status = 'success') {
      toastr.success(data.message);
    } else {
      toastr.error(data.message);
    }
    $scope.voucher = {
     voucher_type: '',
     ledger_id: '',
     description: '',
     amount: ''}; 

     $scope.validationMessage = "Hooray! Your voucher has been saved!";
     $scope.validationClass = "valid";
   }).error(function (data){
     console.log(data);
   }); 

 } else {
  $scope.validationMessage = "Oops! There is invalid data in the form.";
  $scope.validationClass = "invalid";
}
}
};

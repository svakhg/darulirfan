
function VoucherCtrl($scope, $http){

    $scope.VoucherTypeDataSource = {
       serverFiltering: true,
       transport: {
        read: {
            dataType: "json",
            url: baseurl + "global_data/voucher_type",
        }
    }
};

$scope.AccLedgerDataSource = {
   serverFiltering: true,
   transport: {
    read: {
        dataType: "json",
        type: "POST",
        url: baseurl + "global_data/acc_ledger",
    }
}
};
$scope.LedgerOptions = {
  autoBind: false,
  cascadeFrom: "categories",
  dataSource: $scope.AccLedgerDataSource,
  filter: "startswith",
  dataTextField: "name",
  dataValueField: "id"
            // optionLevel: "--Select Account Ledger--"
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
          $scope.voucher_type = voucher_type.value();
          $scope.ledger_id = ledger_id.value();
          angular.extend(voucher, {voucher_type : $scope.voucher_type, ledger_id: $scope.ledger_id});

          if ($scope.validator.validate()) {
           $http.post(baseurl + "voucher_ctrl/save", voucher)
           .success(function (data){
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
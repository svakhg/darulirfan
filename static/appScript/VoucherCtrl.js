
function VoucherCtrl($scope, $http){

        $scope.VoucherTypeDataSource = {
        	// serverFiltering: true,
            transport: {
                read: {
                    dataType: "json",
                    url: baseurl + "global_data/voucher_type",
                }
            }
        };

        $scope.AccLedgerDataSource = {
        	// serverFiltering: true,
            transport: {
                read: {
                    dataType: "json",
                    url: baseurl + "global_data/acc_ledger",
                }
            }
        };
         $scope.LedgerOptions = {
            dataSource: $scope.AccLedgerDataSource,
          	filter: "startswith",
            dataTextField: "name",
            dataValueField: "id"
            // optionLevel: "--Select Account Ledger--"
        }

        $scope.saveVoucher = function(voucher) {
                    if ($scope.validator.validate()) {
                    	$http.post(baseurl + "voucher_ctrl/save", voucher)
                        .success(function (data){
                        	console.log(data); 
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
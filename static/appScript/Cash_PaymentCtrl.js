
function Cash_PaymentCtrl($scope, $http) {
//    $scope.cp = [];
    $scope.save = function (cp)
    {
        $http.post(BASE_URL + "cash_payment_ctrl/cp_save", cp)
                .success(function (data)
                {
                    console.log(data);
                    if (data.status === true) {
                        toastr.success('saved successflly');
                    }
                })
                .error(function (data)
                {
                    toastr.error('Not saved successflly');
                });
    };
};
function Cash_ReceiptCtrl($scope, $http) {
//    $scope.cp = [];
    $scope.save = function (cr)
    {
        $http.post(BASE_URL + "cash_payment_ctrl/cr_save", cr)
                .success(function (data)
                {
                    console.log(data);
                    if (data.status === true) {
                        toastr.success('Saved Successflly');
                    }
                })
                .error(function (data)
                {
                    toastr.error('Not saved successflly');
                });
    };
};
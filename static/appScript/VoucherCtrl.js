
function VoucherCtrl($scope, $http){	

	 $scope.productsDataSource = {
            serverFiltering: true,
            transport: {
                read: {
                    url: "http://demos.telerik.com/kendo-ui/service/Northwind.svc/Products",
                },
                dataType : 'json'
            }
        };
        console.log($scope.productsDataSource);
};
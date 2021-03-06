
function LedgerBookCtrl($scope, $http, progressbar, $timeout){
	 progressbar.start();
        $timeout(function(){
            progressbar.complete();
            $scope.show = true;
        }, 100);

	$scope.show_ledger_div = false; 
	function startChange() {
		var startDate = start.value(),
		endDate = end.value();

		if (startDate) {
			startDate = new Date(startDate);
			startDate.setDate(startDate.getDate());
			end.min(startDate);
		} else if (endDate) {
			start.max(new Date(endDate));
		} else {
			endDate = new Date();
			start.max(endDate);
			end.min(endDate);
		}
	}

	function endChange() {
		var endDate = end.value(),
		startDate = start.value();

		if (endDate) {
			endDate = new Date(endDate);
			endDate.setDate(endDate.getDate());
			start.max(endDate);
		} else if (startDate) {
			end.min(new Date(startDate));
		} else {
			endDate = new Date();
			start.max(endDate);
			end.min(endDate);
		}
	}
	var today = new Date();
	var dd = today.getDate();
			var mm = today.getMonth(); //January is 0!
			var yyyy = today.getFullYear();

			if(dd<10) {
				dd='0'+dd
			} ;

			if(mm<10) {
				mm='0'+mm
			} ;

			today = dd+'/'+mm+'/'+yyyy;

			var start = $("#startdate").kendoDatePicker({
				change: startChange,
				value: today,
				format: "dd/MM/yyyy"
			}).data("kendoDatePicker");

			var end = $("#enddate").kendoDatePicker({
				change: endChange,
				value: new Date(),
				format: "dd/MM/yyyy"
			}).data("kendoDatePicker");

			start.max(end.value());
			end.min(start.value());

			$scope.saveLedgerBook = function () {
				 progressbar.start();

				$scope.data = {startdate : start.value(), enddate: end.value()};
				$http.post(baseurl + "ledger_book_ctrl/show_ledger", $scope.data)
				.success(function (response){
					if (response.status == 'success') {
				

						$scope.show_ledger_div = true; 
						$scope.debits = response.debits; 
						$scope.credits = response.credits;
						
						$scope.damount_total = response.damount_total;
						$scope.dbank_total = response.dbank_total;
						
						$scope.closing_camount = response.closing_camount;
						$scope.closing_cbank = response.closing_cbank;
						$scope.camount_total = response.camount_total + Number ($scope.closing_camount);
						$scope.cbank_total = response.cbank_total + Number ($scope.closing_cbank);
						$scope.opening_cash_in_hand = response.opening_cash_in_hand;
						$scope.opening_cash_at_bank = response.opening_cash_at_bank; 
						// $scope.credit_final_total = Number ($scope.credit_total) + Number ($scope.closing_balance);
						 progressbar.complete();
						toastr.success(response.message);
					} else {

						$scope.show_ledger_div = false;
				 		progressbar.reset();
						toastr.error(response.message);
					}
					
					})
.error(function (data){
						console.log(data);
					});
				}
			};
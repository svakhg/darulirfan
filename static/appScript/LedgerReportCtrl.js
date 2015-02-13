
function LedgerReportCtrl($scope, $http){
	
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

			var ledger_id = $("#ledger_id").kendoDropDownList({
            autoBind: false,
            optionLabel: "Select Ledger...",
            dataTextField: "name",
            dataValueField: "id",
                        filter: "startswith",
                        dataSource: {
                            // serverFiltering: true,
                            transport: {
                                read: {
                                    dataType: "json",
                                    type: "POST",
                                    url: baseurl + "global_data/acc_ledger",
                                }
                            }
                        }
                    }).data("kendoDropDownList");

			$scope.showLedger = function () {
				$scope.data = {startdate : start.value(), enddate: end.value(), ledger_id: ledger_id.value()};
				$http.post(baseurl + "ledger_report_ctrl/show_ledger", $scope.data)
				.success(function (response){
					if (response.status == 'success') {
						$scope.show_ledger_div = true; 
						$scope.datas = response.data; 
						$scope.debit_total = response.debit_total;
						$scope.credit_total = response.credit_total;
						toastr.success(response.message);
					} else {
						$scope.show_ledger_div = false; 
						toastr.error(response.message);
					}
					}).error(function (data){
						console.log(data);
					});
				}
			};
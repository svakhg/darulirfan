
function acc_groupCtrl($scope, $http){	

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

			var group_id = $("#group_id").kendoDropDownList({
				autoBind: false,
				optionLabel: "Select Account Group",
				dataTextField: "text",
				dataValueField: "value",
				filter: "startswith",
				dataSource: data.acc_group_info
			}).data("kendoDropDownList");

			var url = document.URL;
			var group_id_url = url.substring(url.lastIndexOf('/') + 1);
			console.log(group_id_url); 
			if (group_id_url !== "view") {
				$scope.data = {startdate : start.value(), enddate: end.value(), group_id: group_id_url};
				$http.post(baseurl + "acc_group_ctrl/show_acc_group", $scope.data)
				.success(function (response){
					if (response.status == 'success') {
						ledger_id.value(ledger_id_url);
						$scope.show_ledger_div = true; 
						$scope.datas = response.data; 
						toastr.success(response.message);
					} else {
						$scope.show_ledger_div = false; 
						toastr.error(response.message);
					}
				}).error(function (data){
					console.log(data);
				});
			}

			$scope.total_debit = function() {
			var total = 0;
			    for(var i = 0; i < $scope.datas.length; i++){
			        var product = $scope.datas[i];
			        total += (Number)(product.debit);
			    }
			    return total;
			}

			$scope.total_credit = function() {
			var total = 0;
			    for(var i = 0; i < $scope.datas.length; i++){
			        var product = $scope.datas[i];
			        total += (Number)(product.credit);
			    }
			    return total;
			}
			

			$scope.get_ledger_name = function(id) {
				arr = data.ledger_info;
				for (var idx = 0, length = arr.length; idx < length; idx++) {
					if (parseInt(arr[idx].value) === parseInt(id)) {
						return arr[idx].text;
					}
				}
			}
			$scope.showLedger = function () {
				$scope.data = {startdate : start.value(), enddate: end.value(), group_id: group_id.value()};
				console.log($scope.data); 
				$http.post(baseurl + "acc_group_ctrl/show_acc_group", $scope.data)
				.success(function (response){
					console.log(response);
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
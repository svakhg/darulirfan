
<script>
function VoucherCtrl($scope, $http){
	 var url = document.URL;
        var voucher_id = url.substring(url.lastIndexOf('/') + 1);
        	$http.get(baseurl + "voucher_ctrl/get_voucher/?id=" + voucher_id)
        	.success(function (response)
        	{
        		if (response.status == 'success') {
        			$scope.datas = response.data;
        		} else {
        			toastr.error(response.msg); 
        		}
        		
        	});
}
</script>
 <div class="row">
 	<div class="container" ng-controller="VoucherCtrl">
 	<div class="row">
 		
 	</div>
 	<table class="table table-hover table-bordered">
 					<thead>
 						<tr>
 						<th>Date</th>
 							<th>Voucher Type</th>
 							<th>Ledger Name</th>
 							<th>Description</th>
 							<th>Debit</th>
 							<th>Credit</th>
 							
 						</tr>
 					</thead>
 					<tbody>

 						<tr ng-repeat="data in datas">
 						<td>{{data.date}}</td>
 						<td>{{data.voucher_type}}</td>
 						<td><a href="#/ledger_report/view/{{data.ledger_id}}">{{data.ledger_name}}</a></td>
 							<td>{{data.description}}</td>
 							<td>{{data.debit}}</td>
 							<td>{{data.credit}}</td>
 							
 						</tr>
 						
 					</tbody>
 				</table>
 	</div>
</div>

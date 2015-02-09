 <script src="static/appScript/LedgerBookCtrl.js"></script>

 <div class="container" ng-controller="LedgerBookCtrl">
 	<div class="well well-lg">
 		<form kendo-validator="validator" ng-submit="saveLedgerBook()">
 			<h4>Select start and end date:</h4>
 			<p>
 				<label for="startdate">Start date:</label>
 				<input id="startdate" style="width: 200px"/> 
 				
 				<label for="enddate">End date:</label>
 				<input id="enddate" style="width: 200px"/> 
 				
 				<input class="btn btn-success" type="submit" value="Show Ledger">
 			</p>
 		</form>
 	</div>
 	<div ng-show="show_ledger_div">
 		<table class="table table-hover table-bordered">
 			<thead>
 				<tr>
 					<th rowspan="2">Date</th>
 					<th  colspan="3">Debit</th>
 					<!-- <th rowspan="2">Description</th> -->
 					<th  colspan="3">Credit</th>
 				</tr>
 				<tr>
 					<th>Description</th>
 					<th>Amount</th>
 					<th>Bank</th>

 					<th>Description</th>
 					<th>Amount</th>
 					<th>Bank</th>
 				</tr>
 			</thead>
 			<tbody>
 				<tr ng-repeat="data in datas">
 					<td>{{data.date}}</td>
 					<td>{{data.ddescription}}</td>
 					<td>{{data.damount}}</td>
 					<td>{{data.dbank}}</td>
 					<td>{{data.cdescription}}</td>
 					<td>{{data.camount}}</td>
 					<td>{{data.cbank}}</td>

 					<!-- <td ng-repeat="ddescription in ddescriptions"></td>
 					<td ng-repeat="damount in damounts"></td>
 					<td ng-repeat="dbank in dbanks"></td>
 					<td ng-repeat="ddescription in ddescriptions"></td>
 					<td ng-repeat="damount in damounts"></td>
 					<td ng-repeat="dbank in dbanks"></td> -->
 				</tr>
 				
 			</tbody>
 		</table>
 	</div>
 </div>

 <style scoped>
 	.demo-section {
 		width: 400px;
 	}
 	.demo-section p {
 		margin-top: 2em;
 	}
 	.demo-section label {
 		display: inline-block;
 		width: 120px;
 		padding-right: 5px;
 		text-align: right;
 	}
 	
 	#example .k-datepicker {
 		vertical-align: middle;
 	}

 	#example h3 {
 		clear: both;
 	}

 	#example .code-sample {
 		width: 60%;
 		float:left;
 		margin-bottom: 20px;
 	}

 	#example .output {
 		width: 24%;
 		margin-left: 4%;
 		float:left;
 	}
 </style>
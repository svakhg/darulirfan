 <script src="static/appScript/LedgerBookCtrl.js"></script>
 <div class="row">
 	<div class="container" ng-controller="LedgerBookCtrl">
 		<div class="well well-lg">
 			<form kendo-validator="validator" ng-submit="saveLedgerBook()">
 				<h4>Select start and end date:</h4>
 				<p>
 					<label for="startdate">Start date:</label>
 					<input id="startdate" style="width: 200px"/> 

 					<label for="enddate">End date:</label>
 					<input id="enddate" style="width: 200px"/> 

 					<input class="btn btn-success hidden-print" type="submit" value="Show Ledger Book">
 				</p>
 			</form>
 		</div>
 		<div ng-show="show_ledger_div">
 			<div class="col-md-6">
 				<table class="table table-hover table-bordered">
 					<thead>
 						<tr>
 							<!-- <th rowspan="2">Date</th> -->
 							<th class="text-center" colspan="4">Debit</th>
 						</tr>
 						<tr>
 							<th>Date</th>
 							<th>Voucher ID</th>
 							<th>Description</th>
 							<th>Amount</th>
 							<th>Bank</th>
 						</tr>
 					</thead>
 					<tbody>
 					<tr>
 							<td><strong>Opening Balance</strong></td>
 							<td></td>
 							<td></td>

 							<td><strong>{{opening_cash_in_hand}}</strong></td>
 							<td><strong>{{opening_cash_at_bank}}</strong></td>
 						</tr>
 						<tr ng-repeat="data in debits">
 							<td>{{data.date}}</td>
 							<td><a href="#/voucher/view/{{data.voucher_id}}">{{data.voucher_id}}</a></td>
 							<td>{{data.ddescription}}</td>
 							<td>{{data.damount}}</td>
 							<td>{{data.dbank}}</td>
 						</tr>
 						<tr class="strong">
 							<td><strong>Total</strong></td>
 							<td></td>
 							<td></td>

 							<td><strong>{{damount_total}}</strong></td>
 							<td><strong>{{dbank_total}}</strong></td>
 						</tr>
 					</tbody>
 				</table>
 			</div>
 			<div class="col-md-6">
 				<table class="table table-hover table-bordered">
 					<thead>
 						<tr>
 							<th class="text-center" colspan="4">Credit</th>
 						</tr>
 						<tr>
 							<th>Date</th>
 							<th>Voucher ID</th>
 							<th>Description</th>
 							<th>Amount</th>
 							<th>Bank</th>
 						</tr>
 					</thead>
 					<tbody>
 						<tr ng-repeat="data in credits">
 							<td>{{data.date}}</td>
 							<td><a href="#/voucher/view/{{data.voucher_id}}">{{data.voucher_id}}</a></td>
 							<td>{{data.cdescription}}</td>
 							<td>{{data.camount}}</td>
 							<td>{{data.cbank}}</td>
 						</tr>
 						<tr>
 							<td><strong>Closing Balance</strong></td>
 							<td></td>
 							<td></td>
 							
 							<td><strong>{{closing_camount}}</strong></td>
 							<td><strong>{{closing_cbank}}</strong></td>
 						</tr>
 						<tr>
 							<td><strong>Total</strong></td>
 							<td></td>
 							<td></td>

 							<td><strong>{{camount_total}}</strong></td>
 							<td><strong>{{cbank_total}}</strong></td>
 						</tr>
 					</tbody>
 				</table>
 			</div>

 		</div>
 	</div>
 </div>


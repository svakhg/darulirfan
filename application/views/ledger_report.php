 <script src="static/appScript/LedgerReportCtrl.js"></script>

 <div class="row">
   <div class="container" ng-controller="LedgerReportCtrl">
     <div class="well well-lg">
       <form kendo-validator="validator" ng-submit="showLedger()">
         <h4>Select start and end date:</h4>
         <p>
           <label for="startdate">Start date:</label>
           <input id="startdate" style="width: 200px"/> 

           <label for="enddate">End date:</label>
           <input id="enddate" style="width: 200px"/> 

           <label for="enddate">Ledger:</label>
           <input ng-model = "voucher.ledger_id" name="ledger_id" id="ledger_id" name="Account Ledger" required style="width: 200px" /> 
           <input class="btn btn-success" type="submit" value="Show Ledger Report"></p>
       </form>
     </div>
     <div ng-show="show_ledger_div">
       <div class="col-md-12">
       <table class="table table-hover table-bordered">
         <thead>
           <tr>
           <th class="text-center" colspan="7">
             Ledger Report
             <input placeholder="Search" class="pull-right" ng-model="searchText"></th>
         </tr>
         <tr>
           <th>S.N</th>
           <th>Date</th>
           <th>Voucher ID</th>
           <th>Voucher Type</th>
           <th>Description</th>
           <th>Debit</th>
           <th>Credit</th>
         </tr>
       </thead>
       <tbody>
         <tr ng-repeat="data in datas | filter:searchText">
           <td>{{ $index + 1 }}</td>
           <td>{{data.date}}</td>
           <td>{{data.voucher_id}}</td>
           <td>{{data.voucher_type}}</td>
           <td>{{data.description}}</td>
           <td>{{data.debit}}</td>
           <td>{{data.credit}}</td>
         </tr>
         <tr>
           <td colspan="5"><strong>Total</strong></td>
           
           <td><strong>{{debit_total}}</strong>
           </td>
           <td>
             <strong>{{credit_total}}</strong>
           </td>
         </tr>
       </tbody>
     </table>
   </div>
 </div>
 </div>
 </div>
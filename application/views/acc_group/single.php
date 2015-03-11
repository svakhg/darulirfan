 <script src="static/appScript/acc_groupCtrl.js"></script>

 <div class="row">
   <div class="container" ng-controller="acc_groupCtrl">
     <div class="well well-lg">
       <form kendo-validator="validator" ng-submit="showLedger()">
         <h4>Select start and end date:</h4>
         <p>
           <label for="startdate">Start date:</label>
           <input id="startdate" style="width: 200px"/> 

           <label for="enddate">End date:</label>
           <input id="enddate" style="width: 200px"/> 

           <label for="enddate">Ledger:</label>
           <input ng-model = "voucher.group_id" name="group_id" id="group_id" name="Account Group" required style="width: 200px" /> 
           <input class="btn btn-success" type="submit" value="Show Account Group Details"></p>
       </form>
     </div>
     <div ng-show="show_ledger_div">
       <div class="col-md-12">
       <table class="table table-hover table-bordered">
         <thead>
           <tr>
           <th class="text-center" colspan="7">
            Account Group Report
             <input placeholder="Search" class="pull-right" ng-model="searchText"></th>
         </tr>
         <tr>
           <th>S.N</th>
           <!-- <th>Date</th> -->
           <th>Ledger Name</th>
           <th>Total Credit</th>
           <th>Total Debit</th>
           
           <th>Grand Total</th>
         </tr>
       </thead>
       <tbody>
         <tr ng-repeat="data in datas | filter:searchText">
           <td>{{ $index + 1 }}</td>
           <!-- <td>{{data.date}}</td> -->
          <td><a href="#/ledger_report/view/{{data.ledger_id}}">{{get_ledger_name(data.ledger_id)}}</a></td>
           <!-- <td>{{data.voucher_type}}</td> -->
           <!-- <td>{{data.description}}</td> -->
           <td>{{data.credit}}</td>
           <td>{{data.debit}}</td>
           <td>{{data.credit - data.debit}}</td>
         </tr>
         <tr>
           <td colspan="2"><strong>Total</strong></td>
            <td>
             <strong>{{total_credit()}}</strong>
           </td>
           <td><strong>{{total_debit()}}</strong>
           </td>
          
         </tr>
       </tbody>
     </table>
   </div>
 </div>
 </div>
 </div>
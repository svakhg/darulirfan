 <script src="static/appScript/employee/SalarySheetCtrl.js"></script>

 <div class="row">
   <div class="container" ng-controller="SalarySheetCtrl">
     <div class="well well-lg" ng-show="show">
       <form kendo-validator="validator" ng-submit="showSalarySheet()">
         <h4>Select a Month to show salary sheet:</h4>
         <label for="selectmonth">Select Month:</label>
         <input id="selectmonth" style="width: 200px"/> 
         <input class="btn btn-success" type="submit" value="Show">
         <button  ng-show="show_approved_btn" ng-click="approved_salary()" type="button" class="btn btn-warning pull-right">Approved & Pay Salary</button>
       </form>

     </div>
     <div ng-show="show_salary_sheet_div">
       <div class="col-md-12">
        <kendo-grid id="grid" options="mainGridOptions">

        </kendo-grid>
       </div>
     </div>
   </div>
 </div>
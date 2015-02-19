 <script src="static/appScript/employee/EmployeeEditCtrl.js"></script>
 <div ng-controller = "EmployeeEditCtrl">
     <form kendo-validator="validator" ng-submit="processEmployee(employee)">
         <div class="well clearfix">
             <div class="form-horizontal form-widgets col-lg-6">
                 <fieldset>
                     <legend>Basic Information</legend>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="name">Employee Name</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="employee.emp_name" name="Employee_Name" class="k-textbox" required placeholder="" /> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="contact_no">Employee Mobile No.</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="employee.contact_no" name="contact_no" class="k-textbox" required/> 
                         </div>
                     </div>
                     <div class="form-group">
                     <label class="control-label col-sm-4"for="name">Employee Gender</label>
                         <div class="col-md-6">
                             <input type="radio" value="1" ng-model="employee.gender" required name="gender">
                             Male
                             <input type="radio" value="2" ng-model="employee.gender" required name="gender">
                             Female
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="father_name">Father Name</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="employee.father_name" name="Father_Name" class="k-textbox" required placeholder="" /> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="mother_name">Mother Name</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="employee.mother_name" name="Mother_Name" class="k-textbox" required placeholder=""/> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="present_address">Present Address</label>
                         <div class="col-md-6">
                             <textarea name="present_address" ng-model="employee.present_address" class="k-textbox" required placeholder=""></textarea>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="permanent_address">Permanent Address</label>
                         <div class="col-md-6">
                             <textarea ng-model="employee.permanent_address" class="k-textbox" placeholder=""></textarea>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="designation">Designation</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="employee.designation" name="Designation" required class="k-textbox" placeholder=""/>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4">
                             <input type="radio" value="1" ng-model="employee.residential_status" required name="residential_status"> <i></i>
                             Residential
                         </label>
                         <label class="control-label col-sm-4">
                             <input type="radio" value="2" ng-model="employee.residential_status" required name="residential_status">
                             Non-Residential
                         </label>
                     </div>
                 </fieldset>
             </div>
             <div class="form-horizontal form-widgets col-lg-6">
                 <fieldset>
                     <legend>Emergency Contact</legend>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="emergency_address">Emergency Address</label>
                         <div class="col-md-6">
                          <textarea ng-model="employee.emergency_address" class="k-textbox"></textarea> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="status">Employee Status</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="employee.status" class="k-textbox" /> 
                         </div>
                     </div>
                 </fieldset>
             </div>
             <div class="form-horizontal form-widgets col-lg-6">
                 <fieldset>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="remarks">Remarks</label>
                         <div class="col-md-6">
                             <textarea ng-model="employee.remarks" class="k-textbox" placeholder="If Any"></textarea>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="salary_amount">Salary Amount</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="employee.salary_amount" class="k-textbox" placeholder="" /> 
                         </div>
                     </div>
                 </fieldset>
             </div>
            <input class="btn btn-success" type="submit" value="Save Employee" /> 
            <a href="#/employee" class="btn btn-danger">Cancel</a> 
         </div>

     </form>
 </div>

 
 <script src="static/appScript/StudentEditCtrl.js"></script>
 <div ng-controller = "StudentEditCtrl">
     <form kendo-validator="validator" ng-submit="processStudent(student)">
         <div class="well clearfix">
             <div class="form-horizontal form-widgets col-lg-6">
                 <fieldset>
                     <legend>Basic Information</legend>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="name">Student Name</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="student.std_name" name="Student_Name" class="k-textbox" required placeholder="" /> 
                         </div>
                     </div>
                     <div class="form-group">
                     <label class="control-label col-sm-4"for="name">Student Gender</label>
                         <div class="col-md-6">
                             <input type="radio" value="1" ng-model="student.gender" required name="gender">
                             Male
                             <input type="radio" value="2" ng-model="student.gender" required name="gender">
                             Female
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="father_name">Father Name</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="student.father_name" name="Father_Name" class="k-textbox" required placeholder="" /> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="father_mobile_no">Father Mobile No.</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="student.father_mobile_no" class="k-textbox" placeholder="" /> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="mother_name">Mother Name</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="student.mother_name" name="Mother_Name" class="k-textbox" required placeholder=""/> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="mother_mobile_no">Mother Mobile No.</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="student.mother_mobile_no" class="k-textbox" placeholder="" /> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="guardian_name">Guardian Name</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="student.guardian_name" class="k-textbox" placeholder="" /> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="guardian_mobile_no">Guardian Mobile No.</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="student.guardian_mobile_no" class="k-textbox" placeholder="" /> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="present_address">Present Address</label>
                         <div class="col-md-6">
                             <textarea name="present_address" ng-model="student.present_address" class="k-textbox" required placeholder=""></textarea>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="permanent_address">Permanent Address</label>
                         <div class="col-md-6">
                             <textarea ng-model="student.permanent_address" class="k-textbox" placeholder=""></textarea>
                         </div>
                     </div>
                 </fieldset>
             </div>
             <div class="form-horizontal form-widgets col-lg-6">
                 <fieldset>
                     <legend>Academic Information</legend>
                     <div class="form-group">
                         <label class="control-label col-sm-4">
                             <input type="radio" value="1" ng-model="student.residential_status" required name="residential_status"> <i></i>
                             Residential
                         </label>
                         <label class="control-label col-sm-4">
                             <input type="radio" value="2" ng-model="student.residential_status" required name="residential_status">
                             Non-Residential
                         </label>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="class_id">Class</label>
                         <div class="col-md-6">
                             <input type="text" id="class_id" ng-model="student.class_id" name="Class" class="k-textbox" required placeholder=""/> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="roll_no">Roll No</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="student.roll_no" name="Roll_No" class="k-textbox" required placeholder=""/> 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="status">Student Status</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="student.status" class="k-textbox" placeholder="" /> 
                         </div>
                     </div>
                 </fieldset>
             </div>
             <div class="form-horizontal form-widgets col-lg-6">
                 <fieldset>
                     <legend>Fees & Concession</legend>
                     <table class="table table-hover table-bordered">
                         <tr>
                             <th>Particular</th>
                             <th>Amount</th>
                         </tr>
                         <tr>
                             <td>Test</td>
                             <td>152</td>
                         </tr>
                         <tr>
                             <td> <strong>Total</strong>
                             </td>
                             <td>152</td>
                         </tr>
                     </table>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="concession_description">Concession Description</label>
                         <div class="col-md-6">
                             <textarea ng-model="student.concession_description" class="k-textbox" placeholder=""></textarea>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-4"for="concession_amount">Concession Amount</label>
                         <div class="col-md-6">
                             <input type="text" ng-model="student.concession_amount" class="k-textbox" placeholder="" /> 
                         </div>
                     </div>
                 </fieldset>
             </div>
            <input class="btn btn-success" type="submit" value="Save Student" /> 
            <a href="#/student" class="btn btn-danger">Cancel</a> 
         </div>

     </form>
 </div>

 
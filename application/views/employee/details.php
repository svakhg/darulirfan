<script src="static/appScript/employee/EmployeeDetailsCtrl.js"></script>
<div ng-controller = "EmployeeDetailsCtrl">
    <div class="row-border">
        <h1>
        <span ng-bind="employee.emp_name"></span>
            ,
            <span  ng-bind="employee.emp_id"></span>
        </h1>
        <div class="col-md-4">
            <h5>
                <strong>Designation:</strong>
                <span  ng-bind="designation_name()"></span>
            </h5>
            <h5>
                <strong>Contact No.:</strong>
                <span  ng-bind="employee.contact_no"></span>
            </h5>
            <h5>
                <strong>Gender:</strong>
                <span  ng-bind="employee.gender"></span>
            </h5>
            <h5>
                <strong>Status:</strong>
                <span  ng-bind="employee.status"></span>
            </h5>
            <h5>
                <strong>Residential:</strong>
                <span  ng-bind="employee.residential_status"></span>
            </h5>
        </div>
        <div class="col-md-4">
            <h5>
                <strong>Father:</strong>
                <span  ng-bind="employee.father_name"></span>
                
            </h5>
            <h5>
                <strong>Mother:</strong>
                <span  ng-bind="employee.mother_name"></span>
               
            </h5>
            <h5>
                <strong>Remarks:</strong>
                <span  ng-bind="employee.remarks"></span>
            </h5>
        </div>
        <div class="col-md-4">
            <h5>
                <strong>Present Address:</strong>
                <span ng-bind="employee.present_address"></span>
            </h5>
            <h5>
                <strong>Permanent Address:</strong>
                <span ng-bind="employee.permanent_address"></span>
            </h5>
            <h5>
                <strong>Salary Amount:</strong>
                <span  ng-bind="employee.salary_amount"></span>
            </h5>
             <h5>
                <strong>Join Date:</strong>
                <span  ng-bind="employee.created_date"></span>
            </h5>

        </div>
    </div>
    <table class="table table-hover table-bordered">
                  <thead>
                         <tr>
                                 <th>S.N</th>
                                 <th></th>
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


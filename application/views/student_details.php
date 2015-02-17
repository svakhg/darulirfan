<script src="static/appScript/StudentDetailsCtrl.js"></script>
<div ng-controller = "StudentDetailsCtrl">
    <div class="row-border">
        <h1> <span ng-bind="student.std_name"></span>, <span  ng-bind="student.std_id"></span></h1>
        <div class="col-md-4">
            <h5><strong>Class: </strong><span  ng-bind="student.class_id"></span><h5>
                <h5><strong>Roll No: </strong><span  ng-bind="student.roll_no"></span><h5>
                <h5><strong>Gender: </strong><span  ng-bind="student.gender"></span><h5>
                <h5><strong>Status: </strong><span  ng-bind="student.status"></span><h5>
                <h5><strong>Residential: </strong><span  ng-bind="student.residential_status"></span><h5>
        </div>
        <div class="col-md-4">
            <h5><strong>Father: </strong><span  ng-bind="student.father_name"></span>, <span  ng-bind="student.father_mobile_no"></span><h5>
                <h5><strong>Mother: </strong><span  ng-bind="student.mother_name"></span>, <span  ng-bind="student.mother_mobile_no"></span><h5>
                <h5><strong>Guardian: </strong><span  ng-bind="student.guardian_name"></span>, <span  ng-bind="student.guardian_mobile_no"></span><h5>
        </div>
        <div class="col-md-4">
            <h5><strong>Present Address: </strong><span ng-bind="student.present_address"></span></h5>
            <h5><strong>Permanent Address: </strong><span ng-bind="student.permanent_address"></span></h5>

        </div>
    <div class="row well-large">
        <table id= "table" class="table table-bordered table-hover table-condensed table-striped">
            <thead>
            <tr>
           <th class="text-center" colspan="7">
             Fees Report
            </tr>
                <tr>
                <th>
                  <input type="checkbox" ng-model="areAllPeopleSelected"
                         ng-change="updatePeopleSelection(fees, areAllPeopleSelected)" />
                </th>
                <th>S.N</th>
                <th>Fee Category</th>
                <th >Amount</th>
                <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="data in fees">
                <td><input type="checkbox" ng-model="data.isSelected" /></td>
                <td>{{ $index + 1 }}</td>
                <td>{{ data.name }}</td>
                <td>{{ data.amount }}</td>
                <td>{{ data.created }}</td>
                </tr>
                <tr>
                <td></td>
                <td></td>
                    <td><strong>Total Amount</strong></td>
                    <td><strong>{{ total.amount }}</strong></td>
                     <h4>{{fees | sumOfValue:'amount'}}</h4>
                </tr>
            </tbody>
        </table>
        <!-- <button ng-click="btnPayFees()" type="button">Pay Fees</button> -->
        <a ng-click="btnPayFees()" href="#/student/pay_fees/{{ student_id }}" class="btn btn-large btn-primary">Pay Fees</a>
        <a href="#/student" class="btn btn-danger">Cancel</a> 
    </div>
</div>

<script src="static/appScript/StudentDetailsCtrl.js"></script>
<div class="well clearfix" ng-controller = "StudentDetailsCtrl">
    <div class="">
        <h1>
            <span ng-bind="student.std_name"></span>
            ,
            <span  ng-bind="student.std_id"></span>
        </h1>
        <div class="col-md-4 col-sm-6">
            <h5> <strong>Class:</strong>
                <span  ng-bind="student.class_id"></span>
            </h5>
            <h5> <strong>Roll No:</strong>
                <span  ng-bind="student.roll_no"></span>
            </h5>
            <h5>
                <strong>Gender:</strong>
                <span  ng-bind="student.gender"></span>
            </h5>
            <h5>
                <strong>Status:</strong>
                <span  ng-bind="student.status"></span>
            </h5>
            <h5>
                <strong>Residential:</strong>
                <span  ng-bind="student.residential_status"></span>
            </h5></div>
        <div class="col-md-4 col-sm-6">
            <h5>
                <strong>Father:</strong>
                <span  ng-bind="student.father_name"></span>
                ,
                <span  ng-bind="student.father_mobile_no"></span>
            </h5>
            <h5>
                <strong>Mother:</strong>
                <span  ng-bind="student.mother_name"></span>
                ,
                <span  ng-bind="student.mother_mobile_no"></span>
            </h5>
            <h5>
                <strong>Guardian:</strong>
                <span  ng-bind="student.guardian_name"></span>
                ,
                <span  ng-bind="student.guardian_mobile_no"></span>
            </h5>
        </div>
        <div class="col-md-4">
            <h5>
                <strong>Present Address:</strong>
                <span ng-bind="student.present_address"></span>
            </h5>
            <h5>
                <strong>Permanent Address:</strong>
                <span ng-bind="student.permanent_address"></span>
            </h5>

        </div>
        <div class="col-md-12">
            <table class="table table-striped" align="center" >
            <thead>
                <tr>
                                <th class="text-center" colspan="7">Fees Report</tr>
                                <tr>
                    <th>S.N</th>
                    <th>Particular</th>
                    <th>Amount</th>
                    <th style="text-align:right;">Total</th>
                    <th></th>

                </tr>
            </thead>
                <tbody>
                     <tr ng-repeat="item in invoice.items" style="">
                    
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <input ng-model="item.name" placeholder="Description"></td>
                    <!-- <td>
                    <input ng:model="item.qty" value="1" size="4" ng:required ng:validate="integer" placeholder="qty"></td>
                    -->
                    <td>
                        <input ng-model="item.amount" value="0.00" ng-required ng-validate="number" size="6" placeholder="Amount"></td>
                    <td align="right">{{item.amount| currency}}</td>
                    <td style="text-align:right;">
                        <a href ng-hide="printMode" ng-click="removeItem(item)" class="btn btn-danger">[X]</a>
                    </td>

                </tr>
                <tr ng-hide="printMode">
                    <td colspan="5">
                        <a class="btn btn-primary" href ng-click="addItem()" >Add Fees</a>
                    </td>
                </tr>
                </tbody>
               
                <tr>
                    <td colspan="3" align="right">Sub Total</td>
                    <td align="right">{{invoice_sub_total() | currency}}</td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Discount(TK):</td>
                    <td align="right">
                        <input ng:model="invoice.discount" ng:validate="number" style="width:80px"></td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Grand Total:</td>
                    <td align="right">{{grand_total() | currency}}</td>
                </tr>
            </table>
            <div class="noPrint pull-right">
                <a class="btn btn-primary" ng-show="printMode" ng-click="printInfo()">Print</a>
                <a class="btn btn-primary" ng-click="clearLocalStorage()">Reset</a>
                <a class="btn btn-primary" ng-hide="printMode" ng-click="printMode = true;">Turn On Print Mode</a>
                <a class="btn btn-primary" ng-show="printMode" ng-click="printMode = false;">Turn Off Print Mode</a>
                <a ng-click="btnPayFees(invoice)" class="btn btn-large btn-primary">Pay Fees</a>
                <a href="#/student" class="btn btn-danger">Cancel</a>
            </div>
        </div>
        <!-- <button ng-click="btnPayFees()" type="button">Pay Fees</button>
        -->
    </div>
</div>
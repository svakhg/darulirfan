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
            <h5 class="visible-desktop">
                <strong>Permanent Address:</strong>
                <span ng-bind="student.permanent_address"></span>
            </h5>

        </div>
        <div class="col-md-12">
            <table class="table table-striped" align="center" >
            <thead>
                <tr>
                                <th class="text-center" colspan="7">Payable Fees</tr>
                                <tr>
                    <th>S.N</th>
                    <th>Particular</th>
                    <th>Payable Amount</th>
                    <th>Concession Amount</th>
                    <!-- <th>Amount</th> -->
                    <th>Total</th>
                    <th></th>

                </tr>
            </thead>
                <tbody>
                     <tr ng-repeat="item in invoice.items" style="">
                    
                    <td>{{ $index + 1 }}</td>
                    <td>
                    {{item.name}}
                        <!-- <input ng-model="item.name" placeholder="Description"> -->
                        </td>
                         <td>
                         {{item.payable_amount}}
                    <!-- <input ng:model="item.payable_amount" value="1" size="4" ng:required ng:validate="integer" placeholder="payable_amount"> -->
                    </td>
                    <td>
                    <input ng:model="item.concession_amount" value="1" size="4" ng:required ng:validate="integer" placeholder="concession_amount">
                    </td>
                    <td>{{item.payable_amount - item.concession_amount}}</td>
                    <td style="text-align:right;">
                        <a href ng-hide="printMode" ng-click="removeItem(item)" class="visible-desktop btn btn-danger">[X]</a>
                    </td>

                </tr>
                <tr ng-hide="printMode">
                <td>
                    <strong>Total</strong> 
                </td>
                   <!--  <td colspan="1">
                        <a class="btn btn-primary" href ng-click="addItem()" >Add Fees</a>
                    </td> -->
                    <td>
                        
                    </td>
                    <td>
                       {{payable_amount_total()}} /= 
                    </td>
                    <td>
                        {{concession_amount_total()}} /=
                    </td>

                    <td>
                        {{grand_total()}} /=
                    </td>
                </tr>
                </tbody>
               
                <tr>
                    <td colspan="4" align="right">Sub Total(TK):</td>
                    <td align="right">{{payable_amount_total()}} /=</td>
                </tr>
                <tr>
                    <td colspan="4" align="right">Total Discount(TK):</td>
                    <td align="right">
                        {{concession_amount_total()}} /=</td>
                </tr>
                <tr>
                    <td colspan="4" align="right">Grand Total(TK):</td>
                    <td align="right"><strong>{{grand_total()}} /=</strong></td>
                </tr>
            </table>
            <div class="visible-desktop pull-right">
                <!-- <a class="btn btn-primary" ng-show="printMode" ng-click="printInfo()">Print</a>
                <a class="btn btn-primary" ng-click="clearLocalStorage()">Reset</a>
                <a class="btn btn-primary" ng-hide="printMode" ng-click="printMode = true;">Turn On Print Mode</a>
                 <a class="btn btn-primary" ng-show="printMode" ng-click="printMode = false;">Turn Off Print Mode</a>
                -->
                <a ng-click="btnPayFees(invoice)" class="btn btn-large btn-primary">Pay Fees</a>
                <a href="#/student" class="btn btn-danger">Cancel</a>
            </div>
        </div>
        <!-- <button ng-click="btnPayFees()" type="button">Pay Fees</button>
        -->
    </div>
</div>
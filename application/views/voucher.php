<script src="static/appScript/VoucherCtrl.js"></script>

<div class="container" ng-controller="VoucherCtrl">
    <div id="tickets">

        <form kendo-validator="validator" ng-submit="saveVoucher(voucher)" class="k-content">
            <h3>Create New Voucher</h3>
            <ul>
                <li class="status {{ validationClass}}">{{ validationMessage}}</li>
                <li>
                    <label for="voucher_type" class="required">Voucher Type</label>
                    <!-- <input id="voucher_type" ng-model = "voucher.voucher_type" style="width: 200px" /> 
                    -->
                    <input ng-model = "voucher.voucher_type" id="voucher_type" name="voucher_type" required style="width: 200px;" /> 
                    <span class="k-invalid-msg" data-for="voucher_type"></span>
                </li>
                <li>
                    <label for="acc_group_id" class="required">Account Group</label>
                    <input ng-model = "voucher.acc_group_id" name="acc_group_id" id="acc_group_id" name="Account Group" required style="width: 200px" /> 
                    <span class="k-invalid-msg" data-for="acc_group_id"></span>
                </li>
                <li>
                    <label for="ledger_id" class="required">Account Ledger</label>
                    <input ng-model = "voucher.ledger_id" name="ledger_id" id="ledger_id" name="Account Ledger" required style="width: 200px" /> 
                    <span class="k-invalid-msg" data-for="ledger_id"></span>
                </li>
                <li>
                    <label for="description">Description</label>
                    <textarea name="description" ng-model = "voucher.description" class="k-textbox" required style="width: 200px"></textarea>
                    <!-- <textarea  kendo-textarea style="width: 200px"></textarea>
                    -->
                    <span class="k-invalid-msg" data-for="description"></span>
                </li>
                <li>
                    <label for="amount">Amount</label>
                    <input ng-model = "voucher.amount" id="amount" kendo-numerictextbox name="Amount" type="text" min="1" value="0" required data-max-msg="Enter Amount" style="width: 200px;" /> 
                    <span class="k-invalid-msg" data-for="Amount"></span>
                </li>
                <!-- 
               <li  class="accept"> 
                <input type="checkbox" name="Accept" required validationMessage="Acceptance is required" /> 
                I accept the terms of service
            </li>
                -->
                <li>
                    <button class="btn btn-large btn-success" type="submit">Save Voucher</button>
                    <a ng-click = "cancelVoucher()" class="btn btn-large btn-danger">Cancel Voucher</a>
                </li>
            </ul>
        </form>
    </div>
</div>


 <div class="container" ng-controller="VoucherCtrl">
   <div id="tickets">

       <form kendo-validator="validator" ng-submit="saveVoucher(voucher)" class="k-content">
           <h3>Create New Voucher</h3>
           <div class="text-center">
               <div class="status {{ validationClass }}">{{ validationMessage }}</div>
               <div class="form-group">
                   <label for="voucher_type" class="required">Voucher Type</label>
                   <input ng-model = "voucher.voucher_type" id="voucher_type" name="voucher_type" required style="width: 200px;" /> 
                   <span class="k-invalid-msg" data-for="voucher_type"></span>
               </div>
               <div class="form-group">
                   <label for="acc_group_id" class="required">Account Group</label>
                   <input ng-model = "voucher.acc_group_id" name="acc_group_id" id="acc_group_id" name="Account Group" required style="width: 200px" /> 
                   <span class="k-invalid-msg" data-for="acc_group_id"></span>
                </div>
           </div>
           <table class="table">
               <thead>
                   <tr><td>S.N.</td>
                       <td>Account Ledger</td>
                       <td>Description</td>
                       <td>Amount</td>
                   </tr>
               </thead>
               <tbody>
                <tr ng-repeat="item in invoice" style="">
                    
                    <td>{{ $index + 1 }}</td>
                    <td>
                    <select id="ledger_id" kendo-drop-down-list="designationDropdown" ng-model="item.ledger_id"
                          k-data-text-field="'name'"
                          k-data-value-field="'id'"
                          k-cascade-from="'acc_group_id'"
                          k-option-label="'Please select'"
                          k-data-source="designationDataSource">
                      </select>

<!-- cascadeFrom: "acc_group_id", -->
                       <!-- <input ng-model = "item.ledger_id" name="ledger_id" id="ledger_id" name="Account Ledger" required style="width: 200px" />  -->

                        <!-- <input ng-model="item.name" placeholder="Description"></td> -->
                        <td>
                           <textarea name="description" ng-model = "item.description" class="k-textbox" required style="width: 200px"></textarea>
                            
                        </td>
                    <td>
                     <input ng-model = "item.amount" id="amount" kendo-numerictextbox name="Amount" type="text" min="1" value="0" required data-max-msg="Enter Amount" style="width: 200px;" /> 

                        <!-- <input ng-model="item.amount" value="0.00" ng-required ng-validate="number" size="6" placeholder="Amount"></td>
                    <td align="right">{{item.amount| currency}} -->

                    </td>
                    <td style="text-align:right;">
                        <a href ng-hide="printMode" ng-click="removeItem(item)" class="btn btn-danger">[X]</a>
                    </td>

                </tr>
                <tr ng-hide="printMode">
                    <td colspan="5">
                        <a class="btn btn-primary" href ng-click="addItem()" >Add Fees</a>
                    </td>
                </tr>

                  <!--  <tr>
                       <td>
                           <span class="k-invalid-msg" data-for="ledger_id"></span>


                           </td>
                           <td>
                               <span class="k-invalid-msg" data-for="description"></span>
                           </td>
                               <span class="k-invalid-msg" data-for="Amount"></span></td>
                           </tr> -->
                       </tbody>
                   </table>

                   <button class="btn btn-large btn-success" type="submit">Save Voucher</button>
                   <a ng-click = "cancelVoucher()" class="btn btn-large btn-danger">Cancel Voucher</a>

               </form>
           </div>
       </div>

</div>
<script src="static/appScript/VoucherCtrl.js"></script>

<div class="container" ng-controller="VoucherCtrl">
    <div id="tickets">

        <form kendo-validator="validator" ng-submit="saveVoucher(voucher)" class="k-content">
            <h3>Create New Voucher</h3>
            <hr>

            <div class="pull-left">
                <div class="status {{ validationClass }}">{{ validationMessage }}</div>
                <div class="form-group">
                    <label for="voucher_type" class="required">Voucher Type : </label>
                    <input ng-model="voucher.voucher_type" id="voucher_type" name="voucher_type" required
                           style="width: 200px;"/>
                    <span class="k-invalid-msg" data-for="voucher_type"></span>
                </div>
                <div class="form-group">
                    <label for="acc_group_id" class="required">Account Group : </label>
                    <input ng-model="voucher.acc_group_id" name="acc_group_id" id="acc_group_id" name="Account Group"
                           required style="width: 200px"/>
                    <span class="k-invalid-msg" data-for="acc_group_id"></span>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <td>S.N.</td>
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
                    <td>
                        <textarea name="description" ng-model="item.description" class="k-textbox" required
                                  style="width: 200px"></textarea>

                    </td>
                    <td>
                        <input ng-model="item.amount" id="amount" kendo-numerictextbox name="Amount" type="text" min="1"
                               value="0" required data-max-msg="Enter Amount" style="width: 200px;"/>

                    </td>
                    <td style="text-align:right;">
                        <a href ng-hide="printMode" ng-click="removeItem(item)" class="btn btn-danger">[X]</a>
                    </td>

                </tr>
                <tr ng-hide="printMode">
                    <td colspan="5">
                        <a class="btn btn-primary" href ng-click="addItem()">[+]</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="pull-right">
                <button class="btn btn-large btn-success" type="submit">Save Voucher</button>
                <a ng-click="cancelVoucher()" class="btn btn-large btn-danger">Cancel Voucher</a>
            </div>
        </form>
    </div>
</div>
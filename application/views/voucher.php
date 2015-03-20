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

<style scoped>
    .k-textbox {
        width: 11.8em;
    }
    /*
        .demo-section {
            width: 800px;
            padding: 0;
        }
        
        #tickets {
            width: 800px;
            background-color: #3f51b5;
        }
    */
    #tickets form {
        padding: 30px;
        margin-left: 150px;
    }
    #tickets h3 {
        font-weight: normal;
        font-size: 1.4em;
        margin: 0;
        padding: 0 0 20px;
    }

    #tickets ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    #tickets li {
        margin: 5px 0;
    }

    label {
        display: inline-block;
        width: 150px;
        text-align: right;
        padding-right: 10px;
    }

    .required {
        font-weight: bold;
    }

    .accept, .status {
        padding-left: 90px;
    }
    .confirm {
        text-align: left;
    }

    .valid {
        color: green;
    }

    .invalid {
        color: red;
    }
    span.k-tooltip {
        margin-left: 6px;
    }
</style>
</div>
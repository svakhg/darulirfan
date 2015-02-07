 <script src="static/appScript/VoucherCtrl.js"></script>

<div class="container" ng-controller="VoucherCtrl">
<div id="tickets">
    <form kendo-validator="validator" ng-submit="saveVoucher(voucher)" class="k-content">
        <h3>Create New Voucher</h3>
        <ul>
        <li class="status {{ validationClass }}">{{ validationMessage }} </li>
            <li>
                <label for="voucher_type" class="required">Voucher Type</label>
                <select kendo-drop-down-list ng-model = "voucher.voucher_type"
                    id="voucher_type" name="voucher_type" required validationMessage="Select Voucher Type"
                    k-data-text-field="'name'"
                    k-data-value-field="'id'"
                    k-option-label='"--Select Voucher Type--"'
                    k-data-source="VoucherTypeDataSource"
                    style="width: 200px"></select>
                <span class="k-invalid-msg" data-for="voucher_type"></span>
            </li>
            <li>
                <label for="ledger_id" class="required">Account Ledger</label>
                <select kendo-drop-down-list ng-model = "voucher.ledger_id"
                    id="ledger_id" name="ledger_id" required validationMessage="Select Account Ledger"
                    k-data-source="AccLedgerDataSource"
                    k-options="LedgerOptions"
                    style="width: 200px"></select>
                <span class="k-invalid-msg" data-for="ledger_id"></span>
            </li>
            <li>
                <label for="description">Description</label>
                <textarea ng-model = "voucher.description" class="k-textbox" style="width: 200px"></textarea>
                <!-- <textarea  kendo-textarea style="width: 200px"></textarea> -->
                <span class="k-invalid-msg" data-for="description"></span>
            </li>
            <li>
                <label for="amount">Amount</label>
                <input ng-model = "voucher.amount" id="amount" kendo-numerictextbox name="Amount" type="text" min="1" max="100" value="0" required data-max-msg="Enter Amount" style="width: 200px;" />
                <span class="k-invalid-msg" data-for="Amount"></span>
            </li>
            <!-- 
            <li  class="accept">
                <input type="checkbox" name="Accept" required validationMessage="Acceptance is required" /> I accept the terms of service
            </li> -->
            <li class="btn-group pull-right">
                <button class="btn btn-success" type="submit">Save Voucher</button>
                <button class="btn btn-danger" type="button">Cancel Voucher</button>
            </li>
    
            
        </ul>
    </form>
</div>
</div>

    <style scoped>
    .k-textbox {
        width: 11.8em;
    }

    .demo-section {
        width: 800px;
        padding: 0;
    }
    
    #tickets {
        width: 800px;
        background-color: #3f51b5;
    }
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
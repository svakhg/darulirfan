<script src="static/appScript/Cash_PaymentCtrl.js"></script>

<!--<div ng-controller="Cash_PaymentCtrl">
    <form ng-submit="save(cp, response)" class="k-content smart-form form-signin">
        <div class="row" >
            <div class="col col-md-7">
                <header class="form-signin-heading">CASH Payment</header>
                <div class="col-md-8">								
                    <fieldset>
                        <section class="col-md-10">
                            <input type="text" id="acc_group" ng-model="cp.acc_group" name="acc_group" class="k-textbox" placeholder="Account Group" required validationMessage="Enter {0}"/>
                        </section>

                        <section class="col-md-10">
                            <input type="text" id="acc_ledger" ng-model="cp.acc_ledger" name="acc_ledger" class="k-textbox" placeholder="Account Ledger" required validationMessage="Enter {0}"/>
                        </section>

                        <section class="col-md-10">
                            <input type="text" id="supplier" ng-model="cp.supplier" name="supplier" class="k-textbox" placeholder="Supplier" required validationMessage="Enter {0}"/>
                        </section>

                        <section class="col-md-10">
                            <textarea id="description" name="description" ng-model="cp.description" class="k-textbox" placeholder="Description"/> </textarea>
                        </section>

                        <section>
                            <input type="text" id="amount" ng-model="cp.amount" name="amount" class="k-textbox" placeholder="Amount" required validationMessage="Enter {0}"/>
                        </section>
                    </fieldset>
                </div><input type="submit" name="save" class="btn btn-success" value="Save"/>
            </div><input type="button" name="cancel" class="btn btn-danger" value="Cancel"/>
        </div>
</form>
</div>-->
<div class="container" ng-controller="Cash_PaymentCtrl">

    <form class="form-horizontal" ng-submit="save(cp, response)">
        <fieldset>

            <!-- Form Name -->
            <legend>Cash Payment</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="branch">Branch</label>  
                <div class="col-md-5">
                    <input ng-model="cp.branch" id="branch" name="branch" type="text" placeholder="Branch" class="form-control input-md">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="acc-group">Account Group</label>
                <div class="col-md-5">
                    <select ng-model="cp.acc_group" id="acc-group" name="acc-group" class="form-control">
                        <option value="1">Student Fees</option>
                        <option value="2">Donation</option>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="acc-ledger">Account Ledger</label>
                <div class="col-md-5">
                    <select ng-model="cp.acc_ledger" id="acc-ledger" name="acc-ledger" class="form-control">
                        <option value="1">Monthly Fee</option>
                        <option value="2">Tuition Fee</option>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="employee">Employee</label>  
                <div class="col-md-5">
                    <input ng-model="cp.employee" id="employee" name="employee" type="text" placeholder="Employee" class="form-control input-md">
                </div>
            </div>

<!--            <h3>Select2 theme</h3>
            <p>Selected: {{person.selected}}</p>
            <ui-select ng-model="person.selected" theme="select2" ng-disabled="disabled" style="min-width: 300px;">
                <ui-select-match placeholder="Select a person in the list or search his name/age...">{{$select.selected.name}}</ui-select-match>
                <ui-select-choices repeat="person in people | propsFilter: {name: $select.search, age: $select.search}">
                    <div ng-bind-html="person.name | highlight: $select.search"></div>
                    <small>
                        email: {{person.email}}
                        age: <span ng-bind-html="''+person.age | highlight: $select.search"></span>
                    </small>
                </ui-select-choices>
            </ui-select>-->

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="description">Description</label>  
                <div class="col-md-5">
                    <input ng-model="cp.description" id="description" name="description" type="text" placeholder="Description" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="totalamount">Total Amount</label>  
                <div class="col-md-5">
                    <input ng-model="cp.totalamount" id="totalamount" name="totalamount" type="text" placeholder="Total Amount" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="paidamount">Paid Amount</label>  
                <div class="col-md-5">
                    <input ng-model="cp.paidamount" id="paidamount" name="paidamount" type="text" placeholder="Paid Amount" class="form-control input-md">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="paytype">Pay Type</label>
                <div class="col-md-5">
                    <select ng-model="cp.paytype" id="paytype" name="paytype" class="form-control">
                        <option value="1">Cash</option>
                        <option value="2">Cheque</option>
                    </select>
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="save"></label>
                <div class="col-md-8">
                    <input type="submit" id="save" value="Save" class="btn btn-success"/>
                    <input type="button" id="cancel" value="Cancel" class="btn btn-danger"/>
                </div>
            </div>

        </fieldset>
    </form>
</div>


<div class="container" ng-controller="Cash_ReceiptCtrl">

    <form class="form-horizontal" ng-submit="save(cr, response)">
        <fieldset>

            <!-- Form Name -->
            <legend>Cash Receipt</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="branch">Branch</label>  
                <div class="col-md-5">
                    <input ng-model="cr.branch" id="branch" name="branch" type="text" placeholder="Branch" class="form-control input-md">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="acc-group">Account Group</label>
                <div class="col-md-5">
                    <select ng-model="cr.acc_group" id="acc-group" name="acc-group" class="form-control">
                        <option value="1">Student Fees</option>
                        <option value="2">Donation</option>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="acc-ledger">Account Ledger</label>
                <div class="col-md-5">
                    <select ng-model="cr.acc_ledger" id="acc-ledger" name="acc-ledger" class="form-control">
                        <option value="1">Monthly Fee</option>
                        <option value="2">Tuition Fee</option>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="employee">Customer</label>  
                <div class="col-md-5">
                    <input ng-model="cr.customer" id="customer" name="customer" type="text" placeholder="Customer" class="form-control input-md">
                </div>
            </div>

<!--            <h3>Select2 theme</h3>
            <p>Selected: {{person.selected}}</p>
            <ui-select ng-model="person.selected" theme="select2" ng-disabled="disabled" style="min-width: 300px;">
                <ui-select-match placeholder="Select a person in the list or search his name/age...">{{$select.selected.name}}</ui-select-match>
                <ui-select-choices repeat="person in people | propsFilter: {name: $select.search, age: $select.search}">
                    <div ng-bind-html="person.name | highlight: $select.search"></div>
                    <small>
                        email: {{person.email}}
                        age: <span ng-bind-html="''+person.age | highlight: $select.search"></span>
                    </small>
                </ui-select-choices>
            </ui-select>-->

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="description">Description</label>  
                <div class="col-md-5">
                    <input ng-model="cr.description" id="description" name="description" type="text" placeholder="Description" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="totalamount">Total Amount</label>  
                <div class="col-md-5">
                    <input ng-model="cr.totalamount" id="totalamount" name="totalamount" type="text" placeholder="Total Amount" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="paidamount">Paid Amount</label>  
                <div class="col-md-5">
                    <input ng-model="cr.paidamount" id="paidamount" name="paidamount" type="text" placeholder="Paid Amount" class="form-control input-md">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="paytype">Pay Type</label>
                <div class="col-md-5">
                    <select ng-model="cr.paytype" id="paytype" name="paytype" class="form-control">
                        <option value="1">Cash</option>
                        <option value="2">Cheque</option>
                    </select>
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="save"></label>
                <div class="col-md-8">
                    <input type="submit" id="save" value="Save" class="btn btn-success"/>
                    <input type="button" id="cancel" value="Cancel" class="btn btn-danger"/>
                </div>
            </div>

        </fieldset>
    </form>
</div>
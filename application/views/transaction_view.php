<script src="static/appScript/transactionCtrl.js"></script>
<script>function getAuth(){ <?php echo $fx ?>;}</script>
<?php if ($read): ?>
<div ng-controller="transactionCtrl">

<div ng-show="fgShowHide" class="btn-toolbar">
	<div class="btn-group">
	 <button type="button" ng-show="auth.insert" ng-click="showForm()" class="btn btn-success" ><i class="icon-plus icon-white"></i><b> Add Item</b></button>
	  <button type="button" ng-click="openSearchDialog()"  class="btn btn-inverse" ng-click="getMysqlScript()"><i class="icon-search icon-white"></i><b> Quick Search	</b> </button>
	</div>
</div>
<div ng-show="fgShowHide" class="gridStyle" ng-grid="gridOptions"></div>
<div ng-show="!fgShowHide" style="display:none">
	<form name="myForm" class="form-horizontal well">
	   <fieldset>  
          <legend>transaction</legend>  
		  <div class="control-group" ng-class="{error: myForm.payment_type.$invalid}">
		<label class="control-label" for="payment_type">payment_type</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in payment_typeList"  name="payment_type" id="payment_type" ng-model="item.payment_type" required ></select>
		  <span ng-show="myForm.payment_type.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.status.$invalid}">
		<label class="control-label" for="status">status</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in statusList"  name="status" id="status" ng-model="item.status" required ></select>
		  <span ng-show="myForm.status.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
<div class="control-group" ><label class="control-label" for="description">description</label>
		<div class="controls">
		  <textarea class="input-xxlarge"  name="description" id="description" ng-model="item.description" ></textarea>		  
		</div></div>
 <div class="control-group" ng-class="{error: myForm.approval.$invalid}">
		<label class="control-label" for="approval">approval</label>
		<div class="controls">
		  <input type="number" name="approval" id="approval" ng-model="item.approval" required />
		  <span ng-show="myForm.approval.$error.required" class="help-inline">Required</span>
		  <span ng-show="myForm.approval.$error.number" class="help-inline">Not a valid number</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.voucher_name.$invalid}">
		<label class="control-label" for="voucher_name">voucher_name</label>
		<div class="controls">
		  <input type="number" name="voucher_name" id="voucher_name" ng-model="item.voucher_name" required />
		  <span ng-show="myForm.voucher_name.$error.required" class="help-inline">Required</span>
		  <span ng-show="myForm.voucher_name.$error.number" class="help-inline">Not a valid number</span>
		</div>
	  </div>
	
		  <div class="form-actions">
			<button ng-click="saveItem()" ng-disabled="myForm.$invalid" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			 <button class="btn btn-warning cancel" ng-click="hideForm()"><i class="icon-close icon-white"></i>Cancel</button>		
		  </div>
	  </fieldset>
	</form>
</div>
<div modal="searchDialog"  options="opts">
        <div class="modal-header">
		 <a class="close" ng-click="closeSearchDialog()" data-dismiss="modal">&times;</a>
            <h3>transaction</h3>
        </div>
        <div class="modal-body">
           <form name="myForm" class="form-horizontal">
  			 <div class="control-group" ><label class="control-label" for="payment_type">payment_type</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in payment_typeList"   ng-model="search.payment_type" ></select>		  
		</div></div>
<div class="control-group" ><label class="control-label" for="status">status</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in statusList"   ng-model="search.status" ></select>		  
		</div></div>
<div class="control-group" ><label class="control-label" for="create_date">create_date</label>
		<div class="controls">
		  <input  datepicker-popup="dd/MM/yyyy" type="date"  ng-model="search.create_date" />		  
		</div></div>
<div class="control-group" >
			<label class="control-label" for="user_id">user_id</label>
		<div class="controls">
		  <input type="number" ng-model="item.user_id" />
			
		</div></div>
<div class="control-group" >
			<label class="control-label" for="customer_id">customer_id</label>
		<div class="controls">
		  <input type="number" ng-model="item.customer_id" />
			
		</div></div>
<div class="control-group" >
			<label class="control-label" for="cr_amount">cr_amount</label>
		<div class="controls">
		  <input type="number" ng-model="item.cr_amount" />
			
		</div></div>
<div class="control-group" >
			<label class="control-label" for="dr_amount">dr_amount</label>
		<div class="controls">
		  <input type="number" ng-model="item.dr_amount" />
			
		</div></div>
<div class="control-group" >
			<label class="control-label" for="acc_to">acc_to</label>
		<div class="controls">
		  <input type="number" ng-model="item.acc_to" />
			
		</div></div>
<div class="control-group" >
			<label class="control-label" for="acc_from">acc_from</label>
		<div class="controls">
		  <input type="number" ng-model="item.acc_from" />
			
		</div></div>
<div class="control-group" >
			<label class="control-label" for="approved_by">approved_by</label>
		<div class="controls">
		  <input type="number" ng-model="item.approved_by" />
			
		</div></div>
<div class="control-group" >
			<label class="control-label" for="approval">approval</label>
		<div class="controls">
		  <input type="number" ng-model="item.approval" />
			
		</div></div>
<div class="control-group" >
			<label class="control-label" for="voucher_name">voucher_name</label>
		<div class="controls">
		  <input type="number" ng-model="item.voucher_name" />
			
		</div></div>
<div class="control-group" >
			<label class="control-label" for="total">total</label>
		<div class="controls">
		  <input type="number" ng-model="item.total" />
			
		</div></div>
	   
			</form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-warning cancel" ng-click="closeSearchDialog()"><i class="icon-close icon-white"></i>Cancel</button>
			<button class="btn btn-primary cancel" ng-click="refreshSearch()"><i class="icon-refresh icon-white"></i> Refresh</button>
			 <button class="btn btn-primary cancel" ng-click="doSearch()"><i class="icon-search icon-white"></i> Search</button>
        </div>
</div>
<?php else: ?>
<p> Not permitted</p>
<?php endif; ?>

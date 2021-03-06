<script src="static/appScript/acc-ledgerCtrl.js"></script>
<script>function getAuth(){ <?php echo $fx ?>;}</script>
<?php if ($read): ?>
<div ng-controller="acc-ledgerCtrl">

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
          <legend>acc-ledger</legend>  
		  <div class="control-group" ng-class="{error: myForm.name.$invalid}">
		<label class="control-label" for="name">name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="name" id="name" ng-model="item.name" required />
		  <span ng-show="myForm.name.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.status.$invalid}">
		<label class="control-label" for="status">status</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in statusList"  name="status" id="status" ng-model="item.status" required ></select>
		  <span ng-show="myForm.status.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.create_date.$invalid}">
		<label class="control-label" for="create_date">create_date</label>
		<div class="controls">
		  <input  datepicker-popup="dd/MM/yyyy" type="date" name="create_date" id="create_date" ng-model="item.create_date" required />
		  <span ng-show="myForm.create_date.$error.required" class="help-inline">Required</span>
		  <span ng-show="myForm.create_date.$error.date" class="help-inline">Not a valid date</span>
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
            <h3>acc-ledger</h3>
        </div>
        <div class="modal-body">
           <form name="myForm" class="form-horizontal">
  			 <div class="control-group" ><label class="control-label" for="name">name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.name" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="status">status</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in statusList"   ng-model="search.status" ></select>		  
		</div></div>
<div class="control-group" ><label class="control-label" for="create_date">create_date</label>
		<div class="controls">
		  <input  datepicker-popup="dd/MM/yyyy" type="date"  ng-model="search.create_date" />		  
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

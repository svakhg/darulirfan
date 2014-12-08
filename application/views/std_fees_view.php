<script src="static/appScript/std_feesCtrl.js"></script>
<script>function getAuth(){ <?php echo $fx ?>;}</script>
<?php if ($read): ?>
<div ng-controller="std_feesCtrl">

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
          <legend>std_fees</legend>  
		  <div class="control-group" ng-class="{error: myForm.std_id.$invalid}">
		<label class="control-label" for="std_id">std_id</label>
		<div class="controls">
		  <select ng-options="s.id as s.std_name for s in studentList"  name="std_id" id="std_id" ng-model="item.std_id" required ></select>
		  <span ng-show="myForm.std_id.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.fees_id.$invalid}">
		<label class="control-label" for="fees_id">fees_id</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in fee_categoryList"  name="fees_id" id="fees_id" ng-model="item.fees_id" required ></select>
		  <span ng-show="myForm.fees_id.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.status.$invalid}">
		<label class="control-label" for="status">status</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in statusList"  name="status" id="status" ng-model="item.status" required ></select>
		  <span ng-show="myForm.status.$error.required" class="help-inline">Required</span>
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
            <h3>std_fees</h3>
        </div>
        <div class="modal-body">
           <form name="myForm" class="form-horizontal">
  			 <div class="control-group" ><label class="control-label" for="std_id">std_id</label>
		<div class="controls">
		  <select ng-options="s.id as s.std_name for s in studentList"   ng-model="search.std_id" ></select>		  
		</div></div>
<div class="control-group" ><label class="control-label" for="fees_id">fees_id</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in fee_categoryList"   ng-model="search.fees_id" ></select>		  
		</div></div>
<div class="control-group" ><label class="control-label" for="status">status</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in statusList"   ng-model="search.status" ></select>		  
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

<script src="static/appScript/FeesCtrl.js"></script>
<script>function getAuth(){ <?php echo $fx ?>;}</script>
<?php if ($read): ?>
<div ng-controller="FeesCtrl">

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
          <legend>Fees</legend>  
		  <div class="control-group" ng-class="{error: myForm.fee_category_id.$invalid}">
		<label class="control-label" for="fee_category_id">fee_category_id</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in fee_categoryList"  name="fee_category_id" id="fee_category_id" ng-model="item.fee_category_id" required ></select>
		  <span ng-show="myForm.fee_category_id.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
<div class="control-group" ><label class="control-label" for="class_id">class_id</label>
		<div class="controls">
		  <select ng-options="s.id as s.class_name for s in classList"  name="class_id" id="class_id" ng-model="item.class_id" ></select>		  
		</div></div>
 <div class="control-group" ng-class="{error: myForm.amount.$invalid}">
		<label class="control-label" for="amount">amount</label>
		<div class="controls">
		  <input type="number" name="amount" id="amount" ng-model="item.amount" required />
		  <span ng-show="myForm.amount.$error.required" class="help-inline">Required</span>
		  <span ng-show="myForm.amount.$error.number" class="help-inline">Not a valid number</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.is_current.$invalid}">
		<label class="control-label" for="is_current">is_current</label>
		<div class="controls">
		  <select ng-options="s.id as s.yesno for s in statusList"  name="is_current" id="is_current" ng-model="item.is_current" required ></select>
		  <span ng-show="myForm.is_current.$error.required" class="help-inline">Required</span>
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
            <h3>Fees</h3>
        </div>
        <div class="modal-body">
           <form name="myForm" class="form-horizontal">
  			 <div class="control-group" ><label class="control-label" for="fee_category_id">fee_category_id</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in fee_categoryList"   ng-model="search.fee_category_id" ></select>		  
		</div></div>
<div class="control-group" ><label class="control-label" for="class_id">class_id</label>
		<div class="controls">
		  <select ng-options="s.id as s.class_name for s in classList"   ng-model="search.class_id" ></select>		  
		</div></div>
<div class="control-group" >
			<label class="control-label" for="amount">amount</label>
		<div class="controls">
		  <input type="number" ng-model="item.amount" />
			
		</div></div>
<div class="control-group" ><label class="control-label" for="is_current">is_current</label>
		<div class="controls">
		  <select ng-options="s.id as s.yesno for s in statusList"   ng-model="search.is_current" ></select>		  
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

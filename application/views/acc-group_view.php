<script src="static/appScript/acc-groupCtrl.js"></script>
<script>function getAuth(){ <?php echo $fx ?>;}</script>
<?php if ($read): ?>
<div ng-controller="acc-groupCtrl">

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
          <legend>acc-group</legend>  
		  <div class="control-group" ng-class="{error: myForm.Group_Name.$invalid}">
		<label class="control-label" for="Group_Name">Group_Name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="Group_Name" id="Group_Name" ng-model="item.Group_Name" required />
		  <span ng-show="myForm.Group_Name.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.Group_Type.$invalid}">
		<label class="control-label" for="Group_Type">Group_Type</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in acc_group_typeList"  name="Group_Type" id="Group_Type" ng-model="item.Group_Type" required ></select>
		  <span ng-show="myForm.Group_Type.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.Group_Status.$invalid}">
		<label class="control-label" for="Group_Status">Group_Status</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in statusList"  name="Group_Status" id="Group_Status" ng-model="item.Group_Status" required ></select>
		  <span ng-show="myForm.Group_Status.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.Left.$invalid}">
		<label class="control-label" for="Left">Left</label>
		<div class="controls">
		  <input type="number" name="Left" id="Left" ng-model="item.Left" required />
		  <span ng-show="myForm.Left.$error.required" class="help-inline">Required</span>
		  <span ng-show="myForm.Left.$error.number" class="help-inline">Not a valid number</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.Right.$invalid}">
		<label class="control-label" for="Right">Right</label>
		<div class="controls">
		  <input type="number" name="Right" id="Right" ng-model="item.Right" required />
		  <span ng-show="myForm.Right.$error.required" class="help-inline">Required</span>
		  <span ng-show="myForm.Right.$error.number" class="help-inline">Not a valid number</span>
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
            <h3>acc-group</h3>
        </div>
        <div class="modal-body">
           <form name="myForm" class="form-horizontal">
  			 <div class="control-group" ><label class="control-label" for="Group_Name">Group_Name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.Group_Name" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="Group_Type">Group_Type</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in acc_group_typeList"   ng-model="search.Group_Type" ></select>		  
		</div></div>
<div class="control-group" ><label class="control-label" for="Group_Status">Group_Status</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in statusList"   ng-model="search.Group_Status" ></select>		  
		</div></div>
<div class="control-group" >
			<label class="control-label" for="Left">Left</label>
		<div class="controls">
		  <input type="number" ng-model="item.Left" />
			
		</div></div>
<div class="control-group" >
			<label class="control-label" for="Right">Right</label>
		<div class="controls">
		  <input type="number" ng-model="item.Right" />
			
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

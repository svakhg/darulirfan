<script src="static/appScript/employeeCtrl.js"></script>
<script>function getAuth(){ <?php echo $fx ?>;}</script>
<?php if ($read): ?>
<div ng-controller="employeeCtrl">

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
          <legend>employee</legend>  
		  <div class="control-group" ng-class="{error: myForm.name.$invalid}">
		<label class="control-label" for="name">name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="name" id="name" ng-model="item.name" required />
		  <span ng-show="myForm.name.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.father_name.$invalid}">
		<label class="control-label" for="father_name">father_name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="father_name" id="father_name" ng-model="item.father_name" required />
		  <span ng-show="myForm.father_name.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.mother_name.$invalid}">
		<label class="control-label" for="mother_name">mother_name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="mother_name" id="mother_name" ng-model="item.mother_name" required />
		  <span ng-show="myForm.mother_name.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.designation.$invalid}">
		<label class="control-label" for="designation">designation</label>
		<div class="controls">
		  <select ng-options="s.id as s.Designation_Name for s in designationList"  name="designation" id="designation" ng-model="item.designation" required ></select>
		  <span ng-show="myForm.designation.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.contact_no.$invalid}">
		<label class="control-label" for="contact_no">contact_no</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="contact_no" id="contact_no" ng-model="item.contact_no" required />
		  <span ng-show="myForm.contact_no.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.address.$invalid}">
		<label class="control-label" for="address">address</label>
		<div class="controls">
		  <textarea class="input-xxlarge"  name="address" id="address" ng-model="item.address" required ></textarea>
		  <span ng-show="myForm.address.$error.required" class="help-inline">Required</span>
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
            <h3>employee</h3>
        </div>
        <div class="modal-body">
           <form name="myForm" class="form-horizontal">
  			 <div class="control-group" ><label class="control-label" for="name">name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.name" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="father_name">father_name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.father_name" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="mother_name">mother_name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.mother_name" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="designation">designation</label>
		<div class="controls">
		  <select ng-options="s.id as s.Designation_Name for s in designationList"   ng-model="search.designation" ></select>		  
		</div></div>
<div class="control-group" ><label class="control-label" for="contact_no">contact_no</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.contact_no" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="address">address</label>
		<div class="controls">
		  <textarea class="input-xlarge"   ng-model="search.address" ></textarea>		  
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

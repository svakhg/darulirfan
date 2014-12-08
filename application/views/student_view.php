<script src="static/appScript/studentCtrl.js"></script>
<script>function getAuth(){ <?php echo $fx ?>;}</script>
<?php if ($read): ?>
<div ng-controller="studentCtrl">

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
          <legend>student</legend>  
		  <div class="control-group" ng-class="{error: myForm.status.$invalid}">
		<label class="control-label" for="status">status</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in statusList"  name="status" id="status" ng-model="item.status" required ></select>
		  <span ng-show="myForm.status.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.std_name.$invalid}">
		<label class="control-label" for="std_name">std_name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="std_name" id="std_name" ng-model="item.std_name" required />
		  <span ng-show="myForm.std_name.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.father_name.$invalid}">
		<label class="control-label" for="father_name">father_name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="father_name" id="father_name" ng-model="item.father_name" required />
		  <span ng-show="myForm.father_name.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
<div class="control-group" ><label class="control-label" for="mother_name">mother_name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="mother_name" id="mother_name" ng-model="item.mother_name" />		  
		</div></div>
 <div class="control-group" ng-class="{error: myForm.class.$invalid}">
		<label class="control-label" for="class">class</label>
		<div class="controls">
		  <select ng-options="s.id as s.class_name for s in classList"  name="class" id="class" ng-model="item.class" required ></select>
		  <span ng-show="myForm.class.$error.required" class="help-inline">Required</span>
		</div>
	  </div>
 <div class="control-group" ng-class="{error: myForm.roll_no.$invalid}">
		<label class="control-label" for="roll_no">roll_no</label>
		<div class="controls">
		  <input type="number" name="roll_no" id="roll_no" ng-model="item.roll_no" required />
		  <span ng-show="myForm.roll_no.$error.required" class="help-inline">Required</span>
		  <span ng-show="myForm.roll_no.$error.number" class="help-inline">Not a valid number</span>
		</div>
	  </div>
<div class="control-group" ><label class="control-label" for="father_mobile_no">father_mobile_no</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="father_mobile_no" id="father_mobile_no" ng-model="item.father_mobile_no" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="mather_mobile_no">mather_mobile_no</label>
		<div class="controls">
		  <input class="input-xlarge" type="text" name="mather_mobile_no" id="mather_mobile_no" ng-model="item.mather_mobile_no" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="address">address</label>
		<div class="controls">
		  <textarea class="input-xxlarge"  name="address" id="address" ng-model="item.address" ></textarea>		  
		</div></div>
	
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
            <h3>student</h3>
        </div>
        <div class="modal-body">
           <form name="myForm" class="form-horizontal">
  			 <div class="control-group" ><label class="control-label" for="status">status</label>
		<div class="controls">
		  <select ng-options="s.id as s.name for s in statusList"   ng-model="search.status" ></select>		  
		</div></div>
<div class="control-group" ><label class="control-label" for="std_name">std_name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.std_name" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="father_name">father_name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.father_name" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="mother_name">mother_name</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.mother_name" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="class">class</label>
		<div class="controls">
		  <select ng-options="s.id as s.class_name for s in classList"   ng-model="search.class" ></select>		  
		</div></div>
<div class="control-group" >
			<label class="control-label" for="roll_no">roll_no</label>
		<div class="controls">
		  <input type="number" ng-model="item.roll_no" />
			
		</div></div>
<div class="control-group" ><label class="control-label" for="father_mobile_no">father_mobile_no</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.father_mobile_no" />		  
		</div></div>
<div class="control-group" ><label class="control-label" for="mather_mobile_no">mather_mobile_no</label>
		<div class="controls">
		  <input class="input-xlarge" type="text"  ng-model="search.mather_mobile_no" />		  
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


function transactionCtrl($scope, $http){	
	$scope.auth=getAuth();
	this.init($scope);	
	
	//Grid,dropdown data loading
	loadGridData($scope.pagingOptions.pageSize,1);
			loadData('get_payment_type_list',{}).success(function(data){$scope.payment_typeList=data;});
		loadData('get_status_list',{}).success(function(data){$scope.statusList=data;});

	
	//CRUD operation
	$scope.saveItem=function(){	
		var record={};
		angular.extend(record,$scope.item);
				record.payment_type_name=undefined;
		record.status_name=undefined;

		loadData('save',record).success(function(data){
			toastr.success(data.msg);
			if(data.success){
				loadGridData($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);
			}			
			$scope.item=null;
		});
	};			
	$scope.editItem=function(row){	
		$scope.item=row.entity;
		$scope.item.approval=Number($scope.item.approval);
		$scope.item.voucher_name=Number($scope.item.voucher_name);
		
		$scope.fgShowHide=false;				
	};
	$scope.deleteItem=function(row){
		if(confirm('Delete sure!')){
			loadData('delete',row.entity).success(function(data){
				toastr.success('Data removed successfully');
				$scope.list.splice($scope.list.indexOf(row.entity), 1);
				$scope.totalItems--;
			});
		}
	};
	
	//pager events
	$scope.$watch('pagingOptions', function (newVal, oldVal) {
		if (newVal !== oldVal && newVal.currentPage !== oldVal.currentPage) {		  
		  loadGridData($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);
		}
		else if (newVal !== oldVal && newVal.pageSize !== oldVal.pageSize) {		  
		  loadGridData($scope.pagingOptions.pageSize, 1);
		}
	}, true);
	
	//search
	$scope.doSearch=function(){
		loadGridData($scope.pagingOptions.pageSize, 1);
	};
	
	//Utility functions
	function isSearch(){
		if(!$scope.search) return false;
		for(var prop in $scope.search){
			if($scope.search.hasOwnProperty(prop) && $scope.search[prop]) return true;
		}
		return false;
	}
	function loadGridData(pageSize, currentPage){
		var action=isSearch()?'get_page_where':'get_page', params={size:pageSize, pageno:(currentPage-1)*pageSize};
		angular.extend( params, $scope.search);
		loadData(action,params).success(function(res){
			$scope.list=res.data;
			$scope.totalItems=res.total
		});
	}
	function loadData(action,data){
		return $http({
			  method: 'POST',
			  url: BASE_URL+'transaction_ctrl/'+action,
			  data: data,
			  headers: {'Content-Type': 'application/x-www-form-urlencoded'}			  
			});		
	}
	function getDate(source){		
		if(typeof source ==='string'){;
			var dt=source.split(' ')[0];
			return new Date(dt);
		}
		return source;
	}
}
 transactionCtrl.prototype.init=function($scope){
	$scope.search=null;
	$scope.item=null;
	$scope.list = null;
	$scope.fgShowHide=true;
	$scope.searchDialog=false;
	$scope.DepartmentList=null;	

	this.configureGrid($scope);	
	this.searchPopup($scope);
 };
transactionCtrl.prototype.configureGrid=function($scope){
	$scope.totalItems = 0;
    $scope.pagingOptions = {
        pageSizes: [10, 20, 30, 50, 100, 500, 1000],
        pageSize: 20,
        currentPage: 1
    };	
	var actionWidth=($scope.auth.update&&$scope.auth['delete'])?130:($scope.auth.update || $scope.auth['delete'])?75:0;
    $scope.gridOptions = { 
        data: 'list',
        columnDefs: [
				{field:'', displayName:'Action', width:actionWidth,	cellTemplate:'<div style="position:relative;top:4px;padding-left:2px"><button ng-show="auth.update"  ng-click="editItem(row)" class="btn btn-primary btn-mini" ><i class="icon-edit icon-white"></i> Edit</button>&nbsp;<button ng-show="auth.delete" ng-click="deleteItem(row)" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i> Delete</button> </div>'
				}
								,{field: 'payment_type_name', displayName: 'payment_type'}
				,{field: 'status_name', displayName: 'status'}
				,{field: 'create_date', displayName: 'create_date', cellFilter: "date:'dd/MM/yyyy'"}
				,{field: 'user_id', displayName: 'user_id'}
				,{field: 'customer_id', displayName: 'customer_id'}
				,{field: 'cr_amount', displayName: 'cr_amount'}
				,{field: 'dr_amount', displayName: 'dr_amount'}
				,{field: 'acc_to', displayName: 'acc_to'}
				,{field: 'acc_from', displayName: 'acc_from'}
				,{field: 'description', displayName: 'description'}
				,{field: 'approved_by', displayName: 'approved_by'}
				,{field: 'approval', displayName: 'approval'}
				,{field: 'voucher_name', displayName: 'voucher_name'}
				,{field: 'total', displayName: 'total'}

			],
		enableRowSelection:false,
		enableCellSelection:true, 
		//enablePinning: true,
		enablePaging: true,
		showFooter: true,
		totalServerItems: 'totalItems',
		pagingOptions: $scope.pagingOptions
	};
};
transactionCtrl.prototype.searchPopup=function($scope){
	$scope.showForm=function(){$scope.fgShowHide=false; $scope.item={}; $scope.item.create_date=null; };
	$scope.hideForm=function(){$scope.fgShowHide=true;};
	$scope.openSearchDialog=function(){		
		$scope.searchDialog=true;
	};
	$scope.closeSearchDialog=function(){		
		$scope.searchDialog=false;
	};	
	$scope.refreshSearch=function(){$scope.search=null;};
	
};
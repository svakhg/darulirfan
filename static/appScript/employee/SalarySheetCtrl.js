
function SalarySheetCtrl($scope, $http, $timeout, progressbar){
    $scope.edititng_enable = false; 
    $scope.show_salary_sheet_div = false; 
    $scope.show_approved_btn = false;
    $scope.show = false;

    progressbar.start();
        $timeout(function(){
            progressbar.complete();
            $scope.show = true;
        }, 500);
    var selectmonth = $("#selectmonth").kendoDatePicker({
        start: "year",
        depth: "year",
        format: "MMMM yyyy"
    }).bind("focus", function () {
        $(this).data("kendoDatePicker").open();
    }).prop("readonly", true).data("kendoDatePicker");

    $scope.approved_salary = function () {
        var value = selectmonth.value()
        var fullYear = value.getFullYear(); 
        var month = value.getMonth() + 1; 

         $http.post(baseurl + "employee_ctrl/approved_salary_sheet", {month : selectmonth.value()})
        .success(function (response){
            grid = $("#grid").data("kendoGrid");
            grid.dataSource.filter( [{ field: "month", operator: "eq", value: month },{ field: "year", operator: "eq", value: fullYear }]);
            $scope.show_approved_btn = false;
            toastr.success(response.message);
        });
    }
    $scope.showSalarySheet = function () {
        progressbar.start();
        var value = selectmonth.value()
        var fullYear = value.getFullYear(); 
        var month = value.getMonth() + 1; 

        $scope.data = {month : selectmonth.value()};
        $http.post(baseurl + "employee_ctrl/show_salary_sheet", $scope.data)
        .success(function (response){
            grid = $("#grid").data("kendoGrid");
            if (response.status == 'success') {
              progressbar.complete();
              $scope.edititng_enable = response.editable; 
                grid.options.editable = response.editable; 
                grid.dataSource.filter( [{ field: "month", operator: "eq", value: month },{ field: "year", operator: "eq", value: fullYear }]);
            
              $scope.show_salary_sheet_div = true; 
              $scope.show_approved_btn = response.editable;

              $scope.datas = response.data; 
              toastr.success(response.message);
          } else {
            progressbar.set(60);
             $timeout(function(){
                progressbar.reset();
                $scope.show_salary_sheet_div = false; 
              toastr.error(response.message);
            }, 400);
              
          }
      }).error(function (data){
          console.log(data);
      });
  }
$scope.mainGridOptions = {
    // dataSource.filter( { field: "month", operator: "eq", value: 2 });
        dataSource: {
            transport: {
                read:  {
                    url: baseurl + "employee_ctrl/salary_sheet?type=read",
                    contentType: 'application/json',
                    type: 'POST',
                },
                update: {
                    url: baseurl + "employee_ctrl/salary_sheet?type=update",
                    contentType: 'application/json',
                    type: 'POST',
                },
                destroy: {
                    url: baseurl + "employee_ctrl/salary_sheet?type=destroy",
                    contentType: 'application/json',
                    type: 'POST',
                },
                create: {
                    url: baseurl + "employee_ctrl/salary_sheet?type=create",
                    contentType: 'application/json',
                    type: 'POST',
                },
                parameterMap: function(data, type) {
                    return kendo.stringify(data);
                }
            },
            batch: true,
            pageSize: 20,
            // filter: [{ field: "month", operator: "eq", value: 2 }],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            // serverGrouping: true,
            schema: {
                model: {
                    id: "id",
                    fields: {
                        id: {editable: false, nullable: true},
                        emp_id: {editable: false, nullable: true},
                        emp_name: {editable: false},
                        month: {editable: false},
                        year: {editable: false},
                        status: {editable: false},
                        amount: {type: "number", validation: {required: true}},
                        remarks: {type: "string", validation: {required: false}},
                        created_by: {editable: false},
                    }
                },
                data: function (response) {
                    return response.data;
                },
                total: "total",
                errors: "error"
            }

        },
        // height: 550,
        // filter: [{ field: "month", operator: "eq", value: 2 }],
        // groupable: true,
        filterable: {
            extra: false
        },
        sortable: true,
        navigatable: true,
        toolbar: ["save", "cancel"],
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 15
        },
        columns: [
        { field: "emp_id", title: "Employee ID", width: 120 },
        { field: "emp_name", title: "Employee Name", width: 120 },
        { field: "month", title: "Month", width: 120, template: function (dataItem) {
                                return get_month(dataItem.month);
                            } },
        { field: "year", title: "Year", width: 120 },
        { field: "status", title: "Status", template: function (dataItem) {
                                return getStatus(dataItem.status);
                            }},
        { field: "amount", title: "Amount"},
        { field: "remarks", title: "Remarks"}],
        // { command: "destroy", title: "&nbsp;", width: 150 }],
        editable: true
    };

  function getStatus(status) {
    if (status == 0) {
        return 'Unpaid'; 
    } else {
        return 'Paid';
    }
  }

};

function SalarySheetCtrl($scope, $http, $timeout, progressbar){
    var edititng_enable = false; 
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

    $scope.show_salary_sheet_div = false; 

    $scope.showSalarySheet = function () {
        progressbar.start();
        
        $scope.data = {month : selectmonth.value()};
        $http.post(baseurl + "employee_ctrl/show_salary_sheet", $scope.data)
        .success(function (response){
            console.log(response); 
            if (response.status == 'success') {
              progressbar.complete();
              $scope.show_salary_sheet_div = true; 
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
        dataSource: {
            transport: {
                read:  {
                    url: baseurl + "employee_ctrl/salary_sheet?type=read",
                    contentType: 'application/json',
                    type: 'POST',
                    data: {
                        month : selectmonth.value()
                    }
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
                        remarks: {type: "string", validation: {required: true}},
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
        groupable: true,
        filterable: {
            extra: false
        },
        sortable: true,
        navigatable: true,
        toolbar: ["create", "save", "cancel"],
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 15
        },
        columns: [
        { field: "emp_id", title: "Employee ID", width: 120 },
        { field: "emp_name", title: "Employee Name", width: 120 },
        { field: "month", width: 120, template: function (dataItem) {
                                return getMonth(dataItem.month);
                            } },
        { field: "year", width: 120 },
        { field: "status", template: function (dataItem) {
                                return getStatus(dataItem.status);
                            }},
        { field: "amount", title: "Amount"},
        { field: "remarks", title: "Remarks"}],
        // { command: "destroy", title: "&nbsp;", width: 150 }],
        editable: edititng_enable
    };
  function getStatus(status) {
    if (status == 0) {
        return 'Unpaid'; 
    } else {
        return 'Paid';
    }
  }

  function getMonth(month) {
    if (month == 1) {
        return 'January'; 
    } else if (month == 2) {
        return 'February';
    }
  }
};
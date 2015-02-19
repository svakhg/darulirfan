
function EmployeeListCtrl($scope, $http, $location){
	$scope.mainGridOptions = {
                dataSource: {
                        transport: {
                            read: {
                                url: baseurl + "employee_ctrl/process?type=read",
                                contentType: 'application/json',
                                type: 'POST',
                            },
                            parameterMap: function (data, type) {
                                return kendo.stringify(data);
                            }
                        },
                        pageSize: 20,
                        pageSize: 20,
                        schema: {
                            model: {
                                id: "id",
                                fields: {
                                    id: {editable: false, nullable: true},
                                    emp_id: {editable: false, nullable: true},
                                    emp_name: {editable: false, nullable: true},
                                    father_name: {type: "string", validation: {required: true}},
                                    mother_name: {type: "string", validation: {required: true}},
                                    designation: {type: "string", validation: {required: true}},
                                    contact_no: {type: "string", validation: {required: true}},
                                    // status: {type: "boolean", validation: {required: true}},
                                }
                            },
                            data: function (response) {
                                return response.data;
                            },
                            total: "total",
                            errors: "error"
                        }

                    },
                    height: 550,
                    groupable: true,
                    filterable: {
                        mode: "row"
                    },
                    sortable: true,
                    pageable: {
                        refresh: true,
                        pageSizes: true,
                        buttonCount: 5
                    },
                    columns: [{
                        field: "emp_id",
                        title: "Employee ID",
                        filterable: {
                            cell: {
                                showOperators: false
                            }
                        }
                    },{
                        field: "emp_name",
                        title: "Employee Name",
                        filterable: {
                            cell: {
                                showOperators: false
                            }
                        }
                    }, {
                        field: "father_name",
                        title: "Father Name",
                        filterable: {
                            cell: {
                                showOperators: false
                            }
                        }
                    }, {
                        field: "designation",
                        title: "Designation",
                        filterable: {
                            cell: {
                                showOperators: false
                            }
                        }
                    }, {
                        field: "contact_no",
                        title: "Contact No",
                        filterable: {
                            cell: {
                                showOperators: false
                            }
                        }
                    }, 
                    // {
                    //     field: "status",
                    //     title: "Status",
                    //     filterable: {
                    //         cell: {
                    //             showOperators: false
                    //         }
                    //     }
                    // },
                    {command: [{name: "edit a Employee",
                    text: "Edit Employee",
                    click: EditEmployeeBtn
                },
                {name: "details",
                text: "Employee Details",
                click: DetailsEmployeeBtn 
            }],
            title: "&nbsp;", width: "300px"}]
            };
            wnd = $("#details")
            .kendoWindow({
                title: "Employee Edit",
                modal: true,
                visible: false,
                dragable: true,
                resizable: false,
                width: 1200
            }).data("kendoWindow");

                function EditEmployeeBtn(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    console.log(dataItem);
                    window.location.replace("#/employee/edit/" + dataItem.emp_id);
                }

                function DetailsEmployeeBtn(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    window.location.replace("#/employee/details/" + dataItem.emp_id);
                }

                function ShowDetails(e) {
                    e.preventDefault();

                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    $.ajax({
                        url: baseurl + "employee_ctrl/edit/",
                        type: "get",
                        data: {
                            id: dataItem.id
                        },
                        success: function (response) {
                            wnd.content(response);
                        },
                        error: function () {
                            console.log("error");
                        }
                    })
                    wnd.center().open();
                }
			};
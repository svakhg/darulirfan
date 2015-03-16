
function StudentListCtrl($scope, $http, $location){
	$scope.mainGridOptions = {
                dataSource: {
                        transport: {
                            read: {
                                url: baseurl + "std_report_ctrl/process?type=read",
                                contentType: 'application/json',
                                type: 'POST',
                            },
                            parameterMap: function (data, type) {
                                return kendo.stringify(data);
                            }
                        },
                        pageSize: 20,
                        schema: {
                            model: {
                                id: "id",
                                fields: {
                                    id: {editable: false, nullable: true},
                                    std_id: {editable: false, nullable: true},
                                    father_name: {type: "string", validation: {required: true}},
                                    mother_name: {type: "string", validation: {required: true}},
                                    class_id: {type: "number", validation: {required: true}},
                                    roll_no: {type: "number", validation: {required: true}},
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
                        field: "std_id",
                        title: "Student ID",
                        filterable: {
                            cell: {
                                showOperators: false
                            }
                        }
                    },{
                        field: "std_name",
                        title: "Student Name",
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
                        field: "class_id",
                        title: "Class",
                        template: function(dataItem) {
                            return get_class(dataItem.class_id);
                        },
                        filterable: {
                            cell: {
                                showOperators: false
                            }
                        }
                    }, {
                        field: "roll_no",
                        title: "Roll No",
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
                    {command: [{name: "edit a student",
                    text: "Edit Student",
                    click: EditStudentBtn
                },
                {name: "details",
                text: "Student Details",
                click: DetailsStudentBtn 
            }],
            title: "&nbsp;", width: "300px"}]
            };
            wnd = $("#details")
            .kendoWindow({
                title: "Student Edit",
                modal: true,
                visible: false,
                dragable: true,
                resizable: false,
                width: 1200
            }).data("kendoWindow");

                function EditStudentBtn(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    window.location.replace("#/student/edit/" + dataItem.std_id);
                }

                function DetailsStudentBtn(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    window.location.replace("#/student/details/" + dataItem.std_id);
                }

                function ShowDetails(e) {
                    e.preventDefault();

                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    $.ajax({
                        url: baseurl + "std_report_ctrl/edit/",
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
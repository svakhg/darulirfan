
function VoucherListCtrl($scope, $http, $location){
$scope.mainGridOptions = {
    dataSource: {
        transport: {
            read: {
                url: baseurl + "voucher_ctrl/process?type=read",
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
                    acc_group_id: {editable: false, nullable: true},
                    ledger_id: {editable: false, nullable: true},
                    debit: {type: "number", validation: {required: true}},
                    credit: {type: "number", validation: {required: true}},
                    description: {type: "string", validation: {required: true}},
                    voucher_type: {type: "string", validation: {required: true}},
                    voucher_id: {editable: false, nullable: true},
                    date: {editable: false, nullable: true},
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
                    // groupable: true,
                    filterable: {
                        extra: false
                    },
                    sortable: true,
                    pageable: {
                        refresh: true,
                        pageSizes: true,
                        buttonCount: 5
                    },
                    columns: [{
                        field: "acc_group_id",
                        title: "Account Group",
                        template: function(dataItem) {
                            return get_acc_group_name(dataItem.acc_group_id);
                        }
                    },{
                        field: "ledger_id",
                        title: "Account Ledger",
                        template: function(dataItem) {
                            return get_ledger_name(dataItem.ledger_id);
                        }
                    }, {
                        field: "voucher_type",
                        title: "Voucher Type",
                        template: function(dataItem) {
                            return get_voucher_type(dataItem.voucher_type);
                        }
                    }, {
                        field: "voucher_id",
                        title: "Voucher ID"
                        
                    }, {
                        field: "debit",
                        title: "Debit"
                    }, {
                        field: "credit",
                        title: "Credit"
                    }, {
                        field: "date",
                        title: "Entry Date"
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
                    {command: [
                        {name: "details",
                        text: "Show Details",
                        click: DetailsBtn 
                    }],
                    title: "&nbsp;", width: "120px"}]
                };
                wnd = $("#details")
                .kendoWindow({
                    title: "Voucher",
                    modal: true,
                    visible: false,
                    dragable: true,
                    resizable: false,
                    width: 1200
                }).data("kendoWindow");


                function DetailsBtn(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    window.location.replace("#/voucher/view/" + dataItem.voucher_id);
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
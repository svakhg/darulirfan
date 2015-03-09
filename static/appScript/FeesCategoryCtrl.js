
function FeesCategoryCtrl($scope, $http, $location){
	$scope.mainGridOptions = {
		dataSource: {
			transport: {
				read: {
					url: baseurl + "fee_category_ctrl/process?type=read",
					contentType: 'application/json',
					type: 'POST',
				},
				create: {
					url: baseurl + "fee_category_ctrl/process?type=create",
					contentType: 'application/json',
					type: 'POST',
				},
				update: {
					url: baseurl + "fee_category_ctrl/process?type=update",
					contentType: 'application/json',
					type: 'POST',
				},
				destroy: {
					url: baseurl + "fee_category_ctrl/process?type=destroy",
					contentType: 'application/json',
					type: 'POST',
				},
				parameterMap: function (data, type) {
					return kendo.stringify(data);
				}
			},
			pageSize: 20,
			serverSorting: true,
			serverFiltering: true,
			schema: {
				model: {
					id: "id",
					fields: {
						id: {editable: false, nullable: true},
						fee_category: {type: "string", validation: {required: true}},
						mother_fee_category: {type: "string", validation: {required: false}},
						description: {type: "string", validation: {required: false}},
						fee_type: {type: "string", validation: {required: true}},
						residential: {type: "number", validation: {required: false}},
						non_residential: {type: "number", validation: {required: false}},
						status: {type: "boolean", validation: {required: true}},
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
                    toolbar: ["create"],
                    editable:"popup",
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
                    	field: "fee_category",
                    	title: "Fee Category Name"
                    },{
                    	field: "mother_fee_category",
                    	title: "Parent Fee Category",
                    	editor: fees_category_editor
                    }, {
                    	field: "description",
                    	title: "Description"
                    }, {
                    	field: "fee_type",
                    	title: "Fee Type",
                    	editor: fee_type_editor
                    }, {
                    	field: "residential",
                    	title: "Residential"
                    }, {
                    	field: "non_residential",
                    	title: "Non-Residential"
                    }, 
                    {
                    	field: "status",
                    	title: "Status"
                    },
                    {command: [{name: "edit",
                    text: "Edit"
                },
                {name: "destroy",
                text: "Delete"
            }],
            title: "&nbsp;", width: "300px"}]
        };
        wnd = $("#details")
        .kendoWindow({
        	title: "Edit",
        	modal: true,
        	visible: false,
        	dragable: true,
        	resizable: false,
        	width: 1200
        }).data("kendoWindow");


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
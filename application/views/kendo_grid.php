<div id="example">
            <div id="grid"></div>

            <script>
                $(document).ready(function () {
                    var crudServiceBaseUrl = "http://localhost/darulirfan/index.php/kendo_ctrl",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/Products",
                                    dataType: "json"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/Products/Update",
                                    dataType: "json"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/Products/Destroy",
                                    dataType: "json"
                                },
                                create: {
                                    url: crudServiceBaseUrl + "/Products",
                                    dataType: "json"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 20,
                            schema: {
                                model: {
                                    id: "ProductID",
                                    fields: {
                                        ProductID: { editable: false, nullable: true },
                                        ProductName: { validation: { required: true } },
                                        UnitPrice: { type: "number", validation: { required: true, min: 1} },
                                        Discontinued: { type: "boolean" },
                                        UnitsInStock: { type: "number", validation: { min: 0, required: true } }
                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        navigatable: true,
                        pageable: true,
                        height: 550,
                        toolbar: ["create", "save", "cancel"],
                        columns: [
                            "ProductName",
                            { field: "UnitPrice", title: "Unit Price", format: "{0:c}", width: 120 },
                            { field: "UnitsInStock", title: "Units In Stock", width: 120 },
                            { field: "Discontinued", width: 120 },
                            { command: "destroy", title: "&nbsp;", width: 150 }],
                        editable: true
                    });
                });
            </script>
        </div>

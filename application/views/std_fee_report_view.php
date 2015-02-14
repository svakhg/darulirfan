 <script src="static/appScript/StudentEditCtrl.js"></script>

<h1>Student List</h1>
<div class="row well" ng-controller="StudentEditCtrl">
    <a href="#/std_report/add" class="btn btn-success">Add New Student</a>
    <div id="example">
        <div id="grid"></div>
        <div id="details"></div>
        <script>
            $(document).ready(function () {
                $("#grid").kendoGrid({
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
                                    father_name: {type: "string", validation: {required: true}},
                                    mother_name: {type: "string", validation: {required: true}},
                                    class: {type: "number", validation: {required: true}},
                                    roll_no: {type: "number", validation: {required: true}},
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
                        field: "class",
                        title: "Class",
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
                    {command: [{name: "edit a student",
                    text: "Edit Student",
                    click: showDetails
                },
                {name: "destroy",
                text: "Student Details"
            }],
            title: "&nbsp;", width: "300px"}]


        });
wnd = $("#details")
.kendoWindow({
    title: "Student Edit",
    modal: true,
    visible: false,
    dragable: true,
    resizable: false
    // width: 1200
}).data("kendoWindow");

                function showDetails(e) {
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

            });
</script>
</div>

<table id= "table" class="table table-bordered table-hover table-condensed table-striped">
    <thead class="">
        <tr>
            <td>Student ID</td>
            <td>Student Name</td>
            <td>Student Class</td>
                <!--            <td>Fees Category</td>
            <td>Month</td>
        -->
        <td>Amount</td>
            <!--<td>Date</td>
        -->
        <td>Action</td>
    </tr>
</thead>
<tbody>
    <?php if (!isset($results)): ?>
        <p>There are currently no active data</p>
        <?php
        else:
            foreach ($results as $data) {
                ?>
                <tr>
                    <td>
                        <?php echo $data->std_id; ?></td>
                        <td>
                            <?php echo $data->std_name; ?></td>
                            <td>
                                <?php echo $data->class; ?></td>
                                <td>
                                    <?php echo $data->amount; ?></td>
                                    <td>
                                        <a href="#/std_report/single/<?php echo $data->std_id; ?>" class="btn btn-primary">Details</a>
                                    </td>
                                </tr>

                                <?php } endif; ?></tbody>

                            </table>

                        </div>
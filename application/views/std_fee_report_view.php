<div class="row well">
    <div id="example">
        <!--<div id="grid"></div>-->
        <script>
            $(document).ready(function () {
                $("#grid").kendoGrid({
                    dataSource: {
                        type: "odata",
                        transport: {
                            read: "http://demos.telerik.com/kendo-ui/service/Northwind.svc/Customers"
                        },
                        pageSize: 20
                    },
                    height: 550,
                    groupable: true,
                    sortable: true,
                    pageable: {
                        refresh: true,
                        pageSizes: true,
                        buttonCount: 5
                    },
                    columns: [{
                            field: "ContactName",
                            title: "Contact Name",
                            width: 200
                        }, {
                            field: "ContactTitle",
                            title: "Contact Title"
                        }, {
                            field: "CompanyName",
                            title: "Company Name"
                        }, {
                            field: "Country",
                            width: 150
                        }]
                });
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
                <td>Month</td>-->
                <td>Amount</td>
                <!--<td>Date</td>-->
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
                    <td><?php echo $data->std_id; ?></td>
                    <td><?php echo $data->std_name; ?></td>
                    <td><?php echo $data->class; ?></td>
        <!--                <td><?php //echo $data->name;  ?></td>
                    <td><?php //echo $data->month;  ?></td>-->
                    <td><?php echo $data->amount; ?></td>
                    <!--<td><?php //echo $data->created;  ?></td>-->
                    <td><a href="#/std_report/single/<?php echo $data->std_id; ?>" class="btn btn-primary">Details</a></td>
                </tr>

            <?php } endif; ?>

        </tbody>

    </table>

</div>


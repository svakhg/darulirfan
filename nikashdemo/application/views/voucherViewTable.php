<style>

    #edit_dailog, #edit_dailog.fade.in {
        top: 0; /* was 10% */
    }
    #edit_dailog{
        margin-top: 5%;
    }
</style>

<!--for view-->
<script type="text/javascript" charset="utf-8">
    $(document).ready(function()
    {
        $('#myTable').dataTable({
            "aaSorting": [[3, 'desc']],
            "bProcessing": true,
            "bServerSide": true,
            "sServerMethod": "GET",
            "sAjaxSource": "<?php echo base_url(); ?>data/getTable/tbl_voucher",
            "iDisplayLength": 10,
            "aLengthMenu": [[10,20, 40, 60, 100, -1], [10, 20, 40, 60, 100, "All"]],
//            "aoColumns": [
////                {"bVisible": true, "bSearchable": true, "bSortable": true},
//                {"bVisible": true, "bSearchable": true, "bSortable": true},
//                {"bVisible": true, "bSearchable": true, "bSortable": true}
//            ]
        }).fnSetFilteringDelay(700);
    });
</script>
<table id="myTable" class="table table-striped table-bordered table-hover table-condensed ">
    <thead>
        <tr>
            <th>Voucher No</th>
            <th>Voucher Date</th>
            <th>Voucher Details</th>
            <th>Submit Date</th>
            <th>#</th>
        </tr>
    </thead>
</table>
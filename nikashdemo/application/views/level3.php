
<?php
if ($this->session->userdata('msg')) {
    echo $this->session->userdata('msg');
    $this->session->unset_userdata('msg');
}
?>
<fieldset>
    <legend>Chart of Account's: Level 3 Entry</legend>
    <form action="<?php echo base_url(); ?>admin/SaveLevel3.php" method="post">
        <table>
            <tr>
                <td>Select Level 2:</td>
                <td>
                    <!--<select >-->
                    <select data-placeholder="Choose a head of level 2" class="chosen-select" name="level2_id" required="1">
                        <option value=""></option>
                        <?php
                        foreach ($level2 as $data) {
                            ?> 
                            <option value="<?php echo $data->id; ?>"><?php echo $data->level2_name; ?></option>
                        <?php }
                        ?>
                    </select>
                    <script type="text/javascript">
                        var config = {
                            '.chosen-select': {},
                            '.chosen-select-deselect': {allow_single_deselect: true},
                            '.chosen-select-no-single': {disable_search_threshold: 10},
                            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                            '.chosen-select-width': {width: "95%"}
                        }
                        for (var selector in config) {
                            $(selector).chosen(config[selector]);
                        }
                    </script>
                </td>
            </tr>
            <tr>
                <td>Level3 Name:</td>
                <td><input type="text" name="level3_name" required="1"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save" class="btn btn-large btn-primary"></td>
            </tr>
        </table>
    </form>



</fieldset>


<!--for view-->
<script type="text/javascript" charset="utf-8">
    $(document).ready(function()
    {
        $('#myTable').dataTable({
            "aaSorting": [[3, 'asc']],
            "bProcessing": true,
            "bServerSide": true,
            "sServerMethod": "GET",
            "sAjaxSource": "<?php echo base_url(); ?>data/getTable/chartofaccounts",
//            "sAjaxSource": "<?php echo base_url(); ?>data/voucher_select/",
            "iDisplayLength": 30,
            "aLengthMenu": [[20, 40, 60, 100, -1], [20, 40, 60, 100, "All"]],
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
            <!--<th>#</th>-->
            <th>Level3 Head</th>
            <th>Level2 Head</th>
            <th>Level1 Head</th>
            <th>Account Type</th>
            <th>#</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <!--<th>#</th>-->
            <th>Level3 Head</th>
            <th>Level2 Head</th>
            <th>Level1 Head</th>
            <th>Account Type</th>
            <th>#</th>
        </tr>
    </tfoot>
<!--    <tbody>
    <?php
    $count = 1;
    foreach ($selectData as $data) {
        ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $data->level3_name; ?></td>
                <td><?php echo $data->level2_name; ?></td>
                <td>
                    <a class="icon-edit" href="<?php echo base_url(); ?>admin/level3/edit/<?php echo $data->id; ?>">Edit</a> || 
                    <a class="icon-warning-sign" href="<?php echo base_url(); ?>admin/delete/level3/<?php echo $data->id; ?>" onclick="return confirm('Are you Want to sure Delete This??')">Delete</a>
                </td>
            </tr>
        <?php
    }
    ?>
    </tbody>-->
</table>
<!--for edit-->
<?php
if (isset($mode) && $mode == 'edit') {
    ?>
    <div id="dialog-form" title="Update Level3">
        <form action="<?php echo base_url(); ?>admin/updateLevel3.php" method="post">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $selectRow->id; ?>" />
                <label for="select">Level2 Head:</label>
                <select name="level2_id" id="select" required="1">
                    <option value="">---------Select--------</option>
                    <?php
                    foreach ($level2 as $OptionData) {
                        $selectedOption = $OptionData->id == $selectRow->level2_id ? 'selected="1"' : '';
                        ?> 
                        <option <?php echo $selectedOption; ?> value="<?php echo $OptionData->id; ?>"><?php echo $OptionData->level2_name; ?></option>
                    <?php }
                    ?>
                </select>
                <label for="level3_name">Level3 Name:</label>
                <input type="text" name="level3_name" id="level3_name" value="<?php echo $selectRow->level3_name; ?>" /><br>
                <input type="submit" value="Update"/>
            </fieldset>
        </form>
    </div>
    <script>
        $("#dialog-form").dialog({
            width: 350,
            modal: true
        });
    </script>
    <?php
}
?>
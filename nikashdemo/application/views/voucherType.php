<?php
if ($this->session->userdata('msg')) {
    echo $this->session->userdata('msg');
    $this->session->unset_userdata('msg');
}
?>

<fieldset>
    <legend>Add New Voucher Type</legend>
    <form action="<?php echo base_url(); ?>index.php/admin/SaveVoucherType.php" method="post">
        <table>
            <tr>
                <td>Voucher Type (Short):</td>
                <td><input type="text" name="voucher_type" id="v_type" required="1" maxlength="5"/></td>
            </tr>
            <tr>
                <td>Voucher Type (Long)</td>
                <td><input type="text" name="details" required="1"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save" class="btn btn-large btn-primary"></td>
            </tr>
        </table>
    </form>
</fieldset>


<!--for view-->
<table style="width: 50%" class="table table-striped table-bordered table-hover">
    <tr>
        <th>#</th>
        <th>Voucher Type (Short Name)</th>
        <th>Voucher Type (Long Name)</th>
        <th>Action</th>
    </tr>
    <?php
    $count = 1;
    foreach ($selectData as $data) {
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $data->voucher_type; ?></td>
            <td><?php echo $data->details; ?></td>
            <td>
                <a class="icon-edit" href="<?php echo base_url(); ?>admin/voucherType/edit/<?php echo $data->id; ?>">Edit</a> || 
                <a class="icon-warning-sign" href="<?php echo base_url(); ?>admin/delete/voucherType/<?php echo $data->id; ?>" onclick="return confirm('Are you Want to sure Delete This??')">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<!--for edit-->
<?php
if (isset($mode) && $mode == 'edit') {
    ?>
    <div id="dialog-form" title="Update Voucher Type">
        <form action="<?php echo base_url(); ?>admin/updateVoucherType.php" method="post">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $selectRow->id; ?>" />
                <label for="select">Voucher type Sort Name</label>
                <input type="text" name="voucher_type" id="select" value="<?php echo $selectRow->voucher_type; ?>"/>
                <label for="details">Details:</label>
                <input type="text" name="details" id="details" value="<?php echo $selectRow->details; ?>" /><br>
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
    <script>
        $("input").on("blur", function() {
            $(this).val(function(i, val) {
                return val.toUpperCase();
            });
        });
    </script>
    <?php
}
?>
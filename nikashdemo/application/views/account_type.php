
<div class="alert alert-success">
    <?php
    if ($this->session->userdata('msg')) {
        echo $this->session->userdata('msg');
        $this->session->unset_userdata('msg');
    }
    ?>
</div>
<fieldset>
    <legend>Add New Account Type</legend>
    <form action="<?php echo base_url(); ?>admin/SaveAccountType.php" method="post">

        <label for="account_type">Account Type:</label>
        <input type="text" name="accout_type" id="account_type" required="1"/><br>
        <input type="submit" value="Save" class="btn">

    </form>
</fieldset>

<table style="width: 50%" class="table table-striped table-bordered table-hover" >
    <caption><h4>The List of Account Type</h4></caption>
    <tr>
        <th>#</th>
        <th>Account Type</th>
        <th>Action</th>
    </tr>
    <?php
    $count = 1;
    foreach ($selectAccountType as $account) {
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $account->type; ?></td>
            <td><a class="icon-edit" href="<?php echo base_url(); ?>admin/accountType/edit/<?php echo $account->account_id; ?>"> Edit </a> || 
                <a class="icon-remove" href="<?php echo base_url(); ?>admin/delete/account_type/<?php echo $account->account_id; ?>" onclick="return confirm('Are you Want to sure Delete This Accoun Type??')">  Delete </a></td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
if (isset($mode) && $mode == 'edit') {
    ?>
    <div id="dialog-form" title="Update Account Type">
        <form action="<?php echo base_url(); ?>admin/updateAccountType" method="post">
            <fieldset>
                <label for="name">Account Type:</label>
                <input type="hidden" name="account_id" value="<?php echo $selectRowAccount->account_id; ?>"/>
                <input type="text" name="type" value="<?php echo $selectRowAccount->type; ?>" />

                <input type="submit" class="btn" value="Update"/>
            </fieldset>
        </form>
    </div>
    <script>
        $("#dialog-form").dialog({
            height: 150,
            width: 350,
            modal: true
        });
    </script>
    <?php
}
?>
<?php
if ($this->session->userdata('msg')) {
    echo $this->session->userdata('msg');
    $this->session->unset_userdata('msg');
}
?>
<fieldset>
    <legend>Chart of Account's: Level 1 Entry</legend>

    <form action="<?php echo base_url(); ?>admin/SaveLevel1.php" method="post">
        <table>
            <tr>
                <td>Account type:</td>
                <td>
                    <select name="account_id" required="1" data-placeholder="Choose an Account Type" class="chosen-select">
                        <option value=""></option>
                        <?php
                        foreach ($accountType as $account) {
                            ?> <option value="<?php echo $account->account_id; ?>"><?php echo $account->type; ?></option>
                        <?php }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Level1 Name:</td>
                <td><input type="text" name="level1_name" required="1"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save" class="btn btn-large btn-primary"></td>
            </tr>
        </table>
    </form>
</fieldset>
<!--for view-->

<table id="dataTable" class="table table-striped table-bordered table-hover table-condensed ">
    <thead>
        <tr>
            <th>#</th>
            <th>Level1 Head</th>
            <th>Account Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $count = 1;
        foreach ($selectData as $data) {
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $data->level1_name; ?></td>
                <td><?php echo $data->account_type; ?></td>
                <td>
                    <a class="icon-edit" href="<?php echo base_url(); ?>admin/level1/edit/<?php echo $data->id; ?>">Edit</a> || 
                    <a class="icon-warning-sign" href="<?php echo base_url(); ?>admin/delete/level1/<?php echo $data->id; ?>" onclick="return confirm('Are you Want to sure Delete This Accoun Type??')">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<!--for edit-->
<?php
if (isset($mode) && $mode == 'edit') {
    ?>
    <div id="dialog-form" title="Update Level1">
        <form action="<?php echo base_url(); ?>admin/updateLevel1.php" method="post">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $selectRow->id; ?>" />
                <label for="account_id">Account Type:</label>
                <select name="account_id" id="account_id" required="1">
                    <option value="">---------Select--------</option>
                    <?php
                    foreach ($accountType as $account) {
                        $selectedOption = $account->account_id == $selectRow->account_id ? 'selected="1"' : '';
                        ?> 
                        <option <?php echo $selectedOption; ?> value="<?php echo $account->account_id; ?>"><?php echo $account->type; ?></option>
                    <?php }
                    ?>
                </select>
                <label for="level1_name">Level1 Name:</label>
                <input type="text" name="level1_name" id="level1_name" value="<?php echo $selectRow->level1_name; ?>" /><br>
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
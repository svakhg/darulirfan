<?php
if ($this->session->userdata('msg')) {
    echo $this->session->userdata('msg');
    $this->session->unset_userdata('msg');
}
?>

<fieldset>
    <legend>Chart of Account's: Level 2 Entry</legend>
    <form action="<?php echo base_url(); ?>admin/SaveLevel2.php" method="post">
        <table>
            <tr>
                <td>Select Level 1</td>
                <td>
                    <select name="level1_id" required="1"  data-placeholder="Choose a head of Level 1" class="chosen-select">
                        <option value=""></option>
                        <?php
                        foreach ($level1 as $data) {
                            ?> <option value="<?php echo $data->id; ?>"><?php echo $data->level1_name; ?></option>
                        <?php }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Level2 Name:</td>
                <td><input type="text" name="level2_name" required="1"/></td>
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
            <th>Level2 Head</th>
            <th>Level1 Head</th>
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
                <td><?php echo $data->level2_name; ?></td>
                <td><?php echo $data->level1_name; ?></td>
                <td>
                    <a class="icon-edit" href="<?php echo base_url(); ?>admin/level2/edit/<?php echo $data->id; ?>">Edit</a> || 
                    <a class="icon-warning-sign" href="<?php echo base_url(); ?>admin/delete/level2/<?php echo $data->id; ?>" onclick="return confirm('Are you Want to sure Delete This Accoun Type??')">Delete</a>
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
    <div id="dialog-form" title="Update Level2">
        <form action="<?php echo base_url(); ?>admin/updateLevel2.php" method="post">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $selectRow->id; ?>" />
                <label for="select">Level1 Head:</label>
                <select name="level1_id" id="select" required="1">
                    <option value="">---------Select--------</option>
                    <?php
                    foreach ($level1 as $OptionData) {
                        $selectedOption = $OptionData->id == $selectRow->level1_id ? 'selected="1"' : '';
                        ?> 
                        <option <?php echo $selectedOption; ?> value="<?php echo $OptionData->id; ?>"><?php echo $OptionData->level1_name; ?></option>
                    <?php }
                    ?>
                </select>
                <label for="level2_name">Level2 Name:</label>
                <input type="text" name="level2_name" id="level2_name" value="<?php echo $selectRow->level2_name; ?>" /><br>
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
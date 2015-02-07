
<?php
if ($this->session->userdata('msg')) {
    echo $this->session->userdata('msg');
    $this->session->unset_userdata('msg');
}
?>
<fieldset>
    <legend>Create New User</legend>
    <form action="<?php echo base_url(); ?>users/SaveUser.php" method="post">
        <table>
            <tr>
                <td>Company Name:</td>
                <td>
                    <?php
                    require_once 'application/controllers/reports.php';
                    $report = new Reports();
                    ?>
                    <input type="text" readonly="1" value="<?php echo $report->company_name; ?>">
                </td>
            </tr>
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="user_name" required="1"/></td>
            </tr>
            <tr>
                <td>User Email:</td>
                <td><input type="text" name="email" required="1"/></td>
            </tr>
            <tr>
                <td>User Password:</td>
                <td><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>
                    <select name="status">
                        <option value="Admin">Admin</option>
                        <option value="Subadmin" selected="1">Sub-Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Send" name="user_send" class="btn btn-large btn-primary"></td>
            </tr>
        </table>
    </form>
</fieldset>

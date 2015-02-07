<?php
if ($this->session->userdata('msg')) {
    echo '<h3>'. $this->session->userdata('msg').'</h3>';
    $this->session->unset_userdata('msg');
}
?>
<fieldset>
    <legend>Setting up Company</legend>
    <form style="margin: 0px auto;" action="<?php echo base_url(); ?>admin/saveCompany.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Company Name:</td>
                <td><input type="text" name="comp_name" required="1"/></td>
            </tr>
            <tr>
                <td>Telephone/Mobile 1:</td>
                <td><input type="text" name="mobile1" required="1"/></td>
            </tr>
            <tr>
                <td>Telephone/Mobile 2:</td>
                <td><input type="text" name="mobile2"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" required="1"/></td>
            </tr>
            <tr>
                <td>Web Site:</td>
                <td><input type="text" name="website"/></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>
                    <textarea name="address"></textarea>
                </td>
            </tr>
            <tr>
                <td>Company Logo:</td>
                <td><input type="file" name="comp_logo"/></td>
            </tr>
            <tr>
                <td>Company Status:</td>
                <td>
                    <select name="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select> 
                </td>
            </tr>
        </table>
        <h4><u>Contacts</u></h4>
        <table>
            <tr>
                <td>Contact's Name:</td>
                <td><input type="text" name="cont_name" required="1"/></td>
            </tr>
            <tr>
                <td>Contact's Designation:</td>
                <td><input type="text" name="cont_desi"/></td>
            </tr> 
            <tr>
                <td>Contact's Mobile:</td>
                <td><input type="text" name="cont_mobile" required="1"/></td>
            </tr> 
            <tr>
                <td>Contact's Email:</td>
                <td><input type="text" name="cont_email"/></td>
            </tr>
            <tr>
                <td><h4><u>For Login</u></h4></td>
                <td></td>
            </tr>
            <tr>
                <td>Company User Name(for Admin Login): </td>
                <td><input type="text" name="user_name" required="1"/></td>
            </tr>
            <tr>
                <td>Company User Password: </td>
                <td><input type="password" name="password" required="1"/></td>
            </tr>
            <tr>
                <td>Retype Password: </td>
                <td><input type="password" name="password2" required="1"/></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Save" name="from_send" class="btn btn-large btn-primary">
                    <input type="reset" value="Reset" class="btn btn-large btn-info">
                </td>
            </tr>
        </table>
    </form>
</fieldset>

<!--<pre>
    <?php
//    print_r($selectCompany);
    ?>
</pre>-->
<form>
    <fieldset>
        <label>Settings</label>
        <table>
            <tr>
                <td>Company Name:</td>
                <td><input type="text" name="comp_name" required="1" value="<?php echo $selectCompany->comp_name; ?>"/></td>
            </tr>
            <tr>
                <td>Telephone/Mobile 1:</td>
                <td><input type="text" name="mobile1" required="1" value="<?php echo $selectCompany->mobile1; ?>"/></td>
            </tr>
            <tr>
                <td>Telephone/Mobile 2:</td>
                <td><input type="text" name="mobile2" value="<?php echo $selectCompany->mobile2; ?>"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" required="1" value="<?php echo $selectCompany->email; ?>"/></td>
            </tr>
            <tr>
                <td>Web Site:</td>
                <td><input type="text" name="website" required="1" value="<?php echo $selectCompany->website; ?>"/></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>
                    <textarea name="address"> value="<?php echo $selectCompany->address; ?>"</textarea>
                </td>
            </tr>
            <tr>
                <td>Company Logo:</td>                    

                <td>
                    <img src="<?php echo base_url() ?>user_upload/<?php echo $selectCompany->comp_logo; ?>" height="200" width="200" alt="logo">
                    <input type="file" name="comp_logo"/>
                </td>
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
                <td><input type="text" name="cont_name" required="1" value="<?php echo $selectCompany->cont_name; ?>"/></td>
            </tr>
            <tr>
                <td>Contact's Designation:</td>
                <td><input type="text" name="cont_desi" required="1" value="<?php echo $selectCompany->cont_desi; ?>"/></td>
            </tr> 
            <tr>
                <td>Contact's Mobile:</td>
                <td><input type="text" name="cont_mobile" required="1" value="<?php echo $selectCompany->cont_mobile; ?>"/></td>
            </tr> 
            <tr>
                <td>Contact's Email:</td>
                <td><input type="text" name="cont_email" required="1" value="<?php echo $selectCompany->cont_email; ?>"/></td>
            </tr>
            <tr>
                <td><h4><u>For Login</u></h4></td>
                <td></td>
            </tr>
            <tr>
                <td>Company User Name: </td>
                <td><input type="text" name="user_name" required="1" value="<?php echo $selectCompany->comp_name; ?>"/></td>
            </tr>
            <tr>
                <td>Company User Password: </td>
                <td><input type="password" name="password" required="1" value="<?php echo $selectCompany->comp_name; ?>"/></td>
            </tr>
            <tr>
                <td>Date: </td>
                <td>
                    Starting Data: <input type="text" name="" value="<?php echo $selectCompany->start_date; ?>"/>
                    Ending Data: <input type="text" name="" value="<?php echo $selectCompany->ending_date; ?>"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Save" name="from_send" class="btn btn-large btn-primary">
                    <input type="reset" value="Reset" class="btn btn-large btn-info">
                </td>
            </tr>
            
        </table>
    </fieldset>
</form>
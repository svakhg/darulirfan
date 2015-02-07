<fieldset>
    <legend>Select your Voucher:</legend>
    <form method="get" action="<?php echo base_url();?>reports/printVoucher" target="_blank">
        <select>
            <?php
            $i = date('Y');
            while ($i >= 2014) {
                ?>
                <option><?php echo $i; ?></option>
                <?php
                $i--;
            }
            ?>
        </select>
        <select required="1" id="voucher_type" onchange="makerequestGet('<?php echo base_url(); ?>voucher/typeChange/' + this.value, 'voucher_no')">
            <option value=""></option>
            <?php
            foreach ($VoucherType as $vt) {
                ?>
                <option value="<?php echo $vt->id; ?>"><?php echo $vt->voucher_type . ' - ' . $vt->details; ?></option>
                <?php
            }
            ?>
        </select>
        <span id="voucher_no">
<!--            <select required="1" name="voucher_no">
                <option value=""></option>
            </select>-->
        </span>

        <input type="submit" value="View" class="btn">
    </form>
</fieldset>

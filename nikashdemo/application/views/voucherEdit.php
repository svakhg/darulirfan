
<style>
    /*body {font-size:99.5%;}*/
    .ui-dialog-titlebar-close {
        visibility: hidden;
    }
    #dialog-modal{
        display: none;
    }
    .account_table td{
        /*border: 1px solid red;*/
        text-align: left;
    }
    #note, #debit, #credit{
        margin-top: 10px;
    }
</style>
<bdoy  onload="setfocus('level3_id');">
    <!--for Popup dialog-->
    <?php
//    if ($this->session->userdata('v_row')) {
////        print_r($this->session->userdata('v_row'));
//        $this->session->unset_userdata('v_row');
//    }
//    if ($this->session->userdata('voucher_data')) {
////        print_r($this->session->userdata('voucher_data'));
//        $this->session->unset_userdata('voucher_data');
//    }
    ?>
    <fieldset>
        <legend>Voucher Edit:</legend>

        <div id="dialog-modal" title="Saving..." style="text-align: center;">
            <img src="<?php echo base_url(); ?>img/ajax-loader.gif" alt="Loading..."/>
        </div>
        <div id="loading"style="text-align: center;"></div>
        <form action="<?php echo base_url(); ?>voucher/UpdateVoucher.php" method="post">
            <div style="background: white; padding: 30px;">
                <table style="margin: 0px auto; max-width: 70%" class="table-striped">
                    <tr>
                        <td colspan="4"><h4 style="text-align: center">Edit:  <?php echo $voucher->voucher_no; ?></h4></td>
                    <input type="hidden" name="voucher_id" value="<?php echo $voucher->voucher_id; ?>">
                    </tr>
                    
                    <tr>
                        <td>Voucher Type:</td>
                        <td>
                            <select required="1" name="voucher_type" id="voucher_type" onfocus="this.defaultIndex = this.selectedIndex;" onchange="this.selectedIndex = this.defaultIndex;">
                                <!--<option <?php echo $selectedOption; ?> value="<?php echo $vt->id; ?>"><?php echo $vt->voucher_type . ' - ' . $vt->details; ?></option>-->
                                <?php
                                foreach ($VoucherType as $vt) {
                                    $selectedOption = $vt->id == $voucher->voucher_type_id ? 'selected="1"' : '';
                                    ?>
                                    <option <?php echo $selectedOption; ?>><?php echo $vt->voucher_type . ' - ' . $vt->details; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="hidden" id="voucher_no" readonly="" value="<?php echo $voucher->voucher_no_form; ?>" 
                        </td>
                        <td>Voucher Date:</td>
                        <td><input type="text" readonly="1" name="voucher_date" value="<?php echo $voucher->voucher_date; ?>" required="1"/></td>
                    </tr>
                    <tr>
                        <td>Voucher Details:</td>
                        <td colspan="3">
                            <textarea name="voucher_details" id="voucher_details" class="input-block-level" rows="2" ><?php echo $voucher->voucher_details; ?> </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Voucher Edit Reason:</td>
                        <td colspan="3"><input type="text" class="input-xxlarge" required="1" placeholder="Write hare the coz of Voucher Editing"></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <table class="table table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Account Head</th>
                                        <th>Note</th>
                                        <th style="text-align: right">Debit (TK)</th>
                                        <th style="text-align: right">Credit (TK)</th>
                                    </tr>
                                </thead>
                                <tbody id="load_td">
                                    <?php
                                    $c = 1;
                                    $t_debit = 0;
                                    $t_credit = 0;
                                    foreach ($child as $ch) {
                                        ?>
                                        <tr>
                                            <td><?php echo $c++; ?></td>
                                            <td><?php echo $ch->level3_name; ?></td>
                                            <td><?php echo $ch->note; ?></td>
                                            <td style="text-align: right">
                                                <?php
                                                $t_credit += $ch->credit;
                                                $t_debit += $ch->debit;
                                                if ($ch->debit == 0 || $ch->debit == '') {
                                                    echo '<input type="text" name="child[' . $ch->id . '][debit]" class="input-mini" readonly="1">';
                                                } else {
                                                    ?>
                                                    <input type="text" name="child[<?php echo $ch->id; ?>][debit]" class="input-mini input_debit" value="<?php echo $ch->debit; ?>">
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: right">
                                                <?php
                                                if ($ch->credit == 0 || $ch->credit == '') {
                                                    echo '<input type="text" name="child[' . $ch->id . '][credit]" class="input-mini" readonly="1">';
                                                } else {
                                                    ?>
                                                    <input type="text" name="child[<?php echo $ch->id; ?>][credit]" class="input-mini input_credit" value="<?php echo $ch->credit; ?>">
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <?php $color = $t_credit == $t_debit ? 'btn-success' : 'btn-danger'; ?>
                                        <td style="text-align: right" class="<?php echo $color; ?> right t_debit">
                                            <?php echo $t_debit ?>
                                        </td>
                                        <td style="text-align: right" class="<?php echo $color; ?> right t_credit">
                                            <?php echo $t_credit ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="button" value="Update" id="submit_hide" class="btn disabled" style="display: none;" onclick="alert('Debit Credit Not Equal and Zero.')"/>
                            <input type="submit" value="Update" id="submit" class="btn"/>

                            <input type="button" value="Save" id="voucher_submit" style="display: none;" class="btn btn-info"/>
                            <a href="<?php echo base_url(); ?>voucher/voucherForm.php"><input type="button" value="Clear" class=" btn"/></a>
                            <span id="loadingIco" style="display: none;"><img src="<?php echo base_url() ?>img/loadingIco.gif"/></span>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </fieldset>
</bdoy>

<script type="text/javascript">
    //window.onbeforeunload = goodbye;
    $(function() {
        $("#voucher_date").datepicker({
            changeMonth: true,
            showOn: "button",
            buttonImage: "../../img/calendar.gif",
            buttonImageOnly: true,
            dateFormat: "yy-mm-dd"
        });
    });

    $(document).ready(function() {

        $('.input-mini').keyup(function() {
            var Credit_sum = 0;
            $('.input_credit').each(function(i, e) {
                var v = parseInt($(e).val());
                if (!isNaN(v))
                    Credit_sum += v;
            });
            $('.t_credit').html(Credit_sum);

            var Debit_sum = 0;
            $('.input_debit').each(function(i, e) {
                var v = parseInt($(e).val());
                if (!isNaN(v))
                    Debit_sum += v;
            });
            $('.t_debit').html(Debit_sum);

            if (Credit_sum != Debit_sum) {
                $('.t_debit').removeClass("btn-success").addClass("btn-danger");
                $('.t_credit').removeClass("btn-success").addClass("btn-danger");
                $('#submit_hide').css('display', 'inline');
                $('#submit').css('display', 'none');

            } else {
                $('.t_debit').removeClass("btn-danger").addClass("btn-success");
                $('.t_credit').removeClass("btn-danger").addClass("btn-success");
                $('#submit_hide').css('display', 'none');
                $('#submit').css('display', 'inline');
            }

        });
    });

</script>
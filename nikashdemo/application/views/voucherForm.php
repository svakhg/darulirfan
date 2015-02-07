
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
    if ($this->session->userdata('v_row')) {
//        print_r($this->session->userdata('v_row'));
        $this->session->unset_userdata('v_row');
    }
    if ($this->session->userdata('voucher_data')) {
//        print_r($this->session->userdata('voucher_data'));
        $this->session->unset_userdata('voucher_data');
    }
    ?>
    <script>
        $(function() {
            $("#tabs").tabs({
                beforeLoad: function(event, ui) {
                    ui.panel.html(
                            "<img src=\"<?php echo base_url(); ?>img/ajax-loader.gif\" alt=\"Loading\"/> Loading.... please wait");
                    ui.jqXHR.error(function() {
                        ui.panel.html(
                                "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                                "If this wouldn't be a demo.");
                    });
                }
            });
        });
    </script>
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Form</a></li>
            <!--<li><a href="<?php echo base_url(); ?>voucher/voucherViewTable.php">View/Edit Voucher</a></li>-->
            <li><a href="#tabs-2">View/Edit Voucher</a></li>
        </ul>

        <div id="tabs-1">

            <fieldset>
                <div id="dialog-modal" title="Saving..." style="text-align: center;">
                    <img src="<?php echo base_url(); ?>img/loading.gif" alt="Loading..."/>
                    <img src="<?php echo base_url(); ?>img/ajax-loader.gif" alt="Loading..."/>
                </div>
                <div id="loading" style="text-align: center;"></div>
                <legend>Voucher Entry:</legend>
                <form action="<?php echo base_url(); ?>voucher/saveVoucher.php" method="post">
                    <div  style="background: white; padding: 30px;">
                        <table style="margin: 0px auto; max-width: 70%" class="table-striped">
                            <tr>
<!--                                <td>Record Id:</td>
                                <td><input type="text" id="voucher_no" readonly="" value="<?php echo time(); ?>" required="1"/></td>-->
                                <td>Voucher Type:</td>
                                <td>
                                    <select required="1" name="voucher_type" id="voucher_type">
                                        <option value=""></option>
                                        <?php
                                        foreach ($VoucherType as $vt) {
                                            ?>
                                            <option value="<?php echo $vt->id; ?>"><?php echo $vt->voucher_type . ' - ' . $vt->details; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" id="voucher_no" readonly="" value="<?php echo time(); ?>" 
                                </td>
                                <td>Voucher Date:</td>
                                <td><input type="text" id="voucher_date" readonly="1" name="voucher_date" placeholder="yy-mm-dd" maxlength="10" value="<?php echo date('Y-m-d'); ?>" required="1"/></td>
                            </tr>
                            <tr>
                                <td>Voucher Details:</td>
                                <td colspan="3">
                                    <textarea name="voucher_details" id="voucher_details" class="input-block-level" rows="2" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <table style=" background: white; margin: 0px auto; padding: 00px;">
                                        <tr>
                                            <td>
                                                <select name="level3_id" id="level3_id" data-placeholder="Choose a Account Head..." class="chosen-select">
                                                    <option value=""></option>
                                                    <?php
                                                    foreach ($level3 as $lvl3) {
                                                        ?>
                                                        <option value="<?php echo $lvl3->id . '~~' . $lvl3->level3_name; ?>"><?php echo $lvl3->level3_name; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input type="text" class="input-medium" id="note" placeholder="Enter Note"></td>
                                            <td><input type="number" class="input-small" id="debit" placeholder="Debit (TK)"></td>
                                            <td>
                                                <input type="number" class="input-small" id="credit" placeholder="Credit (TK)">
                                                <input type="button" value="Add" id="add"
                                                       class="btn btn-small btn-primary"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <table class="account_table table" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 5%">#</th>
                                                            <th style="width: 40%">Account Head</th>
                                                            <th style="width: 35%">Note</th>
                                                            <th style="width: 10%;text-align: right">Debit (TK)</th>
                                                            <th style="width: 10%;text-align: right">Credit (TK)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="load_td">
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3" width="39%"></td>

                                                            <td style="text-align: right">
                                                                <span class="btn-small btn-success right" id="total_debit">0.00</span>
                                                            </td>
                                                            <td style="text-align: right">
                                                                <span class="btn-small btn-success right" id="total_credit">0.00</span>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="button" value="Save" onclick="alert('Debit Credit Not Equal and Zero.')" id="submit_hide" class="btn disabled"/>
                                    <input type="button" value="Save" id="voucher_submit" style="display: none;" class="btn btn-info"/>
                                    <a href="<?php echo base_url(); ?>voucher/voucherForm.php"><input type="button" value="Clear" class=" btn"/></a>
                                    <span id="loadingIco" style="display: none;"><img src="<?php echo base_url() ?>img/loadingIco.gif"/></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </fieldset>
        </div>


        <script type="text/javascript">
            //window.onbeforeunload = goodbye;
            $(function() {
                $("#voucher_date").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showOn: "button",
                    buttonImage: "../img/calendar.gif",
                    buttonImageOnly: true,
                    dateFormat: "yy-mm-dd"
                });
            });
            $(function() {
                $("#transaction_date").datepicker({
                    buttonImage: "../img/calendar.gif",
                    dateFormat: "yy-mm-dd"
                });
            });

            var count = 1;
            var row = 0;
            var total_debit = 0.00, total_credit = 0.00;
            var level3_dup = new Array();



            $(document).ready(function() {
                $('#add').click(function() {
                    document.getElementById('loadingIco').style.display = "inline";
                    var division = document.getElementById("load_td");
                    var t_debit = document.getElementById("total_debit");
                    var t_credit = document.getElementById("total_credit");
                    var debit_obj = document.getElementById('debit');
                    var credit_obj = document.getElementById('credit');

                    var voucher_no = document.getElementById('voucher_no').value;
                    var note_obj = document.getElementById('note');
                    var level3 = document.getElementById('level3_id').value;
                    var note = note_obj.value;
                    var debit = parseFloat(debit_obj.value);
                    var credit = parseFloat(credit_obj.value);

                    if (!level3) {
                        alert('Select Accounting Head First');
                        setfocus('level3_id');
                        return;
                    }
                    var level3 = level3.split('~~');



                    if (!debit || debit == 0 || isNaN(debit)) {
                        debit = 0;
        //            .style.background = '#EC7878';
                    }
                    if (!credit || credit == 0 || isNaN(credit)) {
                        credit = 0;
                    }
                    if ((credit == 0 && debit == 0) || (credit != '' && debit != 0)) {
                        debit_obj.style.border = "1px solid #FF5400";
                        credit_obj.style.border = "1px solid #FF5400";

                        setfocus('debit');
                        return;
                    } else {
                        if ((level3_dup.indexOf(level3[1]) > 0)) {
                            alert('This Account Already Inserted');
                            setfocus('level3_id');
                            return;
        //            break;
        //            level3_dup[count] = level3;
                        } else {
                            level3_dup[count] = level3[1];
                        }
                        debit_obj.style.border = "1px solid #D4D4D4";
                        credit_obj.style.border = "1px solid #D4D4D4";
                        total_debit += debit;
                        total_credit += credit;

                        if (total_credit != total_debit) {
                            t_debit.style.background = "#A93087";
                            t_credit.style.background = "#A93087";
        //                    document.getElementById('submit_hide').style.display = "inline";
        //                    document.getElementById('voucher_submit').style.display = "none";
                        } else {
                            t_debit.style.background = "#59B259";
                            t_credit.style.background = "#59B259";
        //                    document.getElementById('submit_hide').style.display = "none";
        //                    document.getElementById('voucher_submit').style.display = "inline";
                        }
                        if (debit == 0)
                            debit = '';
                        if (credit == 0)
                            credit = '';
                        division.innerHTML += '<tr><td>' + count++ + '</td><td>' + level3[1] + '</td><td>' + note + '</td><td><input type="text" value="' + debit + '"></td><td><input type="text"  value="' + credit + '"></td></tr>';
                        debit_obj.value = '';
                        credit_obj.value = '';
        //                note_obj.value = '';

                        t_debit.innerHTML = total_debit;
                        t_credit.innerHTML = total_credit;
                        setfocus('level3_id');

                        var hr = new XMLHttpRequest();
        //            if (!isNaN(voucher_no)) {
        //                alert("Voucher Type dosn't Selected");
        //            }
                        var url = '<?php echo base_url(); ?>voucher/saveVoucherRow/';
                        hr.open("POST", url, true);
                        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        hr.onreadystatechange = function() {
                            if (hr.readyState == 4 && hr.status == 200) {

                                document.getElementById('loadingIco').style.display = "none";
                                if (total_credit != total_debit) {
                                    document.getElementById('submit_hide').style.display = "inline";
                                    document.getElementById('voucher_submit').style.display = "none";
                                } else {
                                    document.getElementById('submit_hide').style.display = "none";
                                    document.getElementById('voucher_submit').style.display = "inline";
                                }
                            }
                        };
                        hr.send("row=" + row + "&voucher_no=" + voucher_no + "&level3=" + level3[0] + "&note=" + note + "&debit=" + debit + "&credit=" + credit);
                        row++;
                    }
                })


                $('#voucher_submit').click(function() {
                    var v_no = $('#voucher_no').val();
                    var v_date = $('#voucher_date').val();
                    var v_type = $('#voucher_type').val();
                    var v_details = $('#voucher_details').val();

                    if (isNaN(v_type) || v_type == '') {
                        $('#voucher_type').css("border", "1px solid red");
                        return;
                    } else {
                        $('#voucher_type').css("border", "1px solid #CCCCCC");
                    }

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>voucher/saveVoucher',
                        data: {
                            v_no: v_no,
                            v_date: v_date,
                            v_type: v_type,
                            v_details: v_details
                        },
                    }).done(function(data) {
                        $("#dialog-modal").html(data);
                    });
                    $("#dialog-modal").dialog({
                        closeOnEscape: true,
                        modal: true
                    });
                });
            });

        </script>
        
        <div id="tabs-2">
            <?php
            $v = new Voucher();
            $v->voucherViewTable();
            ?>
        </div>
    </div>
</bdoy>
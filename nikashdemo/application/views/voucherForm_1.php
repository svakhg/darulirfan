
<style>
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
    <fieldset>
        <div id="dialog-modal" title="Saving..." style="text-align: center;">
            <img src="<?php echo base_url(); ?>img/loading.gif" alt="Loading..."/>
            <img src="<?php echo base_url(); ?>img/ajax-loader.gif" alt="Loading..."/>
        </div>
        <div id="loading"style="text-align: center;"></div>
        <legend>Voucher Entry:</legend>
        <form action="<?php echo base_url(); ?>voucher/saveVoucher.php" method="post">
            <div  style="background: white; padding: 30px;">
                <table border="0" style="margin: 0px auto;">
                    <tr>
                        <td>Record Id:</td>
                        <td><input type="text" id="voucher_no" readonly="" value="<?php echo time(); ?>" required="1"/></td>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Voucher Date:</td>
                        <td><input type="text" id="voucher_date" readonly="1" name="voucher_date" placeholder="yy-mm-dd" maxlength="10" value="<?php echo date('Y-m-d'); ?>" required="1"/></td>
                        <td>Voucher Details:</td>
                        <td>
                            <textarea name="voucher_details" id="voucher_details"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <h4>&nbsp;</h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <table style=" background: white; margin: 0px auto; padding: 20px;">
                                <tr>
                                    <td>
                                        <select name="level3_id" id="level3_id">
                                            <option value="">------Select Account Head------</option>
                                            <?php
                                            foreach ($level3 as $lvl3) {
                                                ?>
                                                <option value="<?php echo $lvl3->id . '-' . $lvl3->level3_name; ?>"><?php echo $lvl3->level3_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>

                                    <td><input type="text" class="input-medium" id="note" placeholder="Enter Note"></td>
                                    <td><input type="number" class="input-small" id="debit" placeholder="Debit (TK)"></td>
                                    <td>
                                        <input type="number" class="input-small" id="credit" placeholder="Credit (TK)">
                                        <input type="button" value="Add" onclick="ajax_add_row();"
                                               class="btn btn-small btn-primary" style="margin-top: -12px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table class="account_table table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <th style="width: 40%">Account Head</th>
                                                    <th style="width: 35%">Note</th>
                                                    <th style="width: 10%;text-align: right">Debit (TK)</th>
                                                    <th style="width: 10%;text-align: right">Credit (TK)</th>
                                                </tr>
                                            </thead>
<!--                                            <tr>
                                                <td colspan="5" id="load_td1" style="background: white">
                                                    <table id="load_td" style="width: 100%">
                                                        hare load the all amount
                                                    </table>
                                                </td>
                                            </tr>-->
                                            <tbody id="load_td">

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3" width="39%">Debits must equal Credits</td>

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
                            <input type="reset" value="Clear" class=" btn"/>
                            <span id="loadingIco" style="display: none;"><img src="<?php echo base_url() ?>img/loadingIco.gif"/></span>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </fieldset>
</bdoy>

<script type="text/javascript">
//    window.onbeforeunload = goodbye;
    $(function() {
        $("#voucher_date").datepicker({
            changeMonth: true,
            showOn: "button",
            buttonImage: "../img/calendar.gif",
            buttonImageOnly: true
        });
    });
    $(function() {
        $("#transaction_date").datepicker({
            buttonImage: "../img/calendar.gif"
        });
    });

    var count = 1;
    var row = 0;
    var total_debit = 0.00, total_credit = 0.00;
    var level3_dup = new Array();

    function ajax_add_row() {
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
        var level3 = level3.split('-');



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
                document.getElementById('submit_hide').style.display = "inline";
                document.getElementById('voucher_submit').style.display = "none";
            } else {
                t_debit.style.background = "#59B259";
                t_credit.style.background = "#59B259";
                document.getElementById('submit_hide').style.display = "none";
                document.getElementById('voucher_submit').style.display = "inline";
            }
            if (debit == 0)
                debit = '';
            if (credit == 0)
                credit = '';
            division.innerHTML += '<tr><td>' + count++ + '</td><td>' + level3[1] + '</td><td>' + note + '</td><td><input type="text" value="' + debit + '"></td><td><input type="text"  value="' + credit + '"></td></tr>';
            debit_obj.value = '';
            credit_obj.value = '';
            note_obj.value = '';

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
//                    $("#loading").dialog('close');
//                    division.innerHTML += '<tr><td>' + count++ + '</td><td><input type="text" readonly="1" value="' + level3[1] + '" class="level3"> </td><td  class="debit"><input type="text"  value="' + debit + '"></td><td class="credit"><input type="text"  value="' + credit + '"></td><td style="width:12%;">&nbsp;</td></tr>';
//                    debit_obj.value = '';
//                    credit_obj.value = '';
//
//                    t_debit.innerHTML = total_debit;
//                    t_credit.innerHTML = total_credit;
//                    setfocus('level3_id');
                }
            };
            hr.send("row=" + row + "&voucher_no=" + voucher_no + "&level3=" + level3[0] + "&note=" + note + "&debit=" + debit + "&credit=" + credit);
            row++;
//        division.innerHTML = "Requesting...";
//            $("#loading").dialog({
//                title: "loading...",
//                height: 5,
//                modal: true
//            });

        }
    }

    $(document).ready(function() {
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
                closeOnEscape: false,
                modal: true
            });
        });
    });

</script>
<script>
    //return an array of objects according to key, value, or key and value matching
    function getObjects(obj, key, val) {
        var objects = [];
        for (var i in obj) {
            if (!obj.hasOwnProperty(i))
                continue;
            if (typeof obj[i] == 'object') {
                objects = objects.concat(getObjects(obj[i], key, val));
            } else
            //if key matches and value matches or if key matches and value is not passed (eliminating the case where key matches but passed value does not)
            if (i == key && obj[i] == val || i == key && val == '') { //
                objects.push(obj);
            } else if (obj[i] == val && key == '') {
                //only add if the object is not already in the array
                if (objects.lastIndexOf(obj) == -1) {
                    objects.push(obj);
                }
            }
        }
        return objects;
    }

//return an array of values that match on a certain key
    function getValues(obj, key) {
        var objects = [];
        for (var i in obj) {
            if (!obj.hasOwnProperty(i))
                continue;
            if (typeof obj[i] == 'object') {
                objects = objects.concat(getValues(obj[i], key));
            } else if (i == key) {
                objects.push(obj[i]);
            }
        }
        return objects;
    }

//return an array of keys that match on a certain value
    function getKeys(obj, val) {
        var objects = [];
        for (var i in obj) {
            if (!obj.hasOwnProperty(i))
                continue;
            if (typeof obj[i] == 'object') {
                objects = objects.concat(getKeys(obj[i], val));
            } else if (obj[i] == val) {
                objects.push(i);
            }
        }
        return objects;
    }


    var json = '{\n\
        "u1" : {"property1":"1","Age":3, "weight":"4kg"},\n\
        "u2" : {"property1":"2","Age":900, "weight":"30kg"}}';

    var js = JSON.parse(json);

//example of grabbing objects that match some key and value in JSON
    console.log(getObjects(js, 'property1', '1'));
    var a = getObjects(js, 'property1', '');
//    alert(a[0]['weight']);
//    alert(a[1]['weight']);
//returns 1 object where a key names ID has the value SGML

//example of grabbing objects that match some key in JSON
//    console.log(getObjects(js, 'ID', ''));
//returns 2 objects since keys with name ID are found in 2 objects

//example of grabbing obejcts that match some value in JSON
//    console.log(getObjects(js, '', 'SGML'));
//returns 2 object since 2 obects have keys with the value SGML

//example of grabbing objects that match some key in JSON
//    console.log(getObjects(js, 'ID', ''));
//returns 2 objects since keys with name ID are found in 2 objects

//example of grabbing values from any key passed in JSON
//    console.log(getValues(js, 'ID'));
//returns array ["SGML", "44"] 

//example of grabbing keys by searching via values in JSON
//    console.log(getKeys(js, 'SGML'));
//returns array ["ID", "SortAs", "Acronym", "str"] 
</script>
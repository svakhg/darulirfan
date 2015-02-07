<!--<script language="JavaScript" type="text/javascript">

    function ajax_get_json() {
        var division = document.getElementById("load");

        var hr = new XMLHttpRequest();
        var url = "<?php echo base_url(); ?>json/company_json.php";
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
            if (hr.readyState == 4 && hr.status == 200) {
                var data = JSON.parse(hr.responseText);
                division.innerHTML = '';

                for (var obj in data) {
                    division.innerHTML += data[obj].c_id + ' - ';
                    division.innerHTML += data[obj].comp_name + ' - ';
                    division.innerHTML += data[obj].comp_logo + '<hr/>';
                }

            }
        };
        hr.send("comp_=1");
        division.innerHTML = "Requesting...";
    }
    function getCompanyInfo(div, comp_info) {

        var division = document.getElementById(div);

        var hr = new XMLHttpRequest();
        var url = "<?php echo base_url(); ?>json/company_json.php";
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
            if (hr.readyState == 4 && hr.status == 200) {
                var data = JSON.parse(hr.responseText);
                division.innerHTML = '';

                for (var obj in data) {
//                    if(data[obj][comp_info])
                    division.innerHTML += data[obj][comp_info];
                }
            }
        };
        hr.send("comp_=1");
        division.innerHTML = "Requesting...";
    }

</script>-->
<div class="row-fluid">
    <div id="load" class="wel span5">

<!--    <script>ajax_get_json();</script>-->
        <!--
                <div id="test">
                    <script>//getCompanyInfo('test', 'comp_name');</script>
                </div>-->

        <!--<h2>Welcome to <font class="nikash">NIKASH</font><font class="cloud">CLOUD</font></h2>-->
        <h2>Welcome to <img src="<?php echo base_url(); ?>img/nikash_logo.png" alt="Logo"></h2>
        <h5>Accounting Made Easy</h5>
        <div>
            <img src="<?php echo base_url(); ?>img/Accounting.jpg" alt="Accounting" title="Accounting Made Easy"/>
        </div>

<!-- <select onchange="javascript:document.location.href=this.value" class="select_month">
                                                    <option value="<?php echo base_url(); ?>">Select Month</option>
                                                                                    
                                                </select>-->
    </div>


    <div class="well span5">
        <h5>About NIKASH</h5>
        <ol>
            <!--<li>NIKASH is minimalist in design is for SMEs and Micro SMEs in Bangladesh</li>-->
            <li> NIKASH is minimalist in design</li>
            <li> NIKASH is designed by Chartered Accountants for SMEs/MSMEs in the World</li>
            <li> NIKASH does not have feature overload</li>
            <li> NIKASH captures and gives accounting information for any business</li>
            <li> NIKASH has been in use since 1986 in Bangladesh</li>
        </ol>
        <!--    </div>
            
            <div class="well span5">-->
        <!--<h5>More About Nikash 1-9...</h5>-->
        <ol start="6">
            <li> NIKASH's platform has changed to keep up with times</li>
            <li> First NIKASH versions were written in BASIC and Datafles RDBMS</li>
            <li> Currently we Web version - we call it NIKASH in the Cloud</li>
            <li> One only enters transactions (expenditure, income etc real or accrued) and the rest are done automatically by NIKASH</li>
        </ol>
    </div>
    <div class="span2 well pull-right">
        <h4>Financial Year</h4>
        <h5>Begins: <span class="pull-right" id="showBegin"><?php echo $financialYear->fy_begin_date; ?></span></h5>
        <h5>Ends: <span  class="pull-right" id="showEnd"><?php echo $financialYear->fy_end_date; ?></span></h5>

    </div>
    <div class="span2 well pull-right">
        <h4>Vital Information</h4>
        Bank Balance<br><br>
        Cash Balance <br><br>
        Net Surplus/ Deficit <br><br>
        Total Assets <br><br>
    </div>
</div>
<?php
$beginCheck = 0;
if ((empty($financialYear->fy_begin_date) || ($financialYear->fy_begin_date == '0000-00-00')) || (empty($financialYear->fy_end_date) || ($financialYear->fy_end_date == '0000-00-00'))) {
    ?>
    <div id="dialog-modal" title="Financial Year Setup">

        <form action="" method="post">

            <label><span>Financial Year Begins:</span><br>
                <input type="text" id="datepicker" name="fy_begin_date" value="<?php echo $financialYear->fy_begin_date; ?>" readonly="1" placeholder="yyyy-mm-dd" required="1">
            </label>
            <label><span>Financial Year Ends:</span><br>
                <input type="text" id="dateEnd" name="fy_end_date" value="<?php echo $financialYear->fy_end_date; ?>" readonly="1" placeholder="yyyy-mm-dd" required="1"/> 
            </label>

            <br>
            <input type="button" class="btn" id="saveFin" name="posting_send" value="Save">
        </form>
    </div>
    <?php
}
?>
<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
    $(function() {
        $("#dateEnd").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            yearRange: "2010:c+10",
        });
    });
    $("#dialog-modal").dialog({
        closeOnEscape: false,
        modal: true
    });
    
    $(document).ready(function() {
//        $('#datepicker').change(function(){
//            var begin = $('#datepicker').val();
//           begin = begin.split('-');
//           var year = parseInt(begin[0])+1;
//           var end =  year+'-'+begin[1]+'-'+begin[2];
//            $('#dateEnd').val(end);
//        })
        $('#saveFin').click(function() {
            var begin = $('#datepicker').val();
            var end = $('#dateEnd').val();
            if (!begin) {
                $('#datepicker').css('border', '1px solid red');
                return 0;
            } else {
                $('#datepicker').css('border', '1px solid #CCCCCC');
            }
            if (!end) {
                $('#dateEnd').css('border', '1px solid red');
                return 0;
            } else {
                $('#dateEnd').css('border', '1px solid #CCCCCC');
            }
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>admin/financialYearSave',
                data: {
                    fy_begin_date: begin,
                    fy_end_date: end,
                }
            }).done(function(data) {
//                $("#dialog-modal").html(data);
                $('#showBegin').html(begin);
                $('#showEnd').html(end);
                $("#dialog-modal").dialog('close');
                alert(data);
            });
        });
    })
</script>
<?php
$this->load->view('chart');
//echo md5('tcladmin123#');
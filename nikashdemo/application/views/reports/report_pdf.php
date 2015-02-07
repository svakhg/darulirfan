<div id="print_area">
    <style>
        .report_content{
            border: 1px solid #D4D4D4;
            background: white;
            margin: 0px auto;
        }
        .report_header{
            min-height: 120px;
            border-bottom: 1px solid #D4D4D4;
        }
        .table{
            font-size: 13px;
        }
    </style>
    <div class="report_content">
        <div class="report_header text-center" id="a">
             <h3><?php echo @$this->company_name; ?></h3>
            <small><?php echo @$this->address; ?></small>
            <h5><?php echo @$title; ?></h5>
        </div>
        <?php
        echo $report_page;
        ?>
    </div>
    <div class="row-fluid">
    <!--    <div>fci</div>
    <div class="span4">12134545</div>
    <div class="span3">bfd </div>
    -->
    <div class="span5 text-right">
        <p>Closing Balance as at: 
            <em class="text-right">sdf sdfsdsdf<?php// echo $date_to; ?>: 
                <b style="border-bottom: 1px solid">
                    <u>
                        <?php
                        //echo number_format($row_balance,2);
                        ?> 
                    </u>
                </b>
            </em>&nbsp;</p>
    </div>
</div>
</div>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css">
        <script src="<?php echo base_url(); ?>js/jquery/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery/jquery.ui.datepicker.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery/jquery.ui.core.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery/jquery.ui.widget.js"></script>
        <script src="<?php echo base_url(); ?>js/MakeRequestFile.js"></script>
        <script src="<?php echo base_url(); ?>js/voucher.js"></script>

        <link rel="stylesheet" href="/resources/demos/style.css">
        <!--<script src="../../ui/jquery.ui.core.js"></script>-->
        <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js"></script>
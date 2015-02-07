<style>
    #print_area{
        width: 70%;
        margin: 0px auto;
        min-height: 902px;
    }
    .nav_report{
        margin: 0px auto;
    }
</style>
<div class="navbar nav_report" style="width: 70%;">
    <!--Title Link-->
    <div class="navbar-inner" >
        <ul class="nav">
            <li>
                <a onclick="print('print_area');" href="#">
                    <i class="icon-print icon-black"></i>
                    View as Print
                </a>
            </li>
            <li>
                <!--<a target="_blank" href="<?php echo base_url(); ?>reports/printAsPDF/<?php // echo $this->uri->segment(2).'/'.@$this->input->get('voucher_id'); ?>">-->
                <a target="_blank" href="<?php echo base_url(); ?>reports/printAsPDF/<?php echo $this->uri->segment(2) . '/' . @$print_element; ?>">
                    <i  class="icon-file icon-black"></i>
                    Save to PDF
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>reports/saveAsExcel" target="_blank">
                    <i  class="icon-list-alt icon-black"></i>
                    Save To Excel
                </a>
            </li>
        </ul>
    </div>
</div>

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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
    <div class="report_content">
        <div class="report_header text-center" id="a">
            <h3><?php echo @$this->company_name; ?></h3>
            <small><?php echo @$this->address; ?></small>
            <h5><?php echo @$title; ?></h5>
            <h5><u><?php echo @$subTitle1; ?></u></h5>
            <h6><?php echo @$subTitle2; ?></h6>
        </div>
        <?php
        echo $report_page;
        ?>
    </div>
</div>
<!--<script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js"></script>-->


<?php
if (!$this->session->userdata('logged_in')) {
    echo 'UnAuthorized...';
    exit();
}
$user_data = $this->session->userdata('logged_in');
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>..::Nikash Web: Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css" >

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/jquery/jquery.dataTables.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/nikash.css">
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>js/chosen/docsupport/prism.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/chosen/chosen.css">

        <script src="<?php echo base_url(); ?>js/jquery/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery/jquery.ui.datepicker.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery/jquery.ui.core.js"></script>
        <!--<script src="<?php echo base_url(); ?>js/jquery/jquery.ui.widget.js"></script>-->
        <script src="<?php echo base_url(); ?>js/MakeRequestFile.js"></script>
        <script src="<?php echo base_url(); ?>js/voucher.js"></script>


        <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
        <!--<script src="../../ui/jquery.ui.core.js"></script>-->
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>js/jquery/themes/base/jquery.ui.all.css">-->
        <script src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.dialog.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery/jquery.dataTables.js"></script>

        <!--Chosen-->
        <script src="<?php echo base_url(); ?>js/chosen/chosen.jquery.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').dataTable({
                    "aLengthMenu": [
                        [20, 40, 80, 100, -1],
                        [20, 40, 80, 100, "All"]
                    ]
                });
            });
        </script>


        <!---->
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>js/add_row/addRow.js"/></script>-->


<!--<script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>-->
    </head>
    <body>
        <!--    for Popup dialog
            <div id="dialog-modal" title="Saving..." style="text-align: center;">
                <img src="<?php echo base_url(); ?>img/loading.gif" alt="Loading..."/>
                <img src="<?php echo base_url(); ?>img/ajax-loader.gif" alt="Loading..."/>
            </div>-->
        <div class="navbar navbar-fixed-top">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <span class="brand"><a href="<?php echo base_url(); ?>admin/home.php">Dashboard</a></span>

                        <div class="nav-collapse collapse">

                            <ul class="nav">
                                <!--<li class="active"><a href="#"><i class="icon-home icon-black"></i> Dashboard</a></li>-->
                                <?php
                                if ($user_data['power'] == 10) {
                                    ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle"  data-toggle="dropdown"><i
                                                class="icon-dashboard icon-black"></i>
                                            Setup <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url(); ?>admin/addCompany.php">Company Name</a></li>
                                            <li><a href="<?php echo base_url(); ?>admin/financialYear.php">Financial Year</a></li>
                                            <li><a href="<?php echo base_url(); ?>admin/accountType.php">Account Type</a></li>
                                            <li><a href="<?php echo base_url(); ?>voucher/voucherType.php">Voucher type</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown"><i
                                            class="icon-pencil icon-black"></i>
                                        Entry <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>voucher/voucherForm.php">Voucher</a></li>
                                        <li class="dropdown-submenu">
                                            <a href="#">Chart of Accounts</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url(); ?>admin/level1.php">Level-1</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/level2.php">Level-2</a></li>
                                                <li><a href="<?php echo base_url(); ?>admin/level3.php">Level-3/Posting Level</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown"><i
                                            class="icon-file icon-black"></i>
                                        Report <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li  class="dropdown-submenu">
                                            <a href="#">Chart of Accounts</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url(); ?>reports/level1ToLevel2.php">Level 1 and 2</a></li>
                                                <li><a href="<?php echo base_url(); ?>reports/level1ToPosting.php">All Levels (1-2-3)</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>voucher/voucherView.php">Voucher Print</a></li>
                                        <li><a href="<?php echo base_url(); ?>reports/ledger.php">Ledger</a></li>
                                        <li class="dropdown-submenu">
                                            <a href="#">Trial Balance</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url(); ?>reports/trialBalance/view/postingLevel.php">Level-3/Posting Level</a></li>
                                                <li><a href="<?php echo base_url(); ?>reports/trialBalance/view/allLevel.php">All Levels (1-2-3)</a></li>
                                            </ul>
                                        </li>
<!--                                        <li><a href="<?php echo base_url(); ?>reports/cashBook.php">Cash Book</a></li>
                                        <li><a href="<?php echo base_url(); ?>reports/bankBook.php">Bank Book</a></li>-->
                                        <li class="dropdown-submenu">
                                            <a href="#">Financial Statements</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url(); ?>reports/incomeExpenditure.php">Income & Expenditure Account</a></li>
                                                <li><a href="<?php echo base_url(); ?>reports/balanceSheetAllLevel.php">Balance Sheet</a></li>
<!--                                                <li class="dropdown-submenu">
                                                    <a href="<?php echo base_url(); ?>reports/balanceSheet.php">Balance Sheet <br>(Statement of Financial Position)</a>
                                                    <a href="#">Balance Sheet</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo base_url(); ?>reports/balanceSheet.php">Level-3/Posting Level</a></li>
                                                        <li><a href="<?php echo base_url(); ?>reports/balanceSheetAllLevel.php">All Levels (1-2-3)</a></li>
                                                    </ul>
                                                </li>-->
<li></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                                <?php
                                if ($user_data['status'] == 'Admin' || $user_data['status'] == 'Supadmin') {
                                    ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle"  data-toggle="dropdown"><i
                                                class="icon-user icon-black"></i>
                                            Users <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url(); ?>users/createUser.php">Create New User</a></li>
                                            <li><a href="<?php echo base_url(); ?>users/viewUsers.php">All User's List</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>

                            <ul class="nav pull-right settings">
                                <li class="dropdown">
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Account Settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">System Settings</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="nav pull-right settings">
                                <li><a href="<?php echo base_url(); ?>admin/settings.php" class="tip icon logout" data-original-title="Settings"
                                       data-placement="bottom"><i class="icon-large icon-cog"></i></a></li>
                                <li class="divider-vertical"></li>
                                <li><a href="<?php echo base_url(); ?>verifylogin/logout.php" class="tip icon logout" data-original-title="Logout" data-placement="bottom"><i
                                            class="icon-large icon-off"></i></a></li>
                            </ul>
                            <ul class="nav pull-right settings">
                                <li class="divider-vertical"></li>
                            </ul>
                            <p class="navbar-text pull-left">

                            </p>
                            <p class="navbar-text pull-right">
                                <strong>
                                    <?php
//                                    $user_data = $this->session->userdata('logged_in');
                                    echo $user_data['user_name'] . ' : ' . $user_data['comp_name'];
                                    ?> 
                                </strong>
                            </p>
                            <ul class="nav pull-right settings">
                                <li class="divider-vertical"></li>
                            </ul>

                            <!--                                                        <div class="pull-right">
                                                                                        <form class="form-search form-inline" style="margin:5px 0 0 0;" method="post">
                                                                                            <div class="input-append">
                                                                                                <input type="text" name="keyword" class="span2 search-query" placeholder="Search">
                                                                                                <button type="submit" class="btn"><i class="icon-search"></i></button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>-->

                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <!--                                    <div class="span2 pull-left">
                                                    <div class="well sidebar-nav">
                                                        <ul class="nav nav-tabs nav-stacked">
                                                            <li class="nav-header">Navigation</li>
                                                            <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/home.php">Home</a></li>
                                                            <li><a href="#">Link Two</a></li>
                                                            <li><a href="#">Link Three asdfa sdfsd fsadfsd</a></li>
                                                            <li><a href="#">Link Four</a></li>
                                                        </ul>
                                                    </div>
                                                </div>-->
            <!--/.well -->
            <!--/span3-->

            <div class="span10 pull-left" style="width: 100%;">

                <div class="well">

                    <!--                                                <h1>Hello, World!</h1>
                                                        
                                                                    <p>
                                                                        A super admin interface for your projects !
                                                                        For more information about usage, visit <a href="http://twitter.github.com/bootstrap/"
                                                                                                                   target="_blank">Bootstrap</a><br><br>
                                                                        <a class="btn btn-primary btn-large" href="layout-options.html">Layout Options &raquo;</a>
                                                                    </p>-->
                    <?php
                    echo $targetPage;
                    ?>
                </div>

            </div>
            <!--/span9-->
        </div>
        <!--/row-fluid-->
        <hr>
        <footer align="center">
            <p>
                <!--age rendered in <strong>{elapsed_time}</strong> seconds<br>-->
                Copyright &copy; 2014 <strong><a href="http://www.tcl-bd.com" target="_blank">The Computers Ltd.</a></strong>
            </p>
        </footer>
    <!--        <script src="http://code.jquery.com/jquery-latest.min.js"></script>-->
            <!--<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/vendor/jquery-1.8.3.min.js"><\/script>')</script>-->
        <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>js/chart.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/myChart.js" type="text/javascript"></script>
        <script>
            // enable tooltips
            $(".tip").tooltip();
        </script>
        <script type="text/javascript">
            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                '.chosen-select-width': {width: "95%"}
            };
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        </script>
    </body>
</html>

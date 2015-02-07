<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>..:: Nikash > Demo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet" type="text/css" >
        <link href="<?php echo base_url(); ?>css/nikash.css" rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_reg.css">
        <script src="<?php echo base_url(); ?>js/jquery/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/country.js"></script>
        <style type="text/css">
            body
            {
                /*                background-color: #f5f5f5; 005580 FDC52A*/
                background: url(<?php echo base_url(); ?>img/nikash_cloud_white.png) left #36A9E1; 
                color: #2C265E;

            }
            .form-signin
            {
                margin: 0px auto;   
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <div class="container" id="reg-form">
                <form class="form-signin" method="post" action="<?php echo base_url(); ?>login/requestFormSend.php">

                    <!--<span class="form-signin-heading"><font class="nikash">NIKASH</font><font class="cloud">CLOUD</font></span><br>-->
                    
                    <div class="myButton">
                        <span class="form-signin-heading"><img src="<?php echo base_url(); ?>img/nikash_logo.png" alt="Logo"></span><br>
                        <br><span class="form-signin-heading">Accounting Software (Accounting on the go) </span>
                        <h4 class="form-signin-heading">New Registration</h4>
                        <hr/>
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-user"></i></span>
                        <input class="span4" type="text" name="username" placeholder="Your name" required="1">
                    </div>
                    
                    <div class="input-prepend">
                        <span class="add-on">@</span>
                        <input class="span4" type="email" name="email" placeholder="Email Address" required="1">
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-phone"></i></span>
                        <input class="span4" type="number" name="contact" placeholder="Contact No" required="1">
                    </div>
                    
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-phone"></i></span>
                        <input class="span4" type="text" name="comp_name" placeholder="Company Name" required="1">
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-envelope"></i></span>
                        <textarea name="address" class="input-xxlarge span4" placeholder="Company Address"></textarea>
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-phone"></i></span>
                        <!--<select class="form-control bfh-countries" data-country="US"></select>-->
                        <!--<select class="input-medium countries" data-country="US"></select>-->
                        <select  name="country" class="span4">
                            <script type="text/javascript">
                                printCountryOptions('','BD');
                            </script>
                        </select>
                    </div>

<!--                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-key"></i></span>*
                        <input class="span4" type="password" name="password" placeholder="Password" required="1">
                    </div>-->
                    <div class="myButton">
                        <button class="btn btn-large btn-primary" type="submit" name="submit">Submit Request</button>
                        <br>
                        <!--<a href="#">Already have a registration</a>-->
                        <a href="<?php echo base_url(); ?>login.php">Login for existing users</a>
                    </div>

                <?php
                if ($this->session->userdata('msg')) {
                    echo $this->session->userdata('msg');
                    $this->session->unset_userdata('msg');
                }
                ?>
                </form>
                
            </div>
            <div>
            </div>
        </div>
        <!-- /container -->
    </body>
</html>
<?php

//echo md5('admin123#');


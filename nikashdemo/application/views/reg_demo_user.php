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
        <script src="<?php echo base_url(); ?>js/jquery/jquery-1.10.2.js"></script>
        <style type="text/css">
         

            body
            {
                padding: 0%;
                /*                background-color: #f5f5f5; 005580 FDC52A*/
                background: url(<?php echo base_url(); ?>img/nikash_cloud_white.png) left #36A9E1; 
                color: #2C265E;

            }
            .navbar{
                /*background: url(<?php echo base_url(); ?>img/nikash_cloud_white.png) left #36A9E1;*/ 
            }

            .form-signin
            {
                max-width: 340px;
                padding: 19px 29px 29px;
                margin: 5% auto 20px;
                background-color: #FFF;
                /*border: 1px solid #bbb;*/
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 10px;
                box-shadow: 0 1px 10px #a7a7a7, inset 0 1px 0 #fff;
            }

            .form-signin .form-signin-heading,
            .form-signin .checkbox
            {
                margin-bottom: 10px;
            }

            .form-signin input[type="text"],
            .form-signin input[type="number"]
            {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 4px 9px;
            }
            .form-signin input[type="email"],
            .form-signin input[type="password"]{
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 4px 7px;
            }
            #login-form{
                display: none;
            }
            .form-signin a{
                color: #2C265E;
            }
            .add-on{
                width: 30px;
                background: red
            }
            .myButton{
                text-align: center; 
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <div class="container" id="reg-form">
                <form class="form-signin" method="post" action="<?php echo base_url(); ?>demo/DemoUser.php">

                    <!--<span class="form-signin-heading"><font class="nikash">NIKASH</font><font class="cloud">CLOUD</font></span><br>-->
                    
                    <div class="myButton">
                        <span class="form-signin-heading"><img src="<?php echo base_url(); ?>img/nikash_logo.png" alt="Logo"></span><br>
                        <br><span class="form-signin-heading">Accounting Software (Accounting made easy) </span>
                        <h4 class="form-signin-heading">Registration for the Demo version</h4>
                        <hr/>
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-user"></i></span>
                        <input class="span4" type="text" name="username" placeholder="Your name" required="1">
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-envelope"></i></span>
                        <input class="span4" type="email" name="email" placeholder="Email Address" required="1">
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-phone"></i></span>
                        <input class="span4" type="number" name="contact" placeholder="Contact No" required="1">
                    </div>

                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-key"></i></span>*
                        <input class="span4" type="password" name="password" placeholder="Password" required="1">
                    </div>
                    <div class="myButton">
                        <button class="btn btn-large btn-primary" type="submit" name="submit">Sign Up for Demo version</button>
                        <br>
                        <!--<a href="#">Already have a registration</a>-->
                        <!--<a href="<?php echo base_url(); ?>login.php">Already have a registration</a>-->
                        <a href="#login-form" id="login">Already have a registration</a>
                    </div>
                </form>
            </div>
            <div class="container" id="login-form">
                <form class="form-signin" method="post" action="<?php echo base_url(); ?>demo/DemoUserLogin.php">


                    <h4 class="form-signin-heading">Login for Demo Version</h4>
                    <hr/>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-envelope"></i></span>
                        <input class="span3" type="email" name="email" placeholder="Email Address" required="1">
                    </div>

                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-large icon-key"></i></span>
                        <input class="span3" type="password" name="password" placeholder="Password" required="1">
                    </div>
                    <button class="btn btn-large btn-primary" type="submit" name="submit">Login for Demo version</button>
                    <br>
                    <!--<a href="#">Already have a registration</a>-->
                    <a href="#reg-form" id="reg">New Registration</a>
                </form>
            </div>
            <div>
                <?php
                if ($this->session->userdata('message')) {
                    echo '<span class="icon-warning-sign"> ' . $this->session->userdata('message') . '</span>';
                    $this->session->unset_userdata('message');
                }
                ?>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                //                $('#login-form').slideUp();
                $('#login').click(function() {
                    $('#reg-form').slideUp('fast');
                    $('#login-form').slideDown('fast');
                });
                $('#reg').click(function() {
                    $('#login-form').slideUp('fast');
                    $('#reg-form').slideDown('fast');
                });
            });
        </script>
        <!-- /container -->
    </body>
</html>
<?php

//echo md5('admin123#');


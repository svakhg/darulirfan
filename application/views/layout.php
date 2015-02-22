<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <base href="<?php echo base_url(); ?>
    ">
    <title>Darul Irfan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="static/css/bootstrap.css" rel="stylesheet">
    <style>
            body {
                padding-top: 50px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>
    <script type="text/javascript">
                    var baseurl = "<?php print base_url(); ?>index.php/";</script>
    <link href="static/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="static/css/ng-grid.min.css" rel="stylesheet">
    <link href="static/css/site.css" rel="stylesheet">
    <link href="static/css/smoothness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet"/>
    <!-- Kendo init -->
    <link rel="stylesheet" href="static/js/kendo/kendo.common.min.css" />
    <link rel="stylesheet" href="static/js/kendo/kendo.default.min.css" />
    <link rel="stylesheet" href="static/js/kendo/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="static/js/kendo/kendo.dataviz.default.min.css" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script>
            var BASE_URL = "<?php echo site_url(); ?>/";</script>

</head>

<body>

    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">DIHM</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                    <?php echo $menu; ?>
<li><a href="<?php echo site_url(); ?>/login/logout">Logout</a></li>
                    </ul>
            </div><!--/.nav-collapse -->
          </div>
    </nav>


<div class="container">

<div class="darulirfan" ng-app="project">

    <div ng-view></div>

</div>

</div>
<!-- /container -->

<!-- Le javascript
        ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="static/js/jquery-1.9.1.js"></script>

<!-- ui-select files -->
<!--<script src="static/js/select.js"></script>
<link rel="stylesheet" href="static/css/select.css">

<script src="demo.js"></script>
Select2 theme
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.css">
Selectize theme
          Less versions are available at https://github.com/brianreavis/selectize.js/tree/master/dist/less
        -->
<!-- <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.default.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.bootstrap2.css">
-->
<!-- <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.bootstrap3.css">
-->
<!-- <script src="static/js/angular-datatables.min.js"></script>
-->
<script src="static/js/angular.js"></script>
<script src="static/js/kendo/kendo.all.min.js"></script>

<script src="static/js/angular-resource.js"></script>
<script src="static/js/bootstrap.min.js"></script>
<script src="static/js/ngProgress.js"></script>

<script src="static/js/ng-grid.js"></script>
<script src="static/js/ui-bootstrap-tpls-0.5.0.min.js"></script>
<script src="static/js/jQuery-ui-directive.js"></script>
<script src="static/js/toastr.min.js"></script>
<script src="static/appScript/app.js"></script>
<link href="static/css/toastr.min.css" rel="stylesheet">
<script src="static/js/jquery-ui-1.10.2.custom.min.js"></script>

<script src="static/js/custom.js"></script>
</body>
</html>
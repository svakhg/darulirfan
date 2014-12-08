<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <base href="<?php echo base_url(); ?>">
    <title>AngularJS and CodeIgniter</title>
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
    <link href="static/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="static/css/ng-grid.min.css" rel="stylesheet">
	<link href="static/css/site.css" rel="stylesheet">
	<link href="static/css/smoothness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet"/>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

 
    <script>
      var BASE_URL = "<?php echo site_url(); ?>/";
    </script>

  </head>

  <body>
  
	 <div class="navbar xnavbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav" id="top-nav">
                       <?php echo $menu;?>  
						
							
                    </ul>
                </div>
            </div>
        </div>

    <div class="container">

      <div ng-app="project">
        
        <div class="page-header">
          <span>Projects</span> <a class="pull-right" href="<?php echo site_url(); ?>/login/logout">Logout</a>
        </div>

        <div ng-view></div>

      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	  <!-- <script src="static/js/jquery-1.9.1.js"></script> -->
    <!-- Kendo init -->
  <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.dataviz.default.min.css" />

    <script src="http://cdn.kendostatic.com/2014.3.1119/js/jquery.min.js"></script>
    <script src="http://cdn.kendostatic.com/2014.3.1119/js/kendo.all.min.js"></script>
  <!-- Kendo init -->

<!-- <script src="static/js/jquery.dataTables.min.js"></script> -->
    <script src="static/js/angular.js"></script>

<!-- <script src="static/js/angular-datatables.min.js"></script> -->

   
    <script src="static/js/angular-resource.js"></script>
    <script src="static/js/bootstrap.min.js"></script>	
	<script src="static/js/ng-grid.js"></script>	
	<script src="static/js/ui-bootstrap-tpls-0.5.0.min.js"></script>
	<script src="static/js/jQuery-ui-directive.js"></script>
	<script src="static/js/toastr.min.js"></script>
    <script src="static/appScript/app.js"></script>
	<link href="static/css/toastr.min.css" rel="stylesheet">
	<script src="static/js/jquery-ui-1.10.2.custom.min.js"></script>
  <script src="http://rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
<script type="text/javascript">
$(function () {
    $( '#table' ).searchable({
        striped: true,
        oddRow: { 'background-color': '#f5f5f5' },
        evenRow: { 'background-color': '#fff' },
        searchType: 'fuzzy'
    });
    
    $( '#searchable-container' ).searchable({
        searchField: '#container-search',
        selector: '.row',
        childSelector: '.col-xs-4',
        show: function( elem ) {
            elem.slideDown(100);
        },
        hide: function( elem ) {
            elem.slideUp( 100 );
        }
    })
});
</script>
  </body>
</html>
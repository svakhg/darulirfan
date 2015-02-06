<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <base href="<?php echo base_url(); ?>">
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
                    var baseurl = "<?php print base_url(); ?>index.php/";
        </script>
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

        <div class="navbar navbar-static navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <?php echo $menu; ?>  
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">

            <div ng-app="project">

                <div>
                    <span></span> <a class="btn btn-danger pull-right" href="<?php echo site_url(); ?>/login/logout">Logout</a>
                </div>

                <div ng-view></div>

            </div>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="static/js/jquery-1.9.1.js"></script>
        <!-- Kendo init -->
        <link rel="stylesheet" href="static/js/kendo/kendo.common.min.css" />
        <link rel="stylesheet" href="static/js/kendo/kendo.default.min.css" />
        <link rel="stylesheet" href="static/js/kendo/kendo.dataviz.min.css" />
        <link rel="stylesheet" href="static/js/kendo/kendo.dataviz.default.min.css" />

        <script src="static/js/jquery-1.9.1.js"></script>
        <script src="static/js/kendo/kendo.all.min.js"></script>


        <!--    <base href="http://demos.telerik.com/kendo-ui/grid/index">
            <style>html { font-size: 12px; font-family: Arial, Helvetica, sans-serif; }</style>
            <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.common.min.css" />
            <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.default.min.css" />
            <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.dataviz.min.css" />
            <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.dataviz.default.min.css" />
        
            <script src="http://cdn.kendostatic.com/2014.3.1119/js/jquery.min.js"></script>
            <script src="http://cdn.kendostatic.com/2014.3.1119/js/kendo.all.min.js"></script>
        -->
        <!-- Kendo init -->

<!-- <script src="static/js/jquery.dataTables.min.js"></script> -->
        <script src="static/js/angular.js"></script>

        <!-- ui-select files -->
        <script src="static/js/select.js"></script>
        <link rel="stylesheet" href="static/css/select.css">

        <!-- <script src="demo.js"></script> 

        <!-- Select2 theme -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.css">

        <!--
          Selectize theme
          Less versions are available at https://github.com/brianreavis/selectize.js/tree/master/dist/less
        -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.default.css">
        <!-- <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.bootstrap2.css"> -->
        <!-- <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.bootstrap3.css"> -->

        
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
                    // $(function () {
                    //     $( '#table' ).searchable({
                    //         striped: true,
                    //         oddRow: { 'background-color': '#f5f5f5' },
                    //         evenRow: { 'background-color': '#fff' },
                    //         searchType: 'fuzzy'
                    //     });

                    //     $( '#searchable-container' ).searchable({
                    //         searchField: '#container-search',
                    //         selector: '.row',
                    //         childSelector: '.col-xs-4',
                    //         show: function( elem ) {
                    //             elem.slideDown(100);
                    //         },
                    //         hide: function( elem ) {
                    //             elem.slideUp( 100 );
                    //         }
                    //     })
                    // });
                    // </script>

                    <script src="static/js/custom.js"></script>
    </body>
</html>
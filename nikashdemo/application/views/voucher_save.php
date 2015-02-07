<link rel="stylesheet" href="/resources/demos/style.css">
<!--<script src="../../ui/jquery.ui.core.js"></script>-->
<link rel="stylesheet" href="<?php echo base_url(); ?>js/jquery/themes/base/jquery.ui.all.css">
<script src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.mouse.js"></script>
<script src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.draggable.js"></script>
<script src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.position.js"></script>
<script src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.resizable.js"></script>
<script src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.button.js"></script>
<script src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.dialog.js"></script>
<script>
    $(document).ready(function() {
        $('#clk').click(function() {
            $("#dialog-modal").dialog({
                height: 150,
                width: 220,
                closeOnEscape: false,
                modal: true
            });
        });
    })
</script>
<style>
    .ui-dialog-titlebar-close {
        visibility: hidden;
    }
    #dialog-modal{
        display: none;
    }
</style>
</head>
<body>
    <button id="clk">Click</button>
    <div id="dialog-modal" title="Saving..." style="text-align: center;">
        <img src="<?php echo base_url(); ?>img/loading.gif" alt="Loading..."/>
        <img src="<?php echo base_url(); ?>img/ajax-loader.gif" alt="Loading..."/>
    </div>

    <p>Sed vel diam id libero <a href="http://example.com">rutrum convallis</a>. Donec aliquet leo vel magna. Phasellus rhoncus faucibus ante. Etiam bibendum, enim faucibus aliquet rhoncus, arcu felis ultricies neque, sit amet auctor elit eros a lectus.</p>

<div id="dialog-modal" title="Legder View">


    <form action="<?php echo base_url(); ?>reports/ledgerView.php" method="post">
        <label for="postingLevel">Select Account Head:</label>
        <select id="postingLevel" name="postingLevel" required="1" data-placeholder="Choose a Account Head..." class="chosen-select">
            <option value=""></option>
            <?php
            foreach ($postingLevel as $pl) {
                ?>
                <option value="<?php echo $pl->id . '-' . $pl->level3_name; ?>"><?php echo $pl->level3_name; ?></option>
                <?php
            }
            ?>
        </select>
        
        <label><span>Date From:</span></label>
        <input type="text" id="datepicker" name="date_from"value="<?php echo date('Y-m-d', mktime(0, 0, 0, date('m') - 1, date('d'), date('Y'))); ?>">

        <label><span>Date To:</span></label>
        <input type="text" id="datepicker_2" name="date_to" value="<?php echo date('Y-m-d'); ?>">
        <br>
        <input type="submit" class="btn" name="posting_send" value="View">
    </form>
</div>
<!--<div id="dialog-modal" title="Saving..." style="text-align: center;">
    <img src="<?php echo base_url(); ?>img/loading.gif" alt="Loading..."/>
    <img src="<?php echo base_url(); ?>img/ajax-loader.gif" alt="Loading..."/>
</div>-->

<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
    $(function() {
        $("#datepicker_2").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
    $("#dialog-modal").dialog({
        closeOnEscape: true,
        width: '300px',
        height: '390',
        modal: true
    });
</script>
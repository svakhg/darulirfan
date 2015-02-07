<div id="dialog-modal" title="Income Expenditure">

    <form action="<?php echo base_url(); ?>reports/incomeExpandSubmit.php" method="post">
        <select name="level">
            <option value="allLevel">All Level</option>
            <option value="postingLevel">Posting Level only</option>
        </select>
        <label><span>Date From:</span>
            <input type="text" id="datepicker" name="date_from" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date('m') - 1, date('d'), date('Y'))); ?>">
        </label>
        <label><span>Date To:</span>
            <input type="text" id="datepicker_2" name="date_to" value="<?php echo date('Y-m-d'); ?>">
        </label>

        <br>
        <input type="submit" class="btn" name="posting_send" value="View">
    </form>
</div>

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
        modal: true
    });
</script>
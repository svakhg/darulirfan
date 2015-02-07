

<label>Financial Year Begins: <input type="text" name="" id="datepicker"></label>
<label>Financial Year Ending: <input type="text" name="" id="end_date"></label>
<button class="btn">Save</button>

<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: "button",
            buttonImage: "../img/calendar.gif",
            buttonImageOnly: true
        });
        $("#datepicker").change(function() {
            var d = $('#datepicker').val();
            $('#end_date').val() = d;
        });
    });

</script>
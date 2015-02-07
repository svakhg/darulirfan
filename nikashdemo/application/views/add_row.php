
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/add_row/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/add_row/addRow.js"/></script>

<table id='tblDetail' border="1" rules="all">
    <thead>
        <tr class='trHead'>
            <th></th>
            <th>Std Name</th>
            <th>C_Theory</th>
            <th>F_Theory</th>
            <th>C_Pract</th>
            <th>F_Pract</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr class='trData'>
            <td align='center' >
                <input type='button' class='clsRemove' value='X' style="width: 15px; height: 20px; font-size:xx-small;" />
            </td>
            <td align="left">
                <input type='text' style="width: 140px;" class="clsStdName" value="" />
            </td>
            <td align="left">
                <input type='text' style="width: 60px; text-align:right;" class="clsC_Theory" value="" />
            </td>
            <td align="center">
                <input type="text" style="width: 60px; text-align:right;" class="clsF_Theory" value="" />
            </td>
            <td align="left">
                <input type='text' style="width: 60px; text-align:right;" class="clsC_Pract" value="" />
            </td>
            <td align="center">
                <input type="text" style="width: 60px; text-align:right;" class="clsF_Pract" value="" />
            </td>
            <td align="left">
                <input type='text' style="width: 50px; text-align:right;" class="clsTotal" value="" />
            </td>
            <td align="center">
                <input type="button" id="btnAddRow" class='add'	value="+" style="width: 15px; height: 20px; font-size:xx-small;" />
            </td>
        </tr>
    </tbody>
</table>
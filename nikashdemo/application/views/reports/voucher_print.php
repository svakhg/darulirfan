<div>
    <table class="table">
        <tr>
            <th>Voucher No</th>            
            <td>:</td>
            <td><em><?php echo $selectVoucher->voucher_no; ?></em></td>
            <th>Computer Code</th>            
            <td>:</td>
            <td><em><?php echo $selectVoucher->voucher_no_form; ?></em></td>
        </tr>
<!--        <tr>
            <th>Voucher No</th>
            <td>:</td>
            <td><em><?php echo $selectVoucher->voucher_no; ?></em></td>
            <th>Voucher Code</th>
            <td>:</td>
            <td><em><?php echo $selectVoucher->details; ?></em></td>
        </tr>-->
        <tr>
            <th>Voucher Date</th>            
            <td>:</td>
            <td><em><?php echo $selectVoucher->voucher_date; ?></em></td>
            <th>Voucher Details</th>            
            <td>:</td>
            <td><em><?php echo $selectVoucher->voucher_details; ?></em></td>
        </tr>
<!--        <tr>
            <th>Transaction Date</th>           
            <td>:</td>
            <td><em><?php echo $selectVoucher->transaction_date; ?></em></td>
            <th>Transaction Details</th>            
            <td>:</td>
            <td><em><?php echo $selectVoucher->transaction_details; ?></em></td>
        </tr>-->

    </table>
</div><hr>
<table class="table">
    <tr>
        <th>#</th>
        <th>Account Head</th>
        <th style="text-align: right;">Debit<br> (TK)</th>
        <th style="text-align: right;">Credit<br> (TK)</th>
    </tr>
    <?php
    $count = 1;
    $t_credit = 0;
    $t_debit = 0;
    foreach ($selectVoucherChild as $child) {
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $child->level3_name; ?></td>
            <?php

                $t_debit += $child->debit;
                $t_credit += $child->credit;
            ?>
            <td style="text-align: right;"><?php echo number_format($child->debit, '2');?></td>
            <td style="text-align: right;"><?php echo number_format($child->credit, '2'); ?></td>
        </tr>
        <?php
    }
    ?>
    <tr>
        <td colspan="2"><b>Total Taka:</b></td>
        <td style="text-align: right;"><b style="border-bottom: 1px solid"><u><?php echo number_format($t_debit, '2'); ?></u></b></td>
        <td style="text-align: right;"><b style="border-bottom: 1px solid"><u><?php echo number_format($t_credit, '2'); ?></u></b></td>
    </tr>
</table>
<div class="row-fluid">
    
    <br><br>
    <div class="span4">
        <p>Prepared By:</p>
    </div>
    <div class="span4">
        <p>Checked By:</p>
    </div>
    <div class="span3 pull-right">
        <p>Approved By:</p>
    </div>
    <br><br>
</div>
<!--<div class="row-fluid">
    
    <br><br>
    <div class="span2" style="text-decoration: overline;">
        <p>Officer</p>
    </div>
    <div class="span3" style="text-decoration: overline;">
        <p>Accountant</p>
    </div>
    <div class="span2" style="text-decoration: overline;">
        <p>Chief Accountant</p>
    </div>
    <div class="span4" style="text-decoration: overline;">
        <p>Receiver's Signature</p>
    </div>
</div>-->
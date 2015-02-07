<h5 class="text-center"><?php // echo $level3_name;        ?></h5>
<div class="row-fluid">
    <div class="span4">
        <!--Ledger of: <strong><u><?php // echo $level3_name;        ?></u></strong>-->
    </div>
    <div class="span3">
        <!--<p><i><?php echo $date_from; ?></i> - <i><?php echo $date_to; ?></i></p>-->
    </div>
    <div class="span5 text-right">
        <p>Opening Balance as at: 
            <em class="text-right"><?php echo $date_from; ?> 
                <b style="border-bottom: 1px solid">
                    TK:
                    <?php
                    $Opening_balance = $openingBalance->t_debit - $openingBalance->t_credit;
                    $opb = $Opening_balance == '' ? '0.00' : number_format($Opening_balance);
                    if ($opb < 0) {
                        echo '(' . $opb . ')';
                    } else {
                        echo $opb;
                    }
                    ?> 

                </b>
            </em>&nbsp;</p>
    </div>
</div>
<table class="table">
    <tr>
        <th>#</th>
        <th>Voucher Date</th>
        <th>Voucher No</th>
        <th>Note</th>
        <th style="text-align: right;">Debit (TK)</th>
        <th style="text-align: right;">Credit (TK)</th>
        <th style="text-align: right;">Balance (TK)</th>
    </tr>
    <?php
    $count = 1;
    $t_debit = 0;
    $t_credit = 0;
    foreach ($selectVoucher as $v) {
        $t_debit+=$v->debit;
        $t_credit+=$v->credit;
        $row_balance = $Opening_balance + $t_debit - $t_credit;
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $v->voucher_date; ?></td>
            <td><?php echo $v->voucher_no; ?></td>
            <td><?php echo $v->note; ?></td>
            <td style="text-align: right;"><?php echo number_format($v->debit); ?></td>
            <td style="text-align: right;"><?php echo number_format($v->credit); ?></td>
            <td style="text-align: right;"><?php echo number_format($row_balance); ?></td>
        </tr>

        <?php
    }
    ?>
    <tr>
        <td colspan="3"></td>
        <!--<td colspan="2" style="text-align: right;">Closing Balance as at <i><?php //echo $date_to;         ?></i>:</td>-->
        <td colspan="4" style="text-align: right;font-size: 1.1em"> Closing Balance as at <i><?php echo $date_to; ?></i>  <b style="border-bottom: 1px solid"><u>
                    TK: 
                    <?php
                    if (isset($row_balance) && $row_balance <= 0) {
                        echo '(' . number_format($row_balance*-1) . ')';
                    } else {
                        echo number_format(@$row_balance);
                    }
                    ?>
                </u></b>
        </td>
    </tr>
</table>
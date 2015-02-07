<?php
if ($level == 'allLevel') {
    ?>
    <style>
        .hir li{
            border-top: 1px solid #D0D0D0;
        }
    </style>
    <!--    <ul> 
            <li>-->
    <div class="row-fluid bold">
        <span class="span3 pull-left">
            Account Head
        </span>
        <span class="span4 pull-right">
            <span class="span6 text-right">Debit<br>(TK)</span>
            <span class="span6 text-right">Credit<br>(TK)</span>
        </span>
    </div>
    <!--        </li>
        </ul>-->
    <ul class="hir">
        <?php
        $level1 = '';
        $level2 = '';
        $totalBalance = 0;
        $debit = 0;
        $credit = 0;
        foreach ($AllLable as $row) {
            ?>
            <?php
            if ($level1 == $row->level1_name) {
//                continue;
            } else {
                $level1 = $row->level1_name;
                ?>
                <li><?php echo @$row->level1_name; ?>
                <?php }
                ?>

                <ul>
                    <?php
                    if ($level2 == $row->level2_name) {
                        
                    } else {
                        $level2 = $row->level2_name;
                        ?>
                        <li>
                            <?php echo @$row->level2_name; ?>
                            <?php
                        }
                        ?>
                        <ul>
                            <li><?php
                                echo @$row->level3_name;
                                $totalBalance += $row->balance;
                                if ($row->balance >= 0) {  //----------debit
                                    ?>
                                    <span class="text-center pull-right" style="margin-right: 18%;"><?php
                                        echo number($row->balance);
                                        $debit+= $row->balance;
                                        $totalBalance += $row->balance;
                                        ?>
                                    </span>
                                    <?php
                                } else {//-------credit
                                    ?>
                                    <span class="text-center pull-right"><?php
                                        echo number($row->balance * -1);
                                        $credit += $row->balance;
                                        $totalBalance += $row->balance;
                                        ?>
                                    </span>
                                    <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php
        }
        ?>
    </ul>
    <div class="row-fluid bold borderTop">
        <span class="span3 pull-left">
            Total
        </span>
        <span class="span4 pull-right">
            <span class="span6 text-right"><span class="underlineD"><?php echo number($debit); ?></span></span>
            <span class="span6 text-right"><span class="underlineD"><?php echo number($credit*-1); ?></span></span>
        </span>
    </div>

    <?php
} elseif ($level == 'postingLevel') {
    ?>
    <style>

    </style>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>Account Head</th>
                <th class="text-right">Debit<br>(TK)</th>
                <th class="text-right">Credit<br>(TK)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $t_debit = 0;
            $t_credit = 0;
            foreach ($level3 as $row) {
                if ($row->balance > 0) {
                    $t_debit+= $debit = $row->balance;
                    $credit = '';
                } else {
                    $t_credit+= $credit = $row->balance;
                    $debit = '';
                }
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row->level3_name; ?></td>
                    <td class="text-right"><?php echo $debit; ?></td>
                    <td class="text-right"><?php echo $credit * -1 == 0 ? '' : $credit * -1; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td class="text-right"><span class="underlineD"><?php echo number($t_debit); ?></span></td>
                <td class="text-right"><span class="underlineD"><?php echo number(-1 * $t_credit); ?></span>
                </td>
            </tr>
        </tfoot>
    </table>
    <?php
} else {
    redirect(base_url());
}    
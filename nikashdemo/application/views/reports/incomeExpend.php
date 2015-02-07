<style>
    .hir li{
        border-top: 1px solid #D0D0D0;
    }
    .table-condensed td{
        margin: 0;
        padding: 0;
    }
</style>

<?php
if ($level == 'postingLevel') {
    ?>
    <ul style="list-style: none;">
        <li><b>Account Head</b><b class="pull-right">TK</b></li>
    </ul>
    <ul class="hir">
        <?php
        foreach ($accountType as $accType) {
            ?>
            <li><?php echo $accType; ?>
                <ul>
                    <?php
                    foreach ($accountType_bal as $blalanceWithHead) {
                        foreach ($blalanceWithHead as $list) {
                            if ($accType == $list->type) {
                                ?>
                                <li><?php echo $list->level3_name; ?>
                                    <span class="text-center pull-right" style="margin-right: 1%;"><?php echo $list->balance; ?></span>
                                </li>
                                <?php
                            }
                        }
                    }
                    ?>
                </ul>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
} else {
    ?>
    <table class=" table table-striped table-condensed">

        <thead>
            <tr>
                <th>Account type</th>
                <th>Level 1</th>
                <th>Level 2</th>
                <th>level 3</th>
                <th style="text-align: right;">L3</th>
                <th style="text-align: right;">L2</th>
                <th style="text-align: right;">L1</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($EBdata as $key => $value) {
                foreach ($value as $value1) {
                    $data[$key][$value1->level1_name][$value1->level2_name][] = $value1->level3_name . '###' . $value1->balance . '';
                }
            }
            $directIncome = 0;
            $directExp = 0;
            $IndirectIncome = 0;
            $IndirectExp = 0;
            $lvl_1BAL = 0;
            $lvl_2BAL = 0;
            $grossMargin = 0;
            $grossPlusIndi = 0;
            foreach ($accountType as $accType) {
                ?>
                <tr>
                    <td colspan="7" class="bold"><?php echo $accType; //for Accounnt type                                        ?></td>
                </tr>
                <?php
                if (!isset($data[$accType])) {
                    $data[$accType] = '';
                }else{
                    foreach ($data[$accType] as $key => $level1) {
                        ?>
                        <tr>
                            <td></td>
                            <td colspan="6">
                                <?php
                                echo $key;
                                ?>
                            </td>
                        </tr>
                        <?php
                        foreach ($level1 as $key2 => $level2) {
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td colspan="5"><?php echo $key2; ?></td>
                            </tr>
                            <?php
                            foreach ($level2 as $key3 => $level3) {
                                list($level3_name, $balance) = explode('###', $level3);
                                $lvl_1BAL +=$balance;
                                $lvl_2BAL +=$balance;
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <?php echo $level3_name; ?>
                                    </td>
                                    <td style="text-align: right;">
                                        <?php
                                        if ($accType == 'Direct Income' || $accType == 'Indirect Income') {
                                            echo $balance * -1;
                                        } else {
                                            echo $balance;
                                        }
                                        ?>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr class="borderTop italic">
                                <td></td>
                                <td></td>
                                <td>Sub-Total <?php //echo $key2;                       ?>:</td>
                                <td></td>
                                <td></td>
                                <td style="text-align: right;">
                        <sapn>
                            <?php
                            //                        echo number($lvl_2BAL);
                            if ($accType == 'Direct Income' || $accType == 'Indirect Income') {
                                echo $lvl_2BAL * -1;
                            } else {
                                echo number($lvl_2BAL);
                            }
                            $lvl_2BAL = 0;
                            ?>
                        </sapn>
                    </td>
                    <td></td>
                    </tr>

                    <?php
                }
                ?>
                <tr class="borderTop italic bold">
                    <td></td>
                    <td>Total <?php //echo $key;                       ?>:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">
                        <span>
                            <?php
                            if ($accType == 'Direct Income') {
                                $directIncome = $lvl_1BAL;
                            }
                            if ($accType == 'Direct Expenses') {
                                $directExp = $lvl_1BAL;
                            }
                            if ($accType == 'Indirect Income') {
                                $IndirectIncome = $lvl_1BAL;
                            }
                            if ($accType == 'Indirect Expenses') {
                                $IndirectExp = $lvl_1BAL;
                            }
                            if ($accType == 'Indirect Expenses') {
                                echo '<span class="underline">' . number($lvl_1BAL) . '</span>';
                            } else if ($accType == 'Direct Income' || $accType == 'Indirect Income') {
                                echo $lvl_1BAL * -1;
                            } else {
                                echo number($lvl_1BAL);
                            }
                            $lvl_1BAL = 0;
                            ?>
                        </span>
                    </td>
                </tr> 
                <?php
            }
            ?>
            <?php
            if ($accType == 'Direct Expenses') {
                ?>
                <tr class="bold italic">
                    <td></td>
                    <td colspan="4">Gross Margin</td>
                    <td colspan="2" style="text-align: right;">
                        <?php
                        $grossMargin = $directIncome + $directExp;
                        echo number(($grossMargin) * -1);
                        ?>
                    </td>
                </tr>
                <?php
            }
            if ($accType == 'Indirect Income') {
                ?>
                <tr class="bold italic">
                    <td></td>
                    <td colspan="4">Gross Margin plus Indirect Income</td>
                    <td colspan="2" style="text-align: right;">
                        <span class="">
                            <?php
                            $grossPlusIndi = $grossMargin + $IndirectIncome;
                            echo number($grossPlusIndi * -1);
                            ?>
                        </span>
                    </td>
                </tr>
                <?php
            }
            if ($accType == 'Indirect Expenses') {
                ?>
                <tr class="bold italic">
                    <td></td>
                    <td colspan="4">Net Surplus/ (Deficit)</td>
                    <td colspan="2" style="text-align: right;">
                        <span class="underlineD">
                            <?php
                            $deficit = $grossPlusIndi + $IndirectExp;
                            echo number($deficit * -1);
                            ?>
                        </span>
                    </td>
                </tr>
                <?php
            }
        }
    }
    ?>
    </tbody>
    </table>
    <?php
}
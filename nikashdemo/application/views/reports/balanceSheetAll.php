<?php
//echo '<pre>';
//print_r($AccType);

foreach ($AccType as $key => $value) {
    foreach ($value as $value1) {
        $data[$key][$value1->level1_name][$value1->level2_name][] = $value1->level3_name . '###' . $value1->balance . '';
    }
}
//print_r($data);
//echo '</pre>';
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
            <th style="text-align: right;">Type</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $subTotal = 0;
        $total = 0;
        $typeTotal = 0;

        $total_fixedAsset = 0;
        $total_accm_def = 0;
        $total_cur_assets = 0;
        $total_asset = 0;
        $total_cur_lib = 0;
        $total_retEarn = 0;
        $net_cur_asset = 0;
        $net_book_value = 0;
        $total_share_capital = 0;
        $total_reserve = 0;
        $total_longLibility = 0;
        $equity = 0;
        foreach ($accountType as $accType) {
            ?>
            <tr>
                <td colspan="8" class="bold"><?php echo $accType; //for Accounnt type                                                             ?></td>
            </tr>
            <?php
            if (!isset($data[$accType])) {
                $data[$accType] = '';
            } else {
                foreach ($data[$accType] as $key => $level1) {
                    ?>
                    <tr>
                        <td></td>
                        <td colspan="7"><?php echo $key; ?></td>
                    </tr>
                    <?php
                    foreach ($level1 as $key2 => $level2) {
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td colspan="6"><?php echo $key2; ?></td>
                        </tr>
                        <?php
                        foreach ($level2 as $key3 => $level3) {
                            list($level3_name, $balance) = explode('###', $level3);
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
                                    $subTotal += $balance;
                                    $total += $balance;
                                    $typeTotal += $balance;

                                    if ($accType == 'Fixed Assets') {
                                        $total_fixedAsset += $balance;
                                    }
                                    if ($accType == 'Accumulated Depreciation') {
                                        $total_accm_def += $balance;
                                    }
                                    if ($accType == 'Current Assets') {
                                        $total_cur_assets += $balance;
                                    }
                                    if ($accType == 'Current Liabilities') {
                                        $total_cur_lib += $balance;
                                    }
                                    if ($accType == 'Share Capital') {
                                        $total_share_capital += $balance;
                                    }
                                    if ($accType == 'Reserves') {
                                        $total_reserve += $balance;
                                    }
                                    if ($accType == 'Retained Earnings') {
                                        $total_retEarn += $balance;
                                    }
                                    if ($accType == 'Long Term Liability') {
                                        $total_longLibility += $balance;
                                    }


                                    echo $balance;
                                    ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr class="borderTop italic">
                            <td></td>
                            <td></td>
                            <td>Sub-Total <?php //echo $key2;                 ?>:</td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">
                                <?php
                                echo number($subTotal);
                                $subTotal = 0;
                                ?>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>

                        <?php
                    }
                    ?>
                    <tr class="borderTop italic bold">
                        <td></td>
                        <td>Total <?php //echo $key;                                            ?>:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;">
                            <?php
                            echo number($total);
                            $total = 0;
                            ?>
                        </td>
                        <td></td>
                    </tr>
                    <?php
                }
            }
            ?>

            <tr class="bold italic">
                <td colspan="5">Total <?php echo $accType; ?>: </td>
                <td colspan="3" style="text-align: right;">
                    <?php
                    echo number($typeTotal);
                    $typeTotal = 0;
                    ?>
                </td>
            </tr>
            <?php
            if ($accType == 'Accumulated Depreciation') {
                ?>
                <tr class="bold italic">
                    <!--<td></td>-->
                    <td colspan="5">&nbsp;Fixed Assets at net book value (Fixed Assets - Accumulated Depreciation) </td>
                    <td colspan="3" style="text-align: right;">
                        <span class="underline">
                            <?php
                            $net_book_value = $total_fixedAsset - $total_accm_def;
                            echo number($net_book_value*-1);
                            ?>
                        </span>
                    </td>
                </tr>
                <?php
            }
            if ($accType == 'Current Liabilities') {
                ?>
                <tr class="bold italic">
                    <!--<td></td>-->
                    <td colspan="5">Net Current Assets (Current Assets - Current Liabilities)</td>
                    <td colspan="3" style="text-align: right;">
                        <span class="underline">
                            <?php
                            $net_cur_asset = $total_cur_assets - $total_cur_lib;
                            echo number($net_cur_asset*-1);
                            ?>
                        </span>
                    </td>
                </tr>
                <tr class="bold italic">
                    <!--<td></td>-->
                    <td colspan="5">Net Assets (Net Book Value + Net Current Assets)</td>
                    <td colspan="3" style="text-align: right;">
                        <span class="underline">
                            <?php
                            $net_assets = $net_book_value - $net_cur_asset;
                            echo number($net_assets);
                            ?>
                        </span>
                    </td>
                </tr>
                <?php
            }
            if ($accType == 'Retained Earnings') {
                ?>
                <tr class="bold italic">
                    <!--<td></td>-->
                    <td colspan="5">&nbsp; Total Equity (Share Capital + Reserves + Retained Earnings) </td>
                    <td colspan="3" style="text-align: right;">
                        <span class="underline">
                            <?php
                            $equity = $total_share_capital + $total_reserve + $total_retEarn;
                            echo number($equity*-1);
                            ?>
                        </span>
                    </td>
                </tr>
                <?php
            }
            if ($accType == 'Long Term Liability') {
                ?>
                <tr class="bold italic">
                    <!--<td></td>-->
                    <td colspan="5">&nbsp;Total Equity + Long Term Liability </td>
                    <td colspan="3" style="text-align: right;">
                        <span class="underline">
                            <?php
                            $NetEquity = $equity + $total_longLibility;
                            echo number($NetEquity *-1);
                            ?>
                        </span>
                    </td>
                </tr>
                <?php
            }
//            }
        }
        ?>
    </tbody>
</table>


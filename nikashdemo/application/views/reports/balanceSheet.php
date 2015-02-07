
<table class="table table-striped table-condensed">
    <thead>
        <tr>
            <th colspan="2" class="bold" style="text-align: center;">Account Head</th>
            <th style="text-align: right;" width="20%">Cost</th>
            <!--<th style="text-align: right;">A/D</th>-->
            <th style="text-align: right;" width="20%">Net Book Value</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_fixedAsset = 0;
        $total_cur_assets = 0;
        $total_asset = 0;
        $total_cur_lib = 0;
        $total_retEarn = 0;
        $net_cur_asset = 0;
        foreach ($accountType as $Acc) {
            ?>
            <tr>
                <td colspan="2"><strong><?php echo $Acc; ?></strong></td>
                <td style="text-align: right;"></td>
                <!--<td style="text-align: right;"></td>-->
                <td style="text-align: right;"></td>
            </tr>
            <?php
            $row_total = 0;

            foreach ($AccType[$Acc] as $account) {
                $row_total += $account->balance;

                if ($Acc == 'Fixed Assets') {
                    $total_fixedAsset += $account->balance;
                }
                if ($Acc == 'Current Assets') {
                    $total_cur_assets += $account->balance;
                }
                if ($Acc == 'Current Liabilities') {
                    $total_cur_lib += $account->balance;
                }
                if ($Acc == 'Retained Earnings') {
                    $total_retEarn += $account->balance;
                }
                ?>
                <tr>
                    <td class="width5"> &nbsp; </td>
                    <td><?php echo $account->level3_name ?></td>
                    <td style="text-align: right;"><?php echo number($account->balance); ?></td>
                    <!--<td style="text-align: right;">-</td>-->
                    <td style="text-align: right;">-</td>
                </tr>
                <?php
            }
            ?>
            <tr class="bold borderTop">
                <td></td>
                <td class="italic">Total <?php echo $Acc; ?></td>
                <td style="text-align: right;"></td>
                <!--<td style="text-align: right;">-</td>-->
                <td style="text-align: right;"><span class="underline"><?php echo number($row_total); ?></span></td>
            </tr>
            <?php
            if ($Acc == 'Current Assets') {
                ?>
                <tr class="bold borderTop">
                    <td></td>
                    <td colspan="2" class="italic">Total Assets (Fixed Assets + Current Assets)</td>
                    <td style="text-align: right;">
                        <em class="underline">
                            <?php
                            $total_asset = $total_fixedAsset + $total_cur_assets;
                            echo number($total_asset);
                            ?>
                        </em>
                    </td>
                </tr>
                <?php
            }
        }
//        }
        ?>
        <tr class="bold borderTop italic">
            <td colspan="2">Net Current Assets (Current Assets - Current Liabilities)</td>
            <td colspan="2" style="text-align: right"><span class="underline">
                    <?php
                    if ($total_cur_lib < 0) {
                        $total_cur_lib*=-1;
                    }
                    $net_cur_asset = $total_cur_assets - $total_cur_lib;
                    echo number($net_cur_asset);
                    ?>
                </span></td>
        </tr>
        <tr class="bold borderTop italic">
            <td colspan="2">Net Assets (Fixed Assets + Net Current Assets)</td>
            <td colspan="2" style="text-align: right">
                <span class="underlineD">
                    <?php
                    echo number($total_fixedAsset + $net_cur_asset);
                    ?>
                </span></td>
        </tr>

        <!--</tr>-->
        <!--        <tr>
            <td colspan="5">
                <table class="table">
                    <tr>
                        <td colspan="2"><strong>Current Assets</strong></td>
                        <td style="text-align: right;"></td>
                        <td style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td class="width5"> &nbsp; </td>
                        <td>Janata Bank </td>
                        <td style="text-align: right;">-</td>
                        <td style="text-align: right;">-</td>
                    </tr>
                    <tr>
                        <td> &nbsp; </td>
                        <td>City Bank </td>
                        <td style="text-align: right;">-</td>
                        <td style="text-align: right;">-</td>
                    </tr>
                    <tr>
                        <td> &nbsp; </td>
                        <td>Cash</td>
                        <td style="text-align: right;">-</td>
                        <td style="text-align: right;">-</td>
                    </tr>
                    <tr class="bold borderTop">
                        <td colspan="2" class="italic">Total Current Assets</td>
                        <td style="text-align: right;"><span class="underline">-</span></td>
                        <td style="text-align: right; width: 10%"></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td colspan="2"><strong>Current Liabilities</strong></td>
                        <td style="text-align: right;"></td>
                        <td style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td class="width5"> &nbsp; </td>
                        <td>Supplier 1 </td>
                        <td style="text-align: right;">-</td>
                        <td style="text-align: right;">-</td>
                    </tr>
                    <tr>
                        <td> &nbsp; </td>
                        <td>Liabilities1</td>
                        <td style="text-align: right;">-</td>
                        <td style="text-align: right;">-</td>
                    </tr>
                    <tr>
                        <td> &nbsp; </td>
                        <td>Liabilities3</td>
                        <td style="text-align: right;">-</td>
                        <td style="text-align: right;">-</td>
                    </tr>
                    <tr class="bold borderTop">
                        <td colspan="2" class="italic">Total Current Assets</td>
                        <td style="text-align: right;"><span class="underline">3,000</span></td>
                        <td style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Retained Earnings</strong></td>
                        <td style="text-align: right;"></td>
                        <td style="text-align: right;"></td>
                    </tr>
                </table>
            </td>
        </tr>-->

    </tbody>
</table>
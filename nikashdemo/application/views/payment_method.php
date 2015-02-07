
<?php
//list($vTypeId, $vTypeSort, $details) = explode('-', $type);
$vTypeSort = $type;
$details = ' Payment';
$vTypeSort = strtoupper($vTypeSort);
?>
<div>
    <h5><?php echo $vTypeSort . ' ' . $details; ?> </h5>
    <table width="100%">
        <?php
        if ($vTypeSort == 'CR' || $vTypeSort == 'CP') {//-------CR=CASH RECIVE & CP = CASH PAYMENT
            ?>

            <tr>
                <td>MR No: </td>
                <td><input type="text" name="field1"/></td>
            </tr>

        <?php } elseif ($vTypeSort == 'BP') {//----------BANK PAYMENT
            ?>
            <tr>
                <td>Cheque No: </td>
                <td><input type="text"/></td>
            </tr>
            <tr>
                <td>Bank Name: </td>
                <td><input type="text"/></td>
            </tr>
            <?php
        } else if ($vTypeSort == 'BR') {//---------BANK RECEIVE
            ?>
            <tr>
                <td>Pay in Sleep: </td>
                <td><input type="text"/></td>
            </tr>
            <tr>
                <td>Chaque No: </td>
                <td><input type="text"/></td>
            </tr>
            <tr>
                <td>Bank Name: </td>
                <td><input type="text"/></td>
            </tr>
            <?php
        } else if ($vTypeSort == 'BK') {//----------BK FOR BIKASH
            ?>
            <tr>
                <td>Bikash No:</td>
                <td><input type="text"/></td>
            </tr>
            <tr>
                <td>TxnId :</td>
                <td><input type="text"/></td>
            </tr>
            <?php
        } else if ($vTypeSort == 'DM') {//-----------DM FOR DUCHBANGLA BANK MOBILE BANKING
            ?>
            <tr>
                <td>Bikash No:</td>
                <td><input type="text"/></td>
            </tr>
            <tr>
                <td>TxnId :</td>
                <td><input type="text"/></td>
            </tr>
            <?php
        } else {
            ?>
            <tr>
                <td>Text Field 1:</td>
                <td><input type="text"/></td>
            </tr>
            <tr>
                <td>Text Field 2:</td>
                <td><input type="text"/></td>
            </tr>
            <tr>
                <td>Text Field 3:</td>
                <td><input type="text"/></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td>Payment Date: </td>
            <td><input type="text" name="pay_date" placeholder="dd/mm/yy" id="payment_date" maxlength="10"/></td>
        </tr>
    </table>
</div>
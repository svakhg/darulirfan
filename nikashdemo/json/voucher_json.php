<?php

header("Content-Type: text/xml");
$voucher_no = $_POST['voucher_no'];
$level3 = $_POST['level3'];
$debit = $_POST['debit'];
$credit = $_POST['credit'];

$debit = preg_replace('#[^0-9]#', '', $debit);
$credit = preg_replace('#[^0-9]#', '', $credit);

mysql_connect('localhost', 'root', '') or die('not connect');
mysql_select_db('db_nikash');
$sql = mysql_query("INSERT INTO tbl_temp_voucher VALUES ('',$voucher_no,$level3,$debit,$credit,now(),1)") or die(mysql_error());
//$jsonData = "{ "obj": {"ProLevel3":"' . $level3 . '","ProDebit":"' . $debit . '","ProCredit":"' . $credit . '"} }';
$jsonData = '{';

$i = 1;
$sql = mysql_query(""
        . "SELECT debit,credit,level3_name "
        . "FROM tbl_temp_voucher as tmp, tbl_level3 as lvl3 "
        . "WHERE voucher_id = $voucher_no "
        . "AND tmp.level3_id=lvl3.id"
        . "") or die('error');
while ($row = mysql_fetch_array($sql)) {
    $jsonData .= '"obj'.$i.'": {"ProLevel3":"' . $row['level3_name'] . '","ProDebit":"' . $row['debit'] . '","ProCredit":"' . $row['credit'] . '"},';
    $i++;
}
$jsonData = chop($jsonData, ',');
//$jsonData .= '"obj": {"ProLevel3":"' . $level3 . '","ProDebit":"' . $debit . '","ProCredit":"' . $credit . '"}, '
//        . '"obj_' . $count . '": {"ProLevel3":"' . $level3 . '","ProDebit":"' . $debit . '","ProCredit":"' . $credit . '"}';
$jsonData.= '}';
//$jsonData = file_get_contents(base_url()."js/test.json");
echo $jsonData;
//preg_replace($jsonData, $count, $credit)
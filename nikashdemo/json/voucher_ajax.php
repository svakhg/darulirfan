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
//$this->db->query("INSERT INTO tbl_temp_voucher VALUES ('',1,1,20,30,now(),1)") or die(mysql_error());

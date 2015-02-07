<?php
header("Content-Type: text/xml");
$level3_id = $_POST['level3'];
$debit = $_POST['level3'];
$credit = $_POST['level3'];
//$var2 = $_POST['var2'];
//$jsonData = '{ "obj": {"level3":"'.$level3_id.'","debit":"'.$debit.'","credit":"'.$credit.'"} }';
//$jsonData = '{ "obj": {"level3":"'.$_POST['a'].'","debit":"'.$debit.'","credit":"'.$credit.'"} }';
$jsonData = '{ "obj": {"level3":"123","debit":"456","credit":"789"} }';
//$jsonData = file_get_contents(base_url()."js/test.json");
echo $jsonData;
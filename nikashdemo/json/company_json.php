<?php

header("Content-Type: text/xml");
include 'db.php';
if (isset($_POST)) {
    $comp = $_POST['comp_'];
}
$comp = 1;
//file exist a file from cache
$jsonData = '{';
if ($comp) {
    $i = 1;
    $sql = mysql_query(""
            . "SELECT * "
            . "FROM tbl_company") or die('error');
    while ($row = mysql_fetch_array($sql)) {
        $jsonData .= '"comp' . $i . '": {"c_id":"' . $row['c_id'] . '","comp_name":"' . $row['comp_name'] . '","comp_logo":"' . $row['comp_logo'] . '"},';
        $i++;
    }
    $jsonData = chop($jsonData, ',');
}
$jsonData.= '}';
echo $jsonData;


//address_components.getByType("administrative_area_level_1").long_name // Note that you pass the type to the prototype function that does the job for you
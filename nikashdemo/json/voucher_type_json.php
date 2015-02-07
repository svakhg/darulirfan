<?php

session_start();
header("Content-Type: text/xml");
if (!isset($_SESSION['vocher_type'])) {
    $_SESSION['vocher_type'] = 1;
}

if ($_SESSION['voucher_type']) {
    $jsonData = '{
    "u1" : {"property1":"0","Age":3, "weight":"4"},
    "u2" : {"property1":"2","Age":900, "weight":"30kg"}
    }';
} else {
    $jsonData = '{
    "u1" : {"property1":"1","Age":3, "weight":"4"},
    "u2" : {"property1":"2","Age":900, "weight":"30kg"}
    }';
}
echo $jsonData;

$File = "t.json";
//if (file_exists($filename)) {
    $Handle = fopen($File, 'w');
    $Data = "Bilbo Jones\n";
    fwrite($Handle, $jsonData);
    print "Data Written";
    fclose($Handle);
//}





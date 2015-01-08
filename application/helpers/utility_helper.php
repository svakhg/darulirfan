<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function msg_display($msg = false, $type = false) {
$msg = '<script type="text/javascript"> toastr.'
        . $type
        . '("'
        . $msg
        . '");'
        . ' </script>';
echo $msg;
}


<?php
include('./antares_php.php');
$antares = new antares_php();
$devicename = $_GET['devicename'];
$antares->set_key('67def29cb71d661d:fe439f838c50408f');

$Viewdata = $antares->get($devicename, 'PanicButton-1');

$Viewdata_encode = json_encode($Viewdata);

echo $Viewdata_encode;

<?php
include "api_config.php";
$street_id=$_REQUEST['street_id'];
$myApi=new Myapi();
$drivers=$myApi->getDrivers();
echo json_encode($drivers);
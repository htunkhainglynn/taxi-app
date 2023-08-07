<?php
include "api_config.php";
$myApi=new Myapi();
$quarters=$myApi->getQuarters();
echo json_encode($quarters);
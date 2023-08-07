<?php
include "api_config.php";
$quarter_id=$_REQUEST['quarter_id'];
$myApi=new Myapi();
$streets=$myApi->getStreets($quarter_id);
echo json_encode($streets);
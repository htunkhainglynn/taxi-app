<?php
include "check_auth.php";
include "backend_config.php";

$photo=$_FILES['photo'];
$street_id=$_POST['street_id'];
$quarter_id=$_POST['quarter_id'];
$driver_name=$_POST['driver_name'];
$phone=$_POST['phone'];

$b=new Backend();
$b->newDriver($photo,$street_id,$quarter_id,$driver_name,$phone);
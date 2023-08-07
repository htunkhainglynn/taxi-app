<?php
include "check_auth.php";
include "backend_config.php";
$id=$_POST['id'];
$photo=$_FILES['photo'];
$driver_name=$_POST['driver_name'];
$phone=$_POST['phone'];
$street_id=$_POST['street_id'];
$quarter_id=$_POST['quarter_id'];
$b=new Backend();
$b->updateDriver($id,$photo,$driver_name,$phone,$street_id,$quarter_id);
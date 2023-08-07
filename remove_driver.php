<?php
include "check_auth.php";
include  "backend_config.php";
$driver_id=$_GET['driver_id'];
$b=new Backend();
$b->deleteDriver($driver_id);
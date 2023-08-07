<?php
include "check_auth.php";
include  "backend_config.php";
$street_id=$_POST['street_id'];
$street_name=$_POST['street_name'];
$quarter_id=$_POST['quarter_id'];

$b=new Backend();
$b->updateStreet($street_id,$street_name,$quarter_id);
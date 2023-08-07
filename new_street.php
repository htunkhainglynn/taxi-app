<?php
include "check_auth.php";
include "backend_config.php";

$quarter_id=$_POST['quarter_id'];
$street_name=$_POST['street_name'];
$b=new Backend();
$b->newStreet($quarter_id,$street_name);
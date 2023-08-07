<?php
include "check_auth.php";
include "backend_config.php";
$id=$_GET['street_id'];
$b=new Backend();
$b->removeStreet($id);
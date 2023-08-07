<?php
include "user_config.php";
$password=$_POST['password'];
$u=new User();
$u->loginStepOne($password);
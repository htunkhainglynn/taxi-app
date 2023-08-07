<?php
include "user_config.php";
$email=$_POST['email'];
$u=new User();
$u->login($email);
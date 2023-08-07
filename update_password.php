<?php
include 'user_config.php';
$c_p=$_POST['current_password'];
$n_p=$_POST['new_password'];
$c_n_p=$_POST['confirm_password'];
$u=new User();
$u->updatePassword($c_p,$n_p,$c_n_p);
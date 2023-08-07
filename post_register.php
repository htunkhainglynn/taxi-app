<?php
include "user_config.php";
$name=$_POST['userName'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$u=new User();
$u->register($name,$email,$password,$confirm_password);
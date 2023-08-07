<?php
session_start();
if(!isset($_SESSION['my_login'])){
    header("location: login.php");
    exit();
}
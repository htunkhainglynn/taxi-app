<?php
session_start();
unset($_SESSION['my_login']);
header("location: login.php");
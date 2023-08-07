<?php
include "backend_config.php";
$quarter_name=$_POST['quarter_name'];
$b=new Backend();
$b->newQuarter($quarter_name);
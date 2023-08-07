<?php

include "backend_config.php";

$id=$_POST['quarter_id'];
$quarter_name=$_POST['name'];

$b=new Backend();
$b->updateQuarter($id, $quarter_name);
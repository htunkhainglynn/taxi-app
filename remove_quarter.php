<?php
include "backend_config.php";
$id=$_GET['quarter_id'];
$b=new Backend();
$b->removeQuarter($id);
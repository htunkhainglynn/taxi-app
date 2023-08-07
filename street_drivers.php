<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Taxi</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
$street_id=$_GET['street_id'];
$street_name=$_GET['street_name'];
include "frontend_config.php";
include "navbar.php";
$f=new Frontend();
?>
<div class="container-fluid">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-xs-4">
            <a href="index.php"><i class="glyphicon glyphicon-home"></i> Back to Home </a>
        </div>
        <div class="col-xs-8">
            All Drivers on <strong><?php echo $street_name?></strong> Quarter.
        </div>
    </div>
    <div class="row">
        <?php
        $drivers=$f->getDrivers($street_id);
        foreach ($drivers as $d):
            ?>
            <a href="tel:<?php echo $d['phone']?>">
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="thumbnail text-center">
                    <img class="img-rounded" src="drivers/<?php echo $d['photo']?>">
                    <p>
                        Driver Name:<?php echo $d['driver_name']?>
                    </p>
                    <p>
                        Phone:<?php echo $d['phone']?>
                    </p>
                </div>
            </div>
            </a>
        <?php
        endforeach;
        ?>
    </div>
</div>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
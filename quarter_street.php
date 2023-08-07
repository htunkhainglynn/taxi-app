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
$quarter_id=$_GET['quarter_id'];
$quarter_name=$_GET['quarter_name'];
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
            All Streets on <strong><?php echo $quarter_name?></strong> Quarter.
        </div>
    </div>
    <div class="row">
        <?php
        $streets=$f->getStreets($quarter_id);
        foreach ($streets as $st):
        ?>
        <a href="street_drivers.php?street_id=<?php echo $st['id']?>&street_name=<?php echo $st['street_name']?>">

            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="thumbnail text-center" style="padding: 40px;">
                    <span>
                        <?php echo $st['street_name']?>
                    </span>
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
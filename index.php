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
include "frontend_config.php";
include "navbar.php";
$f=new Frontend();
?>
<div class="container-fluid">
    <div class="row">
        <?php
        $sqtrs=$f->getQuarters();
        foreach ($sqtrs as $q):
        ?>
        <a href="quarter_street.php?quarter_id=<?php echo $q['id']?>&quarter_name=<?php echo $q['quarter_name']?>">
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="thumbnail text-center" style="padding: 40px;">
                    <span>
                        <?php echo $q['quarter_name']?>
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
<?php
$id=$_GET['id'];
$driver_name=$_GET['driver_name'];
$phone=$_GET['phone'];
$street_id=$_GET['street_id'];
$quarter_id=$_GET['quarter_id'];
echo $id,$driver_name,$phone,$street_id,$quarter_id;
?>
<?php
include "check_auth.php";
include "backend_config.php";
$b=new Backend();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Taxi | Edit Drivers</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <style>
        .alert{
            position: absolute;
            top: 80px;
            right: 10px;
        }
    </style>
</head>
<body>
<?php include "navbar.php";?>
<div class="container">
    <?php include "message.php"?>
    <div class="page-header">
        <h4>Edit Drivers</h4>
    </div>
    <div class="row">

        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" action="update_driver.php">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" id="photo">
                        </div>
                        <div class="form-group">
                            <label for="driver_name">Driver Name</label>
                            <input value="<?php echo $driver_name?>" type="text" name="driver_name" id="driver_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input value="<?php echo $phone?>" type="tel" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="street_id">Street</label>
                            <select id="street_id" name="street_id" class="form-control">
                                <?php
                                $streets=$b->getStreets();
                                foreach ($streets as $st):
                                    ?>
                                    <option <?php if($st['id']==$street_id){echo "selected";}?> value="<?php echo $st['id']?>">
                                        <?php echo $st['quarter_name']?>,<?php echo $st['street_name']?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quarter_id">Quarter</label>
                            <select name="quarter_id" id="quarter_id" class="form-control" required>
                                <?php
                                $qtrs=$b->getQuarters();
                                foreach ($qtrs as $q){
                                    ?>
                                    <option <?php if($q['id']==$quarter_id){echo "selected";}?> value="<?php echo $q['id']?>">
                                        <?php echo $q['quarter_name']?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </form>
                    <a href="drivers.php" class="btn btn-default btn-block">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/jquery.dataTables.min.js"></script>
<script src="bootstrap/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $("#driver_table").dataTable();
        setTimeout(function () {
            $(".alert").fadeOut();
        },2000)
    })
</script>
</body>
</html>

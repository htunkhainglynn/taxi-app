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
    <title>My Taxi | Drivers</title>
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
        <h4>Drivers</h4>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <h5>All Drivers</h5>
            <table class="table table-hover" id="driver_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Driver Name</th>
                    <th>Phone</th>
                    <th>Streets</th>
                    <th>Quarters</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <?php
                $drivers=$b->getDrivers();
                foreach ($drivers as $d):
                 ?>
                <tr>
                    <td><?php echo $d['id']?></td>
                    <td class="col-sm-2"><img class="img-thumbnail" src="drivers/<?php echo $d['photo']?>" </td>
                    <td><?php echo $d['driver_name']?></td>
                    <td><?php echo $d['phone']?></td>
                    <td><?php echo $d['street_name']?></td>
                    <td><?php echo $d['quarter_name']?></td>
                    <td>
                        <a href="edit_driver.php?id=<?php echo $d['id']?>&driver_name=<?php echo $d['driver_name']?>&phone=<?php echo $d['phone']?>&street_id=<?php echo $d['street_id']?>&quarter_id=<?php echo $d['quarter_id']?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i> </a>
                        <a data-toggle="modal" data-target="#d<?php echo $d['id']?>" href="#" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> </a>
                        <!--remove modal-->
                        <div id="d<?php echo $d['id']?>" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Confirm.</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-danger text-center">
                                            <i class="glyphicon glyphicon-warning-sign"></i>
                                            <p>
                                                The <strong><?php echo $d['driver_name']?></strong> from <strong><?php echo $d['street_name']?></strong>
                                                will delete from database.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="remove_driver.php?driver_id=<?php echo $d['id']?>">Agree</a>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.end remove modal -->
                    </td>
                </tr>
                <?php
                endforeach;
                ?>
            </table>
        </div>
        <div class="col-sm-4">
            <h5>New Street</h5>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" action="new_driver.php">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" id="photo" required>
                        </div>
                        <div class="form-group">
                            <label for="driver_name">Driver Name</label>
                            <input type="text" name="driver_name" id="driver_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="street_id">Street</label>
                            <select id="street_id" name="street_id" class="form-control">
                                <?php
                                $streets=$b->getStreets();
                                foreach ($streets as $st):
                                ?>
                                <option value="<?php echo $st['id']?>">
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
                                    <option value="<?php echo $q['id']?>">
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
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
    <title>My Taxi | Streets</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
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
        <h4>Streets</h4>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <h5>All Streets</h5>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Quarters</th>
                    <th>Streets</th>
                    <th>Actions</th>
                </tr>
                <?php
                $streets=$b->getStreets();
                foreach ($streets as $s):
                ?>
                <tr>
                    <td><?php echo $s['id']?></td>
                    <td><?php echo $s['quarter_name']?></td>
                    <td><?php echo $s['street_name']?></td>
                    <td>
                        <a data-toggle="modal" data-target="#e<?php echo $s['id']?>" href="#"><i class="glyphicon glyphicon-edit"></i> </a>
                        <a data-toggle="modal" data-target="#d<?php echo $s['id']?>" href="#" class="text-danger"><i class="glyphicon glyphicon-remove-circle"></i> </a>
                        <!--edit modal-->
                        <div id="e<?php echo $s['id']?>" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="update_street.php">
                                    <input type="hidden" name="street_id" value="<?php echo $s['id'] ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Edit Street.</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="street_name">Street Name</label>
                                                <input type="text" name="street_name" id="street_name" class="form-control" value="<?php echo $s['street_name'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="quarter_id">Quarter</label>
                                                <select name="quarter_id" id="quarter_id" class="form-control">
                                                    <?php
                                                    $sql=$b->getQuarters();
                                                    foreach ($sql as $q){
                                                        ?>
                                                        <option <?php if($q['id']==$s['quarter_id']){echo "selected ";}?>value="<?php echo $q['id']?>"><?php echo $q['quarter_name']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save Change</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </form>
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.end edit modal -->
                        <!--remove modal-->
                        <div id="d<?php echo $s['id']?>" class="modal fade" tabindex="-1" role="dialog">
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
                                                The <strong><?php echo $s['street_name']?></strong> from <strong><?php echo $s['quarter_name']?></strong>
                                                 will delete from database.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="remove_street.php?street_id=<?php echo $s['id']?>">Agree</a>
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
                    <form method="post" action="new_street.php">
                        <div class="form-group">
                            <label for="street_name">Street Name</label>
                            <input type="text" name="street_name" id="street_name" class="form-control">
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
<script>
    $(function () {
        setTimeout(function () {
            $(".alert").fadeOut();
        },2000)
    })
</script>
</body>
</html>
<?php include "check_auth.php";?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Taxi | Quarters</title>
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
        <h4>Quarters</h4>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <h5>All Quarters</h5>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Quarter Name</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
                <?php
                include "backend_config.php";
                $b=new Backend();
                $qtrs=$b->getQuarters();
                foreach ($qtrs as $q) {
                    ?>
                    <tr>
                        <td><?php echo $q['id']?></td>
                        <td><?php echo $q['quarter_name']?></td>
                        <td><?php echo $q['created_at']?></td>
                        <td>
                            <a data-toggle="modal" data-target="#e<?php echo $q['id']?>" href="#"><i class="glyphicon glyphicon-edit"></i> </a>
                            <a data-toggle="modal" data-target="#d<?php echo $q['id']?>" href="#" class="text-danger"><i class="glyphicon glyphicon-remove-circle"></i> </a>

                            <!--edit modal-->
                            <div id="e<?php echo $q['id']?>" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="update_quarter.php">
                                        <input type="hidden" name="quarter_id" value="<?php echo $q['id'] ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Edit Quarter.</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="quarter_name">Quarter Nmae</label>
                                                <input type="text" name="name" id="quarter_name" class="form-control" value="<?php echo $q['quarter_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save Change</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                    </form>
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.end remove modal -->
                            <!--remove modal-->
                            <div id="d<?php echo $q['id']?>" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Confirm.</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-danger text-center">
                                                <i class="glyphicon glyphicon-warning-sign"></i>
                                                <p> The selected quarter name: <strong><?php echo $q['quarter_name']?></strong> will be deleted.Are you sure?</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                           <a href="remove_quarter.php?quarter_id=<?php echo $q['id']?>">Agree</a>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.end remove modal -->
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="col-sm-4">
            <h5>New Quarter</h5>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" action="new-quarter.php">
                        <div class="form-group">
                            <label for="quarter_name">Quarter_Name</label>
                            <input type="text" name="quarter_name" id="quarter_name" class="form-control">
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
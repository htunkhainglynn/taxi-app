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
        <h4>Setting</h4>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>
                        <i class="glyphicon glyphicon-user"></i>
                        UserName: <?php echo $_SESSION['my_login']['userName']?>
                    </p>
                    <p>
                        <i class="glyphicon glyphicon-envelope"></i>
                        Email: <?php echo $_SESSION['my_login']['email']?>
                    </p>
                    <p>
                        <i class="glyphicon glyphicon-barcode"></i>
                        Role: <?php
                            if($_SESSION['my_login']['role']){
                                echo "Administrator";
                                }else{
                                echo "Standard user";
                            }
                        ?>
                    </p>
                    <p>
                        <i class="glyphicon glyphicon-calendar"></i>
                        Member Since: <?php echo date("D(d) m/Y h:i A",strtotime($_SESSION['my_login']['created_at']))?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <h5>Change Password</h5>
            <hr>
            <form method="post" action="update_password.php">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-block">Save Change</button>
                </div>
            </form>
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
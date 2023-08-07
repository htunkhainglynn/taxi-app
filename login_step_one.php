<?php
session_start();
if(!isset($_SESSION['correct_email'])){
    header("location: login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Taxi | SignIn</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        .myHeader{
        font-size: 22px;
            text-align: center;
            color: orangered;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .mySubHeader{
            text-align: center;
            color: grey;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<?php include "navbar.php";?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <?php include "message.php";?>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="myHeader"><?php echo $_SESSION['correct_email']['email'];?></div>
                    <form method="post" action="post_login_step_one.php">
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
            <a href="login.php">Not You?</a>
        </div>
    </div>
</div>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
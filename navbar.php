<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">My Taxi</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">


            </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                session_start();
                if(!isset($_SESSION['my_login'])){
                ?>
                    <li><a href="login.php"><i class="glyphicon glyphicon-log-in"></i> SignIn</a> </li>
                <?php
                }else{
                    ?>
                    <li><a href="drivers.php"><i class="glyphicon glyphicon-user"></i> Drivers </a></li>
                    <li><a href="quarters.php"><i class="glyphicon glyphicon-share-alt"></i> Quarters</a> </li>
                    <li><a href="streets.php"><i class="glyphicon glyphicon-road"></i> Streets</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['my_login']['userName']?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="setting.php"><i class="glyphicon glyphicon-cog"></i> Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> LogOut</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
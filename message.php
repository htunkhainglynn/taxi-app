<?php
session_start();
if(isset($_SESSION['message'])){
    ?>
<div class="alert alert-success">
<!--    navbar-fixed-top,navbar-fixed-bottom-->
    <?php echo $_SESSION['message']?>
</div>
<?php
}
unset($_SESSION['message']);

if(isset($_SESSION['error'])) {
    ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error'] ?>
    </div>
    <?php
}
unset($_SESSION['error']);
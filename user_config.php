<?php
session_start();
class User
{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:hostname=localhost; dbname=my_taxi", "root");
        } catch (PDOException $e) {
            die("Connection failed to database server , Reason : " . $e);
        }
    }
    public function updatePassword($c_p,$n_p,$c_n_p){
        $user_id=$_SESSION['my_login']['id'];
        $old_sql="select password from users where id='$user_id'";
        $user=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        $old_password=$user['password'];
        $current_password=sha1($c_p);
        if($old_password==$current_password){
            if($n_p==$c_n_p){
                $new_password=sha1($n_p);
                $sql="update users set password='$new_password' where id='$user_id'";
                $this->db->query($sql);
                $_SESSION['message']="The user password have been changed";
                header("location: setting.php");
            }else{
                $_SESSION['error']="The new password and confirm new password must match";
                header("location: setting.php");
            }
        }else{
            $_SESSION['error']="The current password is invalid";
            header("location: setting.php");
        }
    }
    public function loginStepOne($password){
        $old_password=$_SESSION['correct_email']['password'];
        $new_password=sha1($password);
        if($old_password==$new_password){
            $_SESSION['my_login']=$_SESSION['correct_email'];
            unset($_SESSION['correct_email']);
            header("location: quarters.php");
        }else{
            $_SESSION['error']="Authentication Failed";
            header("location: login_step_one.php");
        }
    }
    public function login($email){
        $old_sql="select * from users where email='$email'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(isset($old_row['email'])) {
            $_SESSION['correct_email']=$old_row;
            header("location: login_step_one.php");
        }else{
            $_SESSION['error']="The selected email is invalid.";
            header("location: login.php");
        }
    }

    public function register($userName, $email, $password, $confirm_password)
    {
        $old_sql="select email from users where email='$email'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);

        if(empty($old_row)){
            if($password==$confirm_password){
                $new_password=sha1($password);//sha1,md5
                $sql="insert into users(userName,email,password,created_at) values ('$userName','$email','$new_password',now())";
                $result=$this->db->query($sql);
                if($result){
                    $_SESSION['message']="The user account have been SignUp.";
                }
                else{
                    $_SESSION['error']="The user account SignUp failed.";
                }
                header("location: register.php");
            }else{
                $_SESSION['error']="The password and confirm password must match";
                header("location: register.php");
            }
        }else{
            $_SESSION['error']="The selected email is exists";
            header("location: register.php");
        }
    }
}
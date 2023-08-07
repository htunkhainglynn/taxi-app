<?php
session_start();
class Backend{
    public $db;
    public function __construct()
    {
        try{
            $this->db=new PDO("mysql:hostname=localhost; dbname=my_taxi","root");
        }catch(PDOException $e){
            die("Connection failed to database server , Reason : ".$e);
        }
    }
    public function updateDriver($id,$photo,$driver_name,$phone,$street_id,$quarter_id){
        if(!empty($photo['name'])) {
            $old_sql="select photo from drivers where id='$id'";
            $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
            $old_image=$old_row['photo'];
            unlink("drivers/$old_image");

            $img_name=date("dmyhis")."-".$photo['name'];
            $img_tmp=$photo['tmp_name'];
            $sql = "update drivers set photo='$img_name',driver_name='$driver_name',phone='$phone',street_id='$street_id',quarter_id='$quarter_id' where id='$id'";
            move_uploaded_file($img_tmp,"drivers/$img_name");

            }else{
            $sql = "update drivers set driver_name='$driver_name',phone='$phone',street_id='$street_id',quarter_id='$quarter_id' where id='$id'";
            }
            $result=$this->db->query($sql);
        if($result){
            $_SESSION['message']="The selected driver have been updated.";
        }else{
            $_SESSION['error']="The selected driver have beeen failed.";
        }
        header("location: drivers.php");
    }
    public function deleteDriver($id){
        $sql="select photo from drivers where id='$id'";
        $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        $img_name=$row['photo'];
        unlink("drivers/$img_name");

        $d="delete from drivers where id='$id'";
        $this->db->query($d);
        $_SESSION['message']="The selected driver have been deleted.";
        header("location: drivers.php");
    }
    public function getDrivers(){
        $sql="select streets.street_name,quarters.quarter_name,drivers.* from 
              drivers left join streets on streets.id=drivers.street_id left join 
              quarters on quarters.id=drivers.quarter_id order by id desc ";
        return $this->db->query($sql);
    }
    public function newDriver($photo,$street_id,$quarter_id,$driver_name,$phone){
        $photo_name=date("dmyhis")."-".$photo['name'];
        $photo_tmp=$photo['tmp_name'];
        $sql="insert into drivers(street_id,quarter_id,photo,driver_name,phone,created_at) values('$street_id','$quarter_id','$photo_name','$driver_name','$phone',now())";
        $result=$this->db->query($sql);
        if($result){
            move_uploaded_file($photo_tmp,"drivers/$photo_name");
            $_SESSION['message']="The new driver have been created";
        }else{
            $_SESSION['error']="The new driver created failed";
        }
        header("location: drivers.php");
    }
    public function  updateStreet($street_id,$street_name,$quarter_id){
        $sql="update streets set street_name='$street_name',quarter_id='$quarter_id' where id='$street_id'";
        $this->db->query($sql);
        $_SESSION['message']="The selected street have been updated.";
        header("location: streets.php");
    }
    public function removeStreet($id){
        $sql="delete from streets where id='$id'";
        $this->db->query($sql);
        $_SESSION['message']="The selected street have been deleted.";
        header("location: streets.php");
    }
    public function getStreets(){
        $sql="select quarters.quarter_name,streets.* from streets left join quarters on quarters.id=streets.quarter_id";
        return $this->db->query($sql);
    }
    public function  newStreet($quarter_id,$street_name){
        $sql="insert into streets (street_name,quarter_id)values('$street_name','$quarter_id')";
        $result=$this->db->query($sql);
        if($result){
            $_SESSION['message']="The new street have been created";
        }else{
            $_SESSION['error']="The new street created failed";
        }
        header("location: streets.php");
    }
    public function  updateQuarter($id,$quarter_name){
        $sql="update quarters set quarter_name='$quarter_name' where id='$id'";
        $result=$this->db->query($sql);
        if($result){
            $_SESSION['message']="The selected quarter have been updated.";
        }else{
            $_SESSION['error']="The selected quarter update failed.";
        }
        header("location: quarters.php");
    }
    public function removeQuarter($id){
        $sql="delete from quarters where id='$id'";
        $result=$this->db->query($sql);
        if($result){
            $_SESSION['message']="The selected quarter have been deleted.";
        }else{
            $_SESSION['error']="The selected quarter deleted failed.";
        }
        header("location: quarters.php");
    }
    public function getQuarters(){
        $sql="select * from quarters";
        $quarters=$this->db->query($sql);
        return $quarters;
    }
    public function newQuarter($quarter_name){
        $sql="insert into quarters(quarter_name,created_at) values ('$quarter_name',now())";
        $result=$this->db->query($sql);
        if($result){
            $_SESSION['message']="The new quarter have been saved.";
        }else{
            $_SESSION['error']="The new quarter failed save.";
        }
        header("location: quarters.php");
    }
}
new Backend();
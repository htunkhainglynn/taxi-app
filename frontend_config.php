<?php
class Frontend{
    public $db;
    public function __construct()
    {
        try{
            $this->db=new PDO("mysql:hostname=localhost; dbname=my_taxi","root");
        }catch(PDOException $e){
            die("Connection failed to database server , Reason : ".$e);
        }
    }
    public function getQuarters(){
        $sql="select * from quarters order by quarter_name desc";
        return $this->db->query($sql);
    }
    public function getStreets($quarter_id){
        $sql="select * from streets where quarter_id='$quarter_id'";
        return $this->db->query($sql);
    }
    public function getDrivers($street_id){
        $sql="select * from drivers where street_id='$street_id'";
        return $this->db->query($sql);
    }
}
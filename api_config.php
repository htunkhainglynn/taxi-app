<?php
header("Content-type: application/json");
Class Myapi{
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
        $sql="select * from quarters";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getStreets($quarter_id){
        $sql="select * from streets where quarter_id='$quarter_id'";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDrivers(){
        $sql="select quarters.quarter_name,streets.street_name,drivers.* from drivers 
              left join quarters on quarters.id=drivers.quarter_id 
              left join streets on streets.id=drivers.street_id";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
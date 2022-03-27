<?php
namespace app\database;

use mysqli;

class connection {
    private $hostName = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'nti_ecommerce';
    protected $connect;
    public function __construct(){
    $this->connect = new mysqli($this->hostName,$this->username,$this->password,$this->database);
    // if($this->connect->connect_error){
    //     die('connection is fail :' .$this->connect->connect_error);
    // }
    // echo "connect success";    
    }
    //first method to  get result(insert -delete -update ) if is done or not
    public function dmlQuery($query){
        $result=$this->connect->query($query);
        if($result){
            return 'success';
        }
        else{
            return " fail ";
        }
    }
    public function dqlquery($query){
        $result=$this->connect->query($query);
        if($result){
            return $result;
        }
        else{
            return " Somthing Wrong ";
        }
    }
    public function __destruct()
    {
        $this->connect->close();
    }
   
}

?>
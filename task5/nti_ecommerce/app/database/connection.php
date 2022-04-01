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
   

    }
     
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
       return $this->connect->query($query);
    
        
    }
    public function __destruct()
    {
        $this->connect->close();
    }
   
}

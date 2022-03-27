<?php
namespace app\helpers;

class Hash{
    public static function make(string $password){
        return password_hash($password,PASSWORD_BCRYPT);
    }
    public static function check(string $password ,string $hashedPassword){
        return password_verify($password,$hashedPassword);

    }
    
}

?>
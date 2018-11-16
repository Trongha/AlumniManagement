<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16/11/2018
 * Time: 5:35 SA
 */

class SQLConnection{

    public static function makeConnection(){
        $myServername = "localhost";
        $myUsername = "root";
        $myPassword = "";
        $dbname = "Sakila";
        $port = 3306 ;

        $conn = new mysqli($myServername, $myUsername, $myPassword, $dbname, $port);

        if ($conn->connect_error){
            die("Connect Error: ". $conn->connect_error);
            return null;
        }
        return $conn;
    }


}
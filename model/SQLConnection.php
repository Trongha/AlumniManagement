<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16/11/2018
 * Time: 5:35 SA
 */

class SQLConnection{

    public static function getResultQuery($sqlQuery, $dbname = "qlcsv", $myServername = "localhost", $myUsername = "root", $myPassword = "", $port = 3306){

        $connect = new mysqli($myServername, $myUsername, $myPassword, $dbname, $port);

        if ($connect->connect_error){
            die("Connect Error: ". $connect->connect_error);
            return null;
        }
        $result = $connect->query($sqlQuery);
        return $result;
    }


}

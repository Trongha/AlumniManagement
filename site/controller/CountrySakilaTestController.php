<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16/11/2018
 * Time: 1:24 CH
 */

require_once ('../../model/CountrySakilaTest.php');
require_once ('../../model/SQLConnection.php');


class CountrySakilaTestController{
    private $listCountry = Array();

    /**
     * CountrySakilaTestController constructor.
     * @param array $listCountry
     */
    public function __construct()
    {
        $this->listCountry = Array();
    }

    public function getKCountryLastUpdate($k){
        $connect = SQLConnection::makeConnection();

        $sql = 'SELECT * FROM Country
                ORDER BY country.country_id DESC
                limit '.$k;

        $result = $connect->query($sql);

        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $aCountry = new CountrySakilaTest($row["country_id"], $row["country"], $row["last_update"]);
                array_push($this->listCountry, $aCountry);
            }
        }
    }

    public function getString()
    {
        $s = "";
        foreach ($this->listCountry as $aCountry) {
            $s .= $aCountry->getString();
        }
        return $s;
    }

    public function show(){
        echo $this->getString();
    }
}

$controller = new CountrySakilaTestController();
$controller->getKCountryLastUpdate(10);
$controller->show();
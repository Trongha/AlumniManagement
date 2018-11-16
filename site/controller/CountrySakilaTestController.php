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
    private $listCountry;

    /**
     * CountrySakilaTestController constructor.
     * @param array $listCountry
     */
    public function __construct()
    {
        $this->listCountry = Array();
    }

    public function getKCountryLastUpdate($k){
        $sql = 'SELECT * FROM Country
                ORDER BY country.country_id DESC
                limit '.$k;

        $result = SQLConnection::getResultQuery($sql);

        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $aCountry = new CountrySakilaTest($row["country_id"], $row["country"], $row["last_update"]);
                array_push($this->listCountry, $aCountry);
            }
        }
    }

    public function getString(){
        $s = '';
        foreach ($this->listCountry as $country){
            $s .= $country->getString() . '<br>';
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
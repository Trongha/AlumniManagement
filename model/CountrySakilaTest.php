<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16/11/2018
 * Time: 6:18 SA
 */

require_once("SQLConnection.php");
class CountrySakilaTest{
    private $country_id ;
    private $country = "";
    private $last_update = "";

    /**
     * CountrySakilaTest constructor.
     * @param $country_id
     * @param string $country
     * @param string $last_update
     */
    public function __construct($country_id = 0, $country = "", $last_update = "")
    {
        $this->country_id = $country_id;
        $this->country = $country;
        $this->last_update = $last_update;
    }

    public function getSqlById($id){
        $connect = SQLConnection::makeConnection();

        $sql = 'SELECT * FROM country WHERE country_id = '.$id.' ';

        $result = $connect->query($sql);

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();

            $this->country_id = $id;
            $this->country = $row["country"];
            $this->last_update = $row["last_update"];

        }
    }

    public function getString(){
        $s='';
        $s .= 'id: '.$this->country_id.' country: '.$this->country.' lastUpDate: '.$this->last_update.'<br>';
        return $s;
    }
}
/*    $aCountry = new CountrySakilaTest();
    $aCountry->getSqlById(15);
    echo $aCountry->getString();*/





















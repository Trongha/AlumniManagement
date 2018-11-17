<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16/11/2018
 * Time: 11:20 CH
 */

// require_once ('');

class Lop{
    private $lopID = -1;
    private $tenLop = '';
    private $khoa ;
    private $listAlumni ;
    private $kichHoat ;

    /**
     * Lop constructor.
     * @param int $lopID
     * @param string $tenLop
     * @param $khoa
     * @param $kichHoat
     */
    public function __construct($lopID = -1, $tenLop = "", $khoa = null, $kichHoat = 0){
        $this->lopID = $lopID;
        $this->tenLop = $tenLop;
        $this->khoa = $khoa;
        $this->kichHoat = $kichHoat;
    }

    public function getLopById(){
        if ($this->getLopID() > -1){
        	echo "getSQL";
            $sql = 'SELECT * FROM lop WHERE lop.lopID = '.$this->getLopID();

            $result = SQLConnection::getResultQuery($sql);

            if ($result->num_rows >0){
                $lopInfo = $result->fetch_assoc();
                $this->setTenLop($lopInfo['tenlop']);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getListAlumni()
    {
        return $this->listAlumni;
    }

    /**
     * @param mixed $listAlumni
     */
    public function setListAlumni($listAlumni)
    {
        $this->listAlumni = $listAlumni;
    }


    /**
     * @return int
     */
    public function getLopID()
    {
        return $this->lopID;
    }

    /**
     * @param int $lopID
     */
    public function setLopID($lopID)
    {
        $this->lopID = $lopID;
    }

    /**
     * @return string
     */
    public function getTenLop()
    {
        return $this->tenLop;
    }

    /**
     * @param string $tenLop
     */
    public function setTenLop($tenLop)
    {
        $this->tenLop = $tenLop;
    }

    /**
     * @return mixed
     */
    public function getKhoa()
    {
        return $this->khoa;
    }

    /**
     * @param mixed $khoa
     */
    public function setKhoa($khoa)
    {
        $this->khoa = $khoa;
    }

    /**
     * @return mixed
     */
    public function getKichHoat()
    {
        return $this->kichHoat;
    }

    /**
     * @param mixed $kichHoat
     */
    public function setKichHoat($kichHoat)
    {
        $this->kichHoat = $kichHoat;
    }

    public function getString(){
        $s = '';
        $s .= 'id:   '.$this->getLopID(). '<br>'
             .'name: '.$this->getTenLop() .'<br>';
        return $s;
    }
}
/*
$test = new Lop($lopID = 1);
$test->getLopById();
echo $test->getString();*/
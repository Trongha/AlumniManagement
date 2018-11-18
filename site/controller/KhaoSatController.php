<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19/11/2018
 * Time: 1:41 SA
 */
require_once ("../../model/m_admin.php");

class KhaoSatController{
	private $BangKhaoSatID;
	private $listKhaoSat;
	private $ketQua;

	/**
	 * KhaoSatController constructor.
	 * @param $BangKhaoSatID
	 * @param $listKhaoSat
	 */
	public function __construct($BangKhaoSatID = 0)
	{
		$this->BangKhaoSatID = $BangKhaoSatID;
		if ($this->BangKhaoSatID !==0){
			$this->setListKhaoSat();
		}

	}

	/**
	 * @param mixed $listKhaoSat
	 */
	public function setListKhaoSat()
	{
		$this->listKhaoSat = m_admin::getListKhaoSatByBangID($this->BangKhaoSatID);
	}

	public function showInForm(){
		if (isset($_GET["bangID"])){
			$this->__construct($_GET["bangID"]);
			foreach ($this->listKhaoSat as $aKhaoSat){
				$s = "<div class=\"row 1cau\">
                    <div class=\"col-xs-10 col-sm-10 col-md-10 col-lg-10 CauHoi\">
                        <label for=\"$aKhaoSat->khaosatID\">$aKhaoSat->noidung</label>
                    </div>
                    <div class=\"col-xs-2 col-sm-2 col-md-2 col-lg-2 DapAn\">
                        <select name=\"$aKhaoSat->khaosatID\">
                            <option value=\"1\">Có</option>
                            <option value=\"2\">Không hẳn</option>
                            <option value=\"3\">Không</option>
                        </select>
                    </div>
                </div>
                <hr>";

				echo $s;
			}
		}
	}




}
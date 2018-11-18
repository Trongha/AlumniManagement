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
		if (isset($_GET["bangID"])) {
			$this->BangKhaoSatID = $_GET["bangID"];
		}
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

	public function setTenBangKhaoSat(){
		$name = m_admin::getBangKhaoSatByID($this->BangKhaoSatID);

		if ($name !== null){
			echo "<h2>".$name[0]->tenbang."</h2>";
		}else{
			echo "<h2>:))</h2>";
		}

	}

	public function showInForm(){
		if (isset($_GET["bangID"])){

			if (is_array($this->listKhaoSat) || is_object($this->listKhaoSat)) {
				foreach ($this->listKhaoSat as $aKhaoSat) {
					$s = "<div class=\"row 1cau\">
                    <div class=\"col-xs-10 col-sm-10 col-md-10 col-lg-10 CauHoi\">
                        <label for=\"$aKhaoSat->khaosatID\">$aKhaoSat->noidung</label>
                    </div>
                    <div class=\"col-xs-2 col-sm-2 col-md-2 col-lg-2 DapAn\">
                        <select name=\"$aKhaoSat->khaosatID\">
                            <option value=\"co\">Có</option>
                            <option value=\"khong\">Không hẳn</option>
                            <option value=\"khonghan\">Không</option>
                        </select>
                    </div>
                </div>
                <hr>";

					echo $s;
				}
			}
		}
	}

	public function getKetQua(){
		if (isset($_POST['submit-btn'])){
			unset($_POST['submit-btn']);
			$s = "	<div class='alert alert-success myalert'>
					  <strong>Success!</strong>Cảm ơn bạn ".$_SESSION['hoten']." đã hoàn thành bài khảo sát
					</div>";
			echo $s;
			foreach ($_POST as $khaoSatID => $dapAn){
				m_admin::insertIntoKetQuaKhaoSat($khaoSatID, $_SESSION['csv_id'], $dapAn);
			}

		}
	}
}
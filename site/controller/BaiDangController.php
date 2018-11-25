<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19/11/2018
 * Time: 1:41 SA
 */
require_once ("../../model/m_admin.php");

class BaiDangController{
	private $BaiDangID;
	private $BaiDang = null;

	/**
	 * KhaoSatController constructor.
	 * @param $BangKhaoSatID
	 * @param $listKhaoSat
	 */
	public function __construct($BaiDangID = 0)
	{
		$this->BaiDangID = $BaiDangID;
		if (isset($_GET["ID"])) {
			$this->BaiDangID = $_GET["ID"];
			$this->BaiDang = m_admin::getThongBaoByID($this->BaiDangID);
		}

	}


	public function setTenBaiDang(){

		if ($this->BaiDang !== null){
			echo "<h2>".$this->BaiDang[0]->tieude."</h2>";
		}else{
			echo "<h2>:))</h2>";
		}

	}
	public function setNoiDung(){

		if ($this->BaiDang !== null){
			echo "<p>".$this->BaiDang[0]->noidung."</p>";
		}

	}
	public function setListBaiDang(){
		$soLuong = 10;
		$listBaiDang = m_admin::getkThongBao($soLuong);
		foreach ($listBaiDang as $baiDang){
			$s = "<div 1bai>
 					<i class=\"fas fa - pencil - alt\"></i>
						<a href=\"BaiDang.php?ID=$baiDang->thongbaoID\">$baiDang->tieude<br></a>
						<div class=\"pull-right\">$baiDang->thoigian</div>
					<hr>
                </div>";
			echo $s;
		}
	}

}
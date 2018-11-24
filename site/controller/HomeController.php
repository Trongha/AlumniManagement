<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 17/11/2018
 * Time: 12:03 SA
 */

require_once ('../../model/Lop.php');
require_once('LopController.php');

class HomeController{

	/**
	 * HomeController constructor.
	 */
	public function __construct()
	{
	}

	public static function setUsernameNav(){
		if(isset($_SESSION['isadmin']) && ($_SESSION['isadmin'] == 1)){
			$Acc = $_SESSION['username'];
		}
		else{
			isset($_SESSION['hoten']) ? $Acc = $_SESSION['hoten'] : $Acc = 'Đăng nhập';
		}
		$s = "<a href='#'>$Acc</a>";
		if ($Acc == 'Đăng nhập'){
			$s = "<a href='https://localhost/AlumniManagement/'>$Acc</a>";
		}
		echo $s;
	}

	public static function setListNews(){
		$soLuongBaiKhaoSat = 5;
		$listKhaoSat = m_admin::getnKhaoSatMoiNhat($soLuongBaiKhaoSat);
		$soLuongThongBao = 10 - count($listKhaoSat);

		$listThongBao = m_admin::getkThongBao($soLuongThongBao);

		foreach ($listThongBao as $aThongBao){
			$s = "	<div class=\"row 1tin\">
						<i class=\"fas fa-flag\"></i>
						<a href=\"BaiDang.php?ID=$aThongBao->thongbaoID\">$aThongBao->tieude</a>
					</div>";
			echo $s;
		}
		foreach ($listKhaoSat as $aKhaoSat){
			$s = "	<div class=\"row 1tin\">
						<i class=\"fas fa-pencil-alt\"></i>
						<a href=\"KhaoSat.php?bangID=$aKhaoSat->bangID\">$aKhaoSat->tenbang</a>
					</div>";
			echo $s;
		}
	}

	public function setListNewClass(){
		$lopMoiThem = new LopController(5);
		$lopMoiThem->getLopInSql();
		$listClass = $lopMoiThem->getListLop();

		if (is_array($listClass) || is_object($listClass)) {
			foreach ($listClass as $aLop) {
				$s = '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">'
					. '	<div class="thumbnail aClass">'
					. '		<img src="../../public/Home/img/portfolio/cake.jpg" alt="a class">'
					. '		<div class="caption text-center">'
					. '			<h3>Lớp '. $aLop->getTenLop() .'</h3>'
					. '		</div>'
					. '		<a href="ListAlumni.php?classID='.$aLop->getLopID().'">'
					. '			<div class="chiTiet text-center">'
					. '				<i class="fas fa-info-circle"></i>'
					. '				<h3>Chi tiết...</h3>'
					. '			</div>'
					. '		</a>'
					. '	</div>'
					. '</div>  <!-- end 1 class -->';
				echo $s;
			}
		}
	}
}


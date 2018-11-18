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
		$s = "<a class='' href='#'>$Acc</a>";
		echo $s;
	}

	public static function setListKhaoSat(){

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
					. '		<a href="ListAlumni.php">'
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


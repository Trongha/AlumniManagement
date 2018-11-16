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

	public function setListNewClass(){
		$lopMoiThem = new LopController(6);
		$lopMoiThem->getLopInSql();
		$listClass = $lopMoiThem->getListLop();

		if (is_array($listClass) || is_object($listClass)) {
			foreach ($listClass as $aLop) {
				$s = '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">'
					. '	<div class="thumbnail aClass">'
					. '		<img src="../../public/Home/img/portfolio/cake.jpg" alt="a class">'
					. '		<div class="caption">'
					. '			<h3>Lớp '. $aLop->getTenLop() .'</h3>'
					. '		</div>'
					. '		<a href="ListAlumni.html">'
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


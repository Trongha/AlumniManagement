<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 17/11/2018
 * Time: 6:29 SA
 */

require_once ('../../model/Lop.php');
require_once('LopController.php');

class ListClassesController
{

	/**
	 * ListClassesController constructor.
	 */
	public function __construct()
	{
	}

	public function setListClasses(){
		$listAllClass = new LopController(150);
		$listAllClass->getLopInSql();
		$listClass = $listAllClass->getListLop();
		if (is_array($listClass) || is_object($listClass)) {
			$hand = '';
			for ($i=0 ; $i<count($listClass) ; $i++){
//				if ($i%2){
//					$hand = 'right';
//				}else{
//					$hand = 'left';
//				}
				($i%2) ? $hand = 'right' : $hand = 'left';
				$s = '<div class="container ' . $hand . '">
							<div class="content">
								<div class="thumbnail aClass">';
				$s.= '				<img src="../../public/ListClasses/img/k60-clc.jpg" alt="a class">';
				$s.= '					<div class="caption">
											<h3>Lớp '. $listClass[$i]->getTenLop() .'</h3>
										</div>';
				$s.= '					<a href="ListAlumni.html">
											<div class="chiTiet text-center">
												<i class="fas fa-info-circle"></i>
												<h3>Chi tiết...</h3>
											</div>
										</a>
									</div>
								</div>
							</div>';
				echo $s;
			}
		}
	}
}
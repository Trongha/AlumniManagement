<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16/11/2018
 * Time: 11:44 CH
 */

require_once ('../../model/Lop.php');
require_once('../../model/m_admin.php');

class LopController{
	private $listLop = Array();
	private $soLuongLop ;

	/**
	 * LopController constructor.
	 * @param array $listLop
	 * @param int $soLuongLop
	 */
	public function __construct($soLuongLop = 0)
	{
		$this->listLop = Array();
		$this->soLuongLop = $soLuongLop;
	}

	/**
	 * add 1 lop vao list
	 * */
	public function addOneLop($newLop){
		array_push($this->listLop, $newLop);
	}

	/**
	 * get cac lop tu sql
	 * */
	public function getLopInSql(){

		$result = m_admin::getNLopMoiNhat($this->getSoLuongLop());

		foreach ($result as $row) {
			$newLop = new Lop($row->lopID, $row->tenlop);
			$this->addOneLop($newLop);
		}
	}

	/**
	 * @return array
	 */
	public function getListLop()
	{
		return $this->listLop;
	}

	/**
	 * @param array $listLop
	 */
	public function setListLop($listLop)
	{
		$this->listLop = $listLop;
	}

	/**
	 * @return int
	 */
	public function getSoLuongLop()
	{
		return $this->soLuongLop;
	}

	/**
	 * @param int $soLuongLop
	 */
	public function setSoLuongLop($soLuongLop)
	{
		$this->soLuongLop = $soLuongLop;
	}
}


































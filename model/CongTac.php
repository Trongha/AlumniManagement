<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18/11/2018
 * Time: 1:10 SA
 */

require_once ('m_admin.php');
class CongTac{
	private $congtacID;
	private $coquanID;
	private $csv_id;
	private $mucLuong;
	private $noiLamViec;
	private $tbatdau;
	private $tden;

	/**
	 * CongTac constructor.
	 * @param $congtacID
	 * @param $coquanID
	 * @param $csv_id
	 * @param $mucLuong
	 * @param $noiLamViec
	 * @param $tbatdau
	 * @param $tden
	 */
	public function __construct($congtacID=0, $coquanID=0, $csv_id=0, $mucLuong=0, $noiLamViec="", $tbatdau="", $tden=""){
		$this->congtacID = $congtacID;
		$this->coquanID = $coquanID;
		$this->csv_id = $csv_id;
		$this->mucLuong = $mucLuong;
		$this->noiLamViec = $noiLamViec;
		$this->tbatdau = $tbatdau;
		$this->tden = $tden;
	}
//
//	public function getDataByID(){
//
//	}


}
<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02/12/2018
 * Time: 10:23 CH
 */

include_once ('../../model/m_admin.php');

class SearchToolController
{
	private $sClass = null;
	private $sName = null;
	private $sCongViec = null;
	private $minLuong = 0;
	private $maxLuong = 0;

	private $listAlumni;
	private $haveSearch = false;

	private $sql = "SELECT *, 
                    congtac.noilamviec, congtac.mucluong,
                    congtac.congviecdamnhiem
                    FROM cuu_sv
                    LEFT JOIN congtac ON cuu_sv.csv_id = congtac.csv_id
                    JOIN lop ON lop.lopID = cuu_sv.lopid
                    WHERE 1 ";

	/**
	 * SearchToolController constructor.
	 * @param null $sClass
	 * @param null $sName
	 * @param $listAlumni
	 */
	public function __construct($sClass  =null, $sName = null, $listAlumni = null)
	{
		$this->sClass = $sClass;
		$this->sName = $sName;
		$this->listAlumni = $listAlumni;
	}

	/**
	 * @param null $sClass
	 */
	public function setSClass($sClass)
	{
		if ($sClass !==''){
			$this->sClass = $sClass;
			$this->sql .= " AND lop.tenlop LIKE ('%$sClass%') ";
			$this->setHaveSearch(true);
		}

	}

	/**
	 * @param null $sName
	 */
	public function setSName($sName)
	{
		if ($sName !== ''){
			$this->sName = $sName;
			$this->sql.= " AND  cuu_sv.hoten LIKE ('%$this->sName%') ";
			$this->setHaveSearch(true);
		}

	}

	/**
	 * @param null $sCongViec
	 */
	public function setSCongViec($sCongViec)
	{
		if ($sCongViec !== ''){
			$this->sCongViec = $sCongViec;
			$this->sql.= " AND  congtac.congviecdamnhiem LIKE ('%$this->sCongViec%') ";
			$this->setHaveSearch(true);
		}
	}



	/**
	 * @param int $minLuong
	 */
	public function setMinLuong($minLuong)
	{
		if ($minLuong !== null){
			if (is_numeric($minLuong)){
				$this->minLuong = $minLuong;
				$this->sql .= " AND congtac.mucluong >= $minLuong ";
				$this->setHaveSearch(true);
			}
		}
	}

	/**
	 * @param int $maxLuong
	 */
	public function setMaxLuong($maxLuong)
	{
		if ($maxLuong!== null){
			if (is_numeric($maxLuong)){
				$this->maxLuong = $maxLuong;
				$this->sql .= " AND congtac.mucluong <= $maxLuong ";
				$this->setHaveSearch(true);
			}
		}
	}

	/**
	 * @param bool $haveSearch
	 */
	public function setHaveSearch($haveSearch)
	{
		$this->haveSearch = $haveSearch;
	}


	public function setAlumniTable(){
		$this->listAlumni = m_admin::getDataBySqlString($this->sql);

		$thead = "	<tr class=\"info\">
							<th>Stt</th>
							<th>Họ và tên</th>
							<th>Lớp</th>
							<th>Nơi công tác</th>
							<th>Công việc đảm nhiệm</th>
							<th>Mức lương</th>
							<th>Email</th>
							<th>Sđt</th>
						</tr>";
		if(isset($this->listAlumni)) {
			echo "	<thead >
							$thead
						</thead>";
			echo "<tbody>";
			$stt = 0;
			foreach ($this->listAlumni as $Alumni) {
				$mucluong = "";
				if ($Alumni->mucluong > 0) {
					$mucluong .= $Alumni->mucluong . "$";
				}
				$stt++;
				$row = "<tr>
	    			<td>$stt</td>
	    			<td>$Alumni->hoten</td>
	    			<td>$Alumni->tenlop</td>
	    			<td>$Alumni->noilamviec</td>
	    			<td>$Alumni->congviecdamnhiem</td>
	    			<td>$mucluong</td>
	    			<td>$Alumni->email</td>
	    			<td>$Alumni->sdt</td>
	    		</tr>";
				echo $row;
			}
			echo "</tbody>";
		}
	}


	public function runSearchTool(){

		if (isset($_GET["hoten"])){
			$this->setSName($_GET["hoten"]);
		}
		if (isset($_GET["lop"])){
			$this->setSClass($_GET["lop"]);
		}
		if (isset($_GET["minLuong"])){
			$this->setMinLuong($_GET["minLuong"]);
		}
		if (isset($_GET["maxLuong"])){
			$this->setMaxLuong($_GET["maxLuong"]);
		}
		if (isset($_GET["congviec"])){
			$this->setSCongViec($_GET["congviec"]);
		}

		if ($this->haveSearch){
			$this->setAlumniTable();
		}

	}



}
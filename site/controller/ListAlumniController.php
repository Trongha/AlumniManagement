<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 17/11/2018
 * Time: 4:04 CH
 */
include_once ('../../model/m_admin.php');
class ListAlumniController{
	private $classID ;
	private $nameClass;
	private $listAlumni;

	/**
	 * ListAlumniController constructor.
	 * @param string $classID
	 */
	public function __construct()
	{
		if (isset($_GET["classID"])){
			$this->classID = $_GET["classID"];
			$this->setNameClass();
			$this->listAlumni = m_admin::getAllAlumniByClassID($this->classID);
		}
	}

	/**
	 * @param int|string $classID
	 */
	public function setClassID($classID)
	{
		$this->classID = $classID;
	}

	/**
	 * @param mixed $nameClass
	 */
	public function setNameClass()
	{
		if(m_admin::getClassByID($this->classID) !== null){
			$this->nameClass = m_admin::getClassByID($this->classID)[0]->tenlop;
		}
	}

	public function printNameClass(){
		if (isset($_GET["classID"])){
			echo "<h2>Lớp $this->nameClass</h2>";
		}
	}
	public function setAlumniTable(){
		if (isset($_GET["classID"])){
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
			if(isset($this->listAlumni)){
				echo "	<thead >
							$thead
						</thead>";
				echo "<tbody>";
				$stt = 0;
				foreach ($this->listAlumni as $Alumni){
					$mucluong = "";
					if ($Alumni->mucluong > 0){
						$mucluong .= $Alumni->mucluong . "$";
					}
					$stt++;
					$row = "<tr>
	    			<td>$stt</td>
	    			<td>$Alumni->hoten</td>
	    			<td>$this->nameClass</td>
	    			<td>$Alumni->noilamviec</td>
	    			<td>$Alumni->congviecdamnhiem</td>
	    			<td>$mucluong</td>
	    			<td>$Alumni->email</td>
	    			<td>$Alumni->sdt</td>
	    		</tr>";
					echo $row;
				}
				echo"</tbody>";
			}else{
				echo "<h2>Chưa cập nhật danh sách lớp</h2>";
			}
		}
	}

}
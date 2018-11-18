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

	/**
	 * ListAlumniController constructor.
	 * @param string $classID
	 */
	public function __construct($classID = 0)
	{
		$this->classID = $classID;
		$this->setNameClass();
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



	public function setBodyTable(){
		if (isset($_GET["classID"])){
			$this->__construct($_GET["classID"]);
		}
		$listAlumni = m_admin::getAllAlumniByClassID($this->classID);
		if(isset($listAlumni)){
			$stt = 0;
			foreach ($listAlumni as $Alumni){
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
		}
	}

}
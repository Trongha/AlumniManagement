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

	/**
	 * ListAlumniController constructor.
	 * @param string $classID
	 */
	public function __construct($classID = 0)
	{
		$this->classID = $classID;
		echo $this->classID;
	}

	public function setBodyTable(){
		$listAlumni = m_admin::getAllAlumniByClassID($this->classID);
		echo $this->classID;
		$stt = 0;
//		echo var_dump($listAlumni);
		foreach ($listAlumni as $Alumni){
			$stt++;
			$row = "<tr>
	    			<td>$stt</td>
	    			<td>$Alumni->hoten</td>
	    			<td>k61-CB</td>
	    			<td>noilamviec</td>
	    			<td>Code dạo</td>
	    			<td>mucluong</td>
	    			<td>$Alumni->email</td>
	    			<td>$Alumni->sdt</td>
	    		</tr>";
			echo $row;
		}

	}

}
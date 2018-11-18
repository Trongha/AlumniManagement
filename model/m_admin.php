<?php
include('database.php');
class m_admin extends database{
    function getthongbao(){
        $sql="select * from thongbao";
        $this->setQuery($sql);
        return $this->loadAllRows();
    } 
    function getkhaosat(){
        $sql="select * from bangkhaosat";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    function getnguoidung(){
        $sql="select user.*, cuu_sv.*,lop.tenlop, khoa.tenkhoa from 
        user left join cuu_sv on user.userID=cuu_sv.userID left join lop on cuu_sv.lopID=lop.lopID
        left join khoa on lop.khoaID=khoa.khoaID
        order by user.userID DESC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    static function getnLopMoiNhat($n){
		$sql = 'SELECT * FROM lop
				ORDER BY lop.lopID DESC
				LIMIT '.$n;
		return parent::loadAllRowsStatic($sql);
	}
	static function getAllAlumniByClassID($classID){
    	$sql = "SELECT cuu_sv.*, 
                    congtac.noilamviec, congtac.mucluong, 
                    congtac.coquanID, congtac.congviecdamnhiem
                    FROM cuu_sv
                    LEFT JOIN congtac ON cuu_sv.csv_id = congtac.csv_id
                    WHERE lopid = $classID ORDER BY cuu_sv.csv_id";
        return parent::loadAllRowsStatic($sql);
	}
	static function getCongTacInfoByAlumniID($alumniID){
    	$sql = 'SELECT * FROM congtac WHERE csv_id = '.$alumniID;
    	return parent::loadAllRowsStatic($sql);
	}
	static function getClassByID($classID){
		$sql = "SELECT * FROM lop WHERE lopID = $classID";
		return parent::loadAllRowsStatic($sql);
	}
	static function getUserByUsername($username){
    	$sql = "SELECT * FROM `user` WHERE username = '$username'";
    	return parent::loadAllRowsStatic($sql);
	}
	static function getAlumniInfoByUserID($userID){
    	$sql = "SELECT * FROM `cuu_sv` WHERE userID = $userID";
    	return parent::loadAllRowsStatic($sql);
	}
	static function getListKhaoSatByBangID($bangID){
    	$sql = "SELECT * FROM `khaosat` WHERE bangID = $bangID";
    	return parent::loadAllRowsStatic($sql);
	}
}
?>
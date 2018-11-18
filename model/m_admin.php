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
		return database::loadAllRowsStatic($sql);
	}
	static function getAllAlumniByClassID($classID){
    	$sql = 'SELECT * FROM `cuu_sv` WHERE lopid = '.$classID.' ORDER BY csv_id';
    	return database::loadAllRowsStatic($sql);
	}
	static function getCongTacInfoByAlumniID($alumniID){
    	$sql = 'SELECT * FROM congtac WHERE csv_id = '.$alumniID;
    	return database::loadAllRowsStatic($sql);
	}

}
?>
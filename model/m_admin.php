<?php
include('database.php');
class m_admin extends database{
    function getthongbao(){
        $sql="select * from thongbao order by thongbaoID desc";
        $this->setQuery($sql);
        return $this->loadAllRows();
    } 
    function getkhaosat(){
        $sql="select * from bangkhaosat order by bangID desc";
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
<<<<<<< HEAD
    function getchitietthongbao($id){
        $sql="select * from thongbao where thongbaoID=$id";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    function getchitietkhaosat($id){
    }
    function getchitietnguoidung($id){
        $sql="select user.*, cuu_sv.*,lop.tenlop, khoa.tenkhoa,huyen.tenhuyen, tinh.tentinh from 
        user left join cuu_sv on user.userID=cuu_sv.userID left join lop on cuu_sv.lopID=lop.lopID
        left join khoa on lop.khoaID=khoa.khoaID left join huyen on cuu_sv.huyenID=huyen.huyenid left join tinh on huyen.tinhid=tinh.tinhid
        where user.userID=$id";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    function gettinh(){
        $sql="select * from tinh";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    function addthongbao($tenthongbao, $noidung){
        $sql="insert into thongbao(tieude,noidung)
        values(?,?) ";
        $this->setQuery($sql);
        return $this->execute(array($tenthongbao,$noidung));    
    }
    function addbangkhaosat($tenbang){
        $sql="insert into bangkhaosat(tenbang)
        values (?)";
        $this->setQuery($sql);
        return $this->execute(array($tenbang));
    }
    function addcauhoi($bangID,$cauhoi){
        $sql="insert into khaosat(bangID, noidung)
        values (?,?)";
        $this->setQuery($sql);
        return $this->execute(array($bangID,$cauhoi));
    }
    function getmaxid(){
        $sql='select max(bangid) as max from bangkhaosat';
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function gethuyen($tinhid){
        $sql="select * from huyen where tinhid=$tinhid";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    function getkhoa(){
        $sql="select * from khoa";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    function getlop($khoaid){
        $sql="select * from lop where khoaid=$khoaid";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    function themuser($username,$password,$isadmin,$isuser){
        $sql="insert into user (username,password, isadmin, isuser)
        values (?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($username,$password,$isadmin,$isuser));
    }
    function themthongtincsv($csvid,$hoten,$email,$huyenid,$anh,$lopid,$userid,$sdt,$ngaysinh){
        $sql="insert into cuu_sv (csv_id,hoten,email,huyenid,anh,lopid,userid,sdt,ngaysinh)
        values (?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($csvid,$hoten,$email,$huyenid,$anh,$lopid,$userid,$sdt,$ngaysinh));
    }
    function themcongviec($noilamviec,$congviecdamnhiem,$mucluong,$csvid,$thoigian){
        $sql="insert into congtac(noilamviec,congviecdamnhiem,mucluong,csvid,thoigian)
        values(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($noilamviec,$congviecdamnhiem,$mucluong,$csvid,$thoigian));
    }
    function getmaxuserid(){
        $sql="select max(userid) as max from user";
        $this->setQuery($sql);
        return $this->loadRow();
    }
=======
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
>>>>>>> 936f4a02a047eb5ef214227b121b9158df86f14c
}
?>
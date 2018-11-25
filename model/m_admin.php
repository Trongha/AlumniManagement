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
    function getchitietthongbao($id){
        $sql="select * from thongbao where thongbaoID=$id";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    function getchitietkhaosat($id){
        $sql="select * from khaosat where khaosatID=$id";
        $this->setQuery($sql);
        return $this->loadRow(array($id));}
    function getchitietnguoidung($id){
        $sql="select user.*, cuu_sv.*,lop.*, khoa.*,huyen.*, tinh.*, GROUP_CONCAT(congtac.congtacID,':',congtac.congviecdamnhiem,':',congtac.noilamviec,':',congtac.thoigian,':',congtac.mucluong) as congviec from 
        user left join cuu_sv on user.userID=cuu_sv.userID left join lop on cuu_sv.lopID=lop.lopID
        left join khoa on lop.khoaID=khoa.khoaID left join huyen on cuu_sv.huyenID=huyen.huyenid left join tinh on huyen.tinhid=tinh.tinhid
        left join congtac on cuu_sv.csv_id=congtac.csv_id 
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
    function themthongtincsv($msv,$hoten,$email,$huyenid,$anh,$lopid,$userid,$sdt,$ngaysinh){
        $sql="insert into cuu_sv (msv,hoten,email,huyenid,anh,lopid,userid,sdt,ngaysinh)
        values (?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($msv,$hoten,$email,$huyenid,$anh,$lopid,$userid,$sdt,$ngaysinh));
    }
    function themcongviec($noilamviec,$congviecdamnhiem,$mucluong,$csvid,$thoigian){
        $sql="insert into congtac(noilamviec,congviecdamnhiem,mucluong,csv_id,thoigian)
        values(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($noilamviec,$congviecdamnhiem,$mucluong,$csvid,$thoigian));
    }
    function getmaxuserid(){
        $sql="select max(userID) as max from user";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getmaxcsvid(){
        $sql="select max(csv_id) as max from cuu_sv";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function checkmasv($msv){
        $sql="select msv from cuu_sv where csv_id=$msv";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function checkusername($username){
        $sql='select username from user where username="'.$username.'"';
        $this->setQuery($sql);
        return $this->loadRow();}
        function checkusername1($userid,$username){
            $sql="select username from user where username=$username and userID != $userid";
            $this->setQuery($sql);
            return $this->loadRow();}
    function themlop($tenlop,$khoaid){
        $sql=" insert into lop (tenlop,khoaID)
        values(?,?)";
        $this->setQuery($sql);
        return $this->execute(array($tenlop,$khoaid));
    }
    function checktenlop($tenlop){
        $sql="select telop from lop where tenlop=$tenlop";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getcauhoi($id){
        $sql="select * from khaosat 
        where bangID=$id";
        $this->setQUery($sql);
        return $this->loadAllRows();
    }
    function gettenbang($id){
        $sql="select tenbang from bangkhaosat
        where bangID=$id";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function capnhatuser($userid, $username,$password){
        $sql="update user
        set username=?, password=?
        where userid=?";
        $this->setQuery($sql);
        return $this->execute(array($username,$password,$userid));

    }
    function capnhatcsv($userid, $hoten, $msv,$email,$huyenid,$anh,$lopid,$sdt,$ngaysinh){
        $sql="update cuu_sv
        set hoten=?,msv=?, email=?,huyenid=?,anh=?,lopid=?,sdt=?,ngaysinh=?
        where userid=?";
        $this->setQuery($sql);
        return $this->execute(array($hoten,$msv,$email,$huyenid,$anh,$lopid,$sdt,$ngaysinh,$userid));

    }
    function xoacongviec($csvid){
        $sql="delete from congtac where csv_id=?";
        $this->setQuery($sql);
        return $this->execute(array($csvid));
    }
    function xoauser($userid){
        $sql="delete from user where userID=?";
        $this->setQuery($sql);
        return $this->execute(array($userid));
    }
    function xoacuusv($userid){
        $sql="delete from cuu_sv where userid=?";
        $this->setQuery($sql);
        return $this->execute(array($userid));
    }
    function xoacongtac($csvid){
        $sql="delete from congtac where csv_id=?";
        $this->setQuery($sql);
        return $this->execute(array($csvid));
    }
    function getluongduoi1000(){
        $sql="select count(*) as duoi1000 from congtac where mucluong<1000";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getluong1000den5000(){
        $sql="select count(*) as duoi5000 from congtac where mucluong>=1000 and mucluong<5000";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getluongtren5000(){
        $sql="select count(*) as tren5000 from congtac where mucluong>=5000";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getloginhomnay(){
        $sql="select count(*) as homnay  from history where noidung='login'";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getloginhomqua(){
        $sql="select count(*) as homqua  from history where noidung='login' and datediff(now(),thoigian)=1";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getlogin3ngaytruoc(){
        $sql="select count(*) as bangaytruoc  from history where noidung='login' and datediff(now(),thoigian)=2";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getlogin4ngaytruoc(){
        $sql="select count(*) as bonngaytruoc  from history where noidung='login' and datediff(now(),thoigian)=3";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getlogin5ngaytruoc(){
        $sql="select count(*) as namngaytruoc  from history where noidung='login' and datediff(now(),thoigian)=4";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getlogin6ngaytruoc(){
        $sql="select count(*) as saungaytruoc  from history where noidung='login' and datediff(now(),thoigian)=5";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function getlogin7ngaytruoc(){
        $sql="select count(*) as bayngaytruoc  from history where noidung='login' and datediff(now(),thoigian)=6";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    /*function getluachonkhong($id){
        $sql="select khaosat.*, count(kqkhaosat.luachon='co') as co,
        count(kqkhaosat.luachon='khong') as khong, 
        count(kqkhaosat.luachon='khonghan') as khonghan from khaosat join kqkhaosat on khaosat.khaosatID=kqkhaosat.khaosatID 
        where bangID=$id
        group by khaosatID";
        $this->setQUery($sql);
        return $this->loadAllRows();
    }*/
    function getlichsu(){
        $sql="select user.username,cuu_sv.anh, history.thoigian,history.noidung from user 
        join history on user.userID=history.userID left join cuu_sv on user.userID=cuu_sv.userID
        order by hisID desc 
        limit 10" ;
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    function getkqco($id){
        $sql="select khaosat.*, count(kqkhaosat.luachon) as co
        from khaosat left join kqkhaosat on khaosat.khaosatID=kqkhaosat.khaosatID 
        where bangID=$id and kqkhaosat.luachon='co'
        group by khaosatID";
        $this->setQUery($sql);
        return $this->loadAllRows();
    }
    function getkqkhong($id){
        $sql="select khaosat.*, count(kqkhaosat.luachon) as khong
        from khaosat left join kqkhaosat on khaosat.khaosatID=kqkhaosat.khaosatID 
        where bangID=$id and kqkhaosat.luachon='khong'
        group by khaosatID";
        $this->setQUery($sql);
        return $this->loadAllRows();
    }
    function getkqkhonghan($id){
        $sql="select khaosat.*, count(kqkhaosat.luachon) as khonghan
        from khaosat left join kqkhaosat on khaosat.khaosatID=kqkhaosat.khaosatID 
        where bangID=$id and kqkhaosat.luachon='khonghan'
        group by khaosatID";
        $this->setQUery($sql);
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
                    congtac.congviecdamnhiem
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
	static function getnKhaoSatMoiNhat($n){
    	$sql = "SELECT * FROM `bangkhaosat`
				ORDER BY bangID
				LIMIT $n";
    	return parent::loadAllRowsStatic($sql);
	}
	static function insertIntoKetQuaKhaoSat($khaoSatID, $csvID, $luaChon){
		$sql = "INSERT INTO `kqkhaosat` (`ketquaID`, `luachon`, `csv_id`, `khaosatID`) VALUES (NULL, '$luaChon', '$csvID', '$khaoSatID')";
		return parent::loadAllRowsStatic($sql);
	}
	static function getBangKhaoSatByID($bangID){
    	$sql = "SELECT * FROM `bangkhaosat` WHERE bangID = $bangID";
    	return parent::loadAllRowsStatic($sql);
	}
	static function getkThongBao($k){
    	$sql = "SELECT * FROM `thongbao` 
				ORDER BY thongbaoID DESC
				limit $k";
    	return parent::loadAllRowsStatic($sql);
	}
	static function getThongBaoByID($thongbaoID){
		$sql = "SELECT * FROM `thongbao` WHERE thongbaoID = $thongbaoID";
		return parent::loadAllRowsStatic($sql);
	}
	static function writeHistory($userID, $sAction){
    	$sql = "INSERT into history (userID, noidung)
					VALUES ($userID,\"$sAction\")";
    	return parent::loadAllRowsStatic($sql);
	}
}
?>
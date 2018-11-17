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
        user join cuu_sv on user.userID=cuu_sv.userID join lop on user.lopID=lop.lopID
        join khoa on lop.khoaID=khoa.khoaID
        oderby user.userID DESC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
?>
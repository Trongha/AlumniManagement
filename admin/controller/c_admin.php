<?php
include("../model/m_admin.php");
class c_admin{
    public function quanlidanhmuc(){
        $m_danhmuc= new m_admin();
        $listthongbao=$m_danhmuc->getthongbao();
        $listkhaosat=$m_danhmuc->getkhaosat();
        return array('listthongbao'=>$listthongbao,'listkhaosat'=>$listkhaosat);

    }
}
?>
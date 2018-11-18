<?php
session_start();
include("../../model/m_admin.php");
class c_admin{
    public function quanlidanhmuc(){
        $m_danhmuc= new m_admin();
        $listthongbao=$m_danhmuc->getthongbao();
        $listkhaosat=$m_danhmuc->getkhaosat();
        return array('listthongbao'=>$listthongbao,'listkhaosat'=>$listkhaosat);

    }
    public function quanlinguoidung(){
        $m_danhmuc=new m_admin();
        $listnguoidung= $m_danhmuc->getnguoidung();
        return array('listnguoidung'=>$listnguoidung);
    }
    public function chitietthongbao(){
        $id_thongbao=$_GET['id'];
        $m_danhmuc=new m_admin();
        $chitietthongbao=$m_danhmuc->getchitietthongbao($id_thongbao);
        return array('chitietthongbao'=>$chitietthongbao);
    }
    public function chitietkhaosat(){
        $id_khaosat=$_GET['id'];
        $m_danhmuc=new m_admin();
        $chitietthongbao=$m_danhmuc->getchitietthongbao($id_khaosat);
        return array('chitietkhaosat'=>$chitietkhaosat);
    }
    public function edit(){
        //$id_user=$_GET['id'];
        $m_danhmuc= new m_admin();
        //$chitietnguoidung=$m_danhmuc->getchitietnguoidung($id_user);
        $listtinh=$m_danhmuc->gettinh();
        $listkhoa=$m_danhmuc->getkhoa();
        return array(/*'chitietnguoidung'=>$chitietnguoidung,*/'listtinh'=>$listtinh,'listkhoa'=>$listkhoa);
    }
    public function xulithongbao(){
        $tenthongbao=$_GET['tieude'];
        $noidung=$_GET['noidung'];
        $m_danhmuc=new m_admin();
        $m_danhmuc->addthongbao($tenthongbao, $noidung);
        header('Location: http://localhost/AlumniManagement/admin/view/quanlidanhmuc.php');
    }
    public function addtenbang(){
        $m_danhmuc=new m_admin();
        $tenbang=$_GET['tenbang'];
        $m_danhmuc->addbangkhaosat($tenbang);
    }
    public function addcauhoi(){
        $m_danhmuc=new m_admin();
        $bangid=$m_danhmuc->getmaxid();
        $id=array('maxid'=>$bangid);
        $maxid=$id['maxid'];
        $noidung=$_GET['cauhoi'];
        for($i=0;$i<count($noidung);$i++){
            $m_danhmuc->addcauhoi($maxid->max,$noidung[$i]);
        }
    }
    public function huyen(){
        $m_danhmuc=new m_admin();
        $tinhid=$_POST['tinhid'];
        $listhuyen=$m_danhmuc->gethuyen($tinhid);
        return array('listhuyen'=>$listhuyen);
    }
    public function lop(){
        $m_danhmuc=new m_admin();
        $khoaid=$_POST['khoaid'];
        $listlop=$m_danhmuc->getlop($khoaid);
        return array('listlop'=>$listlop);
    }
    public function themnguoidung(){
        $m_danhmuc=new m_admin();
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(isset($_POST['user'])){
            $isuser=1;
        }
        else{
            $isuser=0;
        }
        if(isset($_POST['admin'])){
            $isadmin=1;
        }
        else{
            $isadmin=0;
        }
        $m_danhmuc->themuser($username,$password,$isadmin,$isuser);
        if($isuser==1){
            $hoten=$_POST['name'];
            $ngaysinh=$_POST['dob'];
        if(isset($_FILES['imgi']['name'])){ // Đã chọn file
	            //Kiểm tra định dạng tệp tin
	    if($_FILES['imgi']['type'] == "image/jpeg" || $_FILES['imgi']['type'] == "image/png" || $_FILES['imgi']['type'] == "image/gif"){
		//Tiếp tục kiểm tra dung lượng
		$maxFileSize = 10 * 1000 * 1000; //MB
		if($_FILES['imgi']['size'] > ($maxFileSize * 1000 * 1000)){
			echo 'Tập tin không được vượt quá: '.$maxFileSize.' MB';
		} else {
			//Hợp lệ tiếp tục xử lý Upload
			$path = 'public/images/'; //Lưu trữ tập tin vào thư mục: images
			$tmp_name = $_FILES['imgi']['tmp_name'];
			$name = $_FILES['imgi']['name'];
			$type = $_FILES['imgi']['type']; 
			$size = $_FILES['imgi']['size']; 
			//Upload file
            move_uploaded_file($tmp_name,$path.$name);
            $img=$path.$name;
	}
            }
            else $img='';
        }
        else{
            $img='';
        }
        if(isset($_POST['lop'])){
        $lopid=$_POST['lop'];}
        else{$lopid='';}
        $userid=$m_danhmuc->getmaxuserid();
        $id=array('maxid'=>$userid);
        $maxuserid=$id['maxid'];
        $email=$_POST['email'];
        if(isset($_POST['sdt'])){
            $sdt=$_POST['sdt'];
        }
  
        else{
            $sdt='';
        }
        $csvid=$_POST['msv'];
        if(isset($_POST['huyen'])){
        $huyenid=$_POST['huyen'];}
        else{
            $huyenid='';
        }
        $m_danhmuc->themthongtincsv($csvid,$hoten,$email,$huyenid,$img,$lopid,$userid->max,$sdt,$ngaysinh);
        $listvitri=$_POST['vitri'];
        $listcoquan=$_POST['coquan'];
        $listthoigian=$_POST['thoigian'];
        $listmucluong=$_POST['mucluong'];
        for($i=0;$i<count($listvitri);$i++){
            $m_danhmuc->themcongviec($listcoquan[$i],$listvitri[$i],$listmucluong[$i],$csvid,$listthoigian[$i]);
        }

    }   
}
}
?>
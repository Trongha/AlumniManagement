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
    public function edit1(){
        $id_user=$_GET['id'];
        $m_danhmuc= new m_admin();
        $chitietnguoidung=$m_danhmuc->getchitietnguoidung($id_user);
        $listtinh=$m_danhmuc->gettinh();
        $listkhoa=$m_danhmuc->getkhoa();
        $listhuyen=$m_danhmuc->gethuyen($chitietnguoidung[0]->tinhid);
        $listlop=$m_danhmuc->getlop($chitietnguoidung[0]->khoaID);
        return array('listlop'=>$listlop,'chitietnguoidung'=>$chitietnguoidung,'listtinh'=>$listtinh,'listkhoa'=>$listkhoa,'listhuyen'=>$listhuyen);
    }
    public function edit(){
        $m_danhmuc= new m_admin();
        $listtinh=$m_danhmuc->gettinh();
        $listkhoa=$m_danhmuc->getkhoa();
        return array('listtinh'=>$listtinh,'listkhoa'=>$listkhoa);
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
            $m_danhmuc->addcauhoi($maxid[0]->max,$noidung[$i]);
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
        if(isset($_SESSION['errorimg'])){
            unset($_SESSION['errorimg']);
        }
        if(isset($_SESSION['errorusername'])){
            unset($_SESSION['errorusername']);
        }
        if(isset($_SESSION['errormsv'])){
            unset($_SESSION['errormsv']);
        }
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
        $checkusername=$m_danhmuc->checkusername($username);
        if(empty($checkusername)){
        $m_danhmuc->themuser($username,$password,$isadmin,$isuser);
           
    }
        else{
            $_SESSION['errorusername']="Tên đăng nhập đã tồn tại!";
            }
        if($isuser==1){
            $hoten=$_POST['name'];
            $ngaysinh=$_POST['dob'];
            if(isset($_FILES['imgi']['name'])){ // Đã chọn file
                //Kiểm tra định dạng tệp tin
        if($_FILES['imgi']['type'] == "image/jpeg" || $_FILES['imgi']['type'] == "image/jpg" || $_FILES['imgi']['type'] == "image/png" || $_FILES['imgi']['type'] == "image/gif"){
        //Tiếp tục kiểm tra dung lượng
        $maxFileSize = 10 * 1000 * 1000; //MB
        if($_FILES['imgi']['size'] > ($maxFileSize * 1000 * 1000)){
            echo 'Tập tin không được vượt quá: '.$maxFileSize.' MB';
        } else {
            //Hợp lệ tiếp tục xử lý Upload
            $path = '../../public/images/'; //Lưu trữ tập tin vào thư mục: images
            $tmp_name = $_FILES['imgi']['tmp_name'];
            $name = $_FILES['imgi']['name'];
            $type = $_FILES['imgi']['type']; 
            $size = $_FILES['imgi']['size']; 
            //Upload file
            move_uploaded_file($tmp_name,$path.$name);
            $img=$path.$name;
    }
            }
            else $_SESSION['errimg']="File ảnh không hợp lệ!";
        }
        else{
            $_SESSION['errimg']="File ảnh không hợp lệ!";
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
        $msv=$_POST['msv'];
        if(isset($_POST['huyen'])){
        $huyenid=$_POST['huyen'];}
        else{
            $huyenid='';
        }
        $checkmsv=$m_danhmuc->checkmasv($msv);
        if(empty($checkmsv)){
        $m_danhmuc->themthongtincsv($msv,$hoten,$email,$huyenid,$img,$lopid,$maxuserid[0]->max,$sdt,$ngaysinh);
    
        $csvid=$m_danhmuc->getmaxcsvid();
        $id1=array('maxid'=>$csvid);
        $maxcsvid=$id1['maxid'];
        $listvitri=$_POST['vitri'];
        $listcoquan=$_POST['coquan'];
        $listthoigian=$_POST['thoigian'];
        $listmucluong=$_POST['mucluong'];
        for($i=0;$i<count($listvitri);$i++){
            $m_danhmuc->themcongviec($listcoquan[$i],$listvitri[$i],$listmucluong[$i],$maxcsvid[0]->max,$listthoigian[$i]);
           
        }}
        else
        $_SESSION['errormsv']="Mã sinh viên đã tồn tại!";
    }
     
    
    }
public function themlop(){
    $m_danhmuc=new m_admin();
    $tenlop=$_GET['addclass'];
    $khoaid=$_GET['khoa'];
    $m_danhmuc->themlop($tenlop,$khoaid);
}
public function getchitietkhaosat(){
    $m_danhmuc=new m_admin();
    $bangid=$_GET['id']; 
    $tenbang=$m_danhmuc->gettenbang($bangid);
    $listcauhoi=$m_danhmuc->getcauhoi($bangid);
    $kqco=$m_danhmuc->getkqco($bangid);
    $kqkhong=$m_danhmuc->getkqkhong($bangid);
    $kqkhonghan=$m_danhmuc->getkqkhonghan($bangid);
    return array('listcauhoi'=>$listcauhoi,'kqco'=>$kqco,'kqkhong'=>$kqkhong,'kqkhonghan'=>$kqkhonghan,'tenbang'=>$tenbang);

}
public function capnhatthongtin(){
    $m_danhmuc=new m_admin();
    $userid=$_GET['userid'];
    $isuser=$_GET['isuser'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $checkusername=$m_danhmuc->checkusername($userid,$username);
        if(empty($checkusername1)){
            $m_danhmuc->capnhatuser($userid,$username,$password);
            if(isset($_SESSION['errorusername'])){
                unset($_SESSION['errorusername']);
            }
    }
        else{
            $_SESSION['errorusername']="Tên đăng nhập đã tồn tại!";
            }
            if($isuser==1){
                $hoten=$_POST['name'];
                $ngaysinh=$_POST['dob'];

                if(isset($_FILES['imgi']['name'])){ // Đã chọn file
                    //Kiểm tra định dạng tệp tin
            if($_FILES['imgi']['type'] == "image/jpeg" || $_FILES['imgi']['type'] == "image/jpg" || $_FILES['imgi']['type'] == "image/png" || $_FILES['imgi']['type'] == "image/gif"){
            //Tiếp tục kiểm tra dung lượng
            $maxFileSize = 10 * 1000 * 1000; //MB
            if($_FILES['imgi']['size'] > ($maxFileSize * 1000 * 1000)){
                echo 'Tập tin không được vượt quá: '.$maxFileSize.' MB';
            } else {
                //Hợp lệ tiếp tục xử lý Upload
                $path = '../../public/images/'; //Lưu trữ tập tin vào thư mục: images
                $tmp_name = $_FILES['imgi']['tmp_name'];
                $name = $_FILES['imgi']['name'];
                $type = $_FILES['imgi']['type']; 
                $size = $_FILES['imgi']['size']; 
                //Upload file
                move_uploaded_file($tmp_name,$path.$name);
                $img=$path.$name;
        }
                }
                else $_SESSION['errimg']="File ảnh không hợp lệ!";
            }
            else{
                $_SESSION['errimg']="File ảnh không hợp lệ!";
            }
            if(isset($_POST['lop'])){
            $lopid=$_POST['lop'];}
            else{$lopid='';}
            $email=$_POST['email'];
            if(isset($_POST['sdt'])){
                $sdt=$_POST['sdt'];
            }
      
            else{
                $sdt='';
            }
            $msv=$_POST['msv'];
            if(isset($_POST['huyen'])){
            $huyenid=$_POST['huyen'];}
            else{
                $huyenid='';
            }
            $checkmsv=$m_danhmuc->checkmasv($msv);
            if(empty($checkmsv)){
            $m_danhmuc->capnhatcsv($userid, $hoten, $msv,$email,$huyenid,$img,$lopid,$sdt,$ngaysinh);
            if(isset($_SESSION['errormsv'])){
                unset($_SESSION['errormsv']);
            }
            $csvid=$_GET['csvid'];
            $m_danhmuc->xoacongviec($csvid);
            $listvitri=$_POST['vitri'];
            $listcoquan=$_POST['coquan'];
            $listthoigian=$_POST['thoigian'];
            $listmucluong=$_POST['mucluong'];
            for($i=0;$i<count($listvitri);$i++){
                $m_danhmuc->themcongviec($listcoquan[$i],$listvitri[$i],$listmucluong[$i],$csvid,$listthoigian[$i]);
               
            }}
            else
            $_SESSION['errormsv']="Mã sinh viên đã tồn tại!";
        }
}
public function xoanguoidung(){
    $m_danhmuc=new m_admin();
    $userid=$_GET['id'];
    if(isset($_GET['csvid'])){
        $csvid=$_GET['csvid'];
        $m_danhmuc->xoacongviec($csvid);
        $m_danhmuc->xoacuusv($userid);
    }
    $m_danhmuc->xoauser($userid);
}
public function thongke(){
    $m_danhmuc=new m_admin();
    $duoi1000=$m_danhmuc->getluongduoi1000();
    $duoi5000=$m_danhmuc->getluong1000den5000();
    $tren5000=$m_danhmuc->getluongtren5000();
    $homnay=$m_danhmuc->getloginhomnay();
    $homqua=$m_danhmuc->getloginhomqua();
    $bangaytruoc=$m_danhmuc->getlogin3ngaytruoc();
    $bonngaytruoc=$m_danhmuc->getlogin4ngaytruoc();
    $namngaytruoc=$m_danhmuc->getlogin5ngaytruoc();
    $saungaytruoc=$m_danhmuc->getlogin6ngaytruoc();
    $bayngaytruoc=$m_danhmuc->getlogin7ngaytruoc();
    $lichsu=$m_danhmuc->getlichsu();
    return array('duoi1000'=>$duoi1000,'duoi5000'=>$duoi5000,'tren5000'=>$tren5000,'homnay'=>$homnay,'homqua'=>$homqua, 'bangaytruoc'=>$bangaytruoc,'bonngaytruoc'=>$bonngaytruoc,'namngaytruoc'=>$namngaytruoc,'saungaytruoc'=>$saungaytruoc,'bayngaytruoc'=>$bayngaytruoc,'lichsu'=>$lichsu);
}
}
?>
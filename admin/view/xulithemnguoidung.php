<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
$c_admin->themnguoidung();
if(isset($_SESSION['errorusername']) || isset($_SESSION['errormsv'])){
    header('Location: http://localhost/AlumniManagement/admin/view/themuser.php');
}
else{
    header('Location: http://localhost/AlumniManagement/admin/view/quanlinguoidung.php');
}
?>
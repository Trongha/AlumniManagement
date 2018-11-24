<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
$c_admin->capnhatthongtin();
header('Location: http://localhost/AlumniManagement/admin/view/quanlinguoidung.php');

?>
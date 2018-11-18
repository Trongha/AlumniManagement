<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
$c_admin->addtenbang();
$c_admin->addcauhoi();
header('Location: http://localhost/AlumniManagement/admin/view/quanlidanhmuc.php');

?>
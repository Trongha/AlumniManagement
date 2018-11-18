<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
$c_admin->xulithongbao();
header('Location: http://localhost/AlumniManagement/admin/view/quanlidanhmuc.php');

?>
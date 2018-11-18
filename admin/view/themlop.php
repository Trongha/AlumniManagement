<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
$noidung=$c_admin->themlop();
header('Location:http://localhost/AlumniManagement/admin/view/themuser.php');
?>
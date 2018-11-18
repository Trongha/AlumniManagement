<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
$noidung=$c_admin->lop();
$listlop=$noidung['listlop'];
foreach($listlop as $lop){ 
    echo '<option value="'.$lop->lopID.'">'.$lop->tenlop.'</option>';
}
?>
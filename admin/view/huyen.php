<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
$noidung=$c_admin->huyen();
$listhuyen=$noidung['listhuyen'];
foreach($listhuyen as $huyen){ 
    echo '<option value="'.$huyen->huyenid.'">'.$huyen->tenhuyen.'</option>';
}
?>
<?php
    require_once ('../../model/mySession.php');
    mySession::checkLogin();

     require_once ("../controller/BaiDangController.php");
     $manager = new BaiDangController();
     include('../controller/editController.php');
     $c_admin=new c_admin();
     $noidung=$c_admin->edit1();
     $chitietnguoidung=$noidung['chitietnguoidung'];
     $listtinh=$noidung['listtinh'];
     $listkhoa=$noidung['listkhoa'];
     $listhuyen=$noidung['listhuyen'];
     $listlop=$noidung['listlop'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<!-- <meta charset="UTF-8" http-equiv="refresh" content="1"> -->

	<meta charset="UTF-8">
    <!-- bootstrap -->
	<link rel="stylesheet" href="../../public/vendor/bootstrapv3/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../public/vendor/bootstrapv3/css/bootstrap-theme.min.css">
    <!-- font -->
    <link rel="stylesheet" type="text/css" href="../../public/vendor/fontawesome-free/css/all.min.css">
    <!-- my CSS -->
    <link rel="stylesheet" href="../../public/AlumniDetail/AlumniDetain.css">
    <link rel="stylesheet" href="../../public/Home/NavFoo.css">
	<title>Alumni_Detail</title>

</head>
<body>
<!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5">
            <div class="navbar-header">
                
                <a class="logo navbar-brand page-scroll" href="Home.php">
                    <img src="../../public/Home/img/uetLogo.png" alt="">_Uet_Alumni
                </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 myMenu">
            <div class="collapse navbar-collapse navbar-main-collapse centerNav">
                <ul class="nav navbar-nav center">
                    <li><a href="Home.php">Trang chủ</a></li>
                    <li><a class="" href="#Bảng tin">Tin tức</a></li>
                    <li><a class="" href="ListClasses.php">Các lớp</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li >
                        <a href=""><i class="fa fa-search "></i></a> 
                    </li>
                    <li  class="active" >
                        <?php
						    require_once ('../controller/HomeController.php');
						    HomeController::setUsernameNav();
                        ?>
                    </li>
                    <li>
                        <a href="https://localhost/AlumniManagement/" title="Sign Out"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                    
                </ul>
            </div>
            <!-- end navbar-collapse -->
        </div>

    </nav>  
        <!-- end Nav -->

    <div class="myHeader"></div>

    <div class="AlumniDetail">

            <div id="user-info">
						<!-- Name input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Họ tên</label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" class="form-control" onblur="this.value=ChuanhoaTen(this.value);" value="<?=$chitietnguoidung[0]->hoten?>" required>
							</div>
						</div>
						<!-- dob input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="dob">Ngày sinh</label>
							<div class="col-md-9">
								<input id="dob" name="dob" type="date" class="form-control" value="<?=$chitietnguoidung[0]->ngaysinh?>" required>
							</div>
						</div>
						<!-- msv-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="msv">Mã sinh viên</label>
							<div class="col-sm-9">
								<input id="msv" class="form-control" name="msv" type="text" value="<?=$chitietnguoidung[0]->msv?>" required>
							</div>
							<?php
							if(isset($_SESSION['errormsv'])){
								echo "<div class='col-md-9' style='float:right color:red'>".$_SESSION['errormsv']."</div>";
								unset($_SESSION['errormsv']);
							}
							?>
						</div>
						<!-- img input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="imgi">Ảnh</label>
							<div class="col-sm-9">
								<input type="file" name="imgi">
							</div>
							<?php
							if(isset($_SESSION['errorimg'])){
								echo "<div class='col-md-9 errmess' style='float:right'>".$_SESSION['errorimg']."</div>";
								unset($_SESSION['errorimg']);
							}
							?>
						</div>
						
						<!--img output-->
						<div class="form-group">
							<label class="col-md-3 control-label">&nbsp;</label>
							<?php
							if($chitietnguoidung[0]->anh != ''){
							?>
							<div class="col-sm-3" id="anh">
								<img src="<?=$chitietnguoidung[0]->anh?>" class="form-control"  style="height:100px; width:100px">
							</div>
							<?php
							}
							else{
							?>
							<div class="col-sm-3" id="anh">
								<img src="../../public/admin/img/400x300.png" class="form-control" style="height:100px; width:100px">
							</div>
							<?php } ?>
						</div>
						<!-- Email input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="email">E-mail</label>
							<div class="col-md-9">
								<input id="email" name="email" type="text" class="form-control" value="<?=$chitietnguoidung[0]->email?>" required>
							</div>
						</div>
						
						<!-- phonenum input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="sdt">Số điện thoại</label>
							<div class="col-md-9">
								<input id="sdt" name="sdt" type="text" value="<?=$chitietnguoidung[0]->sdt?>" class="form-control">
							</div>
						</div>
						<!-- Address input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="address">Quê quán</label>
							<div class="col-md-3">
								<select id="tinh" name="tinh" class="form-control" style=" min-width: 100px;"  required>
									<option value="" disabled selected>Tỉnh</option>
									<?php
									foreach($listtinh as $tinh){
										if($chitietnguoidung[0]->tentinh==$tinh->tentinh){
									?>
									<option value="<?=$tinh->tinhid?>" selected><?=$tinh->tentinh?></option>
									<?php
									}else{
									?>
									<option value="<?=$tinh->tinhid?>"><?=$tinh->tentinh?></option>
									<?php
									}
								}
									?>
								</select>
							</div>
							<div class="col-md-1 control-label"></div>
							<div class="col-md-3">
								<select id="huyen" name="huyen" class="form-control" style=" min-width: 100px;" required>
								<option value="" disabled selected>Huyện</option>
									<?php
									foreach($listhuyen as $huyen){
										if($chitietnguoidung[0]->tenhuyen==$huyen->tenhuyen){
											?>
											<option value="<?=$huyen->huyenid?>" selected><?=$huyen->tenhuyen?></option>
											<?php
											}else{
											?>
											<option value="<?=$huyen->huyenid?>"><?=$huyen->tenhuyen?></option>
											<?php
											}
										}
											?>

								</select>

							</div>
						</div>
						<!-- Class input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="class">Lớp</label>
							<div class="col-md-3">
								<select id="lop" name="lop" class="form-control" style=" min-width: 100px;" required>
								<?php
									foreach($listlop as $lop){
										if($chitietnguoidung[0]->tenlop==$lop->tenlop){
											?>
											<option value="<?=$lop->lopID?>" selected><?=$lop->tenlop?></option>
											<?php
											}else{
											?>
											<option value="<?=$lop->lopID?>"><?=$lop->tenlop?></option>
											<?php
											}
										}
											?>
								</select>
							
							</div>
							<div class="col-md-1"></div>
							<div class="col-md-3">
								<select id="khoa" class="form-control" style=" min-width: 100px;" required>
								<?php
									foreach($listkhoa as $khoa){
										if($chitietnguoidung[0]->tenkhoa==$khoa->tenkhoa){
									?>
									<option value="<?=$khoa->khoaid?>" selected><?=$khoa->tenkhoa?></option>
									<?php
									}else{
									?>
									<option value="<?=$khoa->khoaid?>"><?=$khoa->tenkhoa?></option>
									<?php
									}
								}
									?>
								</select>

							</div>
						</div>
						<!-- congviec input-->
						<div class="form-group">
							<label class="col-md-3 control-label">Công việc</label>
							<div class="col-md-9">
								<table class="table" id="job-table" class="form-control">
									<thead>
										<tr>
											<th>Vị trí</th>
											<th>Cơ quan</th>
											<th>Thời gian</th>
											<th>Mức Lương (USD)</th>
											<th class="col-sm-1">
												<!--button them 1 user-->
												<button id="newjob" type="button" class="material-icons btn" style="padding:0px; color: black; background-color: white">add</button>
											</th>
	
										</tr>
									</thead>
									<tbody>
									<?php
									if($chitietnguoidung[0]->congviec!=0){
									$congviec= explode(',',$chitietnguoidung[0]->congviec);
									
									foreach($congviec as $cv){
									list($id,$vitri,$coquan,$thoigian,$mucluong)=explode(':',$cv);
									?>
										<tr>
											<td><input class="vitri" name="vitri[]" type="text" value="<?=$vitri?>" required></td>
											<td><input class="coquan" name="coquan[]" type="text" value="<?=$coquan?>" required></td>
											<td><input class="thoigian" name="thoigian[]" type="text" value="<?=$thoigian?>" required></td>
											<td>
												<input class="mucluong" name="mucluong[]" type="number" value="<?=$mucluong?>" class="job-profile" required>
												
											</td>
											<td class="col-md-2">
												<button type="button" class="btn material-icons deleterow" style="padding:0px; background-color: white" onclick="deleteRowNow(event)">
													delete
												</button>
											</td>
										</tr>
										<?php
									}}
										?>
									</tbody>
								</table>
								
						

							</div>

						</div>

						<!-- Message body -->
						<div class="form-group">
							<label class="col-md-3 control-label" for="message">Ghi chú</label>
							<div class="col-md-9">
								<textarea class="form-control" id="message" name="message" placeholder="..." rows="5"></textarea>
							</div>
							</div>
						</div>

    </div>

    <div class= "footer">
        <div class="container">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <h3>
                    Copyright &copy; Team
                </h3>
            </div>
            <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4">
                <div class="text-right">
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-square fa-3x social"></i></a>
                    <a href="mailto:Trongha.hd.98@gmai.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
                </div>
            </div>
        </div>
    </div>

	<script src="../../public/vendor/jquery/jquery.min.js"></script>
    <script src="../../public/vendor/bootstrapv3/js/bootstrap.min.js"></script>
    <script src="../../public/Home/NavFoo.js"></script>
    <script src="../../public/AlumniDetail/AlumniDetail.js"></script>
</body>
</html>
<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
$noidung=$c_admin->edit();
$chitietnguoidung=$noidung['chitietnguoidung'];
$listtinh=$noidung['listtinh'];
print_r($listtinh);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lí người dùng</title>
	<link rel="stylesheet" href="../../public/admin/css/adduser.css">
	<link href="../../public/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../public/admin/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../public/admin/css/datepicker3.css" rel="stylesheet">
	<link href="../../public/admin/css/styles.css" rel="stylesheet">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle
						navigation
					</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Alumni Management</span> Admin</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="quanlinguoidung.php"><em class="fa fa-calendar">&nbsp;</em> Quản lí người dùng </a></li>

			<li><a href="quanlidanhmuc.php"><em class="fa fa-toggle-off">&nbsp;</em> Quản lí danh mục</a></li>
			 
			<li><a href="thongkebaocao.php"><em class="fa fa-bar-chart">&nbsp;</em> Thống kê &amp; Báo cáo</a></li>
			<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
		</ul>
	</div>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Quản lí người dùng</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-sm-12">
				<h1 class="page-header" style="font-family:Helvetica, Arial, sans-serif">Thông tin cá nhân</h1>
			</div>

		</div>
		<!--/.row-->
		
	<!--Form nhap thong tin 1 user-->
			<div class="panel-body">
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post">
					<fieldset>
						<!--Username input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="username">Tên đăng nhập</label>
							<div class="col-md-9">
								<input id="username" name="username" type="text" class="form-control" value="<?=$chitietnguoidung->username?>" required>
							</div>
						</div>
						<!-- Password input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="password">Mật khẩu </label>
							<div class="col-md-9">
								<input id="password" name="password" type="password" class="form-control" required value="<?=$chitietnguoidung->password?>">
							</div>
						</div>
						<!--rePassword input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="repassword">Nhập lại mật khẩu </label>
							<div class="col-md-9">
								<input id="repassword" name="repassword" type="password" class="form-control" required value="<?=$chitietnguoidung->password?>">
							</div>
						</div>
						<!-- role-->
						<div class="form-group">
						<label class="col-md-2 control-label">Quyền</label>
						<div class="col-md-9"><?php
						if ($chitietnguoidung->isuser){
						?>
						<input type="checkbox" name="user" id="role-user" onclick="isuser();" checked>User
						<?php
						}
						else{
						?>
						<input type="checkbox" name="user" id="role-user" onclick="isuser();">User
						<?php
						}
						?>
						<?php
						if ($chitietnguoidung->isadmin){
						?>
						<input type="checkbox" name="admin" id="role-admin" checked>Admin
						<?php
						}
						else{
						?>
						<input type="checkbox" name="admin" id="role-admin">Admin
						<?php
						}
						?>
						
						</div>
						</div>
						<?php
						if ($chitietnguoidung->isuser){
						?>
						<div id="user-info">
						<!-- Name input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Họ tên</label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" class="form-control" onblur="this.value=ChuanhoaTen(this.value);" required value="<?=$chitietnguoidung->hoten?>">
							</div>
						</div>
						<!-- dob input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="dob">Ngày sinh</label>
							<div class="col-md-9">
								<input id="dob" name="dob" type="date" class="form-control" required value="<?=$chitietnguoidung->ngaysinh?>">
							</div>
						</div>
						<!-- img input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="imgi">Ảnh</label>
							<div class="col-sm-9">
								<input id="imgi" name="imgi" type="file">
							</div>
						</div>
						<!--img output-->
						<div class="form-group">
							<label class="col-md-2 control-label">&nbsp;</label>
							<div class="col-sm-3">
								<img src="<?=$chitietnguoidung->anh?>" alt="">
							</div>
						</div>
						<!-- Email input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="email">E-mail</label>
							<div class="col-md-9">
								<input id="email" name="email" type="text" class="form-control" required value="<?=$chitietnguoidung->email?>">
							</div>
						</div>
						
						<!-- phonenum input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="sdt">Số điện thoại</label>
							<div class="col-md-9">
								<input id="sdt" name="sdt" type="text" class="form-control" value="<?=$chitietnguoidung->sdt?>">
							</div>
						</div>
						<!-- Address input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="address">Quê quán</label>
							<div class="col-md-2">
								<select id="tinh" class="form-control" style=" min-width: 100px;">
									<option disabled selected>Tỉnh</option>
				
								</select>
							</div>
							<div class="col-md-1 control-label"></div>
							<div class="col-md-2">
								<select class="form-control" style=" min-width: 100px;">
									
									<option disabled selected>Huyện</option>
									
								</select>

							</div>
						</div>
						<!-- Class input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="class">Lớp</label>
							<div class="col-md-2">
								<select id="class" class="form-control" style=" min-width: 100px;">
									<option disabled selected>Lớp</option>
									<option>K61-CD</option>
									<option>K62-CF</option>
									<option>K63-J</option>
									<option>Kxxx</option>
								</select>
								<button type="button" class="btn" onclick="addClass();">Thêm</button>
							</div>
							<div class="col-md-1"></div>
							<div class="col-md-2">
								<select class="form-control" style=" min-width: 100px;">
									<option disabled selected>Khoa</option>
									<option>Công nghệ thông tin</option>
									<option>Vật lí kĩ thuật</option>
									<option>Điện tử viến thông</option>
									<option>Công nghệ nano</option>
								</select>

							</div>
						</div>
						<!-- congviec input-->
						<div class="form-group">
							<label class="col-md-2 control-label">Công việc</label>
							<div class="col-md-9">
								<table class="table" id="job-table" style="min-width:100%">
									<thead>
										<tr>
											<th class="col-md-2">Vị trí</th>
											<th class="col-md-2">Cơ quan</th>
											<th class="col-md-2">Mức lương (USD)</th>
											<th class="col-md-2">Thời gian</th>
										
											<th>
												<!--button them 1 user-->
												<button id="newjob" type="button" class="material-icons btn" style="padding:0px; color: black; background-color: white">add</button>
											</th>
	
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input class="vitri" type="text" ></td>
											<td><input class="coquan" type="text" ></td>
											
											<td>
												<input class="mucluong" type="text" class="job-profile">
												
											</td>
											<td><input class="thoigianbatdau" type="text"></td>
					
											<td>
												<button type="button" class="btn material-icons deleterow" style="padding:0px; background-color: white" onclick="deleteRowNow(event)">
													delete
												</button>
											</td>
										</tr>
									</tbody>
								</table>
								
						

							</div>

						</div>

						<!-- Message body -->
						<div class="form-group">
							<label class="col-md-2 control-label" for="message">Ghi chú</label>
							<div class="col-md-9">
								<textarea class="form-control" id="message" name="message" placeholder="..." rows="5"></textarea>
							</div>
							</div>
						</div>
						</div>
						<?php
						}
						else{
						?>
						<div id="user-info" style="display:none">
						<!-- Name input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Họ tên</label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" class="form-control" onblur="this.value=ChuanhoaTen(this.value);" required>
							</div>
						</div>
						<!-- dob input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="dob">Ngày sinh</label>
							<div class="col-md-9">
								<input id="dob" name="dob" type="date" class="form-control" required>
							</div>
						</div>
						<!-- img input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="imgi">Ảnh</label>
							<div class="col-sm-9">
								<input id="imgi" name="imgi" type="file">
							</div>
						</div>
						<!--img output-->
						<div class="form-group">
							<label class="col-md-2 control-label">&nbsp;</label>
							<div class="col-sm-3">
								<input id="imgo" name="imgo" type="image" src="../../public/admin/img/400x300.png" class="form-control" style=" min-height: 200px">
							</div>
						</div>
						<!-- Email input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="email">E-mail</label>
							<div class="col-md-9">
								<input id="email" name="email" type="text" class="form-control" required>
							</div>
						</div>
						
						<!-- phonenum input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="sdt">Số điện thoại</label>
							<div class="col-md-9">
								<input id="sdt" name="sdt" type="text" class="form-control">
							</div>
						</div>
						<!-- Address input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="address">Quê quán</label>
							<div class="col-md-2">
								<select id="tinh" class="form-control" style=" min-width: 100px;">
									<option disabled selected>Tỉnh</option>
									<option>Nam Định</option>
									<option>Hà Nam</option>
									<option>...</option>
								</select>
							</div>
							<div class="col-md-1 control-label"></div>
							<div class="col-md-2">
								<select class="form-control" style=" min-width: 100px;">
									<option disabled selected>Huyện</option>
									<option>Giao Thủy</option>
									<option>Xuân Trường</option>
									<option>...</option>
								</select>

							</div>
						</div>
						<!-- Class input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="class">Lớp</label>
							<div class="col-md-2">
								<select id="class" class="form-control" style=" min-width: 100px;">
									<option disabled selected>Lớp</option>
									<option>K61-CD</option>
									<option>K62-CF</option>
									<option>K63-J</option>
									<option>Kxxx</option>
								</select>
								<button type="button" class="btn" onclick="addClass();">Thêm</button>
							</div>
							<div class="col-md-1"></div>
							<div class="col-md-2">
								<select class="form-control" style=" min-width: 100px;">
									<option disabled selected>Khoa</option>
									<option>Công nghệ thông tin</option>
									<option>Vật lí kĩ thuật</option>
									<option>Điện tử viến thông</option>
									<option>Công nghệ nano</option>
								</select>

							</div>
						</div>
						<!-- congviec input-->
						<div class="form-group">
							<label class="col-md-2 control-label">Công việc</label>
							<div class="col-md-9">
								<table class="table" id="job-table" class="form-control">
									<thead>
										<tr>
											<th>Vị trí</th>
											<th>Cơ quan</th>
											<th>Mức lương (USD)</th>
											<th>Thời gian </th>
											<th class="col-sm-1">
												<!--button them 1 user-->
												<button id="newjob" type="button" class="material-icons btn" style="padding:0px; color: black; background-color: white">add</button>
											</th>
	
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input class="vitri" type="text" ></td>
											<td><input class="coquan" type="text" ></td>
											<td><input class="thoigian" type="number"></td>
											<td>
												<input class="mucluong" type="text" class="job-profile">
												
											</td>
											<td class="col-md-2">
												<button type="button" class="btn material-icons deleterow" style="padding:0px; background-color: white" onclick="deleteRowNow(event)">
													delete
												</button>
											</td>
										</tr>
									</tbody>
								</table>
								
						

							</div>

						</div>

						<!-- Message body -->
						<div class="form-group">
							<label class="col-md-2 control-label" for="message">Ghi chú</label>
							<div class="col-md-9">
								<textarea class="form-control" id="message" name="message" placeholder="..." rows="5"></textarea>
							</div>
							</div>
						</div>
						</div>
						<?php
						}
						?>
						<!-- Form actions -->
						<div class="form-group">
							<div class="col-md-12 widget-right">
								<button type="button" id="add-user-submit" class="btn btn-default btn-md pull-right" onclick="chapnhan();">Gửi</button>
							
						</div>
					</fieldset>
				</form>
			</div>
			</div>

	
    </div>
    <div class="row" id="class-container">
		<div id="add-class-form" class="panel panel-default">
			<div class="panel panel-default" id="addclass">
				<div class="panel-heading" style="font-family:Helvetica, Arial, sans-serif; padding: auto; text-align: center" >Thêm lớp học</div>
				<div class="panel-body">
					<div class="row" style="margin-left:10px; margin-right:10px"><input type="text" id="add-class"  class="form-control"></div>
					<div class="row" style="padding:10px"><button type="button" onclick="addmoreClass();" class="btn" style="margin-left:90px">Thêm</button></div>
				</div>
			</div>
		</div>
    </div>
	<!--/.main-->


	<script src="../../public/admin/js/jquery-1.11.1.min.js"></script>
	<script src="../../public/admin/js/bootstrap.min.js"></script>
	<script src="../../public/admin/js/chart.min.js"></script>
	<script src="../../public/admin/js/chart-data.js"></script>
	<script src="../../public/admin/js/easypiechart.js"></script>
	<script src="../../public/admin/js/easypiechart-data.js"></script>
	<script src="../../public/admin/js/bootstrap-datepicker.js"></script>
	<script src="../../public/admin/js/custom.js"></script>
	<script src="../../public/admin/js/user.js"></script>
	<script>
	</script>
</body>

</html>
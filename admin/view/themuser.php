<?php
include('../controller/c_admin.php');

$c_admin=new c_admin();
$noidung=$c_admin->edit();
//$chitietnguoidung=$noidung['chitietnguoidung'];
$listtinh=$noidung['listtinh'];
$listkhoa=$noidung['listkhoa'];
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
                <div class="profile-usertitle-name"><?php echo $_SESSION['username']?></div>
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
            <li><a href="https://localhost/AlumniManagement/"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
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
				<h1 class="page-header" style="font-family:Helvetica, Arial, sans-serif">Thêm người dùng</h1>
			</div>

		</div>
		<!--/.row-->
		
	<!--Form nhap thong tin 1 user-->
			<div class="panel-body">
				<form enctype="multipart/form-data" class="form-horizontal" action="xulithemnguoidung.php" method="post" onsubmit="return chapnhan();">
					<fieldset>
						<!--Username input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="username">Tên đăng nhập</label>
							<div class="col-md-9">
								<input id="username" name="username" type="text" class="form-control" autofocus required>
							</div>
							<?php
							if(isset($_SESSION['errorusername'])){
								echo "<div class='col-md-9 errmess' style='float:right'>".$_SESSION['errorusername']."</div>";
								unset($_SESSION['errorusername']);
							}
							?>
						</div>
						<!-- Password input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="password">Mật khẩu </label>
							<div class="col-md-9">
								<input id="password" name="password" type="password" class="form-control" required>
							</div>
						</div>
						<!--rePassword input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="repassword">Nhập lại mật khẩu </label>
							<div class="col-md-9">
								<input id="repassword" name="repassword" type="password" class="form-control" required>
							</div>
							<div class="col-md-9 errmess" id="errrepass" style="float:right"></div>
						</div>
						<!-- role-->
						<div class="form-group">
						<label class="col-md-3 control-label">Quyền</label>
						<div class="col-md-9">
						<input type="checkbox" name="user" id="role-user" onclick="isuser();" checked>User
						<input type="checkbox" name="admin" id="role-admin">Admin
						
						</div>
						<div class="col-md-9 errmess" id="errrole"></div>
						</div>
						<div id="user-info">
						<!-- Name input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">Họ tên</label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" class="form-control" onblur="this.value=ChuanhoaTen(this.value);" required>
							</div>
						</div>
						<!-- dob input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="dob">Ngày sinh</label>
							<div class="col-md-9">
								<input id="dob" name="dob" type="date" class="form-control" required>
							</div>
						</div>
						<!-- msv-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="msv">Mã sinh viên</label>
							<div class="col-sm-9">
								<input id="msv" class="form-control" name="msv" type="text" required>
								
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
								<input id="imgi" name="imgi" type="file">
							</div>
							<?php
							if(isset($_SESSION['errorimg'])){
								echo "<div class='col-md-9 errmess' style='float:right'>".$_SESSION['errorimg']."</div>";
								unset($_SESSION['errorimg']);
							}
							?>
						</div>
						
						<!-- Email input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="email">E-mail</label>
							<div class="col-md-9">
								<input id="email" name="email" type="email" class="form-control" required>
							</div>
						</div>
						
						<!-- phonenum input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="sdt">Số điện thoại</label>
							<div class="col-md-9">
								<input id="sdt" name="sdt" type="text" class="form-control">
							</div>
						</div>
						<!-- Address input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="address">Quê quán</label>
							<div class="col-md-3">
								<select id="tinh" name="tinh" class="form-control" style=" min-width: 100px;" required>
									<option disabled selected>Tỉnh</option>
									<?php
									foreach($listtinh as $tinh){
									?>
									<option value="<?=$tinh->tinhid?>"><?=$tinh->tentinh?></option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="col-md-1 control-label"></div>
							<div class="col-md-3">
								<select id="huyen" name="huyen" class="form-control" style=" min-width: 100px;" required>
									<option disabled selected>Huyện</option>
								</select>

							</div>
						</div>
						<!-- Class input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="class">Lớp</label>
							<div class="col-md-3">
								<select id="khoa" class="form-control" style=" min-width: 100px;" required>
									<option disabled selected>Khoa</option>
									<?php
									foreach($listkhoa as $khoa){
									?>
									<option value="<?=$khoa->khoaID?>"><?=$khoa->tenkhoa?></option>
									<?php
									}
									?>
								</select>

							</div>
							<div class="col-md-1"></div>
							<div class="col-md-3">
								<select id="lop" name="lop" class="form-control" style=" min-width: 100px;" required>
									<option disabled selected>Lớp</option>
								</select>
								<button type="button" class="btn" onclick="addClass();">Thêm</button>
							</div>
							<div class="col-md-1"></div>
							
						</div>
						<!-- congviec input-->
						<div class="form-group">
							<label class="col-md-3 control-label">Công việc</label>
											<div class="col-md-1">
												<!--button them 1 user-->
												<button id="newjob" type="button" class="material-icons btn" style="padding:0px; color: black; background-color: white">add</button>
											</div>
									<div style="float:both"></div>
									<div id="job-profile">
										<div id="one-job">
											<div class="col-md-9"><input class="vitri form-control" name="vitri[]" type="text" placeholder="Vị trí" required></div>
											<label class="col-md-3 control-label"></label>
											<div class="col-md-9"><input class="coquan form-control" name="coquan[]" type="text" placeholder="Cơ quan" required></div>
											<label class="col-md-3 control-label"></label>
											<div class="col-md-9"><input class="thoigian form-control" name="thoigian[]" type="text" placeholder="Thời gian" required></div>
											<label class="col-md-3 control-label"></label>
											<div class="col-md-9"><input class="mucluong form-control" name="mucluong[]" type="number" class="job-profile" placeholder="Mức lương(USD)" required></div>
											<label class="col-md-3 control-label"></label>
											<div class="col-md-9">
												<button type="button" class="btn material-icons deleterow" style="padding:0px; background-color: white" onclick="deleteRowNow(event)">
													delete
												</button>
											</div>
										</div>
										
							</div>

					

						<!-- Message body -->
						
						</div>
						</div>
						<!-- Form actions -->
						<div class="form-group">
							<div class="col-md-12 widget-right">
								<button type="submit" id="add-user-submit" class="btn btn-default btn-md pull-right" >Gửi</button>
							
						</div>
					</fieldset>
				</form>
			</div>

	
    </div>
    <div class="row" id="class-container">
		<div id="add-class-form" class="panel panel-default">
			<div class="panel panel-default" id="addclass">
				<div class="panel-heading" style="font-family:Helvetica, Arial, sans-serif; padding: auto; text-align: center" >Thêm lớp học</div>
				<div class="panel-body">
				<form action="themlop.php" method="get">
					<div class="row" style="margin-left:10px; margin-right:10px"><input name="addclass" type="text" id="add-class"  class="form-control"></div>
					<div class="row" style="margin-left:10px; margin-right:10px">
					<select id="themkhoa" name="khoa" class="form-control" style=" min-width: 100px;" required>
									<option disabled selected>Khoa</option>
									<?php
									foreach($listkhoa as $khoa){
									?>
									<option value="<?=$khoa->khoaID?>"><?=$khoa->tenkhoa?></option>
									<?php
									}
									?>
								</select>
								</div>
					<div class="row ">
					<div class="center-button">
					<button type="submit" id="add-more-class" onclick="addmoreClass();" class="btn" style="margin-left:40%">Thêm</button>
					</div>
					</div>
					</form>
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
	$(document).ready(function(){
		$("#tinh").change(function(event){
			tinhid=$("#tinh").val();
			$.post('huyen.php',{"tinhid":tinhid},function(data){
				$("#huyen").html(data);
			});
		});
		$("#khoa").change(function(event){
			khoaid=$("#khoa").val();
			$.post('lop.php',{"khoaid":khoaid},function(data){
				$("#lop").html(data);
			});
		});
	});
	
	/*function register() {
                $.ajax({
                    url: "check.php",
                    type: "post",
                    data: {
                        username: $('#username').val(),
                    },
                    success: function(response) {
						var result = JSON.parse(response);
						if(result["existedun"] === false || result["existedun"] === false){
							return true;
						}
                        if(result["existedun"] === true) {
                            $('#err-username').html("Tài khoản đã tồn tại!");
						}
						if(result["existedmsv"] === true) {
							$('#err-msv').html("Tài khoản đã tồn tại!");
						
					}
					return false;
				});
			}
		}*/
				function chapnhan(){
    okie=true;
    document.getElementById("errrepass").innerHTML='';
    document.getElementById("errrole").innerHTML='';
    if(document.getElementById("password").value != document.getElementById("repassword").value){
        document.getElementById("errrepass").innerHTML="Mật khẩu không đúng định dạng!";
        okie=false;
    }
    if(!document.getElementById("role-user").checked && !document.getElementById("role-admin").checked){
        document.getElementById("errrole").innerHTML="Vui lòng chọn quyền cho người dùng!";
        okie=false;
	}
	if(register() == false){
		okie=false;
	}
    return okie;
} 
	</script>
</body>
</html>
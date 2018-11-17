<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
//$noidung=$c_admin->quanlinguoidung();
//$listthongbao=$noidung['listthongbao'];
//$listkhaosat=$noidung['listkhaosat'];
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
				<h1 class="page-header" style="font-family:Helvetica, Arial, sans-serif">Quản lí người dùng</h1>
			</div>

		</div>
		<!--/.row-->
		<!--table-->
		<div class="table">
			<table class="table">
				<thead>
					<tr>
						<th class="col-sm-2">Username</th>
						<th class="col-sm-2">Họ tên</th>
						<th class="col-sm-2">Lớp</th>
						<th class="col-sm-2">Khoa</th>
						<th class="col-sm-2">Ghi chú</th>
						<th class="col-sm-1">&nbsp;</th>
						<th class="col-sm-1">
							<!--button them 1 user-->
							<button id="add-user" onclick="addClick();" class="material-icons btn" style="padding:0px; color: black; background-color: white"><a href="themuser.php">add</a></button>
						</th>
					</tr>
				</thead>
				<tbody>
				<?php/*
				foreach($danhsachuser as $user){
					list($username, $hoten, $lop, $khoa)=explode(':',$user)
				*/?>
					<tr>
						<td class="col-sm-2"><?//=$username?></td>
						<td class="col-sm-2"><?//=$hoten?></td>
						<td class="col-sm-2"><?//=$lop?></td>
						<td class="col-sm-2"><?//$khoa?></td>
						<td class="col-sm-2">&nbsp;</td>
						<td class="col-sm-1"><button id="edit-user" class="material-icons btn" style="padding:0px; color: black; background-color: white"><a href="edit.php" style="color:black">edit</a></button></td>
						<td class="col-sm-1"><button id="delete-user" class="material-icons btn" style="padding:0px; color: black; background-color: white" onclick="deleteRowNow();" >delete</button></td>
					</tr>
					<?php
				//}
					?>
				</tbody>
			</table>
		</div>
	</div><!-- /.row -->
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
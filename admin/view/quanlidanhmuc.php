<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lí danh mục</title>
	<link href="../../public/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../public/admin/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../public/admin/css/datepicker3.css" rel="stylesheet">
	<link href="../../public/admin/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="../../public/admin/css/quanlidanhmuc.css">
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
						navigation</span>
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
			<li><a href="quanlinguoidung.php"><em class="fa fa-calendar">&nbsp;</em>Quản lí người dùng </a></li>

			<li class="active"><a href="quanlidanhmuc.php"><em class="fa fa-toggle-off">&nbsp;</em> Quản lí danh mục</a></li>
			 
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
				<li class="active">Quản lí danh mục</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-family:Helvetica, Arial, sans-serif">Quản lí danh mục</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab">Thông báo</a></li>
						<li><a href="#tab2" data-toggle="tab">Khảo sát</a></li>
						
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active" id="tab1">
							<div class="panel panel-default ">
								<div class="panel-heading">
									<p>Thông báo</p>
									<a href="taothongbao.php" style="float:right">Thêm thông báo</a>

									
								</div>
								<div class="panel-body timeline-container">
									
									<ul class="timeline">
										<li>

											<div class="timeline-panel">
												<div class="timeline-heading">
													<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
												</div>
												<div class="timeline-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare
														risus finibus feugiat.</p>
													<div style="float:both"></div>
													<a href="chitietthongbao.php" class="nav-link hienthichitiet">Chi tiết...</a>
												</div>
											</div>
										</li>
										<li>

											<div class="timeline-panel">
												<div class="timeline-heading">
													<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
												</div>
												<div class="timeline-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
												</div>
											</div>
										</li>
										<li>

											<div class="timeline-panel">
												<div class="timeline-heading">
													<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
												</div>
												<div class="timeline-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare
														risus finibus feugiat.</p>
												</div>
											</div>
										</li>
										<li>

											<div class="timeline-panel">
												<div class="timeline-heading">
													<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
												</div>
												<div class="timeline-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tab2">
							<div class="panel panel-default ">
								<div class="panel-heading">
									<p>Khảo sát<p>
									<a href="taocuockhaosat.php" style="float:right">Thêm cuộc khảo sát</a>
								</div>
								<div class="panel-body timeline-container">
									<ul class="timeline">
										<li>

											<div class="timeline-panel">
												<div class="timeline-heading">
													<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
												</div>
												<div class="timeline-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare
														risus finibus feugiat.</p>
													<div style="float:both"></div>
													<a href="chitietkhaosat.php" class="nav-link">Chi tiết...</a>
												</div>
											</div>
										</li>
										<li>

											<div class="timeline-panel">
												<div class="timeline-heading">
													<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
												</div>
												<div class="timeline-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
												</div>
											</div>
										</li>
										<li>

											<div class="timeline-panel">
												<div class="timeline-heading">
													<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
												</div>
												<div class="timeline-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare
														risus finibus feugiat.</p>
												</div>
											</div>
										</li>
										<li>

											<div class="timeline-panel">
												<div class="timeline-heading">
													<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
												</div>
												<div class="timeline-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.panel-->
		</div>
		<!--row-->
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
	<script src="../../public/admin/js/chitiet.js"></script>

</body>

</html>
<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
$noidung=$c_admin->getchitietkhaosat();
$listcauhoi=$noidung['listcauhoi'];
$kqco=$noidung['kqco'];
$kqkhong=$noidung['kqkhong'];
$kqkhonghan=$noidung['kqkhonghan'];
$tenbang=$noidung['tenbang'];
print_r($tenbang[0]);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chi tiết khảo sát</title>
	<link href="../../public/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../public/admin/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../public/admin/css/datepicker3.css" rel="stylesheet">
	<link href="../../public/admin/css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="../../public/admin/jshtml5shiv.js"></script>
	<script src="../../public/admin/jsrespond.min.js"></script>
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
				<li><a href="quanlinguoidung.php"><em class="fa fa-calendar">&nbsp;</em>Quản lí người dùng </a></li>

				<li class="active"><a href="quanlidanhmuc.php"><em class="fa fa-toggle-off">&nbsp;</em> Quản lí danh mục</a></li>
				 
				<li><a href="thongkebaocao.php"><em class="fa fa-bar-chart">&nbsp;</em> Thống kê &amp; Báo cáo</a></li>
                <li><a href="https://localhost/AlumniManagement/"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
			</ul>
		</div>
		<!--/.sidebar-->
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="panel panel-default" style="min-height:600px">
				<div class="panel-heading"><?=$tenbang[0]->tenbang?></div>
				<div class="panel-body">
					<div class="cauhoi">
					<?php
					foreach($listcauhoi as $cauhoi){
		
					?>
					<div class="col-md-6"><?=$cauhoi->noidung?></div>
					<div class="col-md-2">Có:<span>  <?php $countco=0; foreach($kqco as $co){
						if($co->khaosatID==$cauhoi->khaosatID){
						$countco=$co->co;}
						
					}
					$countkhonghan=0; foreach($kqkhonghan as $khonghan){
						if($khonghan->khaosatID==$cauhoi->khaosatID){
						$countkhonghan=$khonghan->khonghan;}
						
					}
					$countkhong=0; foreach($kqkhong as $khong){
						if($khong->khaosatID==$cauhoi->khaosatID){
						$countkhong=$khong->khong;}
					
					}
					$total=$countco+$countkhong+$countkhonghan; 
					if($total != 0){
					echo round(($countco/$total)*100,2)."%";
				}
					else
					echo '0%';
					?></span></div>
					<div class="col-md-2">Không hẳn:<span><?php $countco=0; foreach($kqco as $co){
						if($co->khaosatID==$cauhoi->khaosatID){
						$countco=$co->co;}
						
					}
					$countkhonghan=0; foreach($kqkhonghan as $khonghan){
						if($khonghan->khaosatID==$cauhoi->khaosatID){
						$countkhonghan=$khonghan->khonghan;}
						
					}
					$countkhong=0; foreach($kqkhong as $khong){
						if($khong->khaosatID==$cauhoi->khaosatID){
						$countkhong=$khong->khong;}
					
					}
					$total=$countco+$countkhong+$countkhonghan; 
					if($total != 0){
					echo round(($countkhonghan/$total)*100,2)."%";}
					else
					echo '0%';
					?></span></div>
					<div class="col-md-2">Không:<span><?php 
					$countco=0; foreach($kqco as $co){
						if($co->khaosatID==$cauhoi->khaosatID){
						$countco=$co->co;}
						
					}
					$countkhonghan=0; foreach($kqkhonghan as $khonghan){
						if($khonghan->khaosatID==$cauhoi->khaosatID){
						$countkhonghan=$khonghan->khonghan;}
						
					}
					$countkhong=0; foreach($kqkhong as $khong){
						if($khong->khaosatID==$cauhoi->khaosatID){
						$countkhong=$khong->khong;}
					
					}
					$total=$countco+$countkhong+$countkhonghan; 
					if($total != 0){
					echo round(($countkhong/$total)*100,2)."%";}
					else
					echo '0%';
					?></span></div>
					<?php
					}
					?>
					</div>

					
				</div>
			</div>
		</div>
		<script src="../../public/admin/jsjquery-1.11.1.min.js"></script>
		<script src="../../public/admin/jsbootstrap.min.js"></script>
		<script src="../../public/admin/jschart.min.js"></script>
		<script src="../../public/admin/jschart-data.js"></script>
		<script src="../../public/admin/jseasypiechart.js"></script>
		<script src="../../public/admin/jseasypiechart-data.js"></script>
		<script src="../../public/admin/jsbootstrap-datepicker.js"></script>
		<script src="../../public/admin/jscustom.js"></script>
	</body>

</html>
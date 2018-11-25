<?php
include('../controller/c_admin.php');
$c_admin=new c_admin();
$noidung=$c_admin->thongke();
$duoi1000=$noidung['duoi1000'];
$duoi5000=$noidung['duoi5000'];
$tren5000=$noidung['tren5000'];
$homnay=$noidung['homnay'];
$homqua=$noidung['homqua'];
$bangaytruoc=$noidung['bangaytruoc'];
$bonngaytruoc=$noidung['bonngaytruoc'];
$namngaytruoc=$noidung['namngaytruoc'];
$saungaytruoc=$noidung['saungaytruoc'];
$bayngaytruoc=$noidung['bayngaytruoc'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thống kê & Báo cáo</title>
	<link href="../../public/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../public/admin/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../public/admin/css/datepicker3.css" rel="stylesheet">
	<link href="../../public/admin/css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
	ul.pie-legend {
            text-align: center;
            margin-top: 2rem;
        }
        ul.pie-legend li {
           display:inline-block;
		   margin-right: 10px; 
		   padding: 10px;
        }
        ul.pie-legend li span {
            padding: 2px 10px;
            color: #fff;
        }</style>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
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
				<input type="text" class="form-control" placeholder="Tìm kiếm">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="quanlinguoidung.php"><em class="fa fa-calendar">&nbsp;</em> Quản lí người dùng </a></li>
			
			<li><a href="quanlidanhmuc.php"><em class="fa fa-toggle-off">&nbsp;</em> Quản lí danh mục</a></li>
			 
            <li class="active"><a href="thongkebaocao.php"><em class="fa fa-bar-chart">&nbsp;</em> Thống kê &amp; Báo cáo</a></li>
            <li><a href="https://localhost/AlumniManagement/"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Thống kê & Báo cáo</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-family:Helvetica, Arial, sans-serif">Thống kê & Báo cáo</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Bar Chart
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->		
		
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading" style="font-family:Helvetica, Arial, sans-serif">
						Thống kê các mức lương
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="chart" id="pie-chart" ></canvas>
							<div id="legendDiv"></div>
						</div>
					</div>
				</div>
			</div>
			
		</div><!--/.row-->
		
		
	</div>	<!--/.main-->
	  

	<script src="../../public/admin/js/jquery-1.11.1.min.js"></script>
	<script src="../../public/admin/js/bootstrap.min.js"></script>
	<script src="../../public/admin/js/chart.min.js"></script>
	<script src="../../public/admin/js/chart-data.js"></script>
	<script src="../../public/admin/js/easypiechart.js"></script>
	<script src="../../public/admin/js/easypiechart-data.js"></script>
	<script src="../../public/admin/js/bootstrap-datepicker.js"></script>
	<script src="../../public/admin/js/custom.js"></script>
	<script>
		function addDays(dateObj,numDays){
			dateObj.setDate(dateObj.getDate()+numDays);
			return dateObj;
		}
		var d=new Date();
		var truoc1=addDays(d,-1);
		var truoc2=addDays(d,2);
		var truoc3=addDays(d,3);
		var truoc4=addDays(d,4);
		var truoc5=addDays(d,5);
		var truoc6=addDays(d,6);

	var pieData=[{
		value:<?php echo $duoi1000[0]->duoi1000 ?>,
		color:"#f9243f",
		label:"Dưới 1000$",
	},
	{
		value:<?php echo $duoi5000[0]->duoi5000 ?>,
		color:"#ffb53e",
		label:"1000$ - 5000$",
	},
	{
		value:<?php echo $tren5000[0]->tren5000 ?>,
		color:"cyan",
		label:"Trên 5000$",
	},];
	var barChartData={
		labels:["7 ngày trước","6 ngày trước","5 ngày trước","4 ngày trước","3 ngày trước","Hôm qua","Hôm nay"],
		datasets:[
			{
				fillColor : "#48A497",
				strokeColor : "#48A4D1",
				data : [<?php echo $bayngaytruoc[0]->bayngaytruoc ?>,<?php echo $saungaytruoc[0]->saungaytruoc ?>,<?php echo $namngaytruoc[0]->namngaytruoc ?>,<?php echo $bonngaytruoc[0]->bonngaytruoc ?>,<?php echo $bangaytruoc[0]->bangaytruoc ?>,<?php echo $homqua[0]->homqua ?>,<?php echo $homnay[0]->homnay ?>]
			}
		]
	}
	window.onload = function () {
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
	var chart3 = document.getElementById("doughnut-chart").getContext("2d");
	window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
	responsive: true,
	legend: {
      display: true,
      position: 'right'
    },
	segmentShowStroke: false
	});
	var chart4 = document.getElementById("pie-chart").getContext("2d");
	window.myPie = new Chart(chart4).Pie(pieData, {
	responsive: true,
	segmentShowStroke: false
	},);
	document.getElementById("legendDiv").innerHTML = window.myPie.generateLegend();
};
	</script>	
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02/12/2018
 * Time: 3:54 CH
 */

require_once ('../../model/mySession.php');
mySession::checkLogin();

require_once('../controller/SearchToolController.php');
$manager = new SearchToolController();
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
<link rel="stylesheet" href="../../public/SearchTool/SearchTool.css">
<link rel="stylesheet" href="../../public/Home/NavFoo.css">
<title>Alumni_SearchTool</title>

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
                <li><a class="" href="ListAlumni.php">Các lớp</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="SearchTool.php"><i class="fa fa-search "></i></a> 
                </li>
                <li  class="active">
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

<div class="gradient">
    <div class="container ">
        <div class="title text-left">
            <h2> </h2>
            <hr>
        </div>
    </div>
</div>

<div class="SearchTool">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group" id="adv-search">
                    <div class="input-group-btn">
                        <div class="btn-group " role="group">
                            <div class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
                            <div class="dropdown dropdown-lg col-lg-12">
                                <button type="button-Search" class="btn btn-default dropdown-toggle col-lg-12" data-toggle="dropdown" >>>> <b>Tìm Đồng Đội</b> <<<</button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <form class="form-horizontal" method="GET">
                                        <div class="form-group">
                                            <label for="hoten">Họ và Tên</label>
                                            <input class="form-control" type="text" name="hoten" 
                                                    value="<?php if (isset($_GET["hoten"])){echo $_GET["hoten"];} ?>" />
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="lop">Lớp</label>
                                            <input class="form-control" type="text" name="lop" 
                                                    value="<?php if (isset($_GET["lop"])){echo $_GET["lop"];} ?>"/>
                                        </div>
                                        <hr>
                                        <label>Mức lương</label>
                                        <div class="form-group">
                                            <label for="minLuong">Từ:</label>
                                            <input class="form-control" type="text" name="minLuong"
                                                    value="<?php if (isset($_GET["minLuong"])){echo $_GET["minLuong"];} ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="maxLuong">đến:</label>
                                            <input class="form-control" type="text" name="maxLuong"
                                                    value="<?php if (isset($_GET["maxLuong"])){echo $_GET["maxLuong"];} ?>"/>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="congviec">Công việc đảm nhiệm</label>
                                            <input class="form-control" type="text" name="congviec" 
                                                    value="<?php if (isset($_GET["congviec"])){echo $_GET["congviec"];} ?>"/>
                                        </div>
                                        <hr>

                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </form>
                                </div>
                            </div>
                            <div class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container result">
        <table class="listAlumni table table-hover table-bordered">
			<?php
			$manager->runSearchTool();
			?>
        </table>
    </div>

</div>
<!--end SearchTool-->

<div class= "footer">
    <div class="container">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <h3>
                Copyright &copy; Team
            </h3>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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

</body>
</html>

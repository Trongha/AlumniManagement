<?php
    require_once ('../../model/mySession.php');
    mySession::checkLogin();

    require_once ("../controller/KhaoSatController.php");
    $manager = new KhaoSatController();
    $manager->getKetQua();

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
    <link rel="stylesheet" href="../../public/KhaoSat/KhaoSat.css">
    <link rel="stylesheet" href="../../public/Home/NavFoo.css">
	<title>Alumni_KhaoSat</title>

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
                    <li class="active"><a class="" href="#Bảng tin">Tin mới</a></li>
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
                    
                </ul>
            </div>
            <!-- end navbar-collapse -->
        </div>

    </nav>  
        <!-- end Nav -->

    <div class="myHeader"></div>

    <div class="BaiKhaoSat">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <?php
                        $manager->setTenBangKhaoSat();
                    ?>

                    <hr>
                </div>
            </div>

            <form action="KhaoSat.php" method="POST">
                <?php
                    $manager->showInForm();
                ?>
                <div class="row text-center">
                    <button class="btn btn-success" name="submit-btn">
                        ---------------Xong!---------------
                    </button>
                </div>
                
            </form>
        </div>
            <!-- end container -->
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
</body>
</html>
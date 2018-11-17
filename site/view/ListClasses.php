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
    <link rel="stylesheet" href="../../public/ListClasses/ListClasses.css">
    <link rel="stylesheet" href="../../public/Home/Nav.css">
	<title>Alumni</title>
    <?php 
        require_once('../controller/ListClassesController.php');
     ?>
    
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="logo navbar-brand page-scroll" href="Home.php">
                    <img src="../../public/Home/img/uetLogo.png" alt="">_Uet_Alumni
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="Home.php">Trang chủ</a>
                    </li>
                    <li>
                        <a class="" href="#download">Bài đăng</a>
                    </li>
                    <li>
                        <a class="" href="#contact">Khảo sát</a>
                    </li>
                    <li class="active" >
                        <a class="" href="ListClasses.php">Các lớp</a>
                    </li>
                    <li>
                        <a class="" href="#">Đăng nhập</a>
                    </li>
                    
                </ul>
            </div>
            <!-- end navbar-collapse -->
        </div>
        <!-- end container -->

    </nav>  
        <!-- end Nav -->
    <div class="myHeader"></div>
    <div class="gradient">
        <div class="container ">
            <div class="title text-left">
                <h2>Cựu sinh viên các lớp</h2>
                <hr>
            </div>
        </div>
    </div>
    
	<div class="timeline">
        <?php
            $listClassController = new ListClassesController();
            $listClassController->setListClasses();
         ?>
    </div>
        <!--end tiemline-->
	

	<script src="../../public/vendor/jquery/jquery.min.js"></script>
    <script src="../../public/vendor/bootstrapv3/js/bootstrap.min.js"></script>
    <script src="../../public/Home/Nav.js"></script>

</body>
</html>
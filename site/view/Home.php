<?php
    require_once ('../../model/mySession.php');
    mySession::checkLogin();
    require_once ('../controller/HomeController.php');
    $homeController = new HomeController();
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
    <link rel="stylesheet" href="../../public/Home/Home.css">
    <link rel="stylesheet" href="../../public/Home/NavFoo.css">
	<title>Alumni</title>

</head>
<body>
    
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
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

                    <li class="active" >
                        <a href="Home.php">Trang chủ</a>
                    </li>
                    <li>
                        <a class="" href="#khaosat">Khảo sát</a>
                    </li>
                    <li>
                        <a class="" href="ListClasses.php"> Các lớp</a>
                    </li>
                    <li  class="active" >
                        <?php
                            $homeController->setUsernameNav();
                        ?>
                    </li>
                    <li >
                        <a href=""><i class="fa fa-search "></i></a> 
                    </li>
                    
                </ul>
            </div>
            <!-- end navbar-collapse -->
        </div>
        <!-- end container -->

    </nav>  
        <!-- end Nav -->

    <div class="myHeader"></div>

    <div class="newsFeed">
        <div class="container">
            <div class="slide col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <div id="carousel-id" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item">
                            <img src="../../public/Home/img/slide/1.jpg">                        
                        </div>
                        <div class="item">
                            <img src="../../public/Home/img/slide/2.jpg">
                        </div>
                        <div class="item active">
                            <img src="../../public/Home/img/slide/3.jpg" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
                <!-- end Slide -->
            <div class=" news col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="news">
                    <div class="">
                         <h3><i class="far fa-newspaper"></i>    Tin mới</h3>
                        <hr>
                    </div>
                    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 pull-right">
                        <?php
                            $homeController->setListNews();
                        ?>

                    </div>
                </div>
                    <!-- end news -->
            </div>
                
        </div>
    </div>
         <!-- end NewsFeed -->
    <div class="newClassSession">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
                <div class="newClasses">
                    <div class="row">
                        <div class="text-center">
                            <h2>Lớp mới thêm</h2>
                            <hr>
                        </div>
                    </div> 
                        <!-- end Row -->

                    <div class="row">
                        <?php 
                            $homeController->setListNewClass();
                        ?>                    
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="thumbnail aClass">
                                <img src="../../public/Home/img/portfolio/cake.jpg" alt="a class">
                                <div class="caption text-center">
                                    <h3>Try My Best</h3>
                                </div>
                                <a href="ListClasses.php">
                                    <div class="chiTiet text-center">
                                        <i class="fas fa-file-alt"></i>
                                        <h2>Tất cả các lớp</h2>
                                    </div>
                                </a>
                            </div>
                        </div>  <!-- end 1 class -->
                    </div>

                </div>
            </div>  
                <!-- end col8 -->
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
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
    <link rel="stylesheet" href="../../public/Home/Nav.css">
	<title>Alumni</title>

    <?php 
        require_once ('../controller/HomeController.php');
        $homeController = new HomeController();
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

                    <li class="active" >
                        <a href="Home.php">Trang chủ</a>
                    </li>
                    <li>
                        <a class="" href="#download">Bài đăng</a>
                    </li>
                    <li>
                        <a class="" href="#contact">Khảo sát</a>
                    </li>
                    <li>
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
    <hr>
    <div class="container">
        <div class="newsFeed">
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
                <div class="panel-title">
                    Tin mới
                    <hr>
                </div>
            </div>
                <!-- end news -->
        </div>
            <!-- end NewsFeed -->
    </div>
    
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
            <div class="newClasses">
                <div class="row">
                    <div class="text-center">
                        <h3>Lớp mới thêm</h3>
                        <div class="lineStar">
                            <span class="glyphicon glyphicon-star"></span>
                        </div>  
                            <!-- end lineStar -->
                    </div>
                </div> 
                    <!-- end Row -->

                <div class="row">
                    <?php 
                        $homeController->setListNewClass();
                    ?>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="endNewClasses">
                            <div class="caption text-center">
                                <h3><a href="ListClasses.php" class="btn">Xem Thêm ...</a></h3>
                            </div>
                        </div>
                    </div>  <!-- end 1 class -->
                </div>
            </div>
        </div>  <!-- end col8 -->

    </div>

	<script src="../../public/vendor/jquery/jquery.min.js"></script>
    <script src="../../public/vendor/bootstrapv3/js/bootstrap.min.js"></script>
    <script src="../../public/Home/Nav.js"></script>
</body>
</html>
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
                        <a class="" href="#khaosat">Khảo sát</a>
                    </li>
                    <li>
                        <a class="" href="ListClasses.php">Các lớp</a>
                    </li>
                    <li  class="active" >
                        <<!-- ?php
                            $homeController->setUsernameNav();
                        ?> -->
                    </li>
                    
                </ul>
            </div>
            <!-- end navbar-collapse -->
        </div>
        <!-- end container -->

    </nav>  
        <!-- end Nav -->
            <div class="myHeader"></div>

    <div class="container">
            <form action="#" method="post">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <label for="Color1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, modi corrupti quos possimus ducimus praesentium est, voluptas nam aliquid laborum voluptate adipisci necessitatibus nemo explicabo, quia quis quas harum esse?</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select name="Color1">
                            <option value="ok">ok</option>
                            <option value="okok">okok</option>
                            <option value="okokok">okokok</option>
                        </select>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <label for="Color2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, modi corrupti quos possimus ducimus praesentium est, voluptas nam aliquid laborum voluptate adipisci necessitatibus nemo explicabo, quia quis quas harum esse?</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select name="Color2">
                            <option value="ok">ok</option>
                            <option value="okok">okok</option>
                            <option value="okokok">okokok</option>
                        </select>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <label for="Color3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, modi corrupti quos possimus ducimus praesentium est, voluptas nam aliquid laborum voluptate adipisci necessitatibus nemo explicabo, quia quis quas harum esse?</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select name="Color3">
                            <option value="ok">ok</option>
                            <option value="okok">okok</option>
                            <option value="okokok">okokok</option>
                        </select>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <label for="Color4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, modi corrupti quos possimus ducimus praesentium est, voluptas nam aliquid laborum voluptate adipisci necessitatibus nemo explicabo, quia quis quas harum esse?</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select name="Color4">
                            <option value="ok">ok</option>
                            <option value="okok">okok</option>
                            <option value="okokok">okokok</option>
                        </select>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <label for="Color5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, modi corrupti quos possimus ducimus praesentium est, voluptas nam aliquid laborum voluptate adipisci necessitatibus nemo explicabo, quia quis quas harum esse?</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select name="Color5">
                            <option value="ok">ok</option>
                            <option value="okok">okok</option>
                            <option value="okokok">okokok</option>
                        </select>
                    </div>
                    
                </div>
                <hr>
                

                <div class="row">

                    <input type="submit" name="submit" value="Get Selected Values" />
                </div>
            </form>
        </div>
    
        <?php
            if(isset($_POST['submit'])){
                var_dump($_POST);
                $selected_val = $_POST['Color1'];  // Storing Selected Value In Variable
                echo "You have selected :" .$selected_val;  // Displaying Selected Value
        }
        ?>


        <button class="btn-primary" name="submit-btn">
            submit
        </button>
    </form>
    <div class= "footer">
        <div class="container">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <h4>
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
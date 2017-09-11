<?php

session_start();

if( isset($_SESSION['user_id']) ){
    header("Location: index.php");
}

require 'public/includes/dbconnection.php';
$message = '';
if(isset($_POST['submit'])):
    $username = $_POST['username'];
    $password = $_POST['password'];
    $message = '';

    $query = $conn->prepare('SELECT id,username,email,password,src FROM users WHERE username = :username');
    $query->bindParam(':username', $username);
    $query->execute();

    $user = $query->fetch();

    if(count($user) > 0 && $password == $user['password']){

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['src'] = $user['src'];

        header("Location: index.php");

    }
endif;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Al Stores</title>
        <meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
        <meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
        <meta name="author" content="Luka Cvetinovic for Codrops" />
        <!-- Favicons (created with http://realfavicongenerator.net/)-->
        <link rel="apple-touch-icon" sizes="57x57" href="public/resources/img/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="public/resources/img/favicons/apple-touch-icon-60x60.png">
        <link rel="icon" type="image/png" href="public/resources/img/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="public/resources/img/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="public/resources/img/favicons/manifest.json">
        <link rel="shortcut icon" href="public/resources/img/favicons/favicon.ico">
        <meta name="msapplication-TileColor" content="#00a8ff">
        <meta name="msapplication-config" content="public/resources/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        <!-- Normalize -->
        <link rel="stylesheet" type="text/css" href="public/resources/css/normalize.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="public/resources/css/bootstrap.css">
        <!-- Owl -->
        <link rel="stylesheet" type="text/css" href="public/resources/css/owl.css">
        <!-- Animate.css -->
        <link rel="stylesheet" type="text/css" href="public/resources/css/animate.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="public/resources/fonts/font-awesome-4.1.0/css/font-awesome.min.css">
        <!-- Elegant Icons -->
        <link rel="stylesheet" type="text/css" href="public/resources/fonts/eleganticons/et-icons.css">
        <!-- Main style -->
        <link rel="stylesheet" type="text/css" href="public/resources/css/cardio.css">
        <!-- Custom style -->
        <link rel="stylesheet" type="text/css" href="public/resources/css/custom.css">
    </head>

<body>
<div class="preloader">
    <img src="public/resources/img/loader.gif" alt="Preloader image">
</div>
<nav class="navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="col-sm-3">
                <a class="navbar-brand" href="#"><img src="public/resources/img/reversed.png" style="margin-top:-10%;width: 270px;height: 90px;" data-active-url="public/resources/img/LOGO2.png" alt=""></a>
            </div>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-nav">
                <?php if(isset($index) && $index == true){
                    echo '
                        <li><a href="#intro">Intro</a></li>
                        <li><a href="#workshops">Workshops</a></li>
                        <li><a href="#services">Nos services</a></li>
                        <li><a href="#contacts">Contact</a></li>
                    ';
                } elseif(!isset($index)){
                    echo '
                        <li><a href="index.php">Intro</a></li>
                        <li><a href="index.php">Workshops</a></li>
                        <li><a href="index.php">Nos services</a></li>
                        <li><a href="index.php">Contact</a></li>
                    ';
                } elseif(isset($index) && $index == false){
                    echo '
                        <li><a href="index.php">Intro</a></li>
                        ';
                    if(isset($interior) && $interior == true){
                        echo '<li><a href="#workshops">Interior</a></li>';
                        echo '<li><a href="exterior.php">Exterior</a></li>';
                    }
                    if(isset($exterior) && $exterior == true){
                        echo '<li><a href="interior.php">Interior</a></li>';
                        echo '<li><a href="#workshops">Exterior</a></li>';
                    }
                }
                ?>
                <?php if(isset($_SESSION['user_id'])) echo '<li><a href="logout.php">Logout</a></li>'; ?>
                <?php if(isset($_SESSION['user_id'])) echo '<li><a href="index.php" style="padding: 0;"><img style="width: 40px;border: 2px solid #ba3b3b;border-radius: 50%;" src="public/resources/img/team/profile.jpg"/></a></li>'; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<header id="intro">
    <div class="container">
        <div class="table">
            <div class="header-text">
                <div class="row">
                    <form class="col-md-4 col-md-offset-4 text-center login" id="login" action="" method="post" enctype="multipart/form-data">
                        <input type="username" id="username" name="username" placeholder="Username">
                        <input type="password" id="password" name="password" placeholder="Password">
                        <button type="submit" name="submit" style="background:#00a8ff ;" value="Login">Login</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Holder for mobile navigation -->
<div class="mobile-nav">
    <ul>
    </ul>
    <a href="#" class="close-link"><i class="arrow_up"></i></a>
</div>


<div class="text-center">
    <p class="text-red">Copyright &copy; 2017 | Tous les droits sont réservés | Al Stores</p>
</div>

<!-- Modal -->
<div class="modal fade" id="messageModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

</body>

    <script src="public/resources/js/jquery-1.11.1.min.js"></script>
    <script src="public/resources/js/owl.carousel.min.js"></script>
    <script src="public/resources/js/bootstrap.min.js"></script>
    <script src="public/resources/js/wow.min.js"></script>
    <script src="public/resources/js/typewriter.js"></script>
    <script src="public/resources/js/jquery.onepagenav.js"></script>
    <script src="public/resources/js/main.js"></script>
    </body>

</html>





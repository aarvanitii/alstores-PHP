<?php



/**
 * Created by PhpStorm.
 * User: Arvaniti-10
 * Date: 8/29/2017
 * Time: 3:41 AM
 */

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
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
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
                        <li><a href="#workshops">Nos réalisations</a></li>
                        <li><a href="#services">Nos services</a></li>
                        <li><a href="#contacts">Contact</a></li>
                    ';
                } elseif(!isset($index)){
                    echo '
                        <li><a href="index.php">Intro</a></li>
                        <li><a href="index.php">Nos réalisations</a></li>
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
                <?php if(isset($_SESSION['user_id'])) echo '<li><a href="logout.php">Déconnexion</a></li>'; ?>
                <?php if(isset($_SESSION['user_id'])) echo '<li><a href="dashboard.php" style="padding: 0;"><img style="width: 40px;border: 2px solid #ba3b3b;border-radius: 50%;" src="public/resources/img/team/profile.jpg"/></a></li>'; ?>
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
                    <div class="col-md-12 text-center">
                        <h3 class="light white">La meilleur qualité</h3>
                        <h1 class="white typed">Dans le seul lieux où vous vivez.</h1>
                        <span class="typed-cursor">|</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section>
    <div class="cut cut-top"></div>
    <div class="container">
        <div class="row intro-tables">
            <div class="col-md-4">
                <div class="intro-table intro-table-first">
                    <h5 class="white heading">Nous contacter</h5>
                    <div class="owl-carousel owl-schedule bottom">
                        <div class="item">
                            <div class="schedule-row row">
                                <div class="col-xs-5">
                                    <h5 class="regular white">Téléphone</h5>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <h6 class="white">+33 7 83 92 69 08</h6>
                                </div>
                            </div>
                            <div class="schedule-row row">
                                <div class="col-xs-5">
                                    <h5 class="regular white">e-Mail</h5>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <h6 class="white">al.stores68@gmail.com</h6>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="schedule-row row">
                                <div class="col-xs-12">
                                    <h5 class="regular white">Commande</h5>
                                </div>
                            </div>
                            <div class="schedule-row row">
                                <div class="col-xs-12">
                                    <h5 class="regular white">Conseil</h5>
                                </div>
                            </div>
                            <div class="schedule-row row">
                                <div class="col-xs-12">
                                    <h5 class="regular white">Monter</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="intro-table intro-table-hover intro-table-third">
                    <h5 class="white heading hide-hover">Nos services</h5>
                    <div class="bottom">
                        <h4 class="white heading small-heading no-margin regular">Voir nos services</h4>
                        <a href="#workshops" class="btn btn-white-fill expand">Cliquez ici</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="intro-table intro-table-hover">
                    <h5 class="white heading hide-hover">Devis</h5>
                    <div class="bottom">
                        <h4 class="white heading small-heading no-margin regular">Demander un devis</h4>
                        <a href="#contact" data-toggle="modal" data-target="#messageModal" class="btn btn-white-fill expand">Cliquez ici</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

/**
 * Created by PhpStorm.
 * User: Arvaniti-10
 * Date: 8/29/2017
 * Time: 3:41 AM
 */

session_start();
if(!(isset($_SESSION['user_id']))){
    header('location: index.php');
}
require ("public/includes/dbconnection.php");
$query = $conn->query('SELECT * FROM messages ORDER BY postDate DESC');
$messages = $query->fetchAll();

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

<body style="background: #b73a3a">
<div class="preloader">
    <img src="public/resources/img/loader.gif" alt="Preloader image">
</div>

<div class="dashboard">
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
                    <?php if(isset($_SESSION['user_id'])){
                        echo '
                        <li><a href="#dashboard">Messages</a></li>
                        <li><a data-toggle="tooltip" data-placement="bottom" title="Arrive bientôt!">Personnaliser</a></li>
                        <li><a href="index.php" target="_blank">Page de visite</a></li>
                        <li><a href="logout.php">Déconnexion</a></li>
                        <li><a href="dashboard.php" style="padding: 0;"><img style="width: 40px;border: 2px solid #ba3b3b;border-radius: 50%;" src="public/resources/img/team/profile.jpg"/></a></li>
                    ';
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container-fluid messages col-lg-12">
        <h2 style="color: white;">Messages</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Inbox</a></li>
            <li><a data-toggle="tab" href="#menu1">Lu des messages</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <table class="table table-messages">
                    <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Téléphone </th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Message</th>
                        <th>Date & Time</th>
                        <th>Marquer comme lu</th>
                        <th>Lu des</th>
                        <th>Suprime</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($messages as $message){
                            if($message['beenRead'] == false) {
                                echo '
                                <tr>
                                    <td>' . $message['fname'] . '</td>
                                    <td>' . $message['tel'] . '</td>
                                    <td>' . $message['email'] . '</td>
                                    <th>' . $message['address'] . '</th>
                                    <td class="message-td">' . $message['message'] . '</td>
                                    <th>' . $message['postDate'] . '</th>
                                    <th><a class="" href="read_message.php?id='. $message['id'] . '">Marquer comme lu</a></th>
                                    <td><a class="" href="view_message.php?id=' . $message['id'] .'">Voir</a></td>
                                    <td><a onclick="deleteconfirm(\'' . $message['id'] . '\')" href="#">Suprime</a></td>
                                <tr>
                            ';
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div id="menu1" class="tab-pane fade">
                <table class="table table-messages">
                    <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Téléphone </th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Message</th>
                        <th>Date & Time</th>
                        <th>Lu des</th>
                        <th>Suprime</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($messages as $message){
                        if($message['beenRead'] == true) {
                            echo '
                                <tr>
                                    <td>' . $message['fname'] . '</td>
                                    <td>' . $message['tel'] . '</td>
                                    <td>' . $message['email'] . '</td>
                                    <th>' . $message['address'] . '</th>
                                    <td class="message-td">' . $message['message'] . '</td>
                                    <th>' . $message['postDate'] . '</th>
                                    <td><a href="view_message.php?id=' . $message['id'] .'">Voir</a></td>
                                    <td><a onclick="deleteconfirm(\'' . $message['id'] . '\')" href="#">Suprime</a></td>
                                <tr>
                            ';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="view-message" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
            <div class="modal-header">
                <h4 class="modal-title">Message</h4>
            </div>
                <div class="modal-body col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <p>Prénom</p>
                    </div>
                    <div class="col-lg-9 name">
                        <p>Arvanit Grainca</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <p>Téléphone</p>
                    </div>
                    <div class="col-lg-9">
                        <p>+334093121</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <p>Email</p>
                    </div>
                    <div class="col-lg-9">
                        <p>arvanitgrainca.ag@gmail.com</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <p>Address</p>
                    </div>
                    <div class="col-lg-9">
                        <p>Mulhouse, France, 200</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <p>Message</p>
                    </div>
                    <div class="col-lg-9">
                        <p>Message Lorem ipsum monum gonum. Lorem ipsum monum gonum. Message Lorem ipsum monum gonum. Lorem ipsum monum gonum
                            Message Lorem ipsum monum gonum. Lorem ipsum monum gonum. Message Lorem ipsum monum gonum. Lorem ipsum monum gonum
                            Message Lorem ipsum monum gonum. Lorem ipsum monum gonum. Message Lorem ipsum monum gonum. Lorem ipsum monum gonum
                            Message Lorem ipsum monum gonum. Lorem ipsum monum gonum. Message Lorem ipsum monum gonum. Lorem ipsum monum gonum
                            Message Lorem ipsum monum gonum. Lorem ipsum monum gonum. Message Lorem ipsum monum gonum. Lorem ipsum monum gonum</p>
                    </div>
                </div>
            </div>
    </div>
</div>


</body>

<script type="text/javascript">
    function deleteconfirm(link) {
        var txt;
        if (confirm("Voulez-vous le supprimer?") == true) {
            location.href = 'delete_message.php?id='+link;
        }
    }
</script>

<script src="public/resources/js/jquery-1.11.1.min.js"></script>
<script src="public/resources/js/owl.carousel.min.js"></script>
<script src="public/resources/js/bootstrap.min.js"></script>
<script src="public/resources/js/wow.min.js"></script>
<script src="public/resources/js/typewriter.js"></script>
<script src="public/resources/js/jquery.onepagenav.js"></script>
<script src="public/resources/js/main.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</html>
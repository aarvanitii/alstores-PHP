<?php
/**
 * Created by PhpStorm.
 * User: Arvaniti-10
 * Date: 8/31/2017
 * Time: 10:21 PM
 */
session_start();
require ('public/includes/dbconnection.php' );
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
if(isset($_SESSION['user_id'])){
    $query = $conn->prepare('SELECT id, fname, tel, email, address, message, beenRead, postDate FROM messages WHERE id='.$id);
    $query->bindParam(':id', $id);
    $query->execute();
    $message = $query->fetch();
}

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
    <div class="col-lg-2">
        <h3><a href="javascript:history.go(-1)"> Back</a></h3>
    </div>
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-3">
                <h5>Prenom</h5>
            </div>
            <div class="col-lg-9">
                <h6><?php echo $message['fname']; ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <h5>Telephone</h5>
            </div>
            <div class="col-lg-9">
                <h6><?php echo $message['tel']; ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <h5>Email</h5>
            </div>
            <div class="col-lg-9">
                <h6><?php echo $message['email'] ;?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <h5>Address</h5>
            </div>
            <div class="col-lg-9">
                <h6><?php echo $message['address'] ;?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <h5>Message</h5>
            </div>
            <div class="col-lg-9">
                <h6><?php echo $message['message'] ;?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <h5>Date</h5>
            </div>
            <div class="col-lg-9">
                <h6><?php echo $message['postDate'] ;?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
            <?php if($message['beenRead'] == false){
                echo'

                        <a class="btn btn-blue-fill" href="read_message.php?id=' . $message['id'] . '">Marquer comme lu</a>
                    ';
            }
            ?>
            </div>
            <div class="col-lg-2">
                <a class="btn delete-red-fill" onclick="deleteconfirm('<?php echo $message['id'] ?>')" href="#">Suprime</a>
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
<script src="public/resources/js/bootstrap.min.js"></script>

<?php
/**
 * Created by PhpStorm.
 * User: Arvaniti-10
 * Date: 8/29/2017
 * Time: 3:49 AM
 */
$exterior = true;
$index = false;
session_start();
require ("public/includes/dbconnection.php");
$query = $conn->query('SELECT * FROM workshops');
$workshops = $query->fetchAll();
if($_SERVER["REQUEST_METHOD"] == "POST") {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $message = 'yoo';
    $productType = "exterior";
    $image_dir = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $image_dir;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $sql = 'INSERT INTO workshops (image, productType) VALUES (:image, :productType)';
    $query = $conn->prepare($sql);

    if(empty($image_dir)){
        $target_file = 'img/uploads/profile.jpg';
        $message = $imageFileType = 'jpg';
    }
    if($imageFileType != "jpg" && $imageFileType != "JPG" &&  $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "JPEG" &&  $imageFileType != "jpeg") {
        $message = $fileErr = "Désolé, seuls les fichiers JPG, JPEG et PNG sont autorisés.";
    }else{
        $query->bindParam('image', $target_file);
    }
    $query->bindParam('productType', $productType);

    error_reporting(E_ERROR | E_PARSE);
    if($query->execute()) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
        header('location: exterior.php');
    }
}

?>


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
    <style>
            .navbar-nav > li > a {
                padding: 15px 25px;
                font-size: 16px;
                color: #c14d4d;
            }
    </style>
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
                <a class="navbar-brand" href="#"><img src="public/resources/img/LOGO2.png" style="margin-top:-10%;width: 270px;height: 90px;" data-active-url="public/resources/img/LOGO2.png" alt=""></a>
            </div>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-nav">
                <?php
                    if(isset($index) && $index == false){
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


<section id="workshops" class="section section-padded gray-bg">
    <div class="container">
        <div class="row text-center title">
            <h2>Ateliers</h2>
            <h4 class="light muted text-red">Découvrez nos services ci-dessous.</h4>
            <?php
            if(isset($_SESSION['user_id'])){ echo '<a href="#addPhotoModal" data-toggle="modal" data-target="#addPhotoModal" class="addPhoto">+</a>';}
            if(isset($message)) echo '<p class="error-message">' . htmlentities($message) . '</p>';
            ?>
        </div>
        <div class="row services">
            <?php
            foreach ($workshops as $workshop) {
                if ($workshop['productType'] == 'exterior') {
                    $image = $workshop['image'];
                    echo '<div class="col-xs-6 col-md-4">';
                    if(isset($_SESSION['user_id'])){
                        echo '<a class="delete-link" href="delete_post.php?id=' . $workshop['id'] . '">Suprime</a>';
                    }
                    echo '<img id="open-modal" class="thumbnail img-responsive" style="height:450px;" onclick="modalFunction(\'' . $image . '\')" data-toggle="modal" data-target="#my_modal" src="public/resources/img/work/' . $workshop['image'] . '"></div>';
                }
            }
            ?>
        </div>

    </div>
</section>

<!-- Modal -->
<?php if(isset($_SESSION['user_id'])){
    echo '
        <div class="modal" id="addPhotoModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="col-xs-12">
                        <form class="col-md-4 col-md-offset-4 text-center addphotomodal" id="addphoto" action="" method="post" enctype="multipart/form-data">
                            <input type="file" id="uploadphoto" name="fileToUpload">
                            <input type="submit" name="submit" value="Confirmer"></form></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    ';
}
?>
<div class="modal" id="my_modal">
    <div class="col-sm-12" style="padding: 50px;">
        <p><a href="#" data-dismiss="modal">Fermer</a></p>
        <img id="modalImgId" class="thumbnail img-responsive" src="" style="height: 500px;margin: 0 auto;">
    </div>
</div>
</body>
<!-- Scripts -->
<script type="text/javascript">
    function modalFunction(img) {
        document.getElementById("modalImgId").setAttribute("src", "public/resources/img/work/" + img);
    }
</script>

<?php include ('public/includes/footer.php'); ?>

<?php
/**
 * Created by PhpStorm.
 * User: Arvaniti-10
 * Date: 8/31/2017
 * Time: 1:21 AM
 */
require ('public/includes/dbconnection.php');

$message = 'not good';
if(isset($_POST['sendMessage'])){

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $message_input = $_POST['message'];
    date_default_timezone_set("Europe/France");
    $postDate = date("y-m-d H:i:s");


    $sql = 'INSERT INTO messages (fname,tel,email,address,message,postDate) VALUES (:fname, :tel, :email, :address, :message, :postDate)';

    $query = $conn->prepare($sql);

    if (empty($name)) {
        $message = "* Le nom est requis";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $message = "* Seules les lettres et les espaces blancs ont été autorisés";
        }else{
            $query->bindParam('fname', $name);
        }
    }

    if (empty($email)) {
        $message = "* Un courrier électronique est requis";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "* Format d'email invalide";
        }else{
            $query->bindParam('email', $email);
        }
    }

//

    if (empty($tel)) {
        $message = "* Le numéro de téléphone est requis";
    } else {
        $tel = test_input($_POST["tel"]);
        if (!preg_match("/\+\d{10,11}[0-9]/",$tel)) {
            $message = "* Le format du numéro de téléphone n'est pas valide";
        }else{
            $query->bindParam('tel', $tel);
        }
    }
    $query->bindParam('address', $address);

    if (empty($message_input)) {
        $message = "* Le message est requis";
    } else {
        $query->bindParam('message', $message_input);
    }

    $query->bindParam('postDate', $postDate);

    error_reporting(E_ERROR | E_PARSE);
    if($query->execute()){
        $message = 'yoo';
        header('location: index.php');
    }

}

echo '<h1>'. $message .'</h1>
    <h3>Revenez à la maison et réessayez<a href="javascript:history.go(-1)"> Cliquez ici</a></h3>
    ';
?>

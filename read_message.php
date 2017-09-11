<?php
/**
 * Created by PhpStorm.
 * User: Arvaniti-10
 * Date: 8/31/2017
 * Time: 8:05 PM
 */

require ('public/includes/dbconnection.php');
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$message = 'Vous n\'êtes pas autorisé à prendre cette mesure';
if(isset($_SESSION['user_id'])){
    $sql = "UPDATE messages SET beenRead='TRUE' WHERE id=" . $id;
    if ($conn->query($sql) === TRUE) {
        header('location: dashboard.php');
    }
    else{
        header('location: dashboard.php');
    }
}
echo'<h1>' . $message . '</h1>
    <h3>Revenez à la maison et réessayez<a href="javascript:history.go(-1)"> Cliquez ici</a></h3>
    ';
?>
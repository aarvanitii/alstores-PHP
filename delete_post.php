<?php
/**
 * Created by PhpStorm.
 * User: Arvaniti-10
 * Date: 8/30/2017
 * Time: 10:57 PM
 */

include 'public/includes/dbconnection.php';
session_start();

$message = 'not good';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $message = 'ID = ' .$id;
}

if(isset($_SESSION['user_id'])){
    $query = "DELETE FROM workshops WHERE id= :id";
    $statement = $conn->prepare($query);
    $statement->execute(['id' => $id]);
    $user = $statement->fetch();
    header('location: index.php');
}else{
    header('location: index.php');
}

?>
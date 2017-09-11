<?php
/**
 * Created by PhpStorm.
 * User: Arvaniti-10
 * Date: 9/1/2017
 * Time: 12:07 AM
 */

include 'public/includes/dbconnection.php';
session_start();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if(isset($_SESSION['user_id'])){
    $query = "DELETE FROM messages WHERE id= :id";
    $statement = $conn->prepare($query);
    $statement->execute(['id' => $id]);
    $message= $statement->fetch();
    header('location: dashboard.php');
}else{
    $message = 'not good';
}
echo $message;
?>
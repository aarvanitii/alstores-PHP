<?php
/**
 * Created by PhpStorm.
 * User: Arvaniti-10
 * Date: 8/29/2017
 * Time: 2:55 AM
 */

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alstores";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username , $password);
    }catch(PDOException $conn){
        echo "Connection failed: " . $conn->getMessage();
    }
?>
<?php
/**
 * Created by PhpStorm.
 * User: Arvaniti-10
 * Date: 8/29/2017
 * Time: 4:26 AM
 */

session_start();

// Heqja e sesionit
session_unset();

session_destroy();

header("Location: index.php")

?>
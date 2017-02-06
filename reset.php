<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 06/02/2017
 * Time: 15:51
 */
include "config.php";
session_start();
$email = $_SESSION['email'];
$query = mysqli_query($dbconfig,"UPDATE premium SET status_p = '0' WHERE email = '$email'");
session_destroy();
session_regenerate_id(true);
header("location:../index.php");
?>
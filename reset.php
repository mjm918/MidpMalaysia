<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 06/02/2017
 * Time: 15:51
 */
include "DBHandler/config.php";
session_start();
$email = $_SESSION['email'];
$query = mysqli_query($dbconfig,"UPDATE premium SET status_p = 0 WHERE email = '$email'");
$deleteMcq = mysqli_query($dbconfig,"delete from mcq_answers where email = '$email'");
$deleteTheory = mysqli_query($dbconfig,"delete from theoryanswer where email = '$email'");
$deleteRec = mysqli_query($dbconfig,"delete from record where email = '$email'");
$deleteMsg = mysqli_query($dbconfig,"delete from chat where who = '$email' or receive='$email'");
$deleteBankRec = mysqli_query($dbconfig,"delete from bank where email = '$email'");
//things need to add like record and answers
session_destroy();
session_regenerate_id(true);
header("location:index.php");
?>
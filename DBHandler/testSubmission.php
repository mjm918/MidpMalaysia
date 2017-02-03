<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 03/02/2017
 * Time: 10:59
 */
include ('config.php');
session_start();
$error_msg = "";
$email = $_SESSION['email'];
if(isset($_POST["submit"])){
    $ans = $_POST['rb_ans'];
    $question = $_POST['question'];

    $query = mysqli_query($dbconfig,"");
}
?>


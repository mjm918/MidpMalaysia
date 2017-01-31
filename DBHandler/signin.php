<?php 
include ("config.php");
session_start();

$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["in_lemail"];
    $password = $_POST["in_lpass"];
    $stripemail = stripslashes($email);
    $strippass  = stripslashes($password);
    $email = mysqli_real_escape_string($dbconfig, $stripemail);
    $password = mysqli_real_escape_string($dbconfig, $strippass);
    $hash = md5($password,TRUE);

    try{
        $query  = mysqli_query($dbconfig,"select * from premium where email='$email' and pass='$hash'");

        if(mysqli_num_rows($query) == 1){
            $row = $query->fetch_assoc();
            $status = $row['status_p'];
            $_SESSION['email']= $email;
            if($status == "1"){
                header('location:../home.php');
            }else{
                header('location:../payment.php?email='.$email);
            }
        }else{
            $msg = "Login failed. Please check your email and password";
            header('location:../index.php?error='.$msg);
        }
    }catch (mysqli_sql_exception $why){
        header('location:../index.php?error='.$why);
    }
}
?>
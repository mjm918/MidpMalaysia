<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 27/01/17
 * Time: 7:01 PM
 */
include ('config.php');
session_start();
$error_msg = "";

if(isset($_POST["submit"])){
    $name =  $_POST['in_name'];
    $ic = $_POST['in_ic'];
    $mobile = $_POST['in_mobile'];
    $email = $_POST['in_email'];
    $pass = $_POST['in_password'];
    $repass = $_POST['in_re_pass'];
    $state = $_POST['in_state'];
    $school = $_POST['in_school'];

    if($pass != $repass){
        $error_msg = "Password did not match";
        header('location:../index.php?error='.$error_msg);
    }

    $password = mysqli_real_escape_string($dbconfig,$pass);
    $password = md5($password,TRUE);

    $sql = "select email from premium where email='$email'";

    $result=mysqli_query($dbconfig,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1)
    {
        $error_msg = "Email already exist";
        header('location:../index.php?error='.$error_msg);
    }

    try{
        $query = mysqli_query($dbconfig,"INSERT INTO premium (id,fullname,ic,mobile,email,pass,state,school,status_p) 
                                             VALUES (NULL ,'$name','$ic','$mobile','$email','$password','$state','$school',NULL)");

        if($query){
            header('location:../payment.php?email='.$email);
        }else{
            $error_msg = "Something went wrong. Check email and password";
            header('location:../index.php?error='.$error_msg);
        }
    }catch (mysqli_sql_exception $exception){
        throw $exception;
        echo $exception;
    }
}
?>
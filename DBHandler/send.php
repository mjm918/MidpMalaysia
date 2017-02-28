<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 28/02/2017
 * Time: 12:51
 */
include "config.php";

if(isset($_POST['submit'])){
    $toDate = date("Y/m/d").' at '.date("h:i:sa");
    $email = $_POST['email'];
    $msg = htmlspecialchars($_POST['msg']);
    try{
        $send = mysqli_query($dbconfig,"insert into chat (id,who,receive,message,date) VALUES (NULL,'$email','admin','$msg','$toDate')");

        if($send){
            header('location:../request.php?email='.$email);
        }else{
            echo $email.$msg.$toDate;
            echo "Try again";
        }
    }catch (mysqli_sql_exception $e){
        echo $e;
    }
}
?>
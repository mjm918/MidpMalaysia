<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 28/01/17
 * Time: 10:54 AM
 */
include ('./DBHandler/config.php');
include ('init.php');
session_start();
$email = $_SESSION['email'];
if (isset($_POST['stripeToken'])){
    $token = $_POST['stripeToken'];
   
    try{
        \Stripe\Charge::create(array(
        "amount" => 2000,
        "currency" => "myr",
        "source" => $token, 
        "description" => $email 
        ));
        $query = mysqli_query($dbconfig,"update premium set status_p=1 where email = '$email'");
        }catch(Stripe_CardError $e){
            echo $e;
        }
    header('location:invoice.php?email='.$email);
}
?>
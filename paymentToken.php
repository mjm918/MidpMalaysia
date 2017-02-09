<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 28/01/17
 * Time: 10:54 AM
 */
include ('./DBHandler/config.php');
include ('init.php');
$email = $_SESSION['email'];
$hash = $_SESSION['hash'];
echo $hash;
if (isset($_GET['approve'])){
    $approve = $_GET['approve'];
    if($approve == 1){
        $payerID = $_GET['PayerID'];
        $sql = mysqli_query($dbconfig,"select pid from premium where hash='$hash'");
        $row = $sql->fetch_assoc();
        $pid = $row['pid'];
        echo $pid;
        $pay = \PayPal\Api\Payment::get($pid,$api);

        $execute = new \PayPal\Api\PaymentExecution();
        $execute->setPayerId($payerID);

        $pay->execute($execute,$api);

        $query = mysqli_query($dbconfig,"update premium set status_p=1,pmid='$payerID' where email = '$email'");
    }else{
        header('location:index.php');
    }
    header('location:invoice.php?email='.$email);
}
?>
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
$hash = $_SESSION['hash'];
if (isset($_GET['approve'])){
    $approve = $_GET['approve'];
    if($approve == "yes"){
        //$email = $_SESSION['email'];
        $payerID = $_GET['PayerID'];
        $pid = $_SESSION['pid'];
        $pay = \PayPal\Api\Payment::get($pid,$api);

        $execute = new \PayPal\Api\PaymentExecution();
        $execute->setPayerId($payerID);

        $pay->execute($execute,$api);
    }else{
        header('location:index.php');
    }
}
if(isset($_POST['submit'])){
    $email = $_POST['nemail'];
    $pass = md5($_POST['pass'],TRUE);
    $check = mysqli_query($dbconfig,"select * from premium where email='$email' and pass='$pass'");
    if(mysqli_num_rows($check)>0){
        $sql = mysqli_query($dbconfig,"update premium set status_p='1' where email = '$email'");
        if($sql){
            $_SESSION['email'] = $email;
            header('location:home.php');
        }
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="assets/midp.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Midp Test</title>
</head>
<?php include "header.php";?>
<body>
<div style="margin-top:100px" class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 style="color: green" class="panel-title">Payment Successful ! Enter your email again</h1>
                </div>
                <div class="panel-body">
                    <form role="form" action="paymentToken.php" method="POST">
                        <div class="form-group">
                            <input type="email" pattern=".{3,40}" required title="3 to 40 characters" name="nemail" id="nemail" class="form-control" required="required" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <input type="password" pattern=".{3,20}" required title="3 to 20 characters" name="pass" id="pass" class="form-control" required="required" placeholder="Password">
                        </div>
                        <input style="background-color: #326eaf" name="submit" type="submit" value="Login" class="btn btn-info btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include "footer.php";?>
</html>

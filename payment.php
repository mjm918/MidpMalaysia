<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 28/01/17
 * Time: 10:04 AM
 */
include ('DBHandler/config.php');
include ('init.php');
session_start();
$email = $_GET['email'];

if($email == ""){
    header('location:index.php');
}
$_SESSION['email'] = $email;

$query = mysqli_query($dbconfig,"select * from policy where name = 'policy'");
if(mysqli_num_rows($query)>0){
    $row = $query->fetch_assoc();
    $policy = $row['description'];
}
//paypal
if(isset($_POST['submit'])){

    $payer = new \PayPal\Api\Payer();
    $details = new \PayPal\Api\Details();
    $amount = new \PayPal\Api\Amount();
    $trans = new \PayPal\Api\Transaction();
    $payment = new \PayPal\Api\Payment();
    $redirect = new \PayPal\Api\RedirectUrls();

    $payer->setPaymentMethod('paypal');
    $details->setShipping('2.00')
        ->setTax('0.00')
        ->setSubtotal('120.00');
    $amount->setCurrency('MYR')
        ->setTotal('122.00')
        ->setDetails($details);
    $trans->setAmount($amount)
        ->setDescription('Membership');
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([$trans]);
    $redirect->setReturnUrl('http://175.138.78.105/midp/paymentToken.php?approve=yes')
        ->setCancelUrl('http://175.138.78.105/midp/paymentToken.php?approve=no');
    $payment->setRedirectUrls($redirect);

    try{
        $new = $_SESSION['email'];
        $payment->create($api);
        $pid = $payment->getId();
        $hash = md5($pid);
        $_SESSION['hash'] = $hash;
        $_SESSION['pid'] = $pid;
        //$update = mysqli_query($dbconfig,"update premium set pid='$pid',hash='$hash' where email = '$new' ");
    }catch(\PayPal\Exception\PayPalConnectionException $e){
        echo 'ERROR---->\n';
        echo $e;
    }
    foreach ($payment->getLinks() as $l){
        if($l->getRel()=="approval_url"){
            $redirect = $l->getHref();
        }
        header('location:'.$redirect);
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midp Test</title>

    <script type="text/javascript">
        var query = window.location.search.substring(1)

        if(query.length) {
            if(window.history != undefined && window.history.pushState != undefined) {
                window.history.pushState({}, document.title, window.location.pathname);
            }
        }
    </script>

</head>
<?php include "header.php";?>
<body>
<div style="margin-top: auto" class="container">
    <div class="row">
        <nav class="col-sm-3">
            <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
                <li><a href="#register">Register</a></li>
                <li class="active"><a href="#payment">Complete payment</a></li>
                <li><a href="#done">Done!</a></li>
            </ul>
        </nav>
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <p style="text-align: justify;margin:20px;color:dimgray">
                    <?php echo $policy;?>
                    </p>
                </div>
            <!---code here-->
                <h4 style="color: coral">Registration fee</h4><h2 style="color: #326eaf">RM 122.00 only</h2>
                <form action="payment.php" method="post">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Pay with Paypal"/>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php include "footer.php";?>
</html>

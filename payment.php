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
                        You can integrate Checkout in as little as a single line of client-side code. As we release new Stripe features, we'll automatically roll them out to your existing Checkout integration, so that you will always be using our latest technology without needing to change a thing.
                        Checkout supports two different integrations:
                        Simple: The simple integration provides a blue Pay with Card button as shown above. Upon completion of the payment form and receipt of the token, Checkout stores the token within a hidden input in your payment form and automatically submits the form for server-side use.
                        Custom: The custom integration lets you create a custom button and passes a Stripe token to a JavaScript callback. Your JavaScript callback will need to send the token to your server for use.
                    </p>
                </div>
        <form action="paymentToken.php" method="POST">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $key['public'];?>"
                data-currency="myr"
                data-amount="2000"
                data-name="MidpTest"
                data-description="Payment for test"
                data-email="<?php echo $email; ?>"
                data-locale="auto">
            </script>
        </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php include "footer.php";?>
</html>

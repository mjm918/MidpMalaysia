<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 27/01/17
 * Time: 5:42 PM if($_SESSION['sid']==session_id())
 */
 error_reporting(0);
include ('DBHandler/config.php');
session_start();
$error_msg = $_GET['error'];
if($error_msg != ""){
    echo '<script>alert("'.$error_msg.'")</script>';
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!--For Mobile rendering-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midp Test</title>
</head>
<?php include "header.php";?>
<body>
<?php include "signupForm.php";?>
</body>
<?php include "footer.php";?>
</html>
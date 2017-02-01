<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 31/01/2017
 * Time: 15:16
 */
require_once ('DBHandler/config.php');
session_start();
$email = $_SESSION['email'];
if($email == ""){
    header('location:index.php');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!--For Mobile rendering-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    <script>
        history.pushState(null, null, 'bingo-you-cant-go-back');
        window.addEventListener('popstate', function(event) {
            history.pushState(null, null, 'bingo-you-cant-go-back');
            document.getElementById('hide').style.display = 'none'
        });
    </script>

    <title>Midp Test</title>
</head>
<body>
<?php include ('headerProfile.php');?>
<div class="container">
    <hr>
</div>
</body>
<?php include ('footer.php');?>
</html>

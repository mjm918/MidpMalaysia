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
$sql = "SELECT COUNT(*) FROM mcq";
$retval1 = mysqli_query($dbconfig, $sql);
$row = mysqli_fetch_row($retval1);
$total_records = $row[0];
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

    <h3 style="color: dimgrey">Total <b><span style="
    font-size: 40px;
    color: #326eaf;"><?php echo $total_records;?></span></b> questions. Exam finishes in <b><span style="
    color: crimson;
    font-size: 40px;
    text-shadow: 1px 1px grey;" id="time">--:--</span></b> minutes!</h3>

    <script type="text/javascript">
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            var phpRes = <?php echo json_encode($total_records); ?>;
            var minutes = 60 *0.5*phpRes,
                display = document.querySelector('#time');
            startTimer(minutes, display);
        };
        var res = <?php echo json_encode($total_records); ?>;
        var t = (res*60*0.5)*1000;
        setTimeout(function () {
            window.location.href= 'http://www.google.com';
        },t);
    </script>

    <hr>
    <div class="row centered-form">
        <div>
            <div style="padding: 30px;height: 400px" class="panel panel-default">
                <iframe style="width: 100%;height: 100%" src = "./DBHandler/test.php"/>
            </div>
        </div>
    </div>
</div>
</body>
<?php include ('footer.php');?>
</html>

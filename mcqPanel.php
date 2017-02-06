<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 31/01/2017
 * Time: 15:16
 */
require_once ('DBHandler/config.php');
error_reporting(0);
session_start();
$email = $_SESSION['email'];
if($email == ""){
    header('location:index.php');
}

$check_record = mysqli_query($dbconfig,"select * from record where email = '.$email.'");
if(mysqli_num_rows($check_record)>1){
    header('location:index.php');
}

$query = mysqli_query($dbconfig,"select status_p from premium where email='$email'");
$row_status = $query->fetch_assoc();
$status = $row_status['status_p'];

if($status != "1"){
    header('location:index.php');
}

if($email != ""){
    $date = date("Y-m-d");
    $query = mysqli_query($dbconfig,"INSERT INTO record (id,email,date,marks) VALUES (NULL,'$email','$date',NULL)");
}

$sql = "SELECT COUNT(*) FROM mcq";
$retval1 = mysqli_query($dbconfig, $sql);
$row = mysqli_fetch_row($retval1);
$total_records = $row[0];

echo "<script>localStorage.clear();</script>";
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
        window.setInterval(function() {
            if(localStorage.getItem("finish") == 1) {
                var t = 13*1000;
                setTimeout(function () {
                    window.location= 'theoryQuestion.php';
                },t);
            }
        },30);
    </script>

    <title>Midp Test</title>
</head>
<body>

<?php include ('headerProfile.php');?>
<div class="container">
    <hr>

    <h3 style="color: dimgrey">Total <b><span style="
    font-size: 40px;
    color: #326eaf;"><?php echo $total_records;?></span></b> questions. MCQ section finishes in <b><span style="
    color: crimson;
    font-size: 40px;
    text-shadow: 1px 1px grey;" id="MCQtime">--:--</span></b> minutes!</h3>

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
                display = document.querySelector('#MCQtime');
            startTimer(minutes, display);
        };
        var res = <?php echo json_encode($total_records); ?>;
        var t = (res*60*0.5)*1000;
        setTimeout(function () {
            window.location= 'theoryQuestion.php';
        },t);
    </script>

    <hr>

    <p>Don't reload the page. Reloading page will cause lost data and will consider the exam as already taken.</p><br>

    <div class="row centered-form">
        <div>
            <div style="padding: 30px;height: 400px" class="panel panel-default">
                <iframe frameBorder="0" style="width: 100%;height: 100%" src = "DBHandler/mcqQuestions.php"/>
            </div>
        </div>
    </div>
</div>
</body>
<?php include ('footer.php');?>
</html>

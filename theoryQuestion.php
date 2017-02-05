<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 04/02/2017
 * Time: 14:17
 */
error_reporting(0);
include "./DBHandler/config.php";
session_start();

$email = $_SESSION['email'];

if(isset($_POST["submit"])){
    $question = $_POST['ques'];
    $ans = htmlspecialchars($_POST['ans']);

    $sql = mysqli_query($dbconfig,"insert into theoryanswer (id,email,question,answer) VALUES (NULL,'$email','$question','$ans')");

    if($sql){
        $_SESSION['ques'] = $_SESSION['ques']+1;
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>

    <title>Midp Test</title>

</head>
<?php include "headerProfile.php";?>
<body>
<div class="container">
    <?php
    $limit = 1;
    $page = $_SESSION['ques'];
    $record_index= ($page) * $limit;

    $query = mysqli_query($dbconfig,"select * from theoryquestion limit $record_index,$limit");

    if(mysqli_num_rows($query)>0){
        while ($row = mysqli_fetch_array($query)) {
            echo '<h3 style="color: #326eaf">Question</h3>
    <p style="color: #525252">' . $row["question"] . '</p>
    <form method="post" action="theoryQuestion.php">
        <input style="display:none" name="ques" id="ques" value="' . $row["question"] . '"/>
            <textarea placeholder="Write your answer here" style="resize: none;height: 350px" class="form-control" rows="5" id="ans" name="ans"></textarea>';
            echo '<br><input style="float:right" type="submit" class="btn btn-danger" name="submit" id="submit" value="Submit"/>
    </form>';
        }
    }else{
        echo "<h1 style='color: #326eaf;text-align: center;margin-top: 50px'>Answers successfully submitted</h1>";
        echo "<h2 style='color: coral;text-align: center;margin-top: 50px'>Thank you for your interest</h2>";
        echo "<p style='color: dimgrey;text-align: center;margin-top: 50px'> Redirecting to home page. [Do not reload this page. This page will auto redirect in <b><span id='time'></span></b> seconds]</p>";

        echo '<script type="text/javascript">
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
            var minutes = 13,
                display = document.querySelector(\'#time\');
            startTimer(minutes, display);
        };
        
         var t = 15000;
        var url = "home.php" ;
        setTimeout(function () {
            window.location = url;
        },t);
        
    </script>';
    }
    ?>
</div><br><br><br><br>
</body>
<?php include "footer.php"?>
</html>

<?php
error_reporting(0);
require_once ('config.php');
session_start();

$limit = 1;
$none = "";

$msg = "";
$email = $_SESSION['email'];

if(isset($_POST["submit"])){
    $ans = $_POST['rb_ans'];
    $question = $_POST['question'];

    $query = mysqli_query($dbconfig, "INSERT INTO mcq_answers (id,email,question,answer,validate,correct,marks) VALUES (NULL,'$email','$question','$ans',0,NULL,NULL)");

    if($query){
        $_SESSION['next'] = $_SESSION['next']+1;
        $msg = "success";
    }else{
        echo 'FAIL';
    }
}

$page = $_SESSION['next'];

$record_index= ($page) * $limit;

$sql = "SELECT * FROM mcq LIMIT $record_index, $limit";

$retval = mysqli_query($dbconfig, $sql);


if (mysqli_num_rows($retval) > 0) {

    while($row = mysqli_fetch_assoc($retval)) {

        echo '<link rel="stylesheet" href="css/style.css">
    <!-- required includes -->
    <script src="http://bootboxjs.com/bootbox.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <!--For Mobile rendering-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">';


        // echo '<script>$("#ww").ajaxForm({url: \'mcqQuestions.php\', type: \'post\'})</script>';

        echo '<h2 style="color: #326eaf">Question</h2>';
        echo '<div style="text-align: center;margin-top: 50px">';
        echo '<h3 style="color: dimgrey">'.$row['question'].'</h3>';
        echo '<form name="ww" id="ww" class="ww" action="mcqQuestions.php" method="POST">

        <input style="color: dimgray;display: none" name="question" id="question" value="' .$row['question'].'"/>
        
        <input  type="radio" name="rb_ans" value="'.$row['q_a'].'" /> '.$row['q_a'].'

        <br><input type="radio" name="rb_ans" value="'.$row['q_b'].'" /> '.$row['q_b'].'
    
        <br><input type="radio" name="rb_ans" value="'.$row['q_c'].'" /> '.$row['q_c'].'

        <br><input type="radio" name="rb_ans" value="'.$row['q_d'].'" /> '.$row['q_d'].'
        
        <br><br><input type="submit" class="btn btn-danger" name="submit" id="submit" value="Submit"/>
        
     </form>';
        echo '</div>';
    }
}
else {
    echo "<h1 style='color: #326eaf;text-align: center;margin-top: 50px'>Answers successfully submitted.</h1>";
    echo "<p style='color: dimgrey;text-align: center;margin-top: 50px'> Redirecting to next part(Theory questions) [Do not reload this page. This page will auto redirect in <b><span id='time'></span></b> seconds]</p>";

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
    </script>';
}
echo "</tbody>";
echo "</table>";

?>


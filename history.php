<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 10/02/2017
 * Time: 18:39
 */
include "DBHandler/config.php";
session_start();
$tableHide = "";
$email = $_SESSION['email'];
$query = mysqli_query($dbconfig,"select * from premium where email='$email'");
while($row = mysqli_fetch_array($query)){
    $name = $row['fullname'];//
    $ic = $row['ic'];//
    $mobile = $row['mobile'];//
    $email = $row['email'];//
    $state = $row['state'];//
    $school = $row['school'];//
    $status = $row['status_p'];
}
$premium ="Payment due";
if($status == 1){
    $premium = "Fee paid";
}
$sql = mysqli_query($dbconfig,"select * from record where email='$email'");
$res = $sql->fetch_assoc();
$date = $res['date'];
$marks = $res['mcq'];
$theory = $res['theory'];

$grade_marks = (int)$marks+(int)$theory;

$grade = "";
if(($grade_marks>=80)){
    $grade = "A";
}
if($grade_marks>=60 && $grade_marks<=79){
    $grade = "B";
}
if($grade_marks>=41 && $grade_marks<=59){
    $grade = "C";
}
if($grade_marks>=20 && $grade_marks<=39){
    $grade = "D";
}
if($grade_marks>=10 && $grade_marks<=19){
    $grade = "E";
}
if($grade_marks>=0 && $grade_marks<=9){
    $grade = "F";
}
if($marks == 0 && $theory == 0){$grade = "NULL";}
$grade_query = mysqli_query($dbconfig,"update record set grade='$grade' WHERE email = '$email'");

if($date==""){
    $date = "Not Attempted yet";
    $tableHide = "display:none";
    $grade = "";
}
if($marks==""){
    $marks = "NULL";
}else{
    $display = "display:none";
}
if($theory ==""){
    $theory = "NULL";
}else{
    $display = "display:none";
}

$check_marking = mysqli_query($dbconfig,"select validate from mcq_answers where email='$email'");
$valid = $check_marking->fetch_assoc();
$is_valid = $valid['validate'];
$hide_it = "";
if($is_valid == "0"){
    $hide_it = "display:none";
}else{
    $display = "display:none";
}
$check_theory = mysqli_query($dbconfig,"select * from theoryanswer where email='$email' and validate='0'");
$hide_theory = "display:none";
if(mysqli_num_rows($check_theory)>0){
    $hide_theory = "";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!--For Mobile rendering-->
    <link href="assets/midp.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        .card {
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }

        .card {
            margin-top: 10px;
            box-sizing: border-box;
            border-radius: 2px;
            background-clip: padding-box;
        }
        .card span.card-title {
            color: #fff;
            font-size: 24px;
            font-weight: 200;
            text-transform: uppercase;
        }

        .card .card-image {
            position: relative;
            overflow: hidden;
        }
        .card .card-image img {
            border-radius: 2px 2px 0 0;
            background-clip: padding-box;
            position: relative;
            z-index: -1;
        }
        .card .card-image span.card-title {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 16px;
        }
        .card .card-content {
            padding: 16px;
            border-radius: 0 0 2px 2px;
            background-clip: padding-box;
            box-sizing: border-box;
        }
        .card .card-content p {
            margin: 0;
            color: inherit;
        }
        .card .card-content span.card-title {
            line-height: 48px;
        }
        .card .card-action {
            border-top: 1px solid rgba(160, 160, 160, 0.2);
            padding: 16px;
        }
        .card .card-action a {
            color: coral;
            margin-right: 16px;
            transition: color 0.3s ease;
            text-transform: uppercase;
        }
        .card .card-action a:hover {
            color: #ffd8a6;
            text-decoration: none;
        }
    </style>

    <title>Midp Test</title>

</head>
<?php include "headerProfile.php";?>
<body>
<div class="container">
    <div class="row">
        <!-- Card Projects -->
        <div style="margin-bottom: 50px" class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-image">
                    <img style="margin-left: auto;margin-right: auto;display: block;" class="img-responsive" width="200" height="350" src="assets/midp.png">
                </div>

                <div class="card-content">
                    <span style="color: coral;" class="card-title"><?php echo $name;?></span>
                    <p style="color: #326eaf"><?php echo $email;?></p>
                </div>

                <div class="card-action">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td><a style="text-decoration: none;font-weight: 700" href="https://www.google.com/search?q=<?php echo $school;?>" target="new_blank"><span style="color: #326eaf">School </span></td>
                            <td><a style="text-decoration: none" href="https://www.google.com/search?q=<?php echo $school;?>" target="new_blank"><b style="color: coral"><?php echo $school;?></b></a></td>
                        </tr>
                        <tr>
                            <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">IC </span></b></h5></td>
                            <td><b style="color: coral"><?php echo $ic;?></b></td>
                        </tr>
                        <tr>
                            <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">State </span></b></h5></td>
                            <td><b style="color: coral"><?php echo $state;?></b></td>
                        </tr>
                        <tr>
                            <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">Mobile </span></b></h5></td>
                            <td><b style="color: coral"><?php echo $mobile;?></b></td>
                        </tr>
                        <tr>
                            <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">Status </span></b></h5></td>
                            <td><b style="color: coral"><?php echo $premium;?></b></td>
                        </tr>
                        <tr>
                            <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">Date of exam taken </span></b></h5></td>
                            <td><b style="color: coral"><?php echo $date;?></b></td>
                        </tr>
                        <tr class="success" style="font-size: 18px">
                            <td><a style="text-decoration: none; href="#" target="new_blank"><b><span style="color: #326eaf">Result </span></b></h5></td>
                            <td><b style="color: #326eaf">MCQ - </b><b style="color: coral"><?php echo $marks;?></b>
                                <b style="color: #326eaf">Theory - </b><b style="color: coral"><?php echo $theory;?></b>
                                <b style="color: #326eaf">Grade - </b><b style="color: coral"><?php echo $grade;?></b>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div style="<?php echo $tableHide;?>;margin-bottom: 200px">
        <b><h3 style="color: #326eaf">MCQ Answers</h3></b>
        <table style="<?php echo $hide_it;?>;" class="table">
            <thead>
            <tr>
                <th>Question</th>
                <th>Given Ans</th>
                <th>Correct Ans</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $titties = mysqli_query($dbconfig,"select * from mcq_answers where email='$email' and marks='0'");
            while ($small_titties = mysqli_fetch_array($titties)){
                $q = $small_titties['question'];
                $a = $small_titties['answer'];
                $c = $small_titties['correct'];
                echo '<tr class="danger">
            <td>'.$q.'</td>
            <td>'.$a.'</td>
            <td>'.$c.'</td>
        </tr>';
            }
            ?>
            <?php
            $boobies = mysqli_query($dbconfig,"select * from mcq_answers where email='$email' and marks!='0'");
            $score_q = mysqli_query($dbconfig,"select * from policy where name='marks'");
            $num_row = $score_q->fetch_assoc();
            $score = $num_row['description'];
            $int = (int)$score;
            $total_c = mysqli_num_rows($boobies);
            $total_mark = $int*$total_c;
            $insert_record = mysqli_query($dbconfig,"update record set mcq='$total_mark' WHERE email='$email'");

            while ($small_boobies = mysqli_fetch_array($boobies)){
                $q_a = $small_boobies['question'];
                $a_a = $small_boobies['answer'];
                echo '<tr class="success">
            <td>'.$q_a.'</td>
            <td>'.$a_a.'</td>
            <td>Correct answer</td>
        </tr>';
            }
            ?>
            </tbody>
        </table>
        <hr>
        <b><h3 style="color: #326eaf">Theory Answers & Comment</h3></b>
        <?php
        $view = mysqli_query($dbconfig,"select* from theoryanswer where email='$email' and validate='1'");
        while ($s = mysqli_fetch_array($view)){
            echo '<div class="panel panel-default">
            <div class="panel-heading">
                <h3 style="color: #326eaf">Question:</h3>
                <h4 style="color: coral">'.$s['question'].'</h4>
            </div>
            <div class="panel-heading"><h4 style="color: #326eaf">Answer:</h4></div>
            <div class="panel-body"><p style="text-align: justify"><mark>'.$s['answer'].'</mark></p></div>
            <div class="panel-body">
                <h4 style="color: #326eaf">Comment:</h4>
                <pre>
                    '.$s['comment'].'
                </pre>
                <h4 style="color:coral">Score :'.$s['marks'].'</h4>
            </div>
        </div>';
        }
        ?>
    </div>
</div>
</body>
<?php include "footer.php";?>
</html>

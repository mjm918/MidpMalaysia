<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 29/01/2017
 * Time: 11:48
 */
require_once ('./DBHandler/config.php');
session_start();
$email = $_SESSION['email'];
$query = mysqli_query($dbconfig,"select * from premium where email='$email'");
if(mysqli_num_rows($query) == 1){
    $row = $query->fetch_assoc();
    $name = $row['fullname'];
    $school = $row['school'];
    $state = $row['state'];
    $mobile = $row['mobile'];
}

$display = "";
$disable = "";
$sql = mysqli_query($dbconfig,"SELECT * FROM record where email = '$email'");
if(mysqli_num_rows($sql) >= 1){
    $display = "";
    $disable = "disabled";
//    $r = $sql->fetch_assoc();
//    $date = $r['date'];
//    $scoreMcq = $r['mcq'];
//    $scoreTheory = $r['theory'];
}else{
    $display = "display:none;";
}
$policy = mysqli_query($dbconfig,"select * from policy where name='pass'");
$p = $policy->fetch_assoc();
$passScore = $p['description'];
$home = mysqli_query($dbconfig,"select * from policy where name = 'home'");
$h = $home->fetch_assoc();
$detail = $h['description'];
$exam = mysqli_query($dbconfig,"select* from policy where name='exam'");
$e = $exam->fetch_assoc();
$rule = $e['description'];
$retake = mysqli_query($dbconfig,"select * from policy where name='retake'");
$r = $retake->fetch_assoc();
$rest = $r['description'];
$fullmarks = mysqli_query($dbconfig,"select * from policy where name='fullmarks'");
$f = $fullmarks->fetch_assoc();
$fm = $f['description'];

//full marks
$sql_marks = mysqli_query($dbconfig,"select * from record where email='$email'");
$res_sql = $sql_marks->fetch_assoc();
$date = $res_sql['date'];
$marks = $res_sql['mcq'];
$theory = $res_sql['theory'];
$grade = $res_sql['grade'];

$grade_marks = (int)$marks+(int)$theory;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <!-- required includes -->
    <script src="http://bootboxjs.com/bootbox.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>

    <!--For Mobile rendering-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Midp Test</title>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#btnTest').click(function() {
                bootbox.confirm({
                    title: "Confirmation!!",
                    message: "<?php echo $rule;?>",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Cancel'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Ok'
                        }
                    },
                    callback: function (result) {
                        if(result==true){
                            window.location.href='mcqPanel.php';
                        }
                    }
                });
            });
            $('#btnRetake').click(function() {
                bootbox.confirm({
                    title: "Confirmation!!",
                    message: "<?php echo $rest;?>",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Cancel'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Ok'
                        }
                    },
                    callback: function (result) {
                        if(result==true){
                            window.location.href='reset.php';
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
<div class="container">
    <div class="row centered-form">
        <div style="width: 100%;">
            <div style="padding: 30px" class="panel panel-default">
                <p>
                    <strong><h1 style="color: #326eaf">Welcome</h1></strong><h3 style="color: coral;"><?php echo $name;?></h3>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $school;?><small>   <?php echo $state;?></small></h4>
                                <h4><?php echo $email;?></h4>
                                <h4><?php echo $mobile;?></h4>
                            </div>
                        </div>
                    </div>
                    <div style="float: right;<?php echo $display?>">
                        <span style="font-size: 15px" class="label label-info">Exam taken on : <?php echo $date;?></span>
                        <span style="font-size: 15px" class="label label-success">Passing score: <?php echo $passScore;?>/<?php echo $fm;?></span>
                        <span style="font-size: 15px" class="label label-danger">Grade achieved: <?php if($grade!= ""){echo $grade;}else{echo "Waiting for admin";}?></span>
                        <br><br><a href="history.php" style="text-decoration: none"><button type="button" class="btn btn-primary" style="float: right">Check history</button></a>
                        <br><br><button id = "btnRetake" type="button" class="btn btn-warning" style="float: right">Retake <exam></exam></button>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>
    <hr>
    <ul style="text-align: justify">
        <li style="color: #326eaf"><?php echo $detail;?></li>
        <button <?php echo $disable;?> id="btnTest" name="btnDisable" class="btn btn-primary" style="float: right">Take test</button>
        <a href="invoice.php" style="text-decoration: none"><button id="btnr" name="btnr" class="btn btn-warning" style="float: right">Generate Payment Receipt</button></a>
    </ul>

    <hr>
    <ul style="margin-bottom: 100px" class="list-unstyled video-list-thumbs row">
        <?php
        $sql = mysqli_query($dbconfig,"select * from video");
        while($r = mysqli_fetch_array($sql)){
            $id = $r['id'];
            $l = $r['link'];
            $t = $r['title'];
            $d = $r['des'];
            echo '<li style="margin: 20px" class="col-lg-3 col-sm-6 col-xs-6">
            <iframe width="300" height="200" src="https://www.youtube.com/embed/'.$l.'" frameborder="0" allowfullscreen></iframe>
            <h4 style="color:darkcyan">'.$t.'</h4>
            <p style="color: #525252;">'.$d.'</p>
    <hr style="width: 300px">
        </li>';
        }
        ?>
    </ul>
</div>
</body>
</html>
<!--<video id="my-video" class="video-js" controls preload="auto" width="300" height="200"-->
<!--       poster="./assets/qu.jpg" data-setup="">-->
<!--    <source src="http://vjs.zencdn.net/v/oceans.mp4" type='video/mp4'>-->
<!--    <source src="http://vjs.zencdn.net/v/oceans.webm" type='video/webm'>-->
<!--    <p class="vjs-no-js">-->
<!--        To view this video please enable JavaScript, and consider upgrading to a web browser that-->
<!--        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>-->
<!--    </p>-->
<!--</video>-->
<!--<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>-->
<!--<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">-->
<!--<!-- If you'd like to support IE8 -->-->
<!--<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>-->
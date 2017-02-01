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

    <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <!--For Mobile rendering-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Midp Test</title>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#btnTest').click(function() {
                bootbox.confirm({
                    title: "Confirmation!!",
                    message: "Now you are proceeding to the exam panel. It can't be undone",
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
                            window.location.href='examPanel.php';
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
                <h1>Welcome</h1><h3 style="color: coral;"><?php echo $name;?></h3>
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
                    <div style="float: right;">
                        <span style="font-size: 15px" class="label label-info">Total marks: 100</span>
                        <span style="font-size: 15px" class="label label-info">Last exam: 20</span>
                        <br><br><button type="button" class="btn btn-warning" style="float: right">Check history</button>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>
    <hr>
    <ul>
        <li>Write something</li>
        <li>About the videos</li>
        <li>and instructions including exam.(Ex: time,how many bla bla)</li>
<!--        <a href="examPanel.php" style="text-decoration: none"><input type="button" class="btn btn-primary" style="float: right" value="Take test"></a>-->
        <button id="btnTest" class="btn btn-primary" style="float: right">Take test</button>
    </ul>

    <hr>
    <ul class="list-unstyled video-list-thumbs row">
        <?php
        echo '<li style="margin: 20px" class="col-lg-3 col-sm-6 col-xs-6">
            <video id="my-video" class="video-js" controls preload="auto" width="300" height="200"
                   poster="./assets/qu.jpg" data-setup="">
                <source src="http://vjs.zencdn.net/v/oceans.mp4" type=\'video/mp4\'>
                <source src="http://vjs.zencdn.net/v/oceans.webm" type=\'video/webm\'>
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>
            <h4 style="color:darkcyan">Hello</h4>
            <p style="color: #525252;"> This is our description example</p>
    <hr style="width: 300px">
        </li>';
        ?>

    </ul>
    <script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
</div>
</body>
</html>

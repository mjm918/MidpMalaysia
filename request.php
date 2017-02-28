<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 27/02/2017
 * Time: 12:47
 */
include "DBHandler/config.php";
$email = $_GET['email'];
if(empty($email)){
    header('location:index.php');
}
$display = "";
$check = mysqli_query($dbconfig,"select * from chat where who='$email' or receive='$email'");

$fromAdmin = mysqli_query($dbconfig,"select * from chat where who='admin' and receive='$email' ORDER BY date ASC ");
$fromUser = mysqli_query($dbconfig,"select * from chat where who='$email' and receive='admin' ORDER BY date ASC ");

if(mysqli_num_rows($check) == 0){
    $display = "display:none";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        var query = window.location.search.substring(1)

        if(query.length) {
            if(window.history != undefined && window.history.pushState != undefined) {
                window.history.pushState({}, document.title, window.location.pathname);
            }
        }
    </script>
    <title>Midp Test</title>
</head>
<body>
<?php include "header.php";?>
<div class="container">
    <img src="assets/correct.png" style="display:block;margin:auto;" width="300" height="300">
    <h3 style="color: coral;text-align: center">Your request has been sent and waiting for admin to approve.<br>Please have patience. Thank you</h3>
    <br><br><div style="<?php echo $display;?>">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-comment"></span> Chat
                        <hr>
                        <div class="panel-body">
                            <ul class="chat">
                                <?php
                                    while ($from = mysqli_fetch_array($fromAdmin)){
                                        echo '<li style="list-style: none" class="left clearfix">
                                    <small style="color: coral;float: right">'.$from['date'].'</small>
                                    <span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=A" alt="User Avatar" class="img-circle" />
                        </span>
                                    <div class="chat-body clearfix">
                                        <p>
                                          '.$from['message'].'
                                        </p>
                                    </div>
                                </li>';
                                    }
                                ?>
                                <hr>
                                <?php
                                    while ($to = mysqli_fetch_array($fromUser)){
                                        echo '<li style="list-style: none" class="right clearfix">
                                    <small style="color: coral">'.$to['date'].'</small>
                                    <span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=Y" alt="User Avatar" class="img-circle" />
                        </span>
                                    <div class="chat-body clearfix">
                                        <p style="float: right">
                                            '.$to['message'].'
                                        </p>
                                    </div>
                                </li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><p style="color: #525252">You can contact to admin. Send a message to admin</p>
    <form style="margin-bottom: 150px" action="DBHandler/send.php" method="post">
        <input id="email" name="email" hidden type="text" value="<?php echo $email;?>">
        <textarea placeholder="Write your message here" style="resize: none;height: 200px" class="form-control" rows="5" id="msg" name="msg"></textarea>
        <br><input style="float:right" type="submit" class="btn btn-primary" name="submit" id="submit" value="Send"/>
    </form>
</body>
<?php include "footer.php";?>
</html>

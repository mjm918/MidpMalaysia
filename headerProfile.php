<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 29/01/2017
 * Time: 11:07
 */
if (strpos($_SERVER['REQUEST_URI'], 'mcqPanel') !== false) {
    $hide = "none";
}else if(strpos($_SERVER['REQUEST_URI'], 'home') !== false){
    $hide = "none";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">

    </script>

</head>
<body>
<nav style="background-color: #161719" class="navbar navbar-inverse">
    <div class="container-fluid">
        <div id="header" class="navbar-header">
            <div class="headerProfile-font">
                <img src="assets/midp.png" width="40px" height="50px" alt="">
                    Midp Test Panel
            </div>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li style="display:<?php echo $hide;?>"><a href="home.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
            <li><a href="./DBHandler/logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
        </ul>
    </div>
</nav>
</body>
</html>

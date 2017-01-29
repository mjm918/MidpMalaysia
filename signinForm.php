<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 28/01/17
 * Time: 3:19 PM
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div style="margin-top:100px" class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Please login first</h1>
                </div>
                <div class="panel-body">
                    <form role="form" action="DBHandler/signin.php" method="POST">
                        <div class="form-group">
                            <input type="email" pattern=".{3,40}" required title="3 to 40 characters" name="in_lemail" id="in_lemail" class="form-control" required="required" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <input type="password" pattern=".{3,20}" required title="3 to 20 characters" name="in_lpass" id="in_lpass" class="form-control" required="required" placeholder="Password">
                        </div>
                        <input style="background-color: #326eaf" name="submit" type="submit" value="Login" class="btn btn-info btn-block">
                        <hr>
                        <a style="text-decoration:none" href="signup.php"><input style="background-color: coral;border-color:coral" name="goReg" value="Not an user yet ? Register here" class="btn btn-info btn-block"></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

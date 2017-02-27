<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 27/01/17
 * Time: 6:19 PM
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
<div style="margin-top: auto" class="container">
    <div class="row">
        <nav class="col-sm-3">
            <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
                <li class="active"><a href="#register">Register</a></li>
                <li><a href="#payment">Complete payment</a></li>
                <li><a href="#done">Done!</a></li>
                <hr>
                <a href="index.php" style="text-decoration: none"><input type="button" style="background-color: coral;width: 100%" class="btn btn-warning" value="Login here!"></a>
            </ul>
        </nav>
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Do not leave any section blank</h1>
                </div>
                <div class="panel-body">
                    <form role="form" action="DBHandler/signup.php" method="POST">
                        <div class="form-group">
                            <input type="text" pattern=".{3,40}" required title="3 to 40 characters" name="in_name" id="in_name" class="form-control" required="required" placeholder=" Full Name as Stated On Identification Card">
                        </div>
                        <div class="form-group">
                            <input type="text" pattern=".{3,20}" required title="3 to 20 characters" name="in_ic" id="in_ic" class="form-control" required="required" placeholder="Identification Card Number">
                        </div>
                        <div class="form-group">
                            <input type="text" name="in_mobile" id="in_mobile" maxlength="14" data-fv-numeric="true" data-fv-numeric-message="Please enter valid phone numbers" data-fv-phone-country11="IN" required="required" data-fv-notempty-message="This field cannot be left blank." placeholder="Mobile No. " class="form-control" name="data[User][mobile]" data-fv-field="data[User][mobile]">
                        </div>
                        <div class="form-group">
                            <input type="text" name="in_email" id="in_email" class="form-control" required="required" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="password" pattern=".{6,20}" required title="6 to 20 characters" id="in_password" name="in_password" class="form-control" required="required" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" id="in_re_pass" name="in_re_pass" class="form-control" required="required" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <input type="text" pattern=".{4,20}" required title="4 to 20 characters" id="in_state" name="in_state" class="form-control" required="required" placeholder="State">
                        </div>
                        <div class="form-group">
                            <input type="text" pattern=".{5,50}" required title="5 to 20 characters" id="in_school" name="in_school" class="form-control" required="required" placeholder="School">
                        </div>
                        <div class="form-group">
                            <input style="background-color: #326eaf;margin-bottom: 40px" name="submit" type="submit" value="Register" class="btn btn-info btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>

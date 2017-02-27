<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 28/01/17
 * Time: 10:04 AM
 */
include ('DBHandler/config.php');
session_start();
$email = $_GET['email'];
//if($email == ""){
//    header('location:index.php');
//}
$_SESSION['email'] = $email;

$validate = mysqli_query($dbconfig,"select * from bank where email = '$email'");
$v = $validate->fetch_assoc();
$confirm = $v['validate'];

if($confirm == "0"){
    header('location:request.php?email='.$email);
}

$query = mysqli_query($dbconfig,"select * from policy where name = 'policy'");
if(mysqli_num_rows($query)>0){
    $row = $query->fetch_assoc();
    $policy = $row['description'];
}
$button = "Check";
$check_re = "";
if(isset($_POST['submit'])){
    $n = $_POST['email'];
    $name = $_POST['bank_name'];
    $receipt = $_POST['bank_receipt'];

    $check = mysqli_query($dbconfig,"select * from bank where name='$name' and num='$receipt'");
    if(mysqli_num_rows($check)> 0){
        $update = mysqli_query($dbconfig,"update premium set status_p='1' where email = '$n'");
        if($update){
            echo '<script>alert("Congratulations! Record found. Redirecting to home page");
                      window.location.href="home.php";
              </script>';
        }else{
            $check_re = "Something went wrong. Please try again. Thank you";
        }
    }else{
        $req = mysqli_query($dbconfig,"insert into bank (id,name,num,email,validate) VALUES (NULL,'$name','$receipt','$n','0')");
        if($req){
            $check_re="No record found but a request has been sent to the admin. Please wait until the admin verifies. Thank you";
        }
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/midp.ico" rel="shortcut icon" type="image/x-icon" />
    <title>Midp Test</title>

    <script type="text/javascript">
        var query = window.location.search.substring(1)

        if(query.length) {
            if(window.history != undefined && window.history.pushState != undefined) {
                window.history.pushState({}, document.title, window.location.pathname);
            }
        }
    </script>

</head>
<?php include "header.php";?>
<body>
<div style="margin-top: auto" class="container">
    <div class="row">
        <nav class="col-sm-3">
            <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
                <li><a href="#register">Register</a></li>
                <li class="active"><a href="#payment">Complete payment</a></li>
                <li><a href="#done">Done!</a></li>
            </ul>
        </nav>
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <p style="text-align: justify;margin:20px;color:dimgray">
                    <?php echo $policy;?>
                    </p>
                </div>
                <h2 style="color: #326eaf">Bank name & receipt</h2>
                <form action="payment.php" method="post">
                    <div class="form-group">
                        <input type="email" pattern=".{8,40}" required title="3 to 40 characters" name="email" id="email" class="form-control" required="required" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <input type="text" pattern=".{3,40}" required title="3 to 40 characters" name="bank_name" id="bank_name" class="form-control" required="required" placeholder="Name of Bank">
                    </div>
                    <div class="form-group">
                        <input type="text" pattern=".{3,40}" required title="3 to 40 characters" name="bank_receipt" id="bank_receipt" class="form-control" required="required" placeholder="Receipt Number">
                    </div>
                    <p style="color: coral"><?php echo $check_re;?></p>
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="<?php echo $button;?>"/>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php include "footer.php";?>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 27/02/2017
 * Time: 12:47
 */
$email = $_GET['email'];
echo $email;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

</div>
</body>
<?php include "footer.php";?>
</html>

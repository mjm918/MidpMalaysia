<?php
include ('./DBHandler/config.php');
session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!--For Mobile rendering-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Midp Test</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

    <script type="text/javascript">

        var query = window.location.search.substring(1)

        if(query.length) {
            if(window.history != undefined && window.history.pushState != undefined) {
                window.history.pushState({}, document.title, window.location.pathname);
            }
        }

        $(document).ready(function() {

            $("#pdf").click(function() {
                var pdf = new jsPDF('p', 'pt', 'letter');
                source = $('#printPdf')[0];

                specialElementHandlers = {
                    // element with id of "bypass" - jQuery style selector
                    '#bypassme' : function(element, renderer) {
                        // true = "handled elsewhere, bypass text extraction"
                        return true
                    }
                };
                margins = {
                    top : 80,
                    bottom : 60,
                    left : 60,
                    width : 522
                };
                pdf.fromHTML(source, // HTML string or DOM elem ref.
                    margins.left, // x coord
                    margins.top, { // y coord
                        'width' : margins.width, // max width of content on PDF
                        'elementHandlers' : specialElementHandlers
                    },

                    function(dispose) {
                        // dispose: object with X, Y of the last line add to the PDF
                        //          this allow the insertion of new lines after html
                        pdf.save('invoice.pdf');
                    }, margins);
            });

        });
    </script>

</head>
<?php include "headerProfile.php";?>
<body>
<div id="printPdf" class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2 style="color: #326eaf">Invoice</h2><h3 style="color: #326eaf" class="pull-right">Midp Test</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Billed To:</strong><br>
                        <?php
                        $email = $_SESSION['email'];
                        $query = mysqli_query($dbconfig,"select * from premium where email='$email'");
                        while ($row = mysqli_fetch_array($query)){
                            $name = $row['fullname'];
                            $ic = $row['ic'];
                            $mobile  = $row['mobile'];
                            $state = $row['state'];
                            $school  = $row['school'];
                            $status  = $row['status_p'];

                            if($status == "1"){
                                $premium = "PREMIUM";
                            }
                            echo '<div style="color: #326eaf"><h4>'.$name.'</h4>
                        <h4>'.$ic.'</h4>
                        <h4>'.$mobile.'</h4>
                        <h4>'.$school.'</h4></div>';
                        }
                        ?>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <?php echo $email; ?>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        <?php echo date("Y.m.d") ; ?><br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table style="width: 100%" class="table table-condensed">
                            <thead>
                            <tr>
                                <td><strong>Order for</strong></td>
                                <td class="text-right" style="float: right"><strong>Price (in MYR) including all charges</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <tr>
                                <td>Test fee</td>
                                <td class="text-right">MYR 122.00 (One Hundred and Twenty Two ringgit only)</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="button" value="Print" id="pdf" class="btn btn-danger">
    <a href="home.php" style="text-decoration: none"><input type="button" value="Go to panel" class="btn btn-primary"></a>
</div>
</body>
<?php include "footer.php";?>
</html>
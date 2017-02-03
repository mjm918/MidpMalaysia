<?php
require_once ('config.php');
$limit = 1;
if(isset($_GET["notify"])){
    $success = $_GET["notify"];
    if($success == "success"){
        $disable = "pointer-events: none; opacity: 0.6";
    }
}else{
    $disable ="";
}
if (isset($_GET["page"] ))
{
    $page  = $_GET["page"];
}
else
{
    $page=1;
}

$record_index= ($page-1) * $limit;

$sql = "SELECT * FROM mcq LIMIT $record_index, $limit";

$retval = mysqli_query($dbconfig, $sql);


if (mysqli_num_rows($retval) > 0) {

    while($row = mysqli_fetch_assoc($retval)) {

        echo '<link rel="stylesheet" href="css/style.css">
    <!-- required includes -->
    <script src="http://bootboxjs.com/bootbox.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
    <!--For Mobile rendering-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">';




       echo '<div style="text-align: center">';
       echo '<h2 style="color: dimgray">'.$row['question'].'</h2>';
       echo '<form action="testSubmission.php" method="POST">

        <input style="color: dimgray;display: none" name="question" id="question" value="'.$row['question'].'"/>
        
        <input  type="radio" name="rb_ans" value="'.$row['q_a'].'" /> '.$row['q_a'].'

        <br><input type="radio" name="rb_ans" value="'.$row['q_b'].'" /> '.$row['q_b'].'
    
        <br><input type="radio" name="rb_ans" value="'.$row['q_c'].'" /> '.$row['q_c'].'

        <br><input type="radio" name="rb_ans" value="'.$row['q_d'].'" /> '.$row['q_d'].'
        
        <br><br><input type="submit" class="btn btn-danger" name="submit" id="submit" value="Submit"/>
        
     </form>';
        echo '</div>';
    }
}
else {
    echo "0 results";
}
echo "</tbody>";
echo "</table>";


$sql = "SELECT COUNT(*) FROM mcq";
$retval1 = mysqli_query($dbconfig, $sql);
$row = mysqli_fetch_row($retval1);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);

echo "<ul style='float: right' class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    echo "<li><a href='test.php?page=".$i."'>".$i."</a></li>";
};

echo "<li  style='$disable'><a href='test.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
mysqli_close($dbconfig);
?>


<?php
require_once ('config.php');
$limit = 1;

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

        echo '<td>';

        echo '<tr>'. $row['id'] . '</tr><br>';
        echo '<tr>'. $row['question'] . '</tr><br>';
        echo '<tr>'. $row['q_a'] . '</tr><br>';
        echo '<tr>'. $row['q_b'] . '</tr><br>';
        echo '<tr>'. $row['q_c'] . '</tr><br>';
        echo '<td>';
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

echo "<ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    echo "<li><a href='test.php?page=".$i."'>".$i."</a></li>";
};

echo "<li><a href='test.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
//echo $pagLink . "</div>";
mysqli_close($dbconfig);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>

    <script type="text/javascript">
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            var phpRes = <?php echo json_encode($total_records); ?>;
            var minutes = 60 *phpRes,
                display = document.querySelector('#time');
            startTimer(minutes, display);
        };
    </script>
</head>
<body>
<div class="service-container" data-service="<?php echo $total_records; ?>">
<div>Exam finishes in <span id="time"></span> minutes!</div>
</body>
</html>
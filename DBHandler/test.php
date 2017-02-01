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

       echo '<div style="text-align: center">';
       echo '<b>'.$row['question'].'</b>';
       echo '<form>
       <input type="radio" name="portion_num" value="a" />'.$row['q_a'].'

        <br><input type="radio" name="portion_num" value="b" />'.$row['q_b'].'

        <br><input type="radio" name="portion_num" value="c" /> '.$row['q_c'].'

        <br><input type="radio" name="portion_num" value="d" /> '.$row['q_d'].'
        
        <br><input type="submit" name="submit" id="submit" value="Submit"/>
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

echo "<ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    echo "<li><a href='test.php?page=".$i."'>".$i."</a></li>";
};

echo "<li><a href='test.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
mysqli_close($dbconfig);
?>


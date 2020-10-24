<?php

include 'dbhandler.php';

$id = $_GET['id'];
$sqlAvg = "SELECT AVG(rating_num) AS AVGRATE FROM reviews WHERE item_id='$id' ORDER BY rev_date DESC";
$sqlCount = "SELECT COUNT(rating_num) AS TOTAL FROM reviews WHERE item_id='$id'";

$query = mysqli_query($conn, $sqlAvg);
$row = mysqli_fetch_array($query);
$query2 = mysqli_query($conn, $sqlCount);
$row2 = mysqli_fetch_array($query2);

$avg = round($row['AVGRATE'], 1);

?>
    <div class="container">
        <div class="container"><?php echo stars($avg) ?></div>
        <p style="margin: 1rem; font-size: 80%">number of ratings: <?php echo $row2['TOTAL'] ?></p>
    </div>
<?php

function stars($av)
{
    if ($av == 0) {
        return str_repeat('<em class="fa fa-star fa-3x" style="color: var(--med-gray)"></em>', 5);
    }

    $s = str_repeat('<em class="fa fa-star fa-3x" style="color: var(--gold)"></em>', $av);
    if (($av - floor($av)) > 0.4) {
        $s .= '<em class="fas fa-star-half fa-3x" style="color: var(--gold)"></em>';
    }
    return $s;
}
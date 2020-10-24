<?php
date_default_timezone_set('UTC');

if (!isset($_POST['review-submit'])) {
    header("Location: ../gallery.php?error=DidNotSubmitReview");
    exit();
}

require 'dbhandler.php';
session_start();

$uname = 'Anonymous';
if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
}

$title = $_POST['review-title'];
$date = date('Y-m-d H:i:s');
$review = $_POST['review'];
$item_id = $_POST['item_id'];
$rating = $_POST['rating'];

echo 'working so far';
echo $uname;

# Mike says to do a sql injection check but doesn't feel like it

$sql = "INSERT INTO reviews (item_id, uname, title, review_text, rev_date, rating_num) VALUES ('$item_id', '$uname', '$title', '$review', '$date', '$rating')";
$stmt = mysqli_stmt_init($conn);
$result = $conn->query($sql);
header("Location: ../review.php?id=$item_id&upload=success");
exit();

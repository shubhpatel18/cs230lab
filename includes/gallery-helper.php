<?php
session_start();

define('KB', 1024);
define('MB', 1048576);

if (!isset($_POST['gallery-submit'])) {
    header("Location: ../profile.php?error=NotUploadingGalleryImage");
    exit();
}

require 'dbhandler.php';

$uname = $_SESSION['uname'];

$file = $_FILES['gallery-image'];
$file_name = $file['name'];
$file_tmp_name = $file['tmp_name'];
$file_error = $file['error'];
$file_size = $file['size'];

$descript = $_POST['descript'];
$title = $_POST['title'];

$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
$allowed = array('jpg', 'jpeg', 'png', 'svg');

if($file_error !== 0) {
    header("Location: ../admin.php?error=UploadError");
    exit();
}

if(!in_array($ext, $allowed)) {
    header("Location: ../admin.php?error=InvalidImageType");
    exit();
}

if($file_size > 12*MB) {
    header("Location: ../admin.php?error=FileSizeExceeded");
    exit();
}

$new_name = uniqid('', true).".".$ext;
$destination = '../services/'.$new_name;

$sql = "INSERT INTO services (title, descript, picpath) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../home.php?error=SQLInjection");
    exit();
}

mysqli_stmt_bind_param($stmt, "sss", $title, $descript, $new_name);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

move_uploaded_file($file_tmp_name, $destination);

header("Location: ../admin.php?upload=success");
exit();

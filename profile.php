<!DOCTYPE html>
<html lang="en">
<head><title>Profile</title></head>
</html>

<?php
session_start();
?>

<main>
    <?php
    if (isset($_SESSION['uname'])) {
        include 'html/profile.html';
    } else {
        header("Location: ../login.php?error=NotLoggedIn");
        exit();
    }
    ?>
</main>

<?php
require 'includes/header.php';
?>

<?php
require 'includes/footer.php';
?>

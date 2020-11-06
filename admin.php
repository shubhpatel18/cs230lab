<!DOCTYPE html>
<html lang="en">
<head><title>Admin</title></head>
</html>

<?php
session_start();

if (!isset($_SESSION['uname'])) {
    header("Location: ../login.php?error=NotLoggedIn");
    exit();
}

if ($_SESSION['uname'] !== 'shubhpatel18') {
    header("Location: ../login.php?error=NonAdminUser");
    exit();
}

require 'includes/header.php';
require 'includes/footer.php';
require 'includes/dbhandler.php';
?>

<link rel="stylesheet" href="css/admin.css">
<script src="js/upload-display.js"></script>

<main>
    <div class="container">
        <div class="col-sm-4 offset-sm-4" style="padding: 0 2rem; margin-top: .8rem">
            <form class="rounded"
                  action="includes/gallery-helper.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <img class="mb-3 rounded" src="images/defaults/gallery_default.jpg"
                         onclick="triggered()" alt="" id="gallery-display">
                    <input type="file" name="gallery-image" id="gallery-image" onchange="preview(this)"
                           class="form-control" style="display: none">
                    <input type="text" name="title" id="title" class="form-control"
                           placeholder="Title" style="text-align: center" required>
                </div>
                <div class="form-group">
                        <textarea class="form-control rounded" name="descript" id="descript" rows="3"
                                  placeholder="Description..." style="text-align: center;" required
                        ></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="gallery-submit" class="btn btn-lg btn-primary btn-block">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

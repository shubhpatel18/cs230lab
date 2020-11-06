<!DOCTYPE html>
<html lang="en">
<head><title>s3 Upload</title></head>
</html>

<?php
session_start();

require 'includes/header.php';
require 'includes/footer.php';
?>

<link rel="stylesheet" href="css/s3-frontend.css">
<script src="js/s3-display.js"></script>

<main>
    <div class="container">
        <div class="col-sm-4 offset-sm-4" style="padding: 0 2rem; margin-top: .8rem">
            <form class="rounded" action="includes/s3-upload-helper.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <img class="mb-3 rounded" src="images/defaults/gallery_default.jpg"
                         onclick="triggered()" alt="" id="s3-display">
                    <h4>S3 Upload</h4>
                    <input type="file" name="s3-image" id="s3-image" onchange="preview(this)"
                           class="form-control" style="display: none">
                </div>
                <div class="form-group">
                    <button type="submit" name="s3-submit" class="btn btn-lg btn-primary btn-block">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

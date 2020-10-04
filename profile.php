<!DOCTYPE html>
<html lang="en">
<head><title>Profile</title></head>
</html>

<?php
session_start();

if (!isset($_SESSION['uname'])) {
    header("Location: ../login.php?error=NotLoggedIn");
    exit();
}

require 'includes/header.php';
require 'includes/footer.php';
require 'includes/dbhandler.php';
?>

<main>
    <link rel="stylesheet" href="css/profile.css">

    <script>
        function triggered() {
            document.querySelector("#prof-image").click();
        }

        function preview(e) {
            if (e.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    document.querySelector('#prof-display').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);

            }
        }
    </script>

    <div class="h-100 center-me text-center">
        <div class="my-auto">
            <form class="rounded" style="background: var(--brown);"
                  action="includes/upload-helper.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <img src="" onclick="triggered()" id="prof-display" alt="">
                    <label for="prof-image" id="uname-style">Dummy Text</label>
                    <input type="file" name="prof-image" id="prof-image"
                           onchange="preview(this)" class="form-control" style="display: none">
                </div>
                <div class="form-group">
                <textarea name="bio" id="bio" cols="30" rows="10" placeholder="Bio..."
                          style="text-align: center"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="prof-submit" class="btn btn-outline-success btn-lg btn-block">
                        Upload
                    </button>
                </div>
            </form>
        </div>

</main>

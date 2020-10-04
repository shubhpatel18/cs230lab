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

$prof_user = $_SESSION['uname'];
$sqlpro = "SELECT * FROM profile WHERE uname='$prof_user';";

$res = mysqli_query($conn, $sqlpro);
$row = mysqli_fetch_array($res);
$photo = $row['picpath'];
$bio = $row['bio'];
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

    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-sm-4 my-auto" style="padding-left: 2rem; padding-right: 2rem">
                <form class="rounded" style="background: var(--brown); height: 25rem;"
                      action="includes/upload-helper.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <img class="mb-3 rounded-circle" src="<?php echo $photo ?>"
                             onclick="triggered()" alt="uploads/generic.jpg" id="prof-display">
                        <h4><?php echo $prof_user; ?></h4>
                        <input type="file" name="prof-image" id="prof-image"
                               onchange="preview(this)" class="form-control" style="display: none">
                    </div>
                    <div class="form-group">
                    <textarea class="rounded" name="bio" id="bio" rows="4"
                              placeholder="Bio..." style="text-align: center; width:100%"><?php
                        if ($bio !== null) {
                            echo $bio;
                        }
                        ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="prof-submit" class="btn btn-lg btn-primary btn-block">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

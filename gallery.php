<!DOCTYPE html>
<html lang="en">
<head><title>Gallery</title></head>
</html>

<?php
session_start();

require 'includes/header.php';
require 'includes/footer.php';
require 'includes/dbhandler.php';

?>

<link rel="stylesheet" href="css/gallery.css">

<main>
    <h1>Check out our work!</h1>
    <div class="gallery-container">
        <?php
        require_once 'includes/dbhandler.php';
        $sql = "SELECT * FROM services ORDER BY upload_date DESC";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Failure";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="card">
                    <a href="review.php?id=<?php echo $row['pid'] ?>">
                        <img src="services/<?= $row['picpath']; ?>" class="rounded" alt="">
                        <h4><?= $row['title'] ?></h4>
                        <p><?= $row['descript'] ?></p>
                    </a>
                </div>
                <?php
            }
        }
        ?>
    </div>
</main>

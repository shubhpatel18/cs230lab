<?php

require 'includes/dbhandler.php';

$item_id = $_GET['id'];
$sql = "SELECT * FROM reviews WHERE item_id='$item_id' ORDER BY `reviews`.`rev_date`DESC LIMIT 4";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $uname = $row['uname'];
        $rating = $row['rating_num'];
        $prof_sql = "SELECT picpath FROM profile WHERE uname='$uname';";
        $res = mysqli_query($conn, $prof_sql);
        $picpath = mysqli_fetch_assoc($res);
        if ($picpath == null) {
            $picpath = 'images/defaults/profile_default.jpg';
        } else {
            $picpath = $picpath['picpath'];
        }
        ?>
        <div class="review rounded">
            <div class="media">
                <div>
                    <img class="rounded-circle prof-img" src="<?= $picpath ?>" alt="">
                    <p class="font-weight-normal"><?php echo $uname ?></p>
                </div>
                <div class="media-body" style="margin-left: 1rem;">
                    <h6>
                        <?php
                        echo $row['title'] . ' ';
                        $star = '<em class="fa fa-star fa-1x star-rev" style="color: var(--gold)"></em>';
                        $dark_star = '<em class="fa fa-star fa-1x star-rev" style="color: var(--med-gray)"></em>';
                        echo str_repeat($star, $rating);
                        echo str_repeat($dark_star, 5 - $rating);
                        ?>
                    </h6>
                    <p style="margin: 0;"><?= $row['review_text']; ?></p>
                    <p class="timestamp"><?= $row['rev_date'] ?></p>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <h6 style="margin: 1rem">No other reviews yet. Be the first!</h6>
    <?php
}

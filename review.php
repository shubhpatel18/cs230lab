<!DOCTYPE html>
<html lang="en">
<head><title>Review</title></head>
</html>

<?php
require 'includes/header.php';
require 'includes/footer.php';
require 'includes/dbhandler.php';

$item_id = $_GET['id'];
$sql = "SELECT * FROM services WHERE pid='$item_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<link rel="stylesheet" href="css/review.css">

<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <span class="mx-auto" id="testAvg"></span>
                <img id="review-display" src="services/<?= $row['picpath']; ?>" class="rounded mx-auto" alt="">
                <h4><?= $row['title'] ?></h4>
                <p><?= $row['descript'] ?></p>
                <form class="rounded" id="review-form" action="includes/review-helper.php" method="POST">
                    <div class="container" id="star-select">
                        <em class="fa fa-star fa-2x star-rev" data-index="1"></em>
                        <em class="fa fa-star fa-2x star-rev" data-index="2"></em>
                        <em class="fa fa-star fa-2x star-rev" data-index="3"></em>
                        <em class="fa fa-star fa-2x star-rev" data-index="4"></em>
                        <em class="fa fa-star fa-2x star-rev" data-index="5"></em>
                    </div>
                    <div class="form-group">
                        <h4 class="h4 mb-2 font-weight-normal" id="review-title">Leave a review!</h4>
                        <input class="form-control rounded" type="text" name="review-title" id="review-title"
                               style="text-align: center;" placeholder="Title">
                        <textarea class="form-control rounded" id="review-text" name="review"
                                  rows="3" placeholder="Tell us what you think!"></textarea>
                        <input type="hidden" name="rating" id="rating">
                        <input type="hidden" name="item_id" value="<?= $_GET['id']; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="review-submit" id="review-submit"
                                class="btn btn-lg btn-primary btn-block">
                            Upload
                        </button>
                    </div>
                </form>
                <span id="review_list"></span>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">

    let rateIndex = -1;
    let id = <?= $_GET['id'] ?>;

    $(document).ready(function () {
        let $star_rev = $('.star-rev');
        reset_star();

        //avg();
        xhr_getter('includes/get-ratings.php?id=', "testAvg");

        // get reviews
        xhr_getter('display-reviews.php?id=', "review_list");

        if (localStorage.getItem('rating') != null) {
            setStars(parseInt(localStorage.getItem('rating')));
        }

        $star_rev.on('click', function () {
            rateIndex = parseInt($(this).data('index'));
            localStorage.setItem('rating', rateIndex);
        });

        $star_rev.mouseover(function () {
            reset_star();
            let currIndex = parseInt($(this).data('index'));
            setStars(currIndex);

        });

        $star_rev.mouseleave(function () {
            reset_star();

            if (rateIndex !== -1) {
                setStars(rateIndex);
            }
        });

        function reset_star() {
            $star_rev.css('color', 'var(--med-gray)');
        }

        function setStars(max) {
            for (let i = 0; i < max; i++) {
                $('.star-rev:eq(' + i + ')').css('color', 'var(--gold)');
            }
            document.getElementById('rating').value = parseInt(localStorage.getItem('rating'));
            console.log("id: " + id);
        }

        // Used to interchangeably send GET requests for review display data.

        function xhr_getter(prefix, element) {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {

                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById(element).innerHTML = this.responseText;
                }

            };

            let url = prefix + id;
            xhttp.open("GET", url, true);
            xhttp.send();
        }

    });
</script>
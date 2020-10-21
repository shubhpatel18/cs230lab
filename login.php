<!DOCTYPE html>
<html lang="en">
<head><title>Login</title></head>
</html>

<?php
require 'includes/header.php';
require 'includes/footer.php';
?>

<link rel="stylesheet" href="css/background-image.css">
<link rel="stylesheet" href="css/login.css">

<main>
    <div class="container">
        <h1>Login to enjoy these great perks!</h1>
    </div>

    <div class="container">
        <div class="row" style="margin-bottom: 2rem;">

            <div class="col-sm-8">
                <div id="carouselExampleIndicators" class="carousel slide"
                     data-ride="carousel" style="box-shadow: #44444499 0 0 .25rem;">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="images/login/carousel/personal_gnomes.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Get personalized lawn decorations!</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/login/carousel/customer_service.jpg" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Get access to excellent customer service!</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/login/carousel/discount.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Get exclusive discounts!</h5>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-sm-4">
                <form class="rounded" style="height: 25rem"
                      action="includes/login-helper.php" method="post">
                    <div class="form-group">
                        <img class="mb-3 rounded-circle" src="images/login/gnome.jpg" alt=""
                             style="width: 7rem; height: 7rem"/>
                        <h4 class="h4 mb-2 font-weight-normal">Please sign in</h4>
                    </div>
                    <div class="form-group">
                        <label for="input_uname_email" class="sr-only">Username or Email address</label>
                        <input type="text" id="input_uname_email" class="form-control"
                               name="uname_email" placeholder="Username/Email address" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control"
                               name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit"
                                name="login-submit">Sign in
                        </button>
                        <p class="text-muted">&copy; 2020</p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</main>

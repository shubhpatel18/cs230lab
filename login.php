<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<?php
require "includes/header.php"
?>

<body>

<div style="position: relative">
    <div class="container">
        <h1>Login to enjoy these great perks!</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="images/login/carousel/discount.jpg"
                                 style="height: 25rem;" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Get exclusive discounts!</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/login/carousel/customer_service.jpg"
                                 alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Get access to excellent customer service!</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/login/carousel/personal_gnomes.jpg"
                                 alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Get personalized lawn decorations!</h5>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="my-auto">
                    <form class="form-signin rounded" style="background: var(--brown)">
                        <img class="mb-3 rounded-circle" src="images/login/gnome.jpg" alt=""
                             style="width: 7.5vw; height: 7.5vw"/>
                        <h4 class="h4 mb-2 font-weight-normal">Please sign in</h4>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <div class="checkbox mb-3">
                            <label><input type="checkbox" value="remember-me"> Remember me</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        <p class="text-muted">&copy; 2020</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<?php
require "includes/footer.php"
?>

</html>

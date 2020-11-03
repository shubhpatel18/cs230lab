<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0809ee8fa6.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- icons -->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<header>
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top"
         style="background: var(--green); box-shadow: 0 .5vh 1vh #44444499">
        <div class="container">
            <a class="navbar-brand logo" href="../index.php" style="font-size: 1.5rem">
                Garden Gurus
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                Menu
                <em class="fas fa-bars ml-1"></em>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../gallery.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.php">Our Team</a>
                    </li>
                </ul>
                <ul class="navbar-nav text-uppercase ml-auto">
                    <?php
                    if (!isset($_SESSION['uname'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../signup.php">Sign Up</a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../includes/logout.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../profile.php">Profile</a>
                        </li>
                        <?php
                        if ($_SESSION['uname'] == 'shubhpatel18') {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin.php">Admin</a>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
</html>

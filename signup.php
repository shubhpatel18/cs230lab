<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
</head>
</html>

<?php
require 'includes/header.php';
require 'includes/footer.php';
?>

<main>
    <link rel="stylesheet" href="css/footer-shadow.css">
    <link rel="stylesheet" href="css/signup.css">
    <div class="container">
        <div class="col-sm-6 offset-sm-3 my-auto">
            <form class="rounded" style="margin-bottom: 2rem"
                  action="includes/signup-helper.php" method="post">
                <img class="mb-3 rounded-circle" src="images/login/gnome.jpg" alt=""
                     style="width: 7rem; height: 7rem"/>
                <h4 class="h4 mb-2 font-weight-normal">Register</h4>
                <h6 class="h4 mb-2 font-weight-normal" style="font-size: 1rem">
                    Create your Garden Gurus account.</h6>
                <div class="row form-group">
                    <div class="col-sm">
                        <label for="inputFirstName" class="sr-only">First Name</label>
                        <input type="text" class="form-control" required
                               id="inputFirstName" name="fname" placeholder="First Name">
                    </div>
                    <div class="col-sm">
                        <label for="inputLastName" class="sr-only">Last Name</label>
                        <input type="text" class="form-control" required
                               id="inputLastName" name="lname" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUsername" class="sr-only">Username</label>
                    <input type="text" class="form-control" required
                           id="inputUsername" name="uname" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" class="form-control" required
                           id="inputEmail" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" class="form-control" required
                           id="inputPassword" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
                    <input type="password" class="form-control" required
                           id="inputConfirmPassword" name="confirm_password" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit"
                            style="margin-top: 2rem" name="signup-submit">Register
                    </button>
                    <div class="text-muted">Already have an account?
                        <a href="login.php" id="sign-in-link">Sign in</a></div>
                </div>
            </form>
        </div>
    </div>

</main>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
</head>

<?php
require "includes/header.php"
?>

<body>
<div style="position: relative">
    <div class="container">
        <div class="row" style="padding-top: 6rem">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="my-auto">
                    <form class="form-signin rounded" style="background: var(--brown)">
                        <img class="mb-3 rounded-circle" src="images/login/gnome.jpg" alt=""
                             style="width: 7.5vw; height: 7.5vw"/>
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
                            <div class="text-muted">Already have an account? <a href="login.html">Sign in</a></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </div>
</div>
</body>

<?php
require "includes/footer.php"
?>

</html>

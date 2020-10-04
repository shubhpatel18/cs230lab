<?php

if (isset($_POST['signup-submit'])) {

    require 'dbhandler.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        header("Location: ../signup.php?error=diffPasswords&fname=" . $fname . "&lname=" . $lname . "&uname=" . $username . "&email=" . $email . "");
        exit();
    }

    $sql = "SELECT uname FROM users WHERE uname=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=SQLInjection");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $check = mysqli_stmt_num_rows($stmt);

    if ($check > 0) {
        header("Location: ../signup.php?error=UsernameTaken&fname=" . $fname . "&lname=" . $lname . "&email=" . $email . "");
        exit();
    }

    $sql = "INSERT INTO users (lname, fname, email, uname, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=SQLInjection");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    mysqli_stmt_bind_param($stmt, "sssss", $lname, $fname, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $sqlImg = "INSERT INTO profile (uname) VALUES ('$username')";
    mysqli_query($conn, $sqlImg);

    header("Location: ../profile.php?signup=success");

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    exit();

} else {
    header("Location: ../signup.php?error=NotSignedUp");
    exit();
}

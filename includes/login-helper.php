<?php

if (isset($_POST['login-submit'])) {

    require 'dbhandler.php';

    $uname_email = $_POST['uname_email'];
    $password = $_POST['password'];

    if (empty($uname_email) || empty($password)) {
        header("Location: ../login.php?error=EmptyField");
        exit();
    }

    $sql = "SELECT * FROM users where uname=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=SQLInjection");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uname_email, $uname_email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $data = mysqli_fetch_assoc($result);

    if (empty($data)) {
        header("Location: ../login.php?error=UserNotFound");
        exit();
    }

    $password_check = password_verify($password, $data['password']);

    if (!$password_check) {
        header("Location: ../login.php?error=UsernameAndPasswordDoNotMatch");
        exit();
    }

    session_start();
    $_SESSION['uid'] = $data['uid'];
    $_SESSION['fname'] = $data['fname'];
    $_SESSION['uname'] = $data['uname'];

    header("Location: ../profile.php?login=success");
    exit();

} else {
    header("Location: ../login.php?error=NotLoggedIn");
    exit();
}

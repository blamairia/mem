<?php

if (!isset($_SESSION)) {
    session_start();
}

include('../config/dbcon.php');

// Admin Login
if (isset($_POST['admin_login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM admins WHERE email ='$email' AND password ='$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];

        $_SESSION['auth_admin'] = [
            'admin_id' => $userid,
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['message'] = "Welcome Admin";
        header('Location: ../admin/index.php');
    } else {
        $_SESSION['message'] = 'Invalid email or password';
        header('Location: ../admin/login.php');
    }
}

?>

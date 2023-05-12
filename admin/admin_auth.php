<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

include('../config/dbcon.php');

// Admin Login
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../config/dbcon.php');

// Admin Login
if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM admins WHERE email ='$email' AND password ='$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $userdata = mysqli_fetch_array($login_query_run);
        $adminid = $userdata['id'];
        $adminname = $userdata['name'];
        $adminemail = $userdata['email'];

        // Set cookies
        setcookie('auth_admin', '1', time() + (86400 * 30), '/'); // Expiry set to 30 days
        setcookie('admin_id', $adminid, time() + (86400 * 30), '/');
        setcookie('admin_name', $adminname, time() + (86400 * 30), '/');
        setcookie('admin_email', $adminemail, time() + (86400 * 30), '/');

        // Redirect to index.php
        header('Location: index.php');
        exit(); // Make sure to exit after the redirect
    } else {
        // Redirect to login.php with error message
        header('Location: login.php?error=1');
        exit(); // Make sure to exit after the redirect
    }
}


?>

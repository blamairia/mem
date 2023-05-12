 <?php
    session_start();

        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        $_SESSION['message'] = "Logged Out Successfully";

// Logout

    // Clear cookies
    setcookie('auth', '', time() - 3600, '/');
    setcookie('user_id', '', time() - 3600, '/');
   


    header('Location: index.php');

    ?>
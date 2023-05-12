<?php

// Logout

    // Clear cookies
    setcookie('auth_admin', '', time() - 3600, '/');
    setcookie('admin_id', '', time() - 3600, '/');
    setcookie('admin_name', '', time() - 3600, '/');
    setcookie('admin_email', '', time() - 3600, '/');

    // Redirect to login.php
    header('Location: login.php');
    exit();



?>

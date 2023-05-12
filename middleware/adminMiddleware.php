<?php

include('../functions/myfunctions.php');

// Admin Authentication Middleware
if (!isset($_COOKIE['auth_admin']) || $_COOKIE['auth_admin'] !== '1') {
    redirect("../login.php", "Login to continue");
}


?>

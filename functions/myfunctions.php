<?php
include(__DIR__ . '/../config/dbcon.php');
// Report all PHP errors
error_reporting(E_ALL);

// Display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


function getAllActive($table, $is_profit = null)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ";
    if ($is_profit !== null) {
        $query .= "AND is_profit='$is_profit'";
    }
   
    return $query_run = mysqli_query($con, $query);
}


function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";

    return $query_run = mysqli_query($con, $query);
}

function getIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0'";

    return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";

    return $query_run = mysqli_query($con, $query);
}

function getTripsByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM trips WHERE category_id='$category_id' AND status='0'";

    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

function getCategory($categoryId) {
    global $con;

    $result = mysqli_query($con, "SELECT * FROM categories WHERE id = $categoryId");
    return mysqli_fetch_assoc($result);
}

function getProfitCategories()
{   
    global $con;
    $query = "SELECT * FROM categories WHERE is_profit = 1";
    $result = mysqli_query($con, $query);
    return $result;
}

function getNonProfitCategories()
{   
    global $con;
    $query = "SELECT * FROM categories WHERE is_profit = 0";
    $result = mysqli_query($con, $query);
    return $result;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $user_id = $_POST["user_id"];
    $trip_id = $_POST["trip_id"];

    // Query to check if a reservation by this user already exists for this trip
    $reservation_check_query = "SELECT * FROM reservations WHERE trip_id = '$trip_id' AND user_id = '$user_id'";
    $result_check = mysqli_query($con, $reservation_check_query);

    if (mysqli_num_rows($result_check) > 0) {
        $_SESSION['message'] = 'You have already reserved for this trip!';
    } else {
        // Query to check the available places for this trip
        $trip_check_query = "SELECT places FROM trips WHERE id = '$trip_id'";
        $result_trip = mysqli_query($con, $trip_check_query);
        $trip_data = mysqli_fetch_array($result_trip);

        if ($trip_data['places'] > 0) {
            // Insert the new reservation
            $query = "INSERT INTO reservations (name,email, phone, trip_id,user_id) VALUES ('$name', '$email', '$phone', '$trip_id','$user_id')";
            $result = mysqli_query($con, $query);

            if ($result) {
                $_SESSION['message'] = 'Reservation made successfully!';
                // Decrement the places available for this trip
                $update_trip_query = "UPDATE trips SET places = places - 1 WHERE id = '$trip_id'";
                mysqli_query($con, $update_trip_query);
            } else {
                $_SESSION['message'] = 'Error making reservation!';
            }
        } else {
            $_SESSION['message'] = 'No places left for this trip!';
        }
    }
}



?>

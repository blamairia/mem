<?php
include(__DIR__ . '/../config/dbcon.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getReservationsForUser($userId) {
    global $con;
    $userId = mysqli_real_escape_string($con, $userId); // sanitize user input
    $query = "SELECT * FROM reservations WHERE user_id = '$userId'";
    $result = mysqli_query($con, $query);
    $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $reservations;
}

function getTripById($tripId) {
    global $con;
    $tripId = mysqli_real_escape_string($con, $tripId); // sanitize user input
    $query = "SELECT * FROM trips WHERE id = '$tripId'";
    $result = mysqli_query($con, $query);
    $trip = mysqli_fetch_assoc($result);
    return $trip;
}

function getUserById($userId) {
    global $con;
    $userId = mysqli_real_escape_string($con, $userId); // sanitize user input
    $query = "SELECT * FROM users WHERE user_id = '$userId'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);
    return $user;
}

function acceptReservation($reservationId) {
    global $con;
    $reservationId = mysqli_real_escape_string($con, $reservationId);
    $query = "UPDATE reservations SET status = 'accepted' WHERE id = '$reservationId'";
    $result = mysqli_query($con, $query);
    return $result;
}

function declineReservation($reservationId) {
    global $con;
    $reservationId = mysqli_real_escape_string($con, $reservationId);
    $query = "UPDATE reservations SET status = 'declined' WHERE id = '$reservationId'";
    $result = mysqli_query($con, $query);
    return $result;
}
function getAllReservations() {
    global $con;
    $query = "SELECT * FROM reservations";
    $result = mysqli_query($con, $query);
    return $result; // returning mysqli_result, not array
}



if (isset($_POST['reserve_button'])) {
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

        if ($trip_data['places'] < $trip_data['max_participants'] + 1) {
            // Insert the new reservation
            $query = "INSERT INTO reservations (name, email, phone, trip_id, user_id) VALUES ('$name', '$email', '$phone', '$trip_id', '$user_id')";
            $result = mysqli_query($con, $query);

            if ($result) {
                $_SESSION['message'] = 'Reservation made successfully!';
                // Decrement the available places for this trip
                $update_trip_query = "UPDATE trips SET places = places + 1 WHERE id = '$trip_id'";
                mysqli_query($con, $update_trip_query);
                
                header('Location: ../view-reservation.php');
            } else {
                $_SESSION['message'] = 'Error making reservation!';
                header('Location: ../view-reservation.php');
            }
        } else {
            $_SESSION['message'] = 'No places left for this trip!';
            header('Location: ../view-reservation.php');
        }
    }
}

?>
<?php
session_start();
include('functions/myfunctions.php');
include('functions/reservation.php');

include('includes/header.php');

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $tripData = getSlugActive("trips", $slug);
    $trip = mysqli_fetch_array($tripData);
    if ($trip) {
        $acceptedReservations = countAcceptedReservationsForTrip($trip['id']);
        $placesRemaining = $trip['max_participants'] - $acceptedReservations;

        // Check if the user is logged in
        $isLoggedIn = isset($_COOKIE['user_id']); // Modify 'user_id' with the actual cookie name for user login

        if (!$isLoggedIn) {
            // Show popup alert when "Reserve Now" button is clicked
            echo '<script>
                function showPopup() {
                    var popup = document.getElementById("popup");
                    popup.style.display = "block";
                }

                function hidePopup() {
                    var popup = document.getElementById("popup");
                    popup.style.display = "none";
                }
            </script>';
        }

        ?>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow">
                        <img src="uploads/<?= $trip['images']; ?>" class="card-img-top img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px;" alt="<?= $trip['name'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow p-4">
                        <h2 class="mb-3"><?= $trip['name'] ?></h2>
                        <hr>
                        <h5>Description:</h5>
                        <p><?= $trip['description']; ?></p>
                        <hr>
                        <p><strong>Start Date:</strong> <?= date('d F Y', strtotime($trip['start_date'])); ?></p>
                        <p><strong>End Date:</strong> <?= date('d F Y', strtotime($trip['end_date'])); ?></p>
                        <hr>
                        <p><strong>Places Remaining:</strong> <?= $placesRemaining ?></p>
                        <p><strong>Price:</strong> <?= $trip['trip_price']; ?> DZD</p>
                        <hr>
                        <?php if ($isLoggedIn) { ?>
                            <a href="reservation.php?id=<?= $trip['id']; ?>" class="btn btn-primary btn-block mt-3">Reserve Now</a>
                        <?php } else { ?>
                            <button class="btn btn-primary btn-block mt-3" onclick="showPopup()">Reserve Now</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup Alert Design -->
        <div id="popup" class="popup-container">
            <div class="popup-content">
                <button class="popup-close" onclick="hidePopup()">&times;</button>
                <h3>Please Register or Login to Make a Reservation</h3>
                <div class="popup-buttons">
                    <a href="register.php" class="btn btn-primary">Register</a>
                    <a href="login.php" class="btn btn-secondary">Login</a>
                </div>
            </div>
        </div>

        <style>
            /* Styles for Popup Alert */
            .popup-container {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 9999;
            }

            .popup-content {
                background-color: #fff;
                border-radius: 5px;
                width: 300px;
                margin: 100px auto;
                padding: 20px;
                text-align: center;
                position: relative;
            }

            .popup-close {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 18px;
                color: #333;
                background-color: transparent;
                border: none;
                cursor: pointer;
                z-index: 1;
            }

            .popup-buttons {
                margin-top: 20px;
            }
        </style>

        <?php
    } else {
        echo "<h2 class='text-center'>Trip not found!</h2>";
    }
} else {
    echo "<h2 class='text-center'>No trip selected!</h2>";
}

include('includes/footer.php');
?>

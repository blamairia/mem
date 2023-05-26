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
        ?>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow">
                        <img src="uploads/<?= $trip['images']; ?>" class="card-img-top img-fluid rounded" style="width: 100%; height: 400px; object-fit: cover; border-radius: 15px;" alt="<?= $trip['name'] ?>">
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
                        <a href="reservation.php?id=<?= $trip['id']; ?>" class="btn btn-primary btn-block mt-3">Reserve Now</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<h2 class='text-center'>Trip not found!</h2>";
    }
} else {
    echo "<h2 class='text-center'>No trip selected!</h2>";
}

include('includes/footer.php');
?>
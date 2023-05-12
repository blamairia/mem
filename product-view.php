<?php
session_start();
include('functions/myfunctions.php');
include('includes/header.php');

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $tripData = getSlugActive("trips", $slug);
    $trip = mysqli_fetch_array($tripData);
    if ($trip) {
        ?>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-4"><?= $trip['name'] ?></h2>
                    <img src="uploads/<?= $trip['images']; ?>" class="img-fluid rounded mb-4" alt="<?= $trip['name'] ?>">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Description:</h5>
                            <p><?= $trip['description']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h5>Details:</h5>
                            <p><strong>Start Date:</strong> <?= date('d F Y', strtotime($trip['start_date'])); ?></p>
                            <p><strong>End Date:</strong> <?= date('d F Y', strtotime($trip['end_date'])); ?></p>
                            <p><strong>Price:</strong> $<?= $trip['trip_price']; ?></p>
                            <p><strong>Max Participants:</strong> <?= $trip['max_participants']; ?></p>
                            <a href="reservation.php?id=<?= $trip['id']; ?>" class="btn btn-primary btn-block mt-3">Reserve Now</a>
                        </div>
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

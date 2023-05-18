<?php
session_start();
include('functions/myfunctions.php');
include('includes/header.php');

if(isset($_GET['id'])) {
    $trip_id = $_GET['id'];
    $tripData = getIDActive("trips", $trip_id);
    $trip = mysqli_fetch_array($tripData);
    
    if($trip) {
        $user_id = $_COOKIE['user_id'];
        
        $useremail = $_COOKIE['user_email'];
        $user_query = "SELECT * FROM users WHERE user_id ='$user_id'";
        $user_query_run = mysqli_query($con, $user_query);
        $user = mysqli_fetch_array($user_query_run);
        $username = $user['name'];
        ?>
        <div class="container">
    <div class="row">
        <!-- Reservation Form -->
        <div class="col-md-6">
            <h2>Reserve Your Trip</h2>
            <form method="POST" action="functions/myfunctions.php">
                <input type="hidden" name="trip_id" value="<?= $trip['id']; ?>">
                <input type="hidden" name="user_id" value="<?= $user_id; ?>">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $username; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $useremail; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number (optional)</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <button type="submit" name="reserve_button" class="btn btn-primary">Confirm Reservation</button>
            </form>
        </div>
        
        <!-- Trip Information -->
        <div class="col-md-6">
            <h2>Trip Details</h2>
            <div class="card mb-3">
                <img src="uploads/<?= $trip['images']; ?>" class="card-img-top" alt="<?= $trip['name'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $trip['name'] ?></h5>
                    <p class="card-text"><?= $trip['description']; ?></p>
                    <p class="card-text"><small class="text-muted">Start Date: <?= date('d F Y', strtotime($trip['start_date'])); ?></small></p>
                    <p class="card-text"><small class="text-muted">End Date: <?= date('d F Y', strtotime($trip['end_date'])); ?></small></p>
                    <p class="card-text"><small class="text-muted">Places Remaining: <?= $trip['places']; ?></small></p>
                    <p class="card-text"><small class="text-muted">Price: <?= $trip['trip_price']; ?> DZD</small></p>
                </div>
            </div>
        </div>
        </div>
</div>

        <?php
    }
    else {
        echo "<h2 class='text-center'>Trip not found!</h2>";
    }
}
else {
    echo "<h2 class='text-center'>No trip selected!</h2>";
}

include('includes/footer.php');
?>

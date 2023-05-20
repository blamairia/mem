<?php 

session_start();

include('functions/reservation.php');
include('includes/header.php');
include('config/dbcon.php');
include('functions/myfunctions.php');



if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']); // Clear the session message
}
if (isset($_POST['cancel'])) {
    global $con;
    $reservation_id = $_POST['reservation_id'];
    $sql = "DELETE FROM reservations WHERE id = $reservation_id";
    mysqli_query($con, $sql);
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<div class="py-3 bg-dark">
    <div class="container">
        <a href="index.php" class="text-white" style="text-decoration:none">Home / </a><a href="view_reservation.php" class="text-white" style="text-decoration:none" >Reservation</a>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <h6>Image</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Trip Name</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Status</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>User</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Cancel Reservation</h6>
                        </div>
                    </div>
                </div>

                <?php 
                    $reservations = getReservationsForUser($_COOKIE['user_id']);
                    foreach($reservations as $reservation)
                    {
                        $trip = getTripById($reservation['trip_id']);
                        $user = getUserById($reservation['user_id']);
                        ?>

                        <div class="card product-data border-success mb-3">
                            <form action="" method="post" class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="uploads/<?= $trip['images'] ?>" alt="<?= $trip['name'] ?>" width="50px">
                                </div>
                                <div class="col-md-3">
                                    <h5><?= $trip['name'] ?></h5>
                                </div>
                                <div class="col-md-3">
                                    <h5><?= $reservation['status'] ?></h5>
                                </div>
                                <div class="col-md-2">
                                    <h5><?= $reservation['name'] ?></h5>
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" name="reservation_id" value="<?= $reservation['id'] ?>">
                                    <button class="btn btn-warning btn-sm" name="cancel">
                                        <i class="fa fa-trash me-2"></i> Cancel</a>
                                </div>
                            </form>
                        </div>

                    <?php    
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>


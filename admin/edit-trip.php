<?php
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $trip = getIDActive("trips", $id);
                if (mysqli_num_rows($trip) > 0) {
                    $data = mysqli_fetch_array($trip);
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Trip</h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="trip_id" value="<?= $data['id']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="name">Trip Name</label>
                                        <input type="text" required name="name" placeholder="Enter trip name" class="form-control mb-3" value="<?= $data['name']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="slug">Slug</label>
                                        <input type="text" required placeholder="Enter slug" name="slug" class="form-control mb-3 " value="<?= $data['slug']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Description</label>
                                        <textarea name="description" required rows="3" placeholder="Enter description" class="form-control mb-3"><?= $data['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="name">Trip Start Date</label>
                                        <input type="date" required name="start_date" class="form-control mb-3" value="<?= $data['start_date']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Trip End Date</label>
                                        <input type="date" required name="end_date" class="form-control mb-3" value="<?= $data['end_date']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Upload Images</label>
                                        <input type="file" name="images[]" class="form-control mb-3" multiple>
                                        <label class="mb-0" for="">Current Images</label>
                                        <?php
                                        $images = explode(",", $data['images']);
                                        foreach ($images as $image) {
                                            ?>
                                            <img src="../uploads/<?= $image; ?>" width="50px" height="50px">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Price</label>
                                        <input type="number" required placeholder="Enter price" name="trip_price" class="form-control mb-3" value="<?= $data['trip_price']; ?>">
                                    </div>
                                    <div class="col-md-6">
    <label class="mb-0" for="max_participants">Max Participants</label>
    <input type="number" required placeholder="Enter maximum participants" name="max_participants" class="form-control mb-3" value="<?= $data['max_participants']; ?>">
</div>
<div class="col-md-6">
    <label class="mb-0" for="status">Status</label><br>
    <input type="checkbox" name="status" <?= $data['status'] == 1 ? 'checked' : ''; ?>>
</div>
<div class="col-md-12">
    <button type="submit" class="btn btn-primary bg-gradient-success" name="update_trip_btn">Update</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php
} else {
echo "Trip not found for the given ID";
}
} else {
echo "ID missing from URL";
}
?>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?>


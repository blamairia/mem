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

                $trip = getByID("trips", $id);
                if (mysqli_num_rows($trip) > 0) {
                    $data = mysqli_fetch_array($trip);
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Trip</h4>
                            <a href="trips.php" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="trip_id" value="<?= $data['id']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="name">Name</label>
                                        <input type="text" required name="name" placeholder="Enter trip name" class="form-control mb-3" value="<?= $data['name']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="slug">Slug</label>
                                        <input type="text" required placeholder="Enter slug" value="<?= $data['slug']; ?>" name="slug" class="form-control mb-3 ">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Description</label>
                                        <textarea name="description" required rows="3" placeholder="Enter description" class="form-control mb-3"><?= $data['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="trip_price">Trip Price</label>
                                        <input type="number" value="<?= $data['trip_price']; ?>" required name="trip_price" placeholder="Enter trip price" class="form-control mb-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="max_participants">Max Participants</label>
                                        <input type="number" value="<?= $data['max_participants']; ?>" required placeholder="Enter max participants" name="max_participants" class="form-control mb-3">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Images</label>
                                        <input type="hidden" name="old_images" value="<?= $data['images']; ?>">
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
                                    <div class="col-md-3">
                                        <label class="mb-0 mt-3" for="">Status</label><br>
                                        <input type="checkbox" <?= $data['status'] == 0 ? '' : 'checked'; ?> name="status">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0 mt-3" for="">Featured</label><br>
                                        <input type="checkbox" <?= $data['featured'] == 0 ? '' : 'checked'; ?> name="featured">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Meta title</label>
                                        <input type="text" name="meta_title" value="<?= $data['meta_title']; ?>" class="form-control mb-3">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Meta description</label>
                                        <textarea name="meta_description" rows="3" placeholder="Enter meta description" class="form-control mb-3"><?= $data['meta_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Meta keywords</label>
                                        <textarea name="meta_keywords" rows="3" placeholder="Enter meta keywords" class="form-control mb-3"><?= $data['meta_keywords']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="update_trip_btn">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
            } else {
                echo "Trip not found for the given ID";
            }
        } else {
            echo "Id missing from URL";
        }
        ?>
    </div>
</div>
</div>
<?php include('includes/footer.php'); ?>



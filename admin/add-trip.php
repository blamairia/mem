<?php
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Trip</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0" for="">Category</label>
                                <select name="category_id" class="form-select mb-2" aria-label="Default select example">
                                    <option selected>Select Category</option>
                                    <?php
                                    $categories = getAll("categories");

                                    if (mysqli_num_rows($categories) > 0) {
                                        foreach ($categories as $item) {
                                            ?>
                                            <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                        <?php
                                        }
                                    } else {
                                        echo "No Category Available";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="name">Trip Name</label>
                                <input type="text" required name="name" placeholder="Enter trip name" class="form-control mb-3">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="slug">Slug</label>
                                <input type="text" required placeholder="Enter slug" name="slug" class="form-control mb-3 ">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Short Description</label>
                                <textarea name="short_description" required rows="3" placeholder="Enter short description" class="form-control mb-3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Description</label>
                                <textarea name="description" required rows="3" placeholder="Enter description" class="form-control mb-3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="name">Trip Start Date</label>
                                <input type="date" required name="start_date" class="form-control mb-3">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Trip End Date</label>
                                <input type="date" required name="end_date" class="form-control mb-3">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Upload Images</label>
                                <input type="file" name="images[]" class="form-control mb-3" multiple>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Price</label>
                                <input type="number" required placeholder="Enter price" name="trip_price" class="form-control                                 mb-3">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="max_participants">Max Participants</label>
                                <input type="number" required placeholder="Enter maximum participants" name="max_participants" class="form-control mb-3">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="status">Status</label><br>
                                <input type="checkbox" name="status">
                            </div>
                           
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_trip_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>


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
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mb-0" for="name">Category Name</label>
                                <input type="text" required name="name" placeholder="Enter category name" class="form-control mb-3">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="slug">Slug</label>
                                <input type="text" required placeholder="Enter slug" name="slug" class="form-control mb-3 ">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Description</label>
                                <textarea name="description" required rows="3" placeholder="Enter description" class="form-control mb-3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Upload Image</label>
                                <input type="file" name="image" class="form-control mb-3">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="status"style="font-size: 20px; color: black;">Status</label><br>
                                <input type="checkbox" name="status">
                            </div>
                            <br>
                            <div class="col-md-6">
                                
                                <input type="hidden" name="is_profit" value="0">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-gradient-success" name="add_category_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

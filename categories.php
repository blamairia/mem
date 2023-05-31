<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('functions/myfunctions.php');
include('config/dbcon.php');

include('includes/header.php');

$profit = isset($_GET['profit']) ? $_GET['profit'] : ''; // Get the 'profit' parameter from the URL
?>

<div class="py-3 bg-dark">
    <div class="container">
        <a href="index.php" class="text-white" style="text-decoration:none">Home / </a><a href="categories.php?profit=<?= $profit; ?>" class="text-white" style="text-decoration:none" >Collections</a>
    </div>
</div>

<div class="py-5 container">
    <div class="row">
        <div class="col-md-12">
            <h1>Nos programmes</h1>
            <hr>
            <div class="row">
                <?php
                    $categories = ($profit == '1') ? getProfitCategories() : getNonProfitCategories();

                    if (mysqli_num_rows($categories) > 0) {
                        while ($category = mysqli_fetch_assoc($categories)) {
                            ?>
                            <div class="col-md-3 mb-2">
                                <div class="card shadow" style="width: 18rem; height: 23rem;">
                                    <img src="uploads/<?= $category['image']; ?>" alt="category image" class="card-img-top" style="height: 15rem; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="text-center"><?= $category['name']; ?></h5>
                                        <div class="d-grid">
                                            <a href="trips.php?category=<?= $category['slug']; ?>" class="btn btn-primary">Show Trips</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No categories available";
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

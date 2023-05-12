<?php 

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('functions/myfunctions.php');
include('includes/header.php');
if(isset($_GET['category']))
{
    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories",$category_slug);
    $category = mysqli_fetch_array($category_data);
    if($category)
    {
        $cid = $category['id'];
        ?>
        <div class="py-3 bg-dark">
            <div class="container">
                
                    <a href="index.php" class="text-white" style="text-decoration:none">Home / </a>
                    <a href="categories.php" class="text-white" style="text-decoration:none" >Collections / </a>
                    <a href="#" class="text-white" style="text-decoration:none"><?= $category['slug'];?></a>
                
            </div>
        </div>
        <div class="py-3 container">
            <div class="row">
                <div class="col-md-12">
                        <h3>Our Collections</h3>
                        <hr>
                        <div class="row">
                            <?php
                                $trips = getTripsByCategory($cid);

                                if(mysqli_num_rows($trips) > 0)
                                { ?>
                                    <div class="container mt-3 bg-light product-data">
                                        <div class="row">
                                        <?php  while ($trip = mysqli_fetch_assoc($trips)) :?>
                                            <div class="col-md-4 mb-2">
                                                <div class="card shadow" style="width: 18rem; height: 28rem;">
                                                    <img src="uploads/<?= $trip['images']; ?>" alt="trip image" class="card-img-top" style="height: 15rem; object-fit: cover;">
                                                    <div class="card-body">
                                                        <h5  class="text-center"><?= $trip['name']; ?></h5>
                                                        <p class="text-center"><?= substr($trip['description'], 0, 100); ?>...</p>
                                                        <h6 class="text-center text-muted">Price : $<?= $trip['trip_price']; ?></h6>
                                                        <div class="d-grid">
                                                            <a href="trip-details.php?slug=<?= $trip['slug']; ?>" class="btn btn-primary">Show More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php  endwhile; ?>
                                        </div>
                                    </div>

                                        
                                        <?php
                                    }
                                }
                                else {
                                    echo "No trip available in this category";
                                }
                            ?>
                        </div>
                        
                </div>
            </div>
        </div>

<?php 
    }
    else
    {
    echo "SOMETHING WENT WRONG";
    }

include('includes/footer.php'); ?>

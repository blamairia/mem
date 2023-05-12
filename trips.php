<?php 

session_start();

include('functions/userfunctions.php');
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
                <?php  foreach($trips as $trip) :?>
                    
                        
                            <div class="col-md-4 mb-2">
                                            <a style="text-decoration:none;" href="trip-details.php?id=<?= $trip['id']; ?>">
                                                <div class="card shadow">
                                                    <div class="card-body">
                                                        <img src="uploads/<?= $trip['images']; ?>" alt="category image" class="w-100">
                                                        <h4  class="text-center"><?= $trip['name']; ?></h4>
                                                        
                                                        <H4 class ="text-center">Price : $ <span class="text-success fw-bold"> <?= $trip['trip_price']; ?></span></H4>
                                                        <div class="justify-content-center row">

                                                       
                                                        
                                                        
                                            

                                                        <button class="btn bg-white addToCart-btn btn-primary text-center" type="button"><i class="fa fa-shopping-cart me-2"></i>Add to cart</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            
                                        
                            </div>           
                        <?php  endforeach; ?>
                            
               


                    
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

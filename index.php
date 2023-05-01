<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
    include('includes/header.php');
    include('config/dbcon.php');
    include('functions/userfunctions.php');
    
// put the parameters in the $index variable
$link = "http://" . $_SERVER['SERVER_NAME'] . '/billel/MB';
// index.php link with the current parameters
$index = $link . "/index.php";
    $sql = "SELECT * FROM products";
    $result = mysqli_query($con, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    function sortByPrice($products, $sortby)
{
    if ($sortby == "asc") {
        usort($products, function ($a, $b) {
            return $a['selling_price'] - $b['selling_price'];
        });
    } else {
        usort($products, function ($a, $b) {
            return $b['selling_price'] - $a['selling_price'];
        });
    }
    return $products;
}





if (isset($_GET['search'])) {
    $products = searchByName($products, $_GET['search']);
}

if (isset($_GET['sortby'])) {
    $sortby = $_GET['sortby'];
    $products = sortByPrice($products, $sortby);
}




?>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="assets/js/custom.js"></script>
<!--Alertify Js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    
    
    <script>
        alertify.set('notifier','position', 'top-right');
        <?php if(isset($_SESSION['message'])) 
        { 
         
         ?>
         alertify.success('<?= $_SESSION['message'];?>');
        <?php 
                    unset($_SESSION['message']);
        } 
        ?>
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"
></script>


<!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Make Your Home Like Garden</h1>
                                    <a href="" class="btn btn-primary py-sm-3 px-sm-4">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Create Your Own Small Garden At Home</h1>
                                    <a href="" class="btn btn-primary py-sm-3 px-sm-4">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Top Feature Start -->
    <div class="container-fluid top-feature py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-times text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>No Hidden Cost</h4>
                                <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-users text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Dedicated Team</h4>
                                <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-phone text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>24/7 Available</h4>
                                <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Feature End -->
<div class="py-3 bg-dark mb-0">
    <div class="container">
        <a href="index.php" class="text-white" style="text-decoration:none">Home / </a><a href="categories.php" class="text-white" style="text-decoration:none" >Collections</a>
        <div class="dropdown">
                <button class="dropbtn">Categories</button>
                <div class="dropdown-content">
                <?php 
                                        $categories = getAll("categories");

                                        if(mysqli_num_rows($categories) > 0)
                                        {
                                            foreach($categories as $item)
                                            {
                                                ?>
                                                     <a href="products.php?category=<?= $item['slug']; ?>">
                                                        <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                                    </a>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Category Available";
                                        }
                                    ?>
                </div>
        </div>
       
    </div>
</div>        
        
        
<div class="py-5 container mb-0">

    <div class="row">
        <div class="col-md-12">
                <?php   
                    if(isset($_SESSION['message'])) { 
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey! </strong><?= $_SESSION['message']; ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    
                    <?php 
                    unset($_SESSION['message']);
                    }
                        ?>
        </div>
    </div>
    <div class="row mt-0">
	    	
                



    <div class="row m-3 mb-5 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="col-sm-8">
            <div class="dropdown ">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort By defoault
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li><a class="price asc dropdown-item"  href="<?php echo $index . "?sortby=asc" ?>">Asending Price</a></li>
                    <li><a class="price dsc dropdown-item" href=<?php echo $index . "?sortby=dsc" ?>>Desending Price</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="col-sm-4">
            <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST">
                <div class="input-group">
                    
                            <div class="form-outline">
                                <input name="search" value="<?php echo $search ?>" type="search" class="form-control" />
                                <label class="form-label" for="search">Search</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                    
                </div>
            </form>
        </div>
    <div class="container mt-3 bg-light product-data">
                <div class="row">
                <?php  foreach($products as $item) :?>
                    
                        
                            <div class="col-md-4 mb-2">
                                            <a style="text-decoration:none;" href="product-view.php?product=<?= $item['slug']; ?>">
                                                <div class="card shadow">
                                                    <div class="card-body">
                                                        <img src="uploads/<?= $item['image']; ?>" alt="category image" class="w-100">
                                                        <h4  class="text-center"><?= $item['name']; ?></h4>
                                                        
                                                        <H4 class ="text-center">Price : $ <span class="text-success fw-bold"> <?= $item['selling_price']; ?></span></H4>
                                                        <div class="justify-content-center row">

                                                       
                                                        
                                                        
                                            

                                                        <button class="btn bg-white addToCart-btn btn-primary text-center" value="<?= $item['id'] ?>" type="button"><i class="fa fa-shopping-cart me-2"></i>Add to cart</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            
                                        
                            </div>     
                                  
                        <?php  endforeach; ?>
                            
               


                    
                </div>
    </div>
</div>
                </div>

<?php include('includes/footer.php'); ?>

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
    include('includes/header.php');
    include('config/dbcon.php');
    
    
// put the parameters in the $index variable
$link = "http://" . $_SERVER['SERVER_NAME'] . '/billel/MB';
// index.php link with the current parameters




?>

<!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/image1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">UN PAS POUR LA SOLIDARITE</h1>
                                    <a href="" class="btn btn-primary py-sm-3 px-sm-4">JOIN US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/image4.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Randonnée pour la bonne cause </h1>
                                    <a href="" class="btn btn-primary py-sm-3 px-sm-4">JOIN US</a>
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
                                <span>Notre cause est claire et noble</span>
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
                                <span>Notre équipe est passionnée par la fourniture de résultats de haute qualité </span>
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
                                <span>+213660316628</span>
                                <span>+213550312345</span>
                                <span>email:randosolidaire@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Feature End -->
< <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="img/image3.jpg">
                </div>
                <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">15</h1>
                    <p class="text-primary mb-4">Years of Experience</p>
                    <h1 class="display-5 mb-4"> À propos de nous :</h1>
                    <p class="mb-4">Nous sommes une communauté de randonneurs passionnés qui croient en l'importance de donner en retour à la société. Nous organisons des randonnées à but caritatif dans toute la France pour collecter des fonds et sensibiliser les gens aux causes qui nous tiennent à cœur. Nous croyons que la randonnée est une activité formidable qui peut non seulement nous aider à rester en forme, mais aussi à nous connecter à la nature et à ceux qui nous entourent.</p>
                    <a class="btn btn-primary py-3 px-4" href="">ABOUT US</a>
                </div>
                <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-award fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Award Winning</h4>
                                <span></span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-users fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Dedicated Team</h4>
                               <span>Notre équipe est passionnée par la fourniture de résultats de haute qualité</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-primary">Why Choosing Us!</p>
                    <h1 class="display-5 mb-4">Pourquoi Participer à nos Événements de Randonnée?</h1>
                    <p class="mb-4">Participer à nos événements de randonnée est une excellente occasion de se connecter avec d'autres randonneurs passionnés tout en soutenant une cause importante. Nos événements sont conçus pour offrir une expérience de randonnée unique et inoubliable, avec des itinéraires soigneusement sélectionnés, des niveaux de difficulté variés et des paysages à couper le souffle. En participant à nos événements, vous contribuez également à des projets caritatifs qui ont un impact positif sur la société et la planète.</p>
                    <a class="btn btn-primary py-3 px-4" href="">Explore More</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                            <i class="fa fa-check fa-3x text-primary"></i>
                                        </div>
                                        <h4 class="mb-0">100% Satisfaction</h4>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                            <i class="fa fa-users fa-3x text-primary"></i>
                                        </div>
                                        <h4 class="mb-0">Dedicated Team</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                    <i class="fa fa-tools fa-3x text-primary"></i>
                                </div>
                                <h4 class="mb-0">Modern Equipment</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
    <!-- Features End -->
    <!-- Features End -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Non-profit Trips</h2>
                <hr>
                <div class="row">
                <?php
                $non_profit_categories = getAllActive('categories', 0);
                while ($category = mysqli_fetch_assoc($non_profit_categories)) {
                    $trips = getTripsByCategory($category['id']);
                    while ($trip = mysqli_fetch_assoc($trips)) {
                        ?>
                        <div class="col-md-3 mb-2">
                            <div class="card shadow" style="width: 18rem; height: 26rem;">
                                <img src="uploads/<?= $trip['images']; ?>" alt="trip image" class="card-img-top" style="height: 15rem; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="text-center"><?= $trip['name']; ?></h5>
                                    <p class="text-center"><?= substr($trip['description'], 0, 100); ?>...</p>
                                    <h6 class="text-center text-muted">Price: $<?= $trip['trip_price']; ?></h6>
                                    <div class="d-grid">
                                        <a href="trip-details.php?slug=<?= $trip['slug']; ?>" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                </div>

                <h2 class="text-center mb-4 mt-5">Profit Trips</h2>
                <hr>
                <div class="row">
                <?php
                $profit_categories = getAllActive('categories', 1);
                while ($category = mysqli_fetch_assoc($profit_categories)) {
                    $trips = getTripsByCategory($category['id']);
                    while ($trip = mysqli_fetch_assoc($trips)) {
                        ?>
                        <div class="col-md-3 mb-2">
                            <div class="card shadow" style="width: 18rem; height: 26rem;">
                                <img src="uploads/<?= $trip['images']; ?>" alt="trip image" class="card-img-top" style="height: 15rem; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="text-center"><?= $trip['name']; ?></h5>
                                    <p class="text-center"><?= substr($trip['description'], 0, 100); ?>...</p>
                                    <h6 class="text-center text-muted">Price: $<?= $trip['trip_price']; ?></h6>
                                    <div class="d-grid">
                                        <a href="trip-details.php?slug=<?= $trip['slug']; ?>" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>

<?php include('includes/footer.php'); ?>

<?php
include('config/dbcon.php');
include('functions/myfunctions.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $result = saveMessage($name, $email, $subject, $message);
    if($result){
        $successMsg = "Message saved successfully!";
    } else {
        $errorMsg = "Error saving message!";
    }
}

include('includes/header.php');
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Contact Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<!-- FAQ Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="display-4 mb-4">des conseils/des guides</h1>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Quels sont les équipements essentiels à emporter lors d'une randonnée ?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    Les équipements essentiels pour une randonnée incluent des chaussures de randonnée robustes, des vêtements appropriés en fonction de la météo, un sac à dos, une gourde ou une bouteille d'eau, une carte et une boussole, une trousse de premiers secours, des collations nutritives, une lampe de poche, et éventuellement des bâtons de randonnée
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Comment se préparer physiquement pour une randonnée ?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    Pour se préparer physiquement à une randonnée, il est recommandé de faire de l'exercice régulièrement, en mettant l'accent sur l'endurance cardiovasculaire et le renforcement musculaire. Des activités telles que la marche, la course, l'escalade ou le vélo peuvent être bénéfiques. Augmentez progressivement l'intensité et la durée de vos séances d'entraînement pour améliorer votre condition physique.
                    </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    Comment rester en sécurité lors d'une randonnée en montagne ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    Respectez les sentiers balisés, informez vos proches de votre itinéraire, emportez suffisamment d'eau et de nourriture, restez vigilant face aux changements météorologiques, ne vous aventurez pas seul(e) dans des zones isolées et suivez les consignes des autorités locales.
                    </div>
                </div>
            </div>
            </div>
            <!-- Add more accordion items as needed -->
        </div>
    </div>
</div>
<!-- FAQ End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <p class="fs-5 fw-bold text-primary">Contact Us</p>
                <h1 class="display-5 mb-5">Si vous avez d'autres questions, veuillez nous contacter</h1>
                <?php if(isset($successMsg)) echo "<p class='alert alert-success'>".$successMsg."</p>"; ?>
                <?php if(isset($errorMsg)) echo "<p class='alert alert-danger'>".$errorMsg."</p>"; ?>
                <form method="POST" action="">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 100px" required maxlength="500" oninput="updateCharacterCount(this)"></textarea>
                                <label for="message">Message</label>
                                <small id="charCount" class="form-text text-muted">500 characters remaining</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary py-3 px-4" type="contact">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                <div class="position-relative rounded overflow-hidden h-100">
                <iframe class="position-relative w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d160891.62074645357!2d7.708873533065077!3d36.88595245590637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128e638a59af4387%3A0x7f53a9a9c14030d6!2sAnnaba%2C%20Algeria!5e0!3m2!1sen!2sus!4v1505273178438" frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<script>
    function updateCharacterCount(textarea) {
    var maxLength = textarea.getAttribute("maxlength");
    var currentLength = textarea.value.length;
    var remainingLength = maxLength - currentLength;
    var charCountElement = document.getElementById("charCount");
    
    charCountElement.textContent = remainingLength + " characters remaining";
}
</script>

<?php
include('includes/footer.php');
?>

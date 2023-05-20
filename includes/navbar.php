<?php
include("config/dbcon.php");

$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
    $result = mysqli_query($con, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        // go to index.php and display the results of the search using the url 
       header("location: index.php?search=$search");
        
    }
}
function searchByName($products, $search)
{
    $search = strtolower($search);
    $products = array_filter($products, function ($product) use ($search) {
        return strpos(strtolower($product['name']), $search) !== false || strpos(strtolower($product['small_description']), $search) !== false;
    });
    return $products;
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-success" >
  <div class="container">
  <a aria-label="Home" href="index.php" class="block-abc tac mh__logo">
      
      <svg xmlns="http://www.w3.org/2000/svg" width="205.9" height="59.3" viewBox="0 0 205.9 59.3"> <g id="Burga_logo" data-name="Burga logo" transform="translate(30.1 -76.7)"> <g id="Group_1" data-name="Group 1"> <path id="Path_1" data-name="Path 1" d="M25.9,97.5h5.4a7.719,7.719,0,0,1,1.5.2,5.732,5.732,0,0,1,1.4.4,5.669,5.669,0,0,1,1.3.8,3.978,3.978,0,0,1,1.2,1.6,4.333,4.333,0,0,1,.4,1.9,6.052,6.052,0,0,1-.2,1.5,8.8,8.8,0,0,1-.6,1,1.874,1.874,0,0,1-.7.6,2.092,2.092,0,0,1-.6.4,4.671,4.671,0,0,1,1,.5,7.632,7.632,0,0,1,1.1.8,4.11,4.11,0,0,1,.8,1.3,5.618,5.618,0,0,1,.3,2A6.8,6.8,0,0,1,38,112a4.328,4.328,0,0,1-.5,1.2,2.361,2.361,0,0,1-.8.9,5.5,5.5,0,0,1-.9.7,6.72,6.72,0,0,1-1.2.6c-.4.1-.9.2-1.3.3-.5.1-.9.1-1.3.2H24.3V97.5Zm5,7.2h.5a3.553,3.553,0,0,0,1-.2,1.555,1.555,0,0,0,.8-.6,2.144,2.144,0,0,0,.4-1.2,1.974,1.974,0,0,0-.6-1.4,2.928,2.928,0,0,0-2.1-.6H27.7v12.1H32a2.663,2.663,0,0,0,1.2-.3,3.592,3.592,0,0,0,1-.7,1.978,1.978,0,0,0,.5-1.4,1.952,1.952,0,0,0-.1-.7,1.374,1.374,0,0,0-.5-.8,2.552,2.552,0,0,0-1-.7,4.844,4.844,0,0,0-1.8-.3H31v-3.2Z" fill="#fff" fill-rule="evenodd"></path> <path id="Path_2" data-name="Path 2" d="M93.6,106.4h2.2a3.984,3.984,0,0,0,1.7-.3,4.308,4.308,0,0,0,1-.7,4.053,4.053,0,0,0,.5-.9,2.769,2.769,0,0,0,.1-.9,3.445,3.445,0,0,0-.1-.9,4.053,4.053,0,0,0-.5-.9,3.591,3.591,0,0,0-1-.7,3.808,3.808,0,0,0-1.6-.3H90.2V97.6h5.7a9.277,9.277,0,0,1,2.6.3,5.076,5.076,0,0,1,1.8.9,6.034,6.034,0,0,1,.8.8,3.591,3.591,0,0,1,.7,1,6.117,6.117,0,0,1,.5,1.2,6.053,6.053,0,0,1,.2,1.5,3.751,3.751,0,0,1-.1,1l-.3,1.2a6.117,6.117,0,0,1-.5,1.2,3.915,3.915,0,0,1-.8,1,5.108,5.108,0,0,1-1.6,1.1,8.331,8.331,0,0,1-1.5.4l5,6.8H98.6l-6.7-9.6Z" fill="#fff" fill-rule="evenodd"></path> <path id="Path_3" data-name="Path 3" d="M130.5,106h6.7v9.1h0c-2.8.9-7.1,1.5-9.9.4-3.7-1.4-4.9-5-4.9-8.6,0-8.4,7.5-11.4,14.8-8.1l-1.3,2.9c-4.9-2.1-10.3-1.1-10.3,5.2a12.921,12.921,0,0,0,.3,2.9c1.2,3.4,4.1,3.3,7,3a4.253,4.253,0,0,0,1.1-.2v-3.3h-3.5V106Z" fill="#fff" fill-rule="evenodd"></path> <path id="Path_4" data-name="Path 4" d="M67.3,97.7v12.4c0,.2-.1.4-.1.6-.1.2-.1.4-.2.6a3.126,3.126,0,0,1-.9,1.1,2.01,2.01,0,0,1-.8.4,3.75,3.75,0,0,1-1.1.1H62.8a4.1,4.1,0,0,1-1.1-.1,2.01,2.01,0,0,1-.8-.4c-.2-.2-.4-.3-.6-.5a2.092,2.092,0,0,1-.4-.6,1.421,1.421,0,0,1-.2-.6,1.268,1.268,0,0,1-.1-.6V97.7H56.4v11.4a6.622,6.622,0,0,0,.1,1.5,3.5,3.5,0,0,0,.3,1.2,2.471,2.471,0,0,0,.4.9h0a4.347,4.347,0,0,0,.4.7c.1.1.2.3.3.4l.4.4c.2.1.3.3.5.4s.4.3.6.4a2.506,2.506,0,0,1,.7.4c.3.1.5.2.8.3a7.15,7.15,0,0,0,2.5.3h.2a7.15,7.15,0,0,0,2.5-.3,6.889,6.889,0,0,0,.8-.3,1.612,1.612,0,0,0,.7-.4c.2-.1.4-.3.6-.4a2.181,2.181,0,0,0,.5-.4c.2-.1.3-.3.4-.4s.2-.3.3-.4a7.876,7.876,0,0,0,.8-1.6,10.379,10.379,0,0,0,.3-1.2,7.569,7.569,0,0,0,.1-1.5V97.7Z" fill="#fff" fill-rule="evenodd"></path> <path id="Path_5" data-name="Path 5" d="M168.4,97.5l7.3,18.3.1.2H172l-5.4-13.9L161.3,116h-3.9l7.4-18.5Z" fill="#fff" fill-rule="evenodd"></path> </g> <path id="Path_6" data-name="Path 6" d="M105.6,58.8l8.5-12.5L100,25.8l-3.3,4.5,8.5,39.2.2.8-.4.6-4.2,6L99.3,79l-1.5-2.2L82.6,54.3l-.7-1,.7-1,9.6-13.8,1,4.5-7,10.3L99.3,72.7l2.3-3.2L93.1,30.3l-.2-.8.5-.6,5.2-7.2,1.4-2,1.5,2,16.2,23.6.7,1-.7,1L106.6,64Z" transform="translate(-112 57)" fill="#fff" fill-rule="evenodd"></path> </g></svg>

          </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-light active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
                    <a class="nav-link text-light" href="categories.php?profit=1">Profit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="categories.php?profit=0">Non-Profit</a>
                </li>
        <?php 
            if(isset($_SESSION['auth']))
            {
                ?>
               
                    <li class="nav-item">
                      <a class="nav-link text-light" href="logout.php">Logout</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-light" href="view-reservation.php"><span>Reservations </span><img src="uploads/shopping-cartsvg.svg" alt="reservation" width="22px" height ="20px"></a>
                    </li>
                
            <?php 
            }
            else{
               ?> <li class="nav-item">
                <a class="nav-link text-light" href="register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="login.php">Login</a>
              </li>
              
            <?php
            }

            $search ='';
        ?>


      </ul>
    </div>
  </div>
</nav>
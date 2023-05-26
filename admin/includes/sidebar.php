
  <?php
  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/") + 1);
?>
<style>
  .bg-gradient-info-success {
  background: linear-gradient(to right, #17a2b8, #28a745);
}
</style>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-info-success" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">        
        <span class="ms-1 font-weight-bold text-white">Php Ecom Admin</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'index.php' ? 'active bg-gradient-info' : "" ;?>" href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1 fw-bold">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'category.php' ? 'active bg-gradient-info' : "" ;?>" href="category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1 fw-bold">ALL Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'category_c.php' ? 'active bg-gradient-info' : "" ;?>" href="category_c.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1 fw-bold">ALL Category_c</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'add_category.php' ? 'active bg-gradient-info' : "" ;?>" href="add_category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1 fw-bold">Add Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'add_category_c.php' ? 'active bg-gradient-info' : "" ;?>" href="add_category_c.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1 fw-bold">Add Category Caretatif</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'trips.php' ? 'active bg-gradient-info' : "" ;?>" href="trips.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1 fw-bold">All trips</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'add-trip.php' ? 'active bg-gradient-info' : "" ;?>" href="add-trip.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1 fw-bold">Add Trip</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
        <div class="mx-3">
        <a class="btn bg-gradient-info mt-4 w-100" href="logout.php">Logout</a>
        </div>
    </div>
</aside>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Mini Projet PHP
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Alertify Js css -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.min.css" rel="stylesheet" >
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      width: 300px;
    }

    .form-control {
      border: 1px solid #b3a1a1 !important;
      padding: 8px 10px;
    }

    .form-select {
      border: 1px solid #b3a1a1 !important;
      padding: 8px 10px;
    }
    .bg-gradient-info-success {
  background: linear-gradient(to right, #17a2b8, #28a745);
}
  </style>
</head>
<body>
    <?php if (!isset($_SESSION)) {
    session_start();
}?>
  <div class="card  ">
    <div class="card-header bg-gradient-info-success">
      <h3 class="card-title text-white">Admin Login</h3>
    </div>
    <div class="card-body">
      <form action="admin_auth.php" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" placeholder="LIWAE@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" placeholder="Enter Password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="login_btn" class="btn bg-gradient-info-success text-white">Login</button>
      </form>
    </div>
  </div>
</body>
</html>

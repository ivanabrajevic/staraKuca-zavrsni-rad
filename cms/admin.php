<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
  </head>

  <body>
    <!-- Header -->
    <?php
    require "header.php";
    ?>
    <!-- Page Content -->
<div class="send-message">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2 style="text-align: center;">Prijava</h2>
        </div>
        <form action="login.php" method="post" style="width: 60%;margin-left: 20%; margin-right: 20%;">
          <?php if (isset($_GET['error'])) { ?>
          <p class="error" style="color: red;font-weight: bold;"><?php echo $_GET['error']; ?></p>
          <?php } ?>
          <div class="mb-3">
            <label for="korisnicko_ime" class="form-label">Korisničko ime</label>
            <input type="text" name="korisnicko_ime" class="form-control" id="korisnicko_ime">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Lozinka</label>
            <input type="password" name="lozinka" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Prijavi se</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
  </body>

</html>
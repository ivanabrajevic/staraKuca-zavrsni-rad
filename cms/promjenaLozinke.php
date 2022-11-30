<?php
session_start();

if (!(isset($_SESSION['korisnicko_ime']))) {
  header("Location: admin.php");
  exit();
}
require "../bazaPodataka.php";

if (isset($_POST['sacuvaj'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $stara = validate($_POST['stara']);
  $nova = validate($_POST['nova']);
  $nova2 = validate($_POST['nova2']);
  $korisnicko_ime = $_SESSION['korisnicko_ime'];
  $sql = "SELECT * FROM admin_login WHERE korisnicko_ime='$korisnicko_ime'";
  $result = mysqli_query($mysqli, $sql);
  $row = mysqli_fetch_assoc($result);

  if ($row['lozinka'] !== $stara) {
    header("Location: promjenaLozinke.php?error=Netočna stara lozinka!");
    exit();
  }
  if($nova !== $nova2) {
    header("Location: promjenaLozinke.php?error=Lozinke nisu iste!");
    exit();
  } 
  $stmt1 = $mysqli->prepare("UPDATE admin_login set lozinka = ? WHERE korisnicko_ime = ?");
  $stmt1->bind_param("ss", $nova, $korisnicko_ime);
  $stmt1->execute();
  header("Location: adminHome.php");
  exit();
}
?>
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
          <h2 style="text-align: center;">Promjeni lozinku</h2>
        </div>
        <form action="promjenaLozinke.php" method="post" style="width: 60%;margin-left: 20%; margin-right: 20%;">
          <?php if (isset($_GET['error'])) { ?>
          <p class="error" style="color: red;font-weight: bold;"><?php echo $_GET['error']; ?></p>
          <?php } ?>
          <div class="mb-3">
            <label for="stara" class="form-label">Stara lozinka</label>
            <input type="password" name="stara" class="form-control" id="stara">
          </div>
          <div class="mb-3">
            <label for="nova" class="form-label">Nova lozinka</label>
            <input type="password" name="nova" class="form-control" id="nova">
          </div>
          <div class="mb-3">
            <label for="nova2" class="form-label">Ponovi novu lozinku</label>
            <input type="password" name="nova2" class="form-control" id="nova2">
          </div>
          <button type="submit" class="btn btn-primary" name="sacuvaj" value="sacuvaj">Sačuvaj</button>
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
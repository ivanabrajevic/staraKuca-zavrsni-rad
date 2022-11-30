<?php
session_start();

if (!(isset($_SESSION['korisnicko_ime']))) {
  header("Location: admin.php");
  exit();
}
require "../bazaPodataka.php";
$jezikHrv = "hrv"; 
$jezikEng = "eng";
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

    <title>Meni</title>

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
   
    <!-- Meni hrv -->
    <?php 
      $stmt = $mysqli->prepare("SELECT * FROM menu WHERE jezik = ? ");
      $stmt->bind_param("s", $jezikHrv);
      $stmt->execute();
      $result = $stmt->get_result();
    ?>
    <section id="menu-hrv" style="margin-top: 100px;">
    <div class="section-heading">
      <h2 style="text-align: center;">Uredi meni preporuke</h2>
      <a href="#menu-eng" class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1" style="margin-right: 30px">Izmjeni na engleskom</a>
    </div>
    <div class="container">
      <div class="row">
      <form action="meniDodaj.php">
        <button type="submit" class="btn btn-outline-primary">Dodaj novo</button>
      </form>
        <div class="table-responsive" style="margin-top: 0.6rem;">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Naziv</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                <tr>
                  <td><?php echo $row['naziv']; ?></td>
                  <td><a href=meniUredi.php?id=<?php echo $row['id'] ?> class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1">Uredi</a></td>
                  <td><a href=meniIzbrisi.php?id=<?php echo $row['id'] ?> class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1" style="color: red;">Izbriši</a></td>
                </tr>
              <?php
              endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </section><br><br><br>

     <!-- Meni hrv -->
     <?php 
      $stmt = $mysqli->prepare("SELECT * FROM menu WHERE jezik = ? ");
      $stmt->bind_param("s", $jezikEng);
      $stmt->execute();
      $result = $stmt->get_result();
    ?>
    <section id="menu-eng" style="margin-top: 100px;">
      <div class="section-heading">
        <h2 style="text-align: center;">Uredi meni preporuke (ENG)</h2>
        <a href="#menu-hrv" class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1" style="margin-right: 30px">Izmjeni na hrvatskom</a>
      </div>
    <div class="container">
      <div class="row">
      <form action="meniDodaj.php">
        <button type="submit" class="btn btn-outline-primary">Dodaj novo</button>
      </form>
        <div class="table-responsive" style="margin-top: 0.6rem;">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Naziv</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                <tr>
                  <td><?php echo $row['naziv']; ?></td>
                  <td><a href=meniUredi.php?id=<?php echo $row['id'] ?> class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1">Uredi</a></td>
                  <td><a href=meniIzbrisi.php?id=<?php echo $row['id'] ?> class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1" style="color: red;">Izbriši</a></td>
                </tr>
              <?php
              endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </section>
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
  </body>

</html>
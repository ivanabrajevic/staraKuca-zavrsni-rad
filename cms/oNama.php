<?php
session_start();

if (!(isset($_SESSION['korisnicko_ime']))) {
  header("Location: admin.php");
  exit();
}
require "../bazaPodataka.php";
$jezikHrv = "hrv"; 
$jezikEng = "eng";

if (isset($_POST["izmjeniHrv"])) {
  $opis = $_POST['opis'];
  $tkosmo = $_POST['tkosmo'];
  $lokacija = $_POST['lokacija'];
  $slogan = $_POST['slogan'];

  $stmt = $mysqli->prepare("UPDATE o_nama set opis = ?, tkosmo = ?, lokacija = ?, slogan = ? WHERE jezik = ?");
  $stmt->bind_param("sssss", $opis, $tkosmo, $lokacija, $slogan, $jezikHrv);

  $stmt->execute();

  header("Location: adminHome.php");
}
if (isset($_POST["izmjeniEng"])) {
  $opisEng = $_POST['opisEng'];
  $tkosmoEng = $_POST['tkoSmoEng'];
  $lokacijaEng = $_POST['lokacijaEng'];
  $sloganEng = $_POST['sloganEng'];

  $stmt = $mysqli->prepare("UPDATE o_nama set opis = ?, tkosmo = ?, lokacija = ?, slogan = ? WHERE jezik = ?");
  $stmt->bind_param("sssss", $opisEng, $tkosmoEng, $lokacijaEng, $sloganEng, $jezikEng);

  $stmt->execute();

  header("Location: adminHome.php");
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

    <title>O nama</title>

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
   
    <!-- Opg hrv -->
    <?php 
      $stmt = $mysqli->prepare("SELECT * FROM o_nama WHERE jezik = ? ");
      $stmt->bind_param("s", $jezikHrv);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    ?>
    <section id="oNama-hrv">
      <div class="send-message">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Izmjeni podatke O nama</h2>
                <a href="#oNama-eng" class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1">Izmjeni na engleskom</a>
              </div>
            </div>
            <div class="col-md-8">
              <div class="contact-form">
                <form action="oNama.php" method="post">
                    <div class="row">
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="opis">Opis:</label><br>
                          <textarea name="opis" rows="6" class="form-control" id="opis"><?php echo $row['opis'];?></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="tkosmo">Tko smo:</label><br>
                          <textarea name="tkosmo" rows="6" class="form-control" id="tkosmo"><?php echo $row['tkosmo'];?></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="lokacija">Lokacija:</label><br>
                          <textarea name="lokacija" rows="6" class="form-control" id="lokacija"><?php echo $row['lokacija'];?></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="slogan">Slogan:</label><br>
                          <textarea name="slogan" rows="6" class="form-control" id="slogan"><?php echo $row['slogan'];?></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="filled-button" name="izmjeniHrv" value="izmjeniHrv">Sačuvaj</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Opg eng -->
    <?php 
      $stmt2 = $mysqli->prepare("SELECT * FROM o_nama WHERE jezik = ? ");
      $stmt2->bind_param("s", $jezikEng);
      $stmt2->execute();
      $result2 = $stmt2->get_result();
      $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    ?>
    <section id="oNama-eng">
      <div class="send-message">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Izmjeni podatke O nama na engleskom</h2>
              </div>
            </div>
            <div class="col-md-8">
              <div class="contact-form">
                <form action="Onama.php" method="post">
                    <div class="row">
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="opisEng">Opis:</label><br>
                          <textarea name="opisEng" rows="6" class="form-control" id="opisEng"><?php echo $row2['opis'];?></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="tkoSmoEng">Tko smo:</label><br>
                          <textarea name="tkoSmoEng" rows="6" class="form-control" id="tkoSmoEng"><?php echo $row2['tkosmo'];?></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="lokacijaEng">Lokacija:</label><br>
                          <textarea name="lokacijaEng" rows="6" class="form-control" id="lokacijaEng"><?php echo $row2['lokacija'];?></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="sloganEng">Slogan:</label><br>
                          <textarea name="sloganEng" rows="6" class="form-control" id="sloganEng"><?php echo $row2['slogan'];?></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="filled-button" name="izmjeniEng" value="izmjeniEng">Sačuvaj</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
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
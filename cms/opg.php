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
  $naslov = $_POST['naslov'];
  $opis = $_POST['opis'];
  $zakljucak = $_POST['zakljucak'];

  $stmt = $mysqli->prepare("UPDATE opg set naslov = ?, opis = ?, zakljucak = ? WHERE jezik = ?");
  $stmt->bind_param("ssss", $naslov, $opis, $zakljucak, $jezikHrv);

  $stmt->execute();

  header("Location: adminHome.php");
}
if (isset($_POST["izmjeniEng"])) {
  $naslovEng = $_POST['naslovEng'];
  $opisEng = $_POST['opisEng'];
  $zakljucakEng = $_POST['zakljucakEng'];

  $stmt = $mysqli->prepare("UPDATE opg set naslov = ?, opis = ?, zakljucak = ? WHERE jezik = ?");
  $stmt->bind_param("ssss", $naslovEng, $opisEng, $zakljucakEng, $jezikEng);

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

    <title>OPG</title>

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
      $stmt = $mysqli->prepare("SELECT * FROM opg WHERE jezik = ? ");
      $stmt->bind_param("s", $jezikHrv);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    ?>
    <section id="opg-hrv">
      <div class="send-message">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading" style="margin-bottom: 35px;">
                <h2>Izmjeni OPG podatke</h2>
                <a href="#opg-eng" class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1">Izmjeni na engleskom</a>
                <form action="opgPonuda.php">
                  <button type="submit" class="btn btn-outline-danger btn-sm">Idi na OPG Ponudu</button>
                </form>
              </div>
            </div>
            <div class="col-md-8">
              <div class="contact-form">
                <form action="opg.php" method="post">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset>
                          <label for="naslov">Naslov:</label><br>
                          <input name="naslov" type="text" class="form-control" id="naslov" value="<?php echo $row['naslov'];?>" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="opis">Opis:</label><br>
                          <textarea name="opis" rows="6" class="form-control" id="opis"><?php echo $row['opis'];?></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="zakljucak">Zaključak:</label><br>
                          <textarea name="zakljucak" rows="6" class="form-control" id="zakljucak"><?php echo $row['zakljucak'];?></textarea>
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
      $stmt2 = $mysqli->prepare("SELECT * FROM opg WHERE jezik = ? ");
      $stmt2->bind_param("s", $jezikEng);
      $stmt2->execute();
      $result2 = $stmt2->get_result();
      $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    ?>
    <section id="opg-eng">
      <div class="send-message">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading" style="margin-bottom: 35px;">
                <h2>Izmjeni OPG podatke na engleskom</h2>
                <a href="#opg-hrv" class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1">Izmjeni na hrvatskom</a>
                <form action="opgPonudaEng.php">
                  <button type="submit" class="btn btn-outline-danger btn-sm">Idi na OPG Ponudu</button>
                </form>
              </div>
            </div>
            <div class="col-md-8">
              <div class="contact-form">
                <form action="opg.php" method="post">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset>
                          <label for="naslovEng">Naslov:</label><br>
                          <input name="naslovEng" type="text" class="form-control" id="naslovEng" value="<?php echo $row2['naslov'];?>" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="opisEng">Opis:</label><br>
                          <textarea name="opisEng" rows="6" class="form-control" id="opisEng"><?php echo $row2['opis'];?></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="zakljucakEng">Zaključak:</label><br>
                          <textarea name="zakljucakEng" rows="6" class="form-control" id="zakljucakEng"><?php echo $row2['zakljucak'];?></textarea>
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
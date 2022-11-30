<?php
session_start();

if (!(isset($_SESSION['korisnicko_ime']))) {
  header("Location: admin.php");
  exit();
}
require "../bazaPodataka.php";

$id = 1;
$stmt = $mysqli->prepare("SELECT * FROM kontakt WHERE id = ? ");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (isset($_POST["sacuvaj"])) {
  $ime = $_POST['ime'];
  $prezime = $_POST['prezime'];
  $br = $_POST['br'];
  $email = $_POST['email'];
  $fb = $_POST['facebook'];
  
  $stmt = $mysqli->prepare("UPDATE kontakt set ime = ?, prezime = ?, br_mob = ?, email = ?, facebook = ? WHERE id = ?");
  $stmt->bind_param("sssssi", $ime, $prezime, $br, $email, $facebook, $id);

  $stmt->execute();

  header("Location: adminHome.php");
}
$mysqli->close();
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

    <title>Kontakt</title>

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
              <h2>Izmjeni kontakt podatke</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form method="post" action="kontakt.php">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <label for="ime">Ime:</label><br>
                      <input name="ime" id="ime" type="text" class="form-control" value="<?php echo $row['ime'];?>" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                    <label for="prezime">Prezime:</label><br>
                      <input name="prezime" id="prezime" type="text" class="form-control" value="<?php echo $row['prezime'];?>" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                    <label for="br">Telefon:</label><br>
                      <input name="br" id="br" type="text" class="form-control" value="<?php echo $row['br_mob'];?>">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                    <label for="email">Email:</label><br>
                      <input name="email" id="email" type="text" class="form-control" value="<?php echo $row['email'];?>">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                    <label for="facebook">Facebook:</label><br>
                      <input name="facebook" id="facebook" type="text" class="form-control" value="<?php echo $row['facebook'];?>">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" name="sacuvaj" value="sacuvaj" class="filled-button">Sačuvaj</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
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
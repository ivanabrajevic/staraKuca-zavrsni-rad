<?php
session_start();

if (!(isset($_SESSION['korisnicko_ime']))) {
  header("Location: admin.php");
  exit();
}

require "../bazaPodataka.php";

$id = $_GET['id'];
$stmt = $mysqli->prepare("SELECT * FROM menu WHERE id = ? ");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (isset($_POST["sacuvaj"])) {
  $naziv = $_POST['naziv'];
  $opis = $_POST['opis'];
  $stmt = $mysqli->prepare("UPDATE menu set naziv = ?, opis = ? WHERE id = ?");
  $stmt->bind_param("ssi", $naziv, $opis, $id);

  $stmt->execute();
  header("Location: meni.php");
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

    <title>Meni uredi</title>

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
              <h2>Izmjeni podatke</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form method="post" action="meniUredi.php?id=<?php echo $id ?>">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <label for="naziv">Naziv:</label><br>
                      <input name="naziv" id="naziv" type="text" class="form-control" value="<?php echo htmlspecialchars($row['naziv'], ENT_QUOTES, 'UTF-8');;?>" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <label for="opis">Opis:</label><br>
                      <textarea name="opis" rows="6" class="form-control" id="opis"><?php echo htmlspecialchars($row['opis'], ENT_QUOTES, 'UTF-8');;?></textarea>
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
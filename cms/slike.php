<?php
session_start();

if (!(isset($_SESSION['korisnicko_ime']))) {
  header("Location: admin.php");
  exit();
}

require "../bazaPodataka.php";
$kategorija = ["galerija", "slider", "info", "opg"];
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

    <title>Slike</title>

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
          <h2>Uredi slike</h2>
          <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>
        </div>
        <form action="spremiSliku.php" method="post" enctype="multipart/form-data">
          <div class="input-group">
            <input type="file" name="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <select class="form-select" aria-label="Odaberite kategoriju" name="kategorija">
              <option value="galerija">Galerija</option>
              <option value="slider">Početna (slider)</option>
              <option value="info">Početna (info)</option>
              <option value="opg">OPG</option>
            </select>
            <button type="submit" id="form-submit" name="sacuvaj" value="sacuvaj" class="filled-button">Spremi</button>
          </div>
        </form>
        <br><br>
        <!---SLIKE-->
        <style>
          .img-wraps {
          position: relative;
          display: inline-block;
          font-size: 0;
          }
          .img-wraps .btn {
          position: absolute;
          top: 90%;
          left: 77%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          background-color: red;
          color: white;
          font-size: 11px;
          padding: 12px 24px;
          border: none;
          cursor: pointer;
          border-radius: 5px;
          text-align: center;
          }
          .img-wraps .btn:hover {
          background-color: black;
          }
          .img-responsive {
            margin-right: 5px;
          }
        </style>
        <div>
          <h3>Slike s početne (slider)</h3>
          <br>
          <?php 
            $stmt = $mysqli->prepare("SELECT * FROM slike WHERE kategorija=? ");
            $stmt->bind_param("s", $kategorija[1]);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): 
              $putanja = '../'.$row['putanja'];
            ?>
          <div class="img-wraps">
            <img class="img-responsive" src="<?php echo $putanja ?>" width="200" height="200">
            <form action=izbrisiSliku.php?id=<?php echo $row['id'] ?> method="post">
              <button type="submit" id="form-submit" class="btn">Delete</button>
            </form>
          </div>
          <?php endwhile;?>
        </div>
      </div>
    </div>
  </div>
  <div class="send-message">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
          </div>
          <h3>Slike s početne (info)</h3>
          <br>
          <?php 
            $stmt1 = $mysqli->prepare("SELECT * FROM slike WHERE kategorija=? ");
            $stmt1->bind_param("s", $kategorija[2]);
            $stmt1->execute();
            $result1 = $stmt1->get_result();
            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)): 
              $putanja1 = '../'.$row1['putanja'];
            ?>
          <div class="img-wraps">
            <img class="img-responsive" src="<?php echo $putanja1 ?>" width="200" height="200">
            <form action=izbrisiSliku.php?id=<?php echo $row1['id'] ?> method="post">
              <button type="submit" id="form-submit" class="btn">Delete</button>
            </form>
          </div>
          <?php endwhile;?>
        </div>
      </div>
    </div>
  </div>
  <div class="send-message">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
          </div>
          <h3>Slike s početne (Galerija)</h3>
          <br>
          <?php 
            $stmt2 = $mysqli->prepare("SELECT * FROM slike WHERE kategorija=? ");
            $stmt2->bind_param("s", $kategorija[0]);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)): 
              $putanja2 = '../'.$row2['putanja'];
            ?>
          <div class="img-wraps">
            <img class="img-responsive" src="<?php echo $putanja2 ?>" width="200" height="200">
            <form action=izbrisiSliku.php?id=<?php echo $row2['id'] ?> method="post">
              <button type="submit" id="form-submit" class="btn">Delete</button>
            </form>
          </div>
          <?php endwhile;?>
        </div>
      </div>
    </div>
  </div>
  <div class="send-message">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
          </div>
          <h3>OPG</h3>
          <br>
          <?php 
            $stmt3 = $mysqli->prepare("SELECT * FROM slike WHERE kategorija=? ");
            $stmt3->bind_param("s", $kategorija[3]);
            $stmt3->execute();
            $result3 = $stmt3->get_result();
            while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)): 
              $putanja3 = '../'.$row3['putanja'];
            ?>
          <div class="img-wraps">
            <img class="img-responsive" src="<?php echo $putanja3 ?>" width="200" height="200">
            <form action=izbrisiSliku.php?id=<?php echo $row3['id'] ?> method="post">
              <button type="submit" id="form-submit" class="btn">Delete</button>
            </form>
          </div>
          <?php endwhile;?>
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
<?php
    require "konstante.php";
    require "bazaPodataka.php";
    $jezik = isset($_COOKIE['jezik']) ?  $_COOKIE['jezik'] : "hrv";
    ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title><?php $jezik == "hrv" ? print_r(TABNASLOV[0]) : print_r(TABNASLOV[1]) ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <?php
    require "header.php";
    ?>


    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/slike/14.jpeg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
        
              <h2><?php $jezik == "hrv" ? print_r(TKOSMO_1[0]) : print_r(TKOSMO_1[1]) ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2><?php $jezik == "hrv" ? print_r(TKOOPIS[0]) : print_r(TKOOPIS[1]) ?></h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/slike/15.jpeg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
            <?php 
						$stmt = $mysqli->prepare("Select * from o_nama WHERE jezik=?");
						$stmt->bind_param("s", $jezik);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC); ?>
              <p><?php echo $row['tkosmo']; ?> </p> 
            </div>
          </div>
        </div>
      </div>
    </div>

    
   

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
            <p><?php echo FOOTER?></a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>

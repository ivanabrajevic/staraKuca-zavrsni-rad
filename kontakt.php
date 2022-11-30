<?php
require "bazaPodataka.php";
require "konstante.php";
$jezik = isset($_COOKIE['jezik']) ?  $_COOKIE['jezik'] : "hrv";
$id = 1;
$stmt = $mysqli->prepare("Select * from kontakt WHERE ID=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$rowKontakt = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
    <div class="page-heading contact-heading header-text" style="background-image: url(assets/slike/18.jpeg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
          
              <h2><?php $jezik == "hrv" ? print_r(KONTAKT[0]) : print_r(KONTAKT[1]) ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2><?php $jezik == "hrv" ? print_r(GDJESMO[0]) : print_r(GDJESMO[1]) ?></h2>
            </div>
          </div>
          <div class="col-md-8">
            <div id="map">
              <iframe src="https://maps.google.com/maps?q=osojnik&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="350px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
            <?php 
						$stmt = $mysqli->prepare("Select * from o_nama WHERE jezik=?");
						$stmt->bind_param("s", $jezik);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC); ?>
              <p><?php echo $row['lokacija']; ?></p>
              <ul class="social-icons">
                <li><a href="<?php echo $rowKontakt['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2><?php $jezik == "hrv" ? print_r(KONTAKTNASLOV[0]) : print_r(KONTAKTNASLOV[1]) ?></h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form method="post" action="mail.php">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="<?php $jezik == "hrv" ? print_r(POLJAKONTAKT[0]) : print_r(POLJAKONTAKTENG[0]) ?>" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="<?php $jezik == "hrv" ? print_r(POLJAKONTAKT[1]) : print_r(POLJAKONTAKTENG[1]) ?>" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="subject" type="text" class="form-control" id="subject" placeholder="<?php $jezik == "hrv" ? print_r(POLJAKONTAKT[2]) : print_r(POLJAKONTAKTENG[2]) ?>" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="<?php $jezik == "hrv" ? print_r(POLJAKONTAKT[3]) : print_r(POLJAKONTAKTENG[3]) ?>"required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button"><?php $jezik == "hrv" ? print_r(POLJAKONTAKT[4]) : print_r(POLJAKONTAKTENG[4]) ?></button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <img src="assets/slike/19.jpeg" class="img-fluid" alt="">

            <h5 class="text-center" style="margin-top: 15px;"><?php echo ($rowKontakt["ime"] . " " . $rowKontakt["prezime"]);?></h5>
            <h6 class="text-center" style="margin-top: 15px;"><?php echo $rowKontakt["br_mob"];?></h6>
            <h6 class="text-center" style="margin-top: 15px;"><a href="mailto:"><?php echo $rowKontakt["email"];?></a></h6>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p><?php echo FOOTER;?></p>
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



<?php
require "bazaPodataka.php";
require "konstante.php";
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

  <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <title><?php $jezik == "hrv" ? print_r(TABNASLOV[0]) : print_r(TABNASLOV[1]) ?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link href="assets/css/lightbox.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/magnific-popup.css">

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

  <?php 
$stmt = $mysqli->prepare("Select * from opg WHERE jezik=? ");
  $stmt->bind_param("s", $jezik);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC); ?>
  <!-- Page Content -->
  <div class="page-heading contact-heading header-text" style="background-image: url(assets/slike/17.jpeg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">

            <h2><?php echo $row['naslov']; ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="best-features about-features">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="right-image">
          <div class="table-responsive">

            <table class="table table-striped table-hover">

              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col"><?php $jezik == "hrv" ? print_r(OPGNAZIV[0]) : print_r(OPGNAZIV[1]) ?></th>
                  <th scope="col"><?php $jezik == "hrv" ? print_r(OPGOPIS[0]) : print_r(OPGOPIS[1]) ?></th>

                </tr>
              </thead>
              <tbody>
                <?php
                $br = 1;
                $stmt1 = $mysqli->prepare("Select * from opgPonuda WHERE jezik = ?");
                $stmt1->bind_param("s", $jezik);
                $stmt1->execute();
                $resultOpg = $stmt1->get_result();
                while ($rowOpg = mysqli_fetch_array($resultOpg, MYSQLI_ASSOC)) : ?>
                  <tr>
                    <th scope="row"><?php echo $br; ?></th>
                    <td><?php echo $rowOpg['naziv']; ?></td>
                    <td><?php echo $rowOpg['opis']; ?></td>

                  </tr>
                <?php
                  $br++;
                endwhile; ?>
              </tbody>

            </table>
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
          <p><?php echo $row['opis']; ?></p>
          
          <p><?php echo $row['zakljucak']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2 style="text-align: center;"><?php $jezik == "hrv" ? print_r("Galerija") : print_r("Gallery") ?></h2>
            </div>
            <div class="popup-gallery"  style="margin-left:10%; margin-right:10%;">
              <?php
                $kategorija = "opg";
                $stmt2 = $mysqli->prepare("SELECT * from slike WHERE kategorija=? ");
                $stmt2->bind_param("s", $kategorija);
                $stmt2->execute();
                $resultSlikeOpg = $stmt2->get_result();
                while ($rowSlikeOpg = mysqli_fetch_array($resultSlikeOpg, MYSQLI_ASSOC)) :?>
                <a href="<?php echo $rowSlikeOpg["putanja"];?>" title=""><img src="<?php echo $rowSlikeOpg["putanja"];?>" width="180" height="180"></a>
              <?php endwhile; ?> 
            </div>	
          </div>
        </div>
      </div>
    </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.js"></script>
  <script>var $ = jQuery.noConflict();
            $(document).ready(function() {
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            }
        });
    });
  </script>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p><?php echo FOOTER; ?></p>
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
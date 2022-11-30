<?php
require "bazaPodataka.php";
require "konstante.php";
$jezik = isset($_COOKIE['jezik']) ?  $_COOKIE['jezik'] : "hrv";
$kategorija = ["galerija", "slider", "info"];
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
    <link rel="stylesheet" href="index.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i">

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

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <?php
      $stmt4 = $mysqli->prepare("SELECT * from slike WHERE kategorija=? ");
      $stmt4->bind_param("s", $kategorija[1]);
      $stmt4->execute();
      $resultSlikeSlider = $stmt4->get_result();
      $rowSlikeSlider = array();
      while ($rowTemp1 = mysqli_fetch_array($resultSlikeSlider, MYSQLI_ASSOC)) :
        array_push($rowSlikeSlider, $rowTemp1);
      endwhile;
      ?>
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01" style="background-image: url('<?php echo $rowSlikeSlider[0]["putanja"];?>');">
          <div class="text-content">
          
            <h2><?php $jezik == "hrv" ? print_r(POCETNA_NASLOV[0]) : print_r(POCETNA_NASLOV[1]) ?></h2>
          </div>
        </div>
        <div class="banner-item-02" style="background-image: url('<?php echo $rowSlikeSlider[1]["putanja"];?>');">
          <div class="text-content">
          
            <h2><?php $jezik == "hrv" ? print_r(POCETNA_NASLOV[0]) : print_r(POCETNA_NASLOV[1]) ?></h2>
          </div>
        </div>
        <div class="banner-item-03" style="background-image: url('<?php echo $rowSlikeSlider[2]["putanja"];?>');">
          <div class="text-content">
          
            <h2><?php $jezik == "hrv" ? print_r(POCETNA_NASLOV[0]) : print_r(POCETNA_NASLOV[1]) ?></h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <section class="u-clearfix u-section-4" id="carousel_c158">
    <?php
      $stmt3 = $mysqli->prepare("SELECT * from slike WHERE kategorija=? ");
      $stmt3->bind_param("s", $kategorija[2]);
      $stmt3->execute();
      $resultSlikeInfo = $stmt3->get_result();
      $rowSlikeInfo = array();
      while ($rowTemp = mysqli_fetch_array($resultSlikeInfo, MYSQLI_ASSOC)) :
        array_push($rowSlikeInfo, $rowTemp);
      endwhile;
      ?>
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-col">
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-container-style u-image u-layout-cell u-left-cell u-size-20 u-image-1" style="background-image: url('<?php echo $rowSlikeInfo[0]["putanja"];?>');">
                    <div class="u-container-layout u-container-layout-1"></div>
                  </div>
                  <div class="u-container-style u-layout-cell u-size-20 u-layout-cell-2">
                    <div class="u-container-layout u-valign-middle u-container-layout-2">
                      <h6 class="u-align-center u-text u-text-default u-text-1"><?php $jezik == "hrv" ? print_r(ONAMA[0]) : print_r(ONAMA[1]) ?></h6>
                      <h3 class="u-align-center u-custom-font u-font-playfair-display u-text u-text-2"><?php $jezik == "hrv" ? print_r(ONAMA_OPIS[0]) : print_r(ONAMA_OPIS[1]) ?></h3>
                      
                      <a href="o_nama.php" class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1"><?php $jezik == "hrv" ? print_r(VISE[0]) : print_r(VISE[1]) ?></a>
                    </div>
                  </div>
                  <div class="u-container-style u-image u-layout-cell u-right-cell u-size-20 u-image-2" style="background-image: url('<?php echo $rowSlikeInfo[1]["putanja"];?>');">
                    <div class="u-container-layout u-container-layout-3"></div>
                  </div>
                </div>
              </div>
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-4">
                    <div class="u-container-layout u-valign-middle u-container-layout-4">
                      <h6 class="u-align-center u-text u-text-default u-text-4"><?php $jezik == "hrv" ? print_r(TKOSMO[0]) : print_r(TKOSMO[1]) ?></h6>
                      <h3 class="u-align-center u-custom-font u-font-playfair-display u-text u-text-5"><?php $jezik == "hrv" ? print_r(TKOOPIS[0]) : print_r(TKOOPIS[1]) ?></h3>
                     
                      <a href="tko_smo_mi.php" class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-2"><?php $jezik == "hrv" ? print_r(VISE[0]) : print_r(VISE[1]) ?></a>
                    </div>
                  </div>
                  <div class="u-container-style u-image u-layout-cell u-size-20 u-image-3" style="background-image: url('<?php echo $rowSlikeInfo[2]["putanja"];?>');">
                    <div class="u-container-layout u-container-layout-5"></div>
                  </div>
                  <div class="u-container-style u-layout-cell u-right-cell u-size-20 u-layout-cell-6">
                    <div class="u-container-layout u-valign-middle u-container-layout-6">
                      <h6 class="u-align-center u-text u-text-default u-text-7"><?php echo SLOGAN;?></h6>
                      <h3 class="u-align-center u-custom-font u-font-playfair-display u-text u-text-default u-text-8"><?php $jezik == "hrv" ? print_r(SLOGANTEKST[0]) : print_r(SLOGANTEKST[1]) ?></h3>
                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="u-align-center u-clearfix u-grey-5 u-section-2" id="carousel_9232">
    <?php
					$stmt = $mysqli->prepare("SELECT * FROM menu WHERE jezik=?");
          $stmt->bind_param("s", $jezik);
					$stmt->execute();
					$result = $stmt->get_result();
						
					?>
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h6 class="u-text u-text-default u-text-1"><?php $jezik == "hrv" ? print_r(MENI[0]) : print_r(MENI[1]) ?></h6>
        <h2 class="u-custom-font u-font-playfair-display u-text u-text-default u-text-2"><?php $jezik == "hrv" ? print_r(MENIPREPORUKA[0]) : print_r(MENIPREPORUKA[1]) ?></h2>
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1"><?php
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) :?>
            <div class="u-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-1">
                <h6 class="u-text u-text-default u-text-3"><?php echo $row['naziv'] ?></h6>
                <p class="u-text u-text-4"><?php echo $row['opis'] ?></p>
              </div>
            </div>
            <?php endwhile; 
					?>
          </div>
          <a href="menu.php" class="u-active-none u-border-2 u-border-black u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-2" style="margin-left: auto; margin-right: auto;"><?php $jezik == "hrv" ? print_r(VISE[0]) : print_r(VISE[1]) ?></a>
        </div>
      </div>
    </section>
   

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2><?php $jezik == "hrv" ? print_r("Recenzije") : print_r("Reviews") ?></h2>

              <a href="recenzije.php"><?php $jezik == "hrv" ? print_r(VISE[0]) : print_r(VISE[1]) ?><i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
           <?php 
            $stmt1 = $mysqli->prepare("Select * from recenzije");
            $stmt1->execute();
            $resultRec = $stmt1->get_result();
            while ($rowRec = mysqli_fetch_array($resultRec, MYSQLI_ASSOC)) :?>
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4><?php echo $rowRec["ime"];?></h4>
                  <p class="n-m"><em><?php echo $rowRec["komentar"];?></em></p>
                </div>
              </div>
              <?php endwhile; ?>
              </div>
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
            <div class="popup-gallery" style="margin-left:10%; margin-right:10%;">
              <?php
                $stmt2 = $mysqli->prepare("SELECT * from slike WHERE kategorija=? ");
                $stmt2->bind_param("s", $kategorija[0]);
                $stmt2->execute();
                $resultSlikeGal = $stmt2->get_result();
                while ($rowSlikeGal = mysqli_fetch_array($resultSlikeGal, MYSQLI_ASSOC)) :?>
                <a href="<?php echo $rowSlikeGal["putanja"];?>" title=""><img src="<?php echo $rowSlikeGal["putanja"];?>" width="180" height="180"></a>
              <?php endwhile; ?> 
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
  </body>
</html>
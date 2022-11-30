<?php
    require "konstante.php";
    require "bazaPodataka.php";
    $jezik = isset($_COOKIE['jezik']) ?  $_COOKIE['jezik'] : "hrv";

    if (isset($_POST["Dodaj"])) {
      if (strlen($_POST["name"]) > 0 && strlen($_POST["message"]) > 0) {
        $name = $_POST['name'];
        $message = $_POST['message'];
        $stmt = $mysqli->prepare("INSERT INTO  recenzije( ime, komentar) VALUES(?,?)");
        $stmt->bind_param("ss", $name, $message);
    
        $stmt->execute();
        $mysqli->close();
        header("Location: recenzije.php");
      } 
     }
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
    <div class="page-heading about-heading header-text" style="background-image: url(assets/slike/r1.jpeg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
             
              <h2><?php $jezik == "hrv" ? print_r(RECENZIJE[0]) : print_r(RECENZIJE[1]) ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="services section-background">
    <div class="put-comment-div" style="  width:fit-content; margin:0 auto;">    
      <a href="#put-comment" class="filled-button" style="text-align:center; margin-bottom: 1.5rem;"><?php $jezik == "hrv" ? print_r("Ostavi komentar") : print_r("Leave a comment") ?></a>
    </div>  
      <div class="container">
        <div class="row">
        <?php 
            $stmt1 = $mysqli->prepare("Select * from recenzije");
            $stmt1->execute();
            $resultRec = $stmt1->get_result();
            while ($rowRec = mysqli_fetch_array($resultRec, MYSQLI_ASSOC)) :?>
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4><?php echo $rowRec["ime"];?></h4>
                <p class="n-m"><em><?php echo $rowRec["komentar"];?></em></p>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
   
    <section id="put-comment">
      <div class="send-message">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2><?php $jezik == "hrv" ? print_r(RECENZIJAFORMA[0]) : print_r(RECENZIJAFORMA[1]) ?></h2>
              </div>
            </div>
            <div class="col-md-8">
              <div class="contact-form">
                <form id="recenzija" action="recenzije.php" method="post">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <fieldset>
                        <input name="name" type="text" class="form-control" id="name" placeholder="<?php $jezik == "hrv" ? print_r(POLJAKONTAKT[0]) : print_r(POLJAKONTAKTENG[1]) ?>" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="<?php $jezik == "hrv" ? print_r(POLJAKONTAKT[3]) : print_r(POLJAKONTAKTENG[3]) ?>"required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="filled-button" name="Dodaj" value="Dodaj"><?php $jezik == "hrv" ? print_r(POLJAKONTAKT[4]) : print_r(POLJAKONTAKTENG[4]) ?></button>
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

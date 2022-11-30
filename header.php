<?php
if (isset($_POST["hrv"])) {
  setcookie("jezik", "hrv", 0);
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
exit;
}
if (isset($_POST["eng"])) {
  setcookie("jezik", "eng", 0);
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
   <!-- Header -->
   <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php"><h2>
        <?php $jezik == "hrv" ? print_r(' Stara <em>Kuća</em>') : print_r(' Stara <em>Kuća</em>') ?></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php"><?php $jezik == "hrv" ? print_r("Početna") : print_r("Home") ?>
                    <span class="sr-only">(current)</span>
                  </a>
              </li> 
              <li class="nav-item"><a class="nav-link" href="opg.php">OPG</a></li>


              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php $jezik == "hrv" ? print_r("Više") : print_r("More") ?></a>
                  
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="o_nama.php"><?php $jezik == "hrv" ? print_r(ONAMA[0]) : print_r(ONAMA[1]) ?></a>
                    <a class="dropdown-item" href="tko_smo_mi.php"><?php $jezik == "hrv" ? print_r(TKOSMO[0]) : print_r(TKOSMO[1]) ?></a>
                    <a class="dropdown-item" href="recenzije.php"><?php $jezik == "hrv" ? print_r("recenzije") : print_r("reviews") ?></a>
                  </div>
              </li>
              
              <li class="nav-item"><a class="nav-link" href="kontakt.php"><?php $jezik == "hrv" ? print_r("Kontakt") : print_r("Contact") ?></a></li>
              <form action="header.php" method="post" style="position: absolute;right: 0;">
                <button type="submit" name="hrv" value="hrv">
                  <img src="assets/icons/croatia.png" alt="hrv" title="hrv" style="width: 20px;height: 20px;"/>
              </button>
              <button type="submit" name="eng" value="eng">
                  <img src="assets/icons/united-kingdom.png" alt="eng" title="eng" style="width: 20px;height: 20px;" />
              </button>
              </form>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  </html>
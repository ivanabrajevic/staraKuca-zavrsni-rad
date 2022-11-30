<?php


  $lang['lang-eng'] = 'English';
  $lang['lang-hrv'] = 'Hrvatski';
function postaviJezik($tablica) {
  require "bazaPodataka.php";
    
    session_start();
    
    if(isset( $GET["la"]))
    {
    if($_GET["la"]){
        $_SESSION['la'] = $_GET['la'];
        header('Location:'.$_SERVER['PHP_SELF']);
        exit();
    }
  }

    /*$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "staraKuca";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }
*/
  

    switch($_SESSION['la']){
        case 'eng':
            $sql = "SELECT * FROM $tablica where jezik='eng'";
            $result = $mysqli->query($sql);
            return $row = mysqli_fetch_assoc($result);
        break;
        case 'hrv':
            $sql = "SELECT * FROM $tablica where jezik='hrv'";
            $result = $mysqli->query($sql);
            return $row = mysqli_fetch_assoc($result);
        break;
        default:
            $sql = "SELECT * FROM $tablica where jezik='hrv'";
            $result = $mysqli->query($sql);
            return $row = mysqli_fetch_assoc($result);
        }
}
?>

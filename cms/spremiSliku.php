<?php
  session_start();

  if (!(isset($_SESSION['korisnicko_ime']))){
      header("Location: admin.php");
      exit();
  }
require "../bazaPodataka.php";
$kategorija=$_POST["kategorija"];
if($_SERVER['REQUEST_METHOD']==='POST'){
  print_r("1");
    //Slika obrada
    if(isset($_FILES["file"]["type"]))
    {
      print_r("2");
        $validextensions = array("jpeg", "jpg", "png","JPG","JPEG","PNG");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
            ) && ($_FILES["file"]["size"] < 1000000000)//Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)) {
              print_r("3");
        $uploaddir="../assets/slike/";
            $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = $uploaddir.$_FILES['file']['name']; // Target path where file is to be stored
            if(file_exists($targetPath)) {
              print_r("4");
                chmod($targetPath,0755); //Change the file permissions if allowed
                unlink($targetPath); //remove the file
            }
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
            $putanja = str_replace("../", "", $targetPath);
            $stmt = $mysqli->prepare("INSERT INTO slike (putanja, kategorija) VALUES(?,?)");
            $stmt->bind_param("ss", $putanja, $kategorija);
            $stmt->execute();
            header('Location: ' . $_SERVER["HTTP_REFERER"] );
            exit;
        }
        else
        {
            header("Location:slike.php?error=slika krivog formata!");
        }
        
   }

}

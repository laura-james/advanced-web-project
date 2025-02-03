<?php
session_start();
ini_set('display_errors', 1); 
include("includes/connectdb.php");
?>

<?php 
//TODO check that user is logged in and is an admin
 print_r($_POST);
 
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $course_id= $_POST["course_id"];      
    $name = $_POST["name"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $capacity = $_POST["capacity"];
    
    $stmt = $conn->prepare("UPDATE courses SET name = ?, description = ?, date = ?, capacity = ?  WHERE course_id = ?");
    $stmt->bind_param("sssii", $name,$description,$date,$capacity,$course_id);
    
    if (!$stmt->execute()) {
        echo("Error description: " . $conn -> error);
        die();
    }
    echo "course updated <br>";


    //uploading file code - credit W3Schools
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["courseimage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["courseimage"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["courseimage"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["courseimage"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["courseimage"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    //update image in database
    $stmt = $conn->prepare("UPDATE courses SET courseimage = ?  WHERE course_id = ?");
    $stmt->bind_param("ss", $_FILES["courseimage"]["name"],$course_id);
    
    if (!$stmt->execute()) {
        echo("Error description: " . $conn -> error);
        die();
    }
    echo "course updated <br>";

     
 }
?>

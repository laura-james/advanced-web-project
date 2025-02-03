<?php
session_start();
ini_set('display_errors', 1);
//logging out 

session_destroy();
$_SESSION["isLoggedIn"] = false;
$_SESSION["username"] = "";
$_SESSION["isAdmin"] = "";

header("Location: index.php");
/*
// establish connection to database 
$conn = new mysqli('176.74.20.8', 'geekcandy_webpuser', 'Z4D6F8','geekcandy_webproject');

// get values from the form data
$sender="user1";
$email="email1";

// prepare SQL statement with parameters
//$sql = $conn->prepare('INSERT INTO users (username,password) VALUES ("HELLO", "world")');
$sql = $conn->prepare('INSERT INTO users (username,password) VALUES (?, ?)');
$sql->bind_param("ss",$sender, $email);
//$sql->execute();


// execute SQL statement
if ($sql->execute()) {
  echo '<p>Thanks for contacting us'.$sender;
  echo '<br/>';
  echo 'We will send your newsletter to <strong>'.$email.'</strong>.</p>';
  echo '<br/>';
  
} else {
  echo 'Error: '.$sql.'<br>'.mysqli_error($conn);
}

// close connection
mysqli_close($conn);
*/

?>
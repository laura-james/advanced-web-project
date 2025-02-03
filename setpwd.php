<?php
session_start();
ini_set('display_errors', 1);
//logging out
session_destroy();
//header("Location: /index.php");

// establish connection to database 
$conn = new mysqli('176.74.20.8', 'geekcandy_webpuser', 'Z4D6F8','geekcandy_webproject');


$newpassword = password_hash("foundation123", PASSWORD_BCRYPT);
echo $newpassword;

// prepare SQL statement with parameters
//$sql = $conn->prepare('INSERT INTO users (username,password) VALUES ("HELLO", "world")');
$sql = $conn->prepare('UPDATE users SET password=?');
$sql->bind_param("s",$newpassword);
//$sql->execute();


// execute SQL statement
if ($sql->execute()) {
  echo 'success';
  echo '<br/>';
  
} else {
  echo 'Error: '.$sql.'<br>'.mysqli_error($conn);
}

// close connection
mysqli_close($conn);


?>
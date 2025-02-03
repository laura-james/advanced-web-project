<?php
//https://www.php.net/manual/en/function.password-verify.php
//https://www.php.net/manual/en/function.password-hash.php
session_start();
ini_set('display_errors', 1);

include("includes/connectdb.php");
?>

<?php 
 
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if($password!=  $password2){
        echo "<p style='color:red;font-weight:bold'>Passwords do not match</p>";
    }else{
        $hash = password_hash($password, PASSWORD_DEFAULT);
        //$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, dob, username,email, password) VALUES (?, ?, ?, ?,?, ?)");
        $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, dob=?, username=?,email=?");
        $stmt->bind_param("sssss", $firstname, $lastname, $dob, $username, $email);
        #TODO add password
        $stmt->execute();
        echo "Edit user record successfully";
        header("Location: index.php");
    }
 }
?>

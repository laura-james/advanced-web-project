<?php
//https://www.php.net/manual/en/function.password-verify.php
//https://www.php.net/manual/en/function.password-hash.php
session_start();
ini_set('display_errors', 1); 

include("includes/connectdb.php");
?>

<?php 
 //print_r($_POST);
 
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $stmt = $conn->prepare("SELECT * from users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result2 = $stmt->get_result();

    if (!$result2) {
      echo("Error description: " . $conn -> error);
      die();
    }
     echo "number of users found".$result2->num_rows ."<br>";
     if($result2->num_rows > 0){ 
        //echo  $result2->num_rows ." users found<br>"; 
        while ($row = $result2->fetch_assoc()){   
            //echo $row["username"]." - ".$row["password"]."<br>"; 
            //echo $username." - ".$password."<br>"; 
            //echo "verify?".password_verify($_POST["password"], $row["password"]);
            if(password_verify($_POST["password"], $row["password"])){
                echo "USER FOUND!!";
                //set session variables
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["username"] = $row["first_name"] ;
                $_SESSION["userid"] = $row["id"] ;
                $_SESSION["isAdmin"] = $row["isAdmin"] ;
                header("Location: index.php");
            }else{
                //echo ("<p style='color:red;font-weight:bold'> Incorrect password </p>");
                header("Location: index.php?msg=Incorrect password");
            }
        }
     }elseif($username=="" || $password==""){
         //echo("<p style='color:red;font-weight:bold'> You must enter both username and password</p>"); 
         header("Location: index.php?msg=You must enter both username and password"); 
     }else{
         //echo("<p style='color:red;font-weight:bold'>Invalid name or password</p>");
         header("Location: index.php?msg=Invalid name or password"); 
     }
 }

 
?>

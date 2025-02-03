<?php session_start();
ini_set('display_errors', 1); 

include("includes/connectdb.php");?>
<?php include "includes/header.php" ?>


<?php
   if ($_SESSION["isLoggedIn"] == true) { 
    $userid = $_SESSION["userid"];
    $sql = "SELECT * FROM users WHERE id=?";
    //echo $sql. " ". $userid;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
      echo "Error description: " . $conn -> error;
    }
     //echo "num rows = ".$result->num_rows;
     if($result->num_rows > 0){ 
        while ($row = $result->fetch_assoc()){   
            $firstname = $row["first_name"];
            $lastname = $row["last_name"];
            $dob = $row["dob"];
            $username = $row["username"];
            $email = $row["email"];
        }//endwhile
     }//endif
    } else { 
      //redirect if not logged in
      header("Location: index.php");
    } ?>


<section>
  <h2>Edit Account</h2>
  
  Please enter your details to edit your account details:
  <form action = "editaccountaction.php" method = "post">
      <label>First Name:</label>    <input type = "text" name = "firstname" value="<?php echo $firstname?>"><br>
      <label>Last Name:</label>    <input type = "text" name = "lastname" value="<?php echo  $lastname?>"><br>
      <label>Date of birth:</label>    <input type = "date" name = "dob" value="<?php echo $dob?>"><br>
      <label>UserName:</label>    <input type = "text" name = "username" value="<?php echo $username?>"><br>
      <label>Email:</label>    <input type = "email" name = "email" value="<?php echo $email?>"><br>
      <p>Leave password blank if you do not want to change it</p>
      <label>Password:</label> <input type = "password" name = "password"><br>
      <label>Repeat Password:</label> <input type = "password" name = "password2"><br>
      <input type="submit" value="Login">
  </form>
  
  
    </section>
    <?php include "includes/footer.php" ?>
  </body>
</html>
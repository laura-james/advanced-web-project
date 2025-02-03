<?php session_start();?>
<?php include "includes/header.php" ?>
<section>
  <h2>Register</h2>
  
  Please enter your details to register and to use the site:
    
  
  <form action = "registeraction.php" method = "post">
      <label>First Name:</label>    <input type = "text" name = "firstname"><br>
      <label>Last Name:</label>    <input type = "text" name = "lastname"><br>
      <label>Date of birth:</label>    <input type = "date" name = "dob"><br>
      <label>UserName:</label>    <input type = "text" name = "username"><br>
      <label>Email:</label>    <input type = "email" name = "email"><br>
      <label>Password:</label> <input type = "password" name = "password"><br>
      <label>Repeat Password:</label> <input type = "password" name = "password2"><br>
      <input type="submit" value="Login">
  </form>
  
  
    </section>
    <?php include "includes/footer.php" ?>
  </body>
</html>
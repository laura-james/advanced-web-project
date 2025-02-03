<?php session_start();?>
<?php include "includes/header.php" ?>
<section>
  <?php
   if ($_SESSION["isLoggedIn"] == true) { ?>
      <h2>Welcome <?php echo $_SESSION["username"]?></h2>
      <a href="logout.php">Logout</a>
    
    <?  } else { ?>
      Please login to use the site
    
      <h2>Login</h2>
      <form action = "login.php" method = "post">
          <label>Name:</label>    <input type = "text" name = "username">
          <br>
          <label>Password:</label> <input type = "password" name = "password">
          <br>
          <input type="submit" value="Login">
          <h3 class="error"><?php echo $_REQUEST["msg"]; ?></h3>
      </form>
      Or register here <a href="register.php">Register</a>
    <?  } ?>
    </section>
    <section>
        <h1>To do</h1>
        <br><input type="checkbox" name="packersOff" value="1" checked="checked"/><label class="strikethrough">make login page go straight to index of successful</label>
        <br><input type="checkbox" name="packersOff" value="1" checked="checked"/><label class="strikethrough">ow to show validation errors?</label>
        <br><input type="checkbox" name="packersOff" value="1" checked="checked"/><label class="strikethrough">Categories for courses</label>
        <br><input type="checkbox" name="packersOff" value="1" checked="checked"/><label class="strikethrough">edit account details page</label>
        <br><input type="checkbox" name="packersOff" value="1" checked="checked"/><label class="strikethrough">Search page for courses***</label>
        <br><input type="checkbox" name="packersOff" value="1" /><label class="strikethrough">prevent course being booked if full?</label>      
        <br><input type="checkbox" name="packersOff" value="1" /><label class="strikethrough">Phase 3  - Admin page to edit courses?</label>
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough">Display capacity and status available AND if Course Full</label>
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough">if booked on course, hide the "click here to book on course link" and instead show remove booking ( should we set status to cancelled?)</label>
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough">new user edit account page (similar to register)</label>
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough">change upload course image to send msg string back to the page rather than just text</label>
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough">allow users to select top three categories when they register/edit account</label>
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough">show the top categories on the search page</label>
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough">on users logged in home page show blocks with edit account (need new page), view bookings, view courses, search courses</label>
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough">Add Course Pal to header and remove welcome to course pal on every page header</label>
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough">change page title dynamically depending on which page</label>
        
        
        
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough">Show dates just as ddmmYYYY</label>
       
        <br><input type="checkbox" name="packersOff" value="1"/><label class="strikethrough"></label>
        
        
       
        
        
        


    <?php include "includes/footer.php" ?>
  </body>
</html>
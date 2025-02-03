<html>
  <head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Pal - find computing and tech courses easily</title>
    <!-- Link to External Stylesheet -->
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
<nav>
  <a href="index.php" class="logolink"><img src="images/course image.svg" width =100></a>
<?php if ($_SESSION["isLoggedIn"] == true) { ?>
  <a href="index.php">Home</a> 
  <a href="account.php">My Account</a>
  <a href="courses.php">Courses</a>
  <?php if ($_SESSION["isAdmin"] == 1) { ?>
    <a href="admin.php">Admin</a>
  <?php } ?>
  <a href="logout.php">Logout</a>
<?php } else { ?>
  <a href="index.php">Login</a> 
  <a href="register.php">Register</a> 
<? } ?>
</nav>
<header>
  <h1>Welcome to Course Pal!</h1>
</header>
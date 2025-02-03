<?php session_start();?>
<?php include "includes/header.php" ?>
<?php include "includes/connectdb.php" ?>
    <section>
    <h2>Booking</h2>
<?php
   if ($_SESSION["isLoggedIn"] == true) { 
    $id= $_GET["id"];
    $userid = $_SESSION["userid"];
    $stmt = $conn->prepare("INSERT INTO `bookings` ( `user_id`, `course_id`, `booking_date`) VALUES ( ?, ?, CURRENT_TIMESTAMP)");
    $stmt->bind_param("ii", $userid,$id);
    if( $stmt->execute()){

      echo"Booking created successfully";
    }else{
      echo "Booking not successful - check if you have already booked this course!";
    }
  } else { 
      //redirect if not logged in
      header("Location: index.php");
  } ?>
    </section>
    <?php include "includes/footer.php" ?>
  </body>
</html>
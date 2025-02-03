<?php session_start();?>
<?php include "includes/header.php" ?>
<?php include "includes/connectdb.php" ?>
<section>
  <h2>My Account</h2>
  <p><a href="editaccount.php">Edit Account Details</a></p>
    <?php
   if ($_SESSION["isLoggedIn"] == true) { 
    $userid = $_SESSION["userid"];
    $stmt = $conn->prepare("SELECT * FROM bookings,courses 
    WHERE courses.course_id=bookings.course_id AND user_id=?
    ORDER BY booking_date DESC;");
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
      echo "Error description: " . $conn -> error;
    }
     echo "You are currently booked on ".$result->num_rows ." courses.<br>";
     if($result->num_rows > 0){ 
        echo "<table border=1><tr>";
        echo "<th>Course ID</th>";
        echo "<th>Name</th>";
        echo "<th>Description</th>";
        echo "<th><a href='?order=date'>Date</a></th>";
        echo "<th>Booking Date</th>";
        echo "<th></th>";
        echo "<th></th></tr>"; 
        while ($row = $result->fetch_assoc()){   
            //echo $row["course_id"]." - ".$row["name"]." - ".$row["description"]." - ".$row["date"]."<br>"; 
            echo "<tr><td>".$row["course_id"]."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["description"]."</td>";
            echo "<td>".$row["date"]."</td>";
            echo "<td>".$row["booking_date"]."</td>";
            echo "<td><a href='course.php?id=".$row["course_id"]."'>Learn more</a></td>";
            echo "<td><a href='cancel.php?id=".$row["course_id"]."'>Cancel booking</a></td></tr>";
        }
      echo "</table>";
     }
    } else { 
      //redirect if not logged in
      header("Location: index.php");
      } ?>



    <?php include "includes/footer.php" ?>
  </body>
</html>
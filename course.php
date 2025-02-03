<?php session_start();?>
<?php include "includes/header.php" ?>
<?php include "includes/connectdb.php" ?>
    <section>
    <h2>Course Details</h2>
<?php
   if ($_SESSION["isLoggedIn"] == true) { 
    $id= $_GET["id"];
    $sql = "SELECT *,(SELECT COUNT(bookings.booking_id) FROM `bookings` where bookings.course_id = courses.course_id) as total FROM courses WHERE course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
      echo "Error description: " . $conn -> error;
    }
     echo "Number of courses found".$result->num_rows ."<br>";
     if($result->num_rows > 0){ 
        echo  "<table border=1><tr><th>Course ID</th><th>Name</th><th>Description</th><th>Date</th><th>Capacity</th><th>Bookings</th></tr>"; 
        while ($row = $result->fetch_assoc()){   
            $courseid= $row["course_id"];
            $courseimage= $row["courseimage"];
            //echo $row["course_id"]." - ".$row["name"]." - ".$row["description"]." - ".$row["date"]."<br>"; 
            echo "<tr><td>".$row["course_id"]."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["description"]."</td>";
            echo "<td>".$row["date"]."</td>";
            echo "<td>".$row["capacity"]."</td>";
            echo "<td>".$row["total"]."</td>";
            echo "</tr>";
        }
      echo "</table>";
      echo "<img src='uploads/".$courseimage."' width='200'><br>";
      echo "<a href='book.php?id=".$courseid."'>click here to book on course</a><br>";
      echo "Admin user - <a href='courseedit.php?id=".$courseid."'>click here to edit this course</a>";
     }
    } else { 
      //redirect if not logged in
      header("Location: index.php");
      } ?>
    </section>
    <?php include "includes/footer.php" ?>
  </body>
</html>
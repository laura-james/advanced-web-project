<?php session_start();
ini_set('display_errors', 1); ?>
<?php include "includes/header.php" ?>
<?php include "includes/connectdb.php" ?>
    <section>
    <h2>Courses List</h2>
    <div class="searchbox">
    <form  method = "get">
          <label>Search:</label>
          <input type = "text" name = "search">          
          <input type="submit" value="Search">
    </form>
    </div>
<?php
   if ($_SESSION["isLoggedIn"] == true) { 
    $sql = "SELECT *,
    (SELECT COUNT(bookings.booking_id) FROM `bookings` where bookings.course_id = courses.course_id) as total 
    FROM courses,categories 
    WHERE courses.category_id = categories.category_id";
   if (!empty($_REQUEST["search"]) ){ //just search query
      $search = "%".$_REQUEST["search"]."%";
      $sql .= " AND (category_name LIKE ?";
      $sql .= " OR name LIKE ?";
      $sql .= " OR description LIKE ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sss", $search,$search,$search);
    }else if (!empty($_REQUEST["order"])){ // just order query
      $sql .= " ORDER BY ".$_REQUEST["order"];
      echo $sql;
      $stmt = $conn->prepare($sql);
      //$stmt->bind_param("s", $_REQUEST["order"]);
    }else{
      $stmt = $conn->prepare($sql);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
      echo "Error description: " . $conn -> error;
    }
     echo "Number of courses found".$result->num_rows ."<br>";
     if($result->num_rows > 0){ 
        echo "<table border=1><tr>";
        echo "<th><a href='?order=course_id'>ID</a></th>";
        echo "<th><a href='?order=category_name'>Category</a></th>";
        echo "<th> </th>";
        echo "<th><a href='?order=name'>Course Name</a></th>";
        echo "<th><a href='?order=description'>Description</a></th>";
        echo "<th><a href='?order=date'>Date</a></th>";
        echo "<th></th></tr>";
        while ($row = $result->fetch_assoc()){   
            //echo $row["course_id"]." - ".$row["name"]." - ".$row["description"]." - ".$row["date"]."<br>"; 
            echo "<tr><td>".$row["course_id"]."</td>";
            echo "<td>".$row["category_name"]."</td>";
            echo "<td><img src='uploads/".$row["courseimage"]."' width='50'></td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["description"]."</td>";
            echo "<td>".$row["date"]."</td>";
            echo "<td><a href='course.php?id=".$row["course_id"]."'>Learn more</a></td></tr>";
        }
      echo "</table>";
     }
    } else { 
      //redirect if not logged in
      header("Location: index.php");
      } ?>
    </section>
    <?php include "includes/footer.php" ?>
  </body>
</html>
<?php 
/*
if ($_REQUEST["search"]!="" && $_REQUEST["order"]!="") {  //both search and order queries
      $search = "%".$_REQUEST["search"]."%";
      $sql .= " AND (category_name LIKE ?";
      $sql .= " OR name LIKE ?";
      $sql .= " OR description LIKE ?)";
      $sql .= " ORDER BY ".$_REQUEST["order"];
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sss", $search,$search,$search);
  }else
  9*0um&e8PSEGNl!i(o
  */?>
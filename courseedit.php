<?php session_start();
ini_set('display_errors', 1);?>
<?php include "includes/header.php" ?>
<?php include "includes/connectdb.php" ?>
<section>
    <h2>Edit Course Details</h2>
<?php
   if ($_SESSION["isLoggedIn"] == true) { 
      $id= $_GET["id"];
      $sql = "SELECT * FROM courses WHERE course_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      if (!$result) {
        echo "Error description: " . $conn -> error;
      }//end if
      echo "Number of courses found".$result->num_rows ."<br>";
      if($result->num_rows > 0){ 
        while ($row = $result->fetch_assoc()){   
            $course_id= $row["course_id"];      
            $name = $row["name"];
            $description = $row["description"];
            $date = $row["date"];
            $capacity = $row["capacity"];       
        }//end while
        ?>
        <form action = "courseeditaction.php" method = "post" enctype="multipart/form-data">
        <input type = "hidden" name = "course_id" value="<?php echo $course_id;?>">
          <label>Course Name:</label><input type = "text" name = "name" value="<?php echo $name;?>"><br>
          <label>Course Description:</label> <textarea cols="100" rows="10" name="description"><?php echo $description;?></textarea><br>
          <label>Date:</label>    <input type = "datetime-local" name = "date" value="<?php echo $date;?>"><br>
          <label>Capacity:</label>    <input type = "test" name = "capacity" value="<?php echo $capacity;?>"><br>
          <label>Image:</label> <input type = "file" name = "courseimage"><br>
          <input type="submit" value="Save Course">
        </form>
        <?php
       }//end if
     
    } else { 
      //redirect if not logged in
      header("Location: index.php");
    } ?>
    </section>
    <?php include "includes/footer.php" ?>
  </body>
</html>
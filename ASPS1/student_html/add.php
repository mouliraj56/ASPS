<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Request</h2>
    <form class="post-form" action="<?php  $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Student Reg.No</label>
            <input type="text" name="sid" />
        </div>
        
        <div class="form-group" id="textarea">
            <label>Reason</label>
            <input type="textarea" name="sreason" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Save"  />
    </form>


    <?php

        
        if(isset($_POST['showbtn'])){

        $student_id = $_POST['sid'];
        $student_reason = $_POST['sreason'];
        
        // database parameters
        $servername = "127.0.0.1"; 
        $user_name = "root";
        $password = "";
        $dbname = "asps";

        // Connect to the database
        $conn = new mysqli($servername, $user_name, $password, $dbname) or die("connection failed");
        

        $sql = "INSERT INTO student_request_data(sid, sreason, srdate, srtime, srstatus) VALUES ('{$student_id}','{$student_reason}', CURDATE(), CURTIME(), 'onwaitlist')";
        $result = mysqli_query($conn, $sql) or die("query unsucessful");

        if ($result) {
            echo "<script>alert('Query successful!');</script>";
          } else {
            echo "<script>alert('Query failed!');</script>";
          }

        mysqli_close($conn);}
    ?>


</div>
</div>
</body>
</html>

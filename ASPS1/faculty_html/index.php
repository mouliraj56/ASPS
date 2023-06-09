<?php
include 'header.php';
?>
<div id="main-content">
    <h2>4th year</h2>
    <?php
        $servername = "127.0.0.1";
        $user_name = "root";
        $password = "";
        $dbname = "asps";
      
      // Connect to the database
        $conn = new mysqli($servername,$user_name, $password, $dbname) or die("connection failed");
        
        $sql_4 ="SELECT sid, srtime, srdate, srtime, sreason FROM student_request_data WHERE sid LIKE '19KD%' AND srstatus='onwaitlist'";
        $result_4 = mysqli_query($conn, $sql_4) or die("query unsucessful");
        
        if(mysqli_num_rows($result_4)>0) {
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Reg ID</th>
        <th>Time</th>
        <th>date</th>
        <th>reason</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result_4)){
            ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['srtime']; ?></td>
                <td><?php echo $row['srdate']; ?></td>
                <td><?php echo $row['sreason']; ?></td>
                <td>
                <a href='accept.php?sid=<?php echo $row['sid']; ?>'>Accept</a>
                <a href='reject.php?sid=<?php echo $row['sid']; ?>'>Reject</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } else{
        echo '<div id="result"><table><thead ><th>No Record Found </th></thead></table></div>';
    } ?> 

<!-------------------------------------------------------------------------------------------- -->

    <h2>3rd year</h2>
    <?php
        $sql_3 ="SELECT sid, srtime, srdate, srtime, sreason FROM student_request_data WHERE sid LIKE '20KD%' AND srstatus='onwaitlist'";
        $result_3 = mysqli_query($conn, $sql_3) or die("query unsucessful");
        
        if(mysqli_num_rows($result_3)>0) {
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Reg ID</th>
        <th>Time</th>
        <th>date</th>
        <th>reason</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result_3)){
            ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['srtime']; ?></td>
                <td><?php echo $row['srdate']; ?></td>
                <td><?php echo $row['sreason']; ?></td>
                <td>
                    
                    <a href='accept.php?sid=<?php echo $row['sid']; ?>'>Accept</a>
                    <a href='reject.php?sid=<?php echo $row['sid']; ?>'>Reject</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } else{
        echo '<div id="result"><table><thead ><th>No Record Found </th></thead></table></div>';
    }?>
<!----------------------------------------------------------------->
<h2>2nd year</h2>
    <?php
        $sql_2 ="SELECT sid, srtime, srdate, srtime, sreason FROM student_request_data WHERE sid LIKE '21KD%' AND srstatus='onwaitlist'";
        $result_2 = mysqli_query($conn, $sql_2) or die("query unsucessful");
        
        if(mysqli_num_rows($result_2)>0) {
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Reg ID</th>
        <th>Time</th>
        <th>date</th>
        <th>reason</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result_2)){
            ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['srtime']; ?></td>
                <td><?php echo $row['srdate']; ?></td>
                <td><?php echo $row['sreason']; ?></td>
                <td>
                    <a href='accept.php?sid=<?php echo $row['sid']; ?>'>Accept</a>
                    <a href='reject.php?sid=<?php echo $row['sid']; ?>'>Reject</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } else{
        echo '<div id="result"><table><thead ><th>No Record Found </th></thead></table></div>';
    }?>
<!-------------------------------------------------------------->
<h2>1st year</h2>
    <?php
        $sql_1 ="SELECT sid, srtime, srdate, srtime, sreason FROM student_request_data WHERE sid LIKE '22KD%' AND srstatus='onwaitlist'";
        $result_1 = mysqli_query($conn, $sql_1) or die("query unsucessful");
        
        if(mysqli_num_rows($result_1)>0) {
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Reg ID</th>
        <th>Time</th>
        <th>date</th>
        <th>reason</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result_1)){
            ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['srtime']; ?></td>
                <td><?php echo $row['srdate']; ?></td>
                <td><?php echo $row['sreason']; ?></td>
                <td>
                    <a href='accept.php?sid=<?php echo $row['sid']; ?>'>Accept</a>
                    <a href='reject.php?sid=<?php echo $row['sid']; ?>'>Reject</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } else{
        echo '<div id="result"><table><thead ><th>No Record Found </th></thead></table></div>';
    }?>


</div>
</div>
</body>
</html>

<?php
include 'header.php';
?>

<div id="main-content">
    <h2>Previous Records of Requesting Permission</h2>

    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Reg ID</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <?php
    if (isset($_POST['showbtn'])) {
        $servername = "127.0.0.1";
        $user_name = "root";
        $password = "";
        $dbname = "asps";

        // Connect to the database
        $conn = new mysqli($servername, $user_name, $password, $dbname) or die("connection failed");
        $sid = $_POST['sid'];

        $sql_4 = "SELECT srdate, srtime, sreason, srstatus FROM student_request_data WHERE sid='{$sid}'";
        $result_4 = mysqli_query($conn, $sql_4) or die("query unsucessful");
        ?>

        <h2>Student ID: <?php echo $sid; ?></h2>
        <table cellpadding="7px">
            <thead>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result_4) > 0) {
                    while ($row = mysqli_fetch_assoc($result_4)) {
                ?>
                        <tr>
                            <td><?php echo $row['srdate']; ?></td>
                            <td><?php echo $row['srtime']; ?></td>
                            <td><?php echo $row['sreason']; ?></td>
                            <td><?php echo $row['srstatus']; ?></td>
                            <!-- <td>
                                <a href='edit.php'>Accept</a>
                                <a href='delete-inline.php'>Reject</a>
                            </td> -->
                        </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="4" align=center>
                            <h2>No Record Found </h2>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        mysqli_close($conn);
    }
    ?>
</div>
</div>
</body>

</html>

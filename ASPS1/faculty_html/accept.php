<?php

$servername = "127.0.0.1";
$user_name = "root";
$password = "";
$dbname = "asps";
      
// Make a database connection
$conn = new mysqli($servername,$user_name, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the sid value from the URL
$sid = $_GET['sid'];

// Update the status of the request to "accepted"
$sql = "UPDATE student_request_data SET srstatus='accepted' WHERE sid='$sid'";
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location.href='index.php';alert('Request accepted successfully.');</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the sid linked to the UIDresult from tbl_data
$UIDresult = $_POST["UIDresult"];
$sql = "SELECT sid FROM tbl_data WHERE uid='$UIDresult'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // If the record exists in tbl_data, get the srstatus from student_request_data table
  $row = mysqli_fetch_assoc($result);
  $sid = $row["sid"];
  $sql = "SELECT srstatus FROM student_request_data WHERE sid='$sid'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // If the record exists in student_request_data table, check the srstatus and print the message accordingly
    $row = mysqli_fetch_assoc($result);
    $srstatus = $row["srstatus"];

    if ($srstatus == "accepted") {
      echo "Access granted";
    } else if ($srstatus == "rejected") {
      echo "Access denied";
    } else {
      echo "No user exists";
    }
  } else {
    echo "No user exists";
  }
} else {
  echo "No user exists";
}

mysqli_close($conn);
?>

<?php
// Connect to the database
    $con = mysqli_connect("localhost","id21003560_nelia","Brahman@2020","id21003560_localhost");

// Check connection
if (mysqli_connect_errno()) {
  die('Database connection failed: ' . mysqli_connect_error());
}

// Fetch all contacts
$sql = "SELECT * FROM contacts";
$result = mysqli_query($con, $sql);

$contacts = array();
while ($row = mysqli_fetch_assoc($result)) {
  $contacts[] = $row;
}

// Convert the contacts array to JSON and send the response
header('Content-Type: application/json');
echo json_encode($contacts);

// Close the database connection
mysqli_close($con);
?>

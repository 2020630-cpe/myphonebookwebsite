<?php
// Retrieve the contact ID from the request
$contactId = $_GET['id'];

// Connect to the database
    $con = mysqli_connect("localhost","id21003560_nelia","Brahman@2020","id21003560_localhost");

// Check connection
if (mysqli_connect_errno()) {
  die('Database connection failed: ' . mysqli_connect_error());
}

// Delete the contact with the specified ID
$sql = "DELETE FROM contacts WHERE id = " . (int)$contactId;
if (mysqli_query($con, $sql)) {
  echo 'Contact deleted successfully';
} else {
  echo 'Error: ' . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>

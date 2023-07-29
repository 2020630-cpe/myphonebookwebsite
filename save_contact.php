<?php
// Retrieve the contact data from the request
$contactData = json_decode(file_get_contents('php://input'), true);

// Connect to the database
    $con = mysqli_connect("localhost","id21003560_nelia","Brahman@2020","id21003560_localhost");

// Check connection
if (mysqli_connect_errno()) {
  die('Database connection failed: ' . mysqli_connect_error());
}

// Prepare the SQL statement based on whether it's an insert or update
if (empty($contactData['id'])) {
  $sql = "INSERT INTO contacts (id, first_name, last_name, middle_name, address, phone_number, email, notes, owner) VALUES (NULL, '" . mysqli_real_escape_string($con, $contactData['firstName']) . "', '" . mysqli_real_escape_string($con, $contactData['lastName']) . "', '" . mysqli_real_escape_string($con, $contactData['middleName']) . "', '" . mysqli_real_escape_string($con, $contactData['address']) . "', '" . mysqli_real_escape_string($con, $contactData['phoneNumber']) . "', '" . mysqli_real_escape_string($con, $contactData['email']) . "', '" . mysqli_real_escape_string($con, $contactData['notes']) . "', '')";
} elseif (!empty($contactData['id'])) {
  $sql = "UPDATE contacts SET
            first_name = '" . mysqli_real_escape_string($con, $contactData['firstName']) . "',
            last_name = '" . mysqli_real_escape_string($con, $contactData['lastName']) . "',
            middle_name = '" . mysqli_real_escape_string($con, $contactData['middleName']) . "',
            address = '" . mysqli_real_escape_string($con, $contactData['address']) . "',
            phone_number = '" . mysqli_real_escape_string($con, $contactData['phoneNumber']) . "',
            email = '" . mysqli_real_escape_string($con, $contactData['email']) . "',
            notes = '" . mysqli_real_escape_string($con, $contactData['notes']) . "'
          WHERE id = " . (int)$contactData['id'];
}

// Execute the SQL statement
if (mysqli_query($con, $sql)) {
  echo 'Contact saved successfully';
} else {
  echo 'Error: ' . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>

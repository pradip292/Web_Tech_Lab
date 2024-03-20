<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind parameters

// Set parameters and execute
$id = $_POST['id'];

// Prepare and bind the statement
$stmt = $conn->prepare("DELETE FROM student_data WHERE id = ?");

// Bind parameters
$stmt->bind_param("i", $id);

// Execute the statement
$stmt->execute();

// Check the number of affected rows
if ($stmt->affected_rows > 0) {
    echo "Record deleted successfully";
} else {
    echo "Error: Cannot find student with ID " . $id;
}

$stmt->close();
$conn->close();
?>

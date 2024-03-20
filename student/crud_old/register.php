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
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$department = $_POST['department'];

// Prepare and bind the statement
$stmt = $conn->prepare("INSERT INTO student_data (name, email, phone, dob, gender, department) VALUES (?, ?, ?,?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $dob,$gender,$department);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

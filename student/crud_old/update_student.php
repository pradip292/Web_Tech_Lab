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

// Check if the student exists
$check_sql = "SELECT * FROM student_data WHERE id = '$id'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "Student found!";
    header("Location: update_student1.php");
} else {
    echo "Student not found";
}
$conn->close();
?>
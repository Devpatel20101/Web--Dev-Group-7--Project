<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "SE";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieving all student records from the database
$sql = "SELECT * FROM book";
$result = $conn->query($sql);
$students = [];

// Checking if the query was successful and if any records are found
if ($result !== false && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Close the database connection
$conn->close();

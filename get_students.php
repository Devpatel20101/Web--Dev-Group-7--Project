<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Leave it blank for no password
$dbname = "SE";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve all student records from the database
$sql = "SELECT * FROM book";
$result = $conn->query($sql);
$students = [];

// Check if the query was successful and if any records are found
if ($result !== false && $result->num_rows > 0) {
    // Fetch all the rows as an associative array
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Close the database connection
$conn->close();

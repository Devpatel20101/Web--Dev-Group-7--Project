<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SE";

// Creating a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Checking if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data and sanitize/validate as needed
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $student_id = isset($_POST["student_id"]) ? $_POST["student_id"] : "";
    $book_borrowed = isset($_POST["book_they_have_borrowed"]) ? $_POST["book_they_have_borrowed"] : "";
    $registration_type = isset($_POST["registration_type"]) ? $_POST["registration_type"] : "";
    $file_number = isset($_POST["file_number"]) ? $_POST["file_number"] : "";

    // Preparing the INSERT query with backticks around column names
    $sql = "INSERT INTO book (`name`, `email`, `student_id`, `book_borrowed`, `registration_type`, `file_number`) 
            VALUES ('$name', '$email', '$student_id', '$book_borrowed', '$registration_type', '$file_number')";

    // Executing the query
    if ($conn->query($sql) === true) {
        //If Insertion successful, redirect to Home page.php
        header("Location: Home page.php");
        exit(); 
    } else {
        // If Insertion fails, display an error message 
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

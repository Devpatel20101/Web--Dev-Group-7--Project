<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Leave it blank for no password
$dbname = "SE";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data and sanitize/validate as needed
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $student_id = isset($_POST["student_id"]) ? $_POST["student_id"] : "";
    $book_borrowed = isset($_POST["book_they_have_borrowed"]) ? $_POST["book_they_have_borrowed"] : "";
    $registration_type = isset($_POST["registration_type"]) ? $_POST["registration_type"] : "";
    $file_number = isset($_POST["file_number"]) ? $_POST["file_number"] : "";

    // Prepare the INSERT query with backticks around column names
    $sql = "INSERT INTO book (`name`, `email`, `student_id`, `book_borrowed`, `registration_type`, `file_number`) 
            VALUES ('$name', '$email', '$student_id', '$book_borrowed', '$registration_type', '$file_number')";

    // Execute the query
    if ($conn->query($sql) === true) {
        // Insertion successful, redirect to Home page.php
        header("Location: Home page.php");
        exit(); // Make sure to exit to prevent further execution of the script
    } else {
        // Insertion failed, display an error message or handle the error accordingly
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

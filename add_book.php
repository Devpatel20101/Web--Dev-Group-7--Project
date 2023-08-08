<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; 
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
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $author = isset($_POST["author"]) ? $_POST["author"] : "";
    $isbn = isset($_POST["isbn"]) ? $_POST["ISBN"] : "";

    
    $sql = "INSERT INTO book_register (title, author, isbn) VALUES ('$title', '$author', '$isbn')";

    // Execute the query
    if ($conn->query($sql) === true) {
        // Insertion successful, displays a success message
        echo "<p>Book added successfully.</p>";
    } else {
        // Insertion failed, displays an error message 
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// Close the database connection
$conn->close();
?>

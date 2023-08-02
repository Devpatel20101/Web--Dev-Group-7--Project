<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Leave it blank for no password
$dbname = "SE"; // Replace with your actual database name "SE"

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data and sanitize/validate as needed
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // Prepare the SELECT query to check if the user exists in the database
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

    // Execute the query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists and login is successful, redirect to library syst.php
        header("Location: Home page.php");
        exit();
    } else {
        // User does not exist or incorrect login credentials
        echo "Invalid username or password.";
    }
}

// Close the database connection
$conn->close();
?>

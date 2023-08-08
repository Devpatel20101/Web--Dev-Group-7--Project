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

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieving form data and validating as needed
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // Preparing the SELECT query to check if the user exists in the database
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

    // Executing the query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // if User exists and login is successful, redirect to library syst.php
        header("Location: Home page.php");
        exit();
    } else {
        // if User does not exist or incorrect login credentials
        echo "Invalid username or password.";
    }
}

// Close the database connection
$conn->close();
?>

<?php
// Check if the student_id parameter is set in the URL
if (isset($_GET["student_id"])) {
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

    // Retrieve the student_id from the URL parameter
    $student_id = $_GET["student_id"];

    // Prepare the DELETE query
    $sql = "DELETE FROM book WHERE student_id='$student_id'";

    // Execute the DELETE query
    if ($conn->query($sql) === true) {
        // Deletion successful, redirect back to the student registration page
        header("Location: Student_registration.php");
        exit();
    } else {
        // Deletion failed, display an error message or handle the error accordingly
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the student_id parameter is not set, redirect back to the student registration page
    header("Location: Student_registration.php");
    exit();
}
?>

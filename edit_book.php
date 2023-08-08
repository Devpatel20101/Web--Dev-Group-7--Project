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

if (isset($_GET["id"])) {
    $edit_id = $_GET["id"];

    // Retrieving the book details based on the given ID
    $sql = "SELECT * FROM book_register WHERE `File number` = $edit_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $title = $row["title"];
        $author = $row["author"];
        $isbn = $row["isbn"];
    } else {
        echo "<p>Error: Book not found.</p>";
        exit;
    }
} else {
    echo "<p>Error: No book ID specified.</p>";
    exit;
}

// Handling form submission for updating book details
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data and sanitize/validate as needed
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $author = isset($_POST["author"]) ? $_POST["author"] : "";
    $isbn = isset($_POST["isbn"]) ? $_POST["isbn"] : "";

    // for updating the book details in the database
    $sql_update = "UPDATE book_register SET title = '$title', author = '$author', isbn = '$isbn' WHERE `File number` = $edit_id";

    if ($conn->query($sql_update) === true) {
        // Book details updated successfully, redirect back to Books_stored.php
        header("Location: Books_stored.php");
        exit;
    } else {
        echo "<p>Error updating book details: " . $conn->error . "</p>";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head class="navbar">
       <link rel="stylesheet" href="styles.css">
    <title>Edit Book Details</title>
</head>
<body>
    <h1>Edit Book Details</h1>

    <form method="post">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $title; ?>" required><br>

        <label>Author:</label>
        <input type="text" name="author" value="<?php echo $author; ?>" required><br>

        <label>ISBN:</label>
        <input type="text" name="isbn" value="<?php echo $isbn; ?>" required><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>

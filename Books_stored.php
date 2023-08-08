<!DOCTYPE html>
<html >
<head class="navbar">
    <title>Stored Books</title>
       <link rel="stylesheet" href="styles.css">
        <h1>Library Management system</h1>
</head >
<body>
    <div class="navbar">
    <nav>
        <a href="Home page.php">Home page</a>
    </nav>
    </div>

    <h1>List of Stored Books</h1>
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

    // Handling book deletion
    if (isset($_GET["delete"])) {
        $delete_id = $_GET["delete"];
        $sql_delete = "DELETE FROM book_register WHERE `File number` = $delete_id";
        if ($conn->query($sql_delete) === true) {
            echo "<p>Book with File number: $delete_id deleted successfully.</p>";
        } else {
            echo "<p>Error deleting record: " . $conn->error . "</p>";
        }
    }

    // Retrieving all the books from the database
    $sql = "SELECT * FROM book_register";
    $result = $conn->query($sql);

    // Checking if there are any books in the database
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["File number"];
            echo "<p><strong>Title:</strong> " . $row["title"] . "</p>";
            echo "<p><strong>Author:</strong> " . $row["author"] . "</p>";
            echo "<p><strong>ISBN:</strong> " . $row["isbn"] . "</p>";
            
            // Adding links to update and delete book records
            echo "<p><a href='edit_book.php?id=$id'>Edit</a> | 
                  <a href='Books_stored.php?delete=$id' onclick=\"return confirm('Are you sure you want to delete this book?')\">Delete</a></p>";
            echo "<hr>";
        }
    } else {
        echo "<p>No books found in the database.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>

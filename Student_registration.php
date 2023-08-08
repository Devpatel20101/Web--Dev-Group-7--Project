<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Your CSS styles... */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: dark black;
            border: 1px solid #fff;
        }

        /* Add border to table headers (th) */
        th {
            padding: 10px;
            text-align: left;
            border: 1px solid #fff;
            background-color: #007bff;
        }

        /* Add border to table cells (td) */
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #fff;
        }

        /* Apply alternating row colors */
        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .action-buttons {
            display: flex;
        }

        .action-buttons button {
            margin-right: 5px;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-buttons button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <center>
        <h2>Library Management System</h2>
    </center>
    <div class="navbar">
        <nav>
            <a href="Home page.php">Home page</a>
        </nav>
    </div>

    <h1>Student Registration Details</h1>
    <table>
        <tr>
            <th>File Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Student ID</th>
            <th>Book Borrowed</th>
            <th>Registration Type</th>
            <th>Actions</th>
        </tr>

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

        // Function to delete a student record by student_id
        function deleteRecord($student_id) {
            global $conn;
            $sql = "DELETE FROM book WHERE student_id='$student_id'";
            $conn->query($sql);
        }

        // Retrieve all student records from the database
        $sql = "SELECT * FROM book";
        $result = $conn->query($sql);

        // Checking if the query was successful and if any records are found
        if ($result !== false && $result->num_rows > 0) {
            // Loop through each row and display the data in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["file_number"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["student_id"] . "</td>";
                echo "<td>" . $row["book_borrowed"] . "</td>";
                echo "<td>" . $row["registration_type"] . "</td>";
                echo "<td class='action-buttons'>";
                echo "<button class='delete-button' onclick='deleteRecord(" . $row["student_id"] . ")'>Delete</button>";
                // echo "<button class='edit-button' onclick='editRecord(" . $row["student_id"] . ")'>Edit</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            // No records found in the database
            echo "<tr><td colspan='7'>No student records found.</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>

    <script>
        // JavaScript function to handle delete operation
        function deleteRecord(student_id) {

            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = 'delete_student.php?student_id=' + student_id;
            }
        }

      \
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Library Management System - Book Management</title>
</head>
<body>
    <div class="navbar">
        <h2>Welcome, Librarian!</h2>
        <ul>
            <li><a href="Home page.php">Home page</a></li>
            <li><a href="Student registration.php">Student Registration</a></li>
            <li><a href="Books_stored.php">Books in library</a></li>
            <li><a href="Student_registration.php">Student/Staff details</a></li>
            <li><a href="library syst.php">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="login-logo">
            <img src="bookkeeping2.png">
        </div>
        <h1>Book Management</h1>
        <p>Welcome to the Book Management module. Here, you can manage the library's collection of books, add new books, update book information, and handle book status and availability.</p>
        <p>Use the navigation menu above to explore other functionalities and pages within the library management system.</p>
        
        <h2>Add New Book</h2>
        <form id="add-book-form" action="add_book.php" method="POST">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required>
            </div>
            
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" required>
            </div>
            
            <input type="submit" value="Add Book">
        </form>
        
        <div class="book-list">
            <h2>Book List</h2>
            <ul id="book-list-ul">
                <!-- Book list will be displayed here -->
            </ul>
        </div>
    </div>
</body>
</html>

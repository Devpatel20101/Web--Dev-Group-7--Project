<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Library Management System - Student Registration</title>
</head>
<body>
    <div class="navbar">
        <h2>Welcome, Librarian!</h2>
        <ul>
            <li><a href="Home Page.php">Home Page</a></li>
            <li><a href="Book.php">Book Management</a></li>
            <li><a href="Books_stored.php">Books in library</a></li>
            <li><a href="Student_registration.php">Student/Staff details</a></li>
            <li><a href="library syst.php">Log Out</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="login-logo">
            <img src="bookkeeping2.png">
        </div>
        <h1>Student Registration</h1>
        <form action="registration_script.php" method="POST">
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="student_id"><i class="fas fa-id-card"></i> Student/Staff ID:</label>
                <input type="text" id="student_id" name="student_id" required>
            </div>
            
            <div class="form-group">
                <label for="book_they_have_borrowed"><i class="fas fa-lock"></i> Book they have borrowed:</label>
                <input type="text" id="book_they_have_borrowed" name="book_they_have_borrowed" required>
            </div>

            <div class="form-group">
                <label><i class="fas fa-lock"></i> Staff or Student:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="registration_type" value="staff" required>
                        Staff
                    </label>
                    <label>
                        <input type="radio" name="registration_type" value="student" required>
                        Student
                    </label>
                </div>
            </div>

            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>

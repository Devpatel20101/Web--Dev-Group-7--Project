<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Library Management System - Librarian Login</title>
</head>
<body>
    <div class="container">
        <div class="login-logo">
            <img src="bookkeeping2.png" >
        </div>
        <h1>Librarian Login</h1>
        <form action="login.php" method="POST">  
            <div class="form-group">
                <label for="username"><i class="fas fa-user"></i> Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <input type="submit" value="Log In">
        </form>
    </div>
</body>
</html>

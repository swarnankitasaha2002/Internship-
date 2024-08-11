<?php
// Include database configuration
require_once 'database.php';

// Check if form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query database
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    // Check if user exists
    if ($result->num_rows > 0) {
        // Login successful
        session_start();
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        // Login failed
        $error = 'Invalid username or password';
    }
}

// Close connection
$conn->close();
?>

<!-- HTML and CSS -->
<style>
    form {
        width: 300px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
        display: block;
        margin-bottom: 10px;
    }
    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #3e8e41;
    }
</style>

<!-- Login form -->
<form action="" method="post">
    <h2>Login</h2>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" name="login" value="Login">
    <?php if (isset($error)) { echo '<p style="color: red;">' . $error . '</p>'; } ?>
</form>
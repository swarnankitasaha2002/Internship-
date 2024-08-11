<?php
// Include database configuration
require_once 'database.php';

// Check if form is submitted
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query database
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = $conn->query($query);

    // Check if user is created
    if ($result) {
        // Signup successful
        session_start();
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        // Signup failed
        $error = 'Error creating user';
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
    input[type="text"], input[type="email"], input[type="password"] {
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
<?php
// Start the session
session_start();

require_once "data/connection.php"; // Include the database connection file

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST["identifier"];
    $password = $_POST["password"];

    // Search for a matching user by email or username
    $query = "SELECT * FROM userslogin WHERE email = ? OR username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $identifier, $identifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user["password"])) {
            // Store user information in the session
            $_SESSION['username'] = $user['username'];
            
            // Redirect to index.php
            header("Location: index.php");
            exit(); // Make sure to exit after redirecting
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../favicon.png">
    <title>Login</title>
    <style>
        body {
            font-family: Bahnschrift, Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #9672ef;
            flex-direction: column; /* Center elements vertically */
        }

        .logo {
            margin-bottom: 20px; /* Add some space between logo and form */
        }
        
        .logo img {
            max-width: 200px; /* Adjust the max-width as needed */
            height: auto; /* Maintain aspect ratio */
        }

        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px; /* Limit the width for smaller screens */
            width: 90%; /* Responsive width */
            text-align: center; /* Center content horizontally */
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold; /* Make labels bold for better readability */
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #9672ef;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-container input[type="submit"]:hover {
            background-color: #11013a;
        }
    </style>
</head>
<body>
    <div class="logo">
        <a href="./index.php"><img src="logo.png" alt="Logo" class="logo"></a>
    </div>
    <div class="login-container">
        <h1>Login</h1>
        <form method="post" action="login.php">
            <label for="identifier">Email/Username:</label>
            <input type="text" id="identifier" name="identifier" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="signup.php">Create Account</a></p>
    </div>
</body>

</html>

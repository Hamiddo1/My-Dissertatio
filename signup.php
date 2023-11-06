<?php

// Start the session
session_start();

require_once "data/connection.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $checkSql = "SELECT * FROM userslogin WHERE username = '$username'";
    $checkResult = $mysqli->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Username is already taken
        $errorMsg = "Username is already taken. Please choose a different one.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Define the target directories
            $targetDir1 = "image/";
            $targetDir2 = "admin/image/";
            
            // Create the file paths
            $targetFile1 = $targetDir1 . basename($_FILES["image"]["name"]);
            $targetFile2 = $targetDir2 . basename($_FILES["image"]["name"]);
            
            // Move the uploaded file to the first directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile1)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded to the first directory.";
                
                // Copy the file to the second directory
                if (copy($targetFile1, $targetFile2)) {
                    echo "The file has been copied to the second directory.";
                    
                    // Inserting data into the database
                    $query = "INSERT INTO userslogin (username, email, password, profileimage) VALUES (?, ?, ?, ?)";
                    $stmt = $mysqli->prepare($query);
                    $stmt->bind_param("ssss", $username, $email,  $hashedPassword, $targetFile1);

                    if ($stmt->execute()) {
                        echo "Data inserted successfully!";
                     header("Location: login.php");
                 exit(); // Ensure that no further code is executed after redirection
           } else {
            echo "Error inserting data: " . $stmt->error;
           }

  $stmt->close();
                } else {
                    echo "Sorry, there was an error copying your file to the second directory.";
                }
            } else {
                echo "Sorry, there was an error uploading your file to the first directory.";
            }
        }
    }
}

$mysqli->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../favicon.png">
    <title>Sign Up</title>
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

        .signup-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px; /* Limit the width for smaller screens */
            width: 90%; /* Responsive width */
            text-align: center; /* Center content horizontally */
        }

        .signup-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold; /* Make labels bold for better readability */
        }

        .signup-container input[type="text"],
        .signup-container input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .signup-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #9672ef;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .signup-container input[type="submit"]:hover {
            background-color: #11013a;
        }
        
        .error-text {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <a href="./index.php"><img src="logo.png" alt="Logo" class="logo"></a>
    </div>
    <div class="signup-container">
        <h1>Signup</h1>
        <form method="post" action="signup.php" enctype="multipart/form-data">
            <label for="email">Enter Valid Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="username">Choose your username:</label>
             <input type="text" id="username" name="username" required>
        
        
           <div class="error-text"><?= $errorMsg ?></div>

            <label for="password">Create Password:</label>
           <input type="password" id="password" name="password" required oninput="checkPasswordMatch();">
        
           <label for="confirm_password">Confirm Password:</label>
           <input type="password" id="confirm_password" name="confirm_password" required oninput="checkPasswordMatch();">
        
           
            <input type="submit" value="Sign Up">
        </form>
    </div>
 <script>
        function checkPasswordMatch() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            var passwordError = document.getElementById("password-error");

            if (confirm_password) {
                if (password !== confirm_password) {
                    passwordError.textContent = "Passwords do not match.";
                } else {
                    passwordError.textContent = ""; // Clear the error message if passwords match
                }
            } else {
                passwordError.textContent = ""; // Clear the error message if confirm_password is empty
            }
        }
    </script>
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            var passwordError = document.getElementById("password-error");

            if (password !== confirm_password) {
                passwordError.textContent = "Passwords do not match.";
                return false;
            } else {
                passwordError.textContent = ""; // Clear the error message if passwords match
            }

            return true;
        }
    </script>
</body>
</html>
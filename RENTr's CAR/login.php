<?php
// Start session
session_start();

// MySQL connection parameters
$servername = "localhost";
$username = "root";
$password = "Motionless@123";
$database = "renters";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        // Sign-up action
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Insert data into MySQL database
        $sql = "INSERT INTO user_cred (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            // Display success message
            header("Location: loginForm.php");
            echo '<script>alert("User registered successfully");</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['signin'])) {
        // Sign-in action
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Check if email and password match in the database
        $sql = "SELECT * FROM user_cred WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Fetch the full name and profile picture of the logged-in user from the database
            $row = $result->fetch_assoc();
            $fullname = $row['fullname'];
        
            // Start the session and set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email; // Store email in session for future use
            $_SESSION['fullname'] = $fullname; // Store full name in session

            // Store the profile picture in session as a Base64 encoded string
            if (!empty($row['profile_picture'])) {
                $_SESSION['profile_picture'] = 'data:image/jpeg;base64,' . base64_encode($row['profile_picture']);
            } else {
                $_SESSION['profile_picture'] = null;
            }

            header("Location: index.php");
            exit();
        } else {
            echo "Invalid email or password";
        }
    }
}

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in
    echo "loggedin";
} else {
    // User is not logged in
    echo "not loggedin";
}

// Close connection
$conn->close();
?>

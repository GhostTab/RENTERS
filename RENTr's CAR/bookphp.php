<?php
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file input field is set and not empty
    if (isset($_FILES["fileImg"]["tmp_name"]) && !empty($_FILES["fileImg"]["tmp_name"])) {
        // Process the uploaded image
        $imageData = file_get_contents($_FILES["fileImg"]["tmp_name"]);

        // Check if the $_SESSION['email'] variable is set and not empty
        if (!empty($_SESSION['email'])) {
            // Update the database with the image data
            $email = $_SESSION['email'];
            $query = "UPDATE user_cred SET profile_picture = ? WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("bs", $imageData, $email);
            if ($stmt->execute()) {
                // Image saved successfully
                echo "Image saved successfully";

                // Store the Base64-encoded image data in the session
                $_SESSION['profile_picture'] = 'data:image/jpeg;base64,' . base64_encode($imageData);

            } else {
                // Failed to save image
                echo "Failed to save image: " . $conn->error;
            }
            $stmt->close();
        } else {
            // Session email is empty or null
            echo "Error: Session email is empty or null.";
        }
    } else {
        // No file uploaded
        echo "Error: No file uploaded.";
    }
}

// Close connection
$conn->close();

?>

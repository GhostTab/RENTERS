<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Assuming the email of the logged-in user is stored in the session under the key 'email'
    $email = $_SESSION['email'];

    // Connect to the database
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

    // Prepare and execute SQL statement to retrieve email associated with the logged-in user's email
    $stmt = $conn->prepare("SELECT email FROM user_creds WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows > 0) {
        // Fetch the email from the result
        $row = $result->fetch_assoc();
        $userEmail = $row['email'];

        // Output the email
        echo $userEmail;
    } else {
        // If no row is returned, output a default value (e.g., "john@example.com")
        echo "john@example.com";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If user is not logged in, output a default value (e.g., "john@example.com")
    echo "john@example.com";
}
?>

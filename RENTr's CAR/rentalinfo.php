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

// Process rental information submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        // Assuming the email of the logged-in user is stored in the session under the key 'email'
        $email = $_SESSION['email'];

        // Retrieve rental information from the POST request
        $carName = $_POST['carName'];
        $carModel = $_POST['carModel'];
        $totalPrice = $_POST['totalPrice'];
        $totalDays = $_POST['totalDays'];
        
        // Prepare and execute the SQL statement to insert data into the database
        $sql = "INSERT INTO booking (email, car_model, car_name, price, total_days, date) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $email, $carModel, $carName, $totalPrice, $totalDays, date("Y-m-d"));

        // Check if the SQL query executed successfully
        if ($stmt->execute()) {
            echo "Rental information inserted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and database connection
        $stmt->close();
    } else {
        // If the user is not logged in, handle the error
        echo "Error: User is not logged in.";
    }
} else {
    echo "Error: This script should be accessed via an HTTP POST request.";
}
?>

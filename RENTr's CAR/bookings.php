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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="stylecar.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <title>RENTr's CAR</title>
    <link rel="icon" href="vehicle-icon-png-car-sedan-4.png">
    <script src="https://kit.fontawesome.com/50575b88b4.js" crossorigin="anonymous"></script>


   
</head>

<style media="screen">
    .upload{
        width: 140px;
        position: relative;
        margin: auto;
        text-align: center;
    }
    .upload img{
        border-radius: 50%;
        border: 8px solid #dcdcdc;
        width: 125px;
        height: 125px;
    }
    .upload .rightRound{
        position: absolute;
        bottom: 0;
        right: 0;
        background: #00b4ff;
        width: 32px;
        height: 32px;
        line-height: 33px;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }
    .upload .leftRound{
        position: absolute;
        bottom: 0;
        left: 0;
        background: red;
        width: 32px;
        height: 32px;
        line-height: 33px;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }
    .upload .fa{
        color: white;
    }
    .upload input{
        position: absolute;
        transform: scale(2);
        opacity: 0;

    }
    .upload input::-webkit-file-upload-button, .upload input[type=submit]{
        cursor: pointer;

    }

</style>


<body>

    <div class="first-nav">
    </div>

    <nav>
        <div class="nav-logo">
            <a href="index.php">
                <img src="vehicle-icon-png-car-sedan-4.png" width="85" height="44">
            </a>
        </div>
                <button class="toggle-btn" onclick="toggleNav()">☰</button>
       
        <ul class="nav-links">
            <li id="link4" class="link"><a href="index.php">HOME</a></li>
            <li id="link1" class="link"><a href="index.php#nothing">RATES</a></li>
            <li id="link2" class="link"><a href="index.php#wews">OFFERS</a></li>
            <li id="link3" class="link"><a href="index.php#about">ABOUT US</a></li>
        </ul>
        <img src="<?php echo isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : 'imgs/icons8-male-user-32.png'; ?>" alt="Profile Picture" id="user-icon" onclick="toggleMenu()">
        

        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        if (isset($_SESSION['profile_picture'])) {
                            echo '<img src="' . $_SESSION['profile_picture'] . '" class="user">';
                        } else {
                            echo '<img src="imgs/icons8-male-user-32.png" class="user">';
                        }
                        echo '<h2>' . $_SESSION['fullname'] . '</h2>';
                    } else {
                        echo '<img src="imgs/icons8-male-user-32.png" class="user">';
                        echo '<h2>Guest</h2>';
                    }
                    ?>
                
                
                </div>
                <hr>

                <a href="#" class="sub-menu-link">
                    <img src="imgs/icons8-male-user-24.png" alt="">
                    <p>Edit Profile</p>
                    <span>></span>
                </a>
                <a href="#" class="sub-menu-link">
                    <img src="imgs/icons8-book-30.png" alt="">
                    <p>Bookings</p>
                    <span>></span>
                </a>
                <hr>
                <a href="#" class="sub-menu-link" onclick="logoutUser()">
                    <img src="imgs/icons8-logout-24.png" alt="">
                    <p>Logout</p>
                    <span>></span>
                </a>

            </div>
        </div>
    </nav>
        <script>
        // Define the openHeros function
        function openHeros() { 
            let popup = document.getElementById("heros");
            let body = document.querySelector("body");

            popup.classList.add("open-heros");
            body.classList.add("heros-open");
        }

        // Define the closeHeros function
        function closeHeros() { 
            let popup = document.getElementById("heros");
            let body = document.querySelector("body");

            popup.classList.remove("open-heros");
            body.classList.remove("heros-open");
        }
        let subMenu = document.getElementById("subMenu");

function toggleMenu(){
    subMenu.classList.toggle("open-menu")
}

document.addEventListener("DOMContentLoaded", function() {
    // Your JavaScript code here
    document.getElementById("fileImg").onchange = function() {
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]);
        document.getElementById("cancel").style.display = "block";
        document.getElementById("confirm").style.display = "block";
        document.getElementById("upload").style.display = "none";
    };

    var userImage = document.getElementById('image').src;
    document.getElementById("cancel").onclick = function() {
        document.getElementById("image").src = userImage;
        document.getElementById("cancel").style.display = "none";
        document.getElementById("confirm").style.display = "none";
        document.getElementById("upload").style.display = "block";
    };

    document.getElementById("confirm").onclick = function() {
                document.getElementById("image").src = URL.createObjectURL(document.getElementById("fileImg").files[0]);
                document.getElementById("cancel").style.display = "none";
                document.getElementById("confirm").style.display = "none";
                document.getElementById("upload").style.display = "block";

                // Get the image file
                var file = document.getElementById('fileImg').files[0];

                // Check if a file is selected
                if (file) {
                    // Create a FormData object
                    var formData = new FormData();
                    formData.append('fileImg', file);

                    // Send the image file using XMLHttpRequest
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'bookphp.php', true);

                    // Handle the response
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            alert(xhr.responseText);
                            // Optionally, refresh the page or update the image dynamically
                        } else {
                            alert('Error uploading image: ' + xhr.statusText);
                        }
                    };

                    // Send the FormData object
                    xhr.send(formData);
                }
            };
        });

        function logoutUser() {
            // Handle user logout here
            alert("User logged out");
        }
    </script>











    

    <div class="sidebar">
        <div class="logo"></div>
        <ul class="main">
            <li onclick="closeHeros()">
                <a href="#">
                <i class="fa-solid fa-table-columns"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li onclick="openHeros()"> 
                <a href="#">
                <i class="far fa-user-circle"></i>
                    <span>Profile</span>
                </a>
            </li>

        </ul>
        
    </div>


    <div class="tabular-wrapper">
        <h3 class="main-title">My Bookings</h3>
        <div class="table-container">
            <div class="table-wrapper">
                <table>
                    <thead id="table-header">
                        <tr>
                            <th>Car Model</th>
                            <th>Car Name</th>
                            <th>Days</th>
                            <th>Cost</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                    <?php
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

                        // Retrieve user's email from session
                        $email = $_SESSION['email'];

                        // Prepare and execute SQL statement to retrieve booking information for the logged-in user
                        $stmt = $conn->prepare("SELECT car_model, car_name, total_days, price, date FROM booking WHERE email = ?");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Check if there are any bookings for the user
                        if ($result->num_rows > 0) {
                            // Output each booking as a table row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['car_model'] . "</td>";
                                echo "<td>" . $row['car_name'] . "</td>";
                                echo "<td>" . $row['total_days'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            // If no bookings are found, display a message
                            echo "<tr><td colspan='5'>No bookings found</td></tr>";
                        }

                        // Close statement and connection
                        $stmt->close();
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
      
    

    <div class="heros" id="heros">
        <div class="cards">
            <form class="" action="bookphp.php" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="upload">
                    <img src="img/<?php echo $user['image'];?>" id="image">

                    <div class="rightRound" id="upload">
                        <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
                        <i class="fa-solid fa-camera"></i>
                    </div>

                    <div class="leftRound" id="cancel" style="display: none;">
                        <i class="fa-solid fa-x"></i>
                    </div>
                    <div class="rightRound" id="confirm" style="display: none;">
                        <input type="submit" name="" value="">
                        <i class="fa-solid fa-check"></i>
                    </div>
                </div>
            </form>
        </div>
    </div>
   
   









    <script src="reserve.js"></script>

    <script>
















// Select the table and table wrapper elements
const table = document.querySelector('table');
const tableWrapper = document.querySelector('.table-wrapper');

// Count the total number of rows in the table
const tbody = table.querySelector('tbody');
const totalRows = tbody.getElementsByTagName('tr').length;

// Check if the total number of rows exceeds the limit
if (totalRows > 5) {
    // Apply overflow property to the table wrapper
    tableWrapper.style.overflowY = 'scroll';
}











document.getElementById('user-icon').addEventListener('click', function(event) {
// Prevent the default action of the click event
event.preventDefault();

// Create a new XMLHttpRequest object
var xhttp = new XMLHttpRequest();

// Define the function to handle the response from the PHP file
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
    // Debugging statement to check the response from the PHP file
    console.log("Response from PHP:", this.responseText.trim());

    // Check the response from the PHP file
    if (this.responseText.trim() === "loggedin") {
        // Debugging statement
        console.log("User is logged in");
    } else {
        // Debugging statement
        console.log("User is not logged in, redirecting to loginForm.php");
        // User is not logged in, redirect to login page
        window.location.href = "loginForm.php";
    }
}
};

// Open a connection to the PHP file
xhttp.open("POST", "login.php", true);

// Set the content type header to send data through POST method and send the request
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send();
});



    </script>
    
</body>
</html>

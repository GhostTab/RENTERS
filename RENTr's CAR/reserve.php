<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="reserve.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <title>RENTr's CAR</title>
    <link rel="icon" href="vehicle-icon-png-car-sedan-4.png">
    <script src="https://kit.fontawesome.com/50575b88b4.js" crossorigin="anonymous"></script>
   
</head>

<body>




    <div class="first-nav">
    </div>
        <nav>
            <div class="nav-logo">
                <a href="#">
                    <img src="vehicle-icon-png-car-sedan-4.png" width="85" height="44">
                </a>
            </div>
                    <button class="toggle-btn" onclick="toggleNav()">☰</button>
        
            <ul class="nav-links">
                <li class="link"><a href="index.php">HOME</a></li>
                <li id="link1" class="link"><a href="index.php#nothing">RATES</a></li>
                <li id="link2" class="link"><a href="index.php#about">ABOUT US</a></li>
            </ul>
            <a href="#" onclick="toggleMenu()"></a>
            <img id="user-icon" src="imgs/icons8-male-user-32.png" onclick="toggleMenu()" alt="User Icon">
    
            <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="imgs/icons8-male-user-32.png" class="user">
                    <?php
                    session_start();
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        // If user is logged in, display the full name
                        echo '<h2>' . $_SESSION['fullname'] . '</h2>';
                    } else {
                        // If user is not logged in, display "Guest"
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
                <a href="bookings.php" class="sub-menu-link">
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


        <div class="content">
            <div class="info-box">
                <div class="car-info">
                    <p class="model" id="carModelLabel"></p>
                    <p class="name" id="carNameLabel"></p>
                    <p class="description" id="carDescriptionLabel"></p>
                    <p class="seats">Features</p>
                    <p class="seat" id="carseatLabel"></p>
                    <p>Air Conditioning</p>
                    <p>Automatic or Manual</p>
                    <div class="require">
                        <p class="requirements">Rental Requirements</p>
                        <p>2 government valid ID</p>
                        <p>Driver's license</p>
                        <p>PHP 5,000 Security Deposit. must be provided before you can rent the car. This will be given back to you in full upon returning the car and there are no damages.</p>
                        <button class="btncancelpolicy" onclick="openPopup()">Read Cancellation Policy</button>
                        <div class="popup" id="popup">
                            <h2>Cancellation Policy</h2>
                            <p>In case if the booking was cancelled by You before owner approval, you will NOT receive a refund of funds paid online. Refund will be only issued when the booking is cancelled by the Owner, or the booking did not receive any owner action within two days.</p>
                            <button type="button" onclick="closePopup()">OK</button>
                        </div>
                    </div>
                    <p class="loc">Location</p>
                    <p>Tacloban City, Leyte</p>
                    <p class="loc">Insurance</p>
                    <p class="dets">Insurance details:</p>
                    <p>DAMAGED CAUSED TO/LOSS OF RENTED VEHICLE: RENTER must secure Police Report, 
                        clear photocopy of Professional Driver’s License, and will pay FIVE THOUSAND PESOS (Php 5,000.00) 
                        Participation Fee + 10% of the total parts replacement and 50% daily rate,
                        exclusive of insurance liability. For damages assessed by our accredited repair shops to be 
                        less than Php5,000.00 pesos, the RENTER must pay for the repair of the said damage portion rather 
                        than availing the insurance due because it is highly expensive to pay the insurance participation fee 
                        plus the 50% daily rate while the vehicle is in repair, it will save your time. Payments can be deducted 
                        from the security deposit. The RENTER understand that he/she is not authorized to repair or have the vehicle 
                        repaired without the COMPANY’s express prior written consent. If the vehicle is repaired without the COMPANY’s 
                        consent, the RENTER will pay the estimated cost to restore the vehicle back to its original condition prior to 
                        when it was rented. If the COMPANY authorized the RENTER to have the CAR repaired, the COMPANY will reimburse the
                        RENTER for those repairs once repair official receipt is provided. If the Car is stolen and not recovered, 
                        the RENTER will pay the COMPANY’s Car fair market value before it was stolen.</p>
                </div>
            </div>

            <div class="container">
                <form action="#">
                    <div class="pickup-details">
                        <div class="input-box">
                            <span class="pick-up">Pick-up</span>
                            <input class="pickup" type="date"><input class="pickuptime" type="time">
                        </div>
                        <div class="input-box">
                            <span class="pick-ups">Return</span>
                            <input class="return" type="date"><input class="returntime" type="time">
                        </div>
                        <button type="button" onclick="navigateToAnother()" class="btnbook">BOOK</button>
                    </div>
                    <div class="prices">
                        <p class="days">1 Day</p><p class="price" id="priceLabel"></p>
                        <p class="s">RENTr's CAR Fee</p><p class="fee">₱200</p>
                    </div>
                    <div class="total-price">
                        <p>Total Price</p><p class="total">0</p>
                    </div>
                </form>
                <div class="need-help">
                    <p class="help">Need Help?</p>
                    <ul>
                        <li class="helps"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="box">
            
        </div>







    <script src="reserve.js"></script>
    



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carName = localStorage.getItem('carName');
            document.getElementById('carNameLabel').innerText = carName;
        });











    </script>

    <script>
        let subMenu = document.getElementById("subMenu");

function toggleMenu(){
    subMenu.classList.toggle("open-menu")
}



         function toggleNav() {
        var navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }

    document.querySelectorAll('.link a').forEach(link => {
       link.addEventListener('click', () => {
           var navLinks = document.querySelector('.nav-links');
           navLinks.classList.remove('active');
       });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const carName = localStorage.getItem('carName');
        const carModel = localStorage.getItem('carModel');
        const carDescription = localStorage.getItem('carDescription');
        const carPrice = localStorage.getItem('carPrice')
        const carSeater = localStorage.getItem('carSeater')
        document.getElementById('carNameLabel').innerText = carName;
        document.getElementById('carModelLabel').innerText = carModel;
        document.getElementById('carDescriptionLabel').innerText = carDescription;
        document.getElementById('priceLabel').innerText = carPrice; 
        document.getElementById('carseatLabel').innerText = carSeater;



    });


    function navigateToAnother() {
        // Get the selected dates
        const pickUpDateValue = pickUpDateInput.value;
        const returnDateValue = returnDateInput.value;
        const totalPrice = document.querySelector('.total').innerText;


        // Check if all inputs are set
        if (checkInputs()) {
            // Store the selected dates in localStorage
            localStorage.setItem('pickUpDate', pickUpDateValue);
            localStorage.setItem('returnDate', returnDateValue);

            // Calculate total price and total days
            const differenceInDays = calculateDifferenceInDays();

            // Store total price and total days in localStorage
            localStorage.setItem('totalPrice', totalPrice);
            localStorage.setItem('totalDays', differenceInDays);

            // Create a new XMLHttpRequest object
            var xhttp = new XMLHttpRequest();

            // Define the function to handle the response from the PHP file
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Check the response from the PHP file
                    if (this.responseText.trim() === "loggedin") {
                        // User is already signed in, redirect to rent.php
                        window.location.href = 'rent.php';
                    } else {
                        // User is not logged in, redirect to login page
                        window.location.href = 'loginForm.php';
                    }
                }
            };

            // Open a connection to the PHP file
            xhttp.open("POST", "login.php", true);

            // Set the content type header to send data through POST method and send the request
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
        } else {
            // Display an error message or handle the case where inputs are not set
            console.log('Please select both pick-up and return dates.');
        }
    }

    function calculateDifferenceInDays() {
    // Get pick-up and return dates from localStorage
    const pickUpDate = new Date(localStorage.getItem('pickUpDate'));
    const returnDate = new Date(localStorage.getItem('returnDate'));

    // Calculate the difference in milliseconds
    const differenceInMilliseconds = returnDate - pickUpDate;

    // Convert milliseconds to days
    const differenceInDays = differenceInMilliseconds / (1000 * 60 * 60 * 24);

    // Return the difference in days
    return Math.round(differenceInDays);
}




    </script>
</body>
</html>
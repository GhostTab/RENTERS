
<!DOCTYPE html>

<Head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="stylecar.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <title>RENTr's CAR</title>
    <link rel="icon" href="vehicle-icon-png-car-sedan-4.png">
    <script src="https://kit.fontawesome.com/50575b88b4.js" crossorigin="anonymous"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap');

    .hero h1 {
        font-family: 'Racing Sans One', sans-serif;
        /* You can adjust other properties like size, weight, etc. here */
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
            <li id="link4" class="link"><a href="#">HOME</a></li>
            <li id="link1" class="link"><a href="#nothing">RATES</a></li>
            <li id="link2" class="link"><a href="#">OFFERS</a></li>
            <li id="link3" class="link"><a href="#">ABOUT US</a></li>
        </ul>
        
        <?php
// Debugging code to check $_SESSION['profile_picture']
session_start();

?>
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

                <a href="bookings.php#openHeros" class="sub-menu-link">
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
    <script>


        function logoutUser() {
            // Handle user logout here
            alert("User logged out");
        }
    </script>



    <section class="hero" id="hero">
        <header class="container"> 
            <div class="content">
                <span class="blur"></span>
                <h4><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></h4>
                <h1>RENTr's CAR</h1>
                    <P>
                        LOOKING FOR A CAR TO RENT?
                    </P>
            </div>     
            <div class="image">

            </div>
        </header>
    </section>

    <section id="nothing" class="nothing">
        
    </section>

    <section class="containers">
        <h2 class="header">CAR RENTAL RATES</h2>
        <div class="RATES">
            <div class="cars">
                <img src="imgs/toyota-vios.png" alt="">
                <h4 class="carName">SEDAN</h4>
                <h5 class="model">MODEL: TOYOTA VIOS</h5>
                <h6>₱2,500 for 24 hours</h6>
                <h6 class="price">₱2,500</h6>
                <p class="carDescription">Rental rate + Fuel refill (Full tank upon pick up, should be full tank upon return) ▪️Affordable rates ▪️Clean & Sanitized Cars ▪️All units are new and in good condition (Casa Maintained) ▪️Less requirements ▪️Safe driving experience ▪️Self-drive / With driver</p>
                <p class="seater">5 Seater</p>
                <button onclick="navigateToAnotherPage(this)" class="btnreserve">RESERVE</button>

            </div>
            <div class="cars">
                <img src="imgs/mitsubishi-montero.png" alt="">
                <h4 class="carName">SUV</h4>
                <h5 class="model">MODEL: MITSUBISHI MONTERO</h5>
                <h6>₱4,000 for 24 hours</h6>
                <h6 class="price">₱4,000</h6>
                <p class="carDescription">Rental rate + Fuel refill (Full tank upon pick up, should be full tank upon return) ▪️Affordable rates ▪️Clean & Sanitized Cars ▪️All units are new and in good condition (Casa Maintained) ▪️Less requirements ▪️Safe driving experience ▪️Self-drive / With driver</p>
                <p class="seater">9 Seater</p>
                <button onclick="navigateToAnotherPage(this)" class="btnreserve">RESERVE</button>

            </div>
            <div class="cars">
                <img src="imgs/avanza.png" alt="">
                <h4 class="carName">MPV</h4>
                <h5 class="model">MODEL: AVANZA</h5>
                <h6>₱3,000 for 24 hours</h6>
                <h6 class="price">₱3,000</h6>
                <p class="carDescription">Rental rate + Fuel refill (Full tank upon pick up, should be full tank upon return) ▪️Affordable rates ▪️Clean & Sanitized Cars ▪️All units are new and in good condition (Casa Maintained) ▪️Less requirements ▪️Safe driving experience ▪️Self-drive / With driver</p>
                <p class="seater">7 Seater</p>
                <button onclick="navigateToAnotherPage(this)" class="btnreserve">RESERVE</button>

            </div>
            <div class="cars">
                <img src="imgs/toyota-wigo.png" alt="">
                <h4 class="carName">HATCHBACK</h4>
                <h5 class="model">MODEL: TOYOTA WIGO</h5>
                <h6>₱2,000 for 24 hours</h6>
                <h6 class="price">₱2,000</h6>
                <p class="carDescription">Rental rate + Fuel refill (Full tank upon pick up, should be full tank upon return) ▪️Affordable rates ▪️Clean & Sanitized Cars ▪️All units are new and in good condition (Casa Maintained) ▪️Less requirements ▪️Safe driving experience ▪️Self-drive / With driver</p>
                <p class="seater">5 Seater</p>
                <button onclick="navigateToAnotherPage(this)" class="btnreserve">RESERVE</button>

            </div>
            <div class="cars">
                <img src="imgs/hilux.png" alt="">
                <h4 class="carName">PICKUP CAR</h4>
                <h5 class="model">MODEL: HILUX</h5>
                <h6>₱3,500 for 24 hours</h6>
                <h6 class="price">₱3,500</h6>
                <p class="carDescription">Rental rate + Fuel refill (Full tank upon pick up, should be full tank upon return) ▪️Affordable rates ▪️Clean & Sanitized Cars ▪️All units are new and in good condition (Casa Maintained) ▪️Less requirements ▪️Safe driving experience ▪️Self-drive / With driver</p>
                <p class="seater">5 Seater</p>
                <button onclick="navigateToAnotherPage(this)" class="btnreserve">RESERVE</button>

            </div>
            <div class="cars">
                <img src="imgs/toyota-hiace.png" alt="">
                <h4 class="carName">VAN</h4>
                <h5 class="model">MODEL: TOYOTA HIACE</h5>
                <h6>₱4,500 for 24 hours</h6>
                <h6 class="price">₱4,500</h6>
                <p class="carDescription">Rental rate + Fuel refill (Full tank upon pick up, should be full tank upon return) ▪️Affordable rates ▪️Clean & Sanitized Cars ▪️All units are new and in good condition (Casa Maintained) ▪️Less requirements ▪️Safe driving experience ▪️Self-drive / With driver</p>
                <p class="seater">15 Seater</p>
                <button onclick="navigateToAnotherPage(this)" class="btnreserve">RESERVE</button>

            </div>
        </div>
    </section>

    <div class="wews" id="wews">

    </div>


    <section class="offering">
            <div class="head-offer">
        <h2>WHAT DO WE OFFER</h2>
    </div>
        <div class="offers-container">
            <div class="offers">
                <div class="icon">
                    <i class="fa-solid fa-car"></i>
                </div>
                <div class="boxes">
                    <h1>VARIETY OF VEHICLES</h1>
                    <span>Whether you are looking for a spacious family car, you are in the right place!</span>
                </div>
            </div>
            <div class="offers">
                <div class="icon">
                    <i class="fa-solid fa-helmet-safety"></i>
                </div>
                <div class="boxes">
                    <h1>EASY. FLEXIBLE. SAFE.</h1>
                    <span>With our hassle-free and secure platform, renting and sharing your vehicle at any time is as easy as can be.</span>
                </div>
            </div>
        </div>
    </section>
    


    <section class="about" id="about">
        <div class="case">
       <h1 class="how"></h1>
       <li><img src="vehicle-icon-png-car-sedan-4.png" width="145" height="95" class="rac"></li>
            <a href="https://x.com/?lang=en"><i class="fa-brands fa-square-x-twitter"></i></a>
            <a href="https://www.facebook.com/?stype=lo&deoia=1&jlou=AfccOtrYEUYFSrbKKlFPpUqbgCXnbWE4siH61i8Eta_T64Tj-9W6YXSRNLceMFOlxFUfuW-ge64q3NiUnBqMGEbj3CoyBbBAoCRCDf4JFk2ibA&smuh=26805&lh=Ac8dIC0po2Dhi-Lyakc"><i class="fa-brands fa-square-facebook"></i></a>
            <a href="https://discord.com/"><i class="fa-brands fa-discord"></i></a>
            
        </div>
        <div class="case">
            <h4>LOCATION</h4>
            <p>Tacloban City, Leyte, Philippines</p>
        </div>  
        <div class="case">
            <h4>CONTACT US</h4>
            <li>+63 9667954524</li>
            <li>+63 9667954524</li>
            <li>+63 9667954524</li>
            <li>+63 9667954524</li>         
        </div>
    </section>





    <script src="script.js"></script>
    <script>

        let subMenu = document.getElementById("subMenu");

        function toggleMenu(){
            subMenu.classList.toggle("open-menu")
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



    function navigateToAnotherPage(btn) {
        const carDiv = btn.parentElement;
        const carName = carDiv.querySelector('.carName').innerText;
        const carModel = carDiv.querySelector('.model').innerText;
        const carDescription = carDiv.querySelector('.carDescription').innerText;
        const carPrice = carDiv.querySelector('.price').innerText;
        const carSeater = carDiv.querySelector('.seater').innerText;
        const carImageUrl = carDiv.querySelector('img').src;
        localStorage.setItem('carName', carName);
        localStorage.setItem('carModel', carModel);
        localStorage.setItem('carDescription', carDescription);
        localStorage.setItem('carPrice', carPrice);
        localStorage.setItem('carSeater', carSeater);
        localStorage.setItem('carImageUrl', carImageUrl);
        window.location.href = 'reserve.php';
    }


   
    </script>

</body>

</Head>

<!DOCTYPE html>
<Head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <title>RENTr's CAR</title>
    <link rel="icon" href="vehicle-icon-png-car-sedan-4.png">
    <script src="https://kit.fontawesome.com/50575b88b4.js" crossorigin="anonymous"></script>
    
</Head>

<body>

<?php
// Start session
session_start();

// Store the URL of the current page
$_SESSION['prev_page'] = $_SERVER['REQUEST_URI'];
?>


    <div class="container">
        <div class="form-box">
            <a href="#" class="back" onclick="goBack()">BACK</a>
            <h1 id="title">SIGN UP</h1>
            <form action="login.php" method="post">
                <div class="input-group">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Fullname" name="fullname">                      
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email">                      
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" id="password" name="password"> 
                        <img src="imgs/3095059-200.png" id="eyeicon">                     
                    </div>
                    <p>Lost password <a href="#">Click Here</a></p>
                </div>
                <div class="btn-field">
                    <button type="submit" id="signupbtn" name="signup">Sign up</button>
                    <button type="submit" id="signinbtn" class="disable" name="signin">Sign in</button>
                </div>
            </form>
        </div>
    </div>



    <script>




    document.addEventListener("DOMContentLoaded", function() {
        let form = document.querySelector("form");
        form.onsubmit = function(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Create new FormData object to collect form data
            let formData = new FormData(form);



            // Send AJAX request to login.php
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "login.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // Handle AJAX response
            xhr.onload = function() {
                let response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Redirect user to previous page or index.php
                    let prevPage = "<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; ?>";
                    window.location.href = prevPage;
                } else {
                    // Display error message
                    alert(response.message);
                }
            };

            // Send form data
            xhr.send(new URLSearchParams(formData));
        };
    });







function goBack() {
  window.history.back();
}

   let signupbtn = document.getElementById("signupbtn");
    let signinbtn = document.getElementById("signinbtn");
    let nameField = document.getElementById("nameField");
    let title = document.getElementById("title");
    let fullnameInput = document.querySelector('input[name="fullname"]');
    let emailInput = document.querySelector('input[name="email"]');
    let passwordInput = document.querySelector('input[name="password"]');

    signinbtn.onclick = function(){
        if (title.innerHTML !== "SIGN IN") {
            clearInputFields();
        }
        nameField.style.maxHeight = "0";
        title.innerHTML = "SIGN IN";
        signupbtn.classList.add("disable");
        signinbtn.classList.remove("disable");
    };

    signupbtn.onclick = function(){
        if (title.innerHTML !== "SIGN UP") {
            clearInputFields();
        }
        nameField.style.maxHeight = "60px";
        title.innerHTML = "SIGN UP";
        signupbtn.classList.remove("disable");
        signinbtn.classList.add("disable");
    };

    let eyeicon = document.getElementById("eyeicon");
    let password = document.getElementById("password");

    eyeicon.onclick = function(){
        if(password.type == "password"){
            password.type = "text";
            eyeicon.src = "imgs/icons8-eye-60.png";
            eyeicon.style.width = '25px'; 
        } else {
            password.type = "password";
            eyeicon.src = "imgs/3095059-200.png";
            eyeicon.style.width = '30px'; 
        }
    };

    function validateForm() {
    let fullname = fullnameInput.value.trim();
    let email = emailInput.value.trim();
    let password = passwordInput.value.trim();

    // Skip fullname validation if signing in
    if (title.innerHTML === "SIGN IN") {
        if (email === "" || password === "") {

            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }

    // Validate all fields for sign-up
    if (fullname === "" || email === "" || password === "") {

        return false; // Prevent form submission
    }
    return true; // Allow form submission
}

    // Attach the validation function to the form's onsubmit event
    document.addEventListener("DOMContentLoaded", function() {
        let form = document.querySelector("form");
        form.onsubmit = validateForm;
    });

    function clearInputFields() {
        fullnameInput.value = "";
        emailInput.value = "";
        passwordInput.value = "";
    }


    </script>



</body>

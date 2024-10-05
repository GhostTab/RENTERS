function smoothScroll(target) {
    document.querySelector(target).scrollIntoView({
        behavior: 'smooth'
    });
}

// Function to handle link click
document.getElementById('link1').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    smoothScroll('#nothing'); // Scroll to the target section
});
document.getElementById('link2').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    smoothScroll('#wews'); // Scroll to the target section
});
document.getElementById('link3').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    smoothScroll('#about'); // Scroll to the target section
});
document.getElementById('link4').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    smoothScroll('#hero'); // Scroll to the target section
});


function logoutUser() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Redirect to login page after successful logout
            window.location.href = "index.php";
        }
    };
    xhttp.open("GET", "logout.php", true);
    xhttp.send();
}


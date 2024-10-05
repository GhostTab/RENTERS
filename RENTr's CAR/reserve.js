let popup = document.getElementById("popup") 
let body = document.querySelector("body") 

function openPopup(){ 
    popup.classList.add("open-popup") 
    body.classList.add("popup-open"); } 
function closePopup(){ 
    popup.classList.remove("open-popup") 
    body.classList.remove("popup-open") }


document.addEventListener('DOMContentLoaded', function() {
    const carPrice = parseFloat(localStorage.getItem('carPrice').replace('₱', '').replace(',', '')); // Convert price to a number
    const fee = 200; // Hardcoded fee
    const totalPrice = carPrice + fee;
    document.querySelector('.total').innerText = '₱' + totalPrice.toFixed(2); // Display total price
});









    const pickUpDateInput = document.querySelector('.pickup');
    const returnDateInput = document.querySelector('.return');
    const pickUpTimeInput = document.querySelector('.pickup + input[type="time"]');
    const returnTimeInput = document.querySelector('.return + input[type="time"]');
    const priceLabelElement = document.getElementById('priceLabel');
    const daysElement = document.querySelector('.days');
    const totalElement = document.querySelector('.total');
    const priceElement = document.querySelector('.price');
    const rentfeeElement = document.querySelector('.s');

    // Function to format number with commas every three digits from right
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Function to calculate total price
    function calculateTotalPrice() {
        const pickUpDate = new Date(pickUpDateInput.value);
        const returnDate = new Date(returnDateInput.value);

        // Prevent selection of past dates
        const currentDate = new Date();
        const formattedCurrentDate = currentDate.toISOString().split('T')[0];
        pickUpDateInput.setAttribute('min', formattedCurrentDate);
        returnDateInput.setAttribute('min', formattedCurrentDate);

        // Change border color if return date is same as pick-up date
        if (pickUpDateInput.value === returnDateInput.value) {
            pickUpDateInput.style.borderColor = 'red';
            returnDateInput.style.borderColor = 'red';
            pickUpTimeInput.style.borderColor = 'red';
            returnTimeInput.style.borderColor = 'red';

            priceElement.style.marginLeft = '16rem';
            // Adjust margin-right of price element
            priceElement.style.marginRight = '7rem';
            rentfeeElement.style.marginLeft = '1.1rem';
        } else {
            pickUpDateInput.style.borderColor = '';
            returnDateInput.style.borderColor = '';
            pickUpTimeInput.style.borderColor = '';
            returnTimeInput.style.borderColor = '';

            // Reset margin-right of price element
            priceElement.style.marginRight = '';
        }

        // Calculate the difference in days
        const differenceInTime = returnDate.getTime() - pickUpDate.getTime();
        const differenceInDays = Math.ceil(differenceInTime / (1000 * 3600 * 24));

        // Update days element with the number of days
        daysElement.textContent = differenceInDays + (differenceInDays > 1 ? ' Days' : ' Day');

        if (differenceInDays > 9) {
            priceElement.style.marginLeft = '14rem'; // Adjusted value for double digit days
            priceElement.style.marginRight = '5rem'; // Adjusted value for double digit days
        }
        if (window.innerWidth <= 768) {
            priceElement.style.marginRight = '2.5rem';
            priceElement.style.marginLeft = '11.8rem';
        } else {
            priceElement.style.marginRight = ''; // Reset marginRight for desktop
        }

        // Get car price from localStorage
        const carPrice = localStorage.getItem('carPrice'); // Retrieve price as string

        // Calculate total price
        const totalPrice = differenceInDays * parseInt(carPrice.replace('₱', '').replace(',', ''), 10); // Convert and calculate

        // Get fee
        const fee = 200; // Hardcoded fee

        // Calculate total amount (car price + fee)
        const totalAmount = totalPrice + fee;

        // Format total amount with commas
        const formattedTotalAmount = numberWithCommas(totalAmount);

        // Display total amount in the total element
        totalElement.textContent = '₱' + formattedTotalAmount;

        // Display new total price in priceLabel
        priceLabelElement.textContent = '₱' + totalPrice;
    }

    // Event listener for date inputs
    pickUpDateInput.addEventListener('change', calculateTotalPrice);
    returnDateInput.addEventListener('change', calculateTotalPrice);







    

/// Define btnbook properly to refer to the "BOOK" button element
const btnbook = document.querySelector('.btnbook');

// Function to check if all date and time inputs are set
function checkInputs() {
    const pickUpDateValue = pickUpDateInput.value;
    const returnDateValue = returnDateInput.value;
    const pickUpTimeValue = pickUpTimeInput.value;
    const returnTimeValue = returnTimeInput.value;

    // Check if all inputs are not empty
    if (pickUpDateValue !== '' && returnDateValue !== '' && pickUpTimeValue !== '' && returnTimeValue !== '') {
        return true; // All inputs are set
    } else {
        return false; // At least one input is empty
    }
}

// Function to update UI based on input status
function updateUI() {
    if (checkInputs()) {
        // All inputs are set, enable the BOOK button and remove red border
        btnbook.disabled = false;
        pickUpDateInput.style.borderColor = '';
        returnDateInput.style.borderColor = '';
        pickUpTimeInput.style.borderColor = '';
        returnTimeInput.style.borderColor = '';
    } else {
        // At least one input is empty, disable the BOOK button and set red border
        btnbook.disabled = true;
        pickUpDateInput.style.borderColor = 'red';
        returnDateInput.style.borderColor = 'red';
        pickUpTimeInput.style.borderColor = 'red';
        returnTimeInput.style.borderColor = 'red';
    }
}

// Event listener for date and time inputs
pickUpDateInput.addEventListener('change', updateUI);
returnDateInput.addEventListener('change', updateUI);
pickUpTimeInput.addEventListener('change', updateUI);
returnTimeInput.addEventListener('change', updateUI);

// Call updateUI() initially to set initial UI state
updateUI();


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
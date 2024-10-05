<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rent.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <title>RENTr's CAR</title>
    <link rel="icon" href="vehicle-icon-png-car-sedan-4.png">
    <script src="https://kit.fontawesome.com/50575b88b4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="form">
        <div class="rent-info" >
            <div>
                <label class="labeling">RENT INFO</label>
                <p class="model" id="carModelLabel"></p>
                <p class="name" id="carNameLabel"></p>
                <p class="seat" id="carseatLabel"></p>
                <p class="days" id="cardaysLabel"></p>
            </div>    
            <div>
                <p class="totals" id="cartotalLabel"></p>
                <img class="cars" id="carImage">
                <button class="btnconfirm" id="confirmButton">CONFIRM</button>
            </div>    
        </div>
    </div>


    

    <script>
  document.addEventListener('DOMContentLoaded', function() {
            const carName = localStorage.getItem('carName');
            const carModel = localStorage.getItem('carModel');
            const carSeater = localStorage.getItem('carSeater');
            const totalPrice = localStorage.getItem('totalPrice');
            const totalDays = localStorage.getItem('totalDays');

            // Set values to the respective elements
            document.getElementById('carNameLabel').innerText = carName;
            document.getElementById('carModelLabel').innerText = carModel;
            document.getElementById('carseatLabel').innerText = carSeater;
            document.getElementById('cartotalLabel').innerText = totalPrice;
            document.getElementById('cardaysLabel').innerText = totalDays;
            const carImageUrl = localStorage.getItem('carImageUrl');
            const carImage = document.getElementById('carImage');
            carImage.src = carImageUrl;

            document.getElementById('confirmButton').addEventListener('click', function() {
                // Fetch user's full name from server-side script
                fetch('getemail.php')
                    .then(response => response.text())
                    .then(email => {
                        const rentalData = {
                            carName: carName,
                            carModel: carModel,
                            totalPrice: totalPrice,
                            totalDays: totalDays,
                            email: email.trim() // Trim any extra spaces
                        };

                        console.log('Rental data:', rentalData);

                        // Send a POST request to the backend PHP script
                        fetch('rentalinfo.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: new URLSearchParams(rentalData)
                        })
                        .then(response => {
                            if (response.ok) {
                                alert('Renting is successful!');
                                window.location.href = 'index.php';
                            } else {
                                alert('Error occurred while renting. Please try again later.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Error occurred while renting. Please try again later.');
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching email:', error);
                    });
            });
        });
    </script>
</body>
</html>

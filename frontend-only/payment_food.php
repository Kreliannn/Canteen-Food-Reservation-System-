<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="Assets/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .receipt {
            margin-top: 30px;
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .receipt h4, .receipt p {
            margin-bottom: 10px;
        }
        #printButton {
            margin-top: 20px;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="Assets/img/Local/ncst.png" width="30px"></a>
        <h6 class="text-white">Payment</h6>
    </div>
</nav>

<div class="container mt-4">
    <h2>Order Details</h2>
    <form id="orderForm">
        <label for="timee">Time for Pickup: </label>
        <input type="time" id="timee" name="timee" class="form-control" required>
        <br>
        <label for="date">Choose a date for Pickup: </label>
        <select id="date" class="form-control">
            <option value="Today">Today</option>
            <option value="Tomorrow">Tomorrow</option>
            <option value="In 2 days">In 2 days</option>
        </select>
        <br>
        <div id="cart-items"></div>
        <div id="total">
            <h5>Total: P 0</h5>
        </div>

        <button type="button" id="proceedButton" class="btn btn-success text-light" style="width: 100%;">Proceed to Payment</button>
    </form>

    <!-- Receipt Container (hidden until successful) -->
    <div id="receipt-container" class="receipt" style="display: none;">
        <h4>Receipt</h4>
        <div id="receipt-details"></div>
        <!-- No need for a print button here anymore -->
    </div>
</div>

<script>
    // Function to get cart items from localStorage
    function getCart() {
        return JSON.parse(localStorage.getItem('cart')) || [];
    }

    // Update cart details in the payment page
    function updateCart() {
        let cart = getCart();
        let totalPrice = 0;
        $('#cart-items').empty(); // Clear cart items before updating

        cart.forEach(function (item) {
            $('#cart-items').append(`
                <p>${item.name} - P ${item.price} x ${item.quantity}</p>
            `);
            totalPrice += item.price * item.quantity;
        });

        $('#total').html(`<h5>Total: P ${totalPrice.toFixed(2)}</h5>`);
    }

    // Proceed to payment
    $('#proceedButton').on('click', function () {
        let time = $('#timee').val();
        let date = $('#date').val();
        let cart = getCart();

        if (time && date && cart.length > 0) {
            // Display SweetAlert after successful submission
            Swal.fire({
                title: 'Successfully!',
                text: 'Your order has been placed.',
                icon: 'success',
                confirmButtonText: 'Okay',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show receipt after SweetAlert success
                    let receiptHtml = `
                        <h5>Pickup Details:</h5>
                        <p><strong>Time for Pickup:</strong> ${time}</p>
                        <p><strong>Pickup Date:</strong> ${date}</p>
                        <h5>Ordered Items:</h5>
                    `;

                    cart.forEach(function (item) {
                        receiptHtml += `<p>${item.name} - P ${item.price} x ${item.quantity}</p>`;
                    });

                    // Show total price
                    let totalPrice = cart.reduce((total, item) => total + item.price * item.quantity, 0);
                    receiptHtml += `<h5><strong>Total: P ${totalPrice.toFixed(2)}</strong></h5>`;

                    // Display receipt
                    $('#receipt-details').html(receiptHtml);
                    $('#receipt-container').show();

                    // Trigger the print dialog immediately after the SweetAlert confirmation
                    window.print(); // Open the print dialog
                }
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: 'Please fill in all fields and add items to the cart.',
                icon: 'error',
                confirmButtonText: 'Okay'
            });
        }
    });

    // Initialize cart display
    $(document).ready(function () {
        updateCart();
    });

    $('#proceedButton').on('click', function () {
    let time = $('#timee').val();
    let date = $('#date').val();
    let cart = getCart();

    if (time && date && cart.length > 0) {
        // Create orderDetails object to pass to receipt.php
        let orderDetails = {
            time: time,
            date: date,
            items: cart
        };

        // Use SweetAlert to show success
        Swal.fire({
            title: 'Successfully!',
            text: 'Your order has been placed.',
            icon: 'success',
            confirmButtonText: 'Okay',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to receipt.php and pass order details as a JSON string in the URL
                let orderDetailsString = encodeURIComponent(JSON.stringify(orderDetails));
                window.location.href = "receipt.php?orderDetails=" + orderDetailsString;
            }
        });
    } else {
        Swal.fire({
            title: 'Error!',
            text: 'Please fill in all fields and add items to the cart.',
            icon: 'error',
            confirmButtonText: 'Okay'
        });
    }
});

$('#proceedButton').on('click', function () {
    let time = $('#timee').val();
    let date = $('#date').val();
    let cart = getCart();

    if (time && date && cart.length > 0) {
        // Get current date and time for the order
        let orderDateTime = new Date().toLocaleString();  // This will give the current date and time

        // Create orderDetails object to pass to receipt.php
        let orderDetails = {
            time: time,
            date: date,
            items: cart,
            orderDateTime: orderDateTime  // Include the order date and time
        };

        // Use SweetAlert to show success
        Swal.fire({
            title: 'Successfully!',
            text: 'Your order has been placed.',
            icon: 'success',
            confirmButtonText: 'Okay',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to receipt.php and pass order details as a JSON string in the URL
                let orderDetailsString = encodeURIComponent(JSON.stringify(orderDetails));
                window.location.href = "receipt.php?orderDetails=" + orderDetailsString;
            }
        });
    } else {
        Swal.fire({
            title: 'Error!',
            text: 'Please fill in all fields and add items to the cart.',
            icon: 'error',
            confirmButtonText: 'Okay'
        });
    }
});

</script>

</body>
</html>

<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store 1</title>
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="Assets/js/jquery-3.7.1.min.js"></script>
    <script src="Assets/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/js/sweetalert2.all.min.js"></script>
</head>
<body>
<input type="hidden" id='customer_id' value="<?=$_SESSION['user']['customer_id']?>">
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="Assets/img/Local/ncst.png" alt="NCST Logo" width="30" height="30" class="d-inline-block align-top">
      NCST
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="customer.php">
            <i class="bi bi-arrow-left"></i> Back
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="customer_transaction_drinks.php">View Recent Drinks</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<h1 class="text-center mt-4">DRINKS</h1>

<!-- Menu Section -->
<div class="grid row container-fluid " id="food"></div>

<script>
    $(document).ready(function () {
        // Function to load food items from the database
        function server() {
            $.ajax({
                type: "POST",
                url: "backend/fetch_drinks.php",
                success: function (response) {
                  console.log(response)

                  function enableButton(qnty, food_id, food_name, food_price)
                    {
                        if(qnty < 1)
                        {
                            return "<button class='btn btn-danger text-light add-to-cart mt-2' data-id='${food.Food_ID}' data-name='${food.Food_Name}' data-price='${food.Food_Price}' disabled > out of stock </button>";
                        }
                        else
                        {
                            return `<button class='btn btn-warning text-light add-to-cart mt-2' data-id='${food_id}' data-name='${food_name}' data-price='${food_price}'  >Add to Cart</button>`;
                        }
                    }


                    if (response.length > 0) {
                        let object = JSON.parse(response);
                        object.forEach(function (food) {
                            $("#food").append(`
                            <div class='col-4 mt-3' >
                                <div class='card p-3 text-center shadow'>
                                    <div class='card-body'>
                                        <img src="Assets/img/Web/Web_Food_Thumbnails/${food.Food_Thumbnail_Directory}" style='height:350px; width:100%''>
                                    </div>
                                    <div class="card-footer">
                                        <b>${food.Food_Name}</b><br>
                                        Price: P ${food.Food_Price}
                                        <br>
                                        <!-- Quantity Selector -->
                                        <label for="quantity-${food.Food_ID}">Quantity:</label>
                                        <select class="form-select" id="quantity-${food.Food_ID}" data-id="${food.Food_ID}" data-name="${food.Food_Name}" data-price="${food.Food_Price}">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        ${enableButton(food.Food_Quantity, food.Food_ID, food.Food_Name, food.Food_Price  )}
                                    </div>
                                </div>
                                </div>
                            `);
                        });
                    } else {
                        $("#food").append(`
                            <div class='alert alert-danger'>
                                No data available
                            </div>
                        `);
                    }
                }
            });
        }

        // Call the server function to load food items
        server();

        // Cart data initialization
        let cart = [];
        let totalPrice = 0;

        // Add item to cart
        $(document).on('click', '.add-to-cart', function () {
            let id = $(this).data("id");
            let name = $(this).data("name");
            let price = parseFloat($(this).data("price"));
            let quantity = parseInt($(`#quantity-${id}`).val());  // Get the selected quantity

            Swal.fire(name + " added");

            // Check if the item is already in the cart
            let itemIndex = cart.findIndex(item => item.id === id);
            if (itemIndex >= 0) {
                // Item is already in cart, increase quantity
                cart[itemIndex].quantity += quantity;
            } else {
                // Item is not in cart, add it with the selected quantity
                cart.push({
                    id: id,
                    name: name,
                    price: price,
                    quantity: quantity
                });
            }

            // Update cart display and total price
            updateCart();
        });

        // Remove item from cart
        $(document).on('click', '.remove-from-cart', function () {
            let id = $(this).data("id");

            // Find the item in the cart and remove it
            cart = cart.filter(item => item.id !== id);

            // Update cart display and total price
            updateCart();
        });

        // Function to update cart display and total price
        function updateCart() {
            let cartList = $(".list");
            cartList.empty(); // Clear the cart list
            totalPrice = 0;  // Reset total price

            cart.forEach(function (item) {
                cartList.append(`
                    <li>${item.name} - P ${item.price} x ${item.quantity} 
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="${item.id}">Remove</button>
                    </li>
                `);
                totalPrice += item.price * item.quantity;
            });

            // Update total price and cart display
            $("#total").html(`<h5>Total: P ${totalPrice.toFixed(2)}</h5>`);
        }
        
        $("#paymentbot").click((e)=>{
            
            if(cart.length == 0) cart = "";
            
            e.preventDefault();
            $.ajax({
                url : "backend/database_reserve_food.php",
                method : "post",
                data : {
                    customer_id : $("#customer_id").val(),
                    date : $("#date").val(),
                    time : $("#time").val(),
                    order : cart,
                    total : totalPrice,
                    store : "drink"
                },
                success : (response) => {
                    console.log(response)
                    let res = JSON.parse(response)
                    switch(res.type)
                    {
                        case "success":
                            Swal.fire({
                                title: res.text,
                                icon: "success"
                            });
                            setTimeout(() => {
                                window.location.href = "customer_transaction_drinks.php";
                            }, 1000);
                            
                        break;

                        case "error":
                            Swal.fire({
                                title: res.text,
                                icon: "error"
                            });
                        break;
                    }
                }
            })
        })
    });
</script>



<br><br>
<!-- Cart Section -->


<div id="parent" class="container-fluid px-4">
    <div class="list"><h6>Order List: </h6></div>
    <hr id="hrline">
    <ul>
        <div id="total">
            <h5 id='total_price'>Total: 0</h5>
        </div>
        <div>
            <input type="time" id="time" name="time" class='form-control'required>
            <select name="" id="date" class='form-control'>
                <option value="today"> today </option>
                <option value="tommorow"> tommorow </option>
                <option value="2days"> sa isang araw hahaha </option>
            </select>
            <br>
            <button class="btn btn-success text-light" style="width: 100%;" href="payment.php" id="paymentbot">Proceed to Payment -></button>
        </div>
       
    </ul>
</div>



</body>
</html>

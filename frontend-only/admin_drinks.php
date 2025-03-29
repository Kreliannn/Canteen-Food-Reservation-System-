<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="Assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="Assets\js\bootstrap.bundle.min.js"></script>
    <script src="Assets\js\jquery-3.7.1.min.js"></script>
    <title>Store 1</title>

</head>
<body>

<!-- NAVBAR SA TAAS-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
          <a class="nav-link" href="admin_food.php">Food Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_drinks.php">Drink Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_users.php">Accounts</a>
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

  <h1 class="text-center mt-4"> DRINKS </h1>


  
<form action='backend/add_product.food.php' method='post' enctype='multipart/form-data' class="row container-fluid  shadow mt-4 ms-2" style='height: 150px; background:whitesmoke' >

<div class="col-2">
    <h1 class='text-center text-primary mt-3' style='font-weight:800'> Add Product </h1>
</div>

<div class="col-2 " >
    <h2  class='text-center mt-3  text-primary  mb-3' > Name</h2>
    <input name='name' type="text" class='form-control form-control-lg' placeholder='product name'>
</div>

<div class="col-2 " >
    <h2  class='text-center mt-3  text-primary  mb-3'> Image </h2>
    <input name='image' type="file" class='form-control form-control-lg ms-3' style='width:82%'>
</div>

<div class="col-2 " >
    <h2  class='text-center mt-3  text-primary  mb-3'> price </h2>
    <input name='price' type="number" class='form-control form-control-lg' placeholder=''>
</div>

<div class="col-2 " >
   <h2  class='text-center mt-3  text-primary  mb-3'> stock </h2>
   <input name='stock' type="number" class='form-control form-control-lg' placeholder=''>
</div>

<div class="col-2 " >
    <input type="hidden" name='store' value='drinks'>
    <input type="submit" class='btn btn-primary btn-lg mt-5 ms-5' style='transform:scale(1.9)' value='ADD' name='add'> 
</div>

</form>
<br>


  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th> drinks </th>
        <th>name</th>
        <th>Price</th>
        <th>Stocks</th>
        <th>remove</th>
      </tr>
    </thead>
    <tbody id="food"></tbody>
  </table>
  <script>
    function server(){
      $.ajax({
        type: "POST",
        url: "backend/fetch_drinks.php",
        success: function (response) {
          if(response.length > 0){
            let object = JSON.parse(response)
            // Loop throught JSON data to append rows to the table
            object.forEach(function(object){
              $("#food").append(`
               <tr>
                  <td> <img src="Assets/img/Web/Web_Food_Thumbnails/${object.Food_Thumbnail_Directory}" style='height:40px; width:40px'> </td>
                  <td> <form action='backend/updateDrinksName.php' method="post"> <input type='text'  value='${object.Food_Name}' name='product_name'>   <input type='hidden' name='product_id'   value='${object.Food_ID}'> <input type='submit' class='btn btn-primary'> </form></td>
                  <td> <form action='backend/updateDrinksPrice.php' method="post"> <input type='number'  value='${object.Food_Price}' name='product_price'>   <input type='hidden' name='product_id'   value='${object.Food_ID}'> <input type='submit' class='btn btn-primary'> </form></td>
                  <td> <form action='backend/updateDrinksStock.php' method="post"> <input type='number'  value='${object.Food_Quantity}' name='product_stock'>   <input type='hidden' name='product_id'   value='${object.Food_ID}'> <input type='submit' class='btn btn-primary'> </form></td>
                  <td> <form action='backend/remove_product.php' method="post">   <input type='hidden' name='food_id'   value='${object.Food_ID}'>  <input type='hidden' name='store'   value='drinks'><input type='submit' class='btn btn-danger' value='remove'> </form></td>
                </tr>
              `)
            })
          } else {
            $("#food").append(`
              <div class='alert alert-danger'>
                No data available
              </div>
            `)
          }

        
    
      
        }
      })
    }
    $(document).ready(()=>{
      server()


    })
  </script>
</body>
</html>
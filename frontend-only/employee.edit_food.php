<?php
include "backend/database_configure.second.php"; 


$products = $database->get("select * from  food inner join food_thumbnail on food.Food_id = food_Thumbnail.Food_ID order by food.Food_id desc ", [], "fetchAll");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Orders</title>
 
    <link href="Assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="Assets\js\bootstrap.bundle.min.js"></script>
    <script src="Assets\js\jquery-3.7.1.min.js"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="Assets/img/Local/ncst.png" alt="NCST Logo" width="30" height="30" class="d-inline-block align-top">
      NCST
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-controls="mynavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="database_food.php">Food Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="employee.reserve_order_food.php">Reserve Food</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="employee.edit_food.php">Edit Food</a>
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
    <input type="hidden" name='store' value='food'>
    <input type="submit" class='btn btn-primary btn-lg mt-5 ms-5' style='transform:scale(1.9)' value='ADD' name='add'> 
</div>

</form>




<div class="container mt-5">
        <div class="row justify-content-center">
          <?php foreach($products as $product): ?>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <img src="Assets/img/Web/Web_Food_Thumbnails/<?=$product['Food_Thumbnail_Directory']?>" class="card-img-top" alt="Product Image" style='width:100%; height:300px'>
                    <div class="card-body">
                        <h5 class="card-title"><?=$product['Food_Name']?></h5>
                        <p class="card-text">
                            <strong>Price:</strong> <?=$product['Food_Price']?><br>
                            <strong>Stock:</strong> <?=$product['Food_Quantity']?>
                        </p>
                    </div>
                    <div class="card-footer">
                      <form action="backend/remove_product.php" method='post'>
                          <input type="hidden" value='food' name='store'>
                          <input type="hidden" value='<?=$product['Food_ID']?>' name='food_id'>
                          <input type="submit"  class="btn btn-danger w-100" value="remove">
                      </form>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>

   




   <script>
        $(document).ready(()=>{

          

        })
   </script>
</body>
</html>























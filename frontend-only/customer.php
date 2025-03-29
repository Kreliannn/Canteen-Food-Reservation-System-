<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="Assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="Assets\js\bootstrap.bundle.min.js"></script>
    <script src="Assets\js\jquery-3.7.1.min.js"></script>

<style>
    .card{
        transition: ease ;
        transition-duration: 1s;
        box-shadow: 0 20px 40px gray;
        margin-left: 25vw;
        margin-top: 50px;
        width: 50vw;
    }
    .card:hover{
        box-shadow: 0 20px 40px rgb(55, 55, 55);
    }
</style>

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
    <div class="collapse navbar-collapse row" id="mynavbar">
      <div class="col-10"></div>
      <ul class="navbar-nav col-2">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

        <br>
      <h1 class='text-center'> welcome <?=$_SESSION['user']['customer_name']?> </h1>
      <hr>


      <a href="food.php" style="text-decoration: none;">
      <div class="card  p-3 text-center">
        <div class="card-body"><img src="Assets\img\Local\store1.png" width="100px"></div>
        <div class="card-footer">Store 1 (foods)</div>
      </div>
      </a>

      <a href="drinks.php" style="text-decoration: none;">
        <div class="card  p-3 text-center bg-light">
          <div class="card-body"><img src="Assets\img\Local\store2.png" width="100px"></div>
          <div class="card-footer">Store 2 (drinks)</div>
        </div>
        </a>
</body>
</html>
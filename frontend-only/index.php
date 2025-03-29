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
  body{
        background-image: url("Assets/img/Local/bg.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
  }
    .card{
        transition: ease ;
        transition-duration: 1s;
        box-shadow: 0 20px 40px black;
        margin-left: 5vw;
        margin-top: 50px;
        width: 20vw;
        background-color: rgba(0, 0, 139, 0.3);
        color: white;
        border-radius: 50px;
        border: solid 1px white;
    }
    .card:hover{
        box-shadow: 0 20px 40px rgb(55, 55, 55);
        background-color:  rgba(255, 255, 0, 0.3);
    }
    #headd{
      color: white;
      font-size: 3vw;
      font-weight: bold;
      margin-left: 7vw;
    }
    ul{
      list-style-type: none;
    }
    li{
      float: left;
    }

</style>

</head>
<body>
  <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="Assets\img\Local\ncst.png" width="30px"></a>
          <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login_customer.php">Reserve Food</a>
        </li> 
      </ul>
      <form class="d-flex">
          <a class="nav-link" href="register_customer.php"><img src="Assets/img/Local/employee.png" width="20px"></a>
      </form>
        </div>
      </nav>
      <br>

  <!--INSERT TEXT-->
      <div class="text-light" id="headd"><br>
      Savor the <font style="color: rgb(255, 134, 134);">Flavor</font> of <br>
       <font style="color: rgb(255, 255, 134);">Delicious</font>  Recipes, <br>
        Tips, and <font style="color: rgb(134, 255, 186);">More</font>!
      </div>

      <div class="text-light mt-2" style="margin-left: 7vw; letter-spacing: 5px;">
      Hungry? Order now and satisfy your cravings <br> 
      with fresh, delicious meals delivered straight to you!
      </div>
    
  <!-- BUTTON FOR RESERVE -->
   <ul>
    <li>
      <a href="login_customer.php" style="text-decoration: none;">
      <div class="card  p-3 text-center">
        <div class="card-body"><img src="Assets/img/Local/food_reserve.png" width="100px"></div>
        <div class="card-footer">Reserve Food</div>
      </div>
      </a></li>

      <li>
      <a href="employee_login.php" style="text-decoration: none;">
        <div class="card  p-3 text-center">
          <div class="card-body"><img src="Assets/img/Local/employee.png" width="100px"></div>
          <div class="card-footer">Employee</div>
        </div>
        </a></li>
      </ul>
</body>
</html>
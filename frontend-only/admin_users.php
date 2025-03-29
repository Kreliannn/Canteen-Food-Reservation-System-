<?php
    include "backend/database_configure.second.php"; 

    $user_list = $database->get("select * from customer", [], "fetchAll");
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
    <link rel="stylesheet" href="food_and_drinks.css">
</head>
<body>

<!-- NAVBAR -->
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


    <div class="container mt-5">
        <h2 class="mb-4">Student Information</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Student Number</th>
                    <th scope="col">Student Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($user_list as $user): ?>
                    <tr>
                        <td> <?=$user['username']?></td>
                        <td><?=$user['customer_name']?></td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>



</body>
</html>
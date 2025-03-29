<?php
include "backend/database_configure.second.php"; 

$currentDate = new DateTime();
$today = $currentDate->format('Y-m-d');

$today_order = $database->get("select * from reserve_food where date =? && status = 'waiting' ORDER BY reserve_id DESC", [$today], "fetchAll");

function dateConvert($date)
{
  return DateTime::createFromFormat('Y-m-d', $date)->format('m-d-Y');
}

function TimeConvert($time)
{
  return DateTime::createFromFormat('H:i', $time)->format('g:i A');
}
 

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

    <div class="container mt-4">
        <h1 class="text-center mb-4"> <?= dateConvert($today)?> Orders</h1>
        
        <div id="orderList">
           <?php foreach($today_order as $order): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title  fw-bold">Customer: <?= $order['customer_name']?></h3>
                    <p class="card-text">Student Number: <?= $order['customer_student_id']?> </p>
                    <p class="card-text">Pick-up Date: <?= dateConvert($order['date'])?></p>
                    <p class="card-text">Pick-up Time: <?= TimeConvert($order['time'])?></p>
                      <?php $order_item = $database->get("select * from reserve_food_items where reserve_id = ?", [$order['reserve_id']], "fetchAll") ?>                    
                      <table class='table table-stripped' >
                        <tr>
                          <th> name </th>
                          <th> quantity </th>
                          <th> price </th>
                        </tr>
                        <?php foreach($order_item as $item):?>
                            <tr> 
                              <td> <?=$item['food_name']?> </td>
                              <td> <?=$item['quantity']?> </td>
                              <td> <?=$item['price']?> </td>
                            </tr>
                        <?php endforeach?>
                      </table>
                      <h2> total : <?=$order['total']?></h2> <br>
                      <div class="row">
                      <form action="backend/complete.order.php" method='post' class='col-1'>
                        <input type='hidden' name='store' value='reserve_food'>
                        <input type='hidden' name='reserve_id' value='<?=$order['reserve_id']?>'>
                        <input type="submit" class='btn btn-success' value='complete'>
                      </form>

                      <form action="backend/cancel.order.php" method='post' class='col ms-2'>
                        <input type='hidden' name='store' value='reserve_food'>
                        <input type='hidden' name='reserve_id' value='<?=$order['reserve_id']?>'>
                        <input type="submit" class='btn btn-danger' value='cancel'>
                      </form>
                      </div>
                </div>
            </div>
            <?php endforeach; ?>
  
        </div>
    </div>

   <script>
     
   </script>
    
</body>
</html>
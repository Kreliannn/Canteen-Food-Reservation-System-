<?php
include "backend/database_configure.second.php"; 

$currentDate = new DateTime();
$today = $currentDate->format('Y-m-d');

$today_order = $database->get("select * from reserve_drinks where date =? && status = 'waiting' ORDER BY reserve_id DESC", [$today], "fetchAll");

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

<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="Assets\img\Local\ncst.png" width="30px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="database_drinks.php" style="color: white;">drink Store </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="employee.reserve_order_drinks.php" style="color: white;"> reserve drinks </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="employee.edit_drinks.php" style="color: white;"> edit drinks </a>
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
                    <h3 class="card-title fw-bold">Customer: <?= $order['customer_name']?></h3>
                    <p class="card-text">Student Number: <?= $order['customer_student_id']?> </p>
                    <p class="card-text">Pick-up Date: <?= dateConvert($order['date'])?> </p>
                    <p class="card-text">Pick-up Time: <?= TimeConvert($order['time'])?></p>
                      <?php $order_item = $database->get("select * from reserve_drinks_items where reserve_id = ?", [$order['reserve_id']], "fetchAll") ?>                    
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
                        <input type='hidden' name='store' value='reserve_drinks'>
                        <input type='hidden' name='reserve_id' value='<?=$order['reserve_id']?>'>
                        <input type="submit" class='btn btn-success' value='complete'>
                      </form>

                      <form action="backend/cancel.order.php" method='post' class='col ms-2'>
                        <input type='hidden' name='store' value='reserve_drinks'>
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
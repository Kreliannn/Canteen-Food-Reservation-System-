<?php
include "backend/database_configure.second.php"; 

$all_orders = $database->get("select * from reserve_drinks where customer_student_id = ? ORDER BY reserve_id DESC", [$_SESSION['user']['username']], "fetchAll");

$currentDate = new DateTime();
$today = $currentDate->format('Y-m-d');

$database->update("update reserve_drinks  set status = 'cancelled' where date < ? && status = 'waiting'", [$today]);

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
    <title>Store 1</title>
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="Assets/js/jquery-3.7.1.min.js"></script>
    <script src="Assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="food_and_drinks.css">
</head>
<body>
<input type="hidden" id='customer_id' value="<?=$_SESSION['user']['customer_id']?>">
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
          <a class="nav-link" href="drinks.php">
            <i class="bi bi-arrow-left"></i> Back
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="customer_transaction_drinks.php">Drinks Order</a>
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
        <h1 class="text-center mb-4"> orders </h1>
        
        <div id="orderList">
           <?php foreach($all_orders as $order): ?>
            <div class="card mb-3">
                <div class="card-body">

                    <div class="row">
                        <div class='col-10'>
                            <h5 class="card-title col-5">Customer: <?= $order['customer_name']?></h5>
                            <h5 class="card-title col-5">Total: <?= $order['total']?></h5>
                        </div>
                        
                        <div class='col'>
                            <form classs='col-5'action="backend/cancel.order.php" method='post'> 
                                <input type="hidden"  name='reserve_id' value='<?=$order['reserve_id']?>'>
                                <input type="hidden"  name='store' value='reserve_drinks'>
                                <input type="submit" value='cancel order' class='btn btn-danger ms-3'>
                            </form>
                        </div>
                        
                    </div>
                    
                    <p class="card-text">Student Number: <?= $order['customer_student_id']?> </p>
                    <p class="card-text">Pick-up Date: <?= dateConvert($order['date'])?></p>
                    <p class="card-text">Pick-up Time: <?= timeConvert($order['time'])?></p>
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
                      <?php 

                        $statusClass = match($order['status']) {
                            "waiting" => "alert-primary",
                            "completed" => "alert-success",
                            default => "alert-danger",
                        };
                    ?>
                    <h1 class='text-center alert <?= $statusClass ?>'> <?= htmlspecialchars($order['status']) ?> </h1>

                </div>
            </div>
            <?php endforeach; ?>
  
        </div>
    </div>


</body>
</html>
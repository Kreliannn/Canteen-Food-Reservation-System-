<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
<style>
  #parent{
    background-color: white; 
    position: sticky; 
    bottom: 0; 
    width: 100%; 
    padding: 10px;
}
.babanghr li{
      float: right;
    }
.babanghr ul{
        list-style-type: none;
    }
.spacelang{
      height: 20vw; 
      width: 50px;
    }
</style>
</head>
<body>

<!-- NAVBAR SA TAAS-->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="pictures/ncst.png" width="30px"></a>
    </div>
  </nav>

  <h1 class="text-center mt-4"> CHECK DETAILS </h1>

  <form method="post" class="m-5">
        <label for="fname">Name: </label>
        <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter your name" required>
        <br>
        <label for="">Time for Pickup: </label>
        <input type="time" id="timee" name="timee" class="form-control" required>
        <br>
        <label for="date">Choose a date for Pickup: </label>
        <select id="date" class="form-control">
          <option value="Today">Today</option>
          <option value="Tomorrow">Tomorrow</option>
          <option value="In 2 days">In 2 days</option>
        </select>
  </form>

<br><br><hr>
  <!-- NAVBAR SA IBABA -->
  <div id="parent" class="container-fluid">
         <div class="list"> <h6>Order List: </h6></div>
         <li>FRENCH FRIES = P 30</li>
         <li>FRENCH FRIES = P 30</li>
         <li>FRENCH FRIES = P 30</li>

          <hr>
          <div class="babanghr">
         <ul>
          <li><a class="btn btn-success text-light" href="payment.php" id="paymentbot">Proceed to Payment -></a></li>
          <li><div id="totalnum"><h4> 1000 &nbsp; </h4></div></li>
          <li><div id="total"> <h5>Total: &nbsp;</h5></div></li>
        </ul>
      </div></div></div>

</body>
</html>
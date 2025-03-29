<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link href="Assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="Assets\js\bootstrap.bundle.min.js"></script>
    <script src="Assets\js\jquery-3.7.1.min.js"></script>
    <script src="Assets/js/sweetalert2.all.min.js"></script>
<style>
  #formdesign{
        box-shadow: 0 20px 40px black;
        margin-left: 30vw;
        margin-top:  10vw;
        width: 40vw;
        background-color: rgba(0, 0, 97, 0.493);
        color: white;
        border-radius: 30px;
        border: solid 1px white;
  }
  body{
        background-image: url("Assets/img/Local/bg_registration.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
  }
</style>
</head>
<body>

<!-- NAVBAR SA TAAS-->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="Assets\img\Local\ncst.png" width="30px"></a>
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li></ul>
    </div>
  </nav>


  <div id="formdesign" class="p-5">
        <label for="studentnum">Student Number: </label>
        <input type="text" id="studentnum" name="studentnum" class="form-control" placeholder="Enter your student number" required>
        <br>

        <label for="fname">Name: </label>
        <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter your name" required>
        <br>

        <label for="pass">Password: </label>
        <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter your password" required>
        <br>
         <button type="submit" id='submit' class="btn btn-primary">Submit</button>
</div>


<script>
  $(document).ready(()=>{
    $("#submit").click(()=>{
      $.ajax({
        url : "backend/database_register_customer.php",
        method : "post",
        data : {
          username : $("#studentnum").val(),
          name : $("#fname").val(),
          password : $("#pass").val()
        },
        success : (response) => {
          
          switch(response)
          {
            case "success":
              Swal.fire({
                title: "account created",
                text: "please proceed to login form",
                icon: "successs"
              });
            break;

            case "accountExist":
              Swal.fire({
                title: "student id is taken",
                icon: "error"
              });
            break;

            case "empty":
              Swal.fire({
                title: "Empty field",
                icon: "error"
              });
            break;
          }
        }
      })
    })
  })
</script>
</body>
</html>
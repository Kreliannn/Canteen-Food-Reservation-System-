<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="Assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="Assets\js\bootstrap.bundle.min.js"></script>
    <script src="Assets\js\jquery-3.7.1.min.js"></script>
    <script src="Assets/js/sweetalert2.all.min.js"></script>
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
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="Assets\img\Local\ncst.png" width="30px"></a>
        </div>
    </nav>
    <br>
    <div class="row">
        <div class="col"></div>
        <div class="col">
        <div class="m-5 p-5 card">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required>

        <label for="password">Password: </label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
        <br>
        <button class="btn btn-primary" id="btn">Submit</button>
    </div>
        </div>
        <div class="col"></div>
    </div>
    
    <script>
        $("#btn").on("click",function(){

            let username = $("#username").val()
            let password = $("#password").val()

            $.ajax({
                type: "POST",
                url: "backend/fetch_login.php",
                data: {
                    username: username,
                    password: password,
                },
                success: function (response) {
                    switch(response)
                    {
                        case "food":
                            window.location.href = "database_food.php";
                        break;

                        case "drinks":
                            window.location.href = "database_drinks.php";
                        break;

                        case "admin":
                            window.location.href = "admin_users.php";
                        break;
                        
                        default:
                        Swal.fire({
                            title: "error",
                            icon: "error"
                        });
                        break;
                        
                    }
                }
            });
        })
    </script>
</body>
</html>
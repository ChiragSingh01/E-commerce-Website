<?php 
    session_start();
    if (isset($_SESSION["error"])) {
        echo '<script>alert("' . $_SESSION["error"] . '");</script>';
        unset($_SESSION["error"]);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        .button1{
            border-radius: 15px;
            background-color: black;
            color: white;
            border-color: white;
            padding: 10px 15px;
            
        }
        .bg-light{
            background-color: #ccc!important;
            border-radius: 5%;
        }
    </style>
</head>
<body>
    <div style="background-image: url('https://images.unsplash.com/photo-1636953056323-9c09fdd74fa6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
       
        <div class="d-flex justify-content-center align-items-center vh-100 flex-column">
            <form action="loginValidate.php" method="post" class="bg-light p-2 border border-white border-2" onsubmit="return validate()">
                <h1 style = "color: rgb(255, 255, 255); font-size: 25px; text-align: center; background-color: #000000; padding: 15px; border-top-left-radius: 15px; border-top-right-radius: 15px;">LOGIN</h1>
                <input name="uname" required class="bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none" type="text" placeholder="username">
                <input name="upass1" required class="bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none" type="password" placeholder="password" id="pass1">
                <div style = "text-align: center; margin: 10px;">
                    <button class="button1">Login</button>
                </div> 
                <div class="">
                    <a href="signup.html" style = "color: black;">Signup here..</a>
                </div>
            </form>      
        </div>
    </div>    
</body>
</html>
<?php
include "customer_authentication.php";
include "../shared/classes.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
    <body class='window'>
        <div class = "d-flex flex-column vh-100">
            <div class = "upper_bar d-flex flex-row justify-content border-0 border-dark border-bottom border-5">
                <a href="home.php" style='text-decoration: none; color: black; font-weight: bold; margin-left: 10px; margin-right: 10px;'>Home</a>
                <?php
                        
                    include_once "../shared/connection.php";

                    $row=mysqli_fetch_assoc(mysqli_query($conn,"select * from user where userid=$_SESSION[userid]"));
                    $concatenatedString = $row['Fname'] . " " . $row['Mname'] . " " . $row['Lname'];
                    echo"
                        <div>
                            <h1 style = 'font-size: 1rem; margin-top:10px; margin-left: 10px; margin-right: 10px; ' >Hello $concatenatedString </h1>
                        </div>
                    ";
                ?>
                <form action="search.php" method="get" class="d-flex flex-row align-items-center">
                    <input class="form-control"type="text" name="query" placeholder="Search for products" style=" background-color: #dfdfdf; border: none; margin-left: 20px; margin-top: 15px; width: 500px;">
                    <button type="submit" style="margin-top: 15px">Search</button>
                </form>
                <a href='cart.php' style='text-decoration: none; color: black; font-weight: bold;'>
                    <img src="../shared/images/images (1).png" style="width:45px;">
                <a>
                
                <div>
                    <button onclick='checkLogout()'style='text-decoration: none; color: black; margin-right: 10px;'>Logout</button>
                </div>
                
                <a href="profile.php" style="margin-left: 10px; margin-right: 10px;">
                    <img src="../shared/images/download.png" style="width:45px;">
                </a>
            </div>
           
            <div class="d-flex vh-100">
                <div class="Side_bar d-flex flex-column ">
                    <a href='profile.php' class='anchor'>About</a>
                    <a href='edit_profile.php' class='anchor'>Edit profile</a>
                    <a href='change_pass.php' class="anchor">Change Password</a>
                    <a href='your_order.php' class='anchor'>your Orders</a>
                    <a href='invoice.php' class='anchor'>Invoices</a>
                    <a onclick='alert_info()' class="anchor">Help Center</a>
                </div>
                <div class ="d-flex flex-column vh-100 justify-content">
                    <div class="d-flex flex-row justify-content-center align-items-center">
                        <?php                     
                            echo "
                                <div class='d-flex justify-content-center align-items-center vh-100 ' style='width: 1200px; position:relative; left:80px;'>
                                    <form class='bg-light p-3 border border-white border-2 w-100'>
                                        <h1 style='color: rgb(255, 255, 255); font-size: 25px; text-align: center; background-color: #000000; padding: 15px; border-top-left-radius: 15px; border-top-right-radius: 15px;'>User Details</h1>
                                        <div class='form-group'>
                                            <label style='font-weight: bold;' for='firstName'>First Name:</label>
                                            <h1 id='firstName' class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1'>$concatenatedString</h1>
                                        </div>
                                        <div class='form-group'>
                                            <label style='font-weight: bold;' for='uname'>Username:</label>
                                            <h1 id='uname' name='uname' class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1'>$row[UserName]</h1>
                                        </div>
                                        <div class='form-group'>
                                            <label style='font-weight: bold;' for='Mail_Id'>Email:</label>
                                            <h1 id='Mail_Id' name='Mail_Id' class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1'>$row[Email]</h1>
                                        </div>
                                       
                                        <div class='form-group'>
                                            <label style='font-weight: bold;' for='Phone'>Phone:</label>
                                            <h1 id='Phone' name='Phone' class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1'>$row[CountryCode] $row[PhoneNo]</h1>
                                        </div>

                                        <div class='form-group'>
                                            <label style='font-weight: bold;' for='user_type'>User Type:</label>
                                            <h1 id='user_type' name='user_type' class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1'>$row[User_Type]</h1>
                                        </div>
                                    </form>
                                </div>
                            ";
                        ?>
                    </div>
                </div>
            </div>                     
        </div>
        <script>
            function alert_info(){
                alert("E-mail: Example@abc.com");
            }
        </script>
    </body>
</html>
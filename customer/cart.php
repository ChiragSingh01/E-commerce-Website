<?php
include "customer_authentication.php";
include "../shared/classes.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
           
        </style>
    </head>
    <body class='window'>
        <div class = "d-flex flex-column vh-100">
            <div class = "upper_bar d-flex flex-row justify-content">
                <a href="home.php" style='text-decoration: none; color: black; font-weight: bold; margin-left: 10px; margin-right: 10px;'>Home</a>
                <?php
                        
                    include "../shared/connection.php";

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
           
            <div class ="d-flex flex-column vh-100 justify-content">
                <div class="d-flex flex-row">
                    <?php
                        $sql_obj=mysqli_query($conn,"select * from products,cart where status = 'Active' and pro_id=product_ID and cart.user_id = $_SESSION[userid]");
                                            
                        while($row=mysqli_fetch_assoc($sql_obj)){        
                            echo "
                                <div>
                                    <div class='pdt-card'>
                                        <a href='Product_over_view.php?pro_id=$row[product_ID]' style='text-decoration: none;'>
                                            <div class='name'>$row[product_name]</div>        
                                            <img class='pdt-img' src='$row[product_image]'>
                                            <div class='price'><p><strong>Price:</strong> Rs.$row[product_price]</p></div>
                                        <a>
                                        <div style='display: flex; justify-content: center; align-items: center; width: 100%'>
                                            <a href='removeCart.php?pro_id=$row[product_ID]' style='text-decoration: none;'>
                                                <button class='button1' style=' background-color: red; '>Remove</button>
                                            <a>
                                            <a href='buy.php?pro_id=$row[product_ID]' style='text-decoration: none;'>
                                                <button class='button1' style=' background-color: green; '>Buy</button>
                                            <a>
                                        </div>    
                                    </div>                                    
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>  
            <div class="upper_bar">
                <?php
                    $sql_obj=mysqli_query($conn,"select sum(product_price) as sum from products,cart where status = 'Active' and pro_id=product_ID and cart.user_id = $_SESSION[userid]");
                    $row=mysqli_fetch_assoc($sql_obj);
                    if($row['sum']==""){
                        echo "
                            <h1>CART TOTAL: Rs.0</h1>
                        ";
                    }
                    else{
                        echo "
                            <h1>CART TOTAL: Rs.$row[sum]</h1>
                        "; 
                    }
                    
                ?>
            </div>         
        </div>
    </body>
</html>
<?php
include "customer_authentication.php";
include "../shared/classes.php";
?>
<?php
include "removeCart.php";

$userid = $_SESSION['userid'];
$proid = $_GET['pro_id'];

include_once "../shared/connection.php";
$row=mysqli_fetch_assoc(mysqli_query($conn,"select * from products where product_ID =$proid"));
$row1=mysqli_num_rows(mysqli_query($conn,"select * from address where userId =$userid"));
if ($row1 != 0) {
    $status = mysqli_query($conn, "insert into yourorder(pro_id,vendor_id,user_id) values($proid,$row[vendor_Id],$userid)");
    $status = mysqli_query($conn, "insert into invoice(proId,userId,vendorId) values($proid,$userid,$row[vendor_Id])");

    if ($status) {
        header('Location: your_order.php');
        exit();
    } else {
        echo "Error in Product Upload";
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
    <body class='window'>
        <div class = " mainWindow d-flex flex-column vh-100">
            <div class = "upper_bar d-flex flex-row justify-content">
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
           
            <div class ="d-flex flex-column vh-100 justify-content-center align-items-center">
                <div class="d-flex flex-row">
                    <?php
                        $userid=$_SESSION['userid'];
                        $proid=$_GET['pro_id'];

                        include_once "../shared/connection.php";
                        $row=mysqli_fetch_assoc(mysqli_query($conn,"select * from products where product_ID =$proid"));
                        $row1=mysqli_num_rows(mysqli_query($conn,"select * from address where userId =$userid"));
                        if($row1==0){
                            echo"
                                <div class='d-flex justify-content-center align-items-center vh-100 ' style='width: 1200px; position:relative; left:60px;'>
                                    <form action='address.php' method='post' class='bg-light p-3 border border-white border-2 w-50'>
                                        <h1 style = 'color: rgb(255, 255, 255); font-size: 25px; text-align: center; background-color: #000000; padding: 15px; border-top-left-radius: 15px; border-top-right-radius: 15px;'>EDIT</h1>
                                        <input name='address' required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none'type='text' placeholder='Address Line 1'>
                                        <input name='address2' class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none'type='text' placeholder='Address Line 2'>
                                        <input name='district' required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none'type='text' placeholder='District'>
                                        <input name='city' required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none'type='text' placeholder='City'>
                                        <input name='postal_code' required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none'type='text' placeholder='Postal Code'>
                                        <div style = 'text-align: center; margin: 10px;'>
                                            <button class='button1'>Save</button>
                                        </div> 
                                    </form>
                                </div>
                            ";
                        }
                        if($row1!=0){
                            $status=mysqli_query($conn,"insert into yourorder(pro_id,vendor_id,user_id) values($proid,$row[vendor_Id],$userid)");

                            if($status)
                            {
                                echo "Product Uploaded Successfully";
                                header('Location: your_order.php');
                            }
                            else
                            {   
                                echo "Error in Product Upload";
                                echo mysqli_error($conn);
                                header('Location: home.php');
                            }
                        }

                    ?>
                </div>
            </div>           
        </div>
    </body>
</html>
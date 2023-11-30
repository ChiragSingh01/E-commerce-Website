<?php
    include 'vendor_authentication.php';
    include "../shared/classes.php";
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>

</head>
<body class="window">
    <div class = 'd-flex flex-column vh-100 ' id='update'>
        <div class = 'upper_bar'>
            <a href='home.php' style='text-decoration: none; color: black; font-weight: bold; margin-left: 10px; margin-right: 10px;'>Home</a>
            <?php
                include_once '../shared/connection.php';
                $user_id=$_SESSION['userid'];
                $row=mysqli_fetch_assoc(mysqli_query($conn,"select * from user where userid=$user_id"));
                $concatenatedString = $row['Fname'] . ' ' . $row['Mname'] . ' ' . $row['Lname'];
                echo"
                    <div>
                        <h1 style = 'font-size: 1rem; margin-top:10px; margin-left: 10px; margin-right: 10px;' >Hello $concatenatedString </h1>
                    </div>
                ";
            ?>
            <form action='search.php' method='get' class='d-flex flex-row align-items-center'>
                <input class='form-control'type='text' name='query' placeholder='Search for products' style=' background-color: #dfdfdf; border: none; margin-left: 20px; margin-top: 15px'>
                <button type='submit' style='margin-right: 10px; margin-top: 15px'>Search</button>
            </form>
            <a href='uploadProduct1.php' style='text-decoration: none; color: black; font-weight: bold; margin-left: 10px; margin-right: 10px;'>Uploade Product<a>
            <div>
                <button onclick='checkLogout()'style='text-decoration: none; color: black; margin-left: 10px; margin-right: 10px;'>Logout<buttons>
            </div>
            <a href='profile.php' style='margin-left: 10px; margin-right: 10px;'>
                <img src='../shared/images/download.png' style='width:45px;'>
            </a>
        </div>
        <?php
            include_once "../shared/connection.php";
            $pro_id=$_GET['pro_id'];
            $row=mysqli_fetch_assoc(mysqli_query($conn,"select * from products where product_ID=$pro_id"));
            echo " 
                <div class ='d-flex flex-column ' style='background-image: linear-gradient(180deg, #000, #000); margin: 0; padding: 0; width: 100%; hight: 100%'>
                    <div class='d-flex justify-content-center align-items-center flex-column mt-5'>
                        <form action='save_product.php?pro_id=$pro_id' method='post' enctype='multipart/form-data' class='bg-light p-2 border border-white border-2'>
                            <h3 style = 'color: rgb(255, 255, 255); font-size: 25px; text-align: center; background-color: #000000; padding: 15px; border-top-left-radius: 15px; border-top-right-radius: 15px;'>Edit Product</h3>
                            <input required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none' type='text' placeholder='Product Name' name='name' value='$row[product_name]'>
                            <input required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none' type='text' placeholder='Product Price' name='price' value='$row[product_price]'>

                            <textarea required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none'  id='' cols='20' rows='5' placeholder='Product Details' name='details' id='myTextarea'></textarea>

                            <input required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none' type='text' placeholder='Product Code' name='code' value='$row[product_code]'>
                            <label class='text-dark ms-2 mt-2' >Category</label>

                            <select required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none'  id='category' name='category' value='$row[category]'>
                                <option>Electronics</option>
                                <option>Home Applicances</option>
                                <option>Fashion</option>
                                <option>Sports</option>
                            </select>
                            <input type='text' required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none' id='stocks' name='stocks' placeholder='Stocks' value='$row[stock]'>
                            <label class='text-dark  ms-2 mt-2' >Status</label>
                            <select required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none'  id='status' name='status' value='$row[status]'>
                                <option>Active</option>
                                <option>Deactive</option>
                            </select>
                            <input type='file' required class='bg-transparent form-control mt-2 border-0 border-dark border-bottom border-1 shadow-none' accept='.jpg,.png,.webp,.avif' name='pdt_img' value='$row[product_image]'>

                            <div class='text-center mt-3'>
                                <button class='button1'>EDIT</button>
                            </div>
                        

                        </form>
                    </div>
                </div>
                <script>
                    var textarea = document.getElementById('myTextarea');

                    window.addEventListener('load', function () {
                        textarea.value = $row[product_details];
                    });
                </script>
            ";
           
        ?>
        
    
    </div>
    
    
</body>
</html>
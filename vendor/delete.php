<?php
$pro_id = $_GET['pro_id'];
include_once "../shared/connection.php";

$impath="../shared/images/".$_FILES['pdt_img']['name'];
move_uploaded_file($_FILES['pdt_img']['tmp_name'],$impath);

$status=mysqli_query($conn,"delete from products where product_ID = $pro_id");

if($status)
{
    echo "Product Updated Successfully";
    header('Location: home.php');
}
else
{   
    echo "Error in Product Upload";
    echo mysqli_error($conn);
    header('Location: home.php');
}


?>
<?php
session_start();
$userid=$_SESSION['userid'];

include_once "../shared/connection.php";

$impath="../shared/images/".$_FILES['pdt_img']['name'];
move_uploaded_file($_FILES['pdt_img']['tmp_name'],$impath);

$status=mysqli_query($conn,"insert into products(product_name,product_price,product_details,product_code,category,product_image,vendor_id,stock,status) values('$_POST[name]',$_POST[price],'$_POST[details]','$_POST[code]','$_POST[category]','$impath',$userid,$_POST[stocks],'$_POST[status]')");

if($status)
{
    echo "Product Uploaded Successfully";
    header('Location: home.php');
}
else
{   
    echo "Error in Product Upload";
    echo mysqli_error($conn);
    header('Location: home.php');
}


?>
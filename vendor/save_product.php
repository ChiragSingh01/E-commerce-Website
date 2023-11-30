<?php
$pro_id = $_GET['pro_id'];
include_once "../shared/connection.php";

$impath="../shared/images/".$_FILES['pdt_img']['name'];
move_uploaded_file($_FILES['pdt_img']['tmp_name'],$impath);

$status=mysqli_query($conn,"update products set product_name='$_POST[name]',product_price=$_POST[price],product_details='$_POST[details]',product_code='$_POST[code]',category='$_POST[category]',product_image='$impath',stock=$_POST[stocks],status='$_POST[status]' where product_ID = $pro_id");

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
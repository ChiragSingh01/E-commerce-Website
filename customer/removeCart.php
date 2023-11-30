<?php
include "customer_authentication.php";
$userid=$_SESSION['userid'];

include_once "../shared/connection.php";

$status=mysqli_query($conn,"delete from cart where pro_id=$_GET[pro_id] and user_id=$userid");

if($status)
{
    echo "Product Removed Successfully";
    header('Location: cart.php');
}
else
{   
    echo "Error in Product Removel";
    echo mysqli_error($conn);
    header('Location: home.php');
}


?>
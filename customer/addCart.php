<?php
include "customer_authentication.php";
$userid=$_SESSION['userid'];

include_once "../shared/connection.php";

$status=mysqli_query($conn,"insert into cart(pro_id,user_id) values($_GET[pro_id],$userid)");

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
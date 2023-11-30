<?php
include_once "customer_authentication.php";
$userid=$_SESSION['userid'];

include_once "../shared/connection.php";

$status=mysqli_query($conn,"insert into address(address,address2,district,city,postal_code,userId) values('$_POST[address]','$_POST[address2]','$_POST[district]','$_POST[city]',$_POST[postal_code],$_SESSION[userid])");

if($status)
{
    echo "Product Uploaded Successfully";
    header('Location: buy.php');
    exit();
}
else
{   
    echo "Error in Product Upload";
    echo mysqli_error($conn);
}


?>
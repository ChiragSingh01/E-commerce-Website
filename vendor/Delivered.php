<?php
session_start();
$userid=$_SESSION['userid'];
$orderid=$_GET['order_id'];
$invoiceid=$_GET['invoiceid'];

include_once "../shared/connection.php";
$status=mysqli_query($conn,"delete from yourorder where order_id=$orderid and vendor_id=$userid");
if($status)
{
    echo "Product Uploaded Successfully";
    header('Location: orders.php');
}
else
{   
    echo "Error in Product Upload";
    echo mysqli_error($conn);
    header('Location: home.php');
}


?>
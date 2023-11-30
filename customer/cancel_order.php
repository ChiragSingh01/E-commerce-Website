<?php
session_start();
$userid=$_SESSION['userid'];
$orderid=$_GET['order_id'];
$invoiceid=$_GET['invoiceid'];

include_once "../shared/connection.php";
$status=mysqli_query($conn,"delete from yourorder where order_id=$orderid and user_id=$userid");
$status1=mysqli_query($conn,"delete from invoice where invoiceId=$invoiceid and userId=$userid");
if($status and $status1)
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


?>
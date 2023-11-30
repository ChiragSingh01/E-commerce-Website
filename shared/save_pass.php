<?php
session_start();
include_once "connection.php";
    $expass=$_POST['expass'];
    $pass1=$_POST['upass1'];
    $cipher_text=md5($expass);
    $cipher_text1=md5($pass1);

$sql_obj=mysqli_query($conn,"select * from user where userid='$_SESSION[userid]' and password='$cipher_text'");
$no_of_records=mysqli_num_rows($sql_obj);
if($no_of_records!=0){
    $status=mysqli_query($conn,"update user set Password='$cipher_text1' where UserId = $_SESSION[userid]");
}
if($no_of_records==0){
    echo"alert('Current Password is Missmatch')";
}

if($status)
{
    if($_SESSION['usertype']=='Customer')
    {
        header('Location: ../customer/profile.php');
    }
    if($_SESSION['usertype']=='Vendor')
    {
        header('Location: ../vendor/profile.php');
    }
}
else
{   
    echo "Error in Update";
    echo mysqli_error($conn);
    header('Location: profile.php');
}


?>
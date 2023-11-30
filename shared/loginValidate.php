<?php

session_start();
$_SESSION['login_status']=false;

$uname=$_POST['uname'];
$upass=$_POST['upass1'];
$cipher_text=md5($upass);

include_once "connection.php";

$sql_obj=mysqli_query($conn,"select * from user where username='$uname' and password='$cipher_text'");

$no_of_records=mysqli_num_rows($sql_obj);
if($no_of_records==0){
    $_SESSION['error'] = "Username or Password is incorrect";
    header("location:login.php");
    die;
}
$row=mysqli_fetch_assoc($sql_obj);

$_SESSION['login_status']=true;
$_SESSION['usertype']=$row['User_Type'];
$_SESSION['username']=$row['UserName'];
$_SESSION['userid']=$row['UserId'];

if($row['User_Type']=='Vendor'){
    header("location:../vendor/home.php");
}
else if($row['User_Type']=='Customer'){
    header("location:../customer/home.php");
}
?>
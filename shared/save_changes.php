<?php
session_start();
include_once "connection.php";
    $uname=$_POST['uname'];
    $user_type=$_POST['user_type'];
    $Fname=$_POST['Fname'];
    $Mname=$_POST['Mname'];
    $Lname=$_POST['Lname'];
    $Mail_Id=$_POST['Mail_Id'];
    $CountryCode=$_POST['CountryCode'];
    $Phone=$_POST['Phone'];

$status=mysqli_query($conn,"update user set username='$uname',User_Type='$user_type',Fname='$Fname',Mname='$Mname',Lname='$Lname',Email='$Mail_Id',CountryCode='$CountryCode',PhoneNo=$Phone where UserId = $_SESSION[userid]");

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
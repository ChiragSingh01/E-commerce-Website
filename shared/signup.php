<?php 
    $uname=$_POST['uname'];
    $upass1=$_POST['upass1'];
    $upass2=$_POST['upass2'];
    $user_type=$_POST['user_type'];
    $Fname=$_POST['Fname'];
    $Mname=$_POST['Mname'];
    $Lname=$_POST['Lname'];
    $Mail_Id=$_POST['Mail_Id'];
    $CountryCode=$_POST['CountryCode'];
    $Phone=$_POST['Phone'];

    if($upass1!=$upass2){
        echo ("Password mismatch");
        die;
    }

    include_once "connection.php";

    $cipher_text=md5($upass1);

    if(mysqli_query($conn,"insert into user(FName,MName,LName,UserName,Email,Password,CountryCode,PhoneNo,User_Type) values('$Fname','$Mname','$Lname','$uname','$Mail_Id','$cipher_text','$CountryCode',$Phone,'$user_type')")){
        header("location:login.html");
    }
    else{
        echo "Signup Failed";
        echo mysqli_error($conn);
    }
?>


<?php
session_start();
include "DBConnection.php";


if(isset($_POST['submit'])){

    mysqli_select_db($conn, 'formdata');
    $Name = $_POST ['username'];
    $email = $_POST ['email'];
    $Location = $_POST ['location'];
    $password = $_POST ['password'];
    $CPassword = $_POST ['cpassword'];

   $email_query = "SELECT * FROM formdata WHERE Email = '$email'";

    $email_query_run = mysqli_query($conn,   $email_query);
    $query = mysqli_num_rows($email_query_run);

    if($query>0){
        echo "<br /><br />Email already inserted";
    }else{
        if($password === $CPassword){
            $insertquery = "INSERT INTO `formdata`(`Name`, `Email`,`Location`, `Password`, `Cpassword`) VALUES ('$Name', '$email','$Location', '$password', '$CPassword')";
            $sqlquery = mysqli_query($conn,  $insertquery);
        }else{
            echo "password not match";
        }
        
    }

}

?>
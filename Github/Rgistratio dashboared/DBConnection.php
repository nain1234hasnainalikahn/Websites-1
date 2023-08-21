<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formdata";

$conn = mysqli_connect($servername, $username, $password, $dbname );
if($conn){
        echo "Sucessfully Login";
}
else{
    echo "Not Successsfully login";
}
?>
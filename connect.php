<?php
$servername="localhost";
$username= "root";
$password= "";
$dbname= "rev";
$conn= mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
    //echo"connected";
}
    else {
        echo "failed".mysqli_connect_error();}
?>


<?php 

 $server ="localhost";
 $user="root";
 $password ="";
 $dbname="blogger";


 $conn = new mysqli($server,$user,$password,$dbname);
 if($conn->connect_error)
 {
 	die("Connection failed".mysqli_connect_error());
 }
 
 ?>
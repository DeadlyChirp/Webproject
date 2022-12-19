<?php
include_once '../Webpage/profile-restau.php';
include_once 'connect-db-restau.php';


$get = $_GET['categories']; 
$ID = $_SESSION['ID'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE restaurants set categories='$get' where restaurantsId=$ID";
  
   if (mysqli_query($conn, $sql)) {
     echo "Record updated successfully";
   } else {
     echo "Error updating record: " . mysqli_error($conn);
   }

   mysqli_close($conn);
// mysqli_query($conn, $sql)
?>
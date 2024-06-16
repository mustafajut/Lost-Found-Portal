<?php
include_once "../config/dbconnect.php";

$Id = $_POST['Id'];
$userName = $_POST['Username'];
$userEmail = $_POST['Email'];
$Contact = $_POST['Phone'];

$updateUser = mysqli_query($conn,"UPDATE users SET 
    Username='$userName', 
    Email='$userEmail', 
    Phone='$Contact' 
    WHERE Id='$Id'");
if($updateUser)
{
    echo "true";
}
else
{
    echo "Error: " . mysqli_error($conn);
}
?>

<?php
include_once "../config/dbconnect.php";

$fitemId = $_POST['fitemId'];
$fitemName = $_POST['fitemName'];
$category_name = $_POST['category_name'];
$FDate = $_POST['FDate'];
$fLocation = $_POST['fLocation'];
$fTime = $_POST['fTime'];
$fItemDescription = $_POST['fItemDescription'];
$Contact = $_POST['Contact'];

$updateItem = mysqli_query($conn, "UPDATE reportlost SET 
    litemName='$fitemName', 
    category_name='$category_name', 
    LostDate='$FDate', 
    lLostLocation='$fLocation', 
    lLostTime='$fTime', 
    lItemDescription='$fItemDescription', 
    Contact='$Contact'
    WHERE litemId=$fitemId");

if ($updateItem) {
    echo "true";
} else {
    echo mysqli_error($conn);
}
?>

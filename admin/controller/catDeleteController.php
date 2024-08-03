<?php
include_once "../config/dbconnect.php";

$c_id = $_POST['record'];

// Check if there are dependent records in the reportlost table
$checkQuery = "SELECT COUNT(*) AS count FROM reportlost WHERE category_name = (SELECT category_name FROM category WHERE category_id='$c_id')";
$checkResult = mysqli_query($conn, $checkQuery);
$checkRow = mysqli_fetch_assoc($checkResult);

if ($checkRow['count'] > 0) {
    echo "Cannot delete this category because it is currently used in the reportlost table. Please delete or update the associated records before attempting to delete the category.";
} else {
    // If no dependencies are found, proceed to delete the category
    $query = "DELETE FROM category WHERE category_id='$c_id'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "Category Item Deleted";
    } else {
        echo "Not able to delete";
    }
}
?>

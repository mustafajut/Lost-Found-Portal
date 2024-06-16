<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['submit']))
    {
        $litemName = $_POST['litemName'];
        $lItemDescription = $_POST['lItemDescription'];
        $Contact = $_POST['Contact'];
        $category = $_POST['category_Id'];
       
        // File handling
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location = "./uploads/";
        $image = $location . $name;

        $target_dir = "../uploads/";
        $finalImage = $target_dir . $name;

        move_uploaded_file($temp, $finalImage);

        // Inserting data into the database
        $insert = mysqli_query($conn, "INSERT INTO reportlost
            (litemName, itemimage, Contact, lItemDescription, category_Id) 
            VALUES ('$litemName', '$image', $Contact, '$lItemDescription', '$category')");

        if(!$insert)
        {
            echo mysqli_error($conn);
        }
        else
        {
            echo "Records added successfully.";
        }
    }
?>

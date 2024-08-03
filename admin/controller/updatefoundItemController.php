<?php
    include_once "../config/dbconnect.php";

    $fitemId=$_POST['fitemId'];
    $fitemName= $_POST['fitemName'];
    $fItemDescription= $_POST['fItemDescription'];
    $Contact= $_POST['Contact'];
    $ficategory= $_POST['ficategory'];

    if( isset($_FILES['newImage']) ){
        
        $location="./uploads/";
        $img = $_FILES['newImage']['name'];
        $tmp = $_FILES['newImage']['tmp_name'];
        $dir = '../uploads/';
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','webp');
        $image =rand(1000,1000000).".".$ext;
        $final_image=$location. $image;
        if (in_array($ext, $valid_extensions)) {
            $path = UPLOAD_PATH . $image;
            move_uploaded_file($tmp, $dir.$image);
        }
    }else{
        $final_image=$_POST['existingImage'];
    }
    $updateItem = mysqli_query($conn,"UPDATE reportfound SET 
        fitemName='$litemName', 
        fItemDescription='$lItemDescription', 
        Contact=$Contact,
        categoryId=$category,
        itemimage='$final_image' 
        WHERE fitemId=$fitemId");


    if($updateItem)
    {
        echo "true";
    }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>

<?php

    include_once "../config/dbconnect.php";
    
    $p_id=$_POST['record'];
    $query="DELETE FROM reportlost where litemId='$p_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Lost Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>
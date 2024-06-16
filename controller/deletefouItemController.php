<?php

    include_once "../config/dbconnect.php";
    
    $p_id=$_POST['record'];
    $query="DELETE FROM reportfound where fitemId='$p_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Found Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>
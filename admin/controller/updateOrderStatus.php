<?php

    include_once "../config/dbconnect.php";
   
    $cId=$_POST['record'];
    //echo $cId;
    $sql = "SELECT claim_status from lostclaim where cId='$cId'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["claim_status"]==0){
         $update = mysqli_query($conn,"UPDATE lostclaim SET claim_status=1 where cId='$cId'");
    }
    else if($row["claim_status"]==1){
         $update = mysqli_query($conn,"UPDATE lostclaim SET claim_status=0 where cId='$cId'");
    }
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>
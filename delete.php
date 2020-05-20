<?php

include 'dbcon.php';

if (isset($_GET["hou_id"])){

    $hou_id=$_GET["hou_id"];
    $sql = "DELETE FROM hou WHERE hou_id='$hou_id'";
    $result = mysqli_query($db, $sql);
    if($result){
        header("location: listhou.php?delete=success");
     } else {
        header("location: listhou.php?delete=failed");
    }
   
    
}else if (isset($_GET["staff_id"])){

    $staff_id=$_GET["staff_id"];
    $sql = "DELETE FROM staff WHERE staff_id='$staff_id'";
    $result = mysqli_query($db, $sql);
    if($result){
        header("location: liststaff.php?delete=success");
     } else {
        header("location: liststaff.php?delete=failed");
    }
   
    
}else if (isset($_GET["aduan_id"])){

    $aduan_id=$_GET["aduan_id"];
    $sql = "DELETE FROM aduan WHERE aduan_id='$aduan_id'";
    $result = mysqli_query($db, $sql);
    if($result){
        header("location: houcomplaints.php?delete=success");
     } else {
        header("location: houcomplaints.php?delete=failed");
    }
   
    
}

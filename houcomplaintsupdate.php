<?php
session_start();
include_once 'dbcontrol.php'; 
$db_handle = new DBController();
include 'dbcon.php';
$email= $_SESSION["email"];


if (isset($_POST["submitaduan"])){
  
    // $id = $_POST["aduan_id"];
    $status = $_POST["status"];
    $aduan_userid = $_SESSION['aduan_iduser'];
    // echo $aduan_userid;
    // $idstaff =$_POST["idstaff"];
    $staffName = $_POST["staff_name"]; 
    
    $updatesql = "UPDATE aduan SET status='$status', idstaff=12344
    WHERE iduser='hitam@mail.com'";
    $result2 = mysqli_query($db, $updatesql);
    // echo $result2;
    
    if ($result2){
        echo "<script>alert('Update success!'); </script>";
        header("location: houcomplaints.php");
    }else {
        echo "<script>alert('Update failed!'); </script>";
        header("location: houcomplaints.php");
    }
}

if (isset($_POST["submitaduan1"])){
  
    // $id = $_POST["aduan_id"];
    $status = $_POST["status"];
    $aduan_userid = $_SESSION['aduan_iduser'];
    // echo $aduan_userid;
    // $idstaff =$_POST["idstaff"];
    $staffName = $_POST["staff_name"]; 
    
    $updatesql = "UPDATE aduan SET status='$status'
    WHERE iduser='hitam@mail.com'";
    $result2 = mysqli_query($db, $updatesql);
    // echo $result2;
    
    if ($result2){
        echo "<script>alert('Update success!'); </script>";
        header("location: staffstatus.php");
    }else {
        echo "<script>alert('Update failed!'); </script>";
        header("location: staffstatus.php");
    }
}

if (isset($_POST["submitaduan2"])){
  
    // $id = $_POST["aduan_id"];
    $status = $_POST["status"];
    $aduan_userid = $_SESSION['aduan_iduser'];
    // echo $aduan_userid;
    // $idstaff =$_POST["idstaff"];
    $staffName = $_POST["staff_name"]; 
    
    $updatesql = "UPDATE aduan SET idstaff=12344
    WHERE iduser='hitam@mail.com'";
    $result2 = mysqli_query($db, $updatesql);
    // echo $result2;
    
    if ($result2){
        echo "<script>alert('Update success!'); </script>";
        header("location: houcomplaints.php");
    }else {
        echo "<script>alert('Update failed!'); </script>";
        header("location: houcomplaints.php");
    }
}
?>
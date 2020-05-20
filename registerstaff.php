<?php
include 'dbcon.php';

if(isset($_POST["submit"])){
    
    $staff_name= $_POST["staff_name"];
    $email= $_POST["email"];
    $idstaff= $_POST["idstaff"];
    $pword= $_POST["pword"];
    $pwordcon= $_POST["pwordcon"];
    $staff_phone= $_POST["staff_phone"];
    
    $sql = "INSERT INTO staff (staff_name, email, idstaff, pword, pwordcon, staff_phone ) VALUES "
            ."('$staff_name', '$email', '$idstaff', '$pword', '$pwordcon', '$staff_phone')";
    $result = mysqli_query($db, $sql);
    if($result){
        echo "<script> alert('REGISTRATION SUCCESSFUL!')</script>";
        // include_once ("liststaff.php");
    }else {
        echo "";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>UITMCTKKT | Register Staff :: UiTM</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="bg-page py-5">
        <div class="container">
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Register</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="#" method="post">
                    <div class="form-group">
                        <label>Staff Name</label>
                        <input type="text" id="staff_name" name="staff_name" class="form-control" placeholder="Enter staff name" required="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required="">
                    </div>
                    <div class="form-group">
                        <label>Staff ID</label>
                        <input type="text" id="idstaff" name="idstaff" class="form-control" placeholder="Enter staff ID" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pword" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="pwordcon" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" id="staff_phone" name="staff_phone" class="form-control" placeholder="Enter phone number" required="">
                    </div>
                    <div class="form-check text-center">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Agree the terms and policy</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4">Submit</button>
                </form>
                <h1 class="paragraph-agileits-w3layouts mt-2">
                    <a href="adminhome.php">Back to Home</a>
                </h1>
            </div>

            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
                <p>© 2019 Universiti Teknologi MARA Cawangan Terengganu Kampus Kuala Terengganu. All Rights Reserved | Design by
                    <a href="http://w3layouts.com/"> UiTM </a>
                </p>
            </div>
            <!--// Copyright -->
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>
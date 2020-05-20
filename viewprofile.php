<?php
session_start();
include_once 'dbcontrol.php'; 
$db_handle = new DBController();
include 'dbcon.php';

$email= $_SESSION["email"];
$iduser= $_GET["iduser"];
$sql = "SELECT * FROM user WHERE email='$iduser'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

        //$code = $_GET["prod_id"];
	$product_array = $db_handle->runQuery("SELECT * FROM user WHERE email='$iduser'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			}
    }
    
    if (isset($_POST["submit"])){
  
        $id = $_POST["user_id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $pword = $_POST["pword"];
        $pwordcon = $_POST["pwordcon"];
        $phone_num =$_POST["phone_num"];
        
        $updatesql = "UPDATE user SET fname='$fname', lname='$lname', email='$email', pword='$pword', pwordcon='$pwordcon', phone_num='$phone_num' WHERE email='$email'";
        $result2 = mysqli_query($db, $updatesql);
        
        if ($result2){
            
            header ("Location: editprofile.php?update=success");
        }else {
            
            header ("Location: editprofile.php?update=failed");
        }
            header ("Refresh:0");
        }
	?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>UITMCTKKT | Complainant Profile :: UiTM</title>
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
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
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
<div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
            <h2>
                <a href="houhome.php">UITMCTKKT Mobile Complaint Management System</a>
                </h2>
                <span>UITMCTKKT</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li>
                <a href="houhome.php">
                        <i class="fas fa-th-large"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="houcomplaints.php" class="active">
                        <i class="far fa-file"></i>
                        Complaints
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fas fa-power-off"></i>
                        Log Out
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <!-- Search-from -->
                    <form action="#" method="post" class="form-inline mx-auto search-form">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required="">
                        <button class="btn btn-style my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <!--// Search-from -->
                    <?php                 
   if(isset($_SESSION["email"])){
          
            $email= $_SESSION["email"];
          
            
           $sql3 = "SELECT * FROM hou WHERE email='$email'";
            $result3 = mysqli_query($db, $sql3);
            $row3 = mysqli_fetch_assoc($result3);           
    
 if (isset($_GET["update"])){
            if($_GET["update"] == "success"){
            echo "<script>alert('Update success!'); </script>";
               
            } else {
                echo "<script>alert('Update failed!'); </script>";
            }
        }
             ?>  
                    <ul class="top-icons-agileits-w3layouts float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                        <img src="images/profile.jpg" class="img-fluid mb-3" alt="Responsive image">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits"><?= $row3["hou_name"];?></h3>
                                        <a href=""><?php 
                     
                                            echo $_SESSION["email"];
                                            ?></a>
                                    </div>
                                </div>
                                <a href="" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-user mr-3"></i>My Profile</h4>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--// top-bar -->
            <?php
            
        }?>
            <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Complainant Profile</h4>
                    <form action="#" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fname">First Name</label>
                                <input value="<?php echo $product_array[$key]["fname"]; ?>" type="text" class="form-control" name="fname" id="fname" placeholder="Your first name" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname">Last Name</label>
                                <input value="<?php echo $product_array[$key]["lname"]; ?>" type="text" class="form-control" name="lname" id="lname" placeholder="Your last name" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="<?php echo $product_array[$key]["email"]; ?>" type="text" class="form-control" name="email" id="email" required="">
                        </div>
                        <div class="form-group">
                                    <label for="phone_num">Phone Number</label>
                                    <input value="<?php echo $product_array[$key]["phone_num"];?>" class="form-control" id="phone_num" name="phone_num" required="">
                                </div>
                    </form>
                    <?php
			
	?>
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

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>
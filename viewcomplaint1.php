<?php
session_start();
include_once 'dbcontrol.php'; 
$db_handle = new DBController();
include 'dbcon.php';

$id = $_GET["aduan_id"];
$sql = "SELECT * FROM aduan WHERE aduan_id='$id'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

$email= $_SESSION["email"];

        $aduanid = $_GET["aduan_id"];
        //$code = $_GET["prod_id"];
	$product_array = $db_handle->runQuery("SELECT * FROM aduan WHERE aduan_id= '$aduanid' ORDER BY aduan_id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
               <?php
			}
	}
	?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>UITMCTKKT | Complaint :: UiTM</title>
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
            <h3>
            <a href="houhome.php">UITMCTKKT Mobile Complaint Management System</a>
                </h3>
                <span>UITMCTKKT</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="houhome.php">
                        <i class="fas fa-th-large"></i>
                        Home
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
        
         if (isset($_GET["delete"])){
            if($_GET["delete"] == "success"){
            echo "<script>alert('Delete success!'); </script>";
               
            } else {
                echo "<script>alert('Delete failed!'); </script>";
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
                                        <a href="houhome.php?email="><?php 
                     
                                            echo $_SESSION["email"];
                                            ?></a>
                                    </div>
                                </div>
                                <a href="edithou.php" class="dropdown-item mt-3">
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
                    <h4 class="tittle-w3-agileits mb-4">Complaint Detail</h4>
                    <form action="#" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="location">Location</label>
                                <input value="<?php echo $product_array[$key]["location"]; ?>" disabled type="text" class="form-control" name="location" id="location" placeholder="Location" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category">Category</label>
                                <input value="<?php echo $product_array[$key]["category"]; ?>" disabled type="text" class="form-control" name="category" id="category" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="facilities">Facilities</label>
                            <input value="<?php echo $product_array[$key]["facilities"]; ?>" disabled type="text" class="form-control" name="facilities" id="facilities" required="">
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="causes">Causes</label>
                            <input value="<?php echo $product_array[$key]["causes"]; ?>" disabled type="text" class="form-control" name="causes" id="causes" required="">
                        </div>
                        <div class="form-group col-md-6">
                                <label for="aduan_img">Upload Image</label>
                                <input value="<?php echo $product_array[$key]["aduan_img"];?>" disabled type="file" class="form-control" id="aduan_img" name="aduan_img" required="">
                            </div>
                        </div>
                        <div class="form-group">
                                    <label for="adu_desc">Description</label>
                                    <input value="<?php echo $product_array[$key]["adu_desc"];?>" disabled class="form-control" id="adu_desc" name="adu_desc" placeholder="Describe the situation here." rows="3" required="">
                                </div>
                <div class="outer-w3-agile col-lg mt-3 mr-lg-3">
                            <h4 class="tittle-w3-agileits mb-4">Image</h4>
                            <div id="aduan_img" name="aduan_img"class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="images/<?php echo $product_array[$key]["aduan_img"]; ?>" alt="First slide">
                                    </div>
                                </div>
                            </div>
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
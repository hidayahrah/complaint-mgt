<?php
  session_start();
  include ('dbcon.php');
 if(isset($_POST['email'])){
   

    $email = $_SESSION['email'];
}
//baru
    if(isset($_POST['submit'])){   
        
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["aduan_img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["aduan_img"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["aduan_img"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["aduan_img"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["aduan_img"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        //getting the text data from the fields
			$location = $_POST['location'];
			$category = $_POST['category'];
			$facilities= $_POST['facilities'];
            $causes= $_POST['causes'];
            $adu_desc= $_POST['adu_desc'];
            $iduser = $_SESSION['email'];
           //getting the image from the field
			// $aduan_img = $_FILES['aduan_img']['name'];
			// $aduan_img_tmp = $_FILES['aduan_img']['tmp_name'];
			
			// move_uploaded_file($aduan_img_tmp,"images/$aduan_img");
			
			$sql = "INSERT INTO aduan 
			(location, category, facilities, causes, adu_desc, iduser, aduan_img, status) 
			VALUES ('$location','$category','$facilities','$causes','$adu_desc', '$iduser', '$target_file', 'Submitted')";
            $result = mysqli_query($db, $sql);
            if($result){
                echo "<script> alert('Complaint has been submitted!')</script>";
                // include_once ("listcomplaints.php");
            }else {
                echo "";
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
            <h2>
                <a href="userhome.php">UITMCTKKT Mobile Complaint Management System</a>
                </h2>
                <span>UITMCTKKT</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li>
                    <a href="userhome.php">
                        <i class="fas fa-th-large"></i>
                        Home
                    </a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="far fa-file"></i>
                        Complaint
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="complaintform.php">New Complaint</a>
                        </li>
                        <li>
                            <a href="listcomplaints.php">List of Complaints</a>
                        </li>
                    </ul>
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
          
            
           $sql3 = "SELECT * FROM user WHERE email='$email'";
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
                                        <h3 class="sub-title-w3-agileits"><?= $row3["fname"];?> <?= $row3["lname"];?></h3>
                                        <a href="userhome.php?email="><?php 
                     
                                            echo $_SESSION["email"];
                                            ?></a>
                                    </div>
                                </div>
                                <a href="editprofile.php" class="dropdown-item mt-3">
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
  <?php
            
   }?>
            <!--// top-bar -->
            <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Complaint Form</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" name="location" id="location" placeholder="Location" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category">Category</label>
                                <select id="category" name="category" class="form-control">
                                    <option selected="" value="Electrical">Electrical</option>
                                    <option value="Mechanical">Mechanical</option>
                                    <option value="Plumbing">Plumbing</option>
                                    <option value="Public">Public</option>
                                    <option value="Services">Services</option>
                                    <option value="Telecommunication">Telecommunication</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="facilities">Facilities</label>
                            <select id="facilities" name="facilities" class="form-control">
                                    <option selected="" value="Windows Door Key">Windows\Door\Key</option>
                                    <option value="Floor Wall Ceiling">Floor\Wall\Ceiling</option>
                                    <option value="Pipe">Pipe</option>
                                    <option value="Meanhole Septic tank">Meanhole\Septic tank</option>
                                    <option value="Flush Water tank Sink">Flush\Water tank\Sink</option>
                                    <option value="Toilet WC">Toilet\WC</option>
                                    <option value="Floor trap">Floor trap</option>
                                    <option value="Electric source">Electric source</option>
                                    <option value="Switches Socket">Switches\Socket</option>
                                    <option value="Lamp">Lamp</option>
                                    <option value="Ceiling fan">Ceiling fan</option>
                                    <option value="Air-conditioner system">Air-conditioner system</option>
                                    <option value="Fire alarm system">Fire alarm system</option>
                                    <option value="Water supply system">Water supply system</option>
                                    <option value="Sewage system">Sewage system</option>
                                    <option value="Kitchen equipment system">Kitchen equipment system</option>
                                    <option value="Broadcasting system Walkie talkie Telephone">Broadcasting system\Walkie talkie\Telephone</option>
                                    <option value="CCTV">CCTV</option>
                                    <option value="Building cleanliness">Building cleanliness</option>
                                    <option value="Aedes Control">Aedes Control</option>
                                    <option value="Sanitech dressing">Sanitech dressing</option>
                                    <option value="Rubbish">Rubbish</option>
                                </select> 
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="causes">Causes</label>
                             <select id="causes" name="causes" class="form-control">
                                    <option selected="" value="Damaged">Damaged</option>
                                    <option value="Broken">Broken</option>
                                    <option value="Accidentally pulled out" selected>Accidentally pulled out</option>
                                    <option value="Clogged">Clogged</option>
                                    <option value="Tripped Short circuit">Tripped\Short circuit</option>
                                    <option value="Not functioning">Not functioning</option>
                                    <option value="Leaked">Leaked</option>
                                    <option value="Blackout">Blackout</option>
                                    <option value="Missing">Missing</option>
                                    <option value="Water drip Abundant">Water drip\Abundant</option>
                                    <option value="Expired">Expired</option>
                                    <option value="No water supply">No water supply</option>
                                    <option value="Dusty Dirty">Dusty\Dirty</option>
                                    <option value="Alarm ringing">Alarm ringing</option>
                                    <option value="Not alert">Not alert</option>
                                    <option value="Stinky">Stinky</option>
                                    <option value="No disposal Tons of rubbish">No disposal\Tons of rubbish</option>
                                    <option value="Bushy">Bushy</option>
                                    <option value="Fallen trees">Fallen trees</option>
                                    <option value="Aedes Control">Aedes Control</option>
                                    <option value="Wild animal">Wild animal</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="aduan_img">Upload Image</label>
                                <input type="file" class="form-control" id="aduan_img" name="aduan_img" required="">
                            </div>
                        </div>
                        <div class="form-group">
                                    <label for="adu_desc">Description</label>
                                    <textarea class="form-control" id="adu_desc" name="adu_desc" placeholder="Describe the situation here." rows="3" required=""></textarea>
                                </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
                        <!-- class="btn btn-primary py-3 px-5" -->
                    </form>
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
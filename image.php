<?php
include ('dbcon.php');
   if(isset($_POST['btn'])) {
       $firstName = $_FILES['aduan_img']['name'];
       $dir = 'images/';
       $imageUrl = $dir . $firstName;
       //move_uploaded_file($_FILES['image_file']['tmp_name'], $imageUrl);
       $fileType = pathinfo($firstName, PATHINFO_EXTENSION);
       $Check = getimagesize($_FILES['aduan_img']['tmp_name']);
       if ($Check) {
           if (file_exists($imageUrl)) {
               die('file already exit please select another image...');
           } else {
               if ($_FILES['aduan_img']['size'] > 500000) {
                   die('image size is too big.please select image with in 10kb..');
               } else {
                   if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'JPG') {
                       die('please select jpg or png file.');
                   } else {
                       move_uploaded_file($_FILES['aduan_img']['tmp_name'], $imageUrl);
                       $sql = "INSERT INTO aduan (aduan_img) VALUES ('$imageUrl')";
                       mysqli_query($link,$sql);
                       echo 'image upload and save successfully';
                   }
               }
           }
       } else {
           die('Please select image file..');
       }
   }
?>


<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Select File</th>
            <td><input type="file" name="aduan_img"/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="submit"></td>
        </tr>
    </table>
</form>

<hr/>
<?php
$sql = "SELECT * FROM aduan";
$queryResult = mysqli_query( $link, $sql );
$image = '';
?>

<table>
    <?php while($image = mysqli_fetch_assoc($queryResult)){?>
    <tr>
        <td><img src="<?php echo $image['aduan_img'];?>" alt="" height="100" width="150"/></td>
    </tr>
    <?php } ?>
</table>
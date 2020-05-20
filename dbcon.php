<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "uitm";

$db = mysqli_connect($host, $user, $password, $dbname);
if ($db) {
    echo "";

}
else {
  echo "" . mysqli_error($db);
}

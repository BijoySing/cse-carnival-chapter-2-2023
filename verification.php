<?php
require 'config.php';
$email = $_POST['email'];
$sql = "UPDATE  expert set status = 'VERIFIED' where email = '$email'";
$q = mysqli_query($con,$sql);
//echo $email;
header('Location:admin.php');
?>
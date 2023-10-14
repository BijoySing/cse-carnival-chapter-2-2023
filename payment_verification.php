<?php
require 'config.php';
$patient_email = $_POST['patient_email'];
$expert_email = $_POST['expert_email'];
$payment_id = $_POST['payment_id'];
$payment_date = $_POST['payment_date'];
$sql = "UPDATE  payment set payment_status = 1 where patient_email = '$patient_email'and expert_email = '$expert_email' and payment_id = '$payment_id' and payment_date = '$payment_date'";
$q = mysqli_query($con,$sql);
//echo $email;
header('Location:admin.php');
?>
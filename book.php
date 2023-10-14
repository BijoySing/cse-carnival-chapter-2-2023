<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        select {
            border: 1px solid #ccc;
        }
        input[type="text"] {
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
require 'config.php';
$patient_email = $_GET['patient'];
$expert_email = $_GET['expert'];
$sql1 = "SELECT * from expert where email='$expert_email'";
$query1 = mysqli_query($con,$sql1);
$res = mysqli_fetch_assoc($query1);
 
$sql2 = "SELECT * from patient where email='$patient_email'";
$query2 = mysqli_query($con,$sql2);
$res2 = mysqli_fetch_assoc($query2);
echo "You searched for ".$res['name'].". Please pay ".$res['salary']."/= first. Then fill out the following form:";

$patient_name = $res2['name'];
$patient_mobile = $res2['mobile'];
$expert_name = $res['name'];
$expert_mobile = $res['mobile'];
$fee = $res['salary'];

?>
<form method='post'>
    Your payment method:
    <select name="payment">
        <option value="bkash">Bkash</option>
        <option value="Nagad">Nagad</option>
        <option value="Rocket">Rocket</option>
    </select>

    Payment ID:
    <input type="text" name="id">

    Date of payment:
    <input type="date" name="date">
    
    <input type="submit"value="DONE"name="submit">

</form>
<?php
if(isset($_POST['submit']))
{
    echo "Your payment is done. We will confirm you about it. Thank you.";
    echo<<<_END
    <a href="view.php?email=$patient_email&role=patient">Click Here</a>
    _END;
    $payment_method = $_POST['payment'];
    $payment_id = $_POST['id'];
    $payment_status = 0;
    $payment_date = date("Y-m-d",strtotime($_POST['date']));
    $sql = "INSERT INTO payment (
        patient_name,
        patient_email,
        patient_mobile,
        expert_name,
        expert_email,
        expert_mobile,
        payment_method,
        fee,
        payment_id,
        payment_date,
        payment_status
        )
        values
        (
            '$patient_name',
            '$patient_email',
            '$patient_mobile',
            '$expert_name',
            '$expert_email',
            '$expert_mobile',
            '$payment_method',
            $fee,
            '$payment_id',
            '$payment_date',
            $payment_status

        )
        ";
    $query = mysqli_query($con, $sql);
    
    if($query)
    {
        echo "Insertion successful";
    }
    else
    {
        echo "Not inserted";
    }
    
}
?>
</body>
</html>

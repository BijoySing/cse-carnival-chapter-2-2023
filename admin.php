<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
    $sql1 = "SELECT * FROM expert where status='pending'";
    $sql2 = "SELECT * FROM expert where status='VERIFIED'";
    $sql3 = "SELECT * FROM payment";
    $q1 = mysqli_query($con,$sql1);
    $total_expert = mysqli_num_rows($q1);
    echo "Total pending expert :".$total_expert;
    echo <<<_END
    <table border='5px'cellpadding='3px'>
    <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Expertise</th>
    <th>Education</th>
    <th>Experience</th>
    <th>Working place</th>
    <th>Salary</th>
    <th>Address</th>
    <th>Rating</th>
    <th>Status</th>
    </tr>
    _END;
    
    while($row = mysqli_fetch_assoc($q1))
    {
        echo "<tr>";
        echo "<td><img src='expert_image/$row[image]'width='50px'height='50px'>"."</td>";
        $status = "<form action='verification.php'method='post'>
        <input type='hidden'name='email'value='$row[email]'>
        <input type='submit'name='submit'value='VERIFY'>
        </form>";
       
    echo "<th>".$row['name']."</td>";
    echo "<th>".$row['mobile']."</td>";
    echo "<th>".$row['email']."</td>";
    echo "<th>".$row['gender']."</td>";
    echo "<th>".$row['expertise']."</td>";
    echo "<th>".$row['education']."</td>";
    echo "<th>".$row['experience']."</td>";
    echo "<th>".$row['working_place']."</td>";
    echo "<th>".$row['salary']."</td>";
    echo "<th>".$row['address']."</td>";
    echo "<th>".$row['rating']."</td>";
    echo "<th>".$status."</td>";
    echo "</tr>";
    }
    echo "</table>";

    $q2 = mysqli_query($con,$sql2);
    $total_expert2 = mysqli_num_rows($q2);
    echo "<br><br><br>Total verified expert :".$total_expert2;
    echo <<<_END
    <table border='5px'cellpadding='3px'>
    <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Expertise</th>
    <th>Education</th>
    <th>Experience</th>
    <th>Working place</th>
    <th>Salary</th>
    <th>Address</th>
    <th>Rating</th>
    </tr>
    _END;
    
    while($row = mysqli_fetch_assoc($q2))
    {
        echo "<tr>";
        echo "<td><img src='expert_image/$row[image]'width='50px'height='50px'>"."</td>";
        
    echo "<th>".$row['name']."</td>";
    echo "<th>".$row['mobile']."</td>";
    echo "<th>".$row['email']."</td>";
    echo "<th>".$row['gender']."</td>";
    echo "<th>".$row['expertise']."</td>";
    echo "<th>".$row['education']."</td>";
    echo "<th>".$row['experience']."</td>";
    echo "<th>".$row['working_place']."</td>";
    echo "<th>".$row['salary']."</td>";
    echo "<th>".$row['address']."</td>";
    echo "<th>".$row['rating']."</td>";
    echo "</tr>";
    }
    echo "</table><br><br>";

    $sql4 = "SELECT * from payment where payment_status=0";
    $q4 = mysqli_query($con,$sql4);
    $total_pending_payment = mysqli_num_rows($q4);
    echo "Total pending payment: ".$total_pending_payment; 

    echo <<<_END
    <table border='5px'cellpadding='3px'>
    <tr>
    <th>Patient Name</th>
    <th>Patient Email</th>
    <th>Patient Mobile</th>
    <th>Expert Name</th>
    <th>Expert Email</th>
    <th>Expert Mobile</th>
    <th>Payment Method</th>
    <th>Fee</th>
    <th>Payment ID</th>
    <th>Date</th>
    <th>
    Payment Status
    </th>
    </tr>
    _END;
    
    while($row = mysqli_fetch_assoc($q4))
    {
        echo "<tr>";
        $status = "<form action='payment_verification.php'method='post'>
        <input type='hidden'name='patient_email'value='$row[patient_email]'>
        <input type='hidden'name='expert_email'value='$row[expert_email]'>
        <input type='hidden'name='payment_id'value='$row[payment_id]'>
        <input type='hidden'name='payment_date'value='$row[payment_date]'>
        
        <input type='submit'name='submit'value='VERIFY'>
        </form>";
       
       
    echo "<th>".$row['patient_name']."</td>";
    echo "<th>".$row['patient_mobile']."</td>";
    echo "<th>".$row['patient_email']."</td>";
    echo "<th>".$row['expert_name']."</td>";
    echo "<th>".$row['expert_mobile']."</td>";
    echo "<th>".$row['expert_email']."</td>";
    echo "<th>".$row['payment_method']."</td>";
    echo "<th>".$row['fee']."</td>";
    echo "<th>".$row['payment_id']."</td>";
    echo "<th>".$row['payment_date']."</td>";
    echo "<th>".$status."</td>";
    echo "</tr>";
    }
    echo "</table><br><br>";

    echo "Payment History:<br>";

    $sql10 = "SELECT * from payment where payment_status = 1";
    $q10 = mysqli_query($con,$sql10);
    echo <<<_END
    <table border='5px'cellpadding='3px'>
    <tr>
    <th>Patient Name</th>
    <th>Patient Email</th>
    <th>Patient Mobile</th>
    <th>Expert Name</th>
    <th>Expert Email</th>
    <th>Expert Mobile</th>
    <th>Payment Method</th>
    <th>Fee</th>
    <th>Payment ID</th>
    <th>Date</th>
    </tr>
    _END;
    
    while($row = mysqli_fetch_assoc($q10))
    {
        echo "<tr>";
        
    echo "<th>".$row['patient_name']."</td>";
    echo "<th>".$row['patient_mobile']."</td>";
    echo "<th>".$row['patient_email']."</td>";
    echo "<th>".$row['expert_name']."</td>";
    echo "<th>".$row['expert_mobile']."</td>";
    echo "<th>".$row['expert_email']."</td>";
    echo "<th>".$row['payment_method']."</td>";
    echo "<th>".$row['fee']."</td>";
    echo "<th>".$row['payment_id']."</td>";
    echo "<th>".$row['payment_date']."</td>";
    echo "</tr>";
    }
    echo "</table><br><br>";

    ?>


</body>
</html>
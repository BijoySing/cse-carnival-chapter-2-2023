<?php
error_reporting(0);
require "config.php";
$email = $_GET["email"];
$role = $_GET["role"];
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Heal</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.4.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="CSS/view.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="max-w-screen-xl mx-auto">
    <div class="nav">
        <div class="navbar">
            <div class="navbar-start">
                <!-- <a href="index.php" class="btn btn-ghost normal-case bg-gray-300 text-xl">Heart Heal</a> -->


            </div>
        </div>
    </div>
    <!-- <div class="navbar-center text-gray-900 font-semibold">
        <ul class="menu menu-horizontal px-1">
            <li><a>About</a></li>
            <li><a>Services</a></li>
        </ul>
        </div>
        <div class="navbar-end">
            <input type="text" class="px-2 py-1 mr-5 rounded-md border border-gray-300 focus:ring focus:ring-blue-100" placeholder="Search">
            <button class="btn-login">Login</button>
        </div>
        </div>
        </div>
        -->
    <?php
    $sql = "SELECT * from $role where email='$email'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);

    echo <<<_END
    <div class="flex justify-between items-center bg-gray-100 shadow-lg">                <a href="index.php" class="btn btn-ghost normal-case bg-gray-300 text-xl">Heart Heal</a>

    <div class="flex justify-end p-2 items-center">
    <h1 class="log bg-gray-100 py-1 mr-2 flex border-black items-center  rounded-xl">
    <img class="rounded-full" src='expert_image/$data[image]'width='50px'height='50px'>
    $data[name]<h1>
    <a class="log p-2 " href="login.php">Logout</a>
    </div>

    </div>
    _END;



    if ($role == "patient") {
    ?>
        <form method="post">
            <div class="flex items-center mr-4 mb-4 justify-center
                ">
                <h1 class="text-xl font-semibold mr-2"> Search your problem:
                </h1>
                <select name="problem" class="h-10 border mt-1 mr-2 text-large font-bold rounded px-4 py-2 w-1/5 bg-gray-100">
                    <option class="ser" value="Any kind">Any kind</option>
                    <option class="ser" value="depression">Depression</option>
                    <option class="ser" value="relational issues">Relational Issues</option>
                    <option class="ser" value="marital conflict">Marital Conflict/Issues</option>
                    <option class="ser" value="Parental issues">Parental Issues</option>
                    <option class="ser" value="Anxiety">Anxiety</option>
                    <option class="ser" value="Stress Disorder">Stress Disorder</option>
                    <option class="ser" value="Personality disorder">Personality Disorder</option>
                </select>
                <input class="search mt-2" type="submit" name="submit_problem" value="Search">
        </form>
        </div>
    <?php
        if (isset($_POST['submit_problem'])) {
            $problem = $_POST['problem'];
            $sql1 = "SELECT * from expert where expertise='$problem' and status='VERIFIED'";
            $query1 = mysqli_query($con, $sql1);
            $total = mysqli_num_rows($query1);

            if ($total > 0) {
                echo '<div class="card-container">';
                $counter = 0;

                while ($r = mysqli_fetch_assoc($query1)) {
                    if ($counter % 2 == 0) {
                        echo '</div><div class="card-container">';
                    }
                    echo <<<_END
                            <div class="card flex flex-row">
                            <div>
                                <img class="w-[400px]" src="expert_image/$r[image]">
                            </div>
                            <div class="card-content text-2xl">
                            <h1 class="text-xl"><span class="text-2xl font-bold">Name:</span> $r[name]<br>
                            <span class="text-2xl font-bold">Current Working Place:</span> <h1 class="text-2xl "> $r[working_place] </h1><br>
                            <span class="text-2xl font-bold">Fee:</span> $r[salary] Taka<br>
                            <span class="text-2xl font-bold">Experience:</span> $r[experience] <br>
                            <span class="text-2xl font-bold">Ratings:</span> $r[rating]/10.0 <br>
                     _END;

                    $patient = $email;
                    $expert = $r['email'];
                    $sql5 = "select * from payment where patient_email = '$patient'and expert_email='$expert' and payment_status=1";
                    $query5 = mysqli_query($con, $sql5);
                    $tot = mysqli_num_rows($query5);
                    if ($tot == 0) {
                        echo <<<_END
                        <a class="book" href="book.php?patient=$email&expert=$r[email]">Book Now</a>
                        </h1>
                    </div>
                </div>
                _END;
                    } elseif ($tot > 0) {
                        echo "<button>PAID</button>";
                    }

                    $counter++;
                }
                echo '</div>';
            } else {

                echo '<script>alert("No expert is found");</script>';
            }
        }
    }

    if ($role == "expert") {
        // Add expert-related code here if needed
        $expert_email = $data['email'];
        
        $sql = "SELECT * FROM payment where expert_email='$expert_email' and payment_status=1";
        $q = mysqli_query($con,$sql);
        $t = mysqli_num_rows($q);
        if($t==0)
        {
            echo "No patient is found.";
        }
        else
        {
            echo <<<_END
            <table border='4px'cellpadding='4px'cellspacing="5px">
            <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Marital Status</th>
            <th>Profession</th>
            <th>Action</th>
            </tr>
            _END;
            while($r = mysqli_fetch_assoc($q))
            {
                $patient = $r['patient_email'];
                $sql3 = "SELECT * from patient where email='$patient'";
                $q3 = mysqli_query($con,$sql3);
                $res = mysqli_fetch_assoc($q3);
                $consult = "<a href='meeting.php'>Consult</a>";
                echo<<<_END
                <tr>
                <td>$res[name]</td>
                <td>$res[age]</td>
                <td>$res[gender]</td>
                <td>$res[marital_status]</td>
                <td>$res[profession]</td>
                <td><button class="bg-blue-500 p-4 rounded-full text-white">$consult</button></td>
                </tr>
                _END; 
            }
            echo "</table>";
            
        }
        
        
        
    }
    ?>
</body>

</html>
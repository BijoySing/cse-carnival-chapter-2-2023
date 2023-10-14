<?php
require "config.php";
if(isset($_POST["login"]))
{
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $_POST["pass"];
    $sql = "SELECT * FROM $role where email = '$email'";
    $result = mysqli_query($con,$sql);
    $total = mysqli_num_rows($result);
    #echo "Total user found ".$total;
    $res = mysqli_fetch_assoc($result);
    if($total>0)
    {
        
        $accurate_pass = $res["password"];
        if($accurate_pass==$password)
        {

                $page = "view.php?email=".$email."&role=".$role;
                header('Location:'.$page);
           
        }
        else
        {
            echo "Hello ".$res["name"]." your password doesn't match";
            #header('Location:login.php');
        }
    }
    else
    {
        echo "No user found. Please sign up";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="navbar.css"> <!-- Include the navbar CSS -->
    <link rel="icon" href="images/search-employee-8969.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="styles1.css"> -->
    <title>Heart Heal</title>
</head>

<body >
    
    <div class="nav">
        <div class="navbar">
            <div class="navbar-start">
                <a href="index.html" class="btn btn-ghost normal-case text-xl">Heart Heal</a>
            </div>
        </div>
    </div>
   
    <div class="hero w-full h-screen shadow-xl bg-white-100">
        <div class="hero-content flex-col w-full bg-black-100">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">
                    Login Here for Services<br>
                </h1>
                <p class="py-5"></p>
            </div>
            <div class="card flex-shrink-0 w-1/2 shadow-2xl bg-gray-300">
                <div class="card-body">
                    <form action="" method="POST">
                    <div class="md:col-span-2 font-bold text-gray-600 mb-1">
                    <label for="gender">Account type</label>
                    <select name="role" id="gender" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" required>
                      <option value="expert">Expert</option>
                      <option value="patient">Patient</option>
                    </select>
                  </div>
                        <div class="form-control ">
                            <label class="label">
                                <span class="label-text text-xl text-black-800">Email</span>
                            </label>
                            <input type="text" placeholder="Email" name="email" class="input input-bordered" />
                        </div>
                        <div class="md:col-span-3  mt-2 font-semibold text-gray-900 mb-1 password-input">
                            <label for="email">Password</label>
                            <div class="password-input-wrapper">
    <input type="password" name="pass" id="password" class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value="" placeholder="" />
    <button type="button" id="togglePassword" class="eye-icon">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 9S7 4 9 2s5 2 5 2M9 16s3 2 5 2 5-2 5-2M12 19s1.5-1 2.5-3" />
      </svg>
    </button>
  </div>

                            <div class="inline-flex items-end">
                                <input type="submit" value="Submit" name="login" class="bg-blue-500 mt-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            </div>
                        </div>
                    </form>

                    <a href="Check.html">Sign Up</a>

                </div>
            </div>
        </div>
    </div>
   <style>
    .password-input-wrapper {
      position: relative;
    }
  
    .eye-icon {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
    }
  </style>
  <style>
  .password-input-wrapper {
    position: relative;
  }

  .eye-icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
  }
</style>
 
</body>
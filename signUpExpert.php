<?php
require "config.php";

if(isset($_POST["submit"]))
{
  $name = $_POST["full_name"];
$email = $_POST["email"];
$address = $_POST["address"];
$name = $_POST["full_name"];
$expertise = $_POST["services"];
$mobile = $_POST["contact"];
$salary = $_POST["Honorarium"];
$password = $_POST["pass"];
$image = $_FILES["picture"]["name"];
$tmp_image = $_FILES["picture"]["tmp_name"];
$target = "expert_image/".$image;
move_uploaded_file($tmp_image,$target);

$experience = $_POST["work_experience"];
$education = $_FILES["education"]["name"];
$tmp_edu = $_FILES["education"]["tmp_name"];
$target2 = "expert_certificates/".$education;
move_uploaded_file($tmp_edu,$target2);

$working_place = $_POST["working_place"];
$rating = 0;
$status = 'pending';
$time_slot = $_POST["time_slot"];
$gender = $_POST["gender"];
 $sql = "INSERT INTO expert (
  email,
  mobile,
  password,
  name,
  image,
  gender,
  education,
  experience,
  expertise,
  working_place,
  salary,
  time_slot,
  address,
  rating,
  status
  )
  VALUES
  (
    '$email',
  '$mobile',
  '$password',
  '$name','$image',
  '$gender',
  '$education',
  '$experience',
  '$expertise',
  '$working_place',
  $salary,
  '$time_slot',
  '$address',
    $rating,
    '$status'
  );";

$result = mysqli_query($con,$sql);
header('Location:login.php');
/*
if($result)
{
  echo "Inserted successfully";
}
else
{
  echo "Insertion failed";
}

*/
}


?>


<!DOCTYPE html>
<html lang="en">

<!-- </html>data-theme="light"> -->

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

<body>

  <div class="nav">
    <div class="navbar">
      <div class="navbar-start">
      <a href="index.php" class="btn btn-ghost normal-case text-xl">Heart Heal</a>
      </div>
    </div>
  </div>

  <form method="POST" enctype="multipart/form-data">
    <div class="min-h-screen text-black-900 p-6 bg-gray-100 flex items-center justify-center">
      <div class="container max-w-screen-lg mx-auto">
        <div>
          <h2 class="font-bold text-4xl text-gray-900">Registration Form</h2>
          <p class="text-gray-500 mb-6" </p>

          <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-1">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
              <div class="text-gray-900">
                <p class="font-medium text-lg"> Expert Personal Details</p>
                <h1></h1>
                <p>Please fill out all the fields.</p>
              </div>

              <div class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                  <div class="md:col-span-5 font-bold text-gray-600 mb-1">
                    <label for="full_name">Full Name</label>
                    <input type="text" name="full_name" id="full_name"
                      class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" required/>
                  </div>

                  <div class="md:col-span-5 font-bold text-gray-600 mb-1">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-100"
                      value="" placeholder="email@domain.com"required />
                  </div>


                  <div class="md:col-span-5 font-bold text-gray-600 mb-1">
                    <label for="address">Address Street</label>
                    <input type="text" name="address" id="address"
                      class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" required/>
                  </div>
                  <div class="md:col-span-5 font-bold text-gray-600 mb-1">
                    <label for="address">Present work place</label>
                    <input type="text" name="working_place" id="address"
                      class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" required/>
                  </div>
                  
                  <div class="md:col-span-3 font-bold text-gray-700 mb-1">
                    <label for="">Time Slot</label>
                    <input type="time" name="time_slot" id="time_slot"
                      class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" required/>
                  </div><div class="md:col-span-2 font-bold text-gray-600 mb-1">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" required>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
              


                  <!-- <div class="md:col-span-3 font-bold text-gray-600 mb-1">
                    <label for="city">City name</label>
                    <select name="city" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-100">
                      <option value="city1">City 1</option>
                      <option value="city2">City 2</option>
                      <option value="city3">City 3</option> 
                    </select>
                  </div> -->


                  <div class="md:col-span-3 font-bold text-gray-600 ">
                    <label>Your service</label>
                   
                    <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                      
                      <select name="services" class="h-10 border mt-1 text-large font-bold rounded px-4 py-2 w-full bg-gray-100">
                        
                        <option class="ser" value="Any kind">Any kind</option>
                        <option class="ser" value="depression">Depression</option>
                        <option class="ser" value="relational issues">Relational Issues</option>
                        <option class="ser" value="marital conflict">Marital Conflict/Issues                        </option>
                        <option class="ser" value="Parental issues">Parental Issues
                        </option>

                        <option class="ser" value="Anxiety">Anxiety
                        </option>
                        <option class="ser" value="Stress Disorder">Stress Disorder
                        </option>
                        <option class="ser" value="Personality disorder">Personality Disorder
                        </option> 

                      </select>
                    </div>
                  </div>
                  <div class="md:col-span-2 font-bold text-gray-600 mb-1">
                    <label for="num">Contact No.</label>
                    <input type="text" name="contact" id="number" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                      value="" placeholder="+880" required/>
                  </div>
                  <div class="md:col-span-3 font-bold text-gray-600 mb-1">
                    <label for="work_experience">work_experience</label>
                    <input type="text" name="work_experience" id="work_experience"
                      class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="add your experiences " />
                  </div>
                  <div class="md:col-span-2 font-bold text-gray-600 mb-1">
                    <label for="work_experience">Honorarium</label>
                    <input type="" name="Honorarium" id="Honorarium"
                      class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Per hour Amount" />
                  </div>
                 
                  
                  <div class="md:col-span-3 font-bold text-gray-600 mb-1 password-input">
                    <label for="email">Password</label>
                    <div class="password-input-wrapper">
                      <input type="password" name="pass" id="password" class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value="" placeholder="" required/>
                      <button type="button" id="togglePassword" class="eye-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 9S7 4 9 2s5 2 5 2M9 16s3 2 5 2 5-2 5-2M12 19s1.5-1 2.5-3" />
                        </svg>
                      </button>
                    </div>
                  </div>
                 
                </div>
              </div>
              <div class="md:col-span-3 font-bold  border-gray-300 text-gray-600 text-center mt-2">
                <label for="picture">Add Profile Picture</label>
                <br>
                <input type="file" name="picture" id="picture" class="mt-2">

            </div>

            <div class="md:col-span-2 font-bold  border-gray-300 text-gray-600 text-center mt-2">
                <label for="picture">Add Educational Certificates (pdf)</label>
                <br>
                <input type="file" name="education" id="picture" class="mt-2">

            </div>
            <!-- <div class="md:col-span-5 font-bold text-gray-600">
              <label for="button">client request</label>
              <input type="button" name="send_request" class="mt-1">

          </div> -->
             

              <div class="md:col-span-5 text-right">
                <div class="inline-flex items-end">
                  <input type="submit" name="submit"value="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                  
                 

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </form>

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
</html>
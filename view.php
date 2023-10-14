<?php
require "config.php";
$email = $_GET["email"];
$role = $_GET["role"];

$sql = "SELECT * from $role where email='$email'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result);

echo<<<_END
<a href="login.php">Logout</a>
Hello <b>$data[name]</b> , welcome at Heart-Heal.
_END;

if($role=="patient")
{
    ?>
  
  <form method="post">
  Search your problem:
  <select name="problem" class="h-10 border mt-1 text-large font-bold rounded px-4 py-2 w-full bg-gray-100">
    
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
  <input type="submit"name="submit_problem"value="Search">
  </form>
  <?php
  if(isset($_POST['submit_problem']))
  {
    $problem = $_POST['problem'];
    $sql1 = "SELECT * from expert where expertise='$problem'";
    $query1 = mysqli_query($con,$sql1);
    $total = mysqli_num_rows($query1);
    #echo "There are ".$total." experts for ".$problem;
    if($total>0)
    {
        while($r = mysqli_fetch_assoc($query1))
        {
            echo<<<_END
            <img src="expert_image/$r[image]"><br>
            $r[name]<br>Working in $r[working_place]<br>Fee:$r[salary]<a href="book.php?patient=$email&expert=$r[email]">Book</a>
            _END;
        }
    }
    else
    {
        echo "No expert is found";
    }
  }
 

}
if($role=="expert")
{
    
}
?>


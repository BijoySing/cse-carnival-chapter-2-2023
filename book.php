<?php
require 'config.php';
$patient = $_GET['patient'];
$expert = $_GET['expert'];
$sql = "SELECT * from expert where email='$expert'";
$query = mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($query);
 
echo "You searches ".$res['name']." Please pay ".$res['salary']."/= first. Then fill up the following form";
?>
<form method='post'>
Your payment medium:
<select name="payment">
    <option value="bkash">Bkash</option>
    <option value="Nagad">Nagad</option>
    <option value="Rocket">Rocket</option>
</select>

Payment ID:
<input type="text"name="id">
<input type="submit"name="submit"value="DONE">
</form>
<?php
if(isset($_POST['submit']))
{
    echo "Your payment is done. We will confirm you about it. Thank you.";
    echo<<<_END
    <a href="view.php?email=$patient&role=patient">Click Here</a>
    _END;
}
?>



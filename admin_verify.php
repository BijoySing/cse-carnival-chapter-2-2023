<?php
if (isset($_POST['submit'])) {
    $code = $_POST['code'];
    if ($code == '675') {
        header('Location:admin.php');
    } else {
        header('Location:login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Verification</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.4.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/view.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="flex justify-center items-center mt-20">
        <div class="w-[400px] h-[500px] bg-grey-">
            Enter admin code to verify :
            <form method="post">
                <input class="border-4 py-2 bg-gray-200" type="password" name="code"bgcolor='bg-danger'placeholder='Enter secret code'>
                <input type="submit" name="submit" value="DONE" class='btn btn-lg btn-primary'>
            </form>
        </div>
    </div>
</body>

</html>
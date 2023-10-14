<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Heal</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.4.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/view.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="max-w-screen-xl mx-auto">
    <section class="Navbar max-w-screen-xl m-auto">
        <div class="navbar bg-base-100">
            <div class="navbar-start">
                <div class="dropdown">
                    <label tabindex="0" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a>Home</a></li>
                        <li>
                            <a>FAQ</a>
                        </li>
                        <li><a> About us</a></li>
                    </ul>
                </div>
                <a class="btn btn-ghost normal-case text-xl">Heart Heal</a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1">
                    <li><a>Home</a></li>
                    <li tabindex="0">
                        <summary>About us</summary>
                    </li>
                    <li><a>FAQ</a></li>
                </ul>
            </div>
            <div class="navbar-end">
                <button class="btn-login">
                    <a href="Check.html">Login</a>
                </button>
            </div>
        </div>
    </section>

    <header>
        <div class="slideshow-container">
            <!-- Slides go here -->
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1;
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 2000); // Change image every 2 seconds
            }
        </script>
    </header>

    <?php
    $sql = "SELECT * from expert where status='VERIFIED'";
    $query = mysqli_query($con, $sql);
    ?>

    <section class="Our_experts">
        <h1 class="text-6xl text-center">Our Experts</h1>
        <?php
        echo '<div class="card-container">';
        $cnt = 0;
        while ($data = mysqli_fetch_assoc($query)) {
            if ($cnt % 2 == 0) {
                echo '</div><div class="card-container">';
            }
        ?>
            <div class="expert-row flex flex-row">
                <div class="expert-card bg-gray-100 mb-2 p-2 m-auto rounded-lg shadow-md">
                    <div class="w-32 h-32 bg-blue-500 md:w-48 md:h-48 overflow-hidden rounded-full">
                        <img src='expert_image/<?php echo $data["image"]; ?>' alt='Expert Image' class='object-cover h-full w-full' />
                    </div>
                    <div class="p-4">
                        <h1 class="text-2xl font-semibold mb-2"><?php echo $data["name"]; ?></h1>
                        <h1 class="text-md">Working Place: <?php echo $data["working_place"]; ?></h1>
                        <h1 class="text-md">Experience: <?php echo $data["experience"]; ?></h1>
                        <h1 class="text-md">Expertise: <?php echo $data["expertise"]; ?></h1>
                        <h1 class="text-md">Fee: <?php echo $data["salary"]; ?></h1>
                        <button class="text-md bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Book Now</button>
                    </div>
                </div>
            </div>
        <?php
            $cnt++;
        }
        ?>
    </section>

</body>

</html>

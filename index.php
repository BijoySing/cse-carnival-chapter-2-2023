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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </label>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="\">Home</a></li>
                        <li>
                            <a href="#faq">FAQ</a>
                        </li>
                        <li><a href="#about_us">About us</a></li>
                        <li><a href="#about_us">Contact us</a></li>
                    </ul>
                </div>
                <a class="btn btn-ghost normal-case text-xl">Heart Heal</a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1">
                    <li><a>Home</a></li>
                    <li tabindex="0">
                    <li><a href="#about_us">About us</a></li>
                    </li><li>
                    <a href="#faq">FAQ</a></li>
                    <li><a href="#cont">Contact us</a></li>

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

            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="c.jpg" style="height:450px ; width:100%">
                <!-- <div class="text">Caption Text</div> -->
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="b.jpg" style="height:450px; width:100%">
                <!-- <div class="text">Caption Two</div> -->
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="a.jpg" style="height:450px ; width:100%">
                <!-- <div class="text">Caption Three</div> -->
            </div>


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
        <h1 class="text-6xl text-center mb-4 mt-4">Our Experts</h1>
        <?php
        echo '<div class="card-container">';
        $cnt = 0;
        while ($data = mysqli_fetch_assoc($query)) {
            if ($cnt % 2 == 0) {
                echo '</div><div class="card-container">';
            }
        ?>
            <!-- <div class="expert-row flex flex-row"> -->
            <div class="card flex flex-row">
                <div class="w-32 h-32 bg-blue-500 md:w-48 md:h-48 overflow-hidden rounded-md">
                    <img src='expert_image/<?php echo $data["image"]; ?>' alt='Expert Image' class='object-cover h-full w-full' />
                </div>
                <div class="p-4">
                    <h1 class="text-2xl font-semibold mb-2"><?php echo $data["name"]; ?></h1>
                    <h1 class="text-md">Working Place: <?php echo $data["working_place"]; ?></h1>
                    <h1 class="text-md">Experience: <?php echo $data["experience"]; ?></h1>
                    <h1 class="text-md">Expertise: <?php echo $data["expertise"]; ?></h1>
                    <h1 class="text-md mb-2">Fee: <?php echo $data["salary"]; ?></h1>
                    <a href="login.php" class="mt-4 text-center text-md bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600">Book Now</a>
                </div>
            </div>

        <?php
            $cnt++;
        }
        ?>
    </section>
    <section id="about_us" class="about-us mt-4 mb-2">
        <h1 class="text-4xl font-semibold text-center mb-4">About Us</h1>

        <div class="about-description flex flex-row-reverse">

            <div class="w-[800px] bg-pink-100 text-center">
                <p class="text-lg mx-10 text-center">
                <h1 class="text-2xl">Welcome to Heart Heal </h1> <br>
                your one-stop destination for finding the best mental health experts and professionals. Our platform connects patients and experts, making it easy to book sessions and receive the help you need. We are dedicated to providing high-quality mental health services and support to individuals in need. With a team of experienced and verified experts, you can trust us with your mental health journey.</p>
            </div>
            <div class="w-[800px] bg-red-800">
                <img src="d.jpg" alt="">
            </div>
        </div>
    </section>
    <section id="faq" class="faq">
        <h1 class="text-4xl text-center mt-6">Some frequently ask question</h1>

        <div class="collapse bg-base-200 mt-2">
            <input type="radio" name="my-accordion-1" checked="checked" />
            <div class="collapse-title text-xl font-medium">
                Q1: What is Heart Heal?
            </div>
            <div class="collapse-content">
                <p>Heart Heal is your one-stop destination for finding the best mental health experts and professionals. Our platform connects patients and experts, making it easy to book sessions and receive the help you need. We are dedicated to providing high-quality mental health services and support to individuals in need. With a team of experienced and verified experts, you can trust us with your mental health journey.</p>
            </div>
        </div>

        <div class="collapse bg-base-200">
            <input type="radio" name="my-accordion-1" />
            <div class="collapse-title text-xl font-medium">
                Q2: How can I book a session with an expert?
            </div>
            <div class="collapse-content">
                <p>Booking a session with an expert on Heart Heal is easy. Simply log in to your account, select the expert you want to consult, choose an available time slot, and confirm your booking. You'll receive a confirmation email with all the details.</p>
            </div>
        </div>

        <div class="collapse bg-base-200">
            <input type="radio" name="my-accordion-1" />
            <div class="collapse-title text-xl font-medium">
                Q3: Are the experts on Heart Heal verified?
            </div>
            <div class="collapse-content">
                <p>Yes, all the experts on Heart Heal are verified professionals. We carefully review their qualifications, experience, and credentials to ensure they meet our high standards for quality and expertise.</p>
            </div>
        </div>

        <div class="collapse bg-base-200">
            <input type="radio" name="my-accordion-1" />
            <div class="collapse-title text-xl font-medium">
                Q4: Can I change or cancel a booked session?
            </div>
            <div class="collapse-content">
                <p>Yes, you can change or cancel a booked session by logging into your account and going to the "My Bookings" section. Please note that cancellation policies may apply, so check with the expert for details.</p>
            </div>
        </div>

        <div class="collapse bg-base-200">
            <input type="radio" name="my-accordion-1" />
            <div class="collapse-title text-xl font-medium">
                Q5: Is Heart Heal available worldwide?
            </div>
            <div class="collapse-content">
                <p>Yes, Heart Heal is accessible worldwide. Our platform connects patients and experts from various locations, allowing individuals from different regions to access high-quality mental health services.</p>
            </div>
        </div>
    </section>
    <section id="cont" class="contact-info mt-6 mb-4">
            <h2 class="text-4xl text-center mb-4">Contact Us</h2>
            <p>
                Feel free to reach out to us for any questions or feedback. Here are our contact details:
            </p>
            <ul>
                <li><strong>Email:</strong> contact@yourwebsite.com</li>
                <li><strong>Phone:</strong> +1 (123) 456-7890</li>
                <li><strong>Address:</strong> 123 Main Street, City, Country</li>
            </ul>
        </section>

    <footer>
        <footer class="footer mt-4 p-10 bg-gray-700 text-gray-100 ">
            <aside>
                <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current">
                    <path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path>
                </svg>
                <p class="text-2xl">Heart Heal</p>
            </aside>
            <nav>
                <header class="footer-title">Services</header>
                <a class="link link-hover">Branding</a>
                <a class="link link-hover">Design</a>
                <a class="link link-hover">Marketing</a>
                <a class="link link-hover">Advertisement</a>
            </nav>
            <nav>
                <header class="footer-title">Company</header>
                <a class="link link-hover">About us</a>
                <a class="link link-hover">Contact</a>
                <a class="link link-hover">Jobs</a>
                <a class="link link-hover">Press kit</a>
            </nav>
            <nav>
                <header class="footer-title">Legal</header>
                <a class="link link-hover">Terms of use</a>
                <a class="link link-hover">Privacy policy</a>
                <a class="link link-hover">Cookie policy</a>
            </nav>
        </footer>
    </footer>

</body>

</html>
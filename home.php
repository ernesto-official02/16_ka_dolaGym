<?php 
session_start();
error_reporting(0);
include 'include/config.php';
$uid = $_SESSION['uid'];

if (isset($_POST['submit'])) { 
    $pid = $_POST['pid'];
    $sql = "INSERT INTO tblbooking (package_id, userid) VALUES (:pid, :uid)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->bindParam(':uid', $uid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Package has been booked.');</script>";
    echo "<script>window.location.href='booking-history.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">

    <title>Fitness Gym | 16KA-DOLA</title>
</head>

<body>
    <!-- Header / Navigation -->
    <header>
        <nav>
            <div class="logo">16KA-DOLA GYM</div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#">Subscriptions</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <video autoplay muted loop id="hero-video">
            <source src="BG video.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="hero-content">
            <h1>Welcome to 16KA-DOLA Fitness Gym</h1>
            <p>Your health, our priority. Let's get stronger together!</p>
            <a href="./login.php" class="btn">Join Us Now</a>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="image-gallery" id="gallery">
        <h2>Gallery</h2>
        <div class="gallery-grid">

            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 1.jpg" alt="Gallery Image 1">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 2.jpg" alt="Gallery Image 2">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 3.webp" alt="Gallery Image 3">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 4.webp" alt="Gallery Image 4">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 5.jpg" alt="Gallery Image 5">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 6.webp" alt="Gallery Image 6">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 7.webp" alt="Gallery Image 7">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 8.jpg" alt="Gallery Image 8">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 9.jpg" alt="Gallery Image 9">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 10.webp" alt="Gallery Image 10">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 11.webp" alt="Gallery Image 11">
            </div>
            <div class="gallery-item">
                <img src="./Videos/Gallery img/img 12.webp" alt="Gallery Image 12">
            </div>
        </div>
    </section>

    <!-- Videos Section -->
   <!-- Videos Section -->
   <section class="video-section" id="videos">
        <h2>Workout Videos</h2>
        <div class="video-grid">
            <div class="video-item">
                <video controls>
                    <source src="./Videos/Biceps 1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Biceps Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./Videos/Biceps 2.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Biceps Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Biceps 3.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Biceps Exercise 3</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Triceps 1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Triceps Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Triceps 2.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Triceps Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Triceps 3.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Triceps Exercise 3</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Shoulder 1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Shoulder Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Shoulder 2.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Shoulder Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Shoulder 3.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Shoulder Exercise 3</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Chest 1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Chest Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Chest 2.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Chest Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Chest 3.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Chest Exercise 3</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Back 1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Back Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Back 2.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Back Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Back 3.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Back Exercise 3</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Leg 1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Leg Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Leg 2.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Leg Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="./videos/Leg 3.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Leg Exercise 3</p>
            </div>

        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <h2>Our Services</h2>
        <div class="service-cards">
            <div class="card">
                <h3>Group Classes</h3>
                <p>Join our group classes to stay motivated and push your limits.</p>
            </div>
            <div class="card">
                <h3>Nutrition Plans</h3>
                <p>Personalized diet plans to help you achieve your fitness goals.</p>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer id="about">
        <p>&copy; 2024 16KA-DOLA GYM. All rights reserved.</p>
    </footer>

</body>
</html>

<?php 
session_start();
error_reporting(0);
include 'include/config.php';
include './feedback.php';
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Set email details
    $to = 'viveka9415@gmail.com';
    $subject = "New Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Your message has been sent successfully.');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('There was an error sending your message. Please try again later.');</script>";
    }
}
// $uid = $_SESSION['uid'];

// if (isset($_POST['submit'])) { 
//     $pid = $_POST['pid'];
//     $sql = "INSERT INTO tblbooking (package_id, userid) VALUES (:pid, :uid)";
//     $query = $dbh->prepare($sql);
//     $query->bindParam(':pid', $pid, PDO::PARAM_STR);
//     $query->bindParam(':uid', $uid, PDO::PARAM_STR);
//     $query->execute();
//     echo "<script>alert('Package has been booked.');</script>";
//     echo "<script>window.location.href='booking-history.php'</script>";
// }
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
<style>
    .contact-section {
    padding: 60px 20px;
    background-color: #f5f5f5; /* Light background to match other sections */
    text-align: center;
}

.contact-section h2 {
    font-family: 'Rubik Wet Paint', sans-serif;
    font-size: 2.5em;
    color: #333; /* Main color */
    margin-bottom: 20px;
}
.sr{
    font-family: 'Rubik Wet Paint', sans-serif;
}

.contact-section form {
    max-width: 600px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}

.contact-section label {
    font-weight: bold;
    font-size: 1.1em;
    color: #333;
    align-self: flex-start;
    margin-left: 5%;
}

.contact-section input[type="text"],
.contact-section input[type="email"],
.contact-section textarea {
    width: 90%;
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 5px;
    font-family: Arial, sans-serif;
    color: #333;
    background-color: #fff;
}

.contact-section textarea {
    resize: vertical; /* Allows vertical resize for better usability */
}

.contact-section .btn {
    padding: 12px 25px;
    font-size: 1em;
    color: #fff;
    background-color: #333;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;

    
}

.contact-section .btn:hover {
    background-color: #555; /* Slight color change on hover */
}

/* About Us Section Styling */
.about-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 60px 20px;
    background-color: #e8e8e8;
    text-align: center;
}

.about-section h2 {
    font-family: 'Rubik Wet Paint', sans-serif;
    font-size: 2.5em;
    color: #333;
    margin-bottom: 20px;
}

.about-content {
    max-width: 600px;
    margin: 0 auto;
    font-size: 1.1em;
    line-height: 1.6em;
    color: #555;
}

.about-content p {
    margin-bottom: 20px;
}

.about-content .btn {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.about-content .btn:hover {
    background-color: #555;
}

.about-image {
    max-width: 500px;
    margin-top: 40px;
}

.about-image img {
    width: 100%;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

/* Responsive Design */
@media (min-width: 768px) {
    .about-section {
        flex-direction: row;
        justify-content: space-between;
        text-align: left;
    }
    .about-content {
        max-width: 45%;
        margin: 0;
    }
    .about-image {
        max-width: 45%;
    }
}

</style>
<body>
    <!-- Header / Navigation -->
    <header>
        <nav>
            <div class="logo">16KA-DOLA GYM</div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <video autoplay muted loop id="hero-video">
            <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007871/BG_video_gbrqkl.mp4" type="video/mp4">
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
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006543/img_1_ziz40i.webp" alt="Gallery Image 1">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006544/img_7_ebdqm1.webp" alt="Gallery Image 2">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006544/img_3_jkgf5u.webp" alt="Gallery Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006545/img_2_kuknnu.jpg" alt="Gallery Image 4">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006545/img_4_edyoow.webp" alt="Gallery Image 5">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006544/img_8_nfr52e.jpg" alt="Gallery Image 6">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006545/img_6_gbqky0.webp" alt="Gallery Image 7">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006545/img_12_vefymo.webp" alt="Gallery Image 8">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006545/img_11_ttgf7r.webp" alt="Gallery Image 9">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006545/img_5_rwgq42.jpg" alt="Gallery Image 10">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006545/img_10_kbdvne.webp" alt="Gallery Image 11">
            </div>
            <div class="gallery-item">
                <img src="https://res.cloudinary.com/dggdl6hw0/image/upload/v1732006545/img_9_xvxx1y.jpg" alt="Gallery Image 12">
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
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007795/Biceps_1_yuqcjs.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Biceps Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007844/Biceps_2_krurnd.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Biceps Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007712/Biceps_3_chrxci.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Biceps Exercise 3</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007320/Triceps_1_nazxfu.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Triceps Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007350/Triceps_2_gmafn4.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Triceps Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007341/Triceps_3_toyc3h.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Triceps Exercise 3</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007353/Shoulder_1_veuqqu.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Shoulder Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007355/Shoulder_2_lkshcy.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Shoulder Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007276/Shoulder_3_ekfinn.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Shoulder Exercise 3</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007855/Chest_1_bb2bws.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Chest Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007812/Chest_2_oca610.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Chest Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007777/Chest_3_qt0vqf.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Chest Exercise 3</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007713/Back_1_j6tw9y.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Back Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007814/Back_2_ed8xtz.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Back Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007843/Back_3_n29xb2.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Back Exercise 3</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007853/Leg_1_aup68z.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Leg Exercise 1</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007298/Leg_2_f7zb1y.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Leg Exercise 2</p>
            </div>

            <div class="video-item">
                <video controls>
                    <source src="https://res.cloudinary.com/dggdl6hw0/video/upload/v1732007362/Leg_3_jrg2dp.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Leg Exercise 3</p>
            </div>

        </div>
    </section>

        <!-- About Us Section -->
<section id="about" class="about-section">
    <div class="about-content">
        <h2>About Us</h2>
        <p>Welcome to <strong>16KA-DOLA Gym</strong>, where fitness meets passion. We are dedicated to helping you achieve your health and fitness goals with a well-equipped facility, professional trainers, and a supportive community. At 16KA-DOLA Gym, we believe that fitness is a lifestyle, not just a goal.</p>
        <p>Our gym offers a variety of services, from group classes to personalized training plans, so you can find the perfect way to stay active and motivated. Join us and become part of a community that values strength, resilience, and growth. Together, let’s unlock the best version of yourself!</p>
        <a href="#services" class="btn">Our Services</a>
    </div>
    <div class="about-image">
        <img src="./GYM-logo.png" alt="Gym Interior">
    </div>
</section>

    <!-- Services Section -->
    <section class="services" id="services">
        <h2 class="sr">Our Services</h2>
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




    <!-- contactus  -->

        <section id="contact" class="contact-section">
            <h2>Contact Us</h2>
            <form action="contact.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit" name="submit" class="btn">Send Message</button>
            </form>
        </section>


    <!-- Footer Section -->
    <footer id="about">
        <p>&copy; 2024 16KA-DOLA GYM. All rights reserved.</p>
    </footer>

</body>
</html>

<?php
error_reporting(0);
require_once('include/config.php');

if (isset($_POST['submit'])) { 
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $email = htmlspecialchars($_POST['email']);
    $state = htmlspecialchars($_POST['state']);
    $city = htmlspecialchars($_POST['city']);
    $Password = $_POST['password'];
    $pass = md5($Password);
    $RepeatPassword = $_POST['RepeatPassword'];

    // Check if Email or Mobile already exists
    $usermatch = $dbh->prepare("SELECT mobile, email FROM tbluser WHERE email=:usreml OR mobile=:mblenmbr");
    $usermatch->execute(array(':usreml' => $email, ':mblenmbr' => $mobile)); 
    $row = $usermatch->fetch(PDO::FETCH_ASSOC);
    $usrdbeml = $row['email'] ?? null;
    $usrdbmble = $row['mobile'] ?? null;

    if (empty($fname)) {
        $error = "Please Enter First Name";
    } else if (empty($mobile)) {
        $error = "Please Enter Mobile No";
    } else if (empty($email)) {
        $error = "Please Enter Email";
    } else if ($email == $usrdbeml || $mobile == $usrdbmble) {
        $error = "Email Id or Mobile Number Already Exists!";
    } else if (empty($Password) || empty($RepeatPassword)) {
        $error = "Password and Confirm Password Cannot Be Empty!";
    } else if ($Password !== $RepeatPassword) {
        $error = "Password and Confirm Password Do Not Match!";
    } else {
        // Insert user details into the database
        $sql = "INSERT INTO tbluser (fname, lname, email, mobile, state, city, password) VALUES (:fname, :lname, :email, :mobile, :state, :city, :Password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':lname', $lname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $query->bindParam(':state', $state, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $query->bindParam(':Password', $pass, PDO::PARAM_STR);

        if ($query->execute()) {
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId > 0) {
                echo "<script>alert('Registration successful. Please login');</script>";
                echo "<script>window.location.href='login.php';</script>";

                // Email Sending Logic
                $to = "ernestanmol@gmail.com";
                $subject = "New User Registration Notification";
                $message = "Hello Admin,\n\nA new user has registered on 16_dholagym.\n\nDetails:\nUsername: $fname $lname\nEmail: $email\nMobile: $mobile\n\nBest Regards,\n16_dholagym Team";

                $headers = "From: noreply@16_dholagym.com\r\n" .
                           "Reply-To: noreply@16_dholagym.com\r\n" .
                           "X-Mailer: PHP/" . phpversion();

                if (!mail($to, $subject, $message, $headers)) {
                    error_log("Failed to send email notification to admin.");
                }
            } else {
                $error = "Registration Not Successful!";
            }
        } else {
            $error = "Database Error: Could Not Insert Data!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Gym Management System</title>
	<meta charset="UTF-8">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
	<!-- Page Preloder -->
	

	<!-- Header Section -->
	<?php include 'include/header.php';?>
	<!-- Header Section end -->
                                                                     
	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Registration</h2>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">

			<div class="row">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
					<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($succmsg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($succmsg); ?> </div><?php }?><br><br>
					<form class="singup-form contact-form" method="post">
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="off" value="<?php echo $fname;?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="lname" id="lname" placeholder="Last Name" autocomplete="off" value="<?php echo $lname;?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="<?php echo $email;?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="mobile" id="mobile" maxlength="10" placeholder="Mobile Number" autocomplete="off" value="<?php echo $mobile;?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="state" id="state" placeholder="Your State" autocomplete="off" value="<?php echo $state;?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="city" id="city" placeholder="Your City" autocomplete="off" value="<?php echo $city;?>" required>
							</div>
							<div class="col-md-6">
								<input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
							</div>
							<div class="col-md-6">
								<input type="password" name="RepeatPassword" id="RepeatPassword" placeholder="Confirm Password" autocomplete="off" required>
							</div>
							<div class="col-md-4">
						<input type="submit" id="submit" name="submit" value="Register Now" class="site-btn sb-gradient">
								
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
		</div>
	</section>
	<!-- Trainers Section end -->



	<!-- Footer Section -->
<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->
	
	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
 <style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #dd3d36;
    color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #5cb85c;
    color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>	
		
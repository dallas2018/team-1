<?php
include "base.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Register New Member</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo"><strong>SHPE</strong> <span>at UT Dallas</span></a>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="index.php">Home</a></li>
                                                        <li><a href="newsletter.php">Newsletter</a></li>
							<li><a href="calendar.php">Calendar</a></li>
							<li><a href="#contact">Contact</a></li>
                                                        <?php
                                                        if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['EmailAddress']))
                                                        {
                                                                ?>
                                                                <li><a href="dashboard.php" class="button special">Dashboard</a></li>
                                                                <li><a href="logout.php" class="button">Log Out</a></li>
                                                                <?php
                                                        }
                                                        else
                                                        {
                                                                ?>
                                                                <li><a href="login.php" class="button special">Log In</a></li>
                                                                <?php
                                                        }
                                                        ?>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Account Registration</h1>
									</header>
									<div class="content">
										<p>Use your account to keep track of your points from being an active SHPE member at UT Dallas!
										</p>
									</div>
									<span class="image main"><img src="images/register.jpg" alt="" /></span>
									<p>
									<strong>Note: </strong>An online account is only available to our registered members. 
                                                                                If you would like to join, please view our <a href="membership.php">Membership Page</a> and become a member! 
                                                                                If you already are a member and are having trouble registering for your online account, please contact Hepson Sanchez on our <a href="officers.php">Officers Page</a>.
									</p>
                                                                        <?php
                                                                        $selfLink = "registerMember.php";
                                                                        date_default_timezone_set('america/chicago');
                                                                        if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Officer']))
                                                                        {
                                                                                if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) &&
                                                                                        !empty($_POST['password']) && !empty($_POST['cpassword']))
                                                                                {
                                                                                        $firstname = mysqli_real_escape_string($dbcon, $_POST['firstname']);
                                                                                        $lastname = mysqli_real_escape_string($dbcon, $_POST['lastname']);
                                                                                        $email = mysqli_real_escape_string($dbcon, $_POST['email']);
                                                                                        $password = md5(mysqli_real_escape_string($dbcon, $_POST['password']));
                                                                                        $cpassword = md5(mysqli_real_escape_string($dbcon, $_POST['cpassword']));

                                                                                        $checkemail = mysqli_query($dbcon, "SELECT * FROM users WHERE UTDEmail = '".$email."'");
                                                                                        $utdedu = "utdallas.edu";
                                                                                        
                                                                                        $emaillength = strlen($utdedu);
                                                                                        if(substr($email, -$emaillength) == $utdedu)
                                                                                        {
                                                                                                if(mysqli_num_rows($checkemail) == 0)
                                                                                                {
                                                                                                        if($password == $cpassword)
                                                                                                        {
                                                                                                                $registereddatetime = date("Y\-m\-d H\:i\:s");
                                                                                                                if(($_POST['isofficer'] == 'yes') && !empty($_POST['position']))
                                                                                                                {
                                                                                                                        $isofficer = "1";
                                                                                                                        $position = mysqli_real_escape_string($dbcon, $_POST['position']);
                                                                                                                        
                                                                                                                        $registerofficer = mysqli_query($dbcon, "INSERT INTO users (FirstName, LastName, UTDEmail, Password, Officer, Position, RegisteredDateTime, RegisteredByUserID) 
                                                                                                                                                        VALUES('".$firstname."', '".$lastname."', '".$email."', '".$password."', '".$isofficer."', '".$position."', '".$registereddatetime."', '".$_SESSION['UserID']."')");
                                                                                                                        if($registerofficer)
                                                                                                                        {
                                                                                                                                echo "<h1>Success</h1>";
                                                                                                                                echo "<p>Your officer account was successfully created. Please <a href=\"dashboard.php\">click here to return to your dashboard</a>.</p>";
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                                echo "<h1>Error</h1>";
                                                                                                                                echo "<p>Sorry, your officer registration failed. Please go back or <a href='".$selfLink."'>click here</a> to try again.</p>";
                                                                                                                        }
                                                                                                                }
                                                                                                                elseif(($_POST['isofficer'] == 'yes') && empty($_POST['position']))
                                                                                                                {
                                                                                                                        echo "<h1>Error</h1>";
                                                                                                                        echo "<p>Sorry, you selected Officer, but didn't specify a position. Please go back or <a href='".$selfLink."'>click here</a> to try again.</p>"; 
                                                                                                                }
                                                                                                                else
                                                                                                                {
                                                                                                                        $registermember = mysqli_query($dbcon, "INSERT INTO users (FirstName, LastName, UTDEmail, Password, RegisteredDateTime, RegisteredByUserID) 
                                                                                                                                                        VALUES('".$firstname."', '".$lastname."', '".$email."', '".$password."', '".$registereddatetime."', '".$_SESSION['UserID']."')");
                                                                                                                        if($registermember)
                                                                                                                        {
                                                                                                                                echo "<h1>Success</h1>";
                                                                                                                                echo "<p>Your member account was successfully created. Please <a href=\"dashboard.php\">click here to return to your dashboard</a>.</p>";
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                                echo "<h1>Error</h1>";
                                                                                                                                echo "<p>Sorry, your member registration failed. Please go back or <a href='".$selfLink."'>click here</a> to try again.</p>";
                                                                                                                        }
                                                                                                                }
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                                echo "<h1>Error</h1>";
                                                                                                                echo "<p>Sorry, your passwords don't match. Please go back or <a href='".$selfLink."'>click here</a> to try again.</p>";
                                                                                                        }
                                                                                                        
                                                                                                }
                                                                                                elseif(mysqli_num_rows($checkemail) == 1)
                                                                                                {
                                                                                                        echo "<h2>Error</h2>";
                                                                                                        echo "<p>Sorry, that email is already in the system. Please go back or <a href='".$selfLink."'>click here</a> to try again.</p>";
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                        echo "<h2>Error</h2>";
                                                                                                        echo "<p>Sorry. Please go back or <a href='".$selfLink."'>click here</a> to try again.</p>";
                                                                                                }
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                                echo "<h3>Error</h3>";
                                                                                                echo "<p>Sorry, that email does not end in \"utdallas.edu\". Please go back or <a href='".$selfLink."'>click here</a> to try again.</p>";
                                                                                        }
                                                                                }
                                                                                elseif(!(empty($_POST['firstname']) && empty($_POST['lastname']) && 
                                                                                        empty($_POST['email']) && empty($_POST['classification']) &&
                                                                                        empty($_POST['password']) && empty($_POST['cpassword'])))
                                                                                {
                                                                                        echo "<h2>Error</h2>";
                                                                                        echo "<p>Sorry, the form is incomplete. Please go back or <a href='".$selfLink."'>click here</a> to try again.</p>";
                                                                                }
                                                                                else
                                                                                {
                                                                                        ?>
                                                                                        <p>
                                                                                        <h3>Please enter your details below</h3>
                                                                                        </p>
                                                                                        <form method="post" action="registerMember.php" name="signupform" id="signupform">
                                                                                                <div class="6u 12u$(xsmall)">
                                                                                                        
                                                                                                        <input type="text" name="firstname" id="firstname" value="" placeholder="First Name" />
                                                                                                        <br>
                                                                                                        <input type="text" name="lastname" id="lastname" value="" placeholder="Last Name" />
                                                                                                        <br>     
                                                                                                        <input type="email" name="email" id="email" value="" placeholder="UTD Email" />
                                                                                                        <br>
                                                                                                        <input type="password" name="password" id="password" value="" placeholder="Password" />
                                                                                                        <br>
                                                                                                        <input type="password" name="cpassword" id="cpassword" value="" placeholder="Confirm Password" />
                                                                                                        <br>
                                                                                                        <input type="checkbox" id="isofficer" name="isofficer" value="yes">
                                                                                                        <label for="isofficer">Has an Officer Positon</label>
                                                                                                        <input style="width: 50%" type="text" name="position" id="position" value="" placeholder="If Officer, Please Specify" />
                                                                                                        <br>
                                                                                                        <div class="12u$">
                                                                                                                <ul class="actions">
                                                                                                                        <li><input type="submit" value="Register" class="special" /></li>
                                                                                                                </ul>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </form>
                                                                                        <?php
                                                                                }
                                                                        }
                                                                        elseif(!empty($_SESSION['LoggedIn']) && ($_SESSIONS['Officer'] == 0))
                                                                        {
                                                                                echo "<h2>Error</h2>";
                                                                                echo "<p>Sorry, this page is only available to officers. Please go back or <a href='points.php'>click here</a> to return to your dashboard.</p>";
                                                                        }
                                                                        else
                                                                        {
                                                                                echo "<h2>Error</h2>";
                                                                                echo "<p>Sorry, you are not logged in. Please go back or <a href='login.php'>click here</a> to log in.</p>";
                                                                        }
                                                                        ?>
								</div>
							</section>

					</div>

				<!-- Contact -->
					<section id="contact">
						<div class="inner">
							<section>
									<div class="contact-method">
										<span class="icon alt fa-home"></span>
										<h3>Address</h3>
										<span>800 W Campbell Rd.<br />
										Richardson, TX 75080<br />
										United States of America</span>
									</div>
							</section>
							<section class="split">
								<section>
									<div class="contact-method">
										<span class="icon alt fa-envelope"></span>
										<h3>Email</h3>
										<a href="mailto:utdshpe@gmail.com" target="_blank">utdshpe@gmail.com</a>
									</div>
								</section>
								<section>
									<div class="icons">
										<ul class="icons">
											<li><a href="https://twitter.com/shpeutd?lang=en" class="icon alt fa-twitter" target="_blank"><span class="label" >Twitter</span></a></li>
											<li><a href="https://www.facebook.com/SHPEUTD/" class="icon alt fa-facebook" target="_blank"><span class="label">Facebook</span></a></li>
											<li><a href="https://www.instagram.com/utdshpe/" class="icon alt fa-instagram" target="_blank"><span class="label">Instagram</span></a></li>
										</ul>
										<h3>Follow us on Social Media</h3>
									</div>
								</section>
							</section>
						</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
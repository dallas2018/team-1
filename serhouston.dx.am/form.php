<?php
include "base.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>  
	<head>   
		<title>Form Submission</title>
	</head>
	<body>
		<div>
			<?php
			if(!empty($_SESSION['Firstname']) && !empty($_SESSION['Lastname']) && !empty($_SESSION['Phone']))
			{
				 ?>
				 <h1>Member Area</h1>
				 <p>Thanks for submitting! You are <code><?=$_SESSION['Firstname']?> <?=$_SESSION['Lastname']?></code> and your phone is <code><?=$_SESSION['Phone']?></code>.</p>
				 <a href="logout.php">Click here to log out</a>
                                 <?php
			}
			elseif(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone']))
			{
				$firstname = mysqli_real_escape_string($dbcon, $_POST['firstname']);
				$lastname = mysqli_real_escape_string($dbcon, $_POST['lastname']);
				$phone = mysqli_real_escape_string($dbcon, $_POST['phone']);
				
                $adduser = mysqli_query($dbcon, "INSERT INTO contactInfo (firstName, lastName, cellNumber) 
                                                VALUES('".$firstname."', '".$lastname."', '".$phone."')");
                                
				$_SESSION['Firstname'] = $firstname;
				$_SESSION['Lastname'] = $lastname;
				$_SESSION['Phone'] = $phone;
				
				echo "<h1>Success</h1>";
				echo "<p>We are now redirecting you to the submission complete area.</p>";
				echo "<meta http-equiv='refresh' content='0' />";
			}
			else
			{
				?>
			   <h1>Form Submission</h1>
			   <p>Thanks for visiting! Please fill in the form below</p>
				<form method="post" action="form.php" name="form" id="form">
				<fieldset>
					<label for="firstname">First Name:</label>	<input type="text" name="firstname" id="firstname" /><br />
					<label for="lastname">Last Name:</label>	<input type="text" name="lastname" id="lastname" /><br />
					<label for="phone">Phone:</label>	<input type="text" name="phone" id="phone" /><br />
					<input type="submit" name="submit" id="submit" value="submit" />
				</fieldset>
				</form>
			   <?php
			}
			?>
		</div>
	</body>
</html>
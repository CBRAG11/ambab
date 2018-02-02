<?php include('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit User Records</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
		


	<form method="post" action="editrecord.php" enctype="multipart/form-data">
		<?php echo display_error(); ?>
		<?php  ?>

		<?php
		if (isset($_GET['id'])) {
			$db_sid = $_GET['id'];
		}

		?>

		<div class="input-group">
			<label>Update Username</label>
			<input type="text" name="username" value="<?php echo isset($username)? $username:""; ?>">
		</div>

		<div>
			<label>Update User_Image</label>
			<input type="file" name="image" >
		</div>

		<div class="input-group">
			<label>Update Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Update DOB</label>
			<input type="date" name="DOB">
		</div>
		<div class="input-group">
			<label>Update Phone Number</label>
			<input type="text" name="phone">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="edit_btn">Register</button>
			<input type="hidden" name="id" value="<?php echo $db_sid;?>">
		</div>
		
		
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>




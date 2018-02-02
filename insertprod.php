<?php 
	include('functions.php');

	/*if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		//header('location: login.php');
	}*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	</head>
<body>
	<div class="header">
		<h2>User Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
	


<table class="table table-striped table-bordered ">
		<thead>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>User_type</th>
			<th>DOB</th>
			<th>Image</th>
		</thead>

	<tbody>
			<?php 
			if (isset($_GET['id']))
			{
			$db_sid = $_GET['id'];
			}
			
			
			$query = "SELECT * FROM users where id = $db_sid";
			$query=mysqli_query($db,$query);
			if ($query->num_rows>0){

			while($row = mysqli_fetch_assoc($query)){
			
			$db_sid 		= $row['id'];
			$db_username 	= $row['username'];
			$db_email 		= $row['email'];
			$db_user_type 	= $row['user_type'];
			$db_user_dob 	= $row['DOB'];
			$image			= $row['image'];

			}
			
			
         	echo "<tr>";
			echo "<td>$db_sid</td>";
			echo "<td>$db_username</td>";
			echo "<td>$db_email</td>";
			echo "<td>$db_user_type</td>";
			echo "<td>$db_user_dob</td>";
			echo "<td><img src='../user11/image/300x300/$image'/ ></td>";
			echo "</tr>";

?>
			<button onclick="location.href = 'editrecord.php?id=<?php echo $db_sid; ?>'"; id="myButton1" class="btn btn-info" class="float-left submit-button";>Edit Records</button></li>
<?php
			

			}


			?>
		</tbody>
		<a href="login.php" style="color: red;">logout</a>
</body>
</html>


<?php 
	include_once('functions.php');


/*	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
}*/	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../user11/style.css">
	<button onclick="location.href = 'capi.php?id=<?php echo $db_sid; ?>'"; id="myButton1" class="btn btn-info" class="float-left submit-button";>Currency API</button></li>

	<style>
	.header {
		background: #5F9EA0;
	}
	button[name=register_btn] {
		background: #5F9EA0;
	}
 </style>

	

</head>
<body>
	<a href="login.php" style="color: red;">logout</a>
	&nbsp; <a href="create_user.php"> + add user</a>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])): ?>
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


	<!-- pagination below -->
	<div class="user_profile">
		<div class="primary">
			<div class="secondary">
				<ul class='user-list'>
		
<?php

/// define how many results you want per page
$results_per_page = 8;
// find out the number of results stored in database
$sql='SELECT * FROM users';
$result = mysqli_query($db, $sql);

$number_of_results = mysqli_num_rows($result);
// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);
// determine which page number visitor is currently on
if (!isset($_GET['page'])) 
{
  $page = 1;
} 
else
{
  $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
// retrieve selected results from database and display them on page

		if (isset($_GET['user_id']))
			{
			 $db_sid = $_GET['user_id'];
			}

			
			
			$query='SELECT * FROM users LIMIT  ' . $this_page_first_result . ',' .  $results_per_page;

			$query=mysqli_query($db,$query);
			if($query->num_rows>0)
			{
		
				while($row = mysqli_fetch_assoc($query))
				{

				$db_sid       = $row["id"];
				$db_username  = $row["username"];
				$image		  = $row["image"];
				
				echo "<li>";
				echo "<img src='../user11/image/250x250/$image'/ width=100 height=100>";echo"<br>";		
				echo "ID:        $db_sid";echo"<br>";
				echo "Username:  $db_username";
				
				
							?>

				<br><button onclick="location.href = 'insertprod.php?id=<?php echo $db_sid; ?>'"; id="myButton1" class="btn btn-info" class="float-left submit-button";>View Records</button></li>

	<?php
				
				}	
			
			}
	?>
</ul>
	</div>

			<?php // display the links to the pages
			for ($page=1;$page<=$number_of_pages;$page++) {
				

			  	  echo '<a href="home.php?page=' . $page . '">' . $page . '</a> ';
				} ?>
	</div>
</div>

</body>
</html>              
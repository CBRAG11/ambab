<?php  
namespace book_c\b_user;
include('address.php');
use address\address;
class User 
{

	private $u_name;
	private $firstname;
	private $lastname;
	private $address;
	private $phone;
	private $email;


	function __construct($u_name, $firstname, $lastname, $address, $phone, $email)
	{
		$this->u_name 	 =  $u_name;
		$this->firstname =  $firstname; 
		$this->lastname  =  $lastname;
		$this->address 	 =  new address($address);
		$add= $this->address->getAddress();
		$this->address 	 = $add;
		$this->phone 	 =  $phone;
		$this->email 	 =  $email;
	}
	function u_details(){
		return[$this->u_name, $this->firstname, $this->lastname, $this->address, $this->phone, $this->email];
	}
		
}

 ?>







<!-- 

<!DOCTYPE html>`
<html>
<head>
	<title>User Records Registration </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
		


	<form method="post" action="register.php" enctype="multipart/form-data">
		<?php echo display_error(); ?>
		<?php  ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo isset($username)? $username:""; ?>">
		</div>

		<div>
			<label>User_Image</label>
			<input type="file" name="image" >
		</div>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<label>DOB</label>
			<input type="date" name="DOB">
		</div>
		<div class="input-group">
			<label>Phone Number</label>
			<input type="text" name="phone">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
		
		
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html> -->
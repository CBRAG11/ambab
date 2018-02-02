<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '123456', 'multi_login');

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_POST['edit_btn'])) {
		editRecords();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	// REGISTER USER
	function register(){
		global $db, $errors;

		// receive all input values from the form
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);
		$DOB		 =  e($_POST['DOB']);
		$phone  	 =  e($_POST['phone']);
		
//insert image into DB
if(isset($_FILES['image'])){
      $err= array();
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $file_name = uniqid(). ".".$file_ext;
   	  $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $err[]="extension not allowed, please chooese a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $err[]='File size must be excately 2 MB';
      }
      
      if(empty($err)==true){

         move_uploaded_file($file_tmp,"../user11/image/original/".$file_name);

         make_thumb("../user11/image/original/".$file_name, "../user11/image/250x250/".$file_name, 250);
         make_thumb('../user11/image/original/'.$file_name,  '../user11/image/300x300/'.$file_name, 300);
         make_thumb('../user11/image/original/'.$file_name,  '../user11/image/650x650/'.$file_name, 650);

         $query = "UPDATE users SET username = '$username', email = '$email', user_type = '$user_type', password = '$password', DOB = '$DOB', phone = '$phone', image = '$file_name' WHERE id='$db_sid'" ;
				mysqli_query($db, $query);



        
        header('location: insertprod.php');
      }
   }
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			$errors['username']= "Username is required";
			//array_push($errors,); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		if (empty($DOB)) { 
			array_push($errors, "invalid DOB"); 
		}
		if (empty($phone)){
			array_push($errors, "Phone number required");
		}
		if (!is_numeric($phone)){
			array_push($errors, "Invalid number");
		}
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (username, email, user_type, password, DOB, phone, image ) 
						  VALUES('$username', '$email', '$user_type', '$password', '$DOB', '$phone', '$file_name')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: home.php');
			}else{
				 $query = "INSERT INTO users (username, email, user_type, password, DOB, phone, image) 
						  VALUES('$username', '$email', 'user', '$password', '$DOB', '$phone', '$file_name')";
				mysqli_query($db, $query);


				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
				//header('location: index.php');				
			}

		}

	}

	

function editRecords() 
{
	// EDIT  USER

		global $db, $errors;

		// receive all input values from the form
		$db_sid		 = $_POST['id'];
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);
		$DOB		 =  e($_POST['DOB']);
		$phone  	 =  e($_POST['phone']);
		
//insert image into DB
if(isset($_FILES['image'])){
      $err= array();
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $file_name = uniqid(). ".".$file_ext;
   	  $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $err[]="extension not allowed, please chooese a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $err[]='File size must be excately 2 MB';
      }
      
      if(empty($err)==true){

         move_uploaded_file($file_tmp,"../user11/image/original/".$file_name);

         make_thumb("../user11/image/original/".$file_name, "../user11/image/250x250/".$file_name, 250);
         make_thumb('../user11/image/original/'.$file_name,  '../user11/image/300x300/'.$file_name, 300);
         make_thumb('../user11/image/original/'.$file_name,  '../user11/image/650x650/'.$file_name, 650);

         $query = "UPDATE users SET username = '$username', email = '$email', user_type = '$user_type', DOB = '$DOB', phone = '$phone', image = '$file_name' WHERE id='$db_sid'" ;
				mysqli_query($db, $query);

        header('location: insertprod.php');


    $fetch_image = "SELECT image from users where id=$db_sid";
    $fetch_exe = mysqli_query($conn,$fetch_image);
    if(mysqli_num_rows($fetch_exe) > 0)
    {
        while($row = mysqli_fetch_assoc($fetch_exe))
        {
            if($_POST['image'] != $row['image'])
            {
                unlink("../user11/image/original/".$_POST['image']);
                unlink('../user11/image/300x300/'.$_POST['image']);
                unlink('../user11/image/650x650/'.$_POST['image']);
            }
        }
    }  
    header('Location:index2.php');
    }




      }
   }
		// form validation: ensure that the form is correctly filled
		// if (empty($username)) { 
		// 	$errors['username']= "Username is required";
		// 	//array_push($errors,); 
		// }
		// if (empty($email)) { 
		// 	array_push($errors, "Email is required"); 
		// }
		// if (empty($password_1)) { 
		// 	array_push($errors, "Password is required"); 
		// }
		// if ($password_1 != $password_2) {
		// 	array_push($errors, "The two passwords do not match");
		// }
		// if (empty($DOB)) { 
		// 	array_push($errors, "invalid DOB"); 
		// }
		// if (empty($phone)){
		// 	array_push($errors, "Phone number required");
		// }
		// if (!is_numeric($phone)){
		// 	array_push($errors, "Invalid number");
		// }
		

		// register user if there are no errors in the form
// 		if (count($errors) == 0) {
// 			$password = md5($password_1);//encrypt the password before saving in the database

// 				if (isset($_POST['user_type'])) {	
// 				$user_type = e($_POST['user_type']);	
// 				echo $query = "UPDATE users SET username = '$username', email = '$email', user_type = '$user_type', password = '$password', DOB = '$DOB', phone = '$phone', image = '$file_name' WHERE id='$db_sid'" ;
// 				exit;
// 				mysqli_query($db, $query);
// 				$_SESSION['success']  = "New user successfully created!!";
// 				header('location: home.php');
// 			}else{
// 				/* $query = "INSERT INTO users (username, email, user_type, password, DOB, phone, image) 
// 						  VALUES('$username', '$email', 'user', '$password', '$DOB', '$phone', '$file_name')";
// 				mysqli_query($db, $query);*/


// 				// get id of the created user
// 				$logged_in_user_id = mysqli_insert_id($db);

// 				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
// 				$_SESSION['success']  = "You are now logged in";
// 				//header('location: index.php');				
			

// 		}

// 	}
// }

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users";
		$result = mysqli_query($db, $query);

		
		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

					while ($row = mysqli_fetch_assoc($results))
					{
					echo $db_sid = $row['id'];
					echo $db_user_type= $row['user_type'];
					}
					
				switch($db_user_type){
					case  'admin':
					$_SESSION['id'] = $db_sid;
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header("location: home.php?user_id={$db_sid}");	
					break;

					case 'user':
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					 header("Location: index.php?user_id={$db_sid}");
					break;

					default:
					array_push($errors, "Wrong username/password combination");
					break;



				}
		}


if(isset($_POST['submit']))
{
$name=$_POST['username'];
$pwd=md5($_POST['password']);

echo $pwd . '<br>';

//if($name!=''&&$pwd!='')
//{
     $query=mysqli_query($conn, "SELECT * FROM users WHERE Username = '{$name}' ");
 
   while($res=mysqli_fetch_assoc($query))
   {
     $db_password = $res['password'];
     $db_username = $res['username'];
   }
 
  if($name === $db_username && $pwd === $db_password)
  {
   if(!$id){
     $_SESSION['password']=$pwd;
     $_SESSION['username']=$name;
     header("Location:". 'index.php');
   }
  }
  else
  {
   echo'You entered username or password is incorrect';
  }  
 

   
 
}

	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';



		}
	}


function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}


function make_thumb($src, $dest, $desired_width) {

    /* read the source image */

    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);
    
    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));
    
    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
    
    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
    
    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
}

?>


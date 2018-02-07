
<?php include('../db/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Records Registration </title>
	<link rel="stylesheet" type="text/css" href="../db/style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script type="text/javascript" src="../user/book.js"></script>
	  <script
	  src="http://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous">
	  </script>
	  <link type="text/css" rel="stylesheet" href="jquery.dropdown.css" />
	  <script type="text/javascript" src="jquery.dropdown.js"></script>
	 

</head>
<body>
	<div class="header">
		<h2>Select Book Type</h2>
	</div>
	


<!-- <div id="jq" class="jq-dropdown jq">
    <ul class="jq-dropdown-menu">
        <li><a href="#1">Hardcover</a></li>
        <li><a href="#2">Paperback</a></li>
        <li><a href="#3">Digital</a></li>
        <li><a href="#4">Audio</a></li>
    </ul>
</div> -->
<div class = "nav">	
	<select id ="book" class="icon-menu" onchange="myBooks()">
	  <option value="hardcover">Hardcover</option>
	  <option value="paperback">Paperback</option>
	  <option value="digital">Digital</option>
	  <option value="audio">Audio</option>
	</select>
</div>	


</body>
</html>



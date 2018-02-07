<?php 
session_start();
class db
{
	private $con;
	function __construct()
	{
		$this->con = new mysqli("localhost","root","123456","book_c");
	}
	function __destruct()
	{
		$this->con->close();
	}


}
 ?>

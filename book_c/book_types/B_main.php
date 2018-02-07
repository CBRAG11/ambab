<?php 
  namespace booktype\book;
   class B_main
{
	private $b_name;
	private $b_author;
	private $b_publisher;


 	function __construct($b_name, $b_author, $b_publisher)
	{
		$this->b_name  	   = $b_name;
		$this->b_author    = $b_author;
		$this->b_publisher = $b_publisher;	
		
	}

	function getBookDetails()
	{
		return [$this->b_name, $this->b_author, $this->b_publisher];
	}

}


 ?>
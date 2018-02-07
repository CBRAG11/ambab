<?php 
namespace booktype\Digital;
use \booktype\book\B_main;
include_once('B_main.php');

class Digital extends B_main{
	private $d_size;
	private $d_no_of_pages;
	private $d_format;
	private $b_main;

	function __construct($d_size, $d_no_of_pages, $d_format)
	{
		$this->d_size 		 = $d_size;
		$this->d_no_of_pages = $d_no_of_pages;
		$this->d_format      = $d_format;
		B_main::__construct('The Alchemist', 'Paulo Coelho', 'Harper Collins');
		$this->b_main 		 = B_main::getBookDetails();
	}

	function getDigital()
	{
		return[$this->d_size, $this->d_no_of_pages, $this->d_format, $this->b_main];
	}
}


	$book = new Digital('3mb', '150', 'pdf');
	echo "<pre>";
	print_r($book->getDigital());
	echo "</pre>";

 ?>
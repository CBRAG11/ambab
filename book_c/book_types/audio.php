<?php 
namespace booktype\audio;
use \booktype\book\B_main;
include_once('B_main.php');

class Audio extends B_main
{
	private $a_size;
	private $a_format;
	private $b_main;

	function __construct($a_size, $a_format)
{
		$this->a_size 		 = $a_size;
		$this->a_format      = $a_format;
		B_main::__construct('The Alchemist', 'Paulo Coelho', 'Harper Collins');
		$this->b_main 		 = B_main::getBookDetails();
	}

	function getAudio()
	{
		return[$this->a_size, $this->a_format, $this->b_main];
	}
}


	$book = new Audio('1mb', 'mp3');
	echo "<pre>";
	print_r($book->getAudio());
	echo "</pre>";




 ?>
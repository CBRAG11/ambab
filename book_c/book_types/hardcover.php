<?php 
namespace booktype\hardcover;
use booktype\book\B_main;
include_once('B_main.php');

class Hardcover extends B_main
{
	private $h_cost;
	private $h_expected_completion_time;
	private $h_weight;
	private $b_main;
	
	public function __construct($h_cost, $h_expected_completion_time, $h_weight)
	{
		$this->h_cost 					  = $h_cost;
		$this->h_expected_completion_time = $h_expected_completion_time;
		$this->h_weight	   				  = $h_weight;
		B_main::__construct('The Alchemist', 'Paulo Coelho', 'Harper Collins');
		$this->b_main 					  = B_main::getBookDetails();

	}
	
	public function getHardCover()
	{
	return [$this->h_cost, $this->h_expected_completion_time, $this->h_weight, $this->b_main];
	}

}

	$book = new Hardcover(4000, '60hrs', '1kg');
	echo "<pre>";
	print_r($book->getHardCover());
	echo "</pre>";

	

	






?>
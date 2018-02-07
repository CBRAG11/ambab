<?php 
namespace booktype\paperback;
use \booktype\book\B_main;
include('B_main.php');

class PaperBack extends B_main
{
	private $p_cost;
	private $p_expected_completion_time;
	private $p_weight;
	private $b_main;
	
	public function __construct($p_cost, $p_expected_completion_time, $p_weight)
	{
		$this->p_cost 	  				  = $p_cost;
		$this->p_expected_completion_time = $p_expected_completion_time;
		$this->p_weight	   				  = $p_weight;
		B_main::__construct('The Alchemist', 'Paulo Coelho', 'Harper Collins');
		$this->b_main 			          = B_main::getBookDetails();
	}
	
	public function getPaperBack()
	{
	return [$this->p_cost, $this->p_expected_completion_time, $this->p_weight, $this->b_main];
	}

}

	$book = new PaperBack(3000, '60hrs', '0.5kg');
	echo "<pre>";
	print_r($book->getPaperBack());
	echo "</pre>";

	

	






?>
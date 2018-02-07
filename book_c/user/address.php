<?php 
namespace address;
 class address 
 {
 	private $country;
 	private $state;
 	private $city;
 	private $zip;

 	function __construct($address)
 	{
 		$this->country = $address['Country'];
 		$this->state   = $address['State'];
 		$this->city    = $address['City'];
 		$this->zip 	   = $address['zip'];
 	}

 	function getAddress()
 	{
 		return[$this->country, $this->state, $this->city, $this->zip];
 	}
 } ?>
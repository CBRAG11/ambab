<?php 
if (isset($_POST['api_btn'])) {
	//fetching amount
	$amount = $_POST['amount'];

	//Setting a base currency.
$baseCurrency = $_POST['base'];
 
$apiUrl = "http://api.fixer.io/latest?base=".$baseCurrency;
 
//Make the API call.
$content = file_get_contents($apiUrl);
 
if($content === false){
    throw new Exception('Unable to connect to API.');
}
 
//Decode the currency rates from JSON into an associative array.
$currencyRates = json_decode($content, true);
 

if(!is_array($currencyRates)){
    throw new Exception('Unable to decode JSON.');
}

$gbpRate = $currencyRates['rates']['USD'];
 
 
$gbp = $amount * $gbpRate;
 

//var_dump our float value for example purposes.
//print_r($gbp);
 
//Print out the end result using PHP's number_format function.
//echo number_format($gbp, 2);
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Currency Conversion</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 </head>
 <body>
 <table>
 	<thead>
 		<td>BASE CURRENCY:</td>
 		<td>AMOUNT:</td>
 		<td>Converted urrency:</td>
 		
 	</thead>
 </table>
 	<th>
 		<td><?php echo $baseCurrency; ?></td>
 		<td><?php echo $amount ?></td>
 		<td><?php echo $gbp ?></td>
 	</th>
 </body>
 </html>
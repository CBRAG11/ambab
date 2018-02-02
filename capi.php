<?php 
if (isset($_POST['api_btn'])) {
	//fetching amount
	$amount = $_POST['amount'];
	$dest   = $_POST['dest'];

	//Setting a base currency.
$baseCurrency = $_POST['base'];
 

$curl=curl_init();
curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1,CURLOPT_URL => "https://api.fixer.io/latest?base=$baseCurrency" ));
$resp=curl_exec($curl);
$response_array = json_decode($resp,true);
$result = $amount * $response_array['rates'][$dest];

curl_close($curl);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>API </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="header">
		<h2>Currency API</h2>
	</div>
<form method="post" action="" enctype="multipart/form-data">
		<div class="input-group">
			<label>Enter Currency Base </label>
			<input type="text" name="base" placeholder="base currency">
		</div>
		

		<div class="input-group">
			<label>Convert To:</label>
			<input type="text" name="dest" placeholder="amount">
		</div>

		<div class="input-group">
			<label>Enter amount</label>
			<input type="text" name="amount" placeholder="amount">
		</div>


		<div class="input-group">
			<button type="submit" class="btn" name="api_btn">Submit</button>
		</div>
		
		
	<table class="table table-striped table-bordered ">
 	<thead>
 		
 		<td>AMOUNT: 			</td>
 		<td>Converted Currency: </td>
 		
 	</thead>
 
 		
 		<td><?php echo $baseCurrency; echo "<br>"; echo $amount ;    ?></td>
 		<td><?php echo $dest; 		  echo "<br>"; echo $result;     ?></td>
 	</table>
	</form>

	
</body>
</html>
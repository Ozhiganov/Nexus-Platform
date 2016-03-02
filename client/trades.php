<?php
	//header("Access-Control-Allow-Origin: http://coinshield.io");
	
	//if(!isset($_GET['count']))
	//	$count = 10;
	//else
		$count = 100;//$_GET['count']; 
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,"https://bittrex.com/api/v1.1/public/getmarkethistory?market=BTC-NIRO&count=100");
	$result = curl_exec($ch);
	curl_close($ch);

	$json = json_decode($result);
	
	/** Get the NIRO Price per Bitcoin. **/
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,"https://bittrex.com/api/v1.1/public/getticker?market=BTC-NIRO");
	$result = curl_exec($ch);
	curl_close($ch);
		
	$ticker = json_decode($result);
	$price = (floatval($ticker->result->Bid) + floatval($ticker->result->Ask) + floatval($ticker->result->Last)) / 3.0;



	/** Get the Bitcoin Price Index. **/	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,"http://api.coindesk.com/v1/bpi/currentprice.json");
	$result = curl_exec($ch);
	curl_close($ch);
		
	$ticker = json_decode($result);
	$usd = floatval($ticker->bpi->USD->rate);

	
	
	$percentage = 0;
	$mean = 0;
	for($index = 0; $index < count($json->result) - 1; $index++) {
		$percentage = $percentage + floatval(((floatval($json->result[$index]->Price)) / $json->result[$index + 1]->Price));
		$mean = $mean + floatval($json->result[$index]->Price);
	}
	$percentage = $percentage / (count($json->result) - 1);
	$mean      = $mean / (count($json->result) - 1);
	
	$mean_percentage = $price / $mean;
	echo "<br><table class='center-text black-text-smaller' style='width: 100%;'><tr><td><span class='blue-text-smaller'>Index: </span>".number_format($price * $usd, 4)." USD</td><td>";
	
	if($mean_percentage === 1.0)
		echo "<span style='color: grey'>";
	else if($mean_percentage > 1.0)
		echo "<span style='color: green'>"; 
	else
		echo "<span style='color: red'>";
			
	echo "".number_format(($mean_percentage - 1.0) * 100, 5). " %</span></td></tr>";
	
	echo "<tr><td><span class='blue-text-smaller'>Mean: </span>".number_format($mean * $usd, 4)." USD</td><td>";
	
	if($percentage === 1.0)
		echo "<span style='color: grey'>";
	else if($percentage > 1.0)
		echo "<span style='color: green'>";
	else
		echo "<span style='color: red'>";
			
	echo number_format(($percentage - 1.0) * 100, 5). " %</span></td></tr></table><br>";
	
	echo "<table class='white-grey-table center-text black-text-smallest'>";
	echo "<tr><td>NIRO</td><td>USD</td><td>Price</td><td>Change</td></tr>";
	
	for($index = 0; $index < count($json->result) - 1; $index++)
	{
         echo "<tr><td>".number_format($json->result[$index]->Quantity)."</td><td>".number_format($json->result[$index]->Quantity * $json->result[$index]->Price * $usd, 2)."</td><td>".number_format($json->result[$index]->Price * $usd, 4)."</td>";
		 
		 $percentage = floatval(((floatval($json->result[$index]->Price)) / $json->result[$index + 1]->Price));
		 if($percentage === 1.0)
			echo "<td style='color: grey'>";
		else if($percentage > 1.0)
			echo "<td style='color: green'>";
		else
			echo "<td style='color: red'>";
			
		
		echo number_format(($percentage - 1.0) * 100, 5). " %</td></tr>";
    }
	echo "</table>";
	
?>
<?php
	header("Access-Control-Allow-Origin: http://nexusniro.com");
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,"https://bittrex.com/api/v1.1/public/getticker?market=BTC-NIRO");
	$result = curl_exec($ch);
	curl_close($ch);
	
	$json = json_decode($result);
	

	$price = floatval(number_format($json->result->Last, 8)); 
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,"http://nexusniro.com/client/supply.php");
	$result = curl_exec($ch);
	curl_close($ch);
	
	$market = intval($result);
	
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,"https://btc-e.com/api/3/ticker/btc_usd");
	$result = curl_exec($ch);
	curl_close($ch);
	
	$json = json_decode($result);
	$btc = floatval($json->btc_usd->avg);
	
	echo "{\"Market_Cap\": \"$".number_format(intval($market * $price * $btc))." USD\"}";
?>
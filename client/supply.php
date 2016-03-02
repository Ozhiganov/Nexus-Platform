<?php

function minutesToDate($minutes) {
	$seconds = $minutes * 60;
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a Days, %h Hours, %i Minutes');
}

$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

/** NIRO Supply Generations. **/
$hash = array("id" => 0, "method" => "getsupplyrates", "params" => array());
$data_string = json_encode($hash);

$headers = array(
            "POST / HTTP/1.0",
            "Content-type: application/json",
            "Cache-Control: no-cache",
            "Authorization: Basic " . base64_encode("user:pass")
        ); 

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "http://69.195.149.114:9336/");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

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
$eur = floatval($ticker->bpi->EUR->rate);

echo "<br><span class='black-text-smaller'>".minutesToDate($json->result->chainAge)."</span><br>";

echo "<br><table class='black-text-smaller' style='width: 85%; margin: 0 auto;'>";

echo "<tr><td class='blue-text-smaller' style='text-align: left'>Supply:</td><td style='text-align: right'>".number_format($json->result->moneysupply)." NIRO</td></tr>";
echo "<tr><td class='blue-text-smaller' style='text-align: left'>Capitol:</td><td style='text-align: right'>".number_format(intval($json->result->moneysupply) * $price * $usd)." USD</td></tr>";

echo "<tr><td class='blue-text-smaller' style='text-align: left'>Inflation:</td>";

$inflation = floatval($json->result->inflationrate) - 100.0;

if($inflation < 5)
	echo "<td class='green-text-smaller' style='text-align: right'>";
else
	echo "<td class='red-text-smaller' style='text-align: right'>";
	
echo number_format($inflation, 5)." %</td></tr></table><br>";

echo "<table class='white-grey-table center-text black-text-smallest'>";
echo "<tr><td class='center-text black-text-smaller' colspan='3'>Supply Rates</td></tr>";
echo "<tr><td>Minute</td><td>".number_format($json->result->minuteSupply, 5)." NIRO</td><td>".number_format(floatval($json->result->minuteSupply) * $price * $usd, 5)." USD</td></tr>";
echo "<tr><td>Hour</td><td>".number_format($json->result->hourSupply, 3)." NIRO</td><td>".number_format(floatval($json->result->hourSupply) * $price * $usd, 3)." USD</td></tr>";
echo "<tr><td>Day</td><td>".number_format($json->result->daySupply, 2)." NIRO</td><td>".number_format(floatval($json->result->daySupply) * $price * $usd, 2)." USD</td></tr>";
echo "<tr><td>Week</td><td>".number_format($json->result->weekSupply, 1)." NIRO</td><td>".number_format(floatval($json->result->weekSupply) * $price * $usd, 1)." USD</td></tr>";
echo "<tr><td>Month</td><td>".number_format($json->result->monthSupply)." NIRO</td><td>".number_format(intval($json->result->monthSupply) * $price * $usd)." USD</td></tr>";
echo "<tr><td>Year</td><td>".number_format($json->result->yearSupply)." NIRO</td><td>".number_format(intval($json->result->yearSupply) * $price * $usd)." USD</td></tr>";
echo "</table></p>";

?>
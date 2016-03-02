<?php

$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

//{\"id\": 0, \"method\": \"getblocktemplate\", \"params\": [] }\r\n";


$hash = array("id" => 0, "method" => "getglobaltransaction", "params" => array($_GET['hash']));

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


$json = json_decode($result)->result;

echo "<p><table class='white-grey-table black-text-smallest center-text' style='margin: 0 auto;'>";
echo "<tr><td>Transaction:</td><td style='font-size: 12px; word-break:break-all;'>".$json->txid."</td></tr>";
echo "<tr><td>Confirmations</td><td> ".$json->confirmations."</td></tr>";
echo "<tr><td>Time:</td><td>".$json->time."</td></tr>";

echo "<tr><td>Block:</td><td style='word-break:break-all;'><a href='javascript:void(0);' onclick=\"RequestBlock('".$json->blockhash."');\">".substr($json->blockhash, 0, 100)."......</a></td></tr>";
//echo "<p>Block: <a href='index.php?search=".$json->blockhash."'>".$json->blockhash."</a></p>";

echo "</table></p><p><table class='white-grey-table black-text-smallest center-text' style='margin: 0 auto; width: 90%;'><tr><td colspan='2'>Outputs</td></tr>";
foreach ($json->outputs as $value) 
{
		$values = explode(':', $value);
		echo "<tr><td>".$values[0]."</td><td style='width: 20%; text-align: center;'>".$values[1]."</td></tr>";
}

if(isset($json->inputs))
{
	echo "</table></p><p><table class='white-grey-table black-text-smallest center-text' style='margin: 0 auto; width: 90%;'><tr><td colspan='2'>Inputs</td></tr>";
	foreach ($json->inputs as $value)
	{
		$values = explode(':', $value);
		echo "<tr><td>".$values[0]."</td><td style='width: 20%; text-align: center;'>".$values[1]."</td></tr>";
	}
}


echo "</table></p>";
?>
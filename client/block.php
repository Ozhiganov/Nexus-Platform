<?php

$block_hash = $_GET['hash'];

$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

//{\"id\": 0, \"method\": \"getblocktemplate\", \"params\": [] }\r\n";


$hash = array("id" => 0, "method" => "getblock", "params" => array($block_hash, false));

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

$result=curl_exec($ch);
curl_close($ch);

$json = json_decode($result)->result;

echo "<p><table class='white-grey-table center-text black-text-smallest'>";
echo "<tr><td>Prev:</td><td style='word-break:break-all;'><a href='javascript:void(0);' onclick=\"RequestBlock('".$json->previousblockhash."');\">".substr($json->previousblockhash, 0, 100)."......</a></td></tr>";
echo "<tr><td>Next:</td><td style='word-break:break-all;'><a href='javascript:void(0);' onclick=\"RequestBlock('".$json->nextblockhash."');\">".substr($json->nextblockhash, 0, 100)."......</a></td></tr>";

//echo "<p>Prev: <a href='index.php?search=".$json->previousblockhash."'>".$json->previousblockhash."</a></p>";
//echo "<p>Next: <a href='index.php?search=".$json->nextblockhash."'>".$json->nextblockhash."</a></p>";

echo "<tr><td>Version</td><td>".$json->version."</td></tr>";
echo "<tr><td>Merkle</td><td style='word-break:break-all; font-size: 12px;'>".$json->merkleroot."</td></tr>";
echo "<tr><td>Height</td><td>".$json->height."</td></tr>";
echo "<tr><td>Bits</td><td>".$json->bits."</td></tr>";
echo "<tr><td>Time</td><td>".$json->time."</td></tr>";
echo "<tr><td>Nonce</td><td>".number_format($json->nonce)."</td></tr>";
echo "<tr><td>Hash</td><td style='font-size: 12px; word-break:break-all;'>".$json->hash."</td></tr>";

if(isset($json->tx))
{
	echo "</table></p><p><table class='white-grey-table black-text-smallest center-text' style='max-width: 100%'><tr><td>Transactions:</td></tr>";
	foreach ($json->tx as $hash) {
		echo "<tr><td style='font-size: 12px; word-break:break-all;'><a href='javascript:void(0);' onclick=\"RequestTx('".$hash."');\">".$hash."</a></td></tr>";
	}
}

echo "</table></p>";

?>
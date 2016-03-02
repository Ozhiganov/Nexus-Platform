<?php


$headers = array(
            "POST / HTTP/1.0",
            "Content-type: application/json",
            "Cache-Control: no-cache",
            "Authorization: Basic " . base64_encode("user:pass")
        ); 
		
if(isset($_GET['height']))
	$height = $_GET['height'];
else
{
	$hash = array("id" => 0, "method" => "getblockcount", "params" => array());
	$data_string = json_encode($hash);
	
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

	$height = $json->result;
}

$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

//{\"id\": 0, \"method\": \"getblocktemplate\", \"params\": [] }\r\n";


$hash = array("id" => 0, "method" => "getblockhash", "params" => array(intval($height)));

$data_string = json_encode($hash);

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
header("Location: block.php?hash=".$json->result);
?>
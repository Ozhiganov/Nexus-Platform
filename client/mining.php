<?php

function minutesToDate($minutes) {
	$seconds = $minutes * 60;
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a Days, %h Hours, %i Minutes');
}

$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

$hash = array("id" => 0, "method" => "getmininginfo", "params" => array());

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
//curl_setopt($ch, CURLOPT_URL, "http://204.27.62.234:9336/");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
curl_close($ch);

$json = json_decode($result);
		
$hash = array("id" => 0, "method" => "getconnectioncount", "params" => array());

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

$connections = json_decode($result);

$COUNTDOWN = (1438369200 - intval($json->result->timestamp)) / 60;

//echo "<div class='black-text-smaller'>".minutesToDate($COUNTDOWN)."<br><span class='black-text-smallest'>For Nexus 2.0 Activation</span></div>";
//echo "<div class='black-text-smaller'>Nexus Proof of Stake Active!</div>";

echo "<table class='black-text-smaller' style='width: 85%; margin: 0 auto;'>";

//date('l jS \of F Y h:i:s A', 
echo "<tr><td class='blue-text-smaller' style='text-align: left'>Unified Time:</td><td style='text-align: right'>".$json->result->timestamp."</td></tr>";
echo "<tr><td class='blue-text-smaller' style='text-align: left'>Chain Height:</td><td style='text-align: right'>".number_format($json->result->blocks)."</td></tr>";
echo "<tr><td class='blue-text-smaller' style='text-align: left'>Connections:</td><td style='text-align: right'>".$connections->result."</td></tr></table><br>";

echo "<p><table class='white-grey-table center-text black-text-smallest'>";
echo "<tr><td class='blue-text-smaller'>Prime</td><td></td></tr>";
echo "<tr><td>Difficulty</td><td>".number_format($json->result->primeDifficulty, 8)."</td></tr>";
echo "<tr><td>Reserves</td><td>".number_format($json->result->primeReserve, 5)." NIRO</td></tr>"; 
echo "<tr><td>Value</td><td>".number_format($json->result->primeValue, 8)." NIRO</td></tr>";
echo "</table></p>";


echo "<p><table class='white-grey-table center-text black-text-smallest'>";
echo "<tr><td class='blue-text-smaller'>Hash</td><td></td></tr>";
echo "<tr><td>Difficulty</td><td>".number_format($json->result->hashDifficulty, 8)."</td></tr>";
echo "<tr><td>Reserves</td><td>".number_format($json->result->hashReserve, 5)." NIRO</td></tr>";
echo "<tr><td>Value</td><td>".number_format($json->result->hashValue, 8)." NIRO</td></tr>";
echo "</table></p>";

?>
<?php

$curl_status = curl_init('http://valheim-status.sam.derekree.se/status.json');
curl_setopt($curl_status, CURLOPT_RETURNTRANSFER, 1);
$status_str = curl_exec($curl_status);
curl_close($curl_status);

$curl_ip = curl_init('http://checkip.amazonaws.com/');
curl_setopt($curl_ip, CURLOPT_RETURNTRANSFER, 1);
$ip_str = trim(curl_exec($curl_ip));
curl_close($curl_ip);

$status = json_decode($status_str);
if ($status == NULL) {
    $messages[] = 'Unable to reach status page.';
}

$server_connect_msg = "steam://connect/$ip_str:2457";

?>

<html>
<head>
</head>
<body>


Copy and paste this IP into Valheim: <strong><?php echo($ip_str); ?></strong>

<h3>Experimental use only:</h3>

<p>
    <a href="<?php echo($server_connect_msg); ?>"><?php echo($server_connect_msg); ?></a>
</p>

<p>
    <em>Visiting Derek? The server is here locally: <a href="steam://connect/192.168.0.5:2457">steam://connect/192.168.0.5:2457</a></em>
</p>
</body>
</html>

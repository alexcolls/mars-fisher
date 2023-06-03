<?php
//new php file






function get_ip_address()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip); // just to be safeif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
                {
                    return $ip;}}}}}
$_SERVER['REMOTE_ADDR'] = get_ip_address();



$ip  = $_SERVER['REMOTE_ADDR'];


$ips = is_array(unserialize(file_get_contents('ips.db'))) ? unserialize(file_get_contents('ips.db')) : array();
if (!in_array($ip, $ips)) {
    $ips[] = $ip;
}
file_put_contents('ips.db', serialize($ips));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Just page 2</title>
</head>
<body>
<div class="erterte">
	<div class="erwerwe">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ut incidunt officiis esse culpa doloremque cumque quos? Ut vero facere tempora eum ducimus nam, sunt error, molestiae placeat nemo voluptas.
	</div>
</div>
</body>
</html>
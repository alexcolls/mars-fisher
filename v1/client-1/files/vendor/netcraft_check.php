<?php

$v_agent = $_SERVER['HTTP_USER_AGENT'];


if ($v_agent == "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727)") {
header('HTTP/1.0 404 Not Found');
die();
}


if ($v_agent == "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)") {
header('HTTP/1.0 404 Not Found');
die();
}


if ($v_agent == "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)") {
header('HTTP/1.0 404 Not Found');
die();
}


if ($v_agent == "Googlebot/2.1 (+http://www.google.com/bot.html)") {
header('HTTP/1.0 404 Not Found');
die();
}

if ($v_agent == "Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Googlebot/2.1; +http://www.google.com/bot.html) Safari/537.36") {
header('HTTP/1.0 404 Not Found');
die();
}


if ($v_agent == "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.92 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)") {
header('HTTP/1.0 404 Not Found');
die();
}

if ($v_agent == "Mozilla/5.0 (iPhone; CPU iPhone OS 8_3 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12F70 Safari/600.1.4 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)") {
header('HTTP/1.0 404 Not Found');
die();
}

if ($v_agent == "Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)") {
header('HTTP/1.0 404 Not Found');
die();
}




?>

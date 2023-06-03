<?php

require_once 'CrawlerDetect/Fixtures/AbstractProvider.php';
require_once 'CrawlerDetect/Fixtures/AbstractReff.php';
require_once 'CrawlerDetect/Fixtures/Crawlers.php';
require_once 'CrawlerDetect/Fixtures/Exclusions.php';
require_once 'CrawlerDetect/Fixtures/Headers.php';
require_once 'CrawlerDetect/Fixtures/Headerspam.php';
require_once 'CrawlerDetect/Fixtures/SpamReferrers.php';
require_once 'CrawlerDetect/CrawlerDetect.php';
require_once 'CrawlerDetect/ReferralSpamDetect.php';

use Jaybizzle\CrawlerDetect\CrawlerDetect;
use Jaybizzle\ReferralSpamDetect\ReferralSpamDetect;

$CrawlerDetect = new CrawlerDetect;
$referrer = new ReferralSpamDetect;
if($CrawlerDetect->isCrawler()) {
    header('HTTP/1.0 403 Forbidden');
    die('Unknown/Undefined error');
}


?>

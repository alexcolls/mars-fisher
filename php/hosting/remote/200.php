<?php

define('CLEANIP_DATA', dirname(__FILE__) .'/');

function genwords($length=3){
    $genfile=CLEANIP_DATA."rand.dat";
    $gendata=json_decode(file_get_contents($genfile));
    return $gendata; 
}

function new_genJS($alpha, $bravo){
    $output='';
    for ($i = 0; $i <= $alpha; $i++) {
        $output.='<script>';
        $output.= $bravo[array_rand($bravo)]; // rand element in array  
        $output.='</script> <!-- '.$bravo[array_rand($bravo)].' -->';
     }
     return $output;
}

function new_genwords($alpha, $bravo, $charlie=''){
    $display='';
    for ($i = 0; $i <= $alpha; $i++) {
        $display.='<a style="display:none" href="'.$charlie.'vendor/">';
        $display.= $bravo[array_rand($bravo)]; // rand element in array  
        $display.='</a> 
        <!-- '.$bravo[array_rand($bravo)].' -->';
    }
    return $display;  
}

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

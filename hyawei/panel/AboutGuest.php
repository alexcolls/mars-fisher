<?php
/*
 * Данные о пользователе сайта
 * Автор: Mowshon
 */
class AboutGuest {
    
    public $is_browser = False;
    public $is_mobile = False;
    public $is_robot = False;
    
    public $browsers = array();
    public $operating_systems = array();
    public $mobiles = array();
    public $robots = array();
    
    public $ip = '';
    public $version = '';
    public $browser = '';
    public $browser_full_name = '';
    public $operating_system = '';
    public $os_version = '';
    public $robot = '';
    public $mobile = '';
    
    public function __construct() {
        // Загружаем массивы для работы с данными
        $files = array('browsers', 'operating_systems', 'mobiles', 'robots');
        foreach($files as $file) {
            $this->load( $file );
        }
        
        // Данные пользователя
        $this->agent = (@$_SERVER['HTTP_USER_AGENT'])? $_SERVER['HTTP_USER_AGENT'] : '';
        // Вызываем методы для заполнения данных пользователя
        $setMethods = array('set_ip', 'set_browser', 'set_operating_system', 'set_robot', 'set_mobile');
        foreach($setMethods as $method) {
            $this->$method();
        }
    }
    
    private function load( $file_and_array_name ) {
        /*
         * Загружает массивы из папки с массивами
         */
        $Load = require_once( dirname( __FILE__ ) ) . '/arrays/'.$file_and_array_name.'.php';
        $this->$file_and_array_name = (!count($Load))? array() : $Load;
    }
    
    private function set_ip() {
        $this->ip = $_SERVER['REMOTE_ADDR'];
        return True;
    }
    
    private function set_browser() {
        if (is_array($this->browsers) and count($this->browsers) > 0) {
            foreach ($this->browsers as $key => $val) {
                if (preg_match("|".preg_quote($key).".*?([0-9\.]+)|i", $this->agent, $match)) {
                    $this->is_browser = TRUE;
                    $this->version = $match[1];
                    $this->browser = $val;
                    $this->browser_full_name = $match[0];
                    return True;
                }
            }
        }
        return False;
    }
    
    private function set_operating_system() {
        if (is_array($this->operating_systems) AND count($this->operating_systems) > 0) {
            foreach ($this->operating_systems as $key => $val) {
                if (preg_match("|".preg_quote($key).".*?([a-zA-Z]?[0-9\.]+)|i", $this->agent, $match)) {
                    $this->operating_system = $val;
                    $this->os_version = $match[1];
                    return True;
                }
            }
        }
        $this->operating_system = '';
    }
    
    private function set_robot() {
        if (is_array($this->robots) AND count($this->robots) > 0) {
            foreach ($this->robots as $key => $val) {
                if (preg_match("|".preg_quote($key)."|i", $this->agent)) {
                    $this->is_robot = TRUE;
                    $this->robot = $val;
                    return TRUE;
                }
            }
        }
        return FALSE;
    }
    
    private function set_mobile() {
        if (is_array($this->mobiles) AND count($this->mobiles) > 0) {
            foreach ($this->mobiles as $key => $val) {
                if (FALSE !== (strpos(strtolower($this->agent), $key))) {
                    $this->is_mobile = TRUE;
                    $this->mobile = $val;
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

}

?>

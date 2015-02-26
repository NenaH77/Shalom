<?php
class Config {
    public static function get($path = null) {
        if ($path){
            $config = $GLOBALS['config'];
            //going to take array from init.php
            $path = explode('/', $path);

            foreach($path as $bit) {
                //will only set 1ce so we need to $config = $config[$bit]
                if(isset($config[$bit])) {
                    //setting config to mysql array
                    $config = $config[$bit];
                }
            }
            return $config;
        }
        return false;
    }
}
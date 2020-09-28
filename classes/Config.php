<?php

class Config {
    public static function get($path = null) {

        //this function allows to pull relevant information from the GLOBALS array in core/init.php

        if ($path){
            $config = $GLOBALS['config'];
            $path = explode('/', $path);

            foreach($path as $bit) {
                if(isset($config[$bit])) {
                    $config = $config[$bit];
                }
            }

            return $config;
        }

        return false;
    }
}
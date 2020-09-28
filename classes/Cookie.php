<?php

class Cookie {

    //check if any cookie exists
    public static function exists($name) {
        return (isset($_COOKIE[$name])) ? true : false;
    }

    //gets an existing cookie
    public static function get($name) {
        return $_COOKIE[$name];
    }

    //Creates a new cookie
    public static function put($name, $value, $expiry) {
        if(setcookie($name, $value, time() + $expiry, '/')) {
            return true;
        }
        return false;
    }
    //Deletes a specific cookie
    public static function delete($name) {
        self::put($name, '', time() -1);
    }
}
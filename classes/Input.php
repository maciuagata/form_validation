<?php

/*Retrieve and get input values with
2 functions*/

class Input {
    //check if exists post
    public static function exists($type = 'post') {
        switch($type) {
            //check if empty or not empty post and get
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }

    public static function get($item) {
        if(isset($_POST[$item])) {
            return $_POST[$item];
        } else if(isset($_GET[$item])) {
            return $_GET[$item];
        }

        return '';
    }
}
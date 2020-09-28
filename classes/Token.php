<?php

class Token {

    // Create security tokens on pages to prevent unecessary malicious attacks by generating tokens that can be validated against

    public static function generate() {
        return Session::put(Config::get('sessions/token_name'), md5(uniqid()));
    }

    public static function check($token) {
        $tokenName = Config::get('sessions/token_name');

        if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }

        return false;
    }
}
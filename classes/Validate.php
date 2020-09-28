<?php

/*Create custom validation rules
 to be check against when logging or registering users.
 Show errors for the validations that didn't pass
 Check if all your validation rules have been passed with a simple function*/

class Validate {
    //initialize the variables
    private $_passed = false;
    private $_errors = array();
    private $_db = null;

    public function __construct() {
        //get object DB
        $this->_db = DB::getInstance();
    }

    //check the rules when registering and logging in
    public function check($source, $items = array()) {
        foreach($items as $item => $rules) {
            foreach($rules as $rule => $rule_value) {
                $value = $source[$item];
                $item = escape($item);

                //check rule required
                if($rule === 'required' && empty($value)) {
                    $this->addError("{$item} is required");
                } else if (!empty($value)) {
                    switch($rule) {
                        //check rule min
                        case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                            break;
                        //check rule max
                        case 'max':
                            if(strlen($value) > $rule_value) {
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                            break;
                        //check rule match
                        case 'matches':
                            if($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} must match {$item}.");
                            }
                            break;
                            //check rule unique
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            break;
                    }
                }
            }
        }
        

        if(empty($this->_errors)) {
            $this->_passed = true;
        }
    }

    private function addError($error) {
        $this->_errors[] = $error;
    }

    public function errors() {
        return $this->_errors;
    }

    public function passed() {
        return $this->_passed;
    }
}

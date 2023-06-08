<?php

namespace Http\Forms;
use Core\Validator;

class LoginForm{
    protected $errors = [];
    // This function return true or false
    public function validate($user, $password)
    {
        if (!Validator::email($user)) {
            $this->errors['user'] = 'Please provide a valid user name';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Please provide a valid password.';
        }

        if(empty($user['username']) || empty($password)){
            $errors[] = __('All fields are mandatory');
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}
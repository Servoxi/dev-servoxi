<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("Resources/views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('Resources/views/' . $path);
}

function r_print($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

// Helper function to genrate the url
function asset($path) {
    return trim($path, '/');
}

// Helper function to translate keys *need to be implement later for translation*
function __($key, $placeholders=[]){
    if(isset($key)){
        foreach($placeholders as $k=>$v){
            $key = str_replace(':$k', $v, $key);
        }
        return $key;
    }
}

// It set the sessions value of logedin user
function login($user){
    $_SESSION['user'] = [
        'username' => $user['username'],
        'email' => $user['email'],
    ];

    // To regenrate the session id
    session_regenerate_id(true);
}

function logout(){
    $_SESSION = [];
    session_destroy();
    $param = session_get_cookie_params();
    
    // It will delete the session which is created in path as we set time-3600 
    //hence session is expreide it will delete seesion immediately 
    setcookie('PHPSESSID', '', time()-3600, $param['path'], $param['domain']);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}
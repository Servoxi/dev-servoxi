<?php
namespace Core\Middleware;

class Auth{
    public function handle(){
        
        // It will use $_sess if not null else use false
        if(!$_SESSION['user'] ?? false){
            return header('location: /');
            exit();
        }
    }
}
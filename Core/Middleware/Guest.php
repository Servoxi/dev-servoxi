<?php
namespace Core\Middleware;

class Guest{
    public function handle(){
        //code to execute if $_SESSION['user'] is set and not null
        if($_SESSION['user'] ?? false){
            return header('location: /');
            exit();
        }
    }
}
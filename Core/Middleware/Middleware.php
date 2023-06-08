<?php
namespace Core\Middleware;

/*
Guest::class it will return full class name with there namespace
*/ 
class Middleware{
    const MAP =[
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key){
        // If middleware key is null from Routers array
        if(empty($key)){
            return;
        }
        
        // We check if $key present in MAP else we set false
        // We can call static variable using slef or static keyword but not using $this
        $middleware = static::MAP[$key] ?? false;
        
        if(empty($middleware)){
            throw new \Exception('No Middleware found with '.$key);
        }
        
        // it will create first object and then call the handel method of that class
        // r_print(new $middleware);
        (new $middleware)->handle();
    }
}
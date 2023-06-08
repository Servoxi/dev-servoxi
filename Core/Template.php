<?php

namespace Core;

class Template{
    private $variable;

    function assign($variable){
        $this->variable = $variable;
    }

    function render($template){
        extract($this->variable);
        ob_start();
        include $template;
        $output = ob_get_clean(); 
        return $output;
    }
}
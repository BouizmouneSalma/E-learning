<?php
spl_autoload_register(function ($class) {
    $class = str_replace('Classes\\', '', $class); 
    $file = __DIR__ . '/classes/' . $class . '.php'; 
    
    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new Exception("Class file not found: $class");
    }
});

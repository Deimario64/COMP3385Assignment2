<?php
// Autoloader.php
namespace MVCFramework;

spl_autoload_register(function ($class) {
    $classPath = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $filePath = '';

    // Check for classes in the 'Controller' namespace
    if (strpos($class, 'MVCFramework\\Controller\\') === 0) {
        $filePath = 'Controller/' . str_replace('MVCFramework\\Controller\\', '', $classPath) . '.php';
    }

    // Check for classes in the 'Config' namespace
    else if (strpos($class, 'MVCFramework\\Config\\') === 0) {
        $filePath = 'Config/' . str_replace('MVCFramework\\Config\\', '', $classPath) . '.php';
    }

    // Check for classes in the 'Model' namespace
    else if (strpos($class, 'MVCFramework\\Model\\') === 0) {
        $filePath = 'Model/' . str_replace('MVCFramework\\Model\\', '', $classPath) . '.php';
    }

    // Check for classes in the 'Model' namespace
    else if (strpos($class, 'MVCFramework\\View\\') === 0) {
        $filePath = 'View/' . str_replace('MVCFramework\\View\\', '', $classPath) . '.php';
    }

    // If the class file is found, require it
    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        // If the class file is not found, trigger an error
        trigger_error('Cannot find class/interface/abstract definition: ' . $class, E_USER_ERROR);
    }
});








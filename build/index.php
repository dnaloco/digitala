<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
date_default_timezone_set("America/Sao_Paulo");

defined('BUILD_PATH') || define('BUILD_PATH', '');

chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

// Setup autoloading
require BUILD_PATH . 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require BUILD_PATH . 'config/application.config.php')->run();

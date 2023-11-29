<?php
// index.php
namespace MVCFramework;

require_once __DIR__ . '/Autoloader.php';

// Load configuration
$configLoader = new Config\ConfigLoader();
$config = $configLoader->load('config.ini');

// Create Database Link
$database = new \PDO(
    "mysql:host={$config['Database']['db_host']};dbname={$config['Database']['db_name']}",
    $config['Database']['db_user'],
    $config['Database']['db_password']
);

// Instantiate necessary components
$response = new Controller\Response();
$validator = new Controller\Validator();
$sessionManager = new Controller\SessionManager();

// Create Router
$userController = new Controller\UserController($response, $validator, $sessionManager, $database);
$router = new Controller\Router($response, $validator, $sessionManager, $userController);
$router->setDatabase($database);

// Assuming $_GET['action'] contains the action to be performed
$action = $_GET['action'] ?? 'default';

switch ($action) {
    case 'login':
        $userController->login(); // Modified to call the login method in UserController
        break;
    case 'register':
        $router->register(); // Modified to call the register method in UserController
        break;
    case 'create':
        $router->create(); // Modified to call the create method in UserController
        break;
    case 'researcherDashboard':
        $router->researcherDashboard(); // Method for rendering the researcher dashboard
        break;
    case 'researchStudyManagerDashboard':
        $router->researchStudyManagerDashboard(); // Method for rendering the research study manager dashboard
        break;
    case 'researchGroupManagerDashboard':
        $router->researchGroupManagerDashboard(); // Method for rendering the research group manager dashboard
        break;
    default:
        $router->handleRequest();
        break;
}
// Route the request
$router->route($_SERVER['REQUEST_URI']);

<?php

namespace MVCFramework\Controller;
use MVCFramework\View\TemplateEngine;


class Router extends AbstractController implements RouterInterface
{
    private $database;

    public function setDatabase($database)
    {
        $this->database = $database;
    }
    private $userController;

    public function __construct(ResponseInterface $response, ValidatorInterface $validator, SessionManagerInterface $sessionManager, UserController $userController)
    {
        parent::__construct($response, $validator, $sessionManager);
        $this->userController = $userController;
    }

    public function handleRequest(): void
{
    
}

    public function route($uri): void
    {
        $action = $this->extractActionFromUri($uri);
        $userController = new UserController($this->response, $this->validator, $this->sessionManager, $this->database);

        // Check the action and call the corresponding method in UserController
        switch ($action) {
            case 'login':
                $userController->login();
                break;
            case 'register':
                $userController->register();
                break;
            case 'create':
                $userController->create();
                break;

                default:
                // Handle default action or show an error
                $this->response->setData(['error' => 'Invalid action']);
                $this->response->render();
                break;
        
        
        }
    }


    public function getRequestParams(): array
    {
        return $_REQUEST;
    }

    private function extractControllerFromUri($uri): string
    {
        $parts = explode('/', trim($uri, '/'));
        return ucfirst($parts[0]);
    }

    private function extractActionFromUri($uri): string
    {
        $parts = explode('/', trim($uri, '/'));
        return $parts[1] ?? 'index';
    }

    

    
}

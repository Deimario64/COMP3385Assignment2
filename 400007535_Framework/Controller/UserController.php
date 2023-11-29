<?php

namespace MVCFramework\Controller;

use MVCFramework\View\TemplateEngine;
use MVCFramework\Model\UserModel;


require_once __DIR__ . '/../Autoloader.php';

class UserController extends AbstractController implements RouterInterface
{
    private $model;

    public function __construct(ResponseInterface $response, ValidatorInterface $validator, SessionManagerInterface $sessionManager, \PDO $database)
    {
        parent::__construct($response, $validator, $sessionManager);
        $this->model = new UserModel($database);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                $this->response->setData(['error' => 'Please provide both email and password.']);
                $this->response->render();
                return;
            }

            $user = $this->model->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                $this->redirectToDashboard($user['role']);
            } else {
                $this->response->setData(['error' => 'Invalid email/password.']);
                $this->response->render();
            }
        } else {
            // Load the login template
            $templateEngine = new TemplateEngine();
            $this->response->setData(['pageTitle' => 'User Login']);
            $html = $templateEngine->render('View/login.tpl', $this->response->getData());

            // Set the HTML as the response content
            $this->response->setContent($html);

            // Output the response
            $this->response->render();
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = [];

            if (strlen($username) < 3) {
                $errors[] = "Username must be at least 3 characters long.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email address.";
            }

            if (strlen($password) < 10 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
                $errors[] = "Password must be at least 10 characters long, contain at least one uppercase letter, and one digit.";
            }

            if (empty($errors)) {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Save the user to the database
                $this->model->register($username, $hashedPassword, $email);

                // Redirect to the login page
                header("Location: index.php?action=login");
                exit();
            } else {
                // Display validation errors
                $this->response->setData(['error' => $errors]);
                $this->response->render();
            }
        } else {
            // Load the register template
            $templateEngine = new \MVCFramework\View\TemplateEngine();
            $this->response->setData(['pageTitle' => 'User Registration']);
            $html = $templateEngine->render('register.tpl', $this->response->getData());

            // Set the HTML as the response content
            $this->response->setContent($html);

            // Output the response
            $this->response->render();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $errors = [];

            if (strlen($username) < 3) {
                $errors[] = "Username must be at least 3 characters long.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email address.";
            }

            if (strlen($password) < 10 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
                $errors[] = "Password must be at least 10 characters long, contain at least one uppercase letter, and one digit.";
            }

            if (empty($errors)) {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Save the user to the database
                $this->model->createUser($username, $hashedPassword, $email, $role);

                // Redirect to the login page
                header("Location: index.php?action=login");
                exit();
            } else {
                // Display validation errors
                $this->response->setData(['error' => $errors]);
                $this->response->render();
            }
        } else {
            // Load the create template
            $templateEngine = new TemplateEngine();
            $this->response->setData(['pageTitle' => 'Create User']);
            $html = $templateEngine->render('createuser.tpl', $this->response->getData());

            // Set the HTML as the response content
            $this->response->setContent($html);

            // Output the response
            $this->response->render();
        }
    }

    public function dashboard()
    {
        if (isset($_SESSION['user_role'])) {
            $role = $_SESSION['user_role'];
            $user = $this->model->getUserById($_SESSION['user_id']);

            switch ($role) {
                case 'Research Group Manager':
                    $this->displayResearchGroupManagerDashboard();
                    break;
                case 'Research Study Manager':
                    $this->displayResearchStudyManagerDashboard();
                    break;
                case 'Researcher':
                    $this->displayResearcherDashboard();
                    break;
            }
        }
    }

    public function handleRequest():void
    {

    }

    public function getRequestParams(): array
    {

    }

    public function route($uri): void
    {
        
    } 

    private function displayResearchGroupManagerDashboard()
    {
        if ($_SESSION['user_role'] === 'Research Group Manager') {
            // Load the research group manager dashboard template
            $templateEngine = new TemplateEngine();
            $this->response->setData(['pageTitle' => 'Research Group Manager Dashboard']);
            $html = $templateEngine->render('research_group_manager_dashboard.tpl', $this->response->getData());

            // Set the HTML as the response content
            $this->response->setContent($html);

            // Output the response
            $this->response->render();
        } else {
            // Redirect to the login page if the user is not a research group manager
            header("Location: index.php?action=login");
            exit();
        }
    }

    private function displayResearchStudyManagerDashboard()
    {
        if ($_SESSION['user_role'] === 'Research Study Manager') {
            // Load the research study manager dashboard template
            $templateEngine = new TemplateEngine();
            $this->response->setData(['pageTitle' => 'Research Study Manager Dashboard']);
            $html = $templateEngine->render('research_study_manager_dashboard.tpl', $this->response->getData());

            // Set the HTML as the response content
            $this->response->setContent($html);

            // Output the response
            $this->response->render();
        } else {
            // Redirect to the login page if the user is not a research study manager
            header("Location: index.php?action=login");
            exit();
        }
    }

    private function displayResearcherDashboard()
    {
        // Assuming 'Researcher' is the role for researchers
        if ($_SESSION['user_role'] === 'Researcher') {
            // Load the researcher dashboard template
            $templateEngine = new TemplateEngine();
            $this->response->setData(['pageTitle' => 'Researcher Dashboard']);
            $html = $templateEngine->render('researcher_dashboard.tpl', $this->response->getData());

            // Set the HTML as the response content
            $this->response->setContent($html);

            // Output the response
            $this->response->render();
        } else {
            // Redirect to the login page if the user is not a researcher
            header("Location: index.php?action=login");
            exit();
        }

    }
}

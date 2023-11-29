<?php

namespace MVCFramework\Controller;

abstract class AbstractController implements RouterInterface
{
    protected $validator;
    protected $sessionManager;
    protected $response;

    public function __construct(ResponseInterface $response, ValidatorInterface $validator, SessionManagerInterface $sessionManager)
    {
        $this->response = $response;
        $this->validator = $validator;
        $this->sessionManager = $sessionManager;
    }

    abstract public function handleRequest(): void;
}



<?php

namespace MVCFramework\Controller;

abstract class AbstractResponse implements ResponseInterface
{
    protected $data = [];
    protected $template = 'index.tpl'; 

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }

    abstract public function render(): void;
}


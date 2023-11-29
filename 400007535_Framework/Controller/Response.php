<?php

namespace MVCFramework\Controller;

class Response extends AbstractResponse
{
    
    public function render(): void
    {
        $templateEngine = new \MVCFramework\View\TemplateEngine();
        $html = $templateEngine->render($this->template, $this->data);
        echo $html;
    }

    protected $data = [];

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}



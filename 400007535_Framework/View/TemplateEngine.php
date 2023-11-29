<?php

namespace MVCFramework\View;

class TemplateEngine implements TemplateEngineInterface
{
    public function render(string $template, array $data): string
    {
        $templatePath = __DIR__ . DIRECTORY_SEPARATOR . $template;

        if (file_exists($templatePath)) {
            extract($data);

            ob_start();
            include $templatePath;
            return ob_get_clean();
        } else {
            return "Template not found: {$template}";
        }
    }
}


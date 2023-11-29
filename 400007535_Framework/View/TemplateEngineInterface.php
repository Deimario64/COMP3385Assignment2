<?php

namespace MVCFramework\View;

interface TemplateEngineInterface
{
    public function render(string $template, array $data): string;
}

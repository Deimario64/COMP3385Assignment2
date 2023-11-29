<?php
namespace MVCFramework\Controller;

interface ResponseInterface
{
    public function setData(array $data): void;
    public function render(): void;
}

<?php
namespace MVCFramework\Controller;

interface ValidatorInterface
{
    public function validate(array $data): bool;
}

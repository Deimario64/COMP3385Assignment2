<?php
namespace MVCFramework\Model;

interface FormValidatorInterface
{
    public function validateForm(array $formData): bool;
}

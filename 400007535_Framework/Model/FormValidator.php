<?php

namespace MVCFramework\Model;

class FormValidator extends AbstractModel
{
    public function validateForm(array $formData): bool
    {

        $requiredFields = ['username', 'email', 'password'];

        foreach ($requiredFields as $field) {
            if (!isset($formData[$field]) || empty($formData[$field])) {
                return false;
            }
        }

        return true;
    }
}

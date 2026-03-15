<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD)]
class PasswordStrength extends Constraint
{
    public string $messageTooShort = 'Le mot de passe doit contenir au moins {{ limit }} caractères.';
    public string $messageNoUppercase = 'Le mot de passe doit contenir au moins une lettre majuscule.';
    public string $messageNoNumber = 'Le mot de passe doit contenir au moins un chiffre.';
    public string $messageNoSpecial = 'Le mot de passe doit contenir au moins un caractère spécial (@$!%*?&...).';

    public int $minLength = 12;

    public function __construct(array $options = [], array $groups = null, mixed $payload = null)
    {
        parent::__construct($options, $groups, $payload);
    }
}

<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class PasswordStrengthValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof PasswordStrength) {
            throw new UnexpectedTypeException($constraint, PasswordStrength::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (mb_strlen($value) < $constraint->minLength) {
            $this->context->buildViolation($constraint->messageTooShort)
                ->setParameter('{{ limit }}', $constraint->minLength)
                ->addViolation();
        }

        if (!preg_match('/[A-Z]/', $value)) {
            $this->context->buildViolation($constraint->messageNoUppercase)
                ->addViolation();
        }

        if (!preg_match('/[0-9]/', $value)) {
            $this->context->buildViolation($constraint->messageNoNumber)
                ->addViolation();
        }

        if (!preg_match('/[@$!%*?&\#\^\(\)\-_=+<>.,;:]/', $value)) {
            $this->context->buildViolation($constraint->messageNoSpecial)
                ->addViolation();
        }
    }
}

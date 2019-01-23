<?php

declare(strict_types=1);

namespace App\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class StartWithEasyValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (0 === strpos($value, 'easy')) {
            return;
        }

        $this->context->addViolation('The name must start with "easy"');
    }
}
